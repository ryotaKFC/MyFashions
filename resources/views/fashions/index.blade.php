@extends('layouts.app')
@section('content')
<h1 class="page-heading">コーデ検索</h1>
<!-- @include('components.sort') -->
 <div>
    <form method="GET" action="{{ route('fashions.index') }}">
        <label for="sort">並び替え：</label>
        <select name="sort" id="sort">
            <option value="created_at" {{ $sort === 'created_at' ? 'selected' : '' }}>作成日</option>
            <option value="name" {{ $sort === 'name' ? 'selected' : '' }}>名前</option>
        </select>

        <select name="direction" id="direction">
            <option value="asc" {{ $direction === 'asc' ? 'selected' : '' }}>昇順</option>
            <option value="desc" {{ $direction === 'desc' ? 'selected' : '' }}>降順</option>
        </select>

        <button type="submit">並び替え</button>
    </form>
</div>
@include('fashions.fashions')
@endsection()
