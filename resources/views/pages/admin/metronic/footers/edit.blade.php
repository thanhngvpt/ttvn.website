@extends('pages.admin.metronic.layout.application',['menu' => 'footers'] )

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
    Footer | Admin | {{ config('site.name') }}
@stop

@section('header')
    Footer
@stop

@section('breadcrumb')
    <li class="m-nav__separator"> / </li>
    <li class="m-nav__item">
        <a href="{!! action('Admin\FooterController@index') !!}" class="m-nav__link">
            Footer
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
            {{ $footer->id }}
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
                        <a href="{!! action('Admin\FooterController@index') !!}" class="btn m-btn--pill m-btn--air btn-secondary btn-sm" style="width: 120px;">
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

            <form class="m-form m-form--fit" action="@if($isNew){!! action('Admin\FooterController@store') !!}@else{!! action('Admin\FooterController@update', [$footer->id]) !!}@endif" method="POST">
                @if( !$isNew ) <input type="hidden" name="_method" value="PUT"> @endif
                {!! csrf_field() !!}

                <div class="m-portlet__body" style="padding-top: 0;">
                                                                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('hn_name')) has-danger @endif">
                                        <label for="hn_name">@lang('admin.pages.footers.columns.hn_name')</label>
                                        <input type="text" class="form-control m-input" name="hn_name" id="hn_name" required placeholder="@lang('admin.pages.footers.columns.hn_name')" value="{{ old('hn_name') ? old('hn_name') : $footer->hn_name }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('hn_address')) has-danger @endif">
                                        <label for="hn_address">@lang('admin.pages.footers.columns.hn_address')</label>
                                        <input type="text" class="form-control m-input" name="hn_address" id="hn_address" required placeholder="@lang('admin.pages.footers.columns.hn_address')" value="{{ old('hn_address') ? old('hn_address') : $footer->hn_address }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('hn_phone')) has-danger @endif">
                                        <label for="hn_phone">@lang('admin.pages.footers.columns.hn_phone')</label>
                                        <input type="text" class="form-control m-input" name="hn_phone" id="hn_phone" required placeholder="@lang('admin.pages.footers.columns.hn_phone')" value="{{ old('hn_phone') ? old('hn_phone') : $footer->hn_phone }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('hn_fax')) has-danger @endif">
                                        <label for="hn_fax">@lang('admin.pages.footers.columns.hn_fax')</label>
                                        <input type="text" class="form-control m-input" name="hn_fax" id="hn_fax" required placeholder="@lang('admin.pages.footers.columns.hn_fax')" value="{{ old('hn_fax') ? old('hn_fax') : $footer->hn_fax }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('other_name')) has-danger @endif">
                                        <label for="other_name">@lang('admin.pages.footers.columns.other_name')</label>
                                        <input type="text" class="form-control m-input" name="other_name" id="other_name" required placeholder="@lang('admin.pages.footers.columns.other_name')" value="{{ old('other_name') ? old('other_name') : $footer->other_name }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('other_address')) has-danger @endif">
                                        <label for="other_address">@lang('admin.pages.footers.columns.other_address')</label>
                                        <input type="text" class="form-control m-input" name="other_address" id="other_address" required placeholder="@lang('admin.pages.footers.columns.other_address')" value="{{ old('other_address') ? old('other_address') : $footer->other_address }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('other_phone')) has-danger @endif">
                                        <label for="other_phone">@lang('admin.pages.footers.columns.other_phone')</label>
                                        <input type="text" class="form-control m-input" name="other_phone" id="other_phone" required placeholder="@lang('admin.pages.footers.columns.other_phone')" value="{{ old('other_phone') ? old('other_phone') : $footer->other_phone }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('other_fax')) has-danger @endif">
                                        <label for="other_fax">@lang('admin.pages.footers.columns.other_fax')</label>
                                        <input type="text" class="form-control m-input" name="other_fax" id="other_fax" required placeholder="@lang('admin.pages.footers.columns.other_fax')" value="{{ old('other_fax') ? old('other_fax') : $footer->other_fax }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('fb_link')) has-danger @endif">
                                        <label for="fb_link">@lang('admin.pages.footers.columns.fb_link')</label>
                                        <input type="text" class="form-control m-input" name="fb_link" id="fb_link" required placeholder="@lang('admin.pages.footers.columns.fb_link')" value="{{ old('fb_link') ? old('fb_link') : $footer->fb_link }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('skype_link')) has-danger @endif">
                                        <label for="skype_link">@lang('admin.pages.footers.columns.skype_link')</label>
                                        <input type="text" class="form-control m-input" name="skype_link" id="skype_link" required placeholder="@lang('admin.pages.footers.columns.skype_link')" value="{{ old('skype_link') ? old('skype_link') : $footer->skype_link }}">
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row @if ($errors->has('email')) has-danger @endif">
                                        <label for="email">@lang('admin.pages.footers.columns.email')</label>
                                        <input type="text" class="form-control m-input" name="email" id="email" required placeholder="@lang('admin.pages.footers.columns.email')" value="{{ old('email') ? old('email') : $footer->email }}">
                                    </div>
                                </div>
                            </div>
                                                            </div>

                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <a href="{!! action('Admin\FooterController@index') !!}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-accent" style="width: 120px;">
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
