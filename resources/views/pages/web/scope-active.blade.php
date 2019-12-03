@extends('pages.web.layouts.app')

@section('title-navbar')
	{{-- Lĩnh vực hoạt động --}}
@endsection
@section('title')
Lĩnh vực hoạt động
@endsection

@section('body-class')
class="background-white page-scope-activities"
@endsection

@section('content')
	<div id="field-page" class="section-page section">
        <div class="section-head">
            <div class="container">
                <h1 class="section-title">Lĩnh vực hoạt động</h1>
            </div>
        </div>

        <div class="tab-controls">
            <div class="container">
                <ul class="nav nav-tabs">
                    @foreach ($fields as $key => $field)
                        <li class="nav-item field-tab-click" data-field-id="{{$field->id}}">
                            <a class="nav-link @if($slug==$field->slug) active @endif" data-toggle="tab" href="#field-tab-{{$field->id}}">{{$field->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="tab-content">
            @foreach($fields as $key => $field)
                <div class="tab-pane @if($slug==$field->slug) active @endif" id="field-tab-{{$field->id}}">
                    <div class="tech-intro">
                        <div class="text-information">
                            <div class="container">
                                <div class="text-content">
                                    <div class="intro-title">{{$field->title}}</div>
                                    <div class="intro-desc">
                                        <p>{!! $field->content !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tech-thumb">
                            <div class="container">
                                <img src="{!! $field->present()->coverImage()->present()->url !!}" class="img-fluid" />
                            </div>
                        </div>
                    </div>

                    <div class="tech-frame">
                        <div class="tech-bg"></div>
                        <div class="container">
                            <div class="tech-list">
                                <div class="tech-column-one">
                                    <div class="tech-item">
                                        <div class="tech-line"></div>
                                        <img src="{!! $field->present()->icon1Image()->present()->url !!}" class="img-fluid tech-item-icon" />
                                        <div class="tech-item-title">{{$field->charact_1}}</div>
                                        <div class="tech-item-desc">{{$field->des_1}}</div>
                                    </div>
                                    <div class="tech-item tech-item-down">
                                        <div class="tech-line"></div>
                                        <img src="{!! $field->present()->icon2Image()->present()->url !!}" class="img-fluid tech-item-icon" />
                                        <div class="tech-item-title">{{$field->charact_2}}</div>
                                        <div class="tech-item-desc">{{$field->des_2}}</div>
                                    </div>
                                </div>

                                <div class="tech-column-two">
                                    <div class="tech-item item-only-thumb text-center">
                                        <img src="{!! $field->present()->cover2Image()->present()->url !!}" class="img-fluid" />
                                    </div>
                                    <div class="tech-item">
                                        <div class="tech-line"></div>
                                        <img src="{!! $field->present()->icon3Image()->present()->url !!}" class="img-fluid tech-item-icon" />
                                        <div class="tech-item-title">{{$field->charact_3}}</div>
                                        <div class="tech-item-desc">{{$field->des_3}}</div>
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

  <section class="section section-projects">
    <div class="section-head">
        <div class="container">
            <h2 class="section-title">Dự án</h2>
        </div>
    </div>

    <div class="section-body">
        <div class="container">
            <div class="slide-projects">
                @foreach($projects as $project)
                    <div href="#" class="slide-item">
                        <div class="item-wrapper">
                            <div class="slide-item-thumb">
                                <img src="{!! $project->present()->coverImage()->present()->url !!}" class="img-fluid" />
                            </div>
                            <div class="slide-item-content">
                                <div class="slide-item-title">{{$project->name}}</div>
                                <div class="slide-item-desc">{{$project->address}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
  </section>
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
    .navbar-top-area {
      background-image: none;
    }
  </style>
@endsection

@section('page-scripts')
	<script src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
            slickOption = {
                infinite: false,
                slidesToShow: 3,
                slidesToScroll: 1,
                rows: 0,
                dots: false,
                prevArrow: `<button class="btn btn-slick-control slick-prev slick-arrow"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path class="stroke-round" d="M29.8784 13.8784L18.1213 2.12132C16.9497 0.949747 15.0503 0.949747 13.8787 2.12132L2.12162 13.8784C0.950043 15.05 0.950043 16.9495 2.12162 18.121L13.8787 29.8781C15.0503 31.0497 16.9497 31.0497 18.1213 29.8781L29.8784 18.121C31.05 16.9495 31.05 15.05 29.8784 13.8784Z" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path class="stroke-center" d="M17 10L11 16L17 22" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></button>`,
                nextArrow: `<button class="btn btn-slick-control slick-next slick-arrow"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path class="stroke-round" d="M2.12162 18.1216L13.8787 29.8787C15.0503 31.0503 16.9497 31.0503 18.1213 29.8787L29.8784 18.1216C31.05 16.95 31.05 15.0505 29.8784 13.879L18.1213 2.12191C16.9497 0.950339 15.0503 0.950339 13.8787 2.12191L2.12161 13.879C0.950042 15.0505 0.950042 16.95 2.12162 18.1216Z" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path class="stroke-center" d="M15 22L21 16L15 10" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg><button>`,
                responsive: [
                    {
                        breakpoint: 1439,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 1023,
                        settings: {
                            slidesToShow: 2.5,
                            slidesToScroll: 2,
                            arrows: false,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1.1,
                            slidesToScroll: 1,
                            arrows: false,
                            dots: false
                        }
                    }
                ]
            }

            $('.slide-projects').slick(slickOption);

            $('.field-tab-click').on('click', function(e) {
                let field_id = $(this).data('field-id');
                
                $.ajax({
                    url: "{{action('Web\ScopeActiveController@getProjects')}}",
                    type: "GET",
                    data: {
                        _token: "{!! csrf_token() !!}",
                        field_id: field_id
                    },
                    success: function (res) {
                        $('.slide-projects').slick('unslick');
                        $('.slide-projects').html(res);
                        $('.slide-projects').not('.slick-initialized').slick(slickOption);
                    }
                });
            });

            
		});

        function drawBackgroundTriangle()
        {
            target = $('#tech-frame');
            appendArea = $('.tech-bg');
            maxWidth = $('.tab-pane.active .tech-frame').width();
            maxHeight = $('.tab-pane.active .tech-frame').height();
            outterHeight = $('.tab-pane.active .tech-frame').outerHeight()

            configs = {
                0: {
                    offset: maxHeight - 376,
                    botOffset: -110
                },
                768: {
                    offset: 165,
                    botOffset: -175
                },
                1024: {
                    offset: 150,
                    botOffset: 70,
                },
                1440: {
                    offset: 40,
                    botOffset: 0
                }
            }

            var offset = 0;
            var endY = maxHeight
            Object.keys(configs).forEach(function(width) {
                if (maxWidth >= width) {
                    offset = configs[width].offset
                    endY = maxHeight + configs[width].botOffset
                }
            })

            startX = 0
            startY = offset

            endX = maxWidth
            endPoint = outterHeight > endX ? outterHeight : endX

            rotate = calculateTriangle();

            widthBlur = maxWidth * 0.5701663202
            offset1 = widthBlur*0.3573381951
            offset2 = widthBlur*0.07657247037
            

            html = `
                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 ${endX} ${outterHeight}">
                    <defs><style>.cls-1{fill:#f6f7f6;}.cls-2{fill:rgba(255,255,255,.1);}</style></defs>
                    <rect class="cls-2" width="${widthBlur}" height="${widthBlur}" style="transform: rotate(${rotate}deg) translate(34%, -${offset2}px);"></rect>
                    <rect class="cls-2" width="${widthBlur}" height="${widthBlur}" style="transform: rotate(${rotate}deg) translate(57%, -25%);"></rect>
                    <polygon class="cls-1" points="${startX} ${startY} ${endX} ${endY} ${endX} ${outterHeight}  0 ${endPoint} 0 ${startY}"/>
                </svg>
            `;

            appendArea.html(html)
        }

        function repositionTabs()
        {
            tabControl = $('.tab-controls .nav-tabs')
            tabItems = tabControl.find('.nav-item');
            screenWidth = $(window).width();

            activeTab = tabControl.find('.nav-link.active').closest('.nav-item')

            currentLi = $(activeTab).closest('li.nav-item');
            currentIndex = tabItems.index(currentLi)
            offset = {x: 0, y: 0};

            tabWidth = tabItems.width();

            if (currentIndex == 0)
                offset.x = '18px'
            else if (currentIndex == tabItems.length - 1)
                offset.x = '-' + (tabWidth*(tabItems.length - 1) - tabWidth/(tabItems.length - 1) - 18) + 'px'
            else
                offset.x = '-' + ( tabWidth - (tabWidth/tabItems.length) * currentIndex) + 'px'

            if (screenWidth >= 768)
                offset.x = 0

            tabControl.css({
                'transform': `translate(${offset.x}, ${offset.y})`
            })
        }

        Math.radians = function(degrees) {
            return degrees * Math.PI / 180;
        }

        Math.degrees = function(radians) {
            return radians * 180 / Math.PI;
        }

        function calculateTriangle()
        {
            AB = $('.tab-pane.active .tech-frame').width(); //width
            AC = $('.tab-pane.active .tech-frame').height(); //height
            BC = Math.sqrt(Math.pow(AB, 2) + Math.pow(AC, 2));

            console.log(`AB: ${AB}, AC: ${AC}, BC: ${BC}`)
            angleB = Math.acos(AB/BC)

            return Math.degrees(angleB)
        }

        $(document).ready(function() {
            drawBackgroundTriangle();
            $(window).on('resize', function() {
                drawBackgroundTriangle();
                repositionTabs();
                setTimeout(function() {
                    drawBackgroundTriangle();
                    repositionTabs();
                }, 300);
            })

            repositionTabs();
            $('.tab-controls .nav-link').on('shown.bs.tab', function(e) {
                repositionTabs();
            })
        })
	</script>
@endsection