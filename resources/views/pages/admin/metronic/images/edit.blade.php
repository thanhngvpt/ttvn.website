@extends('pages.admin.metronic.layout.application',['menu' => 'images'] )

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
    Images | Admin | {{ config('site.name') }}
@stop

@section('header')
    Images
@stop

@section('breadcrumb')
    <li class="m-nav__separator"> / </li>
    <li class="m-nav__item">
        <a href="{!! action('Admin\ImageController@index') !!}" class="m-nav__link">
            Images
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
            {{ $image->id }}
        </li>
    @endif
@stop

@section('content')
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        @if( $isNew ) Create New Record @else Image Info @endif
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{!! action('Admin\ImageController@index') !!}" class="btn m-btn--pill m-btn--air btn-secondary btn-sm" style="width: 120px;">
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

            <form class="m-form m-form--fit" action="@if($isNew){!! action('Admin\ImageController@store') !!}@else{!! action('Admin\ImageController@update', [$image->id]) !!}@endif" method="POST">
                @if( !$isNew ) <input type="hidden" name="_method" value="PUT"> @endif
                {!! csrf_field() !!}

                <div class="m-portlet__body" style="padding-top: 0;">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group text-center">
                                @if( !empty($image->url) )
                                    <img id="profile-image-preview" style="max-width: 500px; width: 100%;"
                                         src="{!! $image->present()->url !!}" alt="" class="margin"/>
                                @else
                                    <img id="profile-image-preview" style="max-width: 500px; width: 100%;"
                                         src="{!! \URLHelper::asset('img/no_image.jpg', 'common') !!}" alt=""
                                         class="margin"/>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="form-group row @if ($errors->has('name')) has-danger @endif">
                                <label for="url"
                                       class="col-md-2 col-form-label">@lang('admin.pages.images.columns.url')</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control m-input" name="url" id="url" required
                                           placeholder="@lang('admin.pages.images.columns.url')"
                                           value="{{ old('url') ? old('url') : $image->url }}">
                                </div>
                            </div>
                            <div class="form-group row @if ($errors->has('title')) has-danger @endif">
                                <label for="title"
                                       class="col-md-2 col-form-label">@lang('admin.pages.images.columns.title')</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control m-input" name="title" id="title"
                                           placeholder="@lang('admin.pages.images.columns.title')"
                                           value="{{ old('title') ? old('title') : $image->title }}">
                                </div>
                            </div>
                            <div class="form-group row @if ($errors->has('entity_id')) has-danger @endif">
                                <label for="entity_id"
                                       class="col-md-2 col-form-label">@lang('admin.pages.images.columns.entity_id')</label>
                                <div class="col-md-10">
                                    <input type="number" min="1" class="form-control m-input" name="entity_id"
                                           id="entity_id" required
                                           placeholder="@lang('admin.pages.images.columns.entity_id')"
                                           value="{{ old('entity_id') ? old('entity_id') : $image->entity_id }}">
                                </div>
                            </div>
                            <div class="form-group row @if ($errors->has('entity_type')) has-danger @endif">
                                <label for="entity_type"
                                       class="col-md-2 col-form-label">@lang('admin.pages.images.columns.entity_type')</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control m-input" name="entity_type"
                                           id="entity_type" required
                                           placeholder="@lang('admin.pages.images.columns.entity_type')"
                                           value="{{ old('entity_type') ? old('entity_type') : $image->entity_type }}">
                                </div>
                            </div>
                            <div class="form-group row @if ($errors->has('file_category_type')) has-danger @endif">
                                <label for="file_category_type"
                                       class="col-md-2 col-form-label">@lang('admin.pages.images.columns.file_category_type')</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control m-input" name="file_category_type"
                                           id="file_category_type" required
                                           placeholder="@lang('admin.pages.images.columns.file_category_type')"
                                           value="{{ old('file_category_type') ? old('file_category_type') : $image->file_category_type }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row ">
                                <label for="full-url">Full URL</label>
                                <input type="text" class="form-control m-input" name="full-url" id="full-url"
                                       disabled
                                       placeholder="Full URL"
                                       value="{{ $image->present()->url() }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('s3_key')) has-danger @endif">
                                <label for="s3_key">@lang('admin.pages.images.columns.s3_key')</label>
                                <input type="text" class="form-control m-input" name="s3_key" id="s3_key"
                                       placeholder="@lang('admin.pages.images.columns.s3_key')"
                                       value="{{ old('s3_key') ? old('s3_key') : $image->s3_key }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('s3_bucket')) has-danger @endif">
                                <label for="s3_bucket">@lang('admin.pages.images.columns.s3_bucket')</label>
                                <input type="text" class="form-control m-input" name="s3_bucket" id="s3_bucket"
                                       placeholder="@lang('admin.pages.images.columns.s3_bucket')"
                                       value="{{ old('s3_bucket') ? old('s3_bucket') : $image->s3_bucket }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('s3_region')) has-danger @endif">
                                <label for="s3_region">@lang('admin.pages.images.columns.s3_region')</label>
                                <input type="text" class="form-control m-input" name="s3_region" id="s3_region"
                                       placeholder="@lang('admin.pages.images.columns.s3_region')"
                                       value="{{ old('s3_region') ? old('s3_region') : $image->s3_region }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('s3_extension')) has-danger @endif">
                                <label for="s3_extension">@lang('admin.pages.images.columns.s3_extension')</label>
                                <input type="text" class="form-control m-input" name="s3_extension"
                                       id="s3_extension"
                                       placeholder="@lang('admin.pages.images.columns.s3_extension')"
                                       value="{{ old('s3_extension') ? old('s3_extension') : $image->s3_extension }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group m-form__group row @if ($errors->has('media_type')) has-danger @endif">
                                <label for="media_type">@lang('admin.pages.images.columns.media_type')</label>
                                <input type="text" class="form-control m-input" name="media_type" id="media_type"
                                       required placeholder="@lang('admin.pages.images.columns.media_type')"
                                       value="{{ old('media_type') ? old('media_type') : $image->media_type }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group m-form__group row @if ($errors->has('format')) has-danger @endif">
                                <label for="format">@lang('admin.pages.images.columns.format')</label>
                                <input type="text" class="form-control m-input" name="format" id="format" required
                                       placeholder="@lang('admin.pages.images.columns.format')"
                                       value="{{ old('format') ? old('format') : $image->format }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group m-form__group row @if ($errors->has('file_size')) has-danger @endif">
                                <label for="file_size">@lang('admin.pages.images.columns.file_size')</label>
                                <input type="number" min="0" class="form-control m-input" name="file_size"
                                       id="file_size" required
                                       placeholder="@lang('admin.pages.images.columns.file_size')"
                                       value="{{ old('file_size') ? old('file_size') : $image->file_size }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('width')) has-danger @endif">
                                <label for="width">@lang('admin.pages.images.columns.width')</label>
                                <input type="number" min="0" class="form-control m-input" name="width" id="width"
                                       required placeholder="@lang('admin.pages.images.columns.width')"
                                       value="{{ old('width') ? old('width') : $image->width }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('height')) has-danger @endif">
                                <label for="height">@lang('admin.pages.images.columns.height')</label>
                                <input type="number" min="0" class="form-control m-input" name="height" id="height"
                                       required placeholder="@lang('admin.pages.images.columns.height')"
                                       value="{{ old('height') ? old('height') : $image->height }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('is_enabled')) has-danger @endif">
                                <label for="is_enabled"
                                       class="label-switch">@lang('admin.pages.images.columns.is_enabled')</label>
                                <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                                    <label>
                                        <input type="checkbox" id="is_enabled" name="is_enabled" value="1"
                                               @if( $image->is_enabled) checked @endif>
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('is_local')) has-danger @endif">
                                <label for="is_local"
                                       class="label-switch">@lang('admin.pages.images.columns.is_local')</label>
                                <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                                    <label>
                                        <input type="checkbox" id="is_local" name="is_local" value="1"
                                               @if( $image->is_local) checked @endif>
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
                                <a href="{!! action('Admin\ImageController@index') !!}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-accent" style="width: 120px;">
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
