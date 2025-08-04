@props(['items' => []])

<!-- ハンバーガーメニュー -->
<div class="flex items-center">
    <img id="menu-btn" src="https://sato-icons.com/wp/wp-content/uploads/2021/04/%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC%E3%81%AE%E3%82%A2%E3%82%A4%E3%82%B3%E3%83%B3.png" class="size-20 brightness-0 invert hover:opacity-70">
</div>

<!-- サイドメニュー -->
<div id="side-menu" class="fixed top-0 left-0 -translate-x-full w-40 h-full bg-gray-900 p-5 transition-transform duration-300 ease-in-out z-50">
    <nav class=" text-white text-center flex flex-col justify-between h-full p-4">
    {{-- ログイン中なら --}}
    @if (Auth::check())
        <ul class="space-y-4">
            @foreach ($items as $item)
                <li>
                    <a href="{{ $item['href'] }}" class="">
                        {{ $item['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
        <form class="text-center" onsubmit="return confirm('ログアウトしますか？')" action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit">ログアウト</button>
        </form>
        {{-- ログアウト中なら --}}
        @else
            <ul>
                <li><a href="{{ route('login') }}">ログイン</a></li>
                <li><a href="{{ route('register') }}">新規登録</a></li>
            </ul>
        @endif
    </nav>
</div>

<script>
    const menuBtn = document.getElementById('menu-btn');
    const sideMenu = document.getElementById('side-menu');

    // メニュー開閉
    menuBtn.addEventListener('click', (e) => {
        e.stopPropagation(); // 外部クリックとして扱わない
        sideMenu.classList.toggle('-translate-x-full');
    });

    // メニュー内クリックでは閉じないように
    sideMenu.addEventListener('click', (e) => {
        e.stopPropagation();
    });

    // ドキュメントのどこかをクリックしたら閉じる
    document.addEventListener('click', () => {
        if (!sideMenu.classList.contains('-translate-x-full')) {
            sideMenu.classList.add('-translate-x-full');
        }
    });
    
</script>
