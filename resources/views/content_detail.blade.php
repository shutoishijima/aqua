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
            @component('parts.hamburger')
            @endcomponent
            <div class="header">
                @if ($content[0]->content_category == '組織・リーダーシップ')
                    <a href="{{ url('category/組織・リーダーシップ') }}" class="header-left-icon">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @elseif ($content[0]->content_category == '思考')
                    <a href="{{ url('category/思考') }}" class="header-left-icon">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @elseif ($content[0]->content_category == '戦略・マーケティング')
                    <a href="{{ url('category/戦略・マーケティング') }}" class="header-left-icon">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @elseif ($content[0]->content_category == '会計・財務')
                    <a href="{{ url('category/会計・財務') }}" class="header-left-icon">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @elseif ($content[0]->content_category == 'キャリア・志')
                    <a href="{{ url('category/キャリア・志') }}" class="header-left-icon">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @elseif ($content[0]->content_category == '変革')
                    <a href="{{ url('category/変革') }}" class="header-left-icon">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @endif
                <p class="header-title bold">{{ $content[0]->content_name}}</p>
            </div>

            <div class="content-detail">
                <div class="c-d-t">
                    @if ($content[0]->content_lock == '0')
                        <video src={{ asset($content[0]->content_path) }} controls></video>
                    @else
                        <img src={{ asset($content[0]->content_img_path_lock) }} alt="{{ $content[0]->content_name }}" />
                    @endif
                </div>
                <div class="c-d-b">
                    <div class="content-day flex flex-between">
                        <p class="bold">{{Common::get_news_date_format($content[0]->content_create_at)}}</p>
                        <p><i class="fas fa-history"></i> 約{{ $content[0]->content_min}}分</p>
                    </div>
                    <div class="bold lh15">
                        <p>{{ $content[0]->content_name }}</p>
                    </div>
                    <div class="content-text">
                        <p>{{ $content[0]->content_detail }}</p>
                    </div>
                </div>
            </div>

            <div class="next-title bold">
                <p class="white">次の動画はこちら</p>
            </div>

            @foreach ($next_contents as $next_content)
                <a href='{{ url("category/$content_category/$next_content->content_name") }}' class="c-link">
                    <div class="content-box flex">
                        <div class="c-box-l">
                            @if ($next_content->content_lock == '0')
                                <img src={{ asset($next_content->content_img_path) }} alt="{{ $next_content->content_name }}" />
                            @else
                                <img src={{ asset($next_content->content_img_path_lock) }} alt="{{ $next_content->content_name }}" />
                            @endif
                        </div>
                        <div class="c-box-r">
                            <div class="content-day flex flex-between">
                                <p>{{Common::get_news_date_format($next_content->content_create_at)}}</p>
                                <p><i class="fas fa-history"></i> 約{{ $next_content->content_min}}分</p>
                            </div>
                            <div class="content-title bold lh15">
                                <p>{{ $next_content->content_name }}</p>
                            </div>
                            <div class="content-view">
                                <p class="c-d-t">
                                    <?php
                                        echo mb_strimwidth( $next_content->content_detail, 0, 70, '...', 'UTF-8' )
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

            @if (count($next_contents) == 0)
                <p class="center m-t40">カテゴリー最後のコンテンツです。</p>
            @endif

            <div class="back2 center m-t40">
                <a href="{{ url('category/組織・リーダーシップ') }}">
                    <i class="fas fa-arrow-left"></i>動画一覧へもどる
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