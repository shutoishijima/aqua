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
        <div class="contents-page">
            @component('parts.hamburger2')
            @endcomponent
            <div class="header header2">
                <a href="{{ url('mypage#category') }}" class="header-left-icon">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <p class="header-title bold">{{ $change[0]->content_category }}</p>
            </div>

            <div class="category-amo right bold m-t20 m-b20">
                <p>受講済み {{count($viewed_count)}} / 
                    @foreach ($amo as $amo)
                        @if ($amo->content_category == '変革')
                            {{ $amo->cnt }}
                        @endif
                    @endforeach
                </p>
            </div>

            @foreach ($change as $change)
                <a href="{{$change->content_category}}/{{$change->content_name}}" class="c-link">
                    <div class="content-box flex m-b10">
                        <div class="c-box-l">
                            @php
                                $video_flag = false;

                                // 無料コンテンツは視聴可能
                                if ($change->content_lock == '0'){
                                    $video_flag = true;

                                // 有料コンテンツかつ有料会員
                                } elseif ($change->content_lock == '1' && $users[0]->user_status == '1'){
                                    $video_flag = true;
                                }

                                // 最新の視聴コンテンツより一つ以上先は見れない
                                if ($latest_content[0]->content_id + 1 < $change->content_id) {
                                    $video_flag = false;
                                }

                                if ($latest_content[0]->content_id < $change->content_id) {
                                    // 最新の視聴コンテンツが視聴中だとその先が見れない
                                    if ($latest_content[0]->content_status == '1'){
                                        $video_flag = false;
                                    }

                                    // 最新の視聴コンテンツを見た日から１日以上経っているか
                                    $limit_day = date('Y-m-d H:i:s', strtotime('-1 day'));
                                    if ($latest_content[0]->view_date >= $limit_day){
                                        $video_flag = false;
                                    }
                                }
                            @endphp

                            @if ($video_flag == true)
                                <img src={{ asset($change->content_img_path) }} alt="{{ $change->content_name }}" />
                            @else
                                <img src={{ asset($change->content_img_path_lock) }} alt="{{ $change->content_name }}" />
                            @endif
                        </div>
                        <div class="c-box-r">
                            <div class="content-day flex flex-between">
                                <p>{{Common::get_news_date_format($change->content_create_at)}}</p>
                                <p><i class="fas fa-history"></i> 約{{ $change->content_min }}分</p>
                            </div>
                            <div class="content-title bold lh15 m-b10">
                                <p>{{ $change->content_name }}</p>
                            </div>
                            <div class="content-view">
                                @foreach ($viewed_content as $view_content)
                                    @if ($change->content_id == $view_content->content_id && $view_content->content_status == 2)
                                        <p class="red">受講済み​<i class="fas fa-check red"></i></p>
                                    @endif
                                @endforeach

                                @if ($latest_content[0]->content_id + 1 == $change->content_id && $latest_content[0]->content_status == 2)
                                    @if ($latest_content[0]->content_id < $change->content_id && $users[0]->user_status == '0' && $change->content_lock == 1)
                                        <p class="red">有料会員しか視聴できません</p>
                                    @else
                                        @php
                                            // 現在時刻
                                            $timestamp = strtotime('now');

                                            // DBの時刻
                                            $timestamp2 = strtotime($latest_content[0]->view_date);

                                            // 差(秒)
                                            $time_diff = $timestamp - $timestamp2;

                                            // 差(時間) 3600秒で割る
                                            $hour_diff = $time_diff / 60 / 60;
                                        @endphp

                                        @if (round((24 - $hour_diff), 1) > 0)
                                            <p class="red">あと
                                                @php
                                                    echo(round((24 - $hour_diff), 1));
                                                @endphp
                                            時間後に解放</p>
                                        @endif
                                    @endif
                                @elseif ($latest_content[0]->content_id < $change->content_id && $users[0]->user_status == '0' && $change->content_lock == 1)
                                    <p class="red">有料会員しか視聴できません</p>
                                @elseif ($latest_content[0]->content_id < $change->content_id && $users[0]->user_status != '1')
                                    <p class="red">前の動画を受講済にしてください</p>
                                @elseif ($latest_content[0]->content_id < $change->content_id && $users[0]->user_status == '1')
                                    <p class="red">前の動画を受講済みにして下さい</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>

                <?php $total ++; ?>
            
            @endforeach

            <p class="m-t40 m-b40 center"><a href="#">ページの先頭へ</a></p>

            <div class="back2 center">
                <a href="{{ url('mypage') }}">
                    <i class="fas fa-arrow-left"></i>マイページへ戻る
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