<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
        <link rel="stylesheet" href="https://use.typekit.net/dxj2hcp.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        
    </head>
    <body class="main">
        <div class="check-status flex flex-between lh2 center m-b60">
            <p class="bold"><i class="fas fa-check"></i>入力</p>
            <p class="bold"><i class="fas fa-check"></i>確認</p>
            <p class="bold check-status-last"><i class="fas fa-check"></i>完了</p>
        </div>

        <div class="thanks-page center">
            <p class="bold lh15 m-b20">ご登録いただきありがとうございます。</p>
            <p class="bold lh15 m-b60">早速ログインして気になる動画コンテンツを<br>視聴してみましょう！</p>

            <div class="login-back">
                <a href="{{ url('') }}">
                    ログインページはこちら
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>

        @component('parts.footer')
        @endcomponent

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src={{ asset('js/main.js') }}></script>
    </body>
</html>
