@extends('pages.admin.metronic.layout.application',['menu' => 'new_categories'] )

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

            $('#name').on('change', function() {
                let text = $(this).val()
                let  slug = convertToSlug(text)

                $('#slug').val(slug)
            })
        });
    </script>
@stop

@section('title')
Danh mục tin tức | Admin | {{ config('site.name') }}
@stop

@section('header')
Danh mục tin tức
@stop

@section('breadcrumb')
    <li class="m-nav__separator"> / </li>
    <li class="m-nav__item">
        <a href="{!! action('Admin\NewCategoryController@index') !!}" class="m-nav__link">
            Danh mục tin tức
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
            {{ $newCategory->id }}
        </li>
    @endif
@stop

@section('content')
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Tạo mới
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{!! action('Admin\NewCategoryController@index') !!}" class="btn m-btn--pill m-btn--air btn-secondary btn-sm" style="width: 120px;">
                            @lang('admin.pages.common.buttons.back')
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="m-portlet__body">
            @if(isset($errors) && count($errors))
            <div class="m-alert m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <strong>
                    Error !!!
                </strong>
                <ul>
                    @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
            @endif

            <form class="m-form m-form--fit" action="@if($isNew){!! action('Admin\NewCategoryController@store') !!}@else{!! action('Admin\NewCategoryController@update', [$newCategory->id]) !!}@endif" method="POST">
                @if( !$isNew ) <input type="hidden" name="_method" value="PUT"> @endif
                {!! csrf_field() !!}

                <div class="m-portlet__body" style="padding-top: 0;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('name')) has-danger @endif">
                                <label for="name">Tên Danh mục</label>
                                <input type="text" class="form-control m-input" name="name" id="name" required value="{{ old('name') ? old('name') : $newCategory->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('slug')) has-danger @endif">
                                <label for="slug">Slug</label>
                                <input readonly type="text" class="form-control m-input" name="slug" id="slug" required value="{{ old('slug') ? old('slug') : $newCategory->slug }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('meta_title')) has-danger @endif">
                                <label for="meta_title">Meta title</label>
                                <input type="text" class="form-control m-input" name="meta_title" id="meta_title" value="{{ old('meta_title') ? old('meta_title') : $newCategory->meta_title }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('meta_description')) has-danger @endif">
                                <label for="meta_description">Meta description</label>
                                <input type="text" class="form-control m-input" name="meta_description" id="meta_description" value="{{ old('meta_description') ? old('meta_description') : $newCategory->meta_description }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('order')) has-danger @endif">
                                <label for="order">Vị trí</label>
                                <input type="number" min="0" class="form-control m-input" name="order" id="order" value="{{ old('order') ? old('order') : $newCategory->order }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <a href="{!! action('Admin\NewCategoryController@index') !!}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-accent" style="width: 120px;">
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
