<div class="navbar-top-area">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand navbar-brand-white" href="/">
            <img src="{{ asset('images/logo.svg') }}" class="img-fluid logo-img">
        </a>
        <a class="navbar-brand navbar-brand-color" href="/">
            <img src="{{ asset('images/logo-color.svg') }}" class="img-fluid logo-img">
        </a>
        <button class="navbar-toggler" type="button" onclick="$('#collapsibleNavbar').addClass('show')">
            <span class="navbar-toggler-icon toggle-menu-white"></span>
            <span class="navbar-toggler-icon toggle-menu-color"></span>
        </button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" >
            <ul class="navbar-nav mr-auto">
                <li class="nav-item @if($path_url == null) active @endif">
                    <a class="nav-link" href="/">Trang chủ</a>
                </li>
                <li class="nav-item @if($path_url == 'introduce-company') active @endif">
                    <a class="nav-link">
                        Giới thiệu
                        <i class="fas fa-caret-down"></i>
                    </a>
                    <div id="introduce-menu-xl" class="menu-xl">
                        <ul class="menu-xl-child">
                            <li>
                                <a href="{!!action('Web\IntroduceCompanyController@index')!!}">
                                    <img src="{{ asset('images/arrow-right-new.svg') }}" class="img-fluid" />
                                    Về TTVN Group
                                </a>
                            </li>
                            <li>
                                <a href="{!!action('Web\IntroduceCompanyController@leader')!!}">
                                    <img src="{{ asset('images/arrow-right-new.svg') }}" class="img-fluid" />       
                                    Ban lãnh đạo
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item @if($path_url == 'scope-active') active @endif">
                    <a class="nav-link">
                        Lĩnh vực hoạt động
                        <i class="fas fa-caret-down"></i>
                    </a>
                    <div id="field-menu-xl" class="menu-xl">
                        <ul class="menu-xl-child">
                            @foreach($menu_fields as $menu_field)
                            <li>
                                <a href="{!!action('Web\ScopeActiveController@index', $menu_field->slug)!!}">
                                    <img src="{{ asset('images/arrow-right-new.svg') }}" class="img-fluid" />
                                    {{$menu_field->name}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li class="nav-item @if($path_url == 'news-category') active @endif">
                    <a class="nav-link">
                            Tin tức
                        <i class="fas fa-caret-down"></i>
                    </a>
                    <div id="news-menu-xl" class="menu-xl">
                        <ul class="menu-xl-child">
                            <li>
                                <a href="{!!action('Web\NewsController@all')!!}">
                                        <img src="{{ asset('images/arrow-right-new.svg') }}" class="img-fluid" />
                                        Tất cả
                                </a>

                            </li>
                            @foreach($menu_news_categories as $menu_news_category)
                            <li>
                                <a href="{!!action('Web\NewsController@index', $menu_news_category->slug)!!}">
                                    <img src="{{ asset('images/arrow-right-new.svg') }}" class="img-fluid" />
                                    {{$menu_news_category->name}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li class="nav-item @if($path_url == 'job') active @endif">
                    <a class="nav-link" href="{!! action('Web\JobController@index') !!}">Tuyển dụng</a>
                </li>
                <li class="nav-item @if($path_url == 'contact') active @endif">
                    <a class="nav-link" href="/lien-he">Liên hệ</a>
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
            <a href="/">
                <img src="{{ asset('images/logo-footer.svg') }}" class="img-fluid" />
            </a>
            <img src="{{ asset('images/close-modal.svg') }}" onclick="$('#collapsibleNavbar').removeClass('show')" class="img-fluid" />
        </div>
        <ul class="menu-mb-parent">
            <li>
                <a href="/" class="@if($path_url == null) active @endif">
                    Trang chủ
                </a>
            </li>
            <li>
                <a data-toggle="collapse" data-target="#introduce-menu-mb" class="@if($path_url == 'introduce-company') active @endif">
                    Giới thiệu
                    <i class="fas fa-caret-right"></i>
                </a>
                <div id="introduce-menu-mb" class="collapse">
                    <ul class="menu-mb-child">
                        <li>
                            <a href="{!!action('Web\IntroduceCompanyController@index')!!}">Về TTVN Group</a>
                        </li>
                        <li>
                            <a href="{!!action('Web\IntroduceCompanyController@leader')!!}">Ban lãnh đạo</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" data-target="#field-menu-mb" class="@if($path_url == 'scope-active') active @endif">
                        Lĩnh vực hoạt động
                        <i class="fas fa-caret-right"></i>
                </a>
                <div id="field-menu-mb" class="collapse">
                    <ul class="menu-mb-child">
                        @foreach($menu_fields as $menu_field)
                        <li>
                            <a href="{!!action('Web\ScopeActiveController@index', $menu_field->slug)!!}">
                                {{$menu_field->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" data-target="#news-menu-mb" class="@if($path_url == 'news-category') active @endif">
                        Tin tức
                        <i class="fas fa-caret-right"></i>
                </a>
                <div id="news-menu-mb" class="collapse">
                    <ul class="menu-mb-child">
                        <li>
                            <a href="{!!action('Web\NewsController@all')!!}">
                                Tất cả
                            </a>
                        </li>
                        @foreach($menu_news_categories as $menu_news_category)
                        <li>
                            <a href="{!!action('Web\NewsController@index', $menu_news_category->slug)!!}">
                                {{$menu_news_category->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </li>
            <li>
                <a href="{!! action('Web\JobController@index') !!}" class="@if($path_url == 'job') active @endif">
                    Tuyển dụng
                </a>
            </li>
            <li>
                <a href="/lien-he" class="@if($path_url == 'contact') active @endif">
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