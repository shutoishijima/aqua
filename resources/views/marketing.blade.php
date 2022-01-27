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
        <div class="contents-page">
            @component('parts.hamburger2')
            @endcomponent
            <div class="header header2">
                <a href="{{ url('mypage#category') }}" class="header-left-icon">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <p class="header-title bold">{{ $marketing[0]->content_category }}</p>
            </div>

            <div class="category-amo right bold m-t20 m-b20">
                <p>受講済み 0 / 
                    @foreach ($amo as $amo)
                        @if ($amo->content_category == '戦略・マーケティング')
                            {{ $amo->cnt }}
                        @endif
                    @endforeach
                </p>
            </div>

            @foreach ($marketing as $marketing)
                <a href="{{$marketing->content_category}}/{{$marketing->content_name}}" class="c-link">
                    <div class="content-box flex m-b10">
                        <div class="c-box-l">
                            @if ($marketing->content_lock == '0')
                                <img src={{ asset($marketing->content_img_path) }} alt="{{ $marketing->content_name }}" />
                            @else
                                <img src={{ asset($marketing->content_img_path_lock) }} alt="{{ $marketing->content_name }}" />
                            @endif
                        </div>
                        <div class="c-box-r">
                            <div class="content-day flex flex-between">
                                <p>{{Common::get_news_date_format($marketing->content_create_at)}}</p>
                                <p><i class="fas fa-history"></i> 約{{ $marketing->content_min }}分</p>
                            </div>
                            <div class="content-title bold lh15 m-b10">
                                <p>{{ $marketing->content_name }}</p>
                            </div>
                            <div class="content-view">
                                <p class="red">受講済み​<i class="fas fa-check red"></i></p>
                            </div>
                        </div>
                    </div>
                </a>

                <?php $total ++; ?>
            
            @endforeach

            <p class="m-t40 m-b40 center"><a href="#">ページの先頭へ</a></p>

            <div class="back2 center">
                <a href="mypage">
                    <i class="fas fa-arrow-left"></i>マイページへ戻る
                </a>
            </div>

            <div class="pay-button">
                <a href="">
                    <p class="center">有料会員登録</p>
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