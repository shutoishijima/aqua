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

                <div class="badge flex align-center flex-between">
                    <div class="c-badge">
                        <img src={{ asset('img/badge.png') }} alt="組織リーダーシップ"/>
                        <p>組織<br>リーダーシップ</p>
                    </div>
                    <div class="c-badge">
                        <img src={{ asset('img/badge.png') }} alt="組織リーダーシップ"/>
                        <p>組織<br>リーダーシップ</p>
                    </div>
                    <div class="c-badge">
                        <img src={{ asset('img/badge.png') }} alt="組織リーダーシップ"/>
                        <p>組織<br>リーダーシップ</p>
                    </div>
                    <div class="c-badge">
                        <img src={{ asset('img/badge.png') }} alt="組織リーダーシップ"/>
                        <p>組織<br>リーダーシップ</p>
                    </div>
                    <div class="c-badge">
                        <img src={{ asset('img/badge.png') }} alt="組織リーダーシップ"/>
                        <p>組織<br>リーダーシップ</p>
                    </div>
                    <div class="c-badge">
                        <img src={{ asset('img/badge.png') }} alt="組織リーダーシップ"/>
                        <p>組織<br>リーダーシップ</p>
                    </div>
                    <div class="c-badge">
                        <img src={{ asset('img/badge.png') }} alt="組織リーダーシップ"/>
                        <p>組織<br>リーダーシップ</p>
                    </div>
                    <div class="c-badge">
                        <img src={{ asset('img/badge.png') }} alt="組織リーダーシップ"/>
                        <p>組織<br>リーダーシップ</p>
                    </div>
                    <div class="c-badge">
                        <img src={{ asset('img/badge.png') }} alt="組織リーダーシップ"/>
                        <p>組織<br>リーダーシップ</p>
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
                    <p class="profile-inst m-b20">Instagram：<span>@</span>{{$users[0]->user_inst}}</p>
                </div>

                <div class="profile-inst-icon">
                    <a href="https://www.instagram.com/{{$users[0]->user_inst}}/" target="_blank" rel="noopener noreferrer" ><i class="fab fa-instagram"></i></a>
                </div>
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