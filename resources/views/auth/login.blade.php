@extends('layouts.app')
@section('content')
<h1>ログイン</h1>
@include('commons.errors')
    
    <x-form.base action="{{ route('login') }}" method="post">
        <x-form.input label="メールアドレス" name="email" type="email" required />
        <x-form.input label="パスワード" name="password" type="password" required />
        <x-button type="submit" class="submit-btn">ログイン</x-button>
        <a href="/">キャンセル</a>
    </x-form.base>

@endsection()

<style>
    .form-section {
        display: flex;
        flex-direction: column;
    }
    /* フォーム全体 */
    .form-list {
    display: inline-block;
    background-color: #e6f4ff;
    padding: 30px;
    border-radius: 20px;
    /* box-shadow: 0 0 10px #a3d8ff; */
    text-align: left;
    margin-bottom: 40px;
    }

    .form-list dt {
    font-weight: bold;
    margin-top: 15px;
    color: #1a73e8;
    }

    .form-list dd {
    margin-bottom: 10px;
    }

    input[type="file"],
    input[type="number"],
    select {
    width: 100%;
    padding: 6px 12px;
    border-radius: 10px;
    border: 1px solid #bbb;
    background: #fff;
    font-size: 1em;
    box-sizing: border-box;
    margin: 5px 0 10px;
    }

    /* リンクボタン */
    .form-buttons a {
        margin-left: 15px;
        padding: 8px 16px;
        border-radius: 20px;
        background-color: #e0f0ff;
        color: #007acc;
        font-weight: bold;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .form-buttons a:hover {
    background-color: #c0e0ff;
    }
</style>
