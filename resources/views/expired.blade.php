<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
        <link rel="stylesheet" href="https://use.typekit.net/dxj2hcp.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        
    </head>
    <body class="main">
        <div class="repass-top m-t40 center m-b40">
            <img src={{ asset('img/error.png') }} alt="セッションが切れています" class="m-b20" />
            <p class="bold">セッションが切れています</p>
        </div>

        <div class="reset-blue p-t40 p-b40">
            <p class="center lh15 m-b40">お手数ですがパスワードの再設定画面より<br>再度お手続きください。</p>

            <div class="back2 center">
                <a href="forgot">
                    <p>
                        <i class="fas fa-arrow-left"></i>
                        パスワードの再設定へ
                    </p>
                </a>
            </div>
        </div>

        @component('parts.footer')
        @endcomponent

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src={{ asset('js/main.js') }}></script>
    </body>
</html>
