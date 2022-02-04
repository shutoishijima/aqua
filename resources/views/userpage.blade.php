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

        <div class="profile">
            <div class="header">
                <a href="{{ url('connection') }}" class="header-left-icon">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <p class="header-title bold">ユーザー</p>
            </div>

            <div class="profile-img">
                @if($users[0]->user_img == null and $users[0]->user_gender == "男")
                    <img src={{ asset('img/men.png') }} alt="プロフィール写真"/>
                @elseif($users[0]->user_img == null and $users[0]->user_gender == "女")
                    <img src={{ asset('img/women.png') }} alt="プロフィール写真"/>
                @else
                    <img src={{ asset('storage' .'/img/' .$users[0]->user_img) }} alt="プロフィール写真" />
                @endif

                <div class="badge flex flex-between">
                    <div class="c-badge">
                        @foreach ($amo as $amount)
                            @if ($amount->content_category == '組織・リーダーシップ')
                                @if ($amount->cnt == count($c1_viewed_count))
                                    <img src={{ asset('img/complete_badge.png') }} alt="組織・リーダーシップ"/>
                                @else
                                    <img src={{ asset('img/badge.png') }} alt="組織・リーダーシップ"/>
                                @endif
                            @endif
                        @endforeach
                        <p>組織<br>リーダーシップ</p>
                    </div>
                    <div class="c-badge">
                        @foreach ($amo as $amount)
                            @if ($amount->content_category == '思考')
                                @if ($amount->cnt == count($c2_viewed_count))
                                    <img src={{ asset('img/complete_badge.png') }} alt="思考"/>
                                @else
                                    <img src={{ asset('img/badge.png') }} alt="思考"/>
                                @endif
                            @endif
                        @endforeach
                        <p class="m-t10">思考</p>
                    </div>
                    <div class="c-badge">
                        @foreach ($amo as $amount)
                            @if ($amount->content_category == '戦略・マーケティング')
                                @if ($amount->cnt == count($c3_viewed_count))
                                    <img src={{ asset('img/complete_badge.png') }} alt="戦略・マーケティング"/>
                                @else
                                    <img src={{ asset('img/badge.png') }} alt="戦略・マーケティング"/>
                                @endif
                            @endif
                        @endforeach
                        <p>戦略<br>マーケティング</p>
                    </div>
                    <div class="c-badge">
                        @foreach ($amo as $amount)
                            @if ($amount->content_category == '会計・財務')
                                @if ($amount->cnt == count($c4_viewed_count))
                                    <img src={{ asset('img/complete_badge.png') }} alt="会計・財務"/>
                                @else
                                    <img src={{ asset('img/badge.png') }} alt="会計・財務"/>
                                @endif
                            @endif
                        @endforeach
                        <p>会計・財務</p>
                    </div>
                    <div class="c-badge">
                        @foreach ($amo as $amount)
                            @if ($amount->content_category == 'キャリア・志')
                                @if ($amount->cnt == count($c5_viewed_count))
                                    <img src={{ asset('img/complete_badge.png') }} alt="キャリア・志"/>
                                @else
                                    <img src={{ asset('img/badge.png') }} alt="キャリア・志"/>
                                @endif
                            @endif
                        @endforeach
                        <p>キャリア・志</p>
                    </div>
                    <div class="c-badge">
                        @foreach ($amo as $amount)
                            @if ($amount->content_category == '変革')
                                @if ($amount->cnt == count($c6_viewed_count))
                                    <img src={{ asset('img/complete_badge.png') }} alt="変革"/>
                                @else
                                    <img src={{ asset('img/badge.png') }} alt="変革"/>
                                @endif
                            @endif
                        @endforeach
                        <p>変革</p>
                    </div>
                </div>

                <div class="profile-bottom left">
                    <p class="profile-name m-b10">
                        {{$users[0]->user_name}}
                        <span class="profile-age">
                            （{{$users[0]->user_age}}）
                        </span>
                        <i class="fas fa-map-marker-alt"></i>
                        <span class="profile-area">
                            {{$users[0]->user_area}}
                        </span>
                    </p>
                    <p class="profile-job m-b10">{{$users[0]->user_job}}</p>
                    <p class="profile-inst m-b20">Instagram：
                        @if ($users[0]->user_inst != "")
                            <span>@</span>{{$users[0]->user_inst}}
                        @else
                            未設定
                        @endif
                    </p>
                </div>

                @if ($users[0]->user_inst != "")
                    <div class="profile-inst-icon">
                        <a href="https://www.instagram.com/{{$users[0]->user_inst}}/" target="_blank" rel="noopener noreferrer" ><i class="fab fa-instagram"></i></a>
                    </div>
                @endif
            </div>

            <div class="profile-text p-t20 p-b20 shadow">
                <p>{{$users[0]->user_text}}</p>
            </div>
        </div>

        <div class="back2 center m-t30">
            <a href="{{ url('connection') }}">
                <i class="fas fa-arrow-left"></i>ユーザー 一覧へもどる
            </a>
        </div>

        @component('parts.footer')
        @endcomponent
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src={{ asset('js/slick.min.js') }}></script>
        <script type="text/javascript" src={{ asset('js/main.js') }}></script>
    </body>
</html>