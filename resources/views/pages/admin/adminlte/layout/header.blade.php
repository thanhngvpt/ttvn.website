<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">{{$unreadNotificationCount}}</span>
                    </a>
                    <ul class="dropdown-menu" style="width: 500px;">
                        <li class="header">{{'You have '.$unreadNotificationCount.' messages'}}</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu" style="max-height: 400px;">
                                @foreach($notifications as $notification)
                                    <li @if($notification->read ==0) style="background-color: #edf2fa" @endif><!-- start message -->
                                        <a href="{!! action('Admin\AdminUserNotificationController@show', $notification->id) !!}" style="white-space: inherit;">
                                            <div class="pull-left">
                                                <img src="{!! \URLHelper::asset('libs/adminlte/img/user2-160x160.jpg','admin') !!}" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                System Messages

                                                <small>
                                                    <i class="fa fa-clock-o"></i>
                                                    <?php
                                                    $date = new DateTime( $notification->created_at );
                                                    $now = new DateTime();

                                                    echo $date->diff( $now )
                                                            ->format( "%d days, %h hours and %i minutes ago" );
                                                    ?>
                                                </small>
                                            </h4>
                                            <p>{{ substr($notification->content, 0, 180) }}@if( strlen($notification->content) > 180 )...@endif</p>
                                        </a>
                                    </li>
                                @endforeach
                                <!-- end message -->
                            </ul>
                        </li>
                        <li id="loadding" class="hidden">
                            Loadding ...
                        </li>
                        <li class="footer"><a href="{!! action('Admin\AdminUserNotificationController@index') !!}">See All Messages</a></li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="@if(!empty($authUser->present()->profileImage())) {{ $authUser->present()->profileImage()->present()->url }} @else {!! \URLHelper::asset('img/user_avatar.png', 'common') !!} @endif" class="user-image" alt="User Image">
                        <span class="hidden-xs">@if($authUser->name){{ $authUser->name }} @else {{ $authUser->email }} @endif</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="@if(!empty($authUser->present()->profileImage())) {{ $authUser->present()->profileImage()->present()->url }} @else {!! \URLHelper::asset('img/user_avatar.png', 'common') !!} @endif" class="img-circle" alt="User Image">

                            <p>
                                @if($authUser->name) {{ $authUser->name }} @else {{ $authUser->email }} @endif
                                <small>@if( count($authUser->roles) ) {{ $authUser->roles[0]->getRoleName() }} @endif</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ action('Admin\MeController@index') }}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <form id="signout" method="post" action="{!! URL::action('Admin\AuthController@postSignOut') !!}">{!! csrf_field() !!}</form>
                                <a href="#" class="btn btn-default btn-flat" onclick="$('#signout').submit(); return false;">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>

                <li>
                    <div id="language-switcher" class="flagstrap" data-selected-country="{{strtoupper(\App::getLocale())}}" style="margin: 10px 10px 0 0;"></div>
                </li>
            </ul>
        </div>
    </nav>
</header>