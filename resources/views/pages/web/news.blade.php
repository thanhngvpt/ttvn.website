@extends('pages.web.layouts.app')

@section('title-navbar')
	Tin tức - sự kiện
@endsection

@section('body-class')
	class="background-white"
@endsection

@section('content')
	<div id="news-page">
		<div class="container">
			<div class="navtab-custom">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link @if($category_slug == 'all') active @endif" data-category-slug="all" data-category-id="0" data-toggle="tab" href="#tab_all">Tất cả</a>
					</li>
					@foreach($categories as $category)
					<li class="nav-item category-click">
						<a class="nav-link @if($category_slug == $category->slug) active @endif" data-toggle="tab" data-category-slug="{{$category->slug}}" data-category-id="{{$category->id}}" href="#news-tab-{{$category->id}}">{{$category->name}}</a>
					</li>
					@endforeach
				</ul>
			</div>
			
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane @if($category_slug == 'all') active show @endif" data-category-slug="all" data-category-id="0" id="tab_all">
					<div class="news-slide">
						@foreach($hot_news as $hot_new)
						<div class="item-slide" onclick="location.href='{!! action('Web\NewsController@details', $hot_new->slug) !!}'">
							<div class="item-slide-news">
								<div class="img-slide-news">
									<img src="{!! $hot_new->present()->coverImage()->present()->url !!}" class="img-fluid">
								</div>
								<div class="content-slide-news">
									<button class="btn tag-news">
										{{$hot_new->newCategory->name}}
									</button>
									<div class="title-slide-news">
											{{$hot_new->name}}
									</div>
									<div class="des-slide-news">
											{!!$hot_new->sapo!!}
									</div>
									<div class="date-slide-news">
											{!!  date('d/m/Y', (strtotime( $hot_new->created_at))) !!}
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<div class="news-content">
						<div class="row list-news">
							@foreach($data['news'] as $item)
							<div class="col-xl-4 col-md-6" onclick="location.href='{!! action('Web\NewsController@details', $item->slug) !!}'">
								<div class="item-news">
									<div class="img-news">
										<img src="{!! $item->present()->coverImage()->present()->url !!}" class="img-fluid" />
									</div>
									<div class="cate-news">
											{{$item->newCategory->name}}
									</div>
									<div class="title-news">
											{{$item->name}}
									</div>
									<div class="des-news">
											{!!$item->sapo!!}
									</div>
									<div class="date-news">
											{!!  date('d/m/Y', (strtotime( $item->created_at))) !!}
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<ul class="pagination">
							<li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a></li>
							@for($i=1;$i<=$data['total_page'];$i++)
							<li class="page-item @if ($data['current_page'] == $i) active @endif child-item" data-page-number="{{$i}}"><a class="page-link">{{$i}}</a></li>
							@endfor
							<li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
						</ul>
					</div>
				</div>
				@foreach($categories as $category)
				<div class="tab-pane @if($category_slug == $category->slug) active show @endif container fade" data-category-slug="{{$category->slug}}" data-category-id="{{$category->id}}" id="news-tab-{{$category->id}}">
					<div class="news-slide">
						@foreach($hot_news as $hot_new)
						<div class="item-slide" onclick="location.href='{!! action('Web\NewsController@details', $hot_new->slug) !!}'">
							<div class="item-slide-news">
								<div class="img-slide-news">
									<img src="{!! $hot_new->present()->coverImage()->present()->url !!}" class="img-fluid">
								</div>
								<div class="content-slide-news">
									<button class="btn tag-news">
										{{$hot_new->newCategory->name}}
									</button>
									<div class="title-slide-news">
											{{$hot_new->name}}
									</div>
									<div class="des-slide-news">
											{!!$hot_new->sapo!!}
									</div>
									<div class="date-slide-news">
											{!!  date('d/m/Y', (strtotime( $hot_new->created_at))) !!}
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<div class="news-content">
						<div class="row list-news">
							@foreach($data['news'] as $item)
							<div class="col-xl-4 col-md-6" onclick="location.href='{!! action('Web\NewsController@details', $item->slug) !!}'">
								<div class="item-news">
									<div class="img-news">
										<img src="{!! $item->present()->coverImage()->present()->url !!}" class="img-fluid" />
									</div>
									<div class="cate-news">
											{{$item->newCategory->name}}
									</div>
									<div class="title-news">
											{{$item->name}}
									</div>
									<div class="des-news">
											{!!$item->sapo!!}
									</div>
									<div class="date-news">
											{!!  date('d/m/Y', (strtotime( $item->created_at))) !!}
									</div>
								</div>
							</div>
							@endforeach
							</div>
							<ul class="pagination">
								<li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a></li>
								@for($i=1;$i<=$data['total_page'];$i++)
								<li class="page-item @if ($data['current_page'] == $i) active @endif child-item" data-page-number="{{$i}}"><a class="page-link">{{$i}}</a></li>
								@endfor
								<li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
							</ul>
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
	<style>
		@media screen and (min-width: 1440px) {
			.navbar-top-area {
				background-image: url('../images/bg-news.svg');
			}
		}
	</style>
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
  				prevArrow: '<img src="{{ asset("images/arrow-left.svg") }}" class="img-fluid prev-arrow" />',
  				nextArrow: '<img src="{{ asset("images/arrow-right.svg") }}" class="img-fluid next-arrow" />'
			  });
		});

		$(document).on('click', '.child-item', function() {
			let next_page = $(this).data('page-number');
			let slug = $('.tab-pane.active').data('category-slug')

			$.ajax({
				url: "{{action('Web\NewsController@index', "+slug+")}}",
				type: "GET",
				data: {
					_token: "{!! csrf_token() !!}",
					page: next_page,
				},
				success: function (res) {
					$('.news-content').html(res)
				}
			});
		})

		$(document).on('click', '.category-click', function() {
			let category_id = $('.tab-pane.active').data('category-id')
			
			$.ajax({
				url: "{{action('Web\NewsController@getNewsViaCategory')}}",
				type: "GET",
				data: {
					_token: "{!! csrf_token() !!}",
					category_id: category_id
				},
				success: function (res) {
					$('.tab-pane.active').html(res)
					$('.news-slide').not('.slick-initialized').slick({
						infinite: true,
						slidesToShow: 1,
						slidesToScroll: 1,
						dots: true,
						prevArrow: '<img src="{{ asset("images/arrow-left.svg") }}" class="img-fluid prev-arrow" />',
						nextArrow: '<img src="{{ asset("images/arrow-right.svg") }}" class="img-fluid next-arrow" />'
					});
				}
			});
		})
	</script>
@endsection
