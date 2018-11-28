@extends('pages.admin.metronic.layout.application',['menu' => 'admin-users'] )

@section('metadata')
@stop

@section('styles')
@stop

@section('scripts')
    <script src="{!! \URLHelper::asset('libs/metronic/demo/default/custom/components/base/sweetalert2.js', 'admin') !!}"></script>
    <script src="{!! \URLHelper::asset('metronic/js/delete_item.js', 'admin') !!}"></script>
@stop

@section('title')
     AdminUser | Admin | {{ config('site.name') }}
@stop

@section('header')
    AdminUser
@stop

@section('breadcrumb')
    <li class="m-nav__separator"> - </li>
    <li class="m-nav__item">
        <a href="" class="m-nav__link">
            <span class="m-nav__link-text">
                AdminUser
            </span>
        </a>
    </li>
@stop

@section('content')
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        AdminUser
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{!! action('Admin\AdminUserController@create') !!}" class="btn m-btn--pill m-btn--air btn-outline-success btn-sm">
                            <span>
                                <i class="la la-plus"></i>
                                <span>Create New</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="m-portlet__body wrap-index">
            <div class="dataTables_wrapper">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        Total: {{$count}} results
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="m_table_1_filter" class="dataTables_filter">
                            <form method="get" accept-charset="utf-8" action="{!! action('Admin\AdminUserController@index') !!}">
                                {!! csrf_field() !!}
                                <div class="m-input-icon m-input-icon--left m-input-icon--right">
                                    <input type="text" name="keyword" id="keyword" value="{{ $keyword }}" class="form-control m-input m-input--pill" placeholder="Tìm kiếm ...">
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                        <span>
                                            <i class="la la-search"></i>
                                        </span>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 wrap-index-table">
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="index-table">
                            <thead>
                            <tr>
                                <th style="width: 10px">{!! \PaginationHelper::sort('id', 'ID') !!}</th>
                                <th>{!! \PaginationHelper::sort('name', trans('admin.pages.admin-users.columns.name')) !!}</th>
                                <th>{!! \PaginationHelper::sort('email', trans('admin.pages.admin-users.columns.email')) !!}</th>
                                <th>{!! \PaginationHelper::sort('password', trans('admin.pages.admin-users.columns.password')) !!}</th>
                                <th>{!! \PaginationHelper::sort('locale', trans('admin.pages.admin-users.columns.locale')) !!}</th>

                                <th style="width: 40px">@lang('admin.pages.common.label.actions')</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach( $adminUsers as $adminUser )
                                <tr>
                                    <td>{{ $adminUser->id }}</td>
                                    <td>{{ $adminUser->name }}</td>
                                    <td>{{ $adminUser->email }}</td>
                                    <td>{{ $adminUser->password }}</td>
                                    <td>{{ $adminUser->locale }}</td>
                                    <td>
                                        <a href="{!! action('Admin\AdminUserController@show', $adminUser->id) !!}"
                                           class="btn m--font-primary m-btn--pill m-btn--air no-padding">
                                            <i class="la la-edit"></i>
                                        </a>
                                        <a href="javascript:;"
                                           data-delete-url="{!! action('Admin\AdminUserController@destroy', $adminUser->id) !!}"
                                           class="btn m--font-danger m-btn--pill m-btn--air no-padding delete-button">
                                            <i class="la la-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row wrap-bottom-pagination">
                    <div class="col-sm-12">
                        {!! \PaginationHelper::render($paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit'], $count, $paginate['baseUrl'], ['keyword' => $keyword], 5, 'pages.admin.metronic.shared.bottom-pagination') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
