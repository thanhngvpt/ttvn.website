@extends('pages.admin.metronic.layout.application',['menu' => 'headings'] )

@section('metadata')
@stop

@section('styles')
    <style>
        .row {
            margin-bottom: 15px;
        }
    </style>
@stop

@section('scripts')
    <script src="{!! \URLHelper::asset('libs/metronic/demo/default/custom/crud/forms/validation/form-controls.js', 'admin') !!}"></script>
    <script>
        $(document).ready(function () {
            $('#cover-image').change(function (event) {
                $('#cover-image-preview').attr('src', URL.createObjectURL(event.target.files[0]));
            });

            $('.datetime-picker').datetimepicker({
                todayHighlight: true,
                autoclose: true,
                pickerPosition: 'bottom-left',
                format: 'yyyy/mm/dd hh:ii'
            });
        });
    </script>
@stop

@section('title')
    Heading | Admin | {{ config('site.name') }}
@stop

@section('header')
    Heading
@stop

@section('breadcrumb')
    <li class="m-nav__separator"> / </li>
    <li class="m-nav__item">
        <a href="{!! action('Admin\HeadingController@index') !!}" class="m-nav__link">
            Heading
        </a>
    </li>

    @if( $isNew )
        <li class="m-nav__separator"> / </li>
        <li class="m-nav__item">
            New Record
        </li>
    @else
        <li class="m-nav__separator"> / </li>
        <li class="m-nav__item">
            {{ $heading->id }}
        </li>
    @endif
@stop

@section('content')
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Create New Record
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{!! action('Admin\HeadingController@index') !!}" class="btn m-btn--pill m-btn--air btn-secondary btn-sm" style="width: 120px;">
                            @lang('admin.pages.common.buttons.back')
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="m-portlet__body">
            @if(isset($errors) && count($errors))
                {{ $errs = $errors->all() }}
                <div class="m-alert m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <strong>
                        Error !!!
                    </strong>
                    <ul>
                        @foreach($errs as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="m-form m-form--fit" action="@if($isNew){!! action('Admin\HeadingController@store') !!}@else{!! action('Admin\HeadingController@update', [$heading->id]) !!}@endif" method="POST">
                @if( !$isNew ) <input type="hidden" name="_method" value="PUT"> @endif
                {!! csrf_field() !!}

                <div class="m-portlet__body" style="padding-top: 0;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('title_heading')) has-danger @endif">
                                <label for="title_heading">Title lĩnh vực hoạt động</label>
                                <input type="text" class="form-control m-input" name="title_heading" id="title_heading"  value="{{ old('title_heading') ? old('title_heading') : $heading->title_heading }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('heading_description')) has-danger @endif">
                                <label for="heading_description">Mô tả ngắn hỗ trợ</label>
                                <input name="heading_description" id="heading_description" class="form-control m-input" rows="3"  value="{{ old('heading_description') ? old('heading_description') : $heading->heading_description }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('title_group')) has-danger @endif">
                                <label for="title_group">Title thông tin ngắn tập đoàn</label>
                                <input type="text" class="form-control m-input" name="title_group" id="title_group" value="{{ old('title_group') ? old('title_group') : $heading->title_group }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('title_data_highlight')) has-danger @endif">
                                <label for="title_data_highlight">Title số liệu nổi bật</label>
                                <input type="text" class="form-control m-input" name="title_data_highlight" id="title_data_highlight"  value="{{ old('title_data_highlight') ? old('title_data_highlight') : $heading->title_data_highlight }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('title_news')) has-danger @endif">
                                <label for="title_news">Title phần tin tức</label>
                                <input type="text" class="form-control m-input" name="title_news" id="title_news"  value="{{ old('title_news') ? old('title_news') : $heading->title_news }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('title_company')) has-danger @endif">
                                <label for="title_company">Title công ty thành viên</label>
                                <input type="text" class="form-control m-input" name="title_company" id="title_company"  value="{{ old('title_company') ? old('title_company') : $heading->title_company }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('title_support')) has-danger @endif">
                                <label for="title_support">Title nhận tư vấn</label>
                                <input type="text" class="form-control m-input" name="title_support" id="title_support"  value="{{ old('title_support') ? old('title_support') : $heading->title_support }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('support_description')) has-danger @endif">
                                <label for="support_description">Mô tả ngắn hỗ trợ</label>
                                <input type="text" class="form-control m-input" name="support_description" id="support_description"  value="{{ old('support_description') ? old('support_description') : $heading->support_description }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <a href="{!! action('Admin\HeadingController@index') !!}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-accent" style="width: 120px;">
                                    @lang('admin.pages.common.buttons.cancel')
                                </a>
                                <button type="submit" class="btn m-btn--pill m-btn--air btn-primary m-btn m-btn--custom" style="width: 120px;">
                                    @lang('admin.pages.common.buttons.save')
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
