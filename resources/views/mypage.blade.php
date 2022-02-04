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
                            <p class="month-time">@php echo round(($users[0]->this_month_min / 60), 1) @endphp 時間</p>
                        </div>
                        <div class="c-r-r">
                            <p><span>先月との差</span><br>
                                <span>
                                    @if($users[0]->last_month_min > $users[0]->this_month_min)
                                        -@php echo round((($users[0]->last_month_min - $users[0]->this_month_min) / 60), 1) @endphp 時間
                                    @elseif($users[0]->last_month_min < $users[0]->this_month_min)
                                        +@php echo round((($users[0]->last_month_min - $users[0]->this_month_min) / -60), 1) @endphp 時間
                                    @else
                                        なし
                                    @endif 
                                </span>
                            </p>
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

                    <div class="profile-text m-b40">
                        <p>{{$users[0]->user_text}}</p>
                    </div>

                    <a href="edit" class="edit">編集する</a>
                </div>
            </div>

            <div class="mycourse p-t40 p-b40 m-b40">
                <p class="bold center m-b20">完了コース一覧</p>

                <div class="badge2 flex flex-between">
                    <div class="c-badge2"> 
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

                    <div class="c-badge2">
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

                    <div class="c-badge2">
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
                </div>

                <div class="right">
                    <div class="center">
                        <div class="badge2 flex flex-between">
                            <div class="c-badge2">
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

                            <div class="c-badge2">
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

                            <div class="c-badge2">
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

                <div class="badge2 badge3 flex flex-between">
                    <a href="category/組織・リーダーシップ">
                        <div class="c-badge2 c-badge3">
                            <img src={{ asset('img/category1.png') }} alt="組織・リーダーシップ"/>
                            <p>組織<br>リーダーシップ</p>
                        </div>
                    </a>
                    <a href="category/思考">
                        <div class="c-badge2 c-badge3">
                            <img src={{ asset('img/category2.png') }} alt="思考"/>
                            <p class="m-t10">思考</p>
                        </div>
                    </a>
                    <a href="category/戦略・マーケティング">
                        <div class="c-badge2 c-badge3">
                            <img src={{ asset('img/category3.png') }} alt="戦略・マーケティング"/>
                            <p>戦略<br>マーケティング</p>
                        </div>
                    </a>
                    <a href="category/会計・財務">
                        <div class="c-badge2 c-badge3">
                            <img src={{ asset('img/category4.png') }} alt="会計・財務"/>
                            <p>会計・財務</p>
                        </div>
                    </a>
                    <a href="category/キャリア・志">
                        <div class="c-badge2 c-badge3">
                            <img src={{ asset('img/category5.png') }} alt="キャリア・志"/>
                            <p>キャリア・志</p>
                        </div>
                    </a>
                    <a href="category/変革">
                        <div class="c-badge2 c-badge3">
                            <img src={{ asset('img/category6.png') }} alt="変革"/>
                            <p>変革</p>
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

            <p class="bold center m-b10" id="pickup">ピックアップ動画</p>

            <div class="slider">
                @foreach ($pickup as $pickup)
                    <div class="slider-item">
                        <video src={{ asset($pickup->content_path) }} controls></video>
                        <input type="hidden" value="{{$pickup->content_min}}">
                        <p class="pickup-day">{{Common::get_news_date_format($pickup->content_create_at)}}</p>
                        <p class="pickup-ti bold">
                            <?php
                                echo mb_strimwidth( $pickup->content_detail, 0, 57, '...', 'UTF-8' )
                            ?>
                        </p>
                        <p class="pickup-tx"><i class="fas fa-history"></i> 約{{$pickup->content_min}}分</p>
                    </div>
                @endforeach
            </div>

            

            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script>
                $(function() {
                    $(".slider-item video").on('ended', function(e) {

                        // 記載しなければ別のURLに誘導される
                        e.preventDefault();

                        console.log('ended');

                        // コンテンツ時間を取得
                        let content_min = $(this).next('input').val();

                        // 送信用データ設定(FormData)じゃないとダメ
                        let sendData = new FormData();
                        sendData.append('content_min', content_min);
                        console.log(sendData);

                        // ajaxセットアップ
                        $.ajaxSetup({
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                        });

                        $.ajax({
                            type: 'post',
                            url: "{{ url('add_min') }}",
                            dataType: 'json',
                            data: sendData,
                            cache: false,
                            processData: false,
                            contentType: false,

                        // 接続が出来た場合の処理
                        }).done(function(sendData) {
                            console.log(sendData);

                        // ajax接続が出来なかった場合の処理
                        }).fail(function(jqXHR, textStatus, errorThrown) {
                            console.log(jqXHR);
                            console.log(textStatus);
                            console.log(errorThrown);
                        });
                    });
                });
            </script>

            <div class="login-back center m-t-30">
                <a href="{{ url('pickup') }}">
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