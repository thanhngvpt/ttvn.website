＠extends('pages.admin.metronic.layout.application',['menu' => '{{$viewFolder}}'] )

＠section('metadata')
＠stop

＠section('styles')
    <style>
        .row {
            margin-bottom: 15px;
        }
    </style>
＠stop

＠section('scripts')
    <script src="｛!! \URLHelper::asset('libs/metronic/demo/default/custom/crud/forms/validation/form-controls.js', 'admin') !!}"></script>
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
＠stop

＠section('title')
    {{$modelName}} | Admin | ｛{ config('site.name') }}
＠stop

＠section('header')
    {{$modelName}}
＠stop

＠section('breadcrumb')
    <li class="m-nav__separator"> / </li>
    <li class="m-nav__item">
        <a href="｛!! action('Admin\{{$modelName}}Controller@index') !!}" class="m-nav__link">
            {{$modelName}}
        </a>
    </li>

    ＠if( $isNew )
        <li class="m-nav__separator"> / </li>
        <li class="m-nav__item">
            New Record
        </li>
    ＠else
        <li class="m-nav__separator"> / </li>
        <li class="m-nav__item">
            ｛{ ${{$objectName}}->id }}
        </li>
    ＠endif
＠stop

＠section('content')
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
                        <a href="｛!! action('Admin\{{$modelName}}Controller@index') !!}" class="btn m-btn--pill m-btn--air btn-secondary btn-sm" style="width: 120px;">
                            ＠lang('admin.pages.common.buttons.back')
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="m-portlet__body">
            ＠if(isset($errors) && count($errors))
                ｛{ $errs = $errors->all() }}
                <div class="m-alert m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <strong>
                        Error !!!
                    </strong>
                    <ul>
                        ＠foreach($errs as $error)
                            <li>｛{ $error }}</li>
                        ＠endforeach
                    </ul>
                </div>
            ＠endif

            <form class="m-form m-form--fit" action="＠if($isNew)｛!! action('Admin\{{$modelName}}Controller@store') !!}＠else｛!! action('Admin\{{$modelName}}Controller@update', [${{$objectName}}->id]) !!}＠endif" method="POST">
                ＠if( !$isNew ) <input type="hidden" name="_method" value="PUT"> ＠endif
                ｛!! csrf_field() !!}

                <div class="m-portlet__body" style="padding-top: 0;">
                    @foreach($columns as $column)
                        @if( ($column['name'] == 'id') )
                            @continue;
                        @elseif( ends_with($column['name'], 'image_id') )
                            @php $relation = substr(camel_case('cover_image_id'), 0, strlen(camel_case('cover_image_id')) - 2); @endphp
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row" style="max-width: 500px;">
                                        ＠if( !empty(${{$objectName}}->present()->{{$relation}}()) )
                                        <img id="cover-image-preview" style="max-width: 100%;" src="｛!! ${{$objectName}}->present()->{{$relation}}()->present()->url !!}" alt="" class="margin"/>
                                        ＠else
                                        <img id="cover-image-preview" style="max-width: 100%;" src="｛!! \URLHelper::asset('img/no_image.jpg', 'common') !!}" alt="" class="margin"/>
                                        ＠endif
                                        <input type="file" style="display: none;" id="cover-image" name="cover-image">
                                        <p class="help-block" style="font-weight: bolder; display: block; width: 100%; text-align: center;">
                                            ＠lang('admin.pages.{{$viewFolder}}.columns.{{$column['name']}}')
                                            <label for="cover-image" style="font-weight: 100; color: #549cca; margin-left: 10px; cursor: pointer;">＠lang('admin.pages.common.buttons.edit')</label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @elseif( $column['type'] == 'StringType' )
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row ＠if ($errors->has('{{$column['name']}}')) has-danger ＠endif">
                                        <label for="{{$column['name']}}">＠lang('admin.pages.{{$viewFolder}}.columns.{{$column['name']}}')</label>
                                        <input type="text" class="form-control m-input" name="{{$column['name']}}" id="{{$column['name']}}" required placeholder="＠lang('admin.pages.{{$viewFolder}}.columns.{{$column['name']}}')" value="｛{ old('{{$column['name']}}') ? old('{{$column['name']}}') : ${{$objectName}}->{{$column['name']}} }}">
                                    </div>
                                </div>
                            </div>
                        @elseif( ($column['type'] == 'IntegerType') || ($column['type'] == 'BigIntType') )
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row ＠if ($errors->has('{{$column['name']}}')) has-danger ＠endif">
                                        <label for="{{$column['name']}}">＠lang('admin.pages.{{$viewFolder}}.columns.{{$column['name']}}')</label>
                                        <input type="number" min="0" class="form-control m-input" name="{{$column['name']}}" id="{{$column['name']}}" required placeholder="＠lang('admin.pages.{{$viewFolder}}.columns.{{$column['name']}}')" value="｛{ old('{{$column['name']}}') ? old('{{$column['name']}}') : ${{$objectName}}->{{$column['name']}} }}">
                                    </div>
                                </div>
                            </div>
                        @elseif( $column['type'] == 'BooleanType' )
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group m-form__group row ＠if ($errors->has('{{$column['name']}}')) has-danger ＠endif">
                                        <label for="{{$column['name']}}" class="label-switch">＠lang('admin.pages.{{$viewFolder}}.columns.{{$column['name']}}')</label>
                                        <span class="m-switch m-switch--outline m-switch--icon m-switch--primary">
                                            <label>
                                                <input type="checkbox" id="{{$column['name']}}" name="{{$column['name']}}" value="1" ＠if( ${{$objectName}}->{{$column['name']}}) checked ＠endif>
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @elseif( $column['type'] == 'TextType' )
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row ＠if ($errors->has('{{$column['name']}}')) has-danger ＠endif">
                                        <label for="{{$column['name']}}">＠lang('admin.pages.{{$viewFolder}}.columns.{{$column['name']}}')</label>
                                        <textarea name="{{$column['name']}}" id="{{$column['name']}}" class="form-control m-input" rows="3" placeholder="＠lang('admin.pages.{{$viewFolder}}.columns.{{$column['name']}}')">｛{ old('{{$column['name']}}') ? old('{{$column['name']}}') : ${{$objectName}}->{{$column['name']}} }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @elseif( $column['type'] == 'DateTimeType' )
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-form__group row input-group date ＠if ($errors->has('{{$column['name']}}')) has-danger ＠endif">
                                        <label for="{{$column['name']}}" class="label-datetimepicker">＠lang('admin.pages.{{$viewFolder}}.columns.{{$column['name']}}')</label>
                                        <input type="text" class="form-control m-input datetime-picker" readonly="" placeholder="Select date &amp; time" id="{{$column['name']}}" name="{{$column['name']}}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o glyphicon-th"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <a href="｛!! action('Admin\{{$modelName}}Controller@index') !!}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-accent" style="width: 120px;">
                                    ＠lang('admin.pages.common.buttons.cancel')
                                </a>
                                <button type="submit" class="btn m-btn--pill m-btn--air btn-primary m-btn m-btn--custom" style="width: 120px;">
                                    ＠lang('admin.pages.common.buttons.save')
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
＠stop
