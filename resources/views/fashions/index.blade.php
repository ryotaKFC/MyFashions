@extends('layouts.app')
@section('content')
<h1 class="page-heading">コーデ検索</h1>
<!-- @include('components.sort') -->
 <div>
    <form method="GET" action="{{ route('fashions.index') }}">
        <label for="sort">並び替え：</label>
        <select name="sort" id="sort">
            <option value="created_at" {{ $sort === 'created_at' ? 'selected' : '' }}>作成日</option>
            <option value="season" {{ $sort === 'season' ? 'selected' : '' }}>季節</option>
            <option value="weather" {{ $sort === 'weather' ? 'selected' : '' }}>天気</option>
            <option value="temperature" {{ $sort === 'temperature' ? 'selected' : '' }}>気温</option>
            <option value="humidity" {{ $sort === 'humidity' ? 'selected' : '' }}>湿度</option>
        </select>

        <select name="direction" id="direction">
            <option value="asc" {{ $direction === 'asc' ? 'selected' : '' }}>昇順</option>
            <option value="desc" {{ $direction === 'desc' ? 'selected' : '' }}>降順</option>
        </select>

        <button type="submit">並び替え</button>
    </form>
</div>
<div class="fashions">
    @include('fashions.fashions')
</div>
<style>
    .fashions {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
</style>
@endsection


