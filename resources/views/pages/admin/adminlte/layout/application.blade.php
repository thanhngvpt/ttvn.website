<!DOCTYPE html>
<html>
<head>
    <!-------------------------------- Begin: Meta ----------------------------------->
    @include('pages.admin.' . config('view.admin') . '.layout.meta')
    @yield('metadata')
    <!-------------------------------- End: Meta ----------------------------------->

    <!-------------------------------- Begin: stylesheet ----------------------------------->
    @include('pages.admin.' . config('view.admin') . '.layout.styles')
    @yield('styles')
    <!-------------------------------- End: stylesheet ----------------------------------->

</head>
<body class="{!! isset($bodyClasses) ? $bodyClasses : 'hold-transition skin-blue sidebar-mini' !!}">
@if( isset($noFrame) && $noFrame == true )
    @yield('content')
@else
    <div class="wrapper">
        <!-------------------------------- Begin: Header ----------------------------------->
        @include('pages.admin.' . config('view.admin') . '.layout.header')
        <!-------------------------------- End: Header ----------------------------------->

        <!-------------------------------- Begin: Left Navigation ----------------------------------->
        @include('pages.admin.' . config('view.admin') . '.layout.left_navigation')
        <!-------------------------------- End: Left Navigation ----------------------------------->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('header', 'Dashboard')
                </h1>
                <ul class="breadcrumb">
                    <li><a href="{!! action('Admin\IndexController@index') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
                    @yield('breadcrumb')
                </ul>
            </section>

            <!-- Main content -->
            <section class="content" style="min-height: 650px;">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>

        <!-------------------------------- Begin: Footer ----------------------------------->
        @include('pages.admin.' . config('view.admin') . '.layout.footer')
        <!-------------------------------- End: Footer ----------------------------------->
    </div>
@endif

<!-------------------------------- Begin: Script ----------------------------------->
@include('pages.admin.' . config('view.admin') . '.layout.scripts')
@yield('scripts')
<!-------------------------------- End: Script ----------------------------------->
</body>
</html>
