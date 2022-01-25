<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        
    </head>
    <body class="main">
    @component('parts.header')
    @endcomponent

        <div class="contents-page">
            <div class="content-box flex">
                <div class="c-box-l">
                    <a href="contents/sales">
                        <img src={{ asset($sales[0]->content_img_path) }} alt="営業力講義" />
                    </a>
                </div>
                <div class="c-box-r">
                    <a href="contents/sales">
                        <div class="content-title">
                            <p>営業　全 {{ $contents[0]->cnt }}動画</p>
                        </div>
                        <div class="content-text">
                            <p>クロージング特化の営業トークには共通のポイントが！構成に当てはめるだけであなたもトップ営業マンに！​</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="content-box flex">
                <div class="c-box-l">
                    <a href="contents/programming">
                        <img src={{ asset($programming[0]->content_img_path) }} alt="プログラミング講義" />
                    </a>
                </div>
                <div class="c-box-r">
                    <a href="contents/programming">
                        <div class="content-title">
                            <p>プログラミング　全 {{ $contents[1]->cnt }}動画</p>
                        </div>
                        <div class="content-text">
                            <p>自分の作りたいを形に。頭で作れるものは必ず作れるのだから。そもそもプログラミングとは何かもわからない初心者からでも始められる！​​</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="content-box flex">
                <div class="c-box-l">
                    <a href="contents/sales">
                        <img src={{ asset($sales[0]->content_img_path) }} alt="営業力講義" />
                    </a>
                </div>
                <div class="c-box-r">
                    <a href="contents/sales">
                        <div class="content-title">
                            <p>営業　全 {{ $contents[0]->cnt }}動画</p>
                        </div>
                        <div class="content-text">
                            <p>クロージング特化の営業トークには共通のポイントが！構成に当てはめるだけであなたもトップ営業マンに！​</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="content-box flex">
                <div class="c-box-l">
                    <a href="contents/programming">
                        <img src={{ asset($programming[0]->content_img_path) }} alt="プログラミング講義" />
                    </a>
                </div>
                <div class="c-box-r">
                    <a href="contents/programming">
                        <div class="content-title">
                            <p>プログラミング　全 {{ $contents[1]->cnt }}動画</p>
                        </div>
                        <div class="content-text">
                            <p>自分の作りたいを形に。頭で作れるものは必ず作れるのだから。そもそもプログラミングとは何かもわからない初心者からでも始められる！​​</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src={{ asset('js/main.js') }}></script>
    </body>
</html>