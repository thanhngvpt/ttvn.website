@extends('pages.web.layouts.app')

@section('title-navbar')
	<div class="container">
        Giới thiệu tập đoàn
    </div>
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
                                <img src="{!! $introduce->present()->contentImage()->present()->url !!}" />
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
                                <img src="{!! $introduce->present()->missionImage()->present()->url !!}" class="img-fluid">
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
                                        <img src="{!! $save_values->first()->present()->coverImage()->present()->url !!}" class="img-fluid"> @endforeach
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
                                <div class="timeline-item">{!! $history->date_start !!}</div>
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
                                            <img src="{!! $history->present()->coverImage()->present()->url !!}" class="img-fluid" /> @endforeach
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
                                <a href="{{$partner->link}}" class="partner-item">
                                        <img src="{!! $partner->present()->coverImage()->present()->url !!}" class="img-fluid" />
                                    </a> @endforeach
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
                                <div class="leaders-slide-item" data-toggle="modal" data-target="#show-detail-leader-{{$leader_ship->id}}">
                                    <div class="item-wrapper">
                                        <div class="leaders-thumb">
                                            <img src="{!! $leader_ship->present()->coverImage()->present()->url !!}" class="img-fluid" />
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
                    <div class="modal" id="show-detail-leader-{{$leader_ship->id}}">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
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
                    console.log(targetPos.height(), offsetY, target.height())
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
                adaptiveHeight: true,
                asNavFor: '.history-thumb-slider',
                appendArrows: '.slick-append-arrows',
                prevArrow: `<button class="btn-slick-rounded btn-prev"><svg viewBox="0 0 86 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="0.5" y="0.5" width="85" height="45" rx="7.5"/><path d="M45 28L41 24L45 20" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></button>`,
                nextArrow: `<button class="btn-slick-rounded btn-prev"><svg viewBox="0 0 86 48" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="0.5" y="0.5" width="85" height="45" rx="7.5"/><path d="M42 20L46 24L42 28" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></button>`
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
            
            function drawTimelineProgress() {
                timeBar = $('.timeline-bar');
                timeProgress = $('.timeline-progress');
                timeRounder = $('.timeline-rounder');

                currentIndex = $('.history-content-slider').slick('slickCurrentSlide');

                years = $('.timeline-list .timeline-item')
                barItemWidth = timeRounder.width()/years.length

                currentProgress = barItemWidth * currentIndex + barItemWidth

                if (window.screenWidth < 768) {
                        padding = parseInt($('.timeline-list .container').css('padding-left'));
                        currentProgress += currentIndex <= 0 ? padding * 2 : padding / 2
                }

                timeProgress.css({width: (currentProgress) + 'px'});

                scrollTimeline();
            }

            function scrollTimeline() {
                listYear = $('.timeline-list');
                years = listYear.find('.timeline-item');
                container = listYear.find('.container')

                currentIndex = $('.history-content-slider').slick('slickCurrentSlide');

                itemWidth = years.width()
                padding = parseInt(container.css('padding-left')) * 2;

                totalWidth = itemWidth * years.length + padding
                
                offsetX = itemWidth * currentIndex
                if (window.screenWidth >= 768) 
                    offsetX = 0

                container.css({transform: `translate(-${offsetX}px, 0)`})
            }

            drawTimelineProgress();
            $('.history-thumb-slider').on('beforeChange', function(e, slick, currentSlide, nextSlide) {
                drawTimelineProgress(nextSlide);
            });

            $('.timeline-list .timeline-item').on('click', function(e) {
                index = $('.timeline-list .timeline-item').index($(this));
                $('.history-content-slider').slick('slickGoTo', index)
                drawTimelineProgress()
            });

            $(window).on('resize', function() {
                drawTimelineProgress();
            })

            // ====== partner slider
            $('.partner-slider').slick({
                dots: true,
                arrows: false,
                infinite: false,
                rows: 0,
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
                        breakpoint: 1023,
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
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1.2,
                            slidesToScroll: 1,
                            rows: 1,
                        }
                    },
                ]
            })

            $('.tab-controls .nav-link').on('show.bs.tab', function() {
                $('.values-content-slider, .values-thumb-slider, .history-content-slider, .history-thumb-slider, .partner-slider, .leaders-slider').slick('setPosition');
                setTimeout(function() {
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

            function drawBackgroundHeader() {
                container = $('.title-page .container');
                targetBg = $('.navbar-top-area');

                offset = container.offset().left
                calculateWidth = container.width();

                breakPoint = (calculateWidth + offset) + 'px';
                backgroundGradient = `linear-gradient(90deg, #00263C 0%, #00263C ${breakPoint}, #57AE5B ${breakPoint}, #57AE5B 100%);`;

                if (window.screenWidth >= 768) {
                    targetBg.css({'background', backgroundGradient});
                }
            }
            
		});
	</script>
@endsection