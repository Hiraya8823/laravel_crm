@extends('layouts.main')

@section('title', '郵便番号検索画面')
@section('content')
    <h1>郵便番号検索画面</h1>
    <form action="/customers/address/search" method="get">
        @csrf
        <label for="zipcode">郵便番号検索</label>
        <input type="text" id="zipcode" name="zipcode">
        <input type="submit" value="送信">
    </form>
    <a href="/customers">一覧へ戻る</a>

@endsection
