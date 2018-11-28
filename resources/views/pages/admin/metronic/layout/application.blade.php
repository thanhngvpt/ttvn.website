<!DOCTYPE html>
<html>
<head>
    <!-------------------------------- Begin: Meta ----------------------------------->
    @include('pages.admin.metronic.layout.meta')
    @yield('metadata')
    <!-------------------------------- End: Meta ----------------------------------->

    <!-------------------------------- Begin: stylesheet ----------------------------------->
    @include('pages.admin.metronic.layout.styles')
    @yield('styles')
    <!-------------------------------- End: stylesheet ----------------------------------->
</head>

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
    <!-------------------------------- Begin: Page ----------------------------------->
    <div class="m-grid m-grid--hor m-grid--root m-page">
        @if( isset($noFrame) && $noFrame == true )
            @yield('content')
        @else
            <!-------------------------------- Begin: Header ----------------------------------->
            @include('pages.admin.metronic.layout.header')
            <!-------------------------------- End: Header ----------------------------------->

            <!-------------------------------- Begin: Body ----------------------------------->
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
                <!-------------------------------- Begin: Left Aside ----------------------------------->
                @include('pages.admin.metronic.layout.left_aside')
                        <!-------------------------------- End: Left Aside ----------------------------------->

                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-------------------------------- Begin: Breadcrumb ----------------------------------->
                    @include('pages.admin.metronic.layout.breadcrumb')
                    <!-------------------------------- End: Breadcrumb ----------------------------------->

                    <!-------------------------------- Begin: Main Content ----------------------------------->
                    <div class="m-content">
                        @yield('content')
                    </div>
                    <!-------------------------------- End: Main Content ----------------------------------->
                </div>
            </div>
            <!-------------------------------- End: Body ----------------------------------->

            <!-------------------------------- Begin: Scroll Top ----------------------------------->
            <div id="m_scroll_top" class="m-scroll-top">
                <i class="la la-arrow-up"></i>
            </div>
            <!-------------------------------- End: Scroll Top ----------------------------------->

            <!-------------------------------- Begin: Footer ----------------------------------->
            @include('pages.admin.metronic.layout.footer')
            <!-------------------------------- End: Footer ----------------------------------->
        @endif
    </div>
    <!-------------------------------- End: Page ----------------------------------->

    <!-------------------------------- Begin: Script ----------------------------------->
    @include('pages.admin.metronic.layout.scripts')
    @yield('scripts')
    <!-------------------------------- End: Script ----------------------------------->
</body>
</html>
