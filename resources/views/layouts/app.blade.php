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
        <button id="menu-btn">≡</button>
        <nav id="menu" style="display: none;">
            @if (Auth::check())
            <li><a href="{{ route('home') }}">HOME</a></li>
            <li><a href="{{ route('fashions.index') }}">ALL</a></li>
            <li><a href="">FAVORITE</a></li>
            
            <form on-submit="return confirm('ログアウトしますか？')" action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit">ログアウト</button>
            </form>

            @else
            <li><a href="{{ route('login') }}">ログイン</a></li>
            <li><a href="{{ route('register') }}">会員登録</a></li>
            @endif

        </nav>
        <!-- サイトのタイトル -->
         <h1><a href="{{ route('home') }}" class="site-title">MyFashion</a></h1>

    </header>
    <main class="container">

        @yield('content')

    </main>
    <footer>
        &copy; チームブロッコリー制作物
    </footer>
</body>
</html>

<script>
  document.getElementById('menu-btn').addEventListener('click', function () {
    const menu = document.getElementById('menu');
    menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
  });
</script>
