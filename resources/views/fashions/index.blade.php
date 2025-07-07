@extends('layouts.app')
@section('content')
<h1 class="page-heading">コーデ検索</h1>
@include('components.sort_and_filter')

<div class="fashions">
    @include('fashions.fashions')
</div>
<style>
    /* .fashions {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    } */
</style>
@endsection


