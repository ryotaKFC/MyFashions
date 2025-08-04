<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    {{-- 背景 --}}
    <div class="bg-base/5 brightness-200 contrast-50 fixed inset-0 -z-10 min-h-screen"></div>
    {{-- ヘッダー --}}
    <header class="py-6 grid grid-cols-3 bg-base">
        <x-hamburger :items="[
            ['label' => 'HOME',     'href' => '/home'],
            ['label' => 'ALL',      'href' => '/fashions'],
            ['label' => 'FAVORITE', 'href' => '/bookmarks'],
        ]" />
        <h1 class="m-auto">
            <a href="{{ route('home') }}" class="font-georgia text-5xl text-white">MyFashions</a>
        </h1>
    </header>

    {{-- メインコンテンツ --}}
    <main class="container">
        @yield('content')
    </main>

    {{-- フッター --}}
    <footer>
        &copy; チームブロッコリー制作物
    </footer>
</body>
</html>

<style>
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
    /* header {
        height: 100px; 
        padding: 0 10px;
        border-bottom: 1px solid #ccc; 
        color: #ffffff;
        display: flex;
        text-align: center;
    } */


    .page-header{
        text-align: center;
        color:#000000;
        
    }
    .your-name{
        text-align: center;
        color:#000000;
    }


    /* フッター */
    footer {
        padding: 30px;
        text-align: center;
        font-size: .9rem;
        color: #777;
    }
</style>
