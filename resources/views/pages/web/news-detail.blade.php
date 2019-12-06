@extends('pages.web.layouts.app')

@section('body-class')
	class="background-white no-title-page"
@endsection

@section('title')
{{@$news->meta_title}}
@endsection

@section('content')
	<div id="news-detail-page">
		<div class="area-detail-news">
			<a class="tag-news" href="{!! action('Web\NewsController@index', @$news->newCategory->slug) !!}">
				{{@$news->newCategory->name}}
			</a>
			<div class="title-news-detail">
					{{$news->name}}
			</div>
			<div class="date-detail-news">
					{!!  date('d/m/Y', (strtotime( $news->created_at))) !!}
			</div>
			<div class="content-detail-news">
				{!! $news->content !!}
			</div>
			<div class="share-detail-news clearfix">
				<div class="float-left">
					<span class="tags-secondary">
						{{@$news->newCategory->name}}
					</span>
				</div>
				<div class="float-right">
					<ul class="news-social">
						<li>
							<a href="{{@$footer->fb_link}}">
								<img src="{{ asset('images/icon-facebook-share.svg') }}" class="img-fluid" />
							</a>
						</li>
						<li>
							<a href="mailto:{{@$footer->email}}">
								<img src="{{ asset('images/icon-google-share.svg') }}" class="img-fluid" />
							</a>
						</li>
						<li>
							<a href="#">
								<img src="{{ asset('images/icon-instagram-share.svg') }}" class="img-fluid" />
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="relation-news">
			<div class="title-relation-news">
				Tin liên quan
			</div>
			<div class="container">
				<div class="slide-relation-news">
					@foreach($new_relations as $new_relation)
					<a href="{!! action('Web\NewsController@details', [$new_relation->newCategory->slug, $new_relation->slug]) !!}" class="item-news">
						<div class="img-news">
							@if(!empty($new_relation->present()->coverImage()))
							<img src="{!! $new_relation->present()->coverImage()->present()->url !!}" class="img-fluid" />
							@endif
						</div>
						<div class="content-news">
							<div class="cate-news">
									{{@$new_relation->newCategory->name}}
							</div>
							<div class="title-news">
									{{$new_relation->name}}
							</div>
							<div class="des-news">
									{{$new_relation->sapo}}
							</div>
							<div class="date-news">
									{!!  date('d/m/Y', (strtotime( $new_relation->created_at))) !!}
							</div>
						</div>
					</a>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page-styles')
	<style>
		.navbar-top-area {
			background-image: url('{{ asset("images/bg-menu-newsdetail.svg") }}')
		}
		.navbar-top-area .navbar {
			padding-top: 32px;
			padding-bottom: 32px;
		}
		@media screen and (min-width: 768px) and (max-width: 1023px) {
			.navbar-top-area {
				background-image: none;
				background-color: #00263C;
			}
		}
	</style>
@endsection

@section('page-scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.slide-relation-news').slick({
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
		});
	</script>
@endsection