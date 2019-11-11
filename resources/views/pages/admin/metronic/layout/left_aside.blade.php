<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow " style="padding-top: 0;">
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">
                    MAIN NAVIGATION
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>

            <li class="m-menu__item @if( $menu=='dashboard') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\IndexController@index') !!}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.dashboard')
                            </span>
                        </span>
                    </span>
                </a>
            </li>
            <!-- %%SIDEMENU%% -->
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>