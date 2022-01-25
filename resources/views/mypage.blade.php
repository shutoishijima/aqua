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
        <link rel="stylesheet" href="https://unpkg.com/cropperjs/dist/cropper.css" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        
    </head>
    <body class="main p-b50">
        <div class="mypage">
            <div class="mypage-title center bold">
                <p class="m-b10">MY PAGE</p>
                <p>マイページ</p>

                @if($users[0]->user_id == 1)
                    <a href="add-news"><i class="fas fa-pen"></i></a>
                @endif
                @if($users[0]->user_id == 1)
                    <a href="delete-news"><i class="fas fa-trash"></i></a>
                @endif
            </div>

            <div class="mycard">
                <div class="card-top flex">
                    <div class="card-left">
                    </div>
                    <div class="card-right">
                        <p class="card-name bold">{{$users[0]->user_name}}<span> 様のステータス</span></p>  
                    </div>
                </div>

                <div class="card-bottom flex">
                    <div class="card-left">
                    </div>
                    <div class="card-right flex align-center">
                        <div class="c-r-l bold">
                            <p class="m-b10"><span>今月の学習時間</span></p>
                            <p class="month-time">160.5時間</p>
                        </div>
                        <div class="c-r-r">
                            <p><span>先月より</span><br><span>20.4時間多い</span></p>
                        </div>
                    </div>
                </div>

                <div class="card-img">
                    @if($users[0]->user_img == null and $users[0]->user_gender == "男")
                        <img src={{ asset('img/men.png') }} alt="プロフィール写真"/>
                    @elseif($users[0]->user_img == null and $users[0]->user_gender == "女")
                        <img src={{ asset('img/women.png') }} alt="プロフィール写真"/>
                    @else
                        <img src={{ asset('storage' .'/img/' .$users[0]->user_img) }} alt="プロフィール写真" />
                    @endif                 
                </div>
            </div>

            <div class="mypage-profile m-b40">
                <p class="switch-button center">
                    プロフィールを確認<i class="fas fa-plus"></i>
                </p>
                <div class="profile">
                    <div class="profile-img m-b20">
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

                    <div class="profile-text m-b40">
                        <p>{{$users[0]->user_text}}</p>
                    </div>

                    <a href="edit" class="edit">編集する</a>
                </div>
            </div>

            <div class="mycourse p-t40 p-b40 m-b40">
                <p class="bold center m-b20">完了コース一覧</p>

                <div class="badge2 flex align-center flex-between">
                    <div class="c-badge2">
                        <img src={{ asset('img/badge.png') }} alt="組織リーダーシップ"/>
                        <p>組織<br>リーダーシップ</p>
                    </div>
                    <div class="c-badge2">
                        <img src={{ asset('img/badge.png') }} alt="組織リーダーシップ"/>
                        <p>組織<br>リーダーシップ</p>
                    </div>
                    <div class="c-badge2">
                        <img src={{ asset('img/badge.png') }} alt="組織リーダーシップ"/>
                        <p>組織<br>リーダーシップ</p>
                    </div>
                </div>

                <div class="right">
                    <div class="center">
                        <div class="badge2 flex align-center flex-between">
                            <div class="c-badge2">
                                <img src={{ asset('img/badge.png') }} alt="組織リーダーシップ"/>
                                <p>組織<br>リーダーシップ</p>
                            </div>
                            <div class="c-badge2">
                                <img src={{ asset('img/badge.png') }} alt="組織リーダーシップ"/>
                                <p>組織<br>リーダーシップ</p>
                            </div>
                            <div class="c-badge2">
                                <img src={{ asset('img/badge.png') }} alt="組織リーダーシップ"/>
                                <p>組織<br>リーダーシップ</p>
                            </div>
                            <div class="c-badge2">
                                <img src={{ asset('img/badge.png') }} alt="組織リーダーシップ"/>
                                <p>組織<br>リーダーシップ</p>
                            </div>
                            <div class="c-badge2">
                                <img src={{ asset('img/badge.png') }} alt="組織リーダーシップ"/>
                                <p>組織<br>リーダーシップ</p>
                            </div>
                            <div class="c-badge2">
                                <img src={{ asset('img/badge.png') }} alt="組織リーダーシップ"/>
                                <p>組織<br>リーダーシップ</p>
                            </div>
                        </div>
                    </div>
                    <p class="switch-button2">全てを表示</p>
                </div>
            </div>

            <p class="bold center m-b10" id="news">新着情報</p>

            <div class="slider">
                @foreach ($news as $news)
                    <div class="slider-item">
                        <a href="news/{{$news->news_id}}">
                            <img src={{ asset('storage' .'/news_img/' .$news->news_img) }} alt="{{$news->news_title}}" />
                            <p class="news-ti">
                                <?php
                                   echo mb_strimwidth( $news->news_title, 0, 45, '...', 'UTF-8' )
                                ?>
                            </p>
                            <p class="news-day bold">{{Common::get_news_date_format($news->news_create_at)}}</p>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mycourse p-t40 p-b40 m-b40" id="category">
                <p class="bold center m-b20">カテゴリ</p>

                <div class="badge2 badge3 flex align-center flex-between">
                    <a href="category/組織・リーダーシップ">
                        <div class="c-badge2 c-badge3">
                            <img src={{ asset('img/category1.png') }} alt="組織リーダーシップ"/>
                            <p>組織<br>リーダーシップ</p>
                        </div>
                    </a>
                    <a href="category/組織・リーダーシップ">
                        <div class="c-badge2 c-badge3">
                            <img src={{ asset('img/category1.png') }} alt="組織リーダーシップ"/>
                            <p>組織<br>リーダーシップ</p>
                        </div>
                    </a>
                    <a href="category/組織・リーダーシップ">
                        <div class="c-badge2 c-badge3">
                            <img src={{ asset('img/category1.png') }} alt="組織リーダーシップ"/>
                            <p>組織<br>リーダーシップ</p>
                        </div>
                    </a>
                    <a href="category/組織・リーダーシップ">
                        <div class="c-badge2 c-badge3">
                            <img src={{ asset('img/category1.png') }} alt="組織リーダーシップ"/>
                            <p>組織<br>リーダーシップ</p>
                        </div>
                    </a>
                    <a href="category/組織・リーダーシップ">
                        <div class="c-badge2 c-badge3">
                            <img src={{ asset('img/category1.png') }} alt="組織リーダーシップ"/>
                            <p>組織<br>リーダーシップ</p>
                        </div>
                    </a>
                    <a href="category/組織・リーダーシップ">
                        <div class="c-badge2 c-badge3">
                            <img src={{ asset('img/category1.png') }} alt="組織リーダーシップ"/>
                            <p>組織<br>リーダーシップ</p>
                        </div>
                    </a>
                </div>

                <!--
                <div class="right">
                    <div class="center">
                        <div class="badge2 badge3 flex align-center flex-between">
                            <a href="">
                                <div class="c-badge2 c-badge3">
                                    <img src={{ asset('img/category1.png') }} alt="組織リーダーシップ"/>
                                    <p>組織<br>リーダーシップ</p>
                                </div>
                            </a>
                            <a href="">
                                <div class="c-badge2 c-badge3">
                                    <img src={{ asset('img/category1.png') }} alt="組織リーダーシップ"/>
                                    <p>組織<br>リーダーシップ</p>
                                </div>
                            </a>
                            <a href="">
                                <div class="c-badge2 c-badge3">
                                    <img src={{ asset('img/category1.png') }} alt="組織リーダーシップ"/>
                                    <p>組織<br>リーダーシップ</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <p class="switch-button2">全てを表示</p>
                </div>
                -->
            </div>

            <p class="bold center m-b10">ピックアップ動画</p>

            <div class="slider">
                <div class="slider-item">
                    <img src={{ asset('img/pickup1.jpg') }} alt="ピックアップ"/>
                    <p class="pickup-day">2021年12月21日（火）</p>
                    <p class="pickup-ti bold">お金を稼ぐもっとも効率的な方法がコレ！今見ないと絶...</p>
                    <p class="pickup-tx"><i class="fas fa-history"></i> 約30分</p>
                </div>
                <div class="slider-item">
                    <img src={{ asset('img/pickup1.jpg') }} alt="ピックアップ"/>
                    <p class="pickup-day">2021年12月21日（火）</p>
                    <p class="pickup-ti bold">お金を稼ぐもっとも効率的な方法がコレ！今見ないと絶...</p>
                    <p class="pickup-tx"><i class="fas fa-history"></i> 約30分</p>
                </div>
                <div class="slider-item">
                    <img src={{ asset('img/pickup1.jpg') }} alt="ピックアップ"/>
                    <p class="pickup-day">2021年12月21日（火）</p>
                    <p class="pickup-ti bold">お金を稼ぐもっとも効率的な方法がコレ！今見ないと絶...</p>
                    <p class="pickup-tx"><i class="fas fa-history"></i> 約30分</p>
                </div>
                <div class="slider-item">
                    <img src={{ asset('img/pickup1.jpg') }} alt="ピックアップ"/>
                    <p class="pickup-day">2021年12月21日（火）</p>
                    <p class="pickup-ti bold">お金を稼ぐもっとも効率的な方法がコレ！今見ないと絶...</p>
                    <p class="pickup-tx"><i class="fas fa-history"></i> 約30分</p>
                </div>
                <div class="slider-item">
                    <img src={{ asset('img/pickup1.jpg') }} alt="ピックアップ"/>
                    <p class="pickup-day">2021年12月21日（火）</p>
                    <p class="pickup-ti bold">お金を稼ぐもっとも効率的な方法がコレ！今見ないと絶...</p>
                    <p class="pickup-tx"><i class="fas fa-history"></i> 約30分</p>
                </div>
                <div class="slider-item">
                    <img src={{ asset('img/pickup1.jpg') }} alt="ピックアップ"/>
                    <p class="pickup-day">2021年12月21日（火）</p>
                    <p class="pickup-ti bold">お金を稼ぐもっとも効率的な方法がコレ！今見ないと絶...</p>
                    <p class="pickup-tx"><i class="fas fa-history"></i> 約30分</p>
                </div>
            </div>

            <div class="login-back center m-t-30">
                <a href="{{ url('') }}">
                    全てをみる
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>

            @component('parts.nav')
            @endcomponent
        </div>

        @component('parts.footer')
        @endcomponent
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://unpkg.com/cropperjs/dist/cropper.js" crossorigin="anonymous"></script>
        <script src="js/jquery-cropper.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src={{ asset('js/slick.min.js') }}></script>
        <script type="text/javascript" src={{ asset('js/main.js') }}></script>
    </body>
</html>