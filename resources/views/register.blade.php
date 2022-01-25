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
                                <option value="1">１歳</option>
                                <option value="2">２歳</option>
                                <option value="3">３歳</option>
                                <option value="4">４歳</option>
                                <option value="5">５歳</option>
                                <option value="6">６歳</option>
                                <option value="7">７歳</option>
                                <option value="8">８歳</option>
                                <option value="9">９歳</option>
                                <option value="10">１０歳</option>
                                <option value="11">１１歳</option>
                                <option value="12">１２歳</option>
                                <option value="13">１３歳</option>
                                <option value="14">１４歳</option>
                                <option value="15">１５歳</option>
                                <option value="16">１６歳</option>
                                <option value="17">１７歳</option>
                                <option value="18">１８歳</option>
                                <option value="19">１９歳</option>
                                <option value="20">２０歳</option>
                                <option value="21">２１歳</option>
                                <option value="22">２２歳</option>
                                <option value="23">２３歳</option>
                                <option value="24">２４歳</option>
                                <option value="25">２５歳</option>
                                <option value="26">２６歳</option>
                                <option value="27">２７歳</option>
                                <option value="28">２８歳</option>
                                <option value="29">２９歳</option>
                                <option value="30">３０歳</option>
                                <option value="31">３１歳</option>
                                <option value="32">３２歳</option>
                                <option value="33">３３歳</option>
                                <option value="34">３４歳</option>
                                <option value="35">３５歳</option>
                                <option value="36">３６歳</option>
                                <option value="37">３７歳</option>
                                <option value="38">３８歳</option>
                                <option value="39">３９歳</option>
                                <option value="40">４０歳</option>
                                <option value="41">４１歳</option>
                                <option value="42">４２歳</option>
                                <option value="43">４３歳</option>
                                <option value="44">４４歳</option>
                                <option value="45">４５歳</option>
                                <option value="46">４６歳</option>
                                <option value="47">４７歳</option>
                                <option value="48">４８歳</option>
                                <option value="49">４９歳</option>
                                <option value="50">５０歳</option>
                                <option value="51">５１歳</option>
                                <option value="52">５２歳</option>
                                <option value="53">５３歳</option>
                                <option value="54">５４歳</option>
                                <option value="55">５５歳</option>
                                <option value="56">５６歳</option>
                                <option value="57">５７歳</option>
                                <option value="58">５８歳</option>
                                <option value="59">５９歳</option>
                                <option value="60">６０歳</option>
                                <option value="61">６１歳</option>
                                <option value="62">６２歳</option>
                                <option value="63">６３歳</option>
                                <option value="64">６４歳</option>
                                <option value="65">６５歳</option>
                                <option value="66">６６歳</option>
                                <option value="67">６７歳</option>
                                <option value="68">６８歳</option>
                                <option value="69">６９歳</option>
                                <option value="70">７０歳</option>
                                <option value="71">７１歳</option>
                                <option value="72">７２歳</option>
                                <option value="73">７３歳</option>
                                <option value="74">７４歳</option>
                                <option value="75">７５歳</option>
                                <option value="76">７６歳</option>
                                <option value="77">７７歳</option>
                                <option value="78">７８歳</option>
                                <option value="79">７９歳</option>
                                <option value="80">８０歳</option>
                                <option value="81">８１歳</option>
                                <option value="82">８２歳</option>
                                <option value="83">８３歳</option>
                                <option value="84">８４歳</option>
                                <option value="85">８５歳</option>
                                <option value="86">８６歳</option>
                                <option value="87">８７歳</option>
                                <option value="88">８８歳</option>
                                <option value="89">８９歳</option>
                                <option value="90">９０歳</option>
                                <option value="91">９１歳</option>
                                <option value="92">９２歳</option>
                                <option value="93">９３歳</option>
                                <option value="94">９４歳</option>
                                <option value="95">９５歳</option>
                                <option value="96">９６歳</option>
                                <option value="97">９７歳</option>
                                <option value="98">９８歳</option>
                                <option value="99">９９歳</option>
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
                                <option value="中学校卒業">中学校卒業</option>
                                <option value="高等学校卒業">高等学校卒業</option>
                                <option value="大学卒業">大学卒業</option>
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
