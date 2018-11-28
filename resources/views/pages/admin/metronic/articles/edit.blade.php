@extends('pages.admin.metronic.layout.application',['menu' => 'articles'] )

@section('metadata')
@stop

@section('styles')
    <!-- Include Froala Editor style. -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.5/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.5/css/froala_style.min.css' rel='stylesheet' type='text/css' />

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
    </style>
@stop

@section('scripts')
    <script src="{!! \URLHelper::asset('libs/metronic/demo/default/custom/crud/forms/validation/form-controls.js', 'admin') !!}"></script>

    <!-- Include Froala JS file. -->
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.3.5/js/froala_editor.pkgd.min.js'></script>

    <script>
        Boilerplate.imageUploadUrl = "{!! URL::action('Admin\ArticleController@postImage') !!}";
        Boilerplate.imageUploadParams = {
            "article_id" : "{!! empty($article->id) ? 0 : $article->id !!}",
            "_token": "{!! csrf_token() !!}"
        };
        Boilerplate.imagesLoadURL = "{!! URL::action('Admin\ArticleController@getImages') !!}";
        Boilerplate.imagesLoadParams = {
            "article_id" : "{!! empty($article->id) ? 0 : $article->id !!}"
        };
        Boilerplate.imageDeleteURL = "{!! URL::action('Admin\ArticleController@deleteImage') !!}";
        Boilerplate.imageDeleteParams = {
            "_token": "{!! csrf_token() !!}",
            "article_id" : "{!! empty($article->id) ? 0 : $article->id !!}"
        };
    </script>

    <script src="{{ \URLHelper::asset('js/pages/articles/edit.js', 'admin/metronic') }}"></script>
@stop

@section('title')
    Articles | Admin | {{ config('site.name') }}
@stop

@section('header')
    Articles
@stop

@section('breadcrumb')
    <li class="m-nav__separator"> / </li>
    <li class="m-nav__item">
        <a href="{!! action('Admin\ArticleController@index') !!}" class="m-nav__link">
            Articles
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
            {{ $article->id }}
        </li>
    @endif
@stop

@section('content')
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        @if($isNew) Create New Record @else Update Article Info @endif
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{!! action('Admin\ArticleController@index') !!}" class="btn m-btn--pill m-btn--air btn-secondary btn-sm" style="width: 120px;">
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

            <form class="m-form m-form--fit" action="@if($isNew){!! action('Admin\ArticleController@store') !!}@else{!! action('Admin\ArticleController@update', [$article->id]) !!}@endif" method="POST" enctype="multipart/form-data">
                @if( !$isNew ) <input type="hidden" name="_method" value="PUT"> @endif
                {!! csrf_field() !!}

                <div class="m-portlet__body" style="padding-top: 0;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                @if( !empty($article->present()->coverImage()) )
                                    <img id="cover-image-preview" style="max-height: 300px;"
                                         src="{!! $article->present()->coverImage()->present()->url !!}" alt=""
                                         class="margin"/>
                                @else
                                    <img id="cover-image-preview" style="max-height: 300px"
                                         src="{!! \URLHelper::asset('img/no_image.jpg', 'common') !!}" alt=""
                                         class="margin"/>
                                @endif
                                <input type="file" style="display: none;" id="cover-image" name="cover_image">
                                <p class="help-block"
                                   style="font-weight: bolder; display: block; width: 100%; text-align: center;">
                                    @lang('admin.pages.articles.columns.cover_image_id')
                                    <label for="cover-image"
                                           style="font-weight: 100; color: #549cca; margin-left: 10px; cursor: pointer;">@lang('admin.pages.common.buttons.edit')</label>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('title')) has-danger @endif">
                                <label for="title">@lang('admin.pages.articles.columns.title')</label>
                                <input type="text" class="form-control m-input" name="title" id="title" required
                                       placeholder="@lang('admin.pages.articles.columns.title')"
                                       value="{{ old('title') ? old('title') : $article->title }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('slug')) has-danger @endif">
                                <label for="slug">@lang('admin.pages.articles.columns.slug')</label>
                                <input type="text" class="form-control m-input" name="slug" id="slug" required
                                       placeholder="@lang('admin.pages.articles.columns.slug')"
                                       value="{{ old('slug') ? old('slug') : $article->slug }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group m-form__group row input-group date @if ($errors->has('publish_started_at')) has-danger @endif">
                                <label for="publish_started_at"
                                       class="label-datetimepicker">@lang('admin.pages.articles.columns.publish_started_at')</label>
                                <input type="text" class="form-control m-input datetime-picker"
                                       placeholder="Select date &amp; time" id="publish_started_at"
                                       name="publish_started_at" value="{{ old('publish_started_at') ? old('publish_started_at') : $article->publish_started_at }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o glyphicon-th"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group m-form__group row input-group date @if ($errors->has('publish_ended_at')) has-danger @endif">
                                <label for="publish_ended_at"
                                       class="label-datetimepicker">@lang('admin.pages.articles.columns.publish_ended_at')</label>
                                <input type="text" class="form-control m-input datetime-picker"
                                       placeholder="Select date &amp; time" id="publish_ended_at"
                                       name="publish_ended_at"  value="{{ old('publish_ended_at') ? old('publish_ended_at') : $article->publish_ended_at }}">
                                <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o glyphicon-th"></i>
                                        </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group m-form__group row @if ($errors->has('is_enabled')) has-danger @endif">
                                <label for="is_enabled"
                                       class="label-datetimepicker">@lang('admin.pages.articles.columns.is_enabled')</label>
                                <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                                    <label>
                                        <input type="checkbox" id="is_enabled" name="is_enabled" value="1"
                                               @if( $article->is_enabled) checked @endif>
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('keywords')) has-danger @endif">
                                <label for="keywords">@lang('admin.pages.articles.columns.keywords')</label>
                                <input type="text" name="keywords" id="keywords" class="form-control m-input"
                                       placeholder="@lang('admin.pages.articles.columns.keywords')"
                                       value="{{ old('keywords') ? old('keywords') : $article->keywords }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('description')) has-danger @endif">
                                <label for="description">@lang('admin.pages.articles.columns.description')</label>
                                <textarea name="description" id="description" class="form-control m-input" rows="3"
                                          placeholder="@lang('admin.pages.articles.columns.description')">{{ old('description') ? old('description') : $article->description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('content')) has-danger @endif">
                                <label for="content">@lang('admin.pages.articles.columns.content')</label>
                                <textarea name="content" id="froala-editor" class="form-control m-input" rows="3"
                                          placeholder="@lang('admin.pages.articles.columns.content')">{{ old('content') ? old('content') : $article->content }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <a href="{!! action('Admin\ArticleController@index') !!}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-accent" style="width: 120px;">
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
