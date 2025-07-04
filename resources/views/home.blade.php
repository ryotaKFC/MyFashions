@extends('layouts.app')
@section('content')

<h1 class="page-header">ホーム画面</h1>
<p>ようこそ、{{ Auth::user()->name }}さん</p>

<!-- カレンダー -->
@include('components.calendar')
<!-- コーデ登録ボタン -->
<p id="create-button"><a href="{{ route('fashions.create') }}">今日のコーデ登録</a></p>
 <!-- モーダル表示（テスト） -->
@include('components.modal')

@endsection
