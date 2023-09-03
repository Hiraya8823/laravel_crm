<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use GuzzleHttp\Client;

class CustomerController extends Controller
{
    // indexページへ移動
    public function index()
    {
        // テーブル全件取得
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    // showページへ移動
    public function show($id)
    {
        $customers = Customer::find($id);
        return view('customers.show', compact('customers'));
    }

    // createページで移動
    public function create()
    {
        return view('customers.create');
    }

    public function address(Request $request)
    {


        $url = 'https://zipcloud.ibsnet.co.jp/api/search?zipcode=';
        $method = 'GET';

        // Client(接続するためのクラス)を生成
        $client = new Client();
        // 接続失敗時はnullを返すようにする
        try {
            //UTLにアクセスした結果を変数$responseに代入
            $response = $client->request($method, $url . $request->zipcode);
            $body = $response->getBody();
            $customer = json_decode($body, false);
        } catch (\Exception $e) {
            $customer = null;
        }
        


        return view('customers.address', compact('customer'));
    }

    public function store(CustomerRequest $request)
    {
        // インスタンスの作成
        $customer = new Customer;

        // 値の用意
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->zipcode = $request->zipcode;
        $customer->address = $request->address;
        $customer->phone = $request->phone;

        // インスタンスに値を設定して保存
        $customer->save();

        // 登録したらindexに戻る
        return redirect('/customers');
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customers.edit', compact('customer'));
    
    }

    public function update(CustomerRequest $request, $id)
    {
        $customer = Customer::find($id);

        // 値の用意
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->zipcode = $request->zipcode;
        $customer->address = $request->address;
        $customer->phone = $request->phone;

        // インスタンスに値を設定して保存
        $customer->save();

        // 登録したらindexに戻る
        return redirect('/customers');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect('/customers');
    }
}
