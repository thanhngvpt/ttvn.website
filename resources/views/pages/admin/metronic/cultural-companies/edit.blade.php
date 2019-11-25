@extends('pages.admin.metronic.layout.application',['menu' => 'cultural-companies'] )

@section('metadata')
@stop

@section('styles')
    <style>
        .row {
            margin-bottom: 15px;
        }
        #ttvn-image-preview, #cover-image-preview, #icon1-image-preview, #icon2-image-preview, #icon3-image-preview  {
            height: 100px;
        }
        
        .help-block {
            width: 148px !important;
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

            $('#ttvn-image').change(function (event) {
                $('#ttvn-image-preview').attr('src', URL.createObjectURL(event.target.files[0]));
            });

            $('#icon1-image').change(function (event) {
                $('#icon1-image-preview').attr('src', URL.createObjectURL(event.target.files[0]));
            });

            $('#icon2-image').change(function (event) {
                $('#icon2-image-preview').attr('src', URL.createObjectURL(event.target.files[0]));
            });

            $('#icon3-image').change(function (event) {
                $('#icon3-image-preview').attr('src', URL.createObjectURL(event.target.files[0]));
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
    CulturalCompany | Admin | {{ config('site.name') }}
@stop

@section('header')
    CulturalCompany
@stop

@section('breadcrumb')
    <li class="m-nav__separator"> / </li>
    <li class="m-nav__item">
        <a href="{!! action('Admin\CulturalCompanyController@index') !!}" class="m-nav__link">
            CulturalCompany
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
            {{ $culturalCompany->id }}
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
                        <a href="{!! action('Admin\CulturalCompanyController@index') !!}" class="btn m-btn--pill m-btn--air btn-secondary btn-sm" style="width: 120px;">
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

            <form class="m-form m-form--fit" action="@if($isNew){!! action('Admin\CulturalCompanyController@store') !!}@else{!! action('Admin\CulturalCompanyController@update', [$culturalCompany->id]) !!}@endif" method="POST" enctype="multipart/form-data">
                @if( !$isNew ) <input type="hidden" name="_method" value="PUT"> @endif
                {!! csrf_field() !!}

                <div class="m-portlet__body" style="padding-top: 0;">
                   <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('title_page')) has-danger @endif">
                                <label for="title_page">Title trang</label>
                                <input type="text" class="form-control m-input" name="title_page" id="title_page" required" value="{{ old('title_page') ? old('title_page') : $culturalCompany->title_page }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group m-form__group row" style="max-width: 500px;">
                                @if( !empty($culturalCompany->present()->coverImage()) )
                                <img id="cover-image-preview" style="max-width: 100%;" src="{!! $culturalCompany->present()->coverImage()->present()->url !!}" alt="" class="margin"/>
                                @else
                                <img id="cover-image-preview" style="max-width: 100%;" src="{!! \URLHelper::asset('img/no_image.jpg', 'common') !!}" alt="" class="margin"/>
                                @endif
                                <input type="file" style="display: none;" id="cover-image" name="cover-image">
                                <p class="help-block" style="font-weight: bolder; display: block; width: 100%; text-align: center;">
                                    Ảnh minh họa
                                    <label for="cover-image" style="font-weight: 100; color: #549cca; margin-left: 10px; cursor: pointer;">@lang('admin.pages.common.buttons.edit')</label>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group m-form__group row @if ($errors->has('introduce')) has-danger @endif">
                                <label for="introduce">Giới thiệu chung(văn hóa doanh nghiệp TTVN)</label>
                                <input type="text" class="form-control m-input" name="introduce" id="introduce" required value="{{ old('introduce') ? old('introduce') : $culturalCompany->introduce }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('content')) has-danger @endif">
                                <label for="content">Nội dung chi tiết</label>
                                <input type="text" class="form-control m-input" name="content" id="content" required value="{{ old('content') ? old('content') : $culturalCompany->content }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('meta_title')) has-danger @endif">
                                <label for="meta_title">Meta title</label>
                                <input type="text" class="form-control m-input" name="meta_title" id="meta_title" required value="{{ old('meta_title') ? old('meta_title') : $culturalCompany->meta_title }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('meta_description1')) has-danger @endif">
                                <label for="meta_description1">Meta description</label>
                                <input type="text" class="form-control m-input" name="meta_description1" id="meta_description1" required value="{{ old('meta_description1') ? old('meta_description1') : $culturalCompany->meta_description1 }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <b>Tại sao chọn TTVN Group</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group m-form__group row" style="max-width: 500px;">
                                @if( !empty($culturalCompany->present()->icon1Image()) )
                                <img id="icon1-image-preview" style="max-width: 100%;" src="{!! $culturalCompany->present()->icon1Image()->present()->url !!}" alt="" class="margin"/>
                                @else
                                <img id="icon1-image-preview" style="max-width: 100%;" src="{!! \URLHelper::asset('img/no_image.jpg', 'common') !!}" alt="" class="margin"/>
                                @endif
                                <input type="file" style="display: none;" id="icon1-image" name="icon1-image">
                                <p class="help-block" style="font-weight: bolder; display: block; width: 100%; text-align: center;">
                                    icon1
                                    <label for="icon1-image" style="font-weight: 100; color: #549cca; margin-left: 10px; cursor: pointer;">@lang('admin.pages.common.buttons.edit')</label>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group m-form__group row @if ($errors->has('reason1')) has-danger @endif">
                                <label for="reason1">Lí do 1:</label>
                                <input type="text" class="form-control m-input" name="reason1" id="reason1" required value="{{ old('reason1') ? old('reason1') : $culturalCompany->reason1 }}">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group m-form__group row @if ($errors->has('detail1')) has-danger @endif">
                                <label for="detail1">Chi tiết lý do 1</label>
                                <input type="text" class="form-control m-input" name="detail1" id="detail1" required value="{{ old('detail1') ? old('detail1') : $culturalCompany->detail1 }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group m-form__group row" style="max-width: 500px;">
                                @if( !empty($culturalCompany->present()->icon2Image()) )
                                <img id="icon2-image-preview" style="max-width: 100%;" src="{!! $culturalCompany->present()->icon2Image()->present()->url !!}" alt="" class="margin"/>
                                @else
                                <img id="icon2-image-preview" style="max-width: 100%;" src="{!! \URLHelper::asset('img/no_image.jpg', 'common') !!}" alt="" class="margin"/>
                                @endif
                                <input type="file" style="display: none;" id="icon2-image" name="icon2-image">
                                <p class="help-block" style="font-weight: bolder; display: block; width: 100%; text-align: center;">
                                    icon 2
                                    <label for="icon2-image" style="font-weight: 100; color: #549cca; margin-left: 10px; cursor: pointer;">@lang('admin.pages.common.buttons.edit')</label>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-5"> 
                            <div class="form-group m-form__group row @if ($errors->has('reason2')) has-danger @endif">
                                <label for="reason2">Lí do 2</label>
                                <input type="text" class="form-control m-input" name="reason2" id="reason2" required value="{{ old('reason2') ? old('reason2') : $culturalCompany->reason2 }}">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group m-form__group row @if ($errors->has('detail2')) has-danger @endif">
                                <label for="detail2">Chi tiết lí do 2</label>
                                <input type="text" class="form-control m-input" name="detail2" id="detail2" required value="{{ old('detail2') ? old('detail2') : $culturalCompany->detail2 }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group m-form__group row" style="max-width: 500px;">
                                @if( !empty($culturalCompany->present()->icon3Image()) )
                                <img id="icon3-image-preview" style="max-width: 100%;" src="{!! $culturalCompany->present()->icon3Image()->present()->url !!}" alt="" class="margin"/>
                                @else
                                <img id="icon3-image-preview" style="max-width: 100%;" src="{!! \URLHelper::asset('img/no_image.jpg', 'common') !!}" alt="" class="margin"/>
                                @endif
                                <input type="file" style="display: none;" id="icon3-image" name="icon3-image">
                                <p class="help-block" style="font-weight: bolder; display: block; width: 100%; text-align: center;">
                                    icon 3
                                    <label for="icon3-image" style="font-weight: 100; color: #549cca; margin-left: 10px; cursor: pointer;">@lang('admin.pages.common.buttons.edit')</label>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group m-form__group row @if ($errors->has('reason3')) has-danger @endif">
                                <label for="reason3">Lí do 3</label>
                                <input type="text" class="form-control m-input" name="reason3" id="reason3" required value="{{ old('reason3') ? old('reason3') : $culturalCompany->reason3 }}">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group m-form__group row @if ($errors->has('detail3')) has-danger @endif">
                                <label for="detail3">Chi tiết lí do 3</label>
                                <input type="text" class="form-control m-input" name="detail3" id="detail3" required value="{{ old('detail3') ? old('detail3') : $culturalCompany->detail3 }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <b>Văn hóa TTVN group</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group m-form__group row" style="max-width: 500px;">
                                @if( !empty($culturalCompany->present()->ttvnImage()) )
                                <img id="ttvn-image-preview" style="max-width: 100%;" src="{!! $culturalCompany->present()->ttvnImage()->present()->url !!}" alt="" class="margin"/>
                                @else
                                <img id="ttvn-image-preview" style="max-width: 100%;" src="{!! \URLHelper::asset('img/no_image.jpg', 'common') !!}" alt="" class="margin"/>
                                @endif
                                <input type="file" style="display: none;" id="ttvn-image" name="ttvn-image">
                                <p class="help-block" style="font-weight: bolder; display: block; width: 100%; text-align: center;">
                                    hình ảnh
                                    <label for="ttvn-image" style="font-weight: 100; color: #549cca; margin-left: 10px; cursor: pointer;">@lang('admin.pages.common.buttons.edit')</label>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group m-form__group row @if ($errors->has('ttvn_title')) has-danger @endif">
                                <label for="ttvn_title">Tiêu đề</label>
                                <input type="text" class="form-control m-input" name="ttvn_title" id="ttvn_title" required value="{{ old('ttvn_title') ? old('ttvn_title') : $culturalCompany->ttvn_title }}">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group m-form__group row @if ($errors->has('ttvn_content')) has-danger @endif">
                                <label for="ttvn_content">Nội dung</label>
                                <input type="text" class="form-control m-input" name="ttvn_content" id="ttvn_content" required value="{{ old('ttvn_content') ? old('ttvn_content') : $culturalCompany->ttvn_content }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <b>Chúng tôi tìm ai</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-form__group row @if ($errors->has('we_find_introduce')) has-danger @endif">
                                <label for="we_find_introduce">Giới thiệu</label>
                                <input type="text" class="form-control m-input" name="we_find_introduce" id="we_find_introduce" required  value="{{ old('we_find_introduce') ? old('we_find_introduce') : $culturalCompany->we_find_introduce }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <a href="{!! action('Admin\CulturalCompanyController@index') !!}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-accent" style="width: 120px;">
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
