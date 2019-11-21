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
                    <i class="m-menu__link-icon la la-newspaper-o"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Tin tức
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='banners') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\BannerController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-picture-o"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Banner
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='videos') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\VideoController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-file-video-o"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Video
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='headings') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\HeadingController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-h-square"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Heading
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='infor_groups') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\InforGroupController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-info"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Thông tin tập đoàn
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='companies') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\CompanyController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-university"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Công ty
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='introduces') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\IntroduceController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-exclamation-circle"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Giới thiệu tập đoàn
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='partners') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\PartnerController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-users"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Đối tác
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='histories') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\HistoryController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-history"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Lịch sử phát triển
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='leader_ships') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\LeaderShipController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-user"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Ban lãnh đạo
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='fields') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\FieldController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-clone"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Lĩnh vực
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
                                Dự án
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='new_categories') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\NewCategoryController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-align-justify"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Danh mục tin tức
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='cultural_companies') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\CulturalCompanyController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-check-square"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Văn hóa doanh nghiệp
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='criteria_candidates') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\CriteriaCandidateController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-files-o"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Tiêu chí ứng viên
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='job_categories') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\JobCategoryController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-tasks"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Danh mục tuyển dụng
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='jobs') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\JobController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-user-plus"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Tuyển dụng
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='meta') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\MetaController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-ticket"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Meta
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='footers') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\FooterController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-cog"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                               Footer
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='contacts') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\ContactController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-phone"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Liên hệ
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='cadidates') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\CadidateController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-user-times"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Ứng viên
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='save_values') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\SaveValueController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-viacoin"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Giá trị tích lũy
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item @if( $menu=='data_highlights') m-menu__item--active @endif" aria-haspopup="true">
                <a href="{!! \URL::action('Admin\DataHighlightController@index') !!}" class="m-menu__link">
                    <i class="m-menu__link-icon la la-sort-numeric-desc"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Số liệu nổi bật
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
