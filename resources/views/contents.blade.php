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
        <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        
    </head>
    <body class="main">
        <div class="contents-page contents-detail-page">
            @component('parts.hamburger2')
            @endcomponent
            <div class="header header2">
                <a href="{{ url('mypage#pickup') }}" class="header-left-icon">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <p class="header-title bold">ピックアップ動画</p>
            </div>

            <div class="pickup-margin">
                @foreach ($pickup as $pickup)
                    <div class="content-detail">
                        <div class="c-d-t">
                            <video src={{ asset($pickup->content_path) }} controls></video>
                        </div>
                        <div class="c-d-b">
                            <div class="content-day flex flex-between">
                                <p class="bold">{{Common::get_news_date_format($pickup->content_create_at)}}</p>
                                <p><i class="fas fa-history"></i> 約{{ $pickup->content_min}}分</p>
                            </div>
                            <div class="bold lh15">
                                <p>{{ $pickup->content_name }}</p>
                            </div>
                            <div class="content-text">
                                <p>{{ $pickup->content_detail }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="back2 center m-t40">
                <a href="{{ url('mypage') }}">
                    <i class="fas fa-arrow-left"></i>マイページへもどる
                </a>
            </div>
        </div>
        
        @component('parts.footer')
        @endcomponent
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src={{ asset('js/slick.min.js') }}></script>
        <script type="text/javascript" src={{ asset('js/main.js') }}></script>
    </body>
</html>