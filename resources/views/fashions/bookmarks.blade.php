@extends('layouts.app')
@section('content')
<h1 class="page-heading">お気に入りのコーデ</h1>
@include('components.sort_and_filter')
<div class="fashions">
    @include('fashions.fashions')
</div>
@endsection
