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

        <div class="comment-page">
            <div class="timeline-box flex b-n">
                <div class="timeline-left">
                    @if($timeline[0]->user_img == null)
                        <div class="card-img">
                            <img src={{ asset('img/profile.png') }} alt="プロフィール写真" />
                        </div>
                    @else
                        <div class="card-img">
                            <img src={{ asset('storage' .'/' .$timeline[0]->user_img_path .$timeline[0]->user_img) }} alt="プロフィール写真" />
                        </div>
                    @endif
                </div>
                <div class="timeline-right block">
                    <div class="t-r-top flex">
                        <div class="tl-name">
                            <p>{{$timeline[0]->user_name}}</p>
                        </div>
                        <div class="tl-time">
                            <p>{{Common::get_date_format($timeline[0]->timeline_date)}}</p>
                        </div>
                    </div>
                    <div class="t-r-middle">
                        <p>{{$timeline[0]->timeline_text}}</p>
                    </div>
                </div>
            </div>

            <div class="com-line">
                <p>({{$comment_amo[0]->cnt}})コメント</p>
            </div>

            @foreach($comment as $comment)
                <div class="timeline-box flex b-n">
                    <div class="timeline-left">
                        @if($comment->user_img == null)
                            <div class="card-img">
                                <img src={{ asset('img/profile.png') }} alt="プロフィール写真" />
                            </div>
                        @else
                            <div class="card-img">
                                <img src={{ asset('storage' .'/' .$comment->user_img_path .$comment->user_img) }} alt="プロフィール写真" />
                            </div>
                        @endif
                    </div>
                    <div class="timeline-right block">
                        <div class="t-r-top flex">
                            <div class="tl-name">
                                <p>{{$comment->user_name}}</p>
                            </div>
                            <div class="tl-time">
                                <p>{{Common::get_date_format($comment->comment_date)}}</p>
                            </div>
                        </div>
                        <div class="t-r-middle">
                            <p>{{$comment->comment_text}}</p>
                        </div>
                    </div>
                </div>
            @endforeach

            @if($errors->has('new_comment'))
                @foreach($errors->get('new_comment') as $message)
                    <p class="error-m red center">{{ $message }}</p>
                @endforeach
            @endif

            <div class="timeline comment-post">
                <form method='post' action={{ url('new_comment') }}>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="timeline_id" value="{{$timeline[0]->timeline_id}}">
                    <div class="form-text flex">
                        <textarea name="new_comment"></textarea>
                        <div class="submit">
                            <input type='submit' value='コメントする' name='submit' id="btn" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src={{ asset('js/main.js') }}></script>
        <script>
            $(document).ready(function() {
                // 前操作スクロール位置の戻し
                let pos = localStorage.getItem('position_key');
                $('html, body').animate({scrollTop: pos}, 'normal');
                // クリア(位置初期化)
                localStorage.clear();

                /**
                 * 登録ボタン押下処理
                 */
                $('#btn').on('click', function(e) {
                    // 現在位置の取得
                    let scrollPos = $(document).scrollTop();
                    localStorage.setItem('position_key', scrollPos);
                    // form送信
                    $('#form').submit();
                });
            });
        </script>
    </body>
</html>