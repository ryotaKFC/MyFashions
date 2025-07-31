<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="/css/app.css"> -->
</head>
<body>
    <header class="primary-color">
        @include('includes.hamburger_menu')
        <!-- サイトのタイトル -->
        <div class="header-center">
            <h1><a href="{{ route('home') }}" class="site-title font-georgia">MyFashion</a></h1>
         </div>

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
    document.addEventListener('DOMContentLoaded', function () {
        const menuBtn = document.getElementById('menu-btn');
        const sideMenu = document.getElementById('side-menu');

        menuBtn.addEventListener('click', function () {
            sideMenu.classList.toggle('open');
        });
        document.addEventListener('click', function (e) {
            if (!sideMenu.contains(e.target) && e.target !== menuBtn) {
                sideMenu.classList.remove('open');
            }
        });
    });
</script>
<style>
    /* 日本語フォント */
    /* @import url('https://fonts.googleapis.com/css2?family=Itim&family=Zen+Maru+Gothic&display=swap'); */
    /* 英語フォント */
    /* @import url('https://fonts.googleapis.com/css2?family=Itim&display=swap'); */

    /* サイトのテーマカラー */

        /* 背景色 */
        body {
            /* アリスブルー */
            background-color: #f0f8ff; 
        }
        /* カレンダーの背景 */
        .fc-scrollgrid-sync-table {
            background-color:rgb(255, 255, 255);
        }
        /* メインのカラー */
        .primary-color {
            background-color:rgb(18, 39, 83);
        }
        /* セカンダリカラー */


    /* サイト全体設定 */
    body{
        margin: 0;
    }
    .font-georgia {
        font-family: 'Georgia', serif;
    }
    a:link{
       color:#0e4a12;
    }
    button:hover,
    a:hover {
        opacity: 0.8;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        align-content: center;
        text-align: center;
        margin: auto;
    }
    /* 写真のスタイル */
    .fashion-photo img{
        height:100%;
        object-fit:cover;
        border-radius:8px;
    }

    /* ヘッダー部 */
    header {
        height: 100px; 
        padding: 0 10px;
        border-bottom: 1px solid #ccc; 
        /* background-color:rgb(59, 116, 231); */
        color: #ffffff;
        display: flex;
        text-align: center;
    }


    .page-header{
        text-align: center;
        color:#000000;
        
    }
    .your-name{
        text-align: center;
        color:#000000;
    }

    .site-title:visited,
    .site-title:link
    {
        text-decoration: none;
        color:rgb(255, 255, 255);
    }


    /* フッター */
    footer {
        padding: 30px;
        text-align: center;
        font-size: .9rem;
        color: #777;
    }
</style>
