@extends('layouts.app')
@section('content')
@include('commons.errors')
<form action="{{ route('fashions.store') }}" method="post" enctype="multipart/form-data">
    @include('fashions.form')
<button type="submit">登録する</button>
<a href="{{ route('fashions.index') }}">キャンセル</a>
</form>
@endsection()
