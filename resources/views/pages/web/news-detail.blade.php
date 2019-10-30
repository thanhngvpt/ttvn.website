@extends('pages.web.layouts.app')

@section('body-class')
	class="background-white no-title-page"
@endsection

@section('content')
	<div id="news-detail-page">
		<div class="area-detail-news">
			<span class="tag-news">
				Văn hoá - sự kiện
			</span>
			<div class="title-news-detail">
				Year End Party 2018: One TTVN - One Dream
			</div>
			<div class="date-detail-news">
				27/09/2021
			</div>
			<div class="content-detail-news">
				<p>Với không gian trang trọng và ấm cúng, đại gia đình TTVN đã cùng nhau sum họp, quây quần và nhìn lại những thành quả đáng tự hào của năm 2018. Khai mạc buổi lễ, ông Đặng Trung Kiên - Chủ tịch Hội đồng quản trị chia sẻ và đưa ra những định hướng nền tảng cho năm 2019: "TTVN - Grow Together". </p>
				<p>Tiếp nối chương trình, Ông Lê Đình Ngọc – Tổng Giám đốc Tập đoàn đã tổng kết lại một năm 2018 thành công rực rỡ trên các lĩnh vực hoạt động của tập đoàn: Nổi bật nhất đó là việc khởi công ba dự án điện mặt trời với tổng quy mô 357 Mwp, triển khai lắp đặt thử nghiệm các dự án Led, khởi công Nhà máy xử lý chất thải rắn, triển khai nhiều dự án Bất động sản với quy mô lớn trải rộng trên cả nước. Bên cạnh đó, lĩnh vực công nghệ cao cũng gặt hái nhiều thành công với việc release app Sen point trên nền tảng IOS và Android, đó là một trong những ứng dụng công nghệ Block chain đầu tiên tại Việt Nam. </p>
			</div>
			<div class="share-detail-news clearfix">
				<div class="float-left">
					<span class="tags-secondary">
						Văn hoá - sự kiện
					</span>
				</div>
				<div class="float-right">
					<ul class="news-social">
						<li>
							<a href="#">
								<img src="{{ asset('images/icon-facebook-share.png') }}" class="img-fluid" />
							</a>
						</li>
						<li>
							<a href="#">
								<img src="{{ asset('images/icon-google-share.png') }}" class="img-fluid" />
							</a>
						</li>
						<li>
							<a href="#">
								<img src="{{ asset('images/icon-instagram-share.png') }}" class="img-fluid" />
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
			<div class="content-page">
				<div class="slide-relation-news">
					<a href="#" class="item-news">
						<div class="img-news">
							<img src="{{ asset('images/relation-news.png') }}" class="img-fluid" />
						</div>
						<div class="content-news">
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
					</a>
					<a href="#" class="item-news">
						<div class="img-news">
							<img src="{{ asset('images/relation-news.png') }}" class="img-fluid" />
						</div>
						<div class="content-news">
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
					</a>
					<a href="#" class="item-news">
						<div class="img-news">
							<img src="{{ asset('images/relation-news.png') }}" class="img-fluid" />
						</div>
						<div class="content-news">
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
					</a>
					<a href="#" class="item-news">
						<div class="img-news">
							<img src="{{ asset('images/relation-news.png') }}" class="img-fluid" />
						</div>
						<div class="content-news">
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
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page-scripts')
	<script type="text/javascript">
		$(document).ready(function(){
  			$('.slide-relation-news').slick({
  				infinite: true,
  				slidesToShow: 3,
  				slidesToScroll: 1,
  				dots: true,
  				prevArrow: '<img src="{{ asset("images/arrow-left-ad.png") }}" class="img-fluid prev-arrow" />',
  				nextArrow: '<img src="{{ asset("images/arrow-right-ad.png") }}" class="img-fluid next-arrow" />'
  			});
		});
	</script>
@endsection