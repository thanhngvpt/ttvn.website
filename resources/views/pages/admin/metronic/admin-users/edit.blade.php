@extends('pages.admin.metronic.layout.application',['menu' => 'admin-users'] )

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
    AdminUser | Admin | {{ config('site.name') }}
@stop

@section('header')
    AdminUser
@stop

@section('breadcrumb')
    <li class="m-nav__separator"> / </li>
    <li class="m-nav__item">
        <a href="{!! action('Admin\AdminUserController@index') !!}" class="m-nav__link">
            AdminUser
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
            {{ $adminUser->id }}
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
                        <a href="{!! action('Admin\AdminUserController@index') !!}" class="btn m-btn--pill m-btn--air btn-secondary btn-sm" style="width: 120px;">
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

            <form class="m-form m-form--fit m-form--state" action="@if($isNew){!! action('Admin\AdminUserController@store') !!}@else{!! action('Admin\AdminUserController@update', [$adminUser->id]) !!}@endif" method="POST" enctype="multipart/form-data">
                @if( !$isNew ) <input type="hidden" name="_method" value="PUT"> @endif
                {!! csrf_field() !!}

                    <div class="m-portlet__body" style="padding-top: 0;">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group text-center">
                                    @if( !empty($adminUser->present()->profileImage()) )
                                        <img id="profile-image-preview" style="max-width: 500px; width: 100%;" src="{!! $adminUser->present()->profileImage()->present()->url !!}" alt="" class="margin"/>
                                    @else
                                        <img id="profile-image-preview" style="max-width: 500px; width: 100%;" src="{!! \URLHelper::asset('img/no_image.jpg', 'common') !!}" alt="" class="margin"/>
                                    @endif
                                    <input type="file" style="display: none;" id="profile-image" name="profile_image">
                                    <p class="help-block" style="font-weight: bolder;">
                                        @lang('admin.pages.admin-users.columns.profile_image_id')
                                        <label for="profile-image" style="font-weight: 100; color: #549cca; margin-left: 10px; cursor: pointer;">@lang('admin.pages.common.buttons.edit')</label>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group m-form__group row @if ($errors->has('name')) has-danger @endif">
                                    <label for="name" class="col-md-2 col-form-label">@lang('admin.pages.admin-users.columns.name')</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control m-input" name="name" id="name" required
                                               placeholder="@lang('admin.pages.admin-users.columns.name')"
                                               value="{{ old('name') ? old('name') : $adminUser->name }}">
                                    </div>
                                </div>

                                <div class="form-group m-form__group row @if ($errors->has('email')) has-danger @endif">
                                    <label for="name" class="col-md-2 col-form-label">@lang('admin.pages.admin-users.columns.email')</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control m-input" name="email" id="email" required
                                               placeholder="@lang('admin.pages.admin-users.columns.email')"
                                               value="{{ old('email') ? old('email') : $adminUser->email }}">
                                    </div>
                                </div>

                                <div class="form-group m-form__group row @if ($errors->has('password')) has-danger @endif">
                                    <label for="password" class="col-md-2 col-form-label">@lang('admin.pages.admin-users.columns.password')</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control m-input" name="password" id="password" @if(!$isNew) disabled @endif
                                               required placeholder="@lang('admin.pages.admin-users.columns.password')"
                                               value="{{ old('password') ? old('password') : $adminUser->password }}">
                                    </div>
                                </div>

                                @if($isNew)
                                    <div class="form-group m-form__group row @if ($errors->has('re_password')) has-danger @endif">
                                        <label for="re_password" class="col-md-2 col-form-label">@lang('admin.pages.admin-users.columns.re_password')</label>
                                        <div class="col-md-10">
                                            <input type="password" class="form-control m-input" name="re_password" id="re_password"
                                                   required placeholder="@lang('admin.pages.admin-users.columns.re_password')"
                                                   value="{{ old('re_password') ? old('re_password') : $adminUser->re_password }}">
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group m-form__group row @if ($errors->has('locale')) has-danger @endif">
                                    <label for="locale" class="col-md-2 col-form-label">@lang('admin.pages.admin-users.columns.locale')</label>
                                    <div class="col-md-10">
                                        <select class="form-control m-input" name="locale" id="locale" style="margin-bottom: 15px;" required>
                                            @foreach( config('locale.languages') as $code => $locale )
                                                <option value="{!! $code !!}" @if( (old('locale') && old('locale') == $code) || ( $adminUser->locale === $code) ) selected @endif >
                                                    {{ trans($locale['name']) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="m-form__group form-group row" style="padding-top: 0;">
                                    <label for="role" class="col-md-2 col-form-label">@lang('admin.pages.admin-users.columns.permissions')</label>
                                    <div class="col-md-12 ">
                                        @if( $authUser->hasRole(\App\Models\AdminUserRole::ROLE_SUPER_USER) )
                                            <label class="m-checkbox" style="margin-right: 20px;">
                                                <input type="checkbox" name="role[]" value="{{ \App\Models\AdminUserRole::ROLE_SUPER_USER }}" class="hidden" @if( $adminUser->hasRole(\App\Models\AdminUserRole::ROLE_SUPER_USER, false) ) checked @endif >
                                                @lang('admin.roles.super_user')
                                                <span></span>
                                            </label>
                                        @endif

                                        @if( $authUser->hasRole(\App\Models\AdminUserRole::ROLE_ADMIN) )
                                            <label class="m-checkbox">
                                                <input type="checkbox" name="role[]" value="{{ \App\Models\AdminUserRole::ROLE_ADMIN }}" class="hidden" @if( $adminUser->hasRole(\App\Models\AdminUserRole::ROLE_ADMIN, false) ) checked @endif >
                                                @lang('admin.roles.admin')
                                                <span></span>
                                            </label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <a href="{!! action('Admin\AdminUserController@index') !!}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-accent" style="width: 120px;">
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
