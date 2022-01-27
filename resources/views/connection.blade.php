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
        <div class="connection-page">
            <div class="header header2">
                <a href="mypage" class="header-left-icon">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <p class="header-title bold">ユーザー 一覧</p>
                <a href="" class="header-search-icon center modal-search-open">
                    <i class="fas fa-search"></i>
                    <p>絞り込み</p>
                </a>
            </div>

            <!--modal-->
            <div class="modal-search">
                <div class="modal__bg modal-search-close"></div>
                <div class="modal_search_content">
                    <div class="header header2 m-b30">
                        <p class="header-title bold">絞り込み検索</p>
                        <a href="" class="header-search-icon center modal-search-close header-search-icon2">
                            <i class="fas fa-times"></i>
                            <p>閉じる</p>
                        </a>
                    </div>

                    <div class="research">
                        <form method='post' action='refined-search'>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                            <div class="form-text m-b30">
                                <h5 class="m-b10">年齢</h5>
                                <div class="form-select">
                                    <select name="age">
                                        <option value="" selected>該当する年代を選択してください。</option>
                                        <option value="1">１０代</option>
                                        <option value="2">２０代</option>
                                        <option value="3">３０代</option>
                                        <option value="4">４０代</option>
                                        <option value="5">５０代</option>
                                        <option value="6">６０代</option>
                                        <option value="7">７０代</option>
                                        <option value="8">８０代</option>
                                        <option value="9">９０代</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-text m-b30">
                                <h5 class="m-b10">エリア</h5>
                                <div class="form-select">
                                    <select name="area">
                                        <option value="" selected>該当するエリアをお選びください。</option>
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

                            <div class="form-text m-b30">
                                <h5 class="m-b10">性別</h5>
                                <div class="form-radio flex flex-around">
                                    <label for="man"><input type="radio" name="gender" value="男" id="man"> 男性</label>
                                    <label for="woman"><input type="radio" name="gender" value="女" id="woman"> 女性</label>
                                </div>
                            </div>

                            <div class="form-text m-b40">
                                <h5 class="m-b10">会員種別</h5>
                                <div class="form-select">
                                    <select name="status">
                                        <option value="" selected>該当するものをお選びください。。</option>
                                        <option value="0">無料会員</option>
                                        <option value="1">有料会員</option>
                                    </select>
                                </div>
                            </div>

                            <div class="submit right">
                                <input type='submit' value='この条件で検索する' name='submit' />
                            </div>
                        </form>

                        <div class="back modal-search-close m-t10 modal-search-back">
                            <p class="center"><i class="fas fa-times"></i> キャンセル</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="connection10">
                @if(empty($users))
                    <p class="red center search-com">該当するユーザーが見つかりません</p>
                @endif
                @foreach ($users as $user)
                    <a href="user/{{$user->user_id}}">
                        <div class="mix-list flex flex-between">
                            <div class="mix-img">
                                @if($user->user_img == null and $user->user_gender == "男")
                                    <img src={{ asset('img/men.png') }} alt="プロフィール写真"/>
                                @elseif($user->user_img == null and $user->user_gender == "女")
                                    <img src={{ asset('img/women.png') }} alt="プロフィール写真"/>
                                @else
                                    <img src={{ asset('storage' .'/img/' .$user->user_img) }} alt="プロフィール写真" />
                                @endif
                            </div>
                            <div class="mix-middle bold">
                                <div class="m-m-top flex flex-between">
                                    <p><span>{{$user->user_name}}</span>（{{$user->user_age}}）</p>
                                    <p class="mix12"><i class="fas fa-map-marker-alt"></i> {{$user->user_area}}</p>
                                </div>
                                <div class="m-m-bottom">
                                    <p class="mix12">{{$user->user_job}}</p>
                                </div>
                            </div>
                            <div class="mix-right">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="back2 center m-t30">
                <a href="mypage">
                    <i class="fas fa-arrow-left"></i>マイページへ戻る
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