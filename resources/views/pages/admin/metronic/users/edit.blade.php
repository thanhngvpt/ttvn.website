@extends('pages.admin.metronic.layout.application',['menu' => 'users'] )

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
            $('#profile-image').change(function (event) {
                $('#profile-image-preview').attr('src', URL.createObjectURL(event.target.files[0]));
            });

            $('.datetime-picker').datepicker({format: 'yyyy/mm/dd',});
        });
    </script>
@stop

@section('title')
    Users | Admin | {{ config('site.name') }}
@stop

@section('header')
    Users
@stop

@section('breadcrumb')
    <li class="m-nav__separator"> / </li>
    <li class="m-nav__item">
        <a href="{!! action('Admin\UserController@index') !!}" class="m-nav__link">
            Users
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
            {{ $user->id }}
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
                        <a href="{!! action('Admin\UserController@index') !!}" class="btn m-btn--pill m-btn--air btn-secondary btn-sm" style="width: 120px;">
                            @lang('admin.pages.common.buttons.back')
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="m-portlet__body">
            @if(isset($errors) && count($errors))
                <?php $errs = $errors->all(); ?>
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

            <form class="m-form m-form--fit"
                  action="@if($isNew){!! action('Admin\UserController@store') !!}@else{!! action('Admin\UserController@update', [$user->id]) !!}@endif"
                  method="POST" enctype="multipart/form-data">
                @if( !$isNew ) <input type="hidden" name="_method" value="PUT"> @endif
                {!! csrf_field() !!}

                <div class="m-portlet__body" style="padding-top: 0;">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group text-center">
                                @if( !empty($user->present()->profileImage()) )
                                    <img id="profile-image-preview" style="max-width: 100%;"
                                         src="{!! $user->present()->profileImage()->present()->url !!}" alt=""
                                         class="margin"/>
                                @else
                                    <img id="profile-image-preview" style="max-width: 100%;"
                                         src="{!! \URLHelper::asset('img/no_image.jpg', 'common') !!}" alt=""
                                         class="margin"/>
                                @endif
                                <input type="file" style="display: none;" id="profile-image" name="profile-image">
                                <p class="help-block"
                                   style="font-weight: bolder; display: block; width: 100%; text-align: center;">
                                    @lang('admin.pages.users.columns.profile_image_id')
                                    <label for="profile-image" style="font-weight: 100; color: #549cca; margin-left: 10px; cursor: pointer;">@lang('admin.pages.common.buttons.edit')</label>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group m-form__group row @if ($errors->has('name')) has-danger @endif">
                                <label for="name" class="col-md-2 col-form-label">@lang('admin.pages.users.columns.name')</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control m-input" name="name" id="name" required
                                           placeholder="@lang('admin.pages.users.columns.name')"
                                           value="{{ old('name') ? old('name') : $user->name }}">
                                </div>
                            </div>

                            <div class="form-group m-form__group row @if ($errors->has('email')) has-danger @endif">
                                <label for="email" class="col-md-2 col-form-label">@lang('admin.pages.users.columns.email')</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control m-input" name="email" id="email" required
                                           placeholder="@lang('admin.pages.users.columns.email')"
                                           value="{{ old('email') ? old('email') : $user->email }}">
                                </div>
                            </div>

                            @if($isNew)
                                <div class="form-group m-form__group row @if ($errors->has('password')) has-danger @endif">
                                    <label for="password" class="col-md-2 col-form-label">@lang('admin.pages.users.columns.password')</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control m-input" name="password" id="password" @if(!$isNew) disabled @endif
                                        required placeholder="@lang('admin.pages.users.columns.password')"
                                               value="{{ old('password') ? old('password') : $user->password }}">
                                    </div>
                                </div>

                                <div class="form-group m-form__group row @if ($errors->has('re_password')) has-danger @endif">
                                    <label for="re_password" class="col-md-2 col-form-label">@lang('admin.pages.users.columns.re_password')</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control m-input" name="re_password" id="re_password"
                                               required placeholder="@lang('admin.pages.users.columns.re_password')"
                                               value="{{ old('re_password') ? old('re_password') : $user->re_password }}">
                                    </div>
                                </div>
                            @endif

                            <div class="form-group m-form__group row @if ($errors->has('locale')) has-danger @endif">
                                <label for="locale" class="col-md-2 col-form-label">@lang('admin.pages.users.columns.locale')</label>
                                <div class="col-md-10">
                                    <select class="form-control m-input" name="locale" id="locale" style="margin-bottom: 15px;" required>
                                        @foreach( config('locale.languages') as $code => $locale )
                                            <option value="{!! $code !!}" @if( (old('locale') && old('locale') == $code) || ( $user->locale === $code) ) selected @endif >
                                                {{ trans($locale['name']) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group m-form__group row @if ($errors->has('gender')) has-danger @endif">
                                <label for="gender">@lang('admin.pages.users.columns.gender')</label>
                                <select class="form-control" name="gender" id="gender" style="margin-bottom: 15px;" required>
                                    <option value="1" @if((old('gender') && old('gender') == 1) || ( $user->gender === 1)) selected @endif>@lang('admin.pages.users.columns.gender_male')</option>
                                    <option value="0" @if((old('gender') && old('gender') == 0) || ( $user->gender === 0)) selected @endif>@lang('admin.pages.users.columns.gender_female')</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group m-form__group row @if ($errors->has('birthday')) has-danger @endif">
                                <label for="birthday">@lang('admin.pages.users.columns.birthday')</label>
                                <input type="text" class="form-control m-input datetime-picker" readonly=""
                                       placeholder="Select your birthday" id="birthday" name="birthday"
                                       value="{{ old('birthday') ? old('birthday') : $user->birthday }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group m-form__group row @if ($errors->has('telephone')) has-danger @endif">
                                <label for="telephone">@lang('admin.pages.users.columns.telephone')</label>
                                <input type="text" class="form-control m-input" name="telephone" id="telephone"
                                       placeholder="@lang('admin.pages.users.columns.telephone')"
                                       value="{{ old('telephone') ? old('telephone') : $user->telephone }}">
                            </div>
                        </div>
                    </div>

                    @if(!$isNew)
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group m-form__group row @if ($errors->has('last_notification_id')) has-danger @endif">
                                    <label for="last_notification_id">@lang('admin.pages.users.columns.last_notification_id')</label>
                                    <input type="number" min="0" class="form-control m-input" name="last_notification_id"
                                           id="last_notification_id" disabled
                                           placeholder="@lang('admin.pages.users.columns.last_notification_id')"
                                           value="{{ old('last_notification_id') ? old('last_notification_id') : $user->last_notification_id }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group m-form__group row @if ($errors->has('api_access_token')) has-danger @endif">
                                    <label for="api_access_token">@lang('admin.pages.users.columns.api_access_token')</label>
                                    <input type="text" class="form-control m-input" name="api_access_token"
                                           id="api_access_token" disabled
                                           placeholder="@lang('admin.pages.users.columns.api_access_token')"
                                           value="{{ old('api_access_token') ? old('api_access_token') : $user->api_access_token }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group m-form__group row @if ($errors->has('remember_token')) has-danger @endif">
                                    <label for="remember_token">@lang('admin.pages.users.columns.remember_token')</label>
                                    <input type="text" class="form-control m-input" name="remember_token"
                                           id="remember_token" disabled
                                           placeholder="@lang('admin.pages.users.columns.remember_token')"
                                           value="{{ old('remember_token') ? old('remember_token') : $user->remember_token }}">
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('address')) has-danger @endif">
                                <label for="address">@lang('admin.pages.users.columns.address')</label>
                                <textarea name="address" id="address"
                                          class="form-control m-input" rows="3"
                                          placeholder="@lang('admin.pages.users.columns.address')">{{ old('address') ? old('address') : $user->address }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <a href="{!! action('Admin\UserController@index') !!}"
                                   class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-accent"
                                   style="width: 120px;">
                                    @lang('admin.pages.common.buttons.cancel')
                                </a>
                                <button type="submit" class="btn m-btn--pill m-btn--air btn-primary m-btn m-btn--custom"
                                        style="width: 120px;">
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
