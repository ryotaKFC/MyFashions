@extends('layouts.app')
@section('content')
<div class="welcome">
    <h1>My Fashion</h1>
    @auth
    <a class="btn" href="{{ route('home') }}">マイページ</a>
    <a class="btn" href="{{ route('fashions.index') }}">ブログを見る</a>
    @else
    <a class="btn" href="{{ route('register') }}">会員登録</a>
    <a class="btn" href="{{ route('login') }}">ログイン</a>
    @endauth
</div>
@endsection()
