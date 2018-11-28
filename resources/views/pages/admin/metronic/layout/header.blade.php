<header id="m_header" class="m-grid__item m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
    <div class="m-container m-container--fluid m-container--full-height">
        <div class="m-stack m-stack--ver m-stack--desktop">
            <!-- BEGIN: Brand -->
            <div class="m-stack__item m-brand  m-brand--skin-dark ">
                <div class="m-stack m-stack--ver m-stack--general">
                    <div class="m-stack__item m-stack__item--middle m-brand__logo">
                        <a href="../../../index.html" class="m-brand__logo-wrapper">
                            <img alt="" src="{!! \URLHelper::asset('libs/metronic/demo/default/media/img/logo/logo_default_dark.png', 'admin') !!}"/>
                        </a>
                    </div>
                    <div class="m-stack__item m-stack__item--middle m-brand__tools">
                        <!-- BEGIN: Left Aside Minimize Toggle -->
                        <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block">
                            <span></span>
                        </a>
                        <!-- END -->
                        <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                        <a href="javascript:;" id="m_aside_left_offcanvas_toggle"
                           class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                            <span></span>
                        </a>
                        <!-- END -->
                        <!-- BEGIN: Responsive Header Menu Toggler -->
                        <a id="m_aside_header_menu_mobile_toggle" href="javascript:;"
                           class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                            <span></span>
                        </a>
                        <!-- END -->
                        <!-- BEGIN: Topbar Toggler -->
                        <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;"
                           class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                            <i class="flaticon-more"></i>
                        </a>
                        <!-- BEGIN: Topbar Toggler -->
                    </div>
                </div>
            </div>
            <!-- END: Brand -->

            <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                <!-- BEGIN: Horizontal Menu -->
                <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark "
                        id="m_aside_header_menu_mobile_close_btn">
                    <i class="la la-close"></i>
                </button>
                <div id="m_header_menu"
                     class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">
                    <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                        <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true">
                            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-icon flaticon-add"></i>
                                <span class="m-menu__link-text">
                                    Actions
                                </span>
                                <i class="m-menu__hor-arrow la la-angle-down"></i>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " aria-haspopup="true">
                                        <a href="../../../header/actions.html" class="m-menu__link ">
                                            <i class="m-menu__link-icon flaticon-file"></i>
                                            <span class="m-menu__link-text">
                                                Create New Post
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                        <a href="../../../header/actions.html" class="m-menu__link ">
                                            <i class="m-menu__link-icon flaticon-diagram"></i>
                                            <span class="m-menu__link-title">
                                                <span class="m-menu__link-wrap">
                                                    <span class="m-menu__link-text">
                                                        Generate Reports
                                                    </span>
                                                    <span class="m-menu__link-badge">
                                                        <span class="m-badge m-badge--success">
                                                            2
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item  m-menu__item--submenu" m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
                                        <a href="javascript:;" class="m-menu__link m-menu__toggle">
                                            <i class="m-menu__link-icon flaticon-business"></i>
                                            <span class="m-menu__link-text">
                                                Manage Orders
                                            </span>
                                            <i class="m-menu__hor-arrow la la-angle-right"></i>
                                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                                        </a>
                                        <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                                            <span class="m-menu__arrow "></span>
                                            <ul class="m-menu__subnav">
                                                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="../../../header/actions.html" class="m-menu__link ">
                                                        <span class="m-menu__link-text">
                                                            Latest Orders
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="../../../header/actions.html" class="m-menu__link ">
                                                        <span class="m-menu__link-text">
                                                            Pending Orders
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="../../../header/actions.html" class="m-menu__link ">
                                                        <span class="m-menu__link-text">
                                                            Processed Orders
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="../../../header/actions.html" class="m-menu__link ">
                                                        <span class="m-menu__link-text">
                                                            Delivery Reports
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item " m-menu-link-redirect="1"
                                                    aria-haspopup="true">
                                                    <a href="../../../header/actions.html" class="m-menu__link ">
                                                                        <span class="m-menu__link-text">
                                                                            Payments
                                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="../../../header/actions.html" class="m-menu__link ">
                                                        <span class="m-menu__link-text">
                                                            Customers
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="m-menu__item  m-menu__item--submenu" m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
                                        <a href="#" class="m-menu__link m-menu__toggle">
                                            <i class="m-menu__link-icon flaticon-chat-1"></i>
                                                <span class="m-menu__link-text">
                                                    Customer Feedbacks
                                                </span>
                                            <i class="m-menu__hor-arrow la la-angle-right"></i>
                                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                                        </a>
                                        <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                                            <span class="m-menu__arrow "></span>
                                            <ul class="m-menu__subnav">
                                                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="../../../header/actions.html" class="m-menu__link ">
                                                        <span class="m-menu__link-text">
                                                            Customer Feedbacks
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="../../../header/actions.html" class="m-menu__link ">
                                                        <span class="m-menu__link-text">
                                                            Supplier Feedbacks
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="../../../header/actions.html" class="m-menu__link ">
                                                        <span class="m-menu__link-text">
                                                            Reviewed Feedbacks
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="../../../header/actions.html" class="m-menu__link ">
                                                        <span class="m-menu__link-text">
                                                            Resolved Feedbacks
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                                    <a href="../../../header/actions.html" class="m-menu__link ">
                                                    <span class="m-menu__link-text">
                                                        Feedback Reports
                                                    </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true">
                                        <a href="../../../header/actions.html" class="m-menu__link ">
                                            <i class="m-menu__link-icon flaticon-users"></i>
                                            <span class="m-menu__link-text">
                                                Register Member
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- END: Horizontal Menu -->

                <!-- BEGIN: Topbar -->
                <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
                    <div class="m-stack__item m-topbar__nav-wrapper">
                        <ul class="m-topbar__nav m-nav m-nav--inline">
                            <li class="m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light	m-list-search m-list-search--skin-light" m-dropdown-toggle="click" id="m_quicksearch" m-quicksearch-mode="dropdown" m-dropdown-persistent="1">
                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <span class="m-nav__link-icon">
                                        <i class="flaticon-search-1"></i>
                                    </span>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                                    <div class="m-dropdown__inner ">
                                        <div class="m-dropdown__header">
                                            <form class="m-list-search__form">
                                                <div class="m-list-search__form-wrapper">
                                                    <span class="m-list-search__form-input-wrapper">
                                                        <input id="m_quicksearch_input" autocomplete="off"
                                                               type="text" name="q"
                                                               class="m-list-search__form-input" value=""
                                                               placeholder="Search...">
                                                    </span>
                                                    <span class="m-list-search__form-icon-close"
                                                          id="m_quicksearch_close">
                                                        <i class="la la-remove"></i>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__scrollable m-scrollable" data-scrollable="true"
                                                 data-max-height="300" data-mobile-max-height="200">
                                                <div class="m-dropdown__content"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" m-dropdown-toggle="click" m-dropdown-persistent="1">
                                <a href="#" class="m-nav__link m-dropdown__toggle" id="">
                                    @if($unreadNotificationCount)
                                        <span class="m-nav__link-badge m-badge m-badge--light m-badge--danger">{{$unreadNotificationCount}}</span>
                                    @endif
                                    <span class="m-nav__link-icon">
                                        <i class="flaticon-music-2"></i>
                                    </span>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__header m--align-center" style="background: url({!! \URLHelper::asset('libs/metronic/app/media/img/misc/notification_bg.jpg', 'admin') !!}); background-size: cover;">
                                            <span class="m-dropdown__header-title">
                                                {{$unreadNotificationCount}} New
                                            </span>
                                            <span class="m-dropdown__header-subtitle">
                                                User Notifications
                                            </span>
                                        </div>
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
                                                    @foreach(\App\Models\Notification::CATEGORY_TYPE as $type => $displayName)
                                                        <li class="nav-item m-tabs__item">
                                                            <a class="nav-link m-tabs__link @if($type == \App\Models\Notification::CATEGORY_TYPE_APPLICATION) active @endif" data-toggle="tab" href="#topbar_notifications_{{$type}}" role="tab">
                                                                {{ $displayName }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                                <div class="tab-content">
                                                    @foreach(\App\Models\Notification::CATEGORY_TYPE as $type => $displayName)
                                                        <div class="tab-pane @if($type == \App\Models\Notification::CATEGORY_TYPE_APPLICATION) active @endif" id="topbar_notifications_{{$type}}" role="tabpanel">
                                                            <div class="m-scrollable" data-scrollable="true" data-max-height="250" data-mobile-max-height="200">
                                                                <div class="m-list-timeline m-list-timeline--skin-light">
                                                                    <div class="m-list-timeline__items">
                                                                        <?php $notices = $notifications->where('category_type', $type); ?>
                                                                        @if(count($notices))
                                                                            @foreach($notices as $notice)
                                                                                <div class="m-list-timeline__item @if($notice->id > $authUser->last_notification_id) unread @endif">
                                                                                    <a href="{{ action('Admin\AdminUserNotificationController@show', $notice->id) }}" style="width: 100%; height: 100%; position: absolute;"></a>
                                                                                    <span class="m-list-timeline__badge"></span>
                                                                                    <span class="m-list-timeline__text">
                                                                                        {!! substr($notice->content, 0, 65) !!} @if( strlen($notice->content) > 65 )...@endif

                                                                                        @if($notice->type == \App\Models\Notification::TYPE_WARNING)
                                                                                            <span class="m-badge m-badge--warning m-badge--wide">Caution</span>
                                                                                        @endif
                                                                                    </span>
                                                                                    <span class="m-list-timeline__time">
                                                                                        <?php
                                                                                        $date = new \DateTime($notice->sent_at);
                                                                                        $now  = new \DateTime();
                                                                                        $diff = $date->diff( $now );

                                                                                        if($diff->format("%d")) {
                                                                                            $date = date_create('2018-07-30 04:20:45');
                                                                                            echo date_format($date, 'd/m') . ' at ' . date_format($date, 'H:i');
                                                                                        } elseif ($diff->format("%h")) {
                                                                                            echo $diff->format("%h hours ago");
                                                                                        } else {
                                                                                            echo $diff->format("%i minutes ago");
                                                                                        }
                                                                                        ?>
                                                                                    </span>
                                                                                </div>
                                                                            @endforeach

                                                                            <p class="text-center">
                                                                                <a href="{{ action('Admin\AdminUserNotificationController@index') }}" class="btn btc-sm m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-accent" style="width: 125px; padding: 0.1rem 1rem; margin-top: 10px;">Show All</a>
                                                                            </p>
                                                                        @else
                                                                            <div class="m-stack m-stack--ver m-stack--general" style="min-height: 180px;">
                                                                                <div class="m-stack__item m-stack__item--center m-stack__item--middle">
                                                                                <span class="">
                                                                                    All caught up!
                                                                                    <br>
                                                                                    No new logs.
                                                                                </span>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="m-nav__item m-topbar__quick-actions m-topbar__quick-actions--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <span class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
                                    <span class="m-nav__link-icon">
                                        <i class="flaticon-share"></i>
                                    </span>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__header m--align-center" style="background: url({!! \URLHelper::asset('libs/metronic/app/media/img/misc/quick_actions_bg.jpg', 'admin') !!}); background-size: cover;">
                                            <span class="m-dropdown__header-title">
                                                Quick Actions
                                            </span>
                                            <span class="m-dropdown__header-subtitle">
                                                Shortcuts
                                            </span>
                                        </div>
                                        <div class="m-dropdown__body m-dropdown__body--paddingless">
                                            <div class="m-dropdown__content">
                                                <div class="data" data="false" data-max-height="380"
                                                     data-mobile-max-height="200">
                                                    <div class="m-nav-grid m-nav-grid--skin-light">
                                                        <div class="m-nav-grid__row">
                                                            <a href="#" class="m-nav-grid__item">
                                                                <i class="m-nav-grid__icon flaticon-file"></i>
                                                                <span class="m-nav-grid__text">
                                                                    Generate Report
                                                                </span>
                                                            </a>
                                                            <a href="#" class="m-nav-grid__item">
                                                                <i class="m-nav-grid__icon flaticon-time"></i>
                                                                <span class="m-nav-grid__text">
                                                                    Add New Event
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <div class="m-nav-grid__row">
                                                            <a href="#" class="m-nav-grid__item">
                                                                <i class="m-nav-grid__icon flaticon-folder"></i>
                                                                <span class="m-nav-grid__text">
                                                                    Create New Task
                                                                </span>
                                                            </a>
                                                            <a href="#" class="m-nav-grid__item">
                                                                <i class="m-nav-grid__icon flaticon-clipboard"></i>
                                                                <span class="m-nav-grid__text">
                                                                    Completed Tasks
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <span class="m-topbar__userpic">
                                        <img src="{!! \URLHelper::asset('libs/metronic/app/media/img/users/user4.jpg', 'admin') !!}"
                                             class="m--img-rounded m--marginless m--img-centered" alt=""/>
                                    </span>
                                    <span class="m-topbar__username m--hide">
                                        Nick
                                    </span>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__header m--align-center"
                                             style="background: url({!! \URLHelper::asset('libs/metronic/app/media/img/misc/user_profile_bg.jpg', 'admin') !!}); background-size: cover;">
                                            <div class="m-card-user m-card-user--skin-dark">
                                                <div class="m-card-user__pic">
                                                    <img src="{!! \URLHelper::asset('libs/metronic/app/media/img/users/user4.jpg', 'admin') !!}"
                                                         class="m--img-rounded m--marginless" alt=""/>
                                                </div>
                                                <div class="m-card-user__details">
                                                    <span class="m-card-user__name m--font-weight-500">
                                                        Mark Andre
                                                    </span>
                                                    <a href="" class="m-card-user__email m--font-weight-300 m-link">
                                                        mark.andre@gmail.com
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav m-nav--skin-light">
                                                    <li class="m-nav__section m--hide">
                                                        <span class="m-nav__section-text">
                                                            Section
                                                        </span>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="{{ action('Admin\MeController@index') }}" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                            <span class="m-nav__link-title">
                                                                <span class="m-nav__link-wrap">
                                                                    <span class="m-nav__link-text">
                                                                        My Profile
                                                                    </span>
                                                                    <span class="m-nav__link-badge">
                                                                        <span class="m-badge m-badge--success">
                                                                            2
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="{{ action('Admin\MeController@index') }}" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                            <span class="m-nav__link-text">
                                                                Activity
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="{{ action('Admin\MeController@index') }}" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                            <span class="m-nav__link-text">
                                                                Messages
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__separator m-nav__separator--fit"></li>
                                                    <li class="m-nav__item">
                                                        <a href="{{ action('Admin\MeController@index') }}" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                            <span class="m-nav__link-text">
                                                                FAQ
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="{{ action('Admin\MeController@index') }}" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                            <span class="m-nav__link-text">
                                                                Support
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__separator m-nav__separator--fit"></li>
                                                    <li class="m-nav__item">
                                                        <form id="signout" method="post" action="{!! URL::action('Admin\AuthController@postSignOut') !!}">{!! csrf_field() !!}</form>
                                                        <a href="#" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder" onclick="$('#signout').submit(); return false;">Sign out</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li id="language-switcher" class="m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light	m-list-search m-list-search--skin-light" m-dropdown-toggle="click" id="m_quicksearch" m-quicksearch-mode="dropdown" m-dropdown-persistent="1">
                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <span class="m-nav__link-icon">
                                        <img src="{!! \URLHelper::asset('img/flags/' . \App::getLocale() . '.png', 'common') !!}" alt="" style="width: 32px;">
                                    </span>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                                    <div class="m-dropdown__inner ">
                                        <div class="m-dropdown__header">
                                            <?php $siteLanguages = ['gb' => 'English', 'jp' => 'Japanese', 'vn' => 'Tiếng Việt'] ?>
                                            <ul class="m-menu__subnav">
                                                @foreach($siteLanguages as $key => $name)
                                                    <li class="m-menu__item " aria-haspopup="true">
                                                        <a href="?locale={{$key}}" class="m-menu__link ">
                                                            <img src="{!! \URLHelper::asset("img/flags/$key.png", 'common') !!}" alt="" style="width: 32px;">
                                                            <span class="m-menu__link-text">
                                                                {{$name}}
                                                            </span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: Topbar -->
            </div>
        </div>
    </div>
</header>