@extends('pages.web.layouts.app')

@section('nav-header')
@endsection

@section('nav-slide')
<main>
  <div class="top-page-slide">
    @if (!empty($video))
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
            <button class="btn btn-success">
              <img src="{{ asset('images/view-video.png') }}" class="img-fluid" />
              <span><a href="{{$video->video_url}}">Xem video</a></span>
            </button>
          </div>
          <div class="img-top-slide">
            <iframe width="648" height="490" src="{{$video->video_url}}" frameborder="0"/></iframe>
          </div>
        </div>
      </div>
    @else
      @foreach($banners as $banner)
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
              <img src="{!! $banner->present()->coverImage()->present()->url !!}" class="img-fluid" />
            </div>
          </div>
        </div>
      @endforeach
    @endif
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
            <div class="col-md-4" onclick="location.href='{!! action('Web\ScopeActiveController@index', $field->slug) !!}'">
              <div class="item-top-field">
                <div class="img-topfield">
                  <img src="{!! $field->present()->homeImage()->present()->url !!}" class="img-fluid">
                </div>
                <a class="title-topfield" href="#">
                  {{$field->name}}
                  <img src="{{ asset('images/arrow-right-active-new.svg') }}" class="img-fluid" />
                </a>
                <div class="des-topfield">
                  {{$field->home_content}}
                </div>
              </div>
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
            <a href="#" class="btn btn-outline-success">
              Xem thêm
              <img src="{{ asset('images/arrow-right-active-new.svg') }}" class="img-fluid ml-2" />
            </a>
          </div>
          <div class="img-top-intro">
            <img src="{!! $inforGroup->present()->coverImage()->present()->url !!}" class="img-fluid img-intro-after" />
            <img src="{!! $inforGroup->present()->thumbnailImage()->present()->url !!}" class="img-fluid img-intro-before" />
          </div>
        </div>
        <div class="top-sumarry">
          <div class="row">
            @foreach($dataHighlights as $dataHighlight)
            <div class="col-md-3">
              <div class="col-top-sumary">
                <img src="{!! $dataHighlight->present()->coverImage()->present()->url !!}" class="img-fluid" />
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
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane container active" id="tab_all">
              <div class="slide-top-news">
                @foreach($news as $item)
                <a href="{{action('Web\NewsController@details', $item->slug)}}" class="item-news">
                  <div class="img-news">
                    <img src="{!! $item->present()->coverImage()->present()->url !!}" class="img-fluid" />
                  </div>
                  <div class="content-news">
                    <div class="cate-news">
                      {{$item->newCategory->name}}
                    </div>
                    <div class="title-news">
                      {{$item->name}}
                    </div>
                    <div class="date-news">
                        {!!  date('d/m/Y', (strtotime( $item->created_at))) !!}
                    </div>
                  </div>
                </a>
                @endforeach
              </div>
              <div class="text-center">
                <a href="{{action('Web\NewsController@index')}}" class="btn btn-outline-success btn-see-more-news">
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
      <div class="top-partners">
        <div class="container">
          <div class="partner-intro">
            <div class="title-border-bottom">
                {{$heading->title_company}}
            </div>
            <div class="container">
              <div class="partner-slide">
                @foreach ($companies as $company)
                <div class="item-slide">
                  <img src="{!! $company->present()->coverImage()->present()->url !!}" class="img-fluid" />
                </div>
                @endforeach
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
        <form action="" method="">
          <div class="form-consultation">
            <input type="email" name="email" placeholder="Email" class="form-control" />
            <input type="text" name="phone" placeholder="Số điện thoại" class="form-control" />
            <button type="submit" class="btn">
              Gửi
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('page-styles')
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
  <style>
    .navbar-top-area {
      background-image: url('../images/bg-header-home.svg');
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
  </style>
@endsection

@section('page-scripts')
	<script src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
      $('.top-page-slide').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false
      });
		});

    $(document).ready(function(){
      $('.slide-top-news').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<img src="{{ asset("images/arrow-left-ad.svg") }}" class="img-fluid prev-arrow" />',
        nextArrow: '<img src="{{ asset("images/arrow-right-ad.svg") }}" class="img-fluid next-arrow" />',
        responsive: [
					{
						breakpoint: 1023,
						settings: {
              slidesToShow: 2
						}
					},
          {
						breakpoint: 767,
						settings: {
              slidesToShow: 1
						}
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
						settings: {
              slidesToShow: 4
						}
					},
          {
						breakpoint: 767,
						settings: {
              slidesToShow: 3
						}
					}
        ]
      });
    });
    $(document).ready(function() {
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
                responsive: [
                  {
                    breakpoint: 1023,
                    settings: {
                      slidesToShow: 2
                    }
                  },
                  {
                    breakpoint: 767,
                    settings: {
                      slidesToShow: 1
                    }
                  }
                ]
              });
          }
        });
      })
    })
	</script>
@endsection
