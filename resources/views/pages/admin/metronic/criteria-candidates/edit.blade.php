@extends('pages.admin.metronic.layout.application',['menu' => 'criteria-candidates'] )

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
    CriteriaCandidate | Admin | {{ config('site.name') }}
@stop

@section('header')
    CriteriaCandidate
@stop

@section('breadcrumb')
    <li class="m-nav__separator"> / </li>
    <li class="m-nav__item">
        <a href="{!! action('Admin\CriteriaCandidateController@index') !!}" class="m-nav__link">
            CriteriaCandidate
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
            {{ $criteriaCandidate->id }}
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
                        <a href="{!! action('Admin\CriteriaCandidateController@index') !!}" class="btn m-btn--pill m-btn--air btn-secondary btn-sm" style="width: 120px;">
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

            <form class="m-form m-form--fit" action="@if($isNew){!! action('Admin\CriteriaCandidateController@store') !!}@else{!! action('Admin\CriteriaCandidateController@update', [$criteriaCandidate->id]) !!}@endif" method="POST">
                @if( !$isNew ) <input type="hidden" name="_method" value="PUT"> @endif
                {!! csrf_field() !!}

                <div class="m-portlet__body" style="padding-top: 0;">
                                                                                                    <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row" style="max-width: 500px;">
                                        @if( !empty($criteriaCandidate->present()->coverImage()) )
                                        <img id="cover-image-preview" style="max-width: 100%;" src="{!! $criteriaCandidate->present()->coverImage()->present()->url !!}" alt="" class="margin"/>
                                        @else
                                        <img id="cover-image-preview" style="max-width: 100%;" src="{!! \URLHelper::asset('img/no_image.jpg', 'common') !!}" alt="" class="margin"/>
                                        @endif
                                        <input type="file" style="display: none;" id="cover-image" name="cover-image">
                                        <p class="help-block" style="font-weight: bolder; display: block; width: 100%; text-align: center;">
                                            @lang('admin.pages.criteria-candidates.columns.icon_image_id')
                                            <label for="cover-image" style="font-weight: 100; color: #549cca; margin-left: 10px; cursor: pointer;">@lang('admin.pages.common.buttons.edit')</label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('name')) has-danger @endif">
                                        <label for="name">@lang('admin.pages.criteria-candidates.columns.name')</label>
                                        <input type="text" class="form-control m-input" name="name" id="name" required placeholder="@lang('admin.pages.criteria-candidates.columns.name')" value="{{ old('name') ? old('name') : $criteriaCandidate->name }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('content')) has-danger @endif">
                                        <label for="content">@lang('admin.pages.criteria-candidates.columns.content')</label>
                                        <input type="text" class="form-control m-input" name="content" id="content" required placeholder="@lang('admin.pages.criteria-candidates.columns.content')" value="{{ old('content') ? old('content') : $criteriaCandidate->content }}">
                                    </div>
                                </div>
                            </div>
                                                            </div>

                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <a href="{!! action('Admin\CriteriaCandidateController@index') !!}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-accent" style="width: 120px;">
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
