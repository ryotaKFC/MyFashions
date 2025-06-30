@extends('layouts.app')
@section('content')
<h1 class="page-heading">マイページ</h1>
<p>ようこそ、{{ Auth::user()->name }}さん｜<a href="{{ route('fashions.create') }}">記事を書く</a></p>
@include('fashions.fashions')
@endsection()
