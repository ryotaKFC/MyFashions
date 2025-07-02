@foreach ($fashions as $fashion)
<fashion class="fashion-item">
    <div class="fashion-name">
        <a href="{{ route('fashions.show', $fashion) }}">{{ $fashion->name }}</a>
    </div>
    <div class="fashion-info">
        {{ $fashion->created_at }}|{{ $fashion->user_id }}
    </div>
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
@endforeach
{{ $fashions->links() }}
