@extends('pages.admin.metronic.layout.application',['menu' => 'oauth_clients'] )

@section('metadata')
@stop

@section('styles')
    <style>
        #index-table tr td {
            text-align: center;
        }
        .row {
            margin-bottom: 15px;
        }
    </style>
@stop

@section('scripts')
    <script src="{!! \URLHelper::asset('adminlte/js/delete_item.js', 'admin') !!}"></script>
    <script src="{!! \URLHelper::asset('libs/metronic/demo/default/custom/crud/forms/validation/form-controls.js', 'admin') !!}"></script>
@stop

@section('title')
    OAuth Clients | Admin | {{ config('site.name') }}
@stop

@section('header')
    OAuth Clients
@stop

@section('breadcrumb')
    <li class="m-nav__separator"> / </li>
    <li class="m-nav__item">
        <a href="{!! action('Admin\OauthClientController@index') !!}" class="m-nav__link">
            OAuth
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
            {{ $oauthClient->id }}
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
                        <a href="{!! action('Admin\OauthClientController@index') !!}" class="btn m-btn--pill m-btn--air btn-secondary btn-sm" style="width: 120px;">
                            Back
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="m-portlet__body">
            <form class="m-form m-form--fit" action="@if($isNew){!! action('Admin\OauthClientController@store') !!}@else{!! action('Admin\OauthClientController@update', [$oauthClient->id]) !!}@endif" method="POST">
                @if( !$isNew ) <input type="hidden" name="_method" value="PUT"> @endif
                {!! csrf_field() !!}

                <div class="m-portlet__body" style="padding-top: 0;">
                    <div class="m-form__content">
                        <div class="m-alert m-alert--icon alert alert-danger m--hide" role="alert" id="m_form_1_msg">
                            <div class="m-alert__icon">
                                <i class="la la-warning"></i>
                            </div>
                            <div class="m-alert__text">
                                Oh snap! Change a few things up and try submitting again.
                            </div>
                            <div class="m-alert__close">
                                <button type="button" class="close" data-close="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="@if( $isNew ) col-md-12 @else col-md-6 @endif">
                            <div class="form-group m-form__group row">
                                <label for="name">@lang('admin.pages.oauth-clients.columns.name')</label>
                                <input type="text" class="form-control m-input" name="name" id="name" required placeholder="Enter some string here" value="{{ old('name') ? old('name') : $oauthClient->name }}">
                            </div>
                        </div>

                        @if( !$isNew )
                            <div class="col-md-6">
                                <div class="form-group m-form__group row">
                                    <label for="secret">@lang('admin.pages.oauth-clients.columns.secret')</label>
                                    <input type="text" class="form-control m-input" name="secret" id="secret" disabled value="{{ $oauthClient->secret }}" placeholder="Secret" >
                                </div>
                            </div>
                        @endif
                    </div>

                    @if( !$isNew )
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group m-form__group row">
                                    <label for="redirect">@lang('admin.pages.oauth-clients.columns.redirect')</label>
                                    <textarea name="redirect" id="redirect" class="form-control m-input" rows="3" placeholder="@lang('admin.pages.oauth-clients.columns.redirect')">{{ old('redirect') ? old('redirect') : $oauthClient->redirect }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group m-form__group row">
                                    <label class="label-switch">@lang('admin.pages.oauth-clients.columns.personal_access_client')</label>
                                    <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                                        <label>
                                            <input type="checkbox" id="personal_access_client" name="personal_access_client" value="1" @if( $oauthClient->personal_access_client) checked @endif>
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group m-form__group row">
                                    <label class="label-switch">@lang('admin.pages.oauth-clients.columns.password_client')</label>
                                    <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                                        <label>
                                            <input type="checkbox" id="password_client" name="password_client" value="1" @if( $oauthClient->password_client) checked @endif>
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group m-form__group row">
                                    <label class="label-switch">@lang('admin.pages.oauth-clients.columns.revoked')</label>
                                    <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                                        <label>
                                            <input type="checkbox" id="revoked" name="revoked" value="1" @if( $oauthClient->revoked) checked @endif>
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <a href="{!! action('Admin\OauthClientController@index') !!}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-accent" style="width: 120px;">
                                    Cancel
                                </a>
                                <button type="submit" class="btn m-btn--pill m-btn--air btn-primary m-btn m-btn--custom" style="width: 120px;">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
