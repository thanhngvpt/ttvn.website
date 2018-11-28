@extends('pages.admin.metronic.layout.application',['menu' => 'user-notifications'] )

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
            $('.datetime-picker').datetimepicker({
                todayHighlight: true,
                autoclose: true,
                pickerPosition: 'bottom-left',
                format: 'yyyy-mm-dd H:i:s'
            });
        });
    </script>
@stop

@section('title')
    User Notifications | Admin | {{ config('site.name') }}
@stop

@section('header')
    User Notifications
@stop

@section('breadcrumb')
    <li class="m-nav__separator"> / </li>
    <li class="m-nav__item">
        <a href="{!! action('Admin\UserNotificationController@index') !!}" class="m-nav__link">
            User Notifications
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
            {{ $userNotification->id }}
        </li>
    @endif
@stop

@section('content')
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        @if( $isNew ) Create New Record @else Notify Detail @endif
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{!! action('Admin\UserNotificationController@index') !!}" class="btn m-btn--pill m-btn--air btn-secondary btn-sm" style="width: 120px;">
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

            <form class="m-form m-form--fit" action="@if($isNew){!! action('Admin\UserNotificationController@store') !!}@else{!! action('Admin\UserNotificationController@update', [$userNotification->id]) !!}@endif" method="POST">
                @if( !$isNew ) <input type="hidden" name="_method" value="PUT"> @endif
                {!! csrf_field() !!}

                <div class="m-portlet__body" style="padding-top: 0;">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group m-form__group row @if ($errors->has('user_id')) has-danger @endif">
                                <label for="user_id">@lang('admin.pages.admin-user-notifications.columns.user_id')</label>

                                <select class="form-control m-input" name="user_id" id="user_id" required>
                                    <option>Select a Receiver</option>
                                    <option value="{{\App\Models\Notification::BROADCAST_USER_ID}}">Send All</option>
                                    @foreach( $users as $user )
                                        <option value="{!! $user->id !!}" @if( (old('user_id') && old('user_id') == $user->id) || ( $userNotification->user_id === $user->id) ) selected @endif >
                                            {{ $user->email }} ({{$user->name}})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group m-form__group row @if ($errors->has('category_type')) has-danger @endif">
                                <label for="category_type">@lang('admin.pages.admin-user-notifications.columns.category_type')</label>

                                <?php $notifyCategories = \App\Models\Notification::CATEGORY_TYPE; ?>
                                <select class="form-control m-input" name="category_type" id="category_type" required>
                                    @foreach( $notifyCategories as $key => $category )
                                        <option value="{{ $key }}" @if( (old('category_type') && old('category_type') == $key) || ( $userNotification->category_type == $key) ) selected @endif >
                                            {{ $category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group m-form__group row @if ($errors->has('type')) has-danger @endif">
                                <label for="type">@lang('admin.pages.admin-user-notifications.columns.type')</label>

                                <?php $notifyTypes = \App\Models\Notification::TYPE; ?>
                                <select class="form-control m-input" name="type" id="type" required>
                                    @foreach( $notifyTypes as $key => $notifyType )
                                        <option value="{{ $key }}" @if( (old('type') && old('type') == $key) || ( $userNotification->type == $key) ) selected @endif >
                                            {{ $notifyType }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group m-form__group row @if ($errors->has('locale')) has-danger @endif">
                                <label for="locale">@lang('admin.pages.admin-user-notifications.columns.locale')</label>
                                <select class="form-control m-input" name="locale" id="locale" style="margin-bottom: 15px;" required>
                                    @foreach( config('locale.languages') as $code => $locale )
                                        <option value="{!! $code !!}" @if( (old('locale') && old('locale') == $code) || ( $userNotification->locale === $code) ) selected @endif >
                                            {{ trans($locale['name']) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group m-form__group row  @if ($errors->has('sent_at')) has-danger @endif">
                                <label for="sent_at">@lang('admin.pages.admin-user-notifications.columns.sent_at')</label>
                                <input type="text" class="form-control m-input datetime-picker"
                                       placeholder="Select date &amp; time" id="sent_at" name="sent_at" value="{{ old('sent_at') ? old('sent_at') : $userNotification->sent_at }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group m-form__group row @if ($errors->has('read')) has-danger @endif">
                                <label for="read"
                                       class="label-switch">@lang('admin.pages.admin-user-notifications.columns.read')</label>
                                <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                                <label>
                                    <input type="checkbox" id="read" name="read" value="1" @if( $userNotification->read) checked @endif>
                                    <span></span>
                                </label>
                            </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('data')) has-danger @endif">
                                <label for="data">@lang('admin.pages.admin-user-notifications.columns.data')</label>
                                <textarea name="data" id="data" class="form-control m-input" rows="5"
                                          placeholder="@lang('admin.pages.admin-user-notifications.columns.data')">{{ old('data') ? old('data') : $userNotification->data }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('content')) has-danger @endif">
                                <label for="content">@lang('admin.pages.admin-user-notifications.columns.content')</label>
                                <textarea name="content" id="content" class="form-control m-input" rows="5"
                                          placeholder="@lang('admin.pages.admin-user-notifications.columns.content')">{{ old('content') ? old('content') : $userNotification->content }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <a href="{!! action('Admin\UserNotificationController@index') !!}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-accent" style="width: 120px;">
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
