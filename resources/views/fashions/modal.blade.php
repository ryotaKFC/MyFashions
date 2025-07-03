<fashion class="fashion-detail">
    <!-- お気に入りボタンの処理 -->
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
    <!-- コーデの詳細の表示 -->
    <img src="{{ asset('storage/avatar/' . $fashion->photo_path) }}" alt="コーデ画像">
    <!-- <h1 class="fashion-name">{{ $fashion->name }}</h1> -->
    <div class="fashion-info">#{{ $fashion->season }}</div>
    <div class="fashion-info">#{{ $fashion->weather }}</div>
    <div class="fashion-info">#{{ $fashion->temperature }}</div>
    <div class="fashion-info">#{{ $fashion->humidity }}</div>
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
    <!-- 閉じるボタン？ -->
    <div id="fashionModal" style="
      display: none;
      position: fixed;
      z-index: 9999;
      top: 10%;
      left: 50%;
      transform: translateX(-50%);
      background: white;
      border: 1px solid #ccc;
      padding: 20px;
      max-width: 90%;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    ">
      <button onclick="document.getElementById('fashionModal').style.display='none'">閉じる</button>
      <div id="fashionModalContent"></div>
    </div>
    @endcan
</fashion>

