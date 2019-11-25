@extends('pages.admin.metronic.layout.application',['menu' => 'cadidates'] )

@section('metadata')
@stop

@section('styles')
@stop

@section('scripts')
    <script src="{!! \URLHelper::asset('libs/metronic/demo/default/custom/components/base/sweetalert2.js', 'admin') !!}"></script>
    <script src="{!! \URLHelper::asset('metronic/js/delete_item.js', 'admin') !!}"></script>
@stop

@section('title')
     Cadidate | Admin | {{ config('site.name') }}
@stop

@section('header')
    Cadidate
@stop

@section('breadcrumb')
    <li class="m-nav__separator"> - </li>
    <li class="m-nav__item">
        <a href="" class="m-nav__link">
            <span class="m-nav__link-text">
                Cadidate
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
                        Cadidate
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{!! action('Admin\CadidateController@create') !!}" class="btn m-btn--pill m-btn--air btn-outline-success btn-sm">
                            <span>
                                <i class="la la-plus"></i>
                                <span>Create New</span>
                            </span>
                        </a>
                    </li>
                    <li class="m-portlet__nav-item"></li>
                    <li class="m-portlet__nav-item">
                        <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                            <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                                <i class="la la-ellipsis-h m--font-brand"></i>
                            </a>
                            <div class="m-dropdown__wrapper">
                                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                <div class="m-dropdown__inner">
                                    <div class="m-dropdown__body">
                                        <div class="m-dropdown__content">
                                            <ul class="m-nav">
                                                <li class="m-nav__section m-nav__section--first">
                                                    <span class="m-nav__section-text">
                                                        Quick Actions
                                                    </span>
                                                </li>
                                                <li class="m-nav__item">
                                                    <a href="" class="m-nav__link">
                                                        <i class="m-nav__link-icon flaticon-share"></i>
                                                        <span class="m-nav__link-text">
                                                            Create Post
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            <form method="get" accept-charset="utf-8" action="{!! action('Admin\CadidateController@index') !!}">
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
                                                                                                                    <th>{!! \PaginationHelper::sort('name', trans('admin.pages.cadidates.columns.name')) !!}</th>
                                                                                                                    <th>{!! \PaginationHelper::sort('phone', trans('admin.pages.cadidates.columns.phone')) !!}</th>
                                                                                                                    <th>{!! \PaginationHelper::sort('email', trans('admin.pages.cadidates.columns.email')) !!}</th>
                                                                                                                    <th>{!! \PaginationHelper::sort('file', trans('admin.pages.cadidates.columns.file')) !!}</th>
                                                                                                                    <th>{!! \PaginationHelper::sort('link_job', trans('admin.pages.cadidates.columns.link_job')) !!}</th>
                                    
                                    <th style="width: 40px">@lang('admin.pages.common.label.actions')</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach( $cadidates as $cadidate )
                                    <tr>
                                        <td>{{ $cadidate->id }}</td>
                                                                                                                            <td>{{ $cadidate->name }}</td>
                                                                                                                            <td>{{ $cadidate->phone }}</td>
                                                                                                                            <td>{{ $cadidate->email }}</td>
                                                                                                                            <td>{{ $cadidate->file }}</td>
                                                                                                                            <td>{{ $cadidate->link_job }}</td>
                                                                                <td>
                                            <a href="{!! action('Admin\CadidateController@show', $cadidate->id) !!}" class="btn m--font-primary m-btn--pill m-btn--air no-padding">
                                                <i class="la la-edit"></i>
                                            </a>
                                            <a href="javascript:;" data-delete-url="{!! action('Admin\CadidateController@destroy', $cadidate->id) !!}" class="btn m--font-danger m-btn--pill m-btn--air no-padding delete-button">
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
