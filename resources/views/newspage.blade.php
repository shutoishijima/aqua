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
        @component('parts.hamburger')
        @endcomponent

        <div class="header">
            <a href="{{ url('mypage') }}" class="header-left-icon">
                <i class="fas fa-chevron-left"></i>
            </a>
            <p class="header-title bold">新着情報</p>
        </div>

        <div class="news-page">
            <div class="news-img center m-b10">
                <img src={{ asset('storage' .'/news_img/' .$news[0]->news_img) }} alt="ニュースサムネイル" />
            </div>

            <div class="news-day m-b20 right">
                <p>{{Common::get_news_date_format($news[0]->news_create_at)}}</p>
            </div>

            <div class="news-title bold m-b30">
                <p>{{$news[0]->news_title}}</p>
            </div>

            <div class="news-text lh15 m-b60">
                <p>{{$news[0]->news_text}}</p>
            </div>
        </div>

        <div class="back2 center m-t30">
            <a href="{{ url('mypage#news') }}">
                <i class="fas fa-arrow-left"></i>マイページへもどる
            </a>
        </div>

        @component('parts.footer')
        @endcomponent
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src={{ asset('js/slick.min.js') }}></script>
        <script type="text/javascript" src={{ asset('js/main.js') }}></script>
    </body>
</html>