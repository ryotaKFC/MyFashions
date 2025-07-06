<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/fashion.css">
</head>
<body>
    <header>
        <!-- ハンバーガーメニュー -->
        <div class="header-left">
            <button id="menu-btn">≡</button>
            <!-- サイドメニュー -->
            <nav id="side-menu">
                <ul>
                    @if (Auth::check())
                        <li><a href="{{ route('home') }}">HOME</a></li>
                        <li><a href="{{ route('fashions.index') }}">ALL</a></li>
                        <li><a href="#">FAVORITE</a></li>
                        <li>
                            <form onsubmit="return confirm('ログアウトしますか？')" action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit">ログアウト</button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">ログイン</a></li>
                        <li><a href="{{ route('register') }}">会員登録</a></li>
                    @endif
                </ul>
            </nav>
        </div>
        <!-- サイトのタイトル -->
        <div class="header-center">
            <h1><a href="{{ route('home') }}" class="site-title">MyFashion</a></h1>
         </div>

    </header>
    <main class="container">

        @yield('content')

    </main>
    <footer>
        &copy; チームブロッコリー制作物
    </footer>
    <!-- @stack('scripts') -->
</body>
</html>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuBtn = document.getElementById('menu-btn');
        const sideMenu = document.getElementById('side-menu');

        menuBtn.addEventListener('click', function () {
            sideMenu.classList.toggle('open');
        });

        // 背景クリックで閉じる場合など追加したければこちら
        document.addEventListener('click', function (e) {
            if (!sideMenu.contains(e.target) && e.target !== menuBtn) {
                sideMenu.classList.remove('open');
            }
        });
    });
</script>


<style>
    #menu-btn {
        font-size: 100px;
        background-color: rgba(0, 0, 0, 0);
        border: 0px;
    }
    /* 基本のサイドメニュー */
    #side-menu {
        position: fixed;
        top: 0;
        left: -500px; /* 最初は隠す */
        width: 250px;
        height: 100%;
        background: #222;
        color: white;
        overflow-y: auto;
        transition: left 0.3s ease;
        z-index: 1000;
        padding: 20px;
    }

    /* メニューを表示 */
    #side-menu.open {
        left: 0;
    }

    #side-menu ul {
        list-style: none;
        padding: 0;
    }

    #side-menu li {
        margin-bottom: 15px;
    }

    #side-menu a, #side-menu button {
        color: white;
        text-decoration: none;
        background: none;
        border: none;
        font-size: 16px;
        cursor: pointer;
    }
</style>
