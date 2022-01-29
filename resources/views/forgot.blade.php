<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
        <link rel="stylesheet" href="https://use.typekit.net/dxj2hcp.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        
    </head>
    <body class="main">
        <div class="repass-top m-t40 center m-b40">
            <img src={{ asset('img/lock.png') }} alt="パスワードの再設定" class="m-b20" />
            <p class="bold">パスワードの再設定</p>
        </div>

        <div class="reset-blue p-t40 p-b40">
            <p class="center lh15 m-b20">新しくパスワードを設定するアカウントの<br>メールアドレスを入力してください。</p>

            <div class="reset-form">
                <form method='post' action='reset'>
                    <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                    <div class="form-text m-b40">
                        <input type='text' name='mail' value="{{ old('mail') }}" placeholder="sample@comvace.com" />
                    </div>

                    <p class="center lh15 m-b40">ご入力いただいたメールアドレスへ<br>再設定用メールを送信いたします。</p>

                    <div class="submit">
                        <input type='submit' value='送　信' name='reset' />
                    </div>
                </form>
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="login-back2 center m-t30">
                <a href="{{ url('') }}">
                    TOPに戻る
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
