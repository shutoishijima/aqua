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
            <div class="header m-b30 header2">
                <p class="header-title bold">お知らせ削除</p>

                <a href="mypage" class="header-times-icon">
                    <i class="fas fa-times"></i>
                </a>
            </div>

            <div class="register-form profile-f">
                <form method='post' action={{ url('destroy_news') }} >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-text profile-form">
                        <h5 class="m-b10">削除するタイトル</h5>
                        <div class="center m-b10">
                            <input type='text' name='title' value="{{ old('title') }}" />
                        </div>
                    </div>
                    <p class="bold right m-b20 profile-com">※100文字以内</p>
                    @if($errors->has('title'))
                        @foreach($errors->get('title') as $message)
                            <p class="error-m red">{{ $message }}</p>
                        @endforeach
                    @endif 

                    <p class="error-m red center m-t30 lh15">
                        削除したいお知らせの<br>
                        タイトルは一言一句<br>
                        完全一致で入力してください。<br>
                        ※タイトルが重複している場合<br>新しい記事から削除します。
                    </p>

                    <div class="submit profile-submit center">
                        <input type='submit' value='削　除' name='submit' />
                    </div>
                </form>
            </div>
        </div>

        @component('parts.footer')
        @endcomponent

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src={{ asset('js/slick.min.js') }}></script>
        <script type="text/javascript" src={{ asset('js/main.js') }}></script>
    </body>
</html>