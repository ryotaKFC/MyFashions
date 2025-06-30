@foreach ($fashions as $fashion)
<fashion class="fashion-item">
    <div class="fashion-name">
        <a href="{{ route('fashions.show', $fashion) }}">{{ $fashion->name }}</a>
    </div>
    <div class="fashion-info">
        {{ $fashion->created_at }}|{{ $fashion->user_id }}
    </div>
    <div class="article-control">
        @if (!Auth::user()->is_bookmark($fashion->id))
        <form action="{{ route('bookmark.store', $fashion) }}" method="post">
            @csrf
            <button>お気に入り登録</button>
        </form>
        @else 
        <form action="{{ route('bookmark.destroy', $fashion) }}" method="post">
            @csrf
            @method('delete')
            <button>お気に入り解除</button>
        </form>
        @endif
    </div>
</fashion>
@endforeach
{{ $fashions->links() }}
