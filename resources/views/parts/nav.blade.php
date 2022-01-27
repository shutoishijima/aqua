<nav class="navigation flex center">
    <a href="{{ url('connection') }}">      
        <div class="nav-list">
            <img src={{ asset('img/nav1.png') }} alt="繋がる"/>
            <p>繋がる</p>
        </div>
    </a>
    <a href="{{ url('pickup') }}">
        <div class="nav-list">
            <img src={{ asset('img/nav2.png') }} alt="観る"/>
            <p>観る</p>
        </div>
    </a>
    <a href="{{ url('others') }}" class="modal-nav-open">
        <div class="nav-list">
            <img src={{ asset('img/nav3.png') }} alt="その他"/>
            <p>その他</p>
        </div>
    </a>

    <!--modal-->
    <div class="modal-nav">
        <div class="modal_nav_bg modal-nav-close"></div>
        <div class="modal_nav_content">
            <a href="">
                <p>会員ランクの変更</p>
            </a>
            <hr>
            <a href="{{ url('edit') }}">
                <p>プロフィール編集</p>
            </a>
            <hr>
            <a href="{{ url('logout') }}">
                <p>ログアウト</p>
            </a>
        </div>
    </div>
</nav>