<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                @yield('header', 'Dashboard')
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item">
                    <a href="{!! action('Admin\IndexController@index') !!}" class="m-nav__link">
                        <i class="m-nav__link-icon la la-home"></i>
                        Home
                    </a>
                </li>
                @yield('breadcrumb')
            </ul>
        </div>
    </div>
</div>