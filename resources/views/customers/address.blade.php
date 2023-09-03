@extends('layouts.main')

@section('title', '新規登録画面')
@section('content')
    <h1>新規登録画面</h1>
    @if ($errors->any())
        <div class="error">
            <p>
                <b>{{ count($errors) }}件のエラーがあります。</b>
            </p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/customers" method="post">
        @csrf
        <div>
            <label for="name">名前</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div>
            <label for="email">メールアドレス</label>
            <input type="text" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div>
            <label for="zipcode">郵便番号</label>
            <input type="number" id="zipcode" name="zipcode" value="{{ old('zipcode', $customer->api_zipcode) }}">
        </div>
        <div>
            <label for="address">住所</label>
            <textarea name="address" id="address" cols="30" rows="5">{{ old('address', $customer->api_address) }}</textarea>
        </div>
        <div>
            <label for="phone">電話番号</label>
            <input type="number" id="phone" name="phone" value="{{ old('phone') }}">
        </div>
        <div>
            <input type="submit" value="登録">
        </div>
    </form>
    <button onclick="location.href='/customers/create'">郵便番号検索に戻る</button>
@endsection
