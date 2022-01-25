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

        <div class="all-chat">
            @foreach($chats as $chat)
            <a href="chat/{{$chat->from_user}}">
                <div class="chat-list flex">
                    <div class="card-img chat-img">
                        @if($chat->user_img == null)
                            <img src="{{ asset('img/profile.png') }}" alt="プロフィール写真" id="ajax_img" />
                        @else
                            <img src="{{ asset('storage' .'/' .$chat->user_img) }}" alt="プロフィール写真" id="ajax_img" />
                        @endif
                    </div>
                    <div class="chat-right">
                        <div class="chat-name">
                            <p>
                                {{$chat->from_user_name}}
                                @if($chat->cnt != 0)
                                    <span>{{$chat->cnt}}</span>
                                @endif
                            </p>
                        </div>
                        <div class="chat-text">
                            <p>{{$chat->message}}</p>
                        </div>
                    </div>
                    <div class="chat-time">
                        <p>{{Common::get_date_format($chat->chat_date)}}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src={{ asset('js/main.js') }}></script>
    </body>
</html>