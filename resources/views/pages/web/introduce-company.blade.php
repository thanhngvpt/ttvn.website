@extends('pages.web.layouts.app')

@section('title-navbar')
	<div class="container">
        Giới thiệu tập đoàn
    </div>
@endsection


@section('nav-header')
	@include('pages.web.partials.title-style-introduce', ['content' => 'Giới thiệu tập đoàn'])
@endsection

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

@section('body-class')
class="background-white introduce-page"
@endsection
@section('content')
	<div id="introduce-page">
        <div class="tab-controls">
            <div class="container">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link @if($type == 'ttvn') active @endif" id="company-tab" data-toggle="tab" href="#company">Về TTVN Group</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($type == 'leader') active @endif" id="leader-tab" data-toggle="tab" href="#leader">Ban lãnh đạo</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content">
            <div class="tab-pane @if($type == 'ttvn') active @endif" id="company" aria-labelledby="company-tab">
                <div class="section section-intro section-intro-common">
                    <div class="section-head">
                        <div class="container">
                            <h2 class="section-title title-border-bot">{{$introduce->title_introduce}}</h2></div>
                    </div>

                    <div class="section-body">
                        <div class="common-intro-summary">
                            <div class="thumb-introduce">
                                @if(!empty($introduce->present()->contentImage()))
                                <img src="{!! $introduce->present()->contentImage()->present()->url !!}" />
                                @endif
                            </div>
                            <div class="container">
                                <div class="container-wrapper">
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-4 col-intro-summary">
                                            <p>{{$introduce->content}}</p>

                                            <a href="#" class="view-more-intro link-scrollto" data-target=".section-mission">
                                                <div class="view-more-wrapper">
                                                    <div class="view-more-text">Xem tiếp</div>
                                                    <img src="{{ asset('images/introduce/show-more.svg') }}" class="img-fluid view-more-icon" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 col-intro-summary">
                                            <p>{{$introduce->content2}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-footer"></div>
                </div>

                <div class="section section-intro section-mission">
                    <div class="section-head">
                        <div class="container">
                            <h2 class="section-title title-border-bot">Tầm nhìn - Sứ mệnh</h2>
                        </div>
                    </div>
                    <div class="section-body">
                        <div class="container wrapper">
                            <div class="mission-col mission-col-info">
                                <div class="info-summary">
                                    <h2 class="section-title title-border-bot">Tầm nhìn - Sứ mệnh</h2>
                                    <div class="mission-desc">
                                        <p>{{$introduce->mission}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mission-col mission-col-thumb">
                                @if(!empty($introduce->present()->missionImage()))
                                <img src="{!! $introduce->present()->missionImage()->present()->url !!}" class="img-fluid">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section section-intro section-core-values">
                    <div class="section-body">
                        <div class="container wrapper">
                            <div class="mission-col mission-col-info">
                                <div class="info-summary">
                                    <div class="section-head">
                                        <h2 class="section-title title-border-bot">Giá trị cốt lõi</h2>
                                        <div class="slide-control-single slide-control-head">
                                            <button class="btn btn-slick-head" data-action="slickPrev">
                                                <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M21 8H1" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8 15L1 8L8 1" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </button>

                                            <button class="btn btn-slick-head" data-action="slickNext">
                                                <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 8H21" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M14 1L21 8L14 15" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="values-container">
                                        <div class="values-title">
                                            @foreach($save_values as $save_value)
                                            <div class="title-item @if($loop->first) active @endif">{{ $save_value->value }}</div>
                                            @endforeach
                                        </div>

                                        <div class="values-content">
                                            <div class="values-content-slider">
                                                @foreach($save_values as $save_value)
                                                <div class="content-item">
                                                    {{ $save_value->content }}
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-control-single slide-control-body">
                                    <button class="btn btn-slick-head" data-action="slickPrev">
                                        <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21 8H1" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8 15L1 8L8 1" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>

                                    <button class="btn btn-slick-head" data-action="slickNext">
                                        <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 8H21" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M14 1L21 8L14 15" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="slick-control-alone control-next">
                                    <button class="btn btn-slick-control" data-action="slickNext">
                                        <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 8H21" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M14 1L21 8L14 15" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="mission-col mission-col-thumb">
                                <div class="col-wrapper">
                                    <div class="values-thumb-slider">
                                        @foreach($save_values as $save_value)
                                        @if(!empty($save_value->present()->coverImage()))
                                            <img src="{!! $save_value->present()->coverImage()->present()->url !!}" class="img-fluid"> 
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="slick-control-alone control-prev">
                                    <button class="btn btn-slick-control" data-action="slickPrev">
                                        <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21 8H1" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8 15L1 8L8 1" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section section-intro section-history">
                    <div class="history-timeline">
                        <div class="timeline-list">
                            <div class="container wrapper">
                                @foreach($histories as $key => $history)
                                <div class="timeline-item item{{Illuminate\Support\Str::slug($history->date_start, '_')}}">{!! $history->date_start !!}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="timeline-bar">
                            <div class="container wrapper">
                                <div class="timeline-rounder">
                                    <div class="timeline-progress"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container wrapper">
                        <div class="section-head">
                            <h2 class="section-title">Lịch sử phát triển</h2>
                        </div>
                        <div class="section-body">
                            <div class="history-row">
                                <div class="history-col history-col-content">
                                    <div class="col-wrapper">
                                        <h2 class="section-title">Lịch sử phát triển</h2>

                                        <div class="history-content-list">
                                            <div class="history-content-slider">
                                                @foreach($histories as $key => $history)
                                                <div class="history-content-item">{!! $history->content !!}</div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="slick-append-arrows"></div>
                                    </div>
                                </div>
                                <div class="history-col history-col-thumb">
                                    <div class="col-wrapper">
                                        <div class="history-thumb-slider">
                                            @foreach($histories as $key => $history)
                                            @if(!empty($history->present()->coverImage()))
                                                <img src="{!! $history->present()->coverImage()->present()->url !!}" class="img-fluid" />
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section section-intro section-partners">
                    <div class="section-head">
                        <div class="container">
                            <h2 class="section-title">Đối tác đồng hành</h2>
                            <p class="section-subtitle">{{$introduce->content_intro}}</p>
                        </div>
                    </div>

                    <div class="section-body">
                        <div class="container">
                            <div class="partner-slider">
                                @foreach($partners as $partner)
                                    <a href="{{$partner->link ? $partner->link : 'javascript::void(0);'}}" @if($partner->link) target="_blank" @endif title="{{ $partner->name }}" class="partner-item @if(!$partner->link) cursor-normal @endif">
                                            @if(!empty($partner->present()->coverImage()))
                                        <img src="{!! $partner->present()->coverImage()->present()->url !!}" class="img-fluid" />
                                        @endif
                                    </a> 
                                @endforeach
                            </div>
                            <div class="partner-dots"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane @if($type == 'leader') active @endif" id="leader" aria-labelledby="leader-tab">
                <div class="section section-intro section-introduce-leader">
                    <div class="section-head">
                        <div class="container">
                            <div class="section-title title-border-bot">{{$introduce->title_leader_ship}}</div>
                        </div>
                    </div>

                    <div class="section-body">
                        <div class="container">
                            <div class="intro-leader-row">
                                <div class="intro-leader-col">
                                    {{$introduce->overview_intro}}
                                </div>
                                <div class="intro-leader-col">
                                    {{$introduce->overview_intro2}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section section-intro section-leaders">
                    <div class="bg-leader-out"></div>
                    <div class="container wrapper">
                        <div class="bg-leader"></div>
                        <div class="list-leaders">
                            <div class="leaders-slider">
                                @foreach($leader_ships as $key => $leader_ship)
                                    <div class="leaders-slide-item cursor-pointer" data-toggle="modal" data-target="#show-detail-leader-{{$leader_ship->id}}">
                                        <div class="item-wrapper">
                                            <div class="leaders-thumb">
                                                    @if(!empty($leader_ship->present()->coverImage()))
                                                <img src="{!! $leader_ship->present()->coverImage()->present()->url !!}" class="img-fluid" />
                                                @endif
                                            </div>

                                            <div class="leaders-info">
                                                <div class="name-leader">
                                                    {{$leader_ship->name}}
                                                </div>
                                                <div class="role-company">
                                                    {{$leader_ship->position}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="leader-dots"></div>
                        </div>
                    </div>

                    @foreach($leader_ships as $leader_ship)
                        <div class="modal modal-member-detail" id="show-detail-leader-{{$leader_ship->id}}">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M19 5L5 19" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square"/>
                                                <path d="M19 19L5 5" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square"/>
                                            </svg>
                                        </button>
                                        <div class="img-detail-list">
                                                @if(!empty($leader_ship->present()->coverImage()))
                                            <img src="{!! $leader_ship->present()->coverImage()->present()->url !!}" class="img-fluid" />
                                            @endif
                                        </div>
                                        <div class="info-leader">
                                            <div class="leader-data">
                                                <div class="name-leader">
                                                    {{$leader_ship->name}}
                                                </div>
                                                <div class="role-company">
                                                    {{$leader_ship->position}}
                                                </div>
                                            </div>
                                            <div class="detail-leader position-relative">
                                                <div class="detail-leader-content">
                                                    <p>{!! $leader_ship->file_text !!}</p>
                                                </div>
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
    </div>
@endsection

@section('page-styles')
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
    <link rel="stylesheet" href="/static/web/default/plugins/jquery.scrollbar/jquery.scrollbar.css">
@endsection

@section('page-scripts')
	<script src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="/static/web/default/plugins/jquery.scrollbar/jquery.scrollbar.js"></script>
    <script src="/static/web/default/plugins/jquery.visible/jquery.visible.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

            function resizeCommonIntroduce()
            {
                target = $('.common-intro-summary');
                targetPos = $('.thumb-introduce img');
                targetHeight = $('.section-intro-common').find('.section-footer')

                screenWidth = window.innerWidth;

                configs = {
                    1024: {
                        offsetY: 56
                    },
                    1440: {
                        offsetY: 80
                    }
                }
                offsetY = 0
                Object.keys(configs).forEach(function(size) {
                    if (screenWidth >= size) {
                        offsetY = configs[size].offsetY
                    }
                })

                if (screenWidth < 1024) {
                    targetHeight.css({height: 'auto'});
                } else {
                    blockHeight = (targetPos.height() + offsetY) - target.height()
                    newHeight = blockHeight
                    targetHeight.css({'height': newHeight + 'px'});
                }
            }

            $(window).on('resize', function() {
                resizeCommonIntroduce();
                setTimeout(resizeCommonIntroduce, 300);
            });

            resizeCommonIntroduce();


            function activeCoreValue(index) {
                $('.values-title .title-item').removeClass('active');
                $('.values-title .title-item').eq(index).addClass('active');
            };

            $('.values-content-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                arrows: false,
                infinite: false,
                rows: 0,
                asNavFor: '.values-thumb-slider'
            });

            $('.values-thumb-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                arrows: false,
                infinite: false,
                rows: 0,
                asNavFor: '.values-content-slider'
            });
            $('.values-thumb-slider, .values-content-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
                activeCoreValue(nextSlide);
            });

            $('.values-title .title-item').on('click', function(e) {
                index = $('.values-title .title-item').index($(this));
                $('.values-content-slider').slick('slickGoTo', index);
            });

            $('.btn-slick-head, .slick-control-alone .btn-slick-control').on('click', function(e) {
                e.preventDefault();
                action = $(this).attr('data-action');
                $('.values-content-slider').slick(action);
            });

            // =========== history
            $('.history-content-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                arrows: true,
                infinite: false,
                rows: 0,
                asNavFor: '.history-thumb-slider',
                appendArrows: '.slick-append-arrows',
                prevArrow: `<button class="btn-slick-rounded btn-prev"><svg viewBox="0 0 86 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="0.5" y="0.5" width="85" height="45" rx="7.5"/><path d="M45 28L41 24L45 20" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></button>`,
                nextArrow: `<button class="btn-slick-rounded btn-prev"><svg viewBox="0 0 86 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="0.5" y="0.5" width="85" height="45" rx="7.5"/><path d="M42 20L46 24L42 28" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></button>`,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            adaptiveHeight: true,
                        }
                    },
                ]
            });

            $('.history-thumb-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                arrows: false,
                infinite: false,
                rows: 0,
                asNavFor: '.history-content-slider',
            });
            
            function drawTimelineProgress(type) {
                timeBar = $('.timeline-bar');
                timeProgress = $('.timeline-progress');
                timeRounder = $('.timeline-rounder');

                currentIndex = $('.history-content-slider').slick('slickCurrentSlide');
                years = $('.timeline-list .timeline-item')

                // set active for year
                years.each((index, item) => {
                    if (index <= currentIndex) {
                        $(item).addClass('active')
                    } else {
                        $(item).removeClass('active')
                    }
                })
                
                scrollTimeline();

                _is_last_show = $('.timeline-list .timeline-item:last-child').visible()
                
                // if on mobile
                if ($(window).width() >= 768 || _is_last_show) {
                    currentIndex = currentIndex <= 0 ? 1 : currentIndex + 1
                    barItemWidth = timeRounder.width()/years.length
                    currentProgress = barItemWidth * currentIndex
                    timeProgress.css({width: (currentProgress) + 'px'});
                    return false
                }

                // calculate with bar
                setTimeout(function() {
                    _c_index = $('.history-content-slider').slick('slickCurrentSlide');
                    _c_item = $(years[_c_index]);
                    _n_item = _c_item.next('.timeline-item');
                    _n_offset = _n_item && _n_item.length ? _n_item.offset().left : 0
                    _w_item = $(_c_item).width();
                    _w_new = _n_item && _n_item.length ? _n_offset + 'px' : '100%'
                    timeProgress.css({width: _w_new});
                }, 110)
            }

            function scrollTimeline(next) {
                listYear = $('.timeline-list');
                years = listYear.find('.timeline-item');
                container = listYear.find('.container')

                currentIndex = next >= 0 ? next : $('.history-content-slider').slick('slickCurrentSlide');

                item = years[0]
                itemWidth = item.clientWidth
                itemPadding = parseInt(years.css('padding-left'));
                padding = parseInt(container.css('padding-left')) * 2;

                totalWidth = itemWidth * years.length + padding

                offsetX = (itemWidth/2) * currentIndex - itemPadding
                offsetX = currentIndex >= 0 ? offsetX : 0

                // new
                _current_item = $(years[currentIndex])
                _is_last = currentIndex == years.length - 1
                _next_item = $(_current_item).next('.timeline-item')
                _is_next_visible = _is_last ? $(_current_item).visible() : $(_next_item).visible()

                // set transform
                space = 'inherit'
                if (totalWidth < window.screenWidth) {
                    offsetX = 0
                    space = 'space-around'
                }

                if (!_is_next_visible) {
                    offsetX = $(window).width() - (itemWidth * (currentIndex+2) + padding)
                    offsetX = offsetX >= 0 ? 0 : offsetX
                    container.css({
                        transform: `translate(${offsetX}px, 0)`,
                        justifyContent: space
                    })
                    return false
                }
                
                if (currentIndex == 0) {
                    offsetX = 0
                }

                
                container.css({
                    transform: `translate(-${offsetX}px, 0)`,
                    justifyContent: space
                })
            }

            canChange = true
            drawTimelineProgress('default');

            $('.history-thumb-slider').on('afterChange', function(e, slick, currentSlide) {
                if (canChange)
                    drawTimelineProgress('change');
            });

            $('.history-thumb-slider').on('swipe', function(e, slick, currentSlide) {
                canChange = true
            });

            $('.history-content-slider').on('swipe', function(e, slick, currentSlide) {
                canChange = true
            });

            $('.timeline-list .timeline-item').on('click', function(e) {
                index = $('.timeline-list .timeline-item').index($(this));
                $('.history-content-slider').slick('slickGoTo', index)
                drawTimelineProgress('click')
                canChange = false
            });

            $(window).on('resize', function() {
                drawTimelineProgress('resize');
            })

            // ====== partner slider
            $('.partner-slider').slick({
                dots: true,
                arrows: false,
                infinite: true,
                rows: 0,
                autoplay: true,
                autoplaySpeed: 3000,
                slidesToShow: 6,
                slidesToScroll: 6,
                responsive: [
                    {
                        breakpoint: 1440,
                        settings: {
                            slidesToShow: 6,
                            slidesToScroll: 6,
                        }
                    },
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4.3,
                            slidesToScroll: 4,
                            arrows: false,
                            dots: false
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2.4,
                            slidesToScroll: 1,
                            dots: false
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2.4,
                            slidesToScroll: 1,
                            dots: false
                        }
                    }
                ]
            });

            $('.leaders-slider').slick({
                dots: true,
                arrows: false,
                infinite: false,
                slidesToShow: 2,
                slidesToScroll: 2,
                rows: 2,
                responsive: [
                    {
                        breakpoint: 1440,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            rows: 2
                        }
                    },
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2.5,
                            slidesToScroll: 2,
                            rows: 1,
                            dots: false
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1.2,
                            slidesToScroll: 1,
                            rows: 1,
                            dots: false,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1.2,
                            slidesToScroll: 1,
                            rows: 1,
                            dots: false
                        }
                    },
                    {
                        breakpoint: 320,
                        settings: {
                            slidesToShow: 1.2,
                            slidesToScroll: 1,
                            rows: 1,
                            dots: false
                        }
                    },
                ]
            });

            function setItemLeaderHeight() {
                slides = $('.leaders-slider .slick-slide.slick-active');
                $('.leaders-slider .leaders-slide-item').css({height: 'inherit'});
                _height = 0;
                $.each(slides, function(key, row) {
                    items = $(row).find('.leaders-slide-item');
                    $.each(items, function(key, item) {
                        _height = $(item).height() > _height ? $(item).height() : _height;
                    })
                })

                if ($(window).width() <= 768) {
                    items = $('.leaders-slider .leaders-slide-item');
                    _height = 0;
                    $.each(items, function(key, item) {
                        _height = $(item).height() > _height ? $(item).height() : _height
                    })

                    $('.leaders-slider .leaders-slide-item').css({height: _height + 'px'});
                    return true;
                }
                
                setTimeout(function() {
                    slides = $('.leaders-slider .slick-slide');
                    $.each(slides, function(key, row) {
                        items = $(row).find('.leaders-slide-item');
                        $.each(items, function(key, item) {
                            $(item).css({height: _height + 'px'})
                        })
                    })
                }, 1)
            }

            isSet = false;
            $('.leaders-slider').on('setPosition', function () {
                setItemLeaderHeight();
            });

            $(window).on('resize', function() {
                setItemLeaderHeight();
                setTimeout(function() {
                    setItemLeaderHeight();
                }, 1)
            })

            $('.tab-controls .nav-link').on('show.bs.tab', function() {
                $('.values-content-slider, .values-thumb-slider, .history-content-slider, .history-thumb-slider, .partner-slider, .leaders-slider').slick('setPosition');
                setTimeout(function() {
                    drawTimelineProgress();
                    $('.values-content-slider, .values-thumb-slider, .history-content-slider, .history-thumb-slider, .partner-slider, .leaders-slider').slick('setPosition');
                }, 200)
            })

            function scrollToTarget(target) {
                $("html, body").animate({ scrollTop: $(target).offset().top });
            }

            $('.link-scrollto').on('click', function(e) {
                e.preventDefault();
                target = $(this).attr('data-target');
                scrollToTarget(target);
            });


            $('.detail-leader').scrollbar();

            $('.modal-member-detail').on('shown.bs.modal', function (e) {
                console.log('show modal', $(this))
            })
            
		});
	</script>
@endsection