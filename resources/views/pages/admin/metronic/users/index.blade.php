@extends('pages.admin.metronic.layout.application',['menu' => 'users'] )

@section('metadata')
@stop

@section('styles')
    <style>
        #index-table tr td:nth-child(7) {
            text-align: center;
        }
    </style>
@stop

@section('scripts')
    <script src="{!! \URLHelper::asset('libs/metronic/demo/default/custom/components/base/sweetalert2.js', 'admin') !!}"></script>
    <script src="{!! \URLHelper::asset('metronic/js/delete_item.js', 'admin') !!}"></script>
@stop

@section('title')
     Users | Admin | {{ config('site.name') }}
@stop

@section('header')
    Users
@stop

@section('breadcrumb')
    <li class="m-nav__separator"> - </li>
    <li class="m-nav__item">
        <a href="" class="m-nav__link">
            <span class="m-nav__link-text">
                Users
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
                        Users
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{!! action('Admin\UserController@create') !!}" class="btn m-btn--pill m-btn--air btn-outline-success btn-sm">
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
                            <form method="get" accept-charset="utf-8" action="{!! action('Admin\UserController@index') !!}">
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
                                <th>{!! \PaginationHelper::sort('name', trans('admin.pages.users.columns.name')) !!}</th>
                                <th>{!! \PaginationHelper::sort('email', trans('admin.pages.users.columns.email')) !!}</th>
                                <th>{!! \PaginationHelper::sort('gender', trans('admin.pages.users.columns.gender')) !!}</th>
                                <th>{!! \PaginationHelper::sort('telephone', trans('admin.pages.users.columns.telephone')) !!}</th>
                                <th>{!! \PaginationHelper::sort('birthday', trans('admin.pages.users.columns.birthday')) !!}</th>
                                <th>{!! \PaginationHelper::sort('is_activated', trans('admin.pages.users.columns.is_activated')) !!}</th>

                                <th style="width: 40px">@lang('admin.pages.common.label.actions')</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach( $users as $user )
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>@if($user->gender) Male @else Female @endif</td>
                                    <td>{{ $user->telephone }}</td>
                                    <td>{{ $user->birthday }}</td>
                                    <td>
                                        @if($user->is_activated)
                                            <span class="m--font-success">
												Yes
											</span>
                                        @else
                                            <span class="m--font-danger">
												No
											</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{!! action('Admin\UserController@show', $user->id) !!}"
                                           class="btn m--font-primary m-btn--pill m-btn--air no-padding">
                                            <i class="la la-edit"></i>
                                        </a>
                                        <a href="javascript:;"
                                           data-delete-url="{!! action('Admin\UserController@destroy', $user->id) !!}"
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
