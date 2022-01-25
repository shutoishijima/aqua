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
            <div class="category-title center">
                <h1>プログラミング</h1>
            </div>

            @foreach ($programming as $programming)
                @if ($programming->content_lock == '0')
                    <div class="content-for">
                        <div class="content-name">
                            <p>{{ $total }}、{{ $programming->content_name }}</p>
                        </div>

                        <div class="content-video center">
                            <video src={{ asset($programming->content_path) }} controls></video>
                        </div>

                        <div class="content-detail">
                            <p>{{ $programming->content_detail }}</p>
                        </div>
                    </div>
                @elseif ($users[0]->user_status == '1')
                    <div class="content-for">
                        <div class="content-name">
                            <p><i class="fas fa-unlock"></i><span>有料会員限定公開</span></p>
                            <p>{{ $total }}、{{ $programming->content_name }}</p>
                        </div>

                        <div class="content-video center">
                            <video src={{ asset($programming->content_path) }} controls></video>
                        </div>

                        <div class="content-detail">
                            <p>{{ $programming->content_detail }}</p>
                        </div>
                    </div>
                @else
                    <div class="content-for">
                        <div class="content-name">
                            <p><i class="fas fa-lock"></i><span>有料会員限定公開</span></p>
                            <p>{{ $total }}、{{ $programming->content_name }}</p>
                        </div>

                        <div class="content-video center">
                            <img src={{ asset($programming->content_img_path) }} alt="プログラミング講義" />
                        </div>

                        <div class="content-detail">
                            <p>{{ $programming->content_detail }}</p>
                        </div>
                    </div>
                @endif

                <?php $total ++; ?>
            
            @endforeach
        </div>

        <div class="pay-button">
            <a href="">
                <p class="center">有料会員登録</p>
            </a>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src={{ asset('js/main.js') }}></script>
    </body>
</html>