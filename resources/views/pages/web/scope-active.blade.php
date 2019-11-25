@extends('pages.web.layouts.app')

@section('title-navbar')
	Lĩnh vực hoạt động
@endsection

@section('body-class')
class="background-white"
@endsection

@section('content')
	<div id="field-page">
    <div class="container">
      <ul class="nav nav-tabs">
        @foreach ($fields as $key => $field)
        <li class="nav-item field-tab-click" data-field-id="{{$field->id}}">
          <a class="nav-link @if($key==0) active @endif" data-toggle="tab" href="#field-tab-{{$field->id}}">{{$field->name}}</a>
        </li>
        @endforeach
      </ul>
    </div>
    <div class="tab-content">
      @foreach($fields as $field)
      <div class="tab-pane active" id="field-tab-{{$field->id}}">
        <div class="tech-intro">
          <div class="tech-left">
            <div class="title-border-bottom">
              {{$field->title}}
            </div>
            <div class="des-tech-intro">
              <p>{{$field->content}}</p>
            </div>
          </div>
          <div class="tech-right">
            <img src="{!! $field->present()->coverImage()->present()->url !!}" class="img-fluid" />
          </div>
        </div>
        <div class="tech-frame">
          <div class="container">
            <div class="tech-list">
              <div class="tech-column-one">
                <div class="tech-item">
                  <div class="tech-line"></div>
                  <img src="{!! $field->present()->icon1Image()->present()->url !!}" class="img-fluid" />
                  <div class="tech-item-title">
                    {{$field->charact_1}}
                  </div>
                  <div class="tech-item-des">
                      {{$field->des_1}}
                  </div>
                </div>
                <div class="tech-item tech-item-down">
                  <div class="tech-line"></div>
                  <img src="{!! $field->present()->icon2Image()->present()->url !!}" class="img-fluid" />
                  <div class="tech-item-title">
                      {{$field->charact_2}}
                  </div>
                  <div class="tech-item-des">
                      {{$field->des_2}}
                  </div>
                </div>
              </div>
              <div class="tech-column-two">
                <div class="tech-item">
                  <div class="tech-line"></div>
                  <img src="{!! $field->present()->icon3Image()->present()->url !!}" class="img-fluid" />
                  <div class="tech-item-title">
                      {{$field->charact_3}}
                  </div>
                  <div class="tech-item-des">
                      {{$field->des_3}}
                  </div>
                </div>
              </div>
              <div class="tech-column-three">
                <img src="{!! $field->present()->cover2Image()->present()->url !!}" class="img-fluid" />
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
@endsection

@section('content-after')
  <main>
    <div class="field-project">
      <div class="title-field-project">
        Dự án
      </div>
      <div class="content-page">
        <div class="slide-projects">
          @foreach($projects as $project)
          <a href="#" class="item-news">
            <div class="img-news">
              <img src="{!! $project->present()->coverImage()->present()->url !!}" class="img-fluid" />
            </div>
            <div class="content-news">
              <div class="title-news">
                {{$project->name}}
              </div>
              <div class="des-news">
                  {{$project->address}}
              </div>
            </div>
          </a>
          @endforeach
        </div>
      </div>
    </div>
  </main>
@endsection

@section('page-styles')
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
  <style>
    .navbar-top-area {
      background-image: url({{ asset('images/bg-scope-active.png') }});
    }
    .navbar-top-area .title-page {
      color: #ffffff;
    }
    .page-content {
      background-image: url('../images/bg-scope-active.png');
	    background-repeat: no-repeat;
      background-position: bottom right;
      background-color: #f7f7f7;
      background-size: cover;
    }
    .navbar-top-area {
      background-image: none;
    }

    @media screen and (min-width: 1024px) and (max-width: 1439px) {
      .item-news .title-news {
        font-size: 16px;
        line-height: 25px;
        margin-bottom: 16px;
      }
      .field-project {
        padding-bottom: 48px;
      }
      .slick-dots {
        display: none !important;
      }
    }

    @media screen and (max-width: 1023px) and (min-width: 768px) {
      #field-page .tech-frame {
        overflow: hidden;
        padding-bottom: 0px;
      }
    }
    
    @media screen and (max-width: 767px) {
      .field-project {
        padding-bottom: 100px;
      }
      .field-project .title-field-project {
        font-size: 24px;
        line-height: 36px;
        margin-bottom: 24px;
      }
      .content-page {
        width: 100%;
      }
      main .prev-arrow {
        left: 0;
        z-index: 2;
      }
      main .next-arrow {
        right: 0;
        z-index: 2;
      }
      .slick-dotted.slick-slider {
        margin-bottom: 0;
      }
    }
  </style>
@endsection

@section('page-scripts')
	<script src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
  			$('.history-slide').slick({
  				infinite: true,
  				slidesToShow: 1,
  				slidesToScroll: 1,
  				prevArrow: '<img src="{{ asset("images/icon-left-develop.png") }}" class="img-fluid prev-arrow" />',
  				nextArrow: '<img src="{{ asset("images/icon-right-develop.png") }}" class="img-fluid next-arrow" />'
        });
        
        $('.partner-slide').slick({
  				slidesToShow: 6,
          slidesToScroll: 3,
          dots: true
        });
        
        $('.leader-slide').slick({
  				slidesToShow: 1,
          slidesToScroll: 1,
          dots: true
  			});

        $('.slide-projects').slick({
          infinite: true,
          slidesToShow: 3,
          slidesToScroll: 1,
          dots: true,
          prevArrow: '<img src="{{ asset("images/arrow-left-ad.svg") }}" class="img-fluid prev-arrow" />',
          nextArrow: '<img src="{{ asset("images/arrow-right-ad.svg") }}" class="img-fluid next-arrow" />',
          responsive: [
					{
						breakpoint: 1023,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2
						}
					},
					{
						breakpoint: 767,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
				]
        });

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
        })

        $(document).on('click', '.field-tab-click', function() {
          let field_id = $(this).data('field-id');
          
          $.ajax({
            url: "{{action('Web\ScopeActiveController@getProjects')}}",
            type: "GET",
            data: {
              _token: "{!! csrf_token() !!}",
              field_id: field_id
            },
            success: function (res) {
              $('.content-page').html(res)
              $('.slide-projects').not('.slick-initialized').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                dots: true,
                prevArrow: '<img src="{{ asset("images/arrow-left-ad.svg") }}" class="img-fluid prev-arrow" />',
                nextArrow: '<img src="{{ asset("images/arrow-right-ad.svg") }}" class="img-fluid next-arrow" />',
                responsive: [
                {
                  breakpoint: 1023,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 767,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
              ]
              });
            }
          });
        })
		});
	</script>
@endsection