@extends('layouts.app')
@section('content')
<h1 class="page-heading">コーデ検索</h1>
@include('includes.sort_and_filter')
<div  class="w-[90%] mx-auto flex flex-row justify-center flex-wrap">
    @foreach ($fashions as $fashion)
    @if ($fashion->user_id != Auth::user()->id)
    @continue
    @else
    <fashion class="relative inline-block my-5 mx-1 max-w-36">
        <div class="w-full h-52 object-cover">
            <!-- お気に入りボタン -->
            <div class="favorite-btn absolute top-0 left-0 z-10">
                @if (!Auth::user()->is_bookmark(fashionId: $fashion->id))
                <form action="{{ route('bookmark.store', $fashion) }}" method="post">
                    @csrf
                    <button>☆</button>
                </form>
                @else
                <form action="{{ route('bookmark.destroy', $fashion) }}" method="post">
                    @csrf
                    @method('delete')
                    <button>★</button>
                </form>
                @endif
            </div>
            <!-- ファッションの画像 -->
            <a href="{{ route('fashions.show', $fashion) }}">
                <img src="{{ asset('storage/avatar/' . $fashion->photo_path) }}" width="200px" class="rounded-lg">
            </a>
        </div>
    </fashion>
    @endif
    @endforeach
</div>


<style>
    .fashion-photo img {
        width: 100%;
        height: 200px;
        object-fit:cover;
        border-radius:8px;
    }

    .fashion-info {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        width: 200px;
        margin: auto;
        justify-content: space-evenly;
        color:#418ee6;
    }
    .fashion-info-item {
        margin: 1px 3px;
    }

    /* お気に入りボタンのスタイル */
    .favorite-btn button {
        background-color: rgba(0, 0, 0, 0);
        color: rgb(234, 234, 41);
        font-size: 150%;
        font-style: initial;
        border: 0px;
        -webkit-text-stroke: 1.5px rgb(255, 255, 255);
        paint-order: stroke;
    }

    /* お気に入りボタン左上にする処理 */
    .fashion-photo {
        position: relative;
        display: inline-block;
    }
    .favorite-btn {
        position: absolute;
        top: 0px;
        left: 0px;
        z-index: 2;
    }

</style>

@endsection


