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
        #{{ $fashion->season }}
        #{{ $fashion->weather }}
        #{{ $fashion->temperature }}
        #{{ $fashion->humidity }}
        #{{ $fashion->luck }}
        #{{ $fashion->comment }}
        <br>
        {{ $fashion->created_at }}
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
@endif
@endforeach
{{ $fashions->links() }}
