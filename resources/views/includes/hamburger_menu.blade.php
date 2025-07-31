<!-- ハンバーガーメニュー -->
<div class="relative flex items-center">
    <button id="menu-btn" class="text-white text-3xl focus:outline-none">
        ≡
    </button>

    <!-- サイドメニュー -->
    <nav id="side-menu" class="fixed top-0 left-0 -translate-x-full w-40 h-full bg-gray-900 p-5 transition-transform duration-300 ease-in-out z-50">
        <ul class="space-y-4 text-white">
            @if (Auth::check())
                <li><a href="{{ route('home') }}" class="hover:text-gray-400 block">HOME</a></li>
                <li><a href="{{ route('fashions.index') }}" class="hover:text-gray-400 block">ALL</a></li>
                <li><a href="{{ route('bookmarks') }}" class="hover:text-gray-400 block">FAVORITE</a></li>
                <li class="mt-auto absolute bottom-8 left-1/4">
                    <form onsubmit="return confirm('ログアウトしますか？')" action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="hover:text-gray-400">ログアウト</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}" class="hover:text-gray-400 block">ログイン</a></li>
                <li><a href="{{ route('register') }}" class="hover:text-gray-400 block">新規登録</a></li>
            @endif
        </ul>
    </nav>
</div>

<script>
    const menuBtn = document.getElementById('menu-btn');
    const sideMenu = document.getElementById('side-menu');

    menuBtn.addEventListener('click', () => {
        sideMenu.classList.toggle('-translate-x-full');
    });

    
</script>




{{-- <!-- ハンバーガーメニュー -->
<div class="header-left">
    <button id="menu-btn">≡</button>
    <!-- サイドメニュー -->
    <nav id="side-menu">
        <ul>
            @if (Auth::check())
                <li><a href="{{ route('home') }}">HOME</a></li>
                <li><a href="{{ route('fashions.index') }}">ALL</a></li>
                <li><a href="{{ route('bookmarks') }}">FAVORITE</a></li>
                <form onsubmit="return confirm('ログアウトしますか？')" action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" id="logout-btn">ログアウト</button>
                </form>
            @else
                <li><a href="{{ route('login') }}">ログイン</a></li>
                <li><a href="{{ route('register') }}">新規登録</a></li>
            @endif
        </ul>
    </nav>
</div> --}}

{{-- <style>

    /* ハンバーガーメニュー */
        #menu-btn {
            font-size: 2em;
            background-color: rgba(0, 0, 0, 0);
            border: 0px; 
            border-radius: 1px;
            cursor: pointer;
            color: rgb(255, 255, 255);
            margin: auto 0;
            padding: 0;
        }
        .header-left {
            font-size: 2rem;
            flex:.5;
            position: relative;
            top: 5px; 
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }
        #side-menu {
            position: fixed;
            top: 0;
            left: -200px; /* 最初は隠す */
            width: 150px;
            height: 100%;
            background: #222;
            overflow-y: auto;
            transition: left 0.3s ease;
            z-index: 1000;
            padding: 20px;
        }
        #side-menu a, #side-menu button {
            color: rgb(255, 255, 255);
            text-decoration: none;
            background: none;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }
        .header-center {
            font-size: 1.3rem;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        /* メニューを表示 */
        #side-menu.open {
            left: 0;
        }
        /* メニューの各アイテムの設定 */
        #side-menu ul {
            list-style: none;
            padding: 0;
        }
    
        #side-menu li {
            margin-bottom: 15px;
        }
        
        #side-menu li a:hover,
        #side-menu li button:hover{
            color: rgba(255, 255, 255, 0.4);
        }
    
        #logout-btn {
            color: rgb(255, 255, 255);
            position: absolute;
            bottom: 30px;
            left: 25%;
            padding-bottom: 40px;
        }
</style>
 --}}
