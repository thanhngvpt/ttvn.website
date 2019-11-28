@extends('pages.web.layouts.app')

@section('title-navbar')
	Giới thiệu tập đoàn
@endsection

@section('body-class')
class="background-white"
@endsection
@section('content')
	<div id="introduce-page">
    <div class="container">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link @if($type == 'ttvn') active @endif" data-toggle="tab" href="#company">Về TTVN Group</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if($type == 'leader') active @endif" data-toggle="tab" href="#leader">Ban lãnh đạo</a>
        </li>
      </ul>
    </div>
      
    <div class="tab-content">
      <div class="tab-pane @if($type == 'ttvn') active @endif" id="company">
        <div class="container">
          <div class="title-border-bottom">
            {{$introduce->title_introduce}}
          </div>
        </div>
        <div class="introduce-general">
          <div class="container">
            <div class="row position-relative">
              <div class="col-md-4">
                <div class="img-introduce">
                  <img src="{!! $introduce->present()->contentImage()->present()->url !!}" />
                </div>
              </div>
              <div class="col-md-4">
                <p>{{$introduce->content}}</p>
              </div>
              <div class="col-md-4">
                  <p>{{$introduce->content2}}</p>
              </div>
              <div class="view-more-intro clearfix">
                <div class="float-left">Xem tiếp</div>
                <div class="float-right">
                  <img src="{{ asset('images/icon-show-more.png') }}" class="img-fluid" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="content-page">
          <div class="cultural-job">
            <div class="column-left column-text">
              <div class="title-border-bottom">
                Tầm nhìn - Sứ mệnh
              </div>
              <div class="des-cultural-job">
                <p>{{$introduce->mission}}</p>
              </div>	
            </div>
            <div class="column-right column-image">
              <img src="{!! $introduce->present()->missionImage()->present()->url !!}" class="img-fluid">
            </div>
          </div>
          <div class="primary-value-slide">
            @foreach($save_values as $save_value)
            <div class="item-slide">
                <div class="cultural-job">
                  <div class="column-left column-image">
                    <img src="{!! $save_value->present()->coverImage()->present()->url !!}" class="img-fluid">
                  </div>
                  <div class="column-right column-text">
                    <div class="title-border-bottom">
                    Giá trị cốt lõi
                    </div>
                    <nav>
                    <div class="nav nav-tabs" id="nav-tab">
                      <a class="nav-item nav-link active" data-toggle="tab" href="#nav-value-1" role="tab">{{$save_value->value}}</a>
                    </nav>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-value-1" role="tabpanel">
                      <div class="des-cultural-job">
                        <p>{{$save_value->content}}</p>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <div class="history-develop">
          <div class="container">
            <ul class="nav nav-tabs">
              @foreach($histories as $key => $history)
              <li class="nav-item">
                <a class="nav-link @if ($key == 0) active @endif" data-toggle="tab" href="#2012">{!!  date('Y', (strtotime( $history->date_start))) !!}</a>
              </li>
              @endforeach
            </ul>
            <div class="tab-content">
            <div class="tab-pane active" id="2012">
              <div class="title-history-develop">
                Lịch sử phát triển
              </div>
              <div class="history-slide">
                @foreach($histories as $history)
                <div class="item-slide">
                  <div class="item-history-slide">
                    <div class="text-history-slide">
                      {!! $history->content !!}
                    </div>
                    <div class="img-history-slide">
                      <img src="{!! $history->present()->coverImage()->present()->url !!}" class="img-fluid" />
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            <div class="tab-pane" id="2013"></div>
            <div class="tab-pane" id="2015"></div>
            </div>
          </div>
        </div>
        <div class="partner-intro">
          <div class="title-border-bottom">
            Đối tác đồng hành
          </div>
          <div class="des-partner-intro">
            {{$introduce->content_intro}}
          </div>
          <div class="container">
            <div class="partner-slide">
              @foreach($partners as $partner)
              <div class="item-slide" onclick="location.href='{{$partner->link}}'">
                  <img src="{!! $partner->present()->coverImage()->present()->url !!}" class="img-fluid" />
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane @if($type == 'leader') active @endif" id="leader">
        <div class="container">
          <div class="title-border-bottom">
            {{$introduce->title_leader_ship}}
          </div>
          <div class="row des-leader">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              {{$introduce->overview_intro}}
            </div>
            <div class="col-md-4">
              {{$introduce->overview_intro2}}
            </div>
          </div>
        </div>
        <div class="list-member">
          <div class="bg-list-member"></div>
          <div class="container">
            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-8">
                <div class="leader-slide">
                  @foreach($leader_ships as $key => $leader_ship)
                  @if ($key % 4 == 0)
                  <div class="item-slide">
                  @endif
                  @if ($key % 2 == 0)
                    <div class="row-leader">
                    @endif
                      <div class="item-leader-slide" data-toggle="modal" data-target="#show-detail-leader-{{$leader_ship->id}}">
                        <img src="{!! $leader_ship->present()->coverImage()->present()->url !!}" class="img-fluid" />
                        <div class="info-leader">
                          <div class="name-leader">
                            {{$leader_ship->name}}
                          </div>
                          <div class="role-company">
                              {{$leader_ship->position}}
                          </div>
                        </div>
                      </div>
                    @if ($key % 2 ==  1)
                    </div>
                    @endif
                    @if ($key % 4 == 3)
                  </div>
                  @endif
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="list-member-mb">
          <div class="leader-slide-mb">
            @foreach($leader_ships as $leader_ship)
            <div class="item-slide">
              <div class="row-leader">
                <div class="item-leader-slide" data-toggle="modal" data-target="#show-detail-leader-{{$leader_ship->id}}">
                  <img src="{!! $leader_ship->present()->coverImage()->present()->url !!}" class="img-fluid" />
                  <div class="info-leader">
                    <div class="name-leader">
                      {{$leader_ship->name}}
                    </div>
                    <div class="role-company">
                        {{$leader_ship->position}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        @foreach($leader_ships as $leader_ship)
        <div class="modal" id="show-detail-leader-{{$leader_ship->id}}">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <div class="img-detail-list">
                  <img src="{!! $leader_ship->present()->coverImage()->present()->url !!}" class="img-fluid" />
                </div>
                <div class="info-leader">
                  <div class="name-leader">
                    {{$leader_ship->name}}
                  </div>
                  <div class="role-compay">
                      {{$leader_ship->position}}
                  </div>
                  <div class="detail-leader">
                    <p>{{$leader_ship->file_text}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection

@section('page-styles')
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
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

        $('.leader-slide-mb').slick({
  				slidesToShow: 1,
          slidesToScroll: 1,
          dots: true,
          arrows: false
  			});

        $('.primary-value-slide').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: false,
          prevArrow: '<img src="{{ asset("images/left-slide.png") }}" class="img-fluid prev-arrow" />',
  				nextArrow: '<img src="{{ asset("images/right-slide.png") }}" class="img-fluid next-arrow" />',
          responsive: [
					{
						breakpoint: 1399,
						settings: {
              prevArrow: '<img src="{{ asset("images/arrow-left-new.svg") }}" class="img-fluid prev-arrow" />',
  				    nextArrow: '<img src="{{ asset("images/arrow-right-new.svg") }}" class="img-fluid next-arrow" />',
						}
					}
				]
        });
		});
	</script>
@endsection