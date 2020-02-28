@extends('pages.web.layouts.app')

@section('title-navbar')
	Tin tức - sự kiện
@endsection

@section('nav-header')
	@include('pages.web.partials.title-style-1', ['content' => 'Tin tức - sự kiện'])
@endsection


@section('title')
@if( isset($category_active) && !empty($category_active))
{{$category_active->meta_title}}
@else
@foreach ($meta as $item)
   	 <?php 
      $url = trim( $item->link, "/" );
	  ?>
	@if(Request::url() === $url)
		{{$item->meta_title}}
	@endif	
@endforeach
@endif
@endsection

@section('body-class')
	class="background-white"
@endsection

@section('content')
	<div id="news-page">
		<div class="container">
			<div class="navtab-custom">
				<ul class="nav nav-tabs">
					<li class="nav-item category-click  @if($category_slug == 'all') active @endif" data-category-id="0">
						<a class="nav-link" data-category-slug="all" data-category-id="0" data-toggle="tab" href="#news-tab-0">Tất cả</a>
					</li>
					@foreach($categories as $category)
					<li class="nav-item category-click @if($category_slug == $category->slug) active @endif" data-category-id="{{$category->id}}">
						<a class="nav-link" data-toggle="tab" data-category-slug="{{$category->slug}}" data-category-id="{{$category->id}}" href="#news-tab-{{$category->id}}">{{$category->name}}</a>
					</li>
					@endforeach
				</ul>
			</div>
			
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane @if($category_slug == 'all') active show @endif" data-category-slug="all" data-category-id="0" id="news-tab-0">
					<div class="news-slide">
						@foreach($hot_news as $hot_new)
						<div class="item-slide">
							<div class="item-slide-news">
								@if ($hot_new->newCategory)
								<a href="{!! action('Web\NewsController@details', [$hot_new->newCategory->slug, $hot_new->slug]) !!}" class="img-slide-news" @if(!empty($hot_new->present()->coverImage())) style="background-image: url({!! $hot_new->present()->coverImage()->present()->url !!});" @endif>
									@if(!empty($hot_new->present()->coverImage()))
										<img src="{!! $hot_new->present()->coverImage()->present()->url !!}" class="img-fluid">
									@endif
								</a>
								<div class="content-slide-news">
									<div class="btn tag-news cursor-normal">{{@$hot_new->newCategory->name}}</div>
									<a href="{!! action('Web\NewsController@details', [$hot_new->newCategory->slug, $hot_new->slug]) !!}" class="title-slide-news">{{$hot_new->name}}</a>
									<a href="{!! action('Web\NewsController@details', [$hot_new->newCategory->slug, $hot_new->slug]) !!}" class="des-slide-news">{!!$hot_new->sapo!!}</a>
									<a href="{!! action('Web\NewsController@details', [$hot_new->newCategory->slug, $hot_new->slug]) !!}" class="date-slide-news">{!! date('d/m/Y', (strtotime( $hot_new->created_at))) !!}</a>
								</div>
								@endif
							</div>
						</div>
						@endforeach
					</div>
					<div class="news-content">
						<div class="list-news">
							@foreach($data['news'] as $item)
							<div class="col-item-news">
								@if ($item->newCategory)
								<a class="item-news" href="{!! action('Web\NewsController@details', [$item->newCategory->slug, $item->slug]) !!}">
									<div class="img-news">
											@if(!empty($item->present()->coverImage()))
										<img src="{!! $item->present()->coverImage()->present()->url !!}" class="img-fluid" />
										@endif
									</div>
									<div class="cate-news">{{@$item->newCategory->name}}</div>
									<div class="title-news">{{$item->name}}</div>
									<div class="des-news">{!!$item->sapo!!}</div>
									<div class="date-news">{!! date('d/m/Y', (strtotime( $item->created_at))) !!}</div>
								</a>
								@endif
							</div>
							@endforeach
						</div>
						<ul class="pagination">
							<li class="page-item previous-page"><a href="javascript:void(0);" class="page-link"><i class="fas fa-chevron-left"></i></a></li>
							@for($i=1;$i<=$data['total_page'];$i++)
							<li class="page-item @if ($data['current_page'] == $i) active @endif child-item" data-page-number="{{$i}}"><a href="javascript:void(0);" class="page-link">{{$i}}</a></li>
							@endfor
							<li class="page-item next-page"><a href="javascript:void(0);" class="page-link"><i class="fas fa-chevron-right"></i></a></li>
						</ul>
					</div>
				</div>
				@foreach($categories as $category)
				<div class="tab-pane @if($category_slug == $category->slug) active show @endif fade" data-category-slug="{{$category->slug}}" data-category-id="{{$category->id}}" id="news-tab-{{$category->id}}">
					@if($category_slug == $category->slug)
					<div class="news-slide">
						@foreach($hot_news as $hot_new)
						<div class="item-slide">
							<div class="item-slide-news">
								@if ($hot_new->newCategory)
								<a href="{!! action('Web\NewsController@details', [$hot_new->newCategory->slug, $hot_new->slug]) !!}" class="img-slide-news" @if(!empty($hot_new->present()->coverImage())) style="background-image: url({!! $hot_new->present()->coverImage()->present()->url !!});" @endif>
									@if(!empty($hot_new->present()->coverImage()))
										<img src="{!! $hot_new->present()->coverImage()->present()->url !!}" class="img-fluid">
									@endif
								</a>
								<div class="content-slide-news">
									<div class="btn tag-news cursor-normal">
										{{@$hot_new->newCategory->name}}
									</div>
									<a href="{!! action('Web\NewsController@details', [$hot_new->newCategory->slug, $hot_new->slug]) !!}" class="title-slide-news">
											{{$hot_new->name}}
									</a>
									<a href="{!! action('Web\NewsController@details', [$hot_new->newCategory->slug, $hot_new->slug]) !!}" class="des-slide-news">
											{!!$hot_new->sapo!!}
									</a>
									<a href="{!! action('Web\NewsController@details', [$hot_new->newCategory->slug, $hot_new->slug]) !!}" class="date-slide-news">
											{!!  date('d/m/Y', (strtotime( $hot_new->created_at))) !!}
									</a>
								</div>
								@endif
							</div>
						</div>
						@endforeach
					</div>
					<div class="news-content">
						<div class="list-news">
							@foreach($data['news'] as $item)
							<div class="col-item-news">
								<div class="item-news">
									@if ($item->newCategory)
									<a href="{!! action('Web\NewsController@details', [$item->newCategory->slug, $item->slug]) !!}" class="img-news">
										@if(!empty($item->present()->coverImage()))
											<img src="{!! $item->present()->coverImage()->present()->url !!}" class="img-fluid" />
										@endif
									</a>
									<a href="{!! route('news.category', $hot_new->newCategory->slug) !!}" class="cate-news">
											{{@$item->newCategory->name}}
									</a>
									<a href="{!! action('Web\NewsController@details', [$item->newCategory->slug, $item->slug]) !!}" class="title-news">
											{{$item->name}}
									</a>
									<a href="{!! action('Web\NewsController@details', [$item->newCategory->slug, $item->slug]) !!}" class="des-news">
											{!!$item->sapo!!}
									</a>
									<a href="{!! action('Web\NewsController@details', [$item->newCategory->slug, $item->slug]) !!}" class="date-news">
											{!!  date('d/m/Y', (strtotime( $item->created_at))) !!}
									</a>
									@endif
								</div>
							</div>
							@endforeach
						</div>
						@if($data['total_page'] > 1)
						<ul class="pagination">
							<li class="page-item previous-page"><a class="page-link"><i class="fas fa-chevron-left"></i></a></li>
							@for($i=1;$i<=$data['total_page'];$i++)
							<li class="page-item @if ($data['current_page'] == $i) active @endif child-item" data-page-number="{{$i}}"><a class="page-link">{{$i}}</a></li>
							@endfor
							<li class="page-item next-page"><a class="page-link"><i class="fas fa-chevron-right"></i></a></li>
						</ul>
						@endif
					</div>
					@endif
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
  			$('.news-slide').slick({
  				infinite: true,
  				slidesToShow: 1,
  				slidesToScroll: 1,
  				dots: true,
				autoplay: true,
				autoplaySpeed: 3000,
				rows: 0,
  				prevArrow: '<div class="slick-news-control prev-arrow"><img src="{{ asset("images/arrow-left.svg") }}" class="img-fluid" /></div>',
  				nextArrow: '<div class="slick-news-control next-arrow"><img src="{{ asset("images/arrow-right.svg") }}" class="img-fluid" /></div>'
			});

			function repositionArrow() {
				width = window.innerWidth
				activeSlide = $('.tab-pane.active .news-slide .slick-current.slick-active')
				control = $('.tab-pane.active .slick-news-control')
				controlHeight = control.height();
				img = activeSlide.find('.img-slide-news img');
				height = img.height();
				_top = (height/2 - controlHeight/2) + 'px'
				control.css({top: _top})
			}


			repositionArrow();
			$('.news-slide').on('afterChange', function(e) {
				repositionArrow();
			})

			$(window).on('resize', function() {
				repositionArrow();
				setTimeout(function () {
					repositionArrow();
				}, 100)
			})

			function scrollAfterLoadNews() {
				_top = $(".news-content").offset().top;
				_navHeight = $('.navbar-top-area .navbar').height();
				newOffset = _top - _navHeight - 50;
				
				$('html, body').animate({
					scrollTop: newOffset
				}, 500);
			}

			$(document).on('click', '.child-item', function() {
				let next_page = $(this).data('page-number');
				let slug = $('.tab-pane.active').data('category-slug')

				$.ajax({
					url: "/tin-tuc/"+slug,
					type: "GET",
					data: {
						_token: "{!! csrf_token() !!}",
						page: next_page,
					},
					success: function (res) {
						$('.news-content').html(res)
						scrollAfterLoadNews()
					}
				});
			})

			$(document).on('click', '.category-click', function(e) {
				let category_id = $(this).data('category-id')
				$('.category-click').removeClass('active')
				$(e.currentTarget).addClass('active');
				
				$.ajax({
					url: "{{action('Web\NewsController@getNewsViaCategory')}}",
					type: "GET",
					data: {
						_token: "{!! csrf_token() !!}",
						category_id: category_id
					},
					success: function (res) {
						$('#news-tab-'+ category_id).html(res)
						$('.news-slide').not('.slick-initialized').slick({
							infinite: true,
							slidesToShow: 1,
							slidesToScroll: 1,
							dots: true,
							prevArrow: '<div class="slick-news-control prev-arrow"><img src="{{ asset("images/arrow-left.svg") }}" class="img-fluid" /></div>',
							nextArrow: '<div class="slick-news-control next-arrow"><img src="{{ asset("images/arrow-right.svg") }}" class="img-fluid" /></div>'
						});
						repositionArrow();
						setTimeout(function() {
							$('.slick-slider').slick("setPosition")
							repositionArrow();
						}, 300)
					}
				});
			})

			$(document).on('click', '.next-page', function() {
				let current_page = $('.page-item.active').data('page-number');
				let next_page = parseInt(current_page) + 1;

				let slug = $('.tab-pane.active').data('category-slug')
				$.ajax({
					url: "/tin-tuc/"+slug,
					type: "GET",
					data: {
						_token: "{!! csrf_token() !!}",
						page: next_page,
					},
					success: function (res) {
						$('.news-content').html(res)
						scrollAfterLoadNews()
					}
				});
			})

			$(document).on('click', '.previous-page', function() {
				let current_page = $('.page-item.active').data('page-number');
				let next_page = parseInt(current_page) - 1;

				let slug = $('.tab-pane.active').data('category-slug')
				$.ajax({
					url: "/tin-tuc/"+slug,
					type: "GET",
					data: {
						_token: "{!! csrf_token() !!}",
						page: next_page,
					},
					success: function (res) {
						$('.news-content').html(res)
						scrollAfterLoadNews()
					}
				});
			})

			$('.nav-link').on('show.bs.tab', function(){
				$('.slick-slider').slick("setPosition")
			});

			$('[data-link]').on('click', function(e) {
				if ($(this).attr('data-link'))
					location.href = $(this).attr('data-link')
			});
		});
	</script>
@endsection
