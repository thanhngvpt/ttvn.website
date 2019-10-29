@extends('pages.web.layouts.app')

@section('title-navbar')
	Tin tức - sự kiện
@endsection

@section('content')
	<div id="news-page">
		<div class="container">
			<ul class="nav nav-tabs">
			    <li class="nav-item">
			        <a class="nav-link active" data-toggle="tab" href="#tab_all">Tất cả</a>
			    </li>
			    <li class="nav-item">
			        <a class="nav-link" data-toggle="tab" href="#realty_tab">Bất động sản</a>
			    </li>
			    <li class="nav-item">
			        <a class="nav-link" data-toggle="tab" href="#technology_tab">Công nghệ</a>
			    </li>
			    <li class="nav-item">
			        <a class="nav-link" data-toggle="tab" href="#energy_tab">Năng lượng</a>
			    </li>
			    <li class="nav-item">
			        <a class="nav-link" data-toggle="tab" href="#menu2">Văn hoá</a>
			    </li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
			    <div class="tab-pane container active" id="home">
			    	<div class="news-slide">
						<div class="item-slide">
							<div class="item-slide-news">
								<div class="img-slide-news">
									<img src="{{ asset('images/slide-news.png') }}" class="img-fluid">
								</div>
								<div class="content-slide-news">
									<button class="btn tag-slide-news">
										Văn hoá - sự kiện
									</button>
									<div class="title-slide-news">
										Year End Party 2018: One TTVN - One Dream
									</div>
									<div class="des-slide-news">
										Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
									</div>
									<div class="date-slide-news">
										27/09/2021
									</div>
								</div>
							</div>
						</div>
						<div class="item-slide">
							<div class="item-slide-news">
								<div class="img-slide-news">
									<img src="{{ asset('images/slide-news.png') }}" class="img-fluid">
								</div>
								<div class="content-slide-news">
									<button class="btn tag-slide-news">
										Văn hoá - sự kiện
									</button>
									<div class="title-slide-news">
										Year End Party 2018: One TTVN - One Dream
									</div>
									<div class="des-slide-news">
										Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
									</div>
									<div class="date-slide-news">
										27/09/2021
									</div>
								</div>
							</div>
						</div>
					</div>
			    </div>
			    <div class="tab-pane container fade" id="menu1">...</div>
			    <div class="tab-pane container fade" id="menu2">...</div>
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
  				prevArrow: '<img src="{{ asset("images/arrow-left.png") }}" class="img-fluid prev-arrow" />',
  				nextArrow: '<img src="{{ asset("images/arrow-right.png") }}" class="img-fluid next-arrow" />'
  			});
		});
	</script>
@endsection