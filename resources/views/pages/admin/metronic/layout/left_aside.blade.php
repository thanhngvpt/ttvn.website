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
            <li class="m-menu__item @if( $menu=='table_news') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\TableNewController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.table_news')
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='banners') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\BannerController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.banners')
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='videos') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\VideoController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.videos')
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='headings') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\HeadingController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.headings')
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='infor_groups') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\InforGroupController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.infor_groups')
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='data_high_lights') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\DataHighLightController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.data_high_lights')
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='companies') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\CompanyController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.companies')
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='introduces') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\IntroduceController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.introduces')
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='partners') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\PartnerController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.partners')
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='histories') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\HistoryController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.histories')
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='leader_ships') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\LeaderShipController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.leader_ships')
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='fields') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\FieldController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.fields')
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='projects') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\ProjectController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.projects')
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='new_categories') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\NewCategoryController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.new_categories')
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='cultural_companies') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\CulturalCompanyController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.cultural_companies')
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='criteria_candidates') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\CriteriaCandidateController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.criteria_candidates')
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='job_categories') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\JobCategoryController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.job_categories')
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='jobs') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\JobController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.jobs')
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='meta') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\MetaController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.meta')
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='footers') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\FooterController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.footers')
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='contacts') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\ContactController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.contacts')
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='cadidates') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\CadidateController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.cadidates')
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='save_values') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\SaveValueController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sticky-note"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                @lang('admin.menu.save_values')
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