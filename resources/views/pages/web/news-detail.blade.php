@extends('pages.web.layouts.app')

@section('body-class')
	class="background-white no-title-page page-detail-title"
@endsection

@section('title')
{{@$news->meta_title}}
@endsection

@push('meta')
	<meta name="description" content="{!! $news->meta_description !!}"/>
@endpush


@section('nav-header')
	@include('pages.web.partials.title-new-detail')
@endsection

@section('content')
	<div id="news-detail-page">
		<div class="area-detail-news">
			<div class="content-area">
				@if (!empty($news->newCategory))
					<a class="tag-news" href="{!! action('Web\NewsController@index', @$news->newCategory->slug) !!}">
						{{@$news->newCategory->name}}
					</a>
				@endif
				<div class="title-news-detail">
					{{$news->name}}
				</div>
				<div class="date-detail-news">
					@php
                        $added_at = !empty($news->added_on) ? $news->added_on : null;
                        $added_at = !empty($news->created_at) ? $news->created_at : null;
                    @endphp
					{!!  date('d/m/Y', (strtotime( $added_at))) !!}
				</div>
				<div class="content-sapo">
					{!! $news->sapo !!}
				</div>
			</div>
			{{-- @if(!empty($news->present()->coverImage()))
				<div class="news-thumb">
					<div class="news-thumb-wrapper" style="background-image: url({!! $news->present()->coverImage()->present()->url !!});">
						<img src="{!! $news->present()->coverImage()->present()->url !!}" alt="" class="img-fluid">
					</div>
				</div>
			@endif --}}
			<div class="content-area">
				<div class="content-detail-news">
					{!! $news->content !!}
				</div>
			
				<div class="share-detail-news clearfix">
					<div class="float-left">
						@if (!empty($news->newCategory))
							<span class="tags-secondary">
								{{@$news->newCategory->name}}
							</span>
						@endif
					</div>
					{{-- <div class="float-right">
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
					</div> --}}
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
						@if (!empty($new_relation->newCategory))
						<a href="{!! action('Web\NewsController@details', [$new_relation->newCategory->slug, $new_relation->slug]) !!}" class="item-news">
							<div class="item-news-wrapper">
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
										@php
											$added_at = !empty($new_relation->added_on) ? $new_relation->added_on : null;
											$added_at = !empty($new_relation->created_at) ? $new_relation->created_at : null;
										@endphp
											{!!  date('d/m/Y', (strtotime( $added_at))) !!}
									</div>
								</div>
							</div>
						</a>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page-scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.slide-relation-news').slick({
				infinite: false,
				slidesToShow: 3,
				slidesToScroll: 3,
				dots: true,
				accessibility: true,
				prevArrow: '<img src="{{ asset("images/arrow-left-ad.svg") }}" class="img-fluid prev-arrow" />',
				nextArrow: '<img src="{{ asset("images/arrow-right-ad.svg") }}" class="img-fluid next-arrow" />',
				rows: 0,
				responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 2.5,
							slidesToScroll: 2,
							arrows: false
						}
					},
					{
						breakpoint: 768,
						settings: {
							slidesToShow: 1.5,
							slidesToScroll: 1,
							arrows: false,
							dots: false
						}
					},
					
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