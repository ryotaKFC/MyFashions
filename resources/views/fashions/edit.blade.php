@extends('layouts.app')
@section('content')
@include('commons.errors')
<form action="{{ route('fashions.update', $fashion) }}" method="post">
    @method('patch')
    @include('components.form')
    <button type="submit">更新する</button>
    <a href="{{ route('fashions.show', $fashion) }}">キャンセル</a>
</form>
@endsection()
