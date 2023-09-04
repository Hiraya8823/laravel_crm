@extends('layouts.main')

@section('title', '顧客詳細画面')
@section('content')
    <h1>顧客詳細画面</h1>
    <table border="1">
        <tr>
            <th>顧客ID</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>郵便番号</th>
            <th>住所</th>
            <th>電話番号</th>
        </tr>
        <tr>
            <th>{{ $customers->id }}</th>
            <th>{{ $customers->name }}</th>
            <th>{{ $customers->email }}</th>
            <th>{{ $customers->zipcode }}</th>
            <th>{{ $customers->address }}</th>
            <th>{{ $customers->phone }}</th>
        </tr>
    </table>
    <button onclick="location.href='/customers/{{ $customers->id }}/edit'">更新</button>
    <div>
        <button onclick="location.href='/customers'">一覧へ戻る</button>
    </div>
    <div>
        <form action="/customers/{{ $customers->id }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="削除する" onclick="if(!confirm('削除しますか？')){return false};">
        </form>
    </div>
@endsection
