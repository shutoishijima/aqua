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
        <link rel="stylesheet" href="{{ asset('css/cropper.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <style type="text/css">
            .cropper-view-box {
                box-shadow: 0 0 0 1px #39f;
                border-radius: 50%;
                outline: 0;
                outline:inherit !important;
            }
            .cropper-face {
                background-color:inherit !important;
            }
        </style>
        
    </head>
    <body class="main">
        <div class="header m-b30">
            <p class="header-title bold">プロフィールを編集</p>

            <a href="mypage" class="header-times-icon">
                <i class="fas fa-times"></i>
            </a>
        </div>

        <div class="profile-change">
            <div class="edit-img">
                @if($users[0]->user_img == null and $users[0]->user_gender == "男")
                    <img src={{ asset('img/men.png') }} alt="プロフィール写真" id="profile_img" />
                @elseif($users[0]->user_img == null and $users[0]->user_gender == "女")
                    <img src={{ asset('img/women.png') }} alt="プロフィール写真" id="profile_img" />
                @else
                    <img src={{ asset('storage/img/' .$users[0]->user_img) }} alt="プロフィール写真" id="profile_img" />
                @endif
            </div>
            <div class="center js-modal-open change-b m-b30">
                <a href="">写真を変更</a>
            </div>

            <!--modal-->
            <div class="modal">
                <div class="modal__bg js-modal-close"></div>
                <div class="modal__content">
                    <div class="center">
                        <p>プロフィール写真を選んでください。</p>
                    </div>
                    <div class="m-t20">
                        <input type="file" id="file_img" />
                    </div>

                    <div class="cropper">
                        <img src="" alt="" id="cropper_img">
                    </div>

                    <div class="m-t20 m-b20 center">
                        <input type="button" id="ajax_btn" value="決定!!" class="js-modal-close edit-input" />
                    </div>
                    <div class="right">
                        <a class="js-modal-close" href="">閉じる</a>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script>
                $(function() {
                    $("#file_img").on('change', function(e) {

                        // 記載しなければ別のURLに誘導される
                        e.preventDefault();

                        // 画像情報を取得
                        let file_img = $('#file_img').prop('files')[0];

                        // 送信用データ設定(FormData)じゃないとダメ
                        var sendData = new FormData();
                        sendData.append('file_img', file_img);
                        console.log(sendData);

                        // ajaxセットアップ
                        $.ajaxSetup({
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                        });

                        $.ajax({
                            type: 'post',
                            url: 'upload_img',
                            dataType: 'json',
                            data: sendData,
                            // ajaxで画像送信に必要
                            cache:false,
                            processData : false,
                            contentType : false,

                        // 接続が出来た場合の処理
                        }).done(function(data) {
                            console.log(data);

                            $("#cropper_img, #profile_img").attr("src", "{{ asset('storage/') }}/" + data.file_path);

                            $('#cropper_img').cropper({
                                aspectRatio: 1,
                                viewMode: 2,
                            });

                        // ajax接続が出来なかった場合の処理
                        }).fail(function(jqXHR, textStatus, errorThrown) {
                            console.log(jqXHR);
                            console.log(textStatus);
                            console.log(errorThrown);
                        });
                    });

                    $('#ajax_btn').on('click', function() {
                        // 画像の座標を取得
                        let data = $("#cropper_img").cropper('getData');

                        // ajaxセットアップ
                        $.ajaxSetup({
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                        });

                        // 送信データ
                        let sendData = {
                            width: data.width,
                            height: data.height,
                            x: data.x,
                            y: data.y,
                        }
                        console.log(sendData);

                        $.ajax({
                            type: 'post',
                            url: 'trimming_img',
                            dataType: 'json',
                            data: sendData

                        // 接続が出来た場合の処理
                        }).done(function(data) {
                            console.log(data);
                            // リクエストパラメータ追加で画像を動的に変更させる
                            location.reload();

                        // ajax接続が出来なかった場合の処理
                        }).fail(function(jqXHR, textStatus, errorThrown) {
                            console.log(jqXHR);
                            console.log(textStatus);
                            console.log(errorThrown);
                        });
                    });
                });
            </script>
        </div>

        <div class="register-form profile-f">
            <form method='post' action='upload_profile'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-text profile-form">
                    <h5 class="m-b10">ひとこと</h5>
                    <textarea name='user_text' value="{{ old('user_text') }}" placeholder="{{$users[0]->user_text}}"></textarea>
                </div>
                <p class="bold right m-b20 profile-com">※全角100文字以内</p>
                @if($errors->has('user_text'))
                    @foreach($errors->get('user_text') as $message)
                        <p class="error-m">{{ $message }}</p>
                    @endforeach
                @endif 

                <div class="form-text profile-form m-b30">
                    <h5 class="m-b20">主要エリア</h5>
                    <p class="m-b10 bold">現在：{{$users[0]->user_area}}</p>
                    <div class="form-select center">
                        <select name="area">
                            <option value="" disabled selected>該当するエリアをお選びください。</option>
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
                @if($errors->has('area'))
                    @foreach($errors->get('area') as $message)
                        <p class="error-m">{{ $message }}</p>
                    @endforeach
                @endif 

                <div class="form-text profile-form m-b30">
                    <h5 class="m-b10">Instagramアカウント</h5>
                    <div class="center">
                        <input type='text' name='inst' value="{{ old('inst') }}" placeholder="{{$users[0]->user_inst}}" />
                    </div>
                </div>

                <div class="form-text profile-form m-b30">
                    <h5 class="m-b20">職種</h5>
                    <p class="m-b10 bold">現在：{{$users[0]->user_job}}</p>
                    <div class="form-select center">
                        <select name="job">
                            <option value="" disabled selected>該当する職種をお選びください。</option>
                            <option value="営業">営業</option>
                            <option value="マーケティング">マーケティング</option>
                            <option value="経理・財務">経理・財務</option>
                            <option value="人事・労務・法務">人事・労務・法務</option>
                            <option value="経営・経営企画">経営・経営企画</option>
                            <option value="IT・WEB・エンジニア">IT・WEB・エンジニア</option>
                            <option value="クリエイティブ">クリエイティブ</option>
                            <option value="メーカー技術・研究・開発">メーカー技術・研究・開発</option>
                            <option value="販売・サービス・事務">販売・サービス・事務</option>
                            <option value="資材・購買・物流">資材・購買・物流</option>
                            <option value="コンサルタント">コンサルタント</option>
                            <option value="専門職">専門職</option>
                            <option value="建設・土木　関連職">建設・土木　関連職</option>
                            <option value="金融・不動産　関連職">金融・不動産　関連職</option>
                            <option value="メディカル　関連職">メディカル　関連職</option>
                            <option value="個人事業主">個人事業主</option>
                            <option value="学生">学生</option>
                            <option value="その他">その他</option>
                        </select>
                    </div>
                </div>

                <div class="form-text profile-form m-b30">
                    <h5 class="m-b20">ご年収</h5>
                    <p class="m-b10 bold">
                        現在：
                        @if($users[0]->user_salary == 0)
                            ０〜１００万円
                        @elseif($users[0]->user_salary == 1)
                            １００万円〜２００万円
                        @elseif($users[0]->user_salary == 2)
                            ２００万円〜３００万円
                        @elseif($users[0]->user_salary == 3)
                            ３００万円〜４００万円
                        @elseif($users[0]->user_salary == 4)
                            ４００万円〜５００万円
                        @elseif($users[0]->user_salary == 5)
                            ５００万円〜６００万円
                        @elseif($users[0]->user_salary == 6)
                            ６００万円〜７００万円
                        @elseif($users[0]->user_salary == 7)
                            ７００万円〜８００万円
                        @elseif($users[0]->user_salary == 8)
                            ８００万円〜９００万円
                        @elseif($users[0]->user_salary == 9)
                            ９００万円〜１０００万円
                        @elseif($users[0]->user_salary == 10)
                            １０００万円〜
                        @endif
                    </p>
                    <div class="form-select center">
                        <select name="salary">
                            <option value="" disabled selected>該当するものをお選びください。</option>
                            <option value="0">０〜１００万円</option>
                            <option value="1">１００万円〜２００万円</option>
                            <option value="2">２００万円〜３００万円</option>
                            <option value="3">３００万円〜４００万円</option>
                            <option value="4">４００万円〜５００万円</option>
                            <option value="5">５００万円〜６００万円</option>
                            <option value="6">６００万円〜７００万円</option>
                            <option value="7">７００万円〜８００万円</option>
                            <option value="8">８００万円〜９００万円</option>
                            <option value="9">９００万円〜１０００万円</option>
                            <option value="10">１０００万円〜</option>
                        </select>
                    </div>
                </div>

                <p class="lh15 m-b20 profile-comment center">ご入力いただいた情報にお間違いないかご確認の上、<br>完了ボタンを押してください。</p>

                <div class="submit profile-submit center m-b10">
                    <input type='submit' value='完了' name='submit' />
                </div>
            </form>

            <div class="register profile-last">
                <a href="mypage">
                    <div class="register-botann center profile-botann">
                        <p class="normal">キャンセル</p>
                    </div>
                </a>
            </div>
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