@extends('layouts.app')
@section('content')
<fashion class="fashion-detail">
    <img src="{{ asset('storage/avatar/' . $fashion->photo_path) }}" alt="コーデ画像">
    <h1 class="fashion-name">{{ $fashion->name }}</h1>
    <div class="fashion-info">{{ $fashion->created_at }}</div>
    <!-- <div class="fashion-body">{!! nl2br(e($fashion->body)) !!}</div> -->
    @can('update', $fashion)
    <div class="fashion-control">
        <a href="{{ route('fashions.edit', $fashion) }}">編集</a>
        <form action="{{ route('fashions.destroy', $fashion) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">削除</button>
        </form>
    </div>
    @endcan
</fashion>
@endsection
