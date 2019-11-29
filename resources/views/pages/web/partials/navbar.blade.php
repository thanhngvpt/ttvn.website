<div class="navbar-top-area">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand navbar-brand-white" href="#">
            <img src="{{ asset('images/logo.svg') }}" class="img-fluid logo-img">
        </a>
        <a class="navbar-brand navbar-brand-color" href="#">
            <img src="{{ asset('images/logo-color.svg') }}" class="img-fluid logo-img">
        </a>
        <button class="navbar-toggler" type="button" onclick="$('#collapsibleNavbar').addClass('show')">
            <span class="navbar-toggler-icon toggle-menu-white"></span>
            <span class="navbar-toggler-icon toggle-menu-color"></span>
        </button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" >
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" data-target="#introduce-menu-xl">
                        Giới thiệu
                        <i class="fas fa-caret-down"></i>
                    </a>
                    <div id="introduce-menu-xl" class="collapse menu-xl">
                        <ul class="menu-xl-child">
                            <li>
                                <a href="https://www.google.com/">
                                    <img src="{{ asset('images/arrow-right-new.svg') }}" class="img-fluid" />
                                    Về TTVN Group
                                </a>
                            </li>
                            <li>
                                <a href="https://www.google.com/">
                                    <img src="{{ asset('images/arrow-right-new.svg') }}" class="img-fluid" />       
                                    Ban lãnh đạo
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Lĩnh vực hoạt động
                        <i class="fas fa-caret-down"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Tin tức
                        <i class="fas fa-caret-down"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tuyển dụng</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Liên hệ</a>
                </li>
            </ul>
            <div class="icon-change-language position-relative">
                <img src="{{ asset('images/icon-change-language.svg') }}" class="img-fluid language-white" data-toggle="collapse" data-target="#language-menu-xl">
                <img src="{{ asset('images/icon-change-language-color.svg') }}" class="img-fluid language-color" data-toggle="collapse" data-target="#language-menu-xl">
                <div id="language-menu-xl" class="collapse menu-xl">
                    <ul class="menu-xl-child">
                        <li>
                            <a href="#" class="active">
                                <img src="{{ asset('images/arrow-right-new.svg') }}" class="img-fluid" />
                                Tiếng việt
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{ asset('images/arrow-right-new.svg') }}" class="img-fluid" />       
                                English
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div id="collapsibleNavbar">
        <div class="logo-menu">
            <a href="#">
                <img src="{{ asset('images/logo-footer.svg') }}" class="img-fluid" />
            </a>
            <img src="{{ asset('images/close-modal.svg') }}" onclick="$('#collapsibleNavbar').removeClass('show')" class="img-fluid" />
        </div>
        <ul class="menu-mb-parent">
            <li>
                <a href="#" class="active">
                    Trang chủ
                </a>
            </li>
            <li>
                <a data-toggle="collapse" data-target="#introduce-menu-mb">
                    Giới thiệu
                    <i class="fas fa-caret-right"></i>
                </a>
                <div id="introduce-menu-mb" class="collapse">
                    <ul class="menu-mb-child">
                        <li>
                            <a href="https://www.google.com/">Về TTVN Group</a>
                        </li>
                        <li>
                            <a href="https://www.google.com/">Ban lãnh đạo</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#">
                    Lĩnh vực hoạt động
                    <i class="fas fa-caret-right"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    Tin tức
                    <i class="fas fa-caret-right"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    Tuyển dụng
                </a>
            </li>
            <li>
                <a href="#">
                    Liên hệ
                </a>
            </li>
            <li>
                <a href="#">
                    Ngôn ngữ
                    <i class="fas fa-caret-right"></i>
                </a>
            </li>
        </ul>
    </div>
    @section('nav-header')
        <div class="title-page">
            @yield('title-navbar')
        </div>
    @show
    @yield('nav-slide')
</div>