@extends('layouts.app')
@section('content')
<h1>会員登録</h1>
@include('commons.errors')
  <x-form.base action="{{ route('register') }}" method="post">
    <x-form.input label="名前" type="text" name="name" value="{{ old('name') }}" required />
    <x-form.input label="メールアドレス" type="email" name="email" value="{{ old('email') }}" required />
    <x-form.input label="パスワード" type="password" name="password" required />
    <x-form.input label="パスワード（確認用）" type="password" name="password_confirmation" placeholder="もう一度入力" required />
    <x-button type="submit">登録する</x-button>
    <a href="/">キャンセル</a>
  </x-form.base>
@endsection()


<Style>

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
</Style>
