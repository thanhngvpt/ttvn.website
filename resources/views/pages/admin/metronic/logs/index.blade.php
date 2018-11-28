@extends('pages.admin.metronic.layout.application',['menu' => 'logs'] )

@section('metadata')
@stop

@section('styles')
@stop

@section('scripts')
@stop

@section('title')
     System Logs | Admin | {{ config('site.name') }}
@stop

@section('header')
    System Logs
@stop

@section('breadcrumb')
    <li class="m-nav__separator"> - </li>
    <li class="m-nav__item">
        <a href="" class="m-nav__link">
            <span class="m-nav__link-text">
                Logs
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
                        System Logs
                    </h3>
                </div>
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
                            <form method="get" accept-charset="utf-8" action="{!! action('Admin\LogController@index') !!}">
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
                                <th>{!! \PaginationHelper::sort('user_name', trans('admin.pages.logs.columns.user_name')) !!}</th>
                                <th>{!! \PaginationHelper::sort('email', trans('admin.pages.logs.columns.email')) !!}</th>
                                <th>{!! \PaginationHelper::sort('action', trans('admin.pages.logs.columns.action')) !!}</th>
                                <th>{!! \PaginationHelper::sort('table', trans('admin.pages.logs.columns.table')) !!}</th>
                                <th>{!! \PaginationHelper::sort('table', trans('admin.pages.logs.columns.record_id')) !!}</th>
                                <th>{!! \PaginationHelper::sort('table', trans('admin.pages.logs.columns.query')) !!}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach( $logs as $log )
                                <tr>
                                    <td>{{ $log->id }}</td>
                                    <td>{{ $log->user_name }}</td>
                                    <td>{{ $log->email }}</td>
                                    <td>{{ $log->action }}</td>
                                    <td>{{ $log->table }}</td>
                                    <td>{{ $log->record_id }}</td>
                                    <td>{{ $log->query }}</td>
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
