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
            @foreach($openchats as $chat)
                {{-- ログインしているユーザーじゃない場合 --}}
                @if ($users[0]->user_id != $chat->user_id)
                    <div class="chat-list flex chat-left">
                        <div class="card-img chat-img">
                            @if($chat->user_img == null)
                                <img src={{ asset('img/profile.png') }} alt="プロフィール写真" id="ajax_img" />
                            @else
                                <img src={{ asset('storage' .'/' .$chat->user_img_path .$chat->user_img) }} alt="プロフィール写真" id="ajax_img" />
                            @endif
                        </div>
                        <div class="chat-right">
                            <div class="chat-name">
                                <p>{{$chat->user_name}}</p>
                            </div>
                            <div class="chat-text">
                                <p>{{$chat->message}}</p>
                            </div>
                        </div>
                        <div class="chat-time">
                            <p>{{Common::get_date_format($chat->chat_date)}}</p>
                        </div>
                    </div>
                {{-- ログインしているユーザーの場合 --}}
                @else
                    <div class="chat-list flex chat-right2">
                         <div class="card-img chat-img">
                            @if($users[0]->user_img == null)
                                <img src={{ asset('img/profile.png') }} alt="プロフィール写真" id="ajax_img" />
                            @else
                                <img src={{ asset('storage' .'/' .$users[0]->user_img_path .$users[0]->user_img) }} alt="プロフィール写真" id="ajax_img" />
                            @endif
                        </div>
                        <div class="chat-right right">
                            <div class="chat-name">
                                <p>{{$chat->user_name}}</p>
                            </div>
                            <div class="chat-text right">
                                <p>{{$chat->message}}</p>
                            </div>
                        </div>
                        <div class="chat-time">
                            <p>{{Common::get_date_format($chat->chat_date)}}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div id="last_message"></div>

        <div class="send-message flex flex-between">
            <textarea id="new_message"></textarea>
            <input type="button" id="ajax_btn" value="送信" class="" />
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(function() {
                $("#ajax_btn").on('click', function(e) {

                    // 記載しなければ別のURLに誘導される
                    e.preventDefault();

                    // メッセージを取得
                    let new_message = $('#new_message').val();

                    // 送信元を取得
                    let from_user = '{{$from_user}}';

                    // 送信用データ設定
                    let sendData = {
                        'new_message':new_message,
                        'from_user':from_user,
                    };
                    console.log(sendData);

                    // ajaxセットアップ
                    $.ajaxSetup({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                    });

                    $.ajax({
                        type: 'post',
                        url: "{{ url('entry_chat') }}",
                        dataType: 'json',
                        data: sendData,

                    // 接続が出来た場合の処理
                    }).done(function(data) {
                        console.log(data);

                        let reset_target = document.getElementById("new_message");
                        reset_target.value = '';

                        window.location.reload();

                    // ajax接続が出来なかった場合の処理
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR);
                        console.log(textStatus);
                        console.log(errorThrown);
                    });
                });
            });
        </script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src={{ asset('js/main.js') }}></script>
        <script>
            //メッセージの最新位置に調整
            jQuery(function() {
                const chat_button = $('#last_message').offset().top;
                $("html").animate({scrollTop: chat_button});
            });
        </script>
    </body>
</html>