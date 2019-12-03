@extends('pages.web.layouts.app')
@section('title')
@foreach ($meta as $item)
    <?php 
    $url = trim( $item->link, "/" );
    ?>
	@if(Request::url() === $url)
		{{$item->meta_title}}
	@endif	
@endforeach
@endsection
@section('nav-header')
@endsection

@section('nav-slide')
<main class="position-relative">
    <div class="top-page-slide">
        {{-- @if (!empty($video))
        <div class="item-slide">
            <div class="item-top-slide">
                <div class="text-slide">
                    <div class="title">Tập đoàn</div>
                    <div class="content">Trường Thành Việt Nam</div>
                    <div class="description">
                        Quy tụ <span>nhân tài</span>, gắn kết <span>nhân tâm</span>, nâng tầm <span>trí tuệ</span> và chia sẻ <span>thành công</span>
                    </div>
                    <a href="{{$video->video_url}}" class="btn btn-success" style="margin-bottom: 60px;">
                        <img src="{{ asset('images/view-video.svg') }}" class="img-fluid" />
                        <span>Xem video</span>
                    </a>
                </div>
                <div class="img-top-slide">
                    @if(!empty($video->present()->coverImage()))
                    <img src="{!! $video->present()->coverImage()->present()->url !!}" class="img-fluid" /> @endif
                </div>
            </div>
        </div>
        @endif --}}

        <div class="item-slide">
            <div class="item-top-slide">
                <div class="text-slide">
                    <div class="title">Tập đoàn</div>
                    <div class="content">Trường Thành Việt Nam</div>
                    <div class="description">
                        Quy tụ <span>nhân tài</span>, gắn kết <span>nhân tâm</span>, nâng tầm <span>trí tuệ</span> và chia sẻ <span>thành công</span>
                    </div>
                    @if (!empty($video))
                    <a href="{{$video->video_url}}" class="btn btn-success" style="display: none">
                        <img src="{{ asset('images/view-video.svg') }}" class="img-fluid" />
                        <span>Xem video</span>
                    </a>
                    @endif
                    <div class="top-page-slider-dots"></div>
                </div>
                <div class="img-top-slide">
                    <div class="top-bg"></div>
                    <div class="top-slider">
                        @if (!empty($video))
                            <img src="{!! $video->present()->coverImage()->present()->url !!}" class="img-fluid item-video"/>
                        @endif
                        @foreach($banners as $banner)
                            <img src="{!! $banners->first()->present()->coverImage()->present()->url !!}" class="img-fluid" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        {{-- @foreach($banners as $banner)
            <div class="item-slide">
                <div class="item-top-slide">
                    <div class="text-slide">
                        <div class="title">
                            Tập đoàn
                        </div>
                        <div class="content">
                            Trường Thành Việt Nam
                        </div>
                        <div class="description">
                            Quy tụ <span>nhân tài</span>, gắn kết <span>nhân tâm</span>, nâng tầm <span>trí tuệ</span> và chia sẻ <span>thành công</span>
                        </div>
                    </div>
                    <div class="img-top-slide">
                        @if(!empty($banner->present()->coverImage()))
                        <img src="{!! $banner->present()->coverImage()->present()->url !!}" class="img-fluid" /> @endif
                    </div>
                </div>
            </div>
        @endforeach --}}

    </div>
    <div class="icon-down-nav">
        <img src="{{ asset('images/icon-down-nav.svg') }}" class="img-fluid" />
    </div>
</main>
@endsection 

@section('body-class') 
    class="background-white" 
@endsection 

