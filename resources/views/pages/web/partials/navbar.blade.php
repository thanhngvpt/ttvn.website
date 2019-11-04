<div class="navbar-top-area">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logo.png') }}" class="img-fluid logo-img">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Lĩnh vực hoạt động</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tin tức</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tuyển dụng</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Liên hệ</a>
                </li>
            </ul>
            <div class="icon-change-language">
                <img src="{{ asset('images/icon-change-language.png') }}" class="img-fluid">
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="title-page">
            @yield('title-navbar')
        </div>
    </div>
</div>