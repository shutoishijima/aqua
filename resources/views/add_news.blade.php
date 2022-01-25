<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
        <link rel="stylesheet" href="https://use.typekit.net/dxj2hcp.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        
    </head>
    <body class="main">
        <div class="connection-page">
            <div class="header m-b30 header2">
                <p class="header-title bold">お知らせ新規追加</p>

                <a href="mypage" class="header-times-icon">
                    <i class="fas fa-times"></i>
                </a>
            </div>

            <div class="register-form profile-f">
                <form method='post' action={{ url('new_news') }} enctype=multipart/form-data>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-text profile-form m-b30">
                        <h5 class="m-b10">サムネイル画像</h5>
                        <div class="center m-b10">
                            <input type="file" name="news_img" />
                        </div>
                    </div>
                    @if($errors->has('news_img'))
                        @foreach($errors->get('news_img') as $message)
                            <p class="error-m red">{{ $message }}</p>
                        @endforeach
                    @endif 

                    <div class="form-text profile-form">
                        <h5 class="m-b10">タイトル</h5>
                        <div class="center m-b10">
                            <input type='text' name='title' value="{{ old('title') }}" />
                        </div>
                    </div>
                    <p class="bold right m-b20 profile-com">※100文字以内</p>
                    @if($errors->has('title'))
                        @foreach($errors->get('title') as $message)
                            <p class="error-m red">{{ $message }}</p>
                        @endforeach
                    @endif 

                    <div class="form-text profile-form">
                        <h5 class="m-b10">本文</h5>
                        <textarea name='text' value="{{ old('text') }}"></textarea>
                    </div>
                    <p class="bold right m-b20 profile-com">※500文字以内</p>
                    @if($errors->has('text'))
                        @foreach($errors->get('text') as $message)
                            <p class="error-m red">{{ $message }}</p>
                        @endforeach
                    @endif 

                    <p class="error-m red center m-t30 lh15">
                        会員全員に通知メールを送信します。<br>
                        会員数が多いほど時間がかかりますが<br>
                        そのままお待ちください。<br>
                        ボタンは一回しか押さないように！！！！<br>
                        ※体感速度 =　一人につき 1~2秒
                    </p>

                    <div class="submit profile-submit center">
                        <input type='submit' value='投　稿' name='submit' />
                    </div>
                </form>
            </div>
        </div>

        @component('parts.footer')
        @endcomponent

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src={{ asset('js/slick.min.js') }}></script>
        <script type="text/javascript" src={{ asset('js/main.js') }}></script>
    </body>
</html>