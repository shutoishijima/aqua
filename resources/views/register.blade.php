<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
        <link rel="stylesheet" href="https://use.typekit.net/dxj2hcp.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        
    </head>
    <body class="main">
        <div class="top">
            <div class="top-logo">
                <img src={{ asset('img/logo.png') }} alt="R.E.O online school" />
            </div>

            <div class="top-name center m-b40">
                <h1 class="futura-m-i">R.E.O online school</h1>
            </div>

            <div class="register-form">
                <form method='post' action='register_check'>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-text m-b30">
                        <h5 class="m-b10">お名前</h5>
                        <input type='text' name='name' value="{{ old('name') }}" placeholder="例：石嶋秋人" />
                    </div>
                    @if($errors->has('name'))
                        @foreach($errors->get('name') as $message)
                            <p class="error-m">{{ $message }}</p>
                        @endforeach
                    @endif 

                    <div class="form-text m-b30">
                        <h5 class="m-b10">ご年齢</h5>
                        <div class="form-select">
                            <select name="age">
                                <option value="" disabled selected>該当するご年齢をお選びください。</option>
                                <option value="18" @if(18 === (int)old('age')) selected @endif>１８歳</option>
                                <option value="19" @if(19 === (int)old('age')) selected @endif>１９歳</option>
                                <option value="20" @if(20 === (int)old('age')) selected @endif>２０歳</option>
                                <option value="21" @if(21 === (int)old('age')) selected @endif>２１歳</option>
                                <option value="22" @if(22 === (int)old('age')) selected @endif>２２歳</option>
                                <option value="23" @if(23 === (int)old('age')) selected @endif>２３歳</option>
                                <option value="24" @if(24 === (int)old('age')) selected @endif>２４歳</option>
                                <option value="25" @if(25 === (int)old('age')) selected @endif>２５歳</option>
                                <option value="26" @if(26 === (int)old('age')) selected @endif>２６歳</option>
                                <option value="27" @if(27 === (int)old('age')) selected @endif>２７歳</option>
                                <option value="28" @if(28 === (int)old('age')) selected @endif>２８歳</option>
                                <option value="29" @if(29 === (int)old('age')) selected @endif>２９歳</option>
                                <option value="30" @if(30 === (int)old('age')) selected @endif>３０歳</option>
                                <option value="31" @if(31 === (int)old('age')) selected @endif>３１歳</option>
                                <option value="32" @if(32 === (int)old('age')) selected @endif>３２歳</option>
                                <option value="33" @if(33 === (int)old('age')) selected @endif>３３歳</option>
                                <option value="34" @if(34 === (int)old('age')) selected @endif>３４歳</option>
                                <option value="35" @if(35 === (int)old('age')) selected @endif>３５歳</option>
                                <option value="36" @if(36 === (int)old('age')) selected @endif>３６歳</option>
                                <option value="37" @if(37 === (int)old('age')) selected @endif>３７歳</option>
                                <option value="38" @if(38 === (int)old('age')) selected @endif>３８歳</option>
                                <option value="39" @if(39 === (int)old('age')) selected @endif>３９歳</option>
                                <option value="40" @if(40 === (int)old('age')) selected @endif>４０歳</option>
                                <option value="41" @if(41 === (int)old('age')) selected @endif>４１歳</option>
                                <option value="42" @if(42 === (int)old('age')) selected @endif>４２歳</option>
                                <option value="43" @if(43 === (int)old('age')) selected @endif>４３歳</option>
                                <option value="44" @if(44 === (int)old('age')) selected @endif>４４歳</option>
                                <option value="45" @if(45 === (int)old('age')) selected @endif>４５歳</option>
                                <option value="46" @if(46 === (int)old('age')) selected @endif>４６歳</option>
                                <option value="47" @if(47 === (int)old('age')) selected @endif>４７歳</option>
                                <option value="48" @if(48 === (int)old('age')) selected @endif>４８歳</option>
                                <option value="49" @if(49 === (int)old('age')) selected @endif>４９歳</option>
                                <option value="50" @if(50 === (int)old('age')) selected @endif>５０歳</option>
                                <option value="51" @if(51 === (int)old('age')) selected @endif>５１歳</option>
                                <option value="52" @if(52 === (int)old('age')) selected @endif>５２歳</option>
                                <option value="53" @if(53 === (int)old('age')) selected @endif>５３歳</option>
                                <option value="54" @if(54 === (int)old('age')) selected @endif>５４歳</option>
                                <option value="55" @if(55 === (int)old('age')) selected @endif>５５歳</option>
                                <option value="56" @if(56 === (int)old('age')) selected @endif>５６歳</option>
                                <option value="57" @if(57 === (int)old('age')) selected @endif>５７歳</option>
                                <option value="58" @if(58 === (int)old('age')) selected @endif>５８歳</option>
                                <option value="59" @if(59 === (int)old('age')) selected @endif>５９歳</option>
                                <option value="60" @if(60 === (int)old('age')) selected @endif>６０歳</option>
                                <option value="61" @if(61 === (int)old('age')) selected @endif>６１歳</option>
                                <option value="62" @if(62 === (int)old('age')) selected @endif>６２歳</option>
                                <option value="63" @if(63 === (int)old('age')) selected @endif>６３歳</option>
                                <option value="64" @if(64 === (int)old('age')) selected @endif>６４歳</option>
                                <option value="65" @if(65 === (int)old('age')) selected @endif>６５歳</option>
                                <option value="66" @if(66 === (int)old('age')) selected @endif>６６歳</option>
                                <option value="67" @if(67 === (int)old('age')) selected @endif>６７歳</option>
                                <option value="68" @if(68 === (int)old('age')) selected @endif>６８歳</option>
                                <option value="69" @if(69 === (int)old('age')) selected @endif>６９歳</option>
                                <option value="70" @if(70 === (int)old('age')) selected @endif>７０歳</option>
                                <option value="71" @if(71 === (int)old('age')) selected @endif>７１歳</option>
                                <option value="72" @if(72 === (int)old('age')) selected @endif>７２歳</option>
                                <option value="73" @if(73 === (int)old('age')) selected @endif>７３歳</option>
                                <option value="74" @if(74 === (int)old('age')) selected @endif>７４歳</option>
                                <option value="75" @if(75 === (int)old('age')) selected @endif>７５歳</option>
                                <option value="76" @if(76 === (int)old('age')) selected @endif>７６歳</option>
                                <option value="77" @if(77 === (int)old('age')) selected @endif>７７歳</option>
                                <option value="78" @if(78 === (int)old('age')) selected @endif>７８歳</option>
                                <option value="79" @if(79 === (int)old('age')) selected @endif>７９歳</option>
                                <option value="80" @if(80 === (int)old('age')) selected @endif>８０歳</option>
                                <option value="81" @if(81 === (int)old('age')) selected @endif>８１歳</option>
                                <option value="82" @if(82 === (int)old('age')) selected @endif>８２歳</option>
                                <option value="83" @if(83 === (int)old('age')) selected @endif>８３歳</option>
                                <option value="84" @if(84 === (int)old('age')) selected @endif>８４歳</option>
                                <option value="85" @if(85 === (int)old('age')) selected @endif>８５歳</option>
                                <option value="86" @if(86 === (int)old('age')) selected @endif>８６歳</option>
                                <option value="87" @if(87 === (int)old('age')) selected @endif>８７歳</option>
                                <option value="88" @if(88 === (int)old('age')) selected @endif>８８歳</option>
                                <option value="89" @if(89 === (int)old('age')) selected @endif>８９歳</option>
                                <option value="90" @if(90 === (int)old('age')) selected @endif>９０歳</option>
                                <option value="91" @if(91 === (int)old('age')) selected @endif>９１歳</option>
                                <option value="92" @if(92 === (int)old('age')) selected @endif>９２歳</option>
                                <option value="93" @if(93 === (int)old('age')) selected @endif>９３歳</option>
                                <option value="94" @if(94 === (int)old('age')) selected @endif>９４歳</option>
                                <option value="95" @if(95 === (int)old('age')) selected @endif>９５歳</option>
                                <option value="96" @if(96 === (int)old('age')) selected @endif>９６歳</option>
                                <option value="97" @if(97 === (int)old('age')) selected @endif>９７歳</option>
                                <option value="98" @if(98 === (int)old('age')) selected @endif>９８歳</option>
                                <option value="99" @if(99 === (int)old('age')) selected @endif>９９歳</option>
                            </select>
                        </div>
                    </div>
                    @if($errors->has('age'))
                        @foreach($errors->get('age') as $message)
                            <p class="error-m">{{ $message }}</p>
                        @endforeach
                    @endif 

                    <div class="form-text m-b30">
                        <h5 class="m-b10">性別</h5>
                        <div class="form-radio flex flex-around">
                            <label for="man"><input type="radio" name="gender" value="男" id="man"> 男性</label>
                            <label for="woman"><input type="radio" name="gender" value="女" id="woman"> 女性</label>
                        </div>
                    </div>
                    @if($errors->has('gender'))
                        @foreach($errors->get('gender') as $message)
                            <p class="error-m">{{ $message }}</p>
                        @endforeach
                    @endif

                    <div class="form-text m-b30">
                        <h5 class="m-b10">電話番号</h5>
                        <input type='tel' name='user_tel' value="{{ old('user_tel') }}" placeholder="例：09047329673　※ハイフンは除く" />
                    </div>
                    @if($errors->has('user_tel'))
                        @foreach($errors->get('user_tel') as $message)
                            <p class="error-m">{{ $message }}</p>
                        @endforeach
                    @endif 

                    <div class="form-text m-b30">
                        <h5 class="m-b10">主要エリア</h5>
                        <div class="form-select">
                            <select name="area">
                                <option value="" disabled selected>該当するエリアをお選びください。</option>
                                <option value="北海道" @if('北海道' == old('area')) selected @endif>北海道</option>
                                <option value="青森県" @if('青森県' == old('area')) selected @endif>青森県</option>
                                <option value="岩手県" @if('岩手県' == old('area')) selected @endif>岩手県</option>
                                <option value="宮城県" @if('宮城県' == old('area')) selected @endif>宮城県</option>
                                <option value="秋田県" @if('秋田県' == old('area')) selected @endif>秋田県</option>
                                <option value="山形県" @if('山形県' == old('area')) selected @endif>山形県</option>
                                <option value="福島県" @if('福島県' == old('area')) selected @endif>福島県</option>
                                <option value="茨城県" @if('茨城県' == old('area')) selected @endif>茨城県</option>
                                <option value="栃木県" @if('栃木県' == old('area')) selected @endif>栃木県</option>
                                <option value="群馬県" @if('群馬県' == old('area')) selected @endif>群馬県</option>
                                <option value="埼玉県" @if('埼玉県' == old('area')) selected @endif>埼玉県</option>
                                <option value="千葉県" @if('千葉県' == old('area')) selected @endif>千葉県</option>
                                <option value="東京都" @if('東京都' == old('area')) selected @endif>東京都</option>
                                <option value="神奈川県" @if('神奈川県' == old('area')) selected @endif>神奈川県</option>
                                <option value="新潟県" @if('新潟県' == old('area')) selected @endif>新潟県</option>
                                <option value="富山県" @if('富山県' == old('area')) selected @endif>富山県</option>
                                <option value="石川県" @if('石川県' == old('area')) selected @endif>石川県</option>
                                <option value="福井県" @if('福井県' == old('area')) selected @endif>福井県</option>
                                <option value="山梨県" @if('山梨県' == old('area')) selected @endif>山梨県</option>
                                <option value="長野県" @if('長野県' == old('area')) selected @endif>長野県</option>
                                <option value="岐阜県" @if('岐阜県' == old('area')) selected @endif>岐阜県</option>
                                <option value="静岡県" @if('静岡県' == old('area')) selected @endif>静岡県</option>
                                <option value="愛知県" @if('愛知県' == old('area')) selected @endif>愛知県</option>
                                <option value="三重県" @if('三重県' == old('area')) selected @endif>三重県</option>
                                <option value="滋賀県" @if('滋賀県' == old('area')) selected @endif>滋賀県</option>
                                <option value="京都府" @if('京都府' == old('area')) selected @endif>京都府</option>
                                <option value="大阪府" @if('大阪府' == old('area')) selected @endif>大阪府</option>
                                <option value="兵庫県" @if('兵庫県' == old('area')) selected @endif>兵庫県</option>
                                <option value="奈良県" @if('奈良県' == old('area')) selected @endif>奈良県</option>
                                <option value="和歌山県" @if('和歌山県' == old('area')) selected @endif>和歌山県</option>
                                <option value="鳥取県" @if('鳥取県' == old('area')) selected @endif>鳥取県</option>
                                <option value="島根県" @if('島根県' == old('area')) selected @endif>島根県</option>
                                <option value="岡山県" @if('岡山県' == old('area')) selected @endif>岡山県</option>
                                <option value="広島県" @if('広島県' == old('area')) selected @endif>広島県</option>
                                <option value="山口県" @if('山口県' == old('area')) selected @endif>山口県</option>
                                <option value="徳島県" @if('徳島県' == old('area')) selected @endif>徳島県</option>
                                <option value="香川県" @if('香川県' == old('area')) selected @endif>香川県</option>
                                <option value="愛媛県" @if('愛媛県' == old('area')) selected @endif>愛媛県</option>
                                <option value="高知県" @if('高知県' == old('area')) selected @endif>高知県</option>
                                <option value="福岡県" @if('福岡県' == old('area')) selected @endif>福岡県</option>
                                <option value="佐賀県" @if('佐賀県' == old('area')) selected @endif>佐賀県</option>
                                <option value="長崎県" @if('長崎県' == old('area')) selected @endif>長崎県</option>
                                <option value="熊本県" @if('熊本県' == old('area')) selected @endif>熊本県</option>
                                <option value="大分県" @if('大分県' == old('area')) selected @endif>大分県</option>
                                <option value="宮崎県" @if('宮崎県' == old('area')) selected @endif>宮崎県</option>
                                <option value="鹿児島県" @if('鹿児島県' == old('area')) selected @endif>鹿児島県</option>
                                <option value="沖縄県" @if('沖縄県' == old('area')) selected @endif>沖縄県</option>
                            </select>
                        </div>
                    </div>
                    @if($errors->has('area'))
                        @foreach($errors->get('area') as $message)
                            <p class="error-m">{{ $message }}</p>
                        @endforeach
                    @endif 

                    <div class="form-text m-b30">
                        <h5 class="m-b10">Instagramアカウント</h5>
                        <input type='text' name='inst' value="{{ old('inst') }}" placeholder="例：「sample123」もしくはアカウントなし" />
                    </div>
                    @if($errors->has('inst'))
                        @foreach($errors->get('inst') as $message)
                            <p class="error-m">{{ $message }}</p>
                        @endforeach
                    @endif 

                    <div class="form-text m-b30">
                        <h5 class="m-b10">最終学歴</h5>
                        <div class="form-select">
                            <select name="final_education">
                                <option value="" disabled selected>該当するものをお選びください。</option>
                                <option value="中学校卒業" @if('中学校卒業' == old('final_education')) selected @endif>中学校卒業</option>
                                <option value="高等学校卒業" @if('高等学校卒業' == old('final_education')) selected @endif>高等学校卒業</option>
                                <option value="大学卒業" @if('大学卒業' == old('final_education')) selected @endif>大学卒業</option>
                            </select>
                        </div>
                    </div>
                    @if($errors->has('final_education'))
                        @foreach($errors->get('final_education') as $message)
                            <p class="error-m">{{ $message }}</p>
                        @endforeach
                    @endif 

                    <div class="form-text m-b30">
                        <h5 class="m-b10">現在の職種</h5>
                        <div class="form-select">
                            <select name="job">
                                <option value="" disabled selected>該当する職種をお選びください。</option>
                                <option value="営業" @if('営業' == old('job')) selected @endif>営業</option>
                                <option value="マーケティング" @if('マーケティング' == old('job')) selected @endif>マーケティング</option>
                                <option value="経理・財務" @if('経理・財務' == old('job')) selected @endif>経理・財務</option>
                                <option value="人事・労務・法務" @if('人事・労務・法務' == old('job')) selected @endif>人事・労務・法務</option>
                                <option value="経営・経営企画" @if('経営・経営企画' == old('job')) selected @endif>経営・経営企画</option>
                                <option value="IT・WEB・エンジニア" @if('IT・WEB・エンジニア' == old('job')) selected @endif>IT・WEB・エンジニア</option>
                                <option value="クリエイティブ" @if('クリエイティブ' == old('job')) selected @endif>クリエイティブ</option>
                                <option value="メーカー技術・研究・開発" @if('メーカー技術・研究・開発' == old('job')) selected @endif>メーカー技術・研究・開発</option>
                                <option value="販売・サービス・事務" @if('販売・サービス・事務' == old('job')) selected @endif>販売・サービス・事務</option>
                                <option value="資材・購買・物流" @if('資材・購買・物流' == old('job')) selected @endif>資材・購買・物流</option>
                                <option value="コンサルタント" @if('コンサルタント' == old('job')) selected @endif>コンサルタント</option>
                                <option value="専門職" @if('専門職' == old('job')) selected @endif>専門職</option>
                                <option value="建設・土木　関連職" @if('建設・土木　関連職' == old('job')) selected @endif>建設・土木　関連職</option>
                                <option value="金融・不動産　関連職" @if('金融・不動産　関連職' == old('job')) selected @endif>金融・不動産　関連職</option>
                                <option value="メディカル　関連職" @if('メディカル　関連職' == old('job')) selected @endif>メディカル　関連職</option>
                                <option value="個人事業主" @if('個人事業主' == old('job')) selected @endif>個人事業主</option>
                                <option value="学生" @if('学生' == old('job')) selected @endif>学生</option>
                                <option value="その他" @if('その他' == old('job')) selected @endif>その他</option>
                            </select>
                        </div>
                    </div>
                    @if($errors->has('job'))
                        @foreach($errors->get('job') as $message)
                            <p class="error-m">{{ $message }}</p>
                        @endforeach
                    @endif 

                    <div class="form-text m-b30">
                        <h5 class="m-b10">現在のご年収</h5>
                        <div class="form-select">
                            <select name="salary">
                                <option value="" disabled selected>該当するものをお選びください。</option>
                                <option value="0" @if('0' == old('salary')) selected @endif>０〜１００万円</option>
                                <option value="1" @if('1' == old('salary')) selected @endif>１００万円〜２００万円</option>
                                <option value="2" @if('2' == old('salary')) selected @endif>２００万円〜３００万円</option>
                                <option value="3" @if('3' == old('salary')) selected @endif>３００万円〜４００万円</option>
                                <option value="4" @if('4' == old('salary')) selected @endif>４００万円〜５００万円</option>
                                <option value="5" @if('5' == old('salary')) selected @endif>５００万円〜６００万円</option>
                                <option value="6" @if('6' == old('salary')) selected @endif>６００万円〜７００万円</option>
                                <option value="7" @if('7' == old('salary')) selected @endif>７００万円〜８００万円</option>
                                <option value="8" @if('8' == old('salary')) selected @endif>８００万円〜９００万円</option>
                                <option value="9" @if('9' == old('salary')) selected @endif>９００万円〜１０００万円</option>
                                <option value="10" @if('10' == old('salary')) selected @endif>１０００万円〜</option>
                            </select>
                        </div>
                    </div>
                    @if($errors->has('salary'))
                        @foreach($errors->get('salary') as $message)
                            <p class="error-m">{{ $message }}</p>
                        @endforeach
                    @endif 

                    <div class="form-text m-b30">
                        <h5 class="m-b10">メールアドレス<span class="normal">　※ログイン時に入力必須</span></h5>
                        <input type='email' name='user_mail' value="{{ old('user_mail') }}" placeholder="sample@sample.co.jp" />
                    </div>
                    @if($errors->has('user_mail'))
                        @foreach($errors->get('user_mail') as $message)
                            <p class="error-m">{{ $message }}</p>
                        @endforeach
                    @endif 

                    <div class="form-text m-b40">
                        <h5 class="m-b10">パスワード</h5>
                        <input type='password' name='pass' value="{{ old('pass') }}" placeholder="※英数字6文字以上でご入力ください。" />
                    </div>
                    @if($errors->has('pass'))
                        @foreach($errors->get('pass') as $message)
                            <p class="error-m">{{ $message }}</p>
                        @endforeach
                    @endif  

                    <p class="lh15 m-b20">ご入力いただいた情報にお間違いないかご確認の上、次へお進みください。</p>

                    <div class="submit">
                        <input type='submit' value='次　へ' name='submit' />
                    </div>
                </form>
            </div>
        </div>

        @component('parts.footer')
        @endcomponent

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src={{ asset('js/main.js') }}></script>
    </body>
</html>
