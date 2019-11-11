@extends('pages.admin.metronic.layout.application',['menu' => 'jobs'] )

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

            <form class="m-form m-form--fit" action="@if($isNew){!! action('Admin\JobController@store') !!}@else{!! action('Admin\JobController@update', [$job->id]) !!}@endif" method="POST">
                @if( !$isNew ) <input type="hidden" name="_method" value="PUT"> @endif
                {!! csrf_field() !!}

                <div class="m-portlet__body" style="padding-top: 0;">
                                                                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('name')) has-danger @endif">
                                        <label for="name">@lang('admin.pages.jobs.columns.name')</label>
                                        <input type="text" class="form-control m-input" name="name" id="name" required placeholder="@lang('admin.pages.jobs.columns.name')" value="{{ old('name') ? old('name') : $job->name }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('job_category_id')) has-danger @endif">
                                        <label for="job_category_id">@lang('admin.pages.jobs.columns.job_category_id')</label>
                                        <input type="number" min="0" class="form-control m-input" name="job_category_id" id="job_category_id" required placeholder="@lang('admin.pages.jobs.columns.job_category_id')" value="{{ old('job_category_id') ? old('job_category_id') : $job->job_category_id }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('slug')) has-danger @endif">
                                        <label for="slug">@lang('admin.pages.jobs.columns.slug')</label>
                                        <input type="text" class="form-control m-input" name="slug" id="slug" required placeholder="@lang('admin.pages.jobs.columns.slug')" value="{{ old('slug') ? old('slug') : $job->slug }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('meta_title')) has-danger @endif">
                                        <label for="meta_title">@lang('admin.pages.jobs.columns.meta_title')</label>
                                        <input type="text" class="form-control m-input" name="meta_title" id="meta_title" required placeholder="@lang('admin.pages.jobs.columns.meta_title')" value="{{ old('meta_title') ? old('meta_title') : $job->meta_title }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('meta_description')) has-danger @endif">
                                        <label for="meta_description">@lang('admin.pages.jobs.columns.meta_description')</label>
                                        <input type="text" class="form-control m-input" name="meta_description" id="meta_description" required placeholder="@lang('admin.pages.jobs.columns.meta_description')" value="{{ old('meta_description') ? old('meta_description') : $job->meta_description }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('company_id')) has-danger @endif">
                                        <label for="company_id">@lang('admin.pages.jobs.columns.company_id')</label>
                                        <input type="number" min="0" class="form-control m-input" name="company_id" id="company_id" required placeholder="@lang('admin.pages.jobs.columns.company_id')" value="{{ old('company_id') ? old('company_id') : $job->company_id }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('province')) has-danger @endif">
                                        <label for="province">@lang('admin.pages.jobs.columns.province')</label>
                                        <input type="text" class="form-control m-input" name="province" id="province" required placeholder="@lang('admin.pages.jobs.columns.province')" value="{{ old('province') ? old('province') : $job->province }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('district')) has-danger @endif">
                                        <label for="district">@lang('admin.pages.jobs.columns.district')</label>
                                        <input type="text" class="form-control m-input" name="district" id="district" required placeholder="@lang('admin.pages.jobs.columns.district')" value="{{ old('district') ? old('district') : $job->district }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('number')) has-danger @endif">
                                        <label for="number">@lang('admin.pages.jobs.columns.number')</label>
                                        <input type="number" min="0" class="form-control m-input" name="number" id="number" required placeholder="@lang('admin.pages.jobs.columns.number')" value="{{ old('number') ? old('number') : $job->number }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('salary')) has-danger @endif">
                                        <label for="salary">@lang('admin.pages.jobs.columns.salary')</label>
                                        <input type="number" min="0" class="form-control m-input" name="salary" id="salary" required placeholder="@lang('admin.pages.jobs.columns.salary')" value="{{ old('salary') ? old('salary') : $job->salary }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row input-group date @if ($errors->has('end_time')) has-danger @endif">
                                        <label for="end_time" class="label-datetimepicker">@lang('admin.pages.jobs.columns.end_time')</label>
                                        <input type="text" class="form-control m-input datetime-picker" readonly="" placeholder="Select date &amp; time" id="end_time" name="end_time">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o glyphicon-th"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('order')) has-danger @endif">
                                        <label for="order">@lang('admin.pages.jobs.columns.order')</label>
                                        <input type="number" min="0" class="form-control m-input" name="order" id="order" required placeholder="@lang('admin.pages.jobs.columns.order')" value="{{ old('order') ? old('order') : $job->order }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('description')) has-danger @endif">
                                        <label for="description">@lang('admin.pages.jobs.columns.description')</label>
                                        <textarea name="description" id="description" class="form-control m-input" rows="3" placeholder="@lang('admin.pages.jobs.columns.description')">{{ old('description') ? old('description') : $job->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group m-form__group row @if ($errors->has('is_enabled')) has-danger @endif">
                                        <label for="is_enabled" class="label-switch">@lang('admin.pages.jobs.columns.is_enabled')</label>
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
