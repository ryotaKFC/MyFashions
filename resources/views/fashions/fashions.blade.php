@foreach ($fashions as $fashion)
@if ($fashion->user_id != Auth::user()->id)
@continue
@else
<fashion class="fashion-item">
    <div class="fashion-photo">
        <a href="{{ route('fashions.show', $fashion) }}">
            <img src="{{ asset('storage/avatar/' . $fashion->photo_path) }}" width="200px">
        </a>
    </div>
    <div class="fashion-info">
        <div class="fashion-info-item">#{{ $fashion->season }}</div>
        <div class="fashion-info-item">#{{ $fashion->weather }}</div>
        <div class="fashion-info-item">#{{ $fashion->temperature }}</div>
        <div class="fashion-info-item">#{{ $fashion->humidity }}</div>
        <div class="fashion-info-item">#{{ $fashion->luck }}</div>
        <div class="fashion-info-item">#{{ $fashion->comment }}</div>
    </div>
    <div class="fashion-info-created_at">{{ $fashion->created_at }}</div>
    <div class="article-control">
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
</fashion>
@endif
@endforeach
{{ $fashions->links() }}


<!-- <style>
    .fashion-photo {
        text-align: center;
    }
    .fashion-info {
        display: flex;
    }
    .fashion-info-item {
        color:rgb(65, 142, 230);
        margin: 0px 3px;
    }
</style> -->
