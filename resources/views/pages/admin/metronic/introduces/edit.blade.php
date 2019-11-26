@extends('pages.admin.metronic.layout.application',['menu' => 'introduces'] )

@section('metadata')
@stop

@section('styles')
    <style>
        .row {
            margin-bottom: 15px;
        }
        #mission-image-preview, #content-image-preview, #diagram-image-preview {
            height: 100px;
        }
        .help-block {
            width: 148px !important;
        }
        b {
            padding-left: 25px;
        }
    </style>
@stop

@section('scripts')
    <script src="{!! \URLHelper::asset('libs/metronic/demo/default/custom/crud/forms/validation/form-controls.js', 'admin') !!}"></script>
    <script>
        $(document).ready(function () {
            $('#mission-image').change(function (event) {
                $('#mission-image-preview').attr('src', URL.createObjectURL(event.target.files[0]));
            });

            $('#content-image').change(function (event) {
                $('#content-image-preview').attr('src', URL.createObjectURL(event.target.files[0]));
            });

            $('#diagram-image').change(function (event) {
                $('#diagram-image-preview').attr('src', URL.createObjectURL(event.target.files[0]));
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
    Introduce | Admin | {{ config('site.name') }}
@stop

@section('header')
    Introduce
@stop

@section('breadcrumb')
    <li class="m-nav__separator"> / </li>
    <li class="m-nav__item">
        <a href="{!! action('Admin\IntroduceController@index') !!}" class="m-nav__link">
            Introduce
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
            {{ $introduce->id }}
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
                        <a href="{!! action('Admin\IntroduceController@index') !!}" class="btn m-btn--pill m-btn--air btn-secondary btn-sm" style="width: 120px;">
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

            <form class="m-form m-form--fit" action="@if($isNew){!! action('Admin\IntroduceController@store') !!}@else{!! action('Admin\IntroduceController@update', [$introduce->id]) !!}@endif" method="POST" enctype="multipart/form-data">
                @if( !$isNew ) <input type="hidden" name="_method" value="PUT"> @endif
                {!! csrf_field() !!}

                <div class="m-portlet__body" style="padding-top: 0;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('title_introduce')) has-danger @endif">
                                <label for="title_introduce">Title trang giới thiệu chung</label>
                                <input type="text" class="form-control m-input" name="title_introduce" id="title_introduce" required value="{{ old('title_introduce') ? old('title_introduce') : $introduce->title_introduce }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-form__group row @if ($errors->has('title_leader_ship')) has-danger @endif">
                                <label for="title_leader_ship">Title trang ban lãnh đạo</label>
                                <input type="text" class="form-control m-input" name="title_leader_ship" id="title_leader_ship" required value="{{ old('title_leader_ship') ? old('title_leader_ship') : $introduce->title_leader_ship }}">
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group m-form__group row" style="max-width: 500px;">
                                @if( !empty($introduce->present()->contentImage()) )
                                <img id="content-image-preview" style="max-width: 100%;" src="{!! $introduce->present()->contentImage()->present()->url !!}" alt="" class="margin"/>
                                @else
                                <img id="content-image-preview" style="max-width: 100%;" src="{!! \URLHelper::asset('img/no_image.jpg', 'common') !!}" alt="" class="margin"/>
                                @endif
                                <input type="file" style="display: none;" id="content-image" name="content-image">
                                <p class="help-block" style="font-weight: bolder; display: block; width: 100%; text-align: center;">
                                    Hình ảnh
                                    <label for="content-image" style="font-weight: 100; color: #549cca; margin-left: 10px; cursor: pointer;">@lang('admin.pages.common.buttons.edit')</label>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group m-form__group row @if ($errors->has('content')) has-danger @endif">
                                <label for="content">Nội dung</label>
                                <input type="text" class="form-control m-input" name="content" id="content" required value="{{ old('content') ? old('content') : $introduce->content }}">
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group m-form__group row @if ($errors->has('content2')) has-danger @endif">
                                <label for="content">Nội dung 2</label>
                                <input type="text" class="form-control m-input" name="content2" id="content2" required value="{{ old('content2') ? old('content2') : $introduce->content2 }}">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group m-form__group row" style="max-width: 500px;">
                                @if( !empty($introduce->present()->missionImage()) )
                                <img id="mission-image-preview" style="max-width: 100%;" src="{!! $introduce->present()->missionImage()->present()->url !!}" alt="" class="margin"/>
                                @else
                                <img id="mission-image-preview" style="max-width: 100%;" src="{!! \URLHelper::asset('img/no_image.jpg', 'common') !!}" alt="" class="margin"/>
                                @endif
                                <input type="file" style="display: none;" id="mission-image" name="mission-image">
                                <p class="help-block" style="font-weight: bolder; display: block; width: 100%; text-align: center;">
                                    Hình ảnh
                                    <label for="mission-image" style="font-weight: 100; color: #549cca; margin-left: 10px; cursor: pointer;">@lang('admin.pages.common.buttons.edit')</label>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group m-form__group row @if ($errors->has('mission')) has-danger @endif">
                                <label for="mission">Tầm nhìn sứ mệnh</label>
                                <input type="text" class="form-control m-input" name="mission" id="mission" required value="{{ old('mission') ? old('mission') : $introduce->mission }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <b>Đối tác đồng hành</b>
                            </div>
                            <div class="form-group m-form__group row @if ($errors->has('content_intro')) has-danger @endif">
                                <label for="content_intro">Nội dung giới thiệu</label>
                                <input type="text" class="form-control m-input" name="content_intro" id="content_intro" required value="{{ old('content_intro') ? old('content_intro') : $introduce->content_intro }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <b>Giới thiệu tổng quan</b>
                            </div>
                            <div class="form-group m-form__group row @if ($errors->has('overview_intro')) has-danger @endif">
                                <label for="overview_intro">Giới thiệu tổng quan</label>
                                <input type="text" class="form-control m-input" name="overview_intro" id="overview_intro" required  value="{{ old('overview_intro') ? old('overview_intro') : $introduce->overview_intro }}">
                            </div>
                            <div class="form-group m-form__group row @if ($errors->has('overview_intro2')) has-danger @endif">
                                <label for="overview_intro2">Giới thiệu tổng quan 2</label>
                                <input type="text" class="form-control m-input" name="overview_intro2" id="overview_intro2" required  value="{{ old('overview_intro2') ? old('overview_intro2') : $introduce->overview_intro2 }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group m-form__group row" style="max-width: 500px;">
                                @if( !empty($introduce->present()->diagramImage()) )
                                <img id="diagram-image-preview" style="max-width: 100%;" src="{!! $introduce->present()->diagramImage()->present()->url !!}" alt="" class="margin"/>
                                @else
                                <img id="diagram-image-preview" style="max-width: 100%;" src="{!! \URLHelper::asset('img/no_image.jpg', 'common') !!}" alt="" class="margin"/>
                                @endif
                                <input type="file" style="display: none;" id="diagram-image" name="diagram-image">
                                <p class="help-block" style="font-weight: bolder; display: block; width: 100%; text-align: center;">
                                    Sơ đồ cơ cấu tổ chức
                                    <label for="diagram-image" style="font-weight: 100; color: #549cca; margin-left: 10px; cursor: pointer;">@lang('admin.pages.common.buttons.edit')</label>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <a href="{!! action('Admin\IntroduceController@index') !!}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-accent" style="width: 120px;">
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
