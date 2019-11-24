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
								<a class="nav-link" data-toggle="tab" href="#cultural_tab">Văn hoá</a>
						</li>
				</ul>
			</div>
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="tab_all">
					<div class="news-slide">
						<div class="item-slide">
							<div class="item-slide-news">
								<div class="img-slide-news">
									<img src="{{ asset('images/slide-news.png') }}" class="img-fluid">
								</div>
								<div class="content-slide-news">
									<button class="btn tag-news">
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
									<button class="btn tag-news">
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
					<div class="row list-news">
						<div class="col-xl-4 col-md-6">
							<div class="item-news">
								<div class="img-news">
									<img src="{{ asset('images/news-1.png') }}" class="img-fluid" />
								</div>
								<div class="cate-news">
									Công nghệ cao
								</div>
								<div class="title-news">
									Fugiat ullamco reprehenderit Lorem nostrud
								</div>
								<div class="des-news">
									Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
								</div>
								<div class="date-news">
									27/09/2021
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-6">
							<div class="item-news">
								<div class="img-news">
									<img src="{{ asset('images/news-2.png') }}" class="img-fluid" />
								</div>
								<div class="cate-news">
									Công nghệ cao
								</div>
								<div class="title-news">
									Sint excepteur labore exercitation labore
								</div>
								<div class="des-news">
									Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
								</div>
								<div class="date-news">
									27/09/2021
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-6">
							<div class="item-news">
								<div class="img-news">
									<img src="{{ asset('images/news-3.png') }}" class="img-fluid" />
								</div>
								<div class="cate-news">
									Công nghệ cao
								</div>
								<div class="title-news">
									Nulla minim ullamco incididunt nisi adipisicing ad
								</div>
								<div class="des-news">
									Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
								</div>
								<div class="date-news">
									27/09/2021
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-6">
							<div class="item-news">
								<div class="img-news">
									<img src="{{ asset('images/news-4.png') }}" class="img-fluid" />
								</div>
								<div class="cate-news">
									Công nghệ cao
								</div>
								<div class="title-news">
									Fugiat ullamco reprehenderit Lorem nostrud
								</div>
								<div class="des-news">
									Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
								</div>
								<div class="date-news">
									27/09/2021
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-6">
							<div class="item-news">
								<div class="img-news">
									<img src="{{ asset('images/news-5.png') }}" class="img-fluid" />
								</div>
								<div class="cate-news">
									Công nghệ cao
								</div>
								<div class="title-news">
									Sint excepteur labore exercitation labore
								</div>
								<div class="des-news">
									Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
								</div>
								<div class="date-news">
									27/09/2021
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-6">
							<div class="item-news">
								<div class="img-news">
									<img src="{{ asset('images/news-6.png') }}" class="img-fluid" />
								</div>
								<div class="cate-news">
									Công nghệ cao
								</div>
								<div class="title-news">
									Nulla minim ullamco incididunt nisi adipisicing ad
								</div>
								<div class="des-news">
									Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
								</div>
								<div class="date-news">
									27/09/2021
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-6">
							<div class="item-news">
								<div class="img-news">
									<img src="{{ asset('images/news-7.png') }}" class="img-fluid" />
								</div>
								<div class="cate-news">
									Công nghệ cao
								</div>
								<div class="title-news">
									Fugiat ullamco reprehenderit Lorem nostrud
								</div>
								<div class="des-news">
									Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
								</div>
								<div class="date-news">
									27/09/2021
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-6">
							<div class="item-news">
								<div class="img-news">
									<img src="{{ asset('images/news-8.png') }}" class="img-fluid" />
								</div>
								<div class="cate-news">
									Công nghệ cao
								</div>
								<div class="title-news">
									Sint excepteur labore exercitation labore
								</div>
								<div class="des-news">
									Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
								</div>
								<div class="date-news">
									27/09/2021
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-6">
							<div class="item-news">
								<div class="img-news">
									<img src="{{ asset('images/news-9.png') }}" class="img-fluid" />
								</div>
								<div class="cate-news">
									Công nghệ cao
								</div>
								<div class="title-news">
									Nulla minim ullamco incididunt nisi adipisicing ad
								</div>
								<div class="des-news">
									Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
								</div>
								<div class="date-news">
									27/09/2021
								</div>
							</div>
						</div>
					</div>
					<ul class="pagination">
						<li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a></li>
						<li class="page-item active"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">4</a></li>
						<li class="page-item"><a class="page-link" href="#">5</a></li>
						<li class="page-item"><a class="page-link" href="#">6</a></li>
						<li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
					</ul>
				</div>
				<div class="tab-pane container fade" id="realty_tab">...</div>
				<div class="tab-pane container fade" id="technology_tab">...</div>
				<div class="tab-pane container fade" id="energy_tab">...</div>
				<div class="tab-pane container fade" id="cultural_tab">...</div>
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
	</script>
@endsection