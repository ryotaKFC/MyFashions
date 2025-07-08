@extends('layouts.app')
@section('content')
<h1 class="page-heading">コーデ検索</h1>
@include('components.sort_and_filter')
@include('fashions.fashions')
<style>
    /* .fashions {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    } */
</style>
@endsection


