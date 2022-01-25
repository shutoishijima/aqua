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
        <div class="top">
            <div class="top-logo">
                <img src={{ asset('img/logo.png') }} alt="R.E.O online school" />
            </div>

            <div class="top-name center m-b40">
                <h1 class="futura-m-i">R.E.O online school</h1>
            </div>

            <div class="top-form m-b10">
                <form method='post' action='login' class="m-b10">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-text m-b20">
                        <h2 class="futura-m-i m-b10">Mail Address<span>　メールアドレス</span></h2>
                        <input type='text' name='mail' value="{{ old('mail') }}" placeholder="sample@comvace.com" />
                    </div>
                    <div class="form-text m-b10">
                        <h2 class="futura-m-i m-b10">Password<span>　パスワード</span></h2>
                        <input type='password' name='pass' value="{{ old('pass') }}" placeholder="sample12345" />
                    </div>

                    <div class="forgot m-b30">
                        <p class="right">
                            <a href="forgot"><span class="white border">※パスワードを忘れてしまった方はこちら</span></a>
                        </p>
                    </div>

                    <div class="submit">
                        <input type='submit' value='ロ グ イ ン' name='submit' />
                    </div>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </form>
            </div>

            <div class="register">
                <a href="register">
                    <div class="register-botann center">
                        <p>新規アカウント登録はこちら</p>
                    </div>
                </a>
            </div>
        </div>

        @component('parts.footer')
        @endcomponent
    </body>
</html>
