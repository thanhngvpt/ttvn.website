@extends('pages.admin.metronic.layout.application',['menu' => 'fields'] )

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
    Field | Admin | {{ config('site.name') }}
@stop

@section('header')
    Field
@stop

@section('breadcrumb')
    <li class="m-nav__separator"> / </li>
    <li class="m-nav__item">
        <a href="{!! action('Admin\FieldController@index') !!}" class="m-nav__link">
            Field
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
            {{ $field->id }}
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
                        <a href="{!! action('Admin\FieldController@index') !!}" class="btn m-btn--pill m-btn--air btn-secondary btn-sm" style="width: 120px;">
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

            <form class="m-form m-form--fit" action="@if($isNew){!! action('Admin\FieldController@store') !!}@else{!! action('Admin\FieldController@update', [$field->id]) !!}@endif" method="POST">
                @if( !$isNew ) <input type="hidden" name="_method" value="PUT"> @endif
                {!! csrf_field() !!}

                <div class="m-portlet__body" style="padding-top: 0;">
                                                                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('name')) has-danger @endif">
                                        <label for="name">@lang('admin.pages.fields.columns.name')</label>
                                        <input type="text" class="form-control m-input" name="name" id="name" required placeholder="@lang('admin.pages.fields.columns.name')" value="{{ old('name') ? old('name') : $field->name }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('slug')) has-danger @endif">
                                        <label for="slug">@lang('admin.pages.fields.columns.slug')</label>
                                        <input type="text" class="form-control m-input" name="slug" id="slug" required placeholder="@lang('admin.pages.fields.columns.slug')" value="{{ old('slug') ? old('slug') : $field->slug }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('meta_title')) has-danger @endif">
                                        <label for="meta_title">@lang('admin.pages.fields.columns.meta_title')</label>
                                        <input type="text" class="form-control m-input" name="meta_title" id="meta_title" required placeholder="@lang('admin.pages.fields.columns.meta_title')" value="{{ old('meta_title') ? old('meta_title') : $field->meta_title }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('meta_description')) has-danger @endif">
                                        <label for="meta_description">@lang('admin.pages.fields.columns.meta_description')</label>
                                        <input type="text" class="form-control m-input" name="meta_description" id="meta_description" required placeholder="@lang('admin.pages.fields.columns.meta_description')" value="{{ old('meta_description') ? old('meta_description') : $field->meta_description }}">
                                    </div>
                                </div>
                            </div>
                                                                                                                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row" style="max-width: 500px;">
                                        @if( !empty($field->present()->coverImage()) )
                                        <img id="cover-image-preview" style="max-width: 100%;" src="{!! $field->present()->coverImage()->present()->url !!}" alt="" class="margin"/>
                                        @else
                                        <img id="cover-image-preview" style="max-width: 100%;" src="{!! \URLHelper::asset('img/no_image.jpg', 'common') !!}" alt="" class="margin"/>
                                        @endif
                                        <input type="file" style="display: none;" id="cover-image" name="cover-image">
                                        <p class="help-block" style="font-weight: bolder; display: block; width: 100%; text-align: center;">
                                            @lang('admin.pages.fields.columns.cover_image_id')
                                            <label for="cover-image" style="font-weight: 100; color: #549cca; margin-left: 10px; cursor: pointer;">@lang('admin.pages.common.buttons.edit')</label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('title')) has-danger @endif">
                                        <label for="title">@lang('admin.pages.fields.columns.title')</label>
                                        <input type="text" class="form-control m-input" name="title" id="title" required placeholder="@lang('admin.pages.fields.columns.title')" value="{{ old('title') ? old('title') : $field->title }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('content')) has-danger @endif">
                                        <label for="content">@lang('admin.pages.fields.columns.content')</label>
                                        <input type="text" class="form-control m-input" name="content" id="content" required placeholder="@lang('admin.pages.fields.columns.content')" value="{{ old('content') ? old('content') : $field->content }}">
                                    </div>
                                </div>
                            </div>
                                                                                                                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row" style="max-width: 500px;">
                                        @if( !empty($field->present()->coverImage()) )
                                        <img id="cover-image-preview" style="max-width: 100%;" src="{!! $field->present()->coverImage()->present()->url !!}" alt="" class="margin"/>
                                        @else
                                        <img id="cover-image-preview" style="max-width: 100%;" src="{!! \URLHelper::asset('img/no_image.jpg', 'common') !!}" alt="" class="margin"/>
                                        @endif
                                        <input type="file" style="display: none;" id="cover-image" name="cover-image">
                                        <p class="help-block" style="font-weight: bolder; display: block; width: 100%; text-align: center;">
                                            @lang('admin.pages.fields.columns.icon1_image_id')
                                            <label for="cover-image" style="font-weight: 100; color: #549cca; margin-left: 10px; cursor: pointer;">@lang('admin.pages.common.buttons.edit')</label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('charact_1')) has-danger @endif">
                                        <label for="charact_1">@lang('admin.pages.fields.columns.charact_1')</label>
                                        <input type="text" class="form-control m-input" name="charact_1" id="charact_1" required placeholder="@lang('admin.pages.fields.columns.charact_1')" value="{{ old('charact_1') ? old('charact_1') : $field->charact_1 }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('des_1')) has-danger @endif">
                                        <label for="des_1">@lang('admin.pages.fields.columns.des_1')</label>
                                        <input type="text" class="form-control m-input" name="des_1" id="des_1" required placeholder="@lang('admin.pages.fields.columns.des_1')" value="{{ old('des_1') ? old('des_1') : $field->des_1 }}">
                                    </div>
                                </div>
                            </div>
                                                                                                                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row" style="max-width: 500px;">
                                        @if( !empty($field->present()->coverImage()) )
                                        <img id="cover-image-preview" style="max-width: 100%;" src="{!! $field->present()->coverImage()->present()->url !!}" alt="" class="margin"/>
                                        @else
                                        <img id="cover-image-preview" style="max-width: 100%;" src="{!! \URLHelper::asset('img/no_image.jpg', 'common') !!}" alt="" class="margin"/>
                                        @endif
                                        <input type="file" style="display: none;" id="cover-image" name="cover-image">
                                        <p class="help-block" style="font-weight: bolder; display: block; width: 100%; text-align: center;">
                                            @lang('admin.pages.fields.columns.icon2_image_id')
                                            <label for="cover-image" style="font-weight: 100; color: #549cca; margin-left: 10px; cursor: pointer;">@lang('admin.pages.common.buttons.edit')</label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('charact_2')) has-danger @endif">
                                        <label for="charact_2">@lang('admin.pages.fields.columns.charact_2')</label>
                                        <input type="text" class="form-control m-input" name="charact_2" id="charact_2" required placeholder="@lang('admin.pages.fields.columns.charact_2')" value="{{ old('charact_2') ? old('charact_2') : $field->charact_2 }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('des_2')) has-danger @endif">
                                        <label for="des_2">@lang('admin.pages.fields.columns.des_2')</label>
                                        <input type="text" class="form-control m-input" name="des_2" id="des_2" required placeholder="@lang('admin.pages.fields.columns.des_2')" value="{{ old('des_2') ? old('des_2') : $field->des_2 }}">
                                    </div>
                                </div>
                            </div>
                                                                                                                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row" style="max-width: 500px;">
                                        @if( !empty($field->present()->coverImage()) )
                                        <img id="cover-image-preview" style="max-width: 100%;" src="{!! $field->present()->coverImage()->present()->url !!}" alt="" class="margin"/>
                                        @else
                                        <img id="cover-image-preview" style="max-width: 100%;" src="{!! \URLHelper::asset('img/no_image.jpg', 'common') !!}" alt="" class="margin"/>
                                        @endif
                                        <input type="file" style="display: none;" id="cover-image" name="cover-image">
                                        <p class="help-block" style="font-weight: bolder; display: block; width: 100%; text-align: center;">
                                            @lang('admin.pages.fields.columns.icon3_image_id')
                                            <label for="cover-image" style="font-weight: 100; color: #549cca; margin-left: 10px; cursor: pointer;">@lang('admin.pages.common.buttons.edit')</label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('charact_3')) has-danger @endif">
                                        <label for="charact_3">@lang('admin.pages.fields.columns.charact_3')</label>
                                        <input type="text" class="form-control m-input" name="charact_3" id="charact_3" required placeholder="@lang('admin.pages.fields.columns.charact_3')" value="{{ old('charact_3') ? old('charact_3') : $field->charact_3 }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('des_3')) has-danger @endif">
                                        <label for="des_3">@lang('admin.pages.fields.columns.des_3')</label>
                                        <input type="text" class="form-control m-input" name="des_3" id="des_3" required placeholder="@lang('admin.pages.fields.columns.des_3')" value="{{ old('des_3') ? old('des_3') : $field->des_3 }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('order')) has-danger @endif">
                                        <label for="order">@lang('admin.pages.fields.columns.order')</label>
                                        <input type="number" min="0" class="form-control m-input" name="order" id="order" required placeholder="@lang('admin.pages.fields.columns.order')" value="{{ old('order') ? old('order') : $field->order }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group m-form__group row @if ($errors->has('is_enabled')) has-danger @endif">
                                        <label for="is_enabled" class="label-switch">@lang('admin.pages.fields.columns.is_enabled')</label>
                                        <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                                            <label>
                                                <input type="checkbox" id="is_enabled" name="is_enabled" value="1" @if( $field->is_enabled) checked @endif>
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
                                <a href="{!! action('Admin\FieldController@index') !!}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-accent" style="width: 120px;">
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