@section('content')
<div id="top-page">
    <div class="top-field">
        <div class="container">
            <div class="title-top-field">
                {{$heading->title_heading}}
            </div>
            <div class="des-top-field">
                {{$heading->heading_description}}
            </div>
            <div class="list-top-field">
                <div class="row">
                    @foreach($fields as $field)
                    <div class="col-md-4">
                        <a class="item-top-field" href="{!! action('Web\ScopeActiveController@index', $field->slug) !!}">
                            <div class="img-topfield">
                                @if(!empty($field->present()->homeImage()))
                                <img src="{!! $field->present()->homeImage()->present()->url !!}" class="img-fluid"> @endif
                            </div>
                            <div class="title-topfield">
                                {{$field->name}}
                                <img src="{{ asset('images/arrow-right-active-new.svg') }}" class="img-fluid" />
                            </div>
                            <div class="des-topfield">
                                {{$field->home_content}}
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="top-content">
        <div class="container">
            <div class="top-intro">
                <div class="text-top-intro">
                    <div class="title-1">
                        TẬP ĐOÀN
                    </div>
                    <div class="name">
                        TRƯỜNG THÀNH
                    </div>
                    <div class="title-2">
                        VIỆT NAM
                    </div>
                    <div class="description">
                        <p>{{$inforGroup->description}}</p>
                    </div>
                    <a href="{{action('Web\IntroduceCompanyController@index', 'ttvn')}}" class="btn btn-outline-success">
              Xem thêm
              <img src="{{ asset('images/arrow-right-active-new.svg') }}" class="img-fluid ml-2 btn-no-hover" />
              <img src="{{ asset('images/arrow-right-hover-new.svg') }}" class="img-fluid ml-2 btn-hover" />
            </a>
                </div>
                <div class="img-top-intro">
                    @if(!empty($inforGroup->present()->thumbnailImage()))
                    <img src="{!! $inforGroup->present()->thumbnailImage()->present()->url !!}" class="img-fluid img-intro-after" /> @endif @if(!empty($inforGroup->present()->coverImage()))
                    <img src="{!! $inforGroup->present()->coverImage()->present()->url !!}" class="img-fluid img-intro-before" /> @endif
                </div>
            </div>
            <div class="top-sumarry">
                <div class="row">
                    @foreach($dataHighlights as $dataHighlight)
                    <div class="col-md-3">
                        <div class="col-top-sumary">
                            @if(!empty($dataHighlight->present()->coverImage()))
                                <div class="top-summary-thumb">
                                    <img src="{!! $dataHighlight->present()->coverImage()->present()->url !!}" class="img-fluid" /> 
                                </div>
                            @endif
                            <div class="number">
                                {{$dataHighlight->data}}
                            </div>
                            <div class="name">
                                {{$dataHighlight->title}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="top-news">
                <div class="title-top-news">
                    {{$heading->title_news}}
                </div>
                <div class="area-nav-news">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" data-category-id="0" href="#tab_all">Tất cả</a>
                        </li>
                        @foreach ($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link list-category-news" data-toggle="tab" data-category-id="{{$category->id}}" href="#cate-{{$category->id}}">{{$category->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane container active" id="tab_all">
                        <div class="area-top-news">
                            <div class="slide-top-news">
                                @foreach($news as $item)
                                <a href="{{action('Web\NewsController@details',[$item->newCategory->slug, $item->slug])}}" class="item-news">
                                    <div class="wrapper">
                                        <div class="img-news">
                                            @if(!empty($item->present()->coverImage()))
                                            <img src="{!! $item->present()->coverImage()->present()->url !!}" class="img-fluid" /> @endif
                                        </div>
                                        <div class="content-news">
                                            <div class="cate-news">
                                                {{@$item->newCategory->name}}
                                            </div>
                                            <div class="title-news">
                                                {{$item->name}}
                                            </div>
                                            <div class="date-news">
                                                {!! date('d/m/Y', (strtotime( $item->created_at))) !!}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="{{action('Web\NewsController@index', 'all')}}" class="btn btn-outline-success btn-see-more-news">
                  Xem tất cả
                </a>
                        </div>
                    </div>
                    @foreach ($categories as $category)
                    <div class="tab-pane container active" id="cate-{{$category->id}}"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="top-partners">
        <div class="container">
            <div class="partner-intro">
                <div class="title-border-bottom">
                    {{$heading->title_company}}
                </div>
                <div class="container">
                    <div class="area-partner-slide">
                        <div class="partner-slide">
                            @foreach ($companies as $company)
                            <div class="item-slide">
                                @if(!empty($company->present()->coverImage()))
                                <img src="{!! $company->present()->coverImage()->present()->url !!}" class="img-fluid" /> @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="top-consultation">
        <div class="title">
            {{$heading->title_support}}
        </div>
        <div class="description">
            {{$heading->support_description}}
        </div>
        {!! Form::open(['action' => 'Web\ContactController@index', 'class' => 'form-consultation', 'method' => 'POST']) !!}
            <input type="email" name="email" id="email" placeholder="Email" class="form-control" />
            <input type="text" name="phone" id="phone" placeholder="Số điện thoại" class="form-control" />
            <button type="submit" id="submit" class="btn">Gửi</button>
        {!! Form::close() !!}
    </div>
</div>
@endsection

@push('plugins')
    <link rel="stylesheet" href="/static/web/default/plugins/slick/slick.css">
    <link rel="stylesheet" href="/static/web/default/plugins/slick/slick-theme.css">
@endpush

@section('page-styles')
  <style>
    .navbar-top-area {
      background-image: url('../images/bg-header-home.svg');
    }
    a {
      color: #0060B6;
      text-decoration: none;
    }
  
    a:hover 
    {
      color:#00A0C6; 
      text-decoration:none; 
      cursor:pointer;  
    }

    @media screen and (max-width: 1023px) and (min-width: 768px) {
      .navbar-top-area {
        background-image: url('../images/bg-header-home-sm.svg');
      }
    }

    @media screen and (max-width: 767px) {
      .navbar-top-area {
        background-image: url('../images/bg-header-home-xs.svg');
      }
    }
  </style>
@endsection

@section('page-scripts')
	<script src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
	<script type="text/javascript">
        $(document).ready(function(){
            $('.top-slider').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                arrows: false,
                rows: 0,
                autoplay: false,
                autoplaySpeed: 3000,
                appendDots: '.top-page-slider-dots',
                responsive: [
                    {
                        breakpoint: 767,
                        settings: {
                            dots: false,
                            autoplay: false
                        }
                    },
                ]
            });

            function showVideo() {
                current = $('.top-slider').slick('slickCurrentSlide');
                item = $('.top-slider img.slick-active');
                $('.text-slide .btn-success').hide();
                if (item.hasClass('item-video')) {
                    $('.text-slide .btn-success').show();
                }
            }
            showVideo();
            $('.top-slider').on('afterChange', function(event, slick, current) {
                showVideo()
            })

            $('.slide-top-news').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                prevArrow: '<img src="{{ asset("images/arrow-left-ad.svg") }}" class="img-fluid prev-arrow" />',
                nextArrow: '<img src="{{ asset("images/arrow-right-ad.svg") }}" class="img-fluid next-arrow" />',
                rows: 0,
                responsive: [
                    {
                        breakpoint: 1023,
                        settings: 'unslick'
                    }
                ]
            });

            $('.partner-slide').slick({
                slidesToShow: 6,
                slidesToScroll: 3,
                dots: true,
                responsive: [
                    {
                        breakpoint: 1023,
                        settings: 'unslick'
                    }
                ]
            });

            $('.list-category-news').on('click', function() {
                let cate_id = $(this).data('category-id')
                $.ajax({
                    url: "{{action('Web\HomeController@getNewByCate')}}",
                    type: "GET",
                    data: {
                        _token: "{!! csrf_token() !!}",
                        cate_id: cate_id,
                    },
                    success: function (res) {
                        $('#cate-'+cate_id).html(res)
                        $('.slide-top-news').not('.slick-initialized').slick({
                            infinite: true,
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            prevArrow: '<img src="{{ asset("images/arrow-left-ad.svg") }}" class="img-fluid prev-arrow" />',
                            nextArrow: '<img src="{{ asset("images/arrow-right-ad.svg") }}" class="img-fluid next-arrow" />',
                            rows: 0,
                            responsive: [
                                {
                                    breakpoint: 1023,
                                    settings: 'unslick'
                                },
                            ]
                        });
                    }
                });
            })

            $('.next-arrow').mouseover(function () {
                $(this).attr('src', '{{ asset("images/arrow-right-active.svg") }}');
            })
            .mouseout(function () {
                $(this).attr('src', '{{ asset("images/arrow-right-ad.svg") }}');
            })

            $('.prev-arrow').mouseover(function () {
                $(this).attr('src', '{{ asset("images/arrow-left-active.svg") }}');
            })
            .mouseout(function () {
                $(this).attr('src', '{{ asset("images/arrow-left-ad.svg") }}');
            });

            $('.form-consultation').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData($('.form-consultation')[0]);
                formData.append('form_from_home', 1);

                $.ajax({
                    url: "{!! action('Web\ContactController@index') !!}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (res) {
                        console.log(res)
                        $('.form-consultation')[0].reset();
                        $('#email').val("");
                        $('#phone').val("");
                        let message = document.createElement("message");
                            message.innerHTML='Thông tin của bạn đã được gửi <br> Chúng tôi sẽ liên hệ tư vấn với bạn trong thời gian sớm nhất'
                        Swal.fire('Thành công!', message, 'success')
                    },
                    error: function(response) {
                        Swal.fire('Lỗi!', 'Vui lòng nhập đầy đủ thông tin và thử lại!', 'error')
                    }
                });
            })
        });
	</script>
@endsection
