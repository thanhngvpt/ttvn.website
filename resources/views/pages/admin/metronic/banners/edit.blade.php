@extends('pages.admin.metronic.layout.application',['menu' => 'banners'] )

@section('metadata')
@stop

@section('styles')
    <style>
        .row {
            margin-bottom: 15px;
        }
        #cover-image-preview {
            width: 100%;
            height: 300px;
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
    Banner | Admin | {{ config('site.name') }}
@stop

@section('header')
    Banner
@stop

@section('breadcrumb')
    <li class="m-nav__separator"> / </li>
    <li class="m-nav__item">
        <a href="{!! action('Admin\BannerController@index') !!}" class="m-nav__link">
            Banner
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
            {{ $banner->id }}
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
                        <a href="{!! action('Admin\BannerController@index') !!}" class="btn m-btn--pill m-btn--air btn-secondary btn-sm" style="width: 120px;">
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

            <form class="m-form m-form--fit" action="@if($isNew){!! action('Admin\BannerController@store') !!}@else{!! action('Admin\BannerController@update', [$banner->id]) !!}@endif" method="POST" enctype="multipart/form-data">
                @if( !$isNew ) <input type="hidden" name="_method" value="PUT"> @endif
                {!! csrf_field() !!}

                <div class="m-portlet__body" style="padding-top: 0;">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group m-form__group row text-center" style="max-width: 500px;">
                                @if( !empty($banner->present()->coverImage()) )
                                <img id="cover-image-preview" style="max-width: 100%;" src="{!! $banner->present()->coverImage()->present()->url !!}" alt="" class="margin"/>
                                @else
                                <img id="cover-image-preview" style="max-width: 100%;" src="{!! \URLHelper::asset('img/no_image.jpg', 'common') !!}" alt="" class="margin"/>
                                @endif
                                <input type="file" style="display: none;" id="cover-image" name="cover-image">
                                <p class="help-block" style="font-weight: bolder; display: block; width: 100%; text-align: center;">
                                    Ảnh
                                    <label for="cover-image" style="font-weight: 100; color: #549cca; margin-left: 10px; cursor: pointer;">@lang('admin.pages.common.buttons.edit')</label>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('title')) has-danger @endif">
                                        <label for="title">Tiêu đề</label>
                                        <input type="text" class="form-control m-input" name="title" id="title" required value="{{ old('title') ? old('title') : $banner->title }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('description')) has-danger @endif">
                                        <label for="description">Mô tả</label>
                                        <textarea name="description" id="description" class="form-control m-input" rows="3">{{ old('description') ? old('description') : $banner->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('order')) has-danger @endif">
                                        <label for="order">Vị trí</label>
                                        <input type="number" min="0" class="form-control m-input" name="order" id="order" required value="{{ old('order') ? old('order') : $banner->order }}">
                                    </div>
                                </div>
                            </div>
                            {{--  <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('admin_user_id')) has-danger @endif">
                                        <label for="admin_user_id">@lang('admin.pages.banners.columns.admin_user_id')</label>
                                        <input type="number" min="0" class="form-control m-input" name="admin_user_id" id="admin_user_id" required placeholder="@lang('admin.pages.banners.columns.admin_user_id')" value="{{ old('admin_user_id') ? old('admin_user_id') : $banner->admin_user_id }}">
                                    </div>
                                </div>
                            </div>  --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('is_enabled')) has-danger @endif">
                                <label for="is_enabled" class="label-switch">Enabled</label>
                                <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                                    <label>
                                        <input type="checkbox" id="is_enabled" name="is_enabled" value="1" @if( $banner->is_enabled) checked @endif>
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <a href="{!! action('Admin\BannerController@index') !!}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-accent" style="width: 120px;">
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
