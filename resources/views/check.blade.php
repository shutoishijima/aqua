<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
        <link rel="stylesheet" href="https://use.typekit.net/dxj2hcp.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        
    </head>
    <body class="main">
        <div class="check-status flex flex-between lh2 center">
            <p class="bold"><i class="fas fa-check"></i>入力</p>
            <p class="bold"><i class="fas fa-check"></i>確認</p>
            <p>完了</p>
        </div>

        <div class="check-title center bold">
            <p>ご登録内容のご確認</p>
        </div>

        <div class="check-info">
            <p class="p-t20 center bold m-b60">以下の内容でよろしいでしょうか。</p>

            <form method='post'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="user-information">
                    <p class="check-item m-b10 bold">お名前　<span class="normal">　※いつでも変更可能</span></p>
                    <p class="check-white m-b30 bold">{{ $name }}</p>

                    <p class="check-item m-b10 bold">ご年齢　<span class="normal">　※いつでも変更可能</span></p>
                    <p class="check-white m-b30 bold">{{ $age }}歳</p>

                    <p class="check-item m-b10 bold">性別</p>
                    <p class="check-white m-b30 bold">{{ $gender }}</p>

                    <p class="check-item m-b10 bold">電話番号</p>
                    <p class="check-white m-b30 bold">{{ $user_tel }}</p>

                    <p class="check-item m-b10 bold">主要エリア　<span class="normal">　※いつでも変更可能</span></p>
                    <p class="check-white m-b30 bold">{{ $area }}</p>

                    <p class="check-item m-b10 bold">Instagramアカウント　<span class="normal">　※いつでも変更可能</span></p>
                    <p class="check-white m-b30 bold">
                        @if(!$inst)
                            未設定
                        @else
                            {{ $inst }}
                        @endif
                    </p>

                    <p class="check-item m-b10 bold">最終学歴</p>
                    <p class="check-white m-b30 bold">{{ $final_education }}</p>

                    <p class="check-item m-b10 bold">現在の職種</p>
                    <p class="check-white m-b30 bold">{{ $job }}</p>

                    <p class="check-item m-b10 bold">現在のご年収　<span class="normal">　※いつでも変更可能</span></p>
                    <p class="check-white m-b30 bold">
                        @if($salary == 0)
                            ０〜１００万円
                        @elseif($salary == 1)
                            １００万円〜２００万円
                        @elseif($salary == 2)
                            ２００万円〜３００万円
                        @elseif($salary == 3)
                            ３００万円〜４００万円
                        @elseif($salary == 4)
                            ４００万円〜５００万円
                        @elseif($salary == 5)
                            ５００万円〜６００万円
                        @elseif($salary == 6)
                            ６００万円〜７００万円
                        @elseif($salary == 7)
                            ７００万円〜８００万円
                        @elseif($salary == 8)
                            ８００万円〜９００万円
                        @elseif($salary == 9)
                            ９００万円〜１０００万円
                        @elseif($salary == 10)
                            １０００万円〜
                        @endif
                    </p>

                    <p class="check-item m-b10 bold">メールアドレス</p>
                    <p class="check-white m-b30 bold">{{ $user_mail }}</p>

                    <p class="check-item m-b10 bold">パスワード</p>
                    <p class="check-white m-b30 bold">{{ $pass }}</p>

                    <p class="check-text lh15 m-b40">ご入力いただいた内容にお間違いなければ<br>無料登録へお進みください。</p>

                    <div class="submit m-b10">
                        <input type='submit' value='無　料　登　録' name='submit' formaction='register_up' />
                    </div>
                    <div class="back">
                        <i class="fas fa-arrow-left"></i>
                        <input type='submit' value='内容を修正する' name='back' formaction='register_back' />
                    </div>
                </div>
            </form>
        </div>

        @component('parts.footer')
        @endcomponent

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src={{ asset('js/main.js') }}></script>
    </body>
</html>
