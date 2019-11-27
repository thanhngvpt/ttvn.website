@extends('pages.admin.metronic.layout.application',['menu' => 'table_news'] )

@section('metadata')
@stop

@section('styles')
    <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.5/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.5/css/froala_style.min.css' rel='stylesheet' type='text/css' />
    <style>
        .row {
            margin-bottom: 15px;
        }
        #cover-image-preview {
            width: 100%;
            height: 300px;
        }

        .bootstrap-tagsinput, .fr-box {
            width: 100%;
            min-height: 100px;
        }
        .bootstrap-tagsinput input[type="text"] {
            width: 100%;
        }
    </style>
@stop

@section('scripts')
    <script src="{!! \URLHelper::asset('libs/metronic/demo/default/custom/crud/forms/validation/form-controls.js', 'admin') !!}"></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.5/js/froala_editor.pkgd.min.js'></script>
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

        Boilerplate.imageUploadUrl = "{!! URL::action('Admin\TableNewController@postImage') !!}";
        Boilerplate.imageUploadParams = {
        "article_id" : "{!! empty($tableNew->id) ? 0 : $tableNew->id !!}",
        "_token": "{!! csrf_token() !!}"
        };
        Boilerplate.imagesLoadURL = "{!! URL::action('Admin\TableNewController@getImages') !!}";
        Boilerplate.imagesLoadParams = {
            "article_id" : "{!! empty($tableNew->id) ? 0 : $tableNew->id !!}"
        };
        Boilerplate.imageDeleteURL = "{!! URL::action('Admin\TableNewController@deleteImage') !!}";
        Boilerplate.imageDeleteParams = {
            "_token": "{!! csrf_token() !!}",
            "article_id" : "{!! empty($tableNew->id) ? 0 : $tableNew->id !!}"
        };
    
    </script>
    <script src="{{ \URLHelper::asset('js/pages/articles/edit.js', 'admin/metronic') }}"></script>
    @stop
    
@section('title')
    Tin tức | Admin | {{ config('site.name') }}
@stop

@section('header')
    Tin tức
@stop

@section('breadcrumb')
    <li class="m-nav__separator"> / </li>
    <li class="m-nav__item">
        <a href="{!! action('Admin\TableNewController@index') !!}" class="m-nav__link">
            Tin tức
        </a>
    </li>

    @if( $isNew )
        <li class="m-nav__separator"> / </li>
        <li class="m-nav__item">
            Tạo mới
        </li>
    @else
        <li class="m-nav__separator"> / </li>
        <li class="m-nav__item">
            {{ $tableNew->id }}
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
                        <a href="{!! action('Admin\TableNewController@index') !!}" class="btn m-btn--pill m-btn--air btn-secondary btn-sm" style="width: 120px;">
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

            <form class="m-form m-form--fit" action="@if($isNew){!! action('Admin\TableNewController@store') !!}@else{!! action('Admin\TableNewController@update', [$tableNew->id]) !!}@endif" method="POST" enctype="multipart/form-data">
                @if( !$isNew ) <input type="hidden" name="_method" value="PUT"> @endif
                {!! csrf_field() !!}

                <div class="m-portlet__body" style="padding-top: 0;">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group m-form__group row" style="max-width: 500px;">
                                @if( !empty($tableNew->present()->coverImage()) )
                                <img id="cover-image-preview" src="{!! $tableNew->present()->coverImage()->present()->url !!}" alt="" class="margin"/>
                                @else
                                <img id="cover-image-preview" src="{!! \URLHelper::asset('img/no_image.jpg', 'common') !!}" alt="" class="margin"/>
                                @endif
                                <input type="file" style="display: none;" id="cover-image" name="cover-image">
                                <p class="help-block" style="font-weight: bolder; display: block; width: 100%; text-align: center;">
                                    Cover
                                    <label for="cover-image" style="font-weight: 100; color: #549cca; margin-left: 10px; cursor: pointer;">chọn ảnh</label>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('name')) has-danger @endif">
                                        <label for="name">Tên</label>
                                        <input type="text" class="form-control m-input" name="name" id="name" required value="{{ old('name') ? old('name') : $tableNew->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('slug')) has-danger @endif">
                                        <label for="slug">Slug</label>
                                        <input readonly type="text" class="form-control m-input" name="slug" id="slug" required value="{{ old('slug') ? old('slug') : $tableNew->slug }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('new_category_id')) has-danger @endif">
                                        <label for="new_category_id">Loại tin tức</label>
                                        <select name="new_category_id" id="new_category_id" class="form-control m-input">
                                            @foreach($categories as $category)
                                            <option @if($tableNew->new_category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('order')) has-danger @endif">
                                        <label for="order">Vị trí</label>
                                        <input type="number" min="0" class="form-control m-input" name="order" id="order" value="{{ old('order') ? old('order') : $tableNew->order }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('meta_title')) has-danger @endif">
                                <label for="meta_title">Meta title</label>
                                <input type="text" class="form-control m-input" name="meta_title" id="meta_title" value="{{ old('meta_title') ? old('meta_title') : $tableNew->meta_title }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('meta_description')) has-danger @endif">
                                <label for="meta_description">Meta description</label>
                                <input type="text" class="form-control m-input" name="meta_description" id="meta_description" value="{{ old('meta_description') ? old('meta_description') : $tableNew->meta_description }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('sapo')) has-danger @endif">
                                <label for="sapo">@lang('admin.pages.table-news.columns.sapo')</label>
                                <textarea name="sapo" id="sapo" class="form-control m-input" rows="3">{{ old('sapo') ? old('sapo') : $tableNew->sapo }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('content')) has-danger @endif">
                                <label for="content">Nội dung</label>
                                <textarea name="content" id="froala-editor" class="form-control m-input" rows="3">{{ old('content') ? old('content') : $tableNew->content }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('auth')) has-danger @endif">
                                <label for="auth">Tác giả</label>
                                <input type="text" class="form-control m-input" name="auth" id="auth" value="{{ old('auth') ? old('auth') : $tableNew->auth }}">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        
                    </div> --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('is_enabled')) has-danger @endif">
                                <label for="is_enabled" class="label-switch">Trạng thái</label>
                                <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                                    <label>
                                        <input type="checkbox" id="is_enabled" name="is_enabled" value="1" @if( $tableNew->is_enabled) checked @endif>
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('display')) has-danger @endif">
                                <label for="display" class="label-switch">Hiển thị</label>
                                <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                                    <label>
                                        <input type="checkbox" id="display" name="display" value="1" @if( $tableNew->display) checked @endif>
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
                                <a href="{!! action('Admin\TableNewController@index') !!}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-accent" style="width: 120px;">
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
