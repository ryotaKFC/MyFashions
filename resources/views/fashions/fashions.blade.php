@foreach ($fashions as $fashion)
@if ($fashion->user_id != Auth::user()->id)
@continue
@else
<fashion class="fashion-item">
    <div class="fashion-photo">
        <!-- お気に入りボタン -->
        <div class="favorite-btn">
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
            <img src="{{ asset('storage/avatar/' . $fashion->photo_path) }}" width="200px">
        </a>
    </div>
    <div class="fashion-info">
        <div class="fashion-info-item">#{{ $fashion->season }}</div>
        <div class="fashion-info-item">#{{ $fashion->weather }}</div>
        <div class="fashion-info-item">#気温{{ $fashion->temperature }}℃</div>
        <div class="fashion-info-item">#湿度{{ $fashion->humidity }}%</div>
        <div class="fashion-info-item">#{{ $fashion->luck }}</div>
        <div class="fashion-info-item">#{{ $fashion->comment }}</div>
    </div>
    <div class="fashion-info-created_at">{{ $fashion->created_at }}</div>

    
</fashion>
@endif
@endforeach
{{ $fashions->links() }}


<style>
    /* .fashion-photo {
        text-align: center;
    } */
    .fashion-info {
        display: flex;
    }
    .fashion-info-item {
        color:rgb(65, 142, 230);
        margin: 0px 3px;
    }

    /* お気に入りボタンのスタイル */
    .favorite-btn button {
        background-color: rgba(0, 0, 0, 0);
        color: rgb(234, 234, 41);
        font-size: 25px;
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
