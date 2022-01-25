<nav>
    <div class="hamburger-nav">
        <div class="hamburger-button" id="btn">
            <div class="bar bar2 top"></div>
            <div class="bar bar2 middle"></div>
            <div class="bar bar2 bottom"></div>
        </div>
    </div>
</nav>

<div class="hamburger-sidebar">
    <p class="ham-title bold">MENU</p>
    <ul class="hamburger-sidebar-list bold">
        <li class="hamburger-item"><a href="{{ url('mypage') }}" class="sidebar-anchor">マイページ</a></li>
        <li class="hamburger-item"><a href="{{ url('mypage#category') }}" class="sidebar-anchor">カテゴリ一覧</a></li>
        <li class="hamburger-item"><a href="{{ url('') }}" class="sidebar-anchor">ピックアップ動画</a></li>
        <li class="hamburger-item"><a href="{{ url('connection') }}" class="sidebar-anchor">ユーザー検索</a></li>
        <li class="hamburger-item"><a href="{{ url('edit') }}" class="sidebar-anchor">プロフィール編集</a></li>
        <li class="hamburger-item"><a href="{{ url('mypage#news') }}" class="sidebar-anchor">新着情報</a></li>
        <li class="hamburger-item"><a href="{{ url('') }}" class="sidebar-anchor">会員ランクの変更</a></li>
        <li class="hamburger-item"><a href="{{ url('logout') }}" class="sidebar-anchor">ログアウト</a></li>
    </ul>
</div>