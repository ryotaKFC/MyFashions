@extends('layouts.app')
@section('content')
<section class="fashion-detail">
    <!-- コーデの詳細の表示 -->
    <div class="fashion-photo">
        <!-- お気に入りボタンの処理 -->
        <div class="favorite-btn"> 
            @if (!Auth::user()->is_bookmark($fashion->id))
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
        <img src="{{ asset('storage/avatar/' . $fashion->photo_path) }}" alt="コーデ画像">
    </div>
    <!-- fashion-info -->
    <div class="fashion-info">
        <div class="fashion-info-item">#{{ $fashion->season }}</div>
        <div class="fashion-info-item">#{{ $fashion->weather }}</div>
        <div class="fashion-info-item">#気温{{ $fashion->temperature }}℃</div>
        <div class="fashion-info-item">#湿度{{ $fashion->humidity }}%</div>
        <div class="fashion-info-item">#{{ $fashion->luck }}</div>
        <div class="fashion-info-item">#{{ $fashion->comment }}</div>
    </div>
    <div class="fashion-info-created_at">{{ $fashion->created_at }}</div>
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
</section>

<style>
    /* .fashion-detail {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    } */
    .fashion-photo img{
        width:50%;
        height:100%;
        object-fit:cover;
        border-radius:8px;
    }

    .fashion-info {
        display: flex;
    }
    .fashion-info-item {
        color:rgb(65, 142, 230);
        margin: 0px 3px;
    }

    /* お気に入りボタンのスタイル */
    .favorite-btn button{
        background-color: rgba(0, 0, 0, 0);
        color: rgb(234, 234, 41);
        font-size: 30px;
        border: 0px;
        -webkit-text-stroke: 1px rgb(180, 180, 180);
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
