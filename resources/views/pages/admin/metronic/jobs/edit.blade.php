@extends('pages.admin.metronic.layout.application',['menu' => 'jobs'] )

@section('metadata')
@stop

@section('styles')
    <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.5/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.5/css/froala_style.min.css' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{!! \URLHelper::asset('libs/plugins/select2/select2.min.css', 'admin') !!}">

    <style>
        .row {
            margin-bottom: 15px;
        }
    
        .bootstrap-tagsinput, .fr-box {
            width: 100%;
            min-height: 100px;
        }
        .bootstrap-tagsinput input[type="text"] {
            width: 100%;
        }

        .select2-container .select2-selection--single {
            height: 33px;
            border-radius: 0px;
            margin-right: 5px;
            border: solid 0.5px;
            border-color: #d2d6de;
            box-shadow: none !important;
            width: 100%;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered  {
            line-height: 19px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 16px;
        }

    </style>
@stop

@section('scripts')
    <script src="{!! \URLHelper::asset('libs/metronic/demo/default/custom/crud/forms/validation/form-controls.js', 'admin') !!}"></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.5/js/froala_editor.pkgd.min.js'></script>
    <script type="text/javascript" src="{{ \URLHelper::asset('libs/plugins/select2/select2.full.min.js', 'admin') }}"></script>
    <script>
        $(document).ready(function () {
            $('#cover-image').change(function (event) {
                $('#cover-image-preview').attr('src', URL.createObjectURL(event.target.files[0]));
            });

            $('.datetime-picker').datetimepicker({
                todayHighlight: true,
                autoclose: true,
                pickerPosition: 'bottom-left',
                format: 'yyyy/mm/dd'
            });

            var provinces = [];
            $.each(masterData, function (key, value) {
                provinces.push(value.name);
            });

            $('#province').select2({
                "data": provinces
            });

            $('#name').on('change', function() {
                let text = $(this).val()
                let  slug = convertToSlug(text)

                $('#slug').val(slug)
            })
        });
    </script>

    <script>
        Boilerplate.imageUploadUrl = "{!! URL::action('Admin\ArticleController@postImage') !!}";
        Boilerplate.imageUploadParams = {
            "article_id" : "{!! empty($job->id) ? 0 : $job->id !!}",
            "_token": "{!! csrf_token() !!}"
        };
        Boilerplate.imagesLoadURL = "{!! URL::action('Admin\ArticleController@getImages') !!}";
        Boilerplate.imagesLoadParams = {
            "article_id" : "{!! empty($job->id) ? 0 : $job->id !!}"
        };
        Boilerplate.imageDeleteURL = "{!! URL::action('Admin\ArticleController@deleteImage') !!}";
        Boilerplate.imageDeleteParams = {
            "_token": "{!! csrf_token() !!}",
            "article_id" : "{!! empty($job->id) ? 0 : $job->id !!}"
        };
    </script>

    <script src="{{ \URLHelper::asset('js/pages/articles/edit.js', 'admin/metronic') }}"></script>
@stop

@section('title')
    Job | Admin | {{ config('site.name') }}
@stop

@section('header')
    Job
@stop

@section('breadcrumb')
    <li class="m-nav__separator"> / </li>
    <li class="m-nav__item">
        <a href="{!! action('Admin\JobController@index') !!}" class="m-nav__link">
            Job
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
            {{ $job->id }}
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
                        <a href="{!! action('Admin\JobController@index') !!}" class="btn m-btn--pill m-btn--air btn-secondary btn-sm" style="width: 120px;">
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

            <form class="m-form m-form--fit" action="@if($isNew){!! action('Admin\JobController@store') !!}@else{!! action('Admin\JobController@update', [$job->id]) !!}@endif" method="POST">
                @if( !$isNew ) <input type="hidden" name="_method" value="PUT"> @endif
                {!! csrf_field() !!}

                <div class="m-portlet__body" style="padding-top: 0;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('name')) has-danger @endif">
                                <label for="name">Vị trí tuyển dụng</label>
                                <input type="text" class="form-control m-input" name="name" id="name" required value="{{ old('name') ? old('name') : $job->name }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('job_category_id')) has-danger @endif">
                                <label for="job_category_id">Ngành nghề</label>
                                <select name="job_category_id" id="job_category_id" class="form-control m-input">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('slug')) has-danger @endif">
                                <label for="slug">Slug</label>
                                <input readonly type="text" class="form-control m-input" name="slug" id="slug" required value="{{ old('slug') ? old('slug') : $job->slug }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('meta_title')) has-danger @endif">
                                <label for="meta_title">Meta title</label>
                                <input type="text" class="form-control m-input" name="meta_title" id="meta_title" required value="{{ old('meta_title') ? old('meta_title') : $job->meta_title }}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('meta_description')) has-danger @endif">
                                <label for="meta_description">Meta Description</label>
                                <input type="text" class="form-control m-input" name="meta_description" id="meta_description" value="{{ old('meta_description') ? old('meta_description') : $job->meta_description }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('company_id')) has-danger @endif">
                                <label for="company_id">Công ty</label>
                                <select name="company_id" id="company_id" class="form-control m-input">
                                    @foreach($companies as $company)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('number')) has-danger @endif">
                                <label for="number">Số lượng</label>
                                <input type="number" min="0" class="form-control m-input" name="number" id="number" required value="{{ old('number') ? old('number') : $job->number }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('salary')) has-danger @endif">
                                <label for="salary">Mức lương</label>
                                <input type="text" class="form-control m-input" name="salary" id="salary" required value="{{ old('salary') ? old('salary') : $job->salary }}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row input-group date @if ($errors->has('end_time')) has-danger @endif">
                                <label for="end_time" class="label-datetimepicker">@lang('admin.pages.jobs.columns.end_time')</label>
                                <input type="text" class="form-control m-input datetime-picker" readonly="" id="end_time" name="end_time">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o glyphicon-th"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('order')) has-danger @endif">
                                <label for="order">Vị trí hiển thị trên trang tuyển dụng</label>
                                <input type="number" min="0" class="form-control m-input" name="order" id="order" value="{{ old('order') ? old('order') : $job->order }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('province')) has-danger @endif">
                                <label for="province">Khu vực(Tỉnh/TP)</label>
                                <input type="text" class="form-control m-input" name="province" id="province" required value="{{ old('province') ? old('province') : $job->province }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('description')) has-danger @endif">
                                <label for="froala-editor">Mô tả công việc</label>
                                <textarea name="description" id="froala-editor" class="form-control m-input" rows="3">{{ old('description') ? old('description') : $job->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('is_enabled')) has-danger @endif">
                                <label for="is_enabled" class="label-switch">Trạng thái</label>
                                <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                                    <label>
                                        <input type="checkbox" id="is_enabled" name="is_enabled" value="1" @if( $job->is_enabled) checked @endif>
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
                                <a href="{!! action('Admin\JobController@index') !!}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-accent" style="width: 120px;">
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
