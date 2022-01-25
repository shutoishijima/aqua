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

        <div class="connection-page">
            <div class="contents-title">
                <p class="center">検索結果</p>
            </div>

            <div class="search">
                @if(empty($users))
                    <p class="red center search-com">該当するユーザーが見つかりません</p>
                @endif

                @foreach ($users as $users)
                    <a href="user/{{$users->user_name}}">
                        <div class="mycard">
                            <div class="card-top flex">
                                <div class="card-name">
                                    <p>{{$users->user_name}}　様</p>
                                </div>
                                <div class="card-area">
                                <p>{{$users->user_area}}</p>  
                                </div>
                                <div class="card-pay">
                                    @if($users->user_status == Common::$USER_STATUS_PAY)
                                    <i class="fas fa-star"></i>
                                    @endif
                                </div>
                            </div>

                            <div class="card-bottom flex flex-between align-center">
                                <div>
                                    <div class="card-img">
                                        @if($users->user_img == null)
                                            <img src={{ asset('img/profile.png') }} alt="プロフィール写真" id="ajax_img" />
                                        @else
                                            <img src={{ asset('storage' .'/' .$users->user_img_path .$users->user_img) }} alt="プロフィール写真" id="ajax_img" />
                                        @endif
                                        
                                    </div>
                                </div>

                                <div class="card-amount">
                                    <p>¥{{number_format($users->user_reward_amount)}} -</p>
                                </div>

                                <div class="card-months">
                                    <p><?php echo date('n'); ?>月末</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="contents-title">
                <p class="center"><i class="fas fa-user-friends"></i> 友達を探す</p>
            </div>

            <div class="search-box">
                <h4>名前検索</h4>

                <form method='post' action='name-search'>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-text flex">
                        <p>名前</p>
                        <input type='text' name='name' />
                    </div>
                    
                    <div class="submit right">
                        <input type='submit' value='検索' name='submit' />
                    </div>
                </form>
            </div>

            <div class="contents-title">
                <p class="center"><i class="fas fa-user-friends"></i> 新しい友達を探す</p>
            </div>

            <div class="search-box">
                <h4>絞り込み検索</h4>

                <form method='post' action='refined-search'>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

                    <div class="form-text flex">
                        <p>性別</p>
                        <div class="form-radio">
                            <input type="radio" name="gender" value="男" checked> 男
                            <input type="radio" name="gender" value="女"> 女
                        </div>
                    </div>

                    <div class="form-text flex">
                        <p>居住エリア</p>
                        <div class="form-select">
                            <select name="area">
                                <option value="" selected>都道府県</option>
                                <option value="北海道">北海道</option>
                                <option value="青森県">青森県</option>
                                <option value="岩手県">岩手県</option>
                                <option value="宮城県">宮城県</option>
                                <option value="秋田県">秋田県</option>
                                <option value="山形県">山形県</option>
                                <option value="福島県">福島県</option>
                                <option value="茨城県">茨城県</option>
                                <option value="栃木県">栃木県</option>
                                <option value="群馬県">群馬県</option>
                                <option value="埼玉県">埼玉県</option>
                                <option value="千葉県">千葉県</option>
                                <option value="東京都">東京都</option>
                                <option value="神奈川県">神奈川県</option>
                                <option value="新潟県">新潟県</option>
                                <option value="富山県">富山県</option>
                                <option value="石川県">石川県</option>
                                <option value="福井県">福井県</option>
                                <option value="山梨県">山梨県</option>
                                <option value="長野県">長野県</option>
                                <option value="岐阜県">岐阜県</option>
                                <option value="静岡県">静岡県</option>
                                <option value="愛知県">愛知県</option>
                                <option value="三重県">三重県</option>
                                <option value="滋賀県">滋賀県</option>
                                <option value="京都府">京都府</option>
                                <option value="大阪府">大阪府</option>
                                <option value="兵庫県">兵庫県</option>
                                <option value="奈良県">奈良県</option>
                                <option value="和歌山県">和歌山県</option>
                                <option value="鳥取県">鳥取県</option>
                                <option value="島根県">島根県</option>
                                <option value="岡山県">岡山県</option>
                                <option value="広島県">広島県</option>
                                <option value="山口県">山口県</option>
                                <option value="徳島県">徳島県</option>
                                <option value="香川県">香川県</option>
                                <option value="愛媛県">愛媛県</option>
                                <option value="高知県">高知県</option>
                                <option value="福岡県">福岡県</option>
                                <option value="佐賀県">佐賀県</option>
                                <option value="長崎県">長崎県</option>
                                <option value="熊本県">熊本県</option>
                                <option value="大分県">大分県</option>
                                <option value="宮崎県">宮崎県</option>
                                <option value="鹿児島県">鹿児島県</option>
                                <option value="沖縄県">沖縄県</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-text flex">
                        <p>今月の報酬額</p>
                        <div class="form-select">
                            <select name="amount">
                                <option value="" selected>範囲を選択してください</option>
                                <option value="0">０</option>
                                <option value="〜２０万">〜２０万</option>
                                <option value="〜５０万">〜５０万</option>
                                <option value="〜８０万">〜８０万</option>
                                <option value="〜１００万">〜１００万</option>
                                <option value="１００万〜">１００万〜</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-text flex">
                        <p>取扱のある職業</p>
                        <div class="form-radio">
                            <input type="checkbox" name="job" value="不動産"> 不動産
                            <input type="checkbox" name="job" value="人材"> 人材
                            <input type="checkbox" name="job" value="全部" checked> 全部
                        </div>
                    </div>

                    <div class="submit right">
                        <input type='submit' value='検索' name='submit' />
                    </div>
                </form>
            </div>
            
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src={{ asset('js/main.js') }}></script>
    </body>
</html>