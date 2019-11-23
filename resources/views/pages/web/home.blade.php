@extends('pages.web.layouts.app')

@section('nav-header')
@endsection

@section('nav-slide')
<main>
  <div class="top-page-slide">
    <div class="item-slide">
      <div class="item-top-slide">
        <div class="text-slide">
          <div class="title">
            Tập đoàn
          </div>
          <div class="content">
            Trường Thành Việt Nam
          </div>
          <div class="description">
            Quy tụ <span>nhân tài</span>, gắn kết <span>nhân tâm</span>, nâng tầm <span>trí tuệ</span> và chia sẻ <span>thành công</span>
          </div>
          <button class="btn btn-success">
            <img src="{{ asset('images/view-video.png') }}" class="img-fluid" />
            <span>Xem video</span>
          </button>
        </div>
        <div class="img-top-slide">
          <img src="{{ asset('images/history-develop.png') }}" class="img-fluid" />
        </div>
      </div>
    </div>
    <div class="item-slide">
      <div class="item-top-slide">
        <div class="text-slide">
          <div class="title">
            Tập đoàn
          </div>
          <div class="content">
            Trường Thành Việt Nam
          </div>
          <div class="description">
            Quy tụ <span>nhân tài</span>, gắn kết <span>nhân tâm</span>, nâng tầm <span>trí tuệ</span> và chia sẻ <span>thành công</span>
          </div>
          <button class="btn btn-success">
            <img src="{{ asset('images/view-video.png') }}" class="img-fluid" />
            <span>Xem video</span>
          </button>
        </div>
        <div class="img-top-slide">
          <img src="{{ asset('images/history-develop.png') }}" class="img-fluid" />
        </div>
      </div>
    </div>
  </div>
</main>
@endsection

@section('body-class')
class="background-white"
@endsection

@section('content')
	<div id="top-page">
    <div class="top-field">
      <div class="container">
        <div class="title-top-field">
          Lĩnh vực hoạt động chính
        </div>
        <div class="des-top-field">
          Chúng tôi luôn cố gắng xây dựng hệ thống sản phẩm đáp ứng được tốt nhất nhu cầu của khách hàng.
        </div>
        <div class="list-top-field">
          <div class="row">
            <div class="col-md-4">
              <div class="item-top-field">
                <div class="img-topfield">
                  <img src="{{ asset('images/top-field-1.svg') }}" class="img-fluid">
                </div>
                <a class="title-topfield" href="#">
                  Công nghệ cao
                  <img src="{{ asset('images/arrow-right-active-new.svg') }}" class="img-fluid" />
                </a>
                <div class="des-topfield">
                  Ứng dụng công nghệ tiên tiến, xây dựng nền tảng tối ưu tài nguyên, nâng cao hiệu quả hoạt động
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="item-top-field">
                <div class="img-topfield">
                  <img src="{{ asset('images/top-field-2.svg') }}" class="img-fluid">
                </div>
                <a class="title-topfield" href="#">
                  Năng lượng tái tạo
                  <img src="{{ asset('images/arrow-right-active-new.svg') }}" class="img-fluid" />
                </a>
                <div class="des-topfield">
                  Nhà máy điện mặt trời, điện trên mái nhà dân, dự án công nghệ cao.
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="item-top-field">
                <div class="img-topfield">
                  <img src="{{ asset('images/top-field-3.svg') }}" class="img-fluid">
                </div>
                <a class="title-topfield" href="#">
                  Bất động sản
                  <img src="{{ asset('images/arrow-right-active-new.svg') }}" class="img-fluid" />
                </a>
                <div class="des-topfield">
                  Bất động sản nhà ở, bất động sản du lịch, khu công nghiệp.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="top-content">
      <div class="container">
        <div class="top-intro">
          <div class="text-top-intro">
            <div class="title-1">
              TẬP ĐOÀN
            </div>
            <div class="name">
              TRƯỜNG THÀNH
            </div>
            <div class="title-2">
              VIỆT NAM
            </div>
            <div class="description">
              <p>Công ty Cổ phần Tập đoàn Trường Thành Việt Nam là doanh nghiệp kinh doanh đa ngành, được giao nhiệm vụ triển khai một số dự án trọng điểm nhằm gắn kết hoạt động kinh tế với thực hiện công tác nghiệp vụ của đơn vị góp phần đảm bảo an ninh, trật tự trên địa bàn nơi doanh nghiệp hoạt động.</p>
              <p>Một trong những yếu tố quan trọng nhằm tạo nên sức mạnh của TTVN Group là: Xây dựng đội ngũ quản lý có năng lực, trình độ cao, sáng tạo và đoàn kết.</p>
            </div>
            <a href="#" class="btn btn-outline-success">
              Xem thêm
              <img src="{{ asset('images/arrow-right-active-new.svg') }}" class="img-fluid ml-2" />
            </a>
          </div>
          <div class="img-top-intro">
            <img src="{{ asset('images/top-intro-1.png') }}" class="img-fluid img-intro-after" />
            <img src="{{ asset('images/top-intro-2.png') }}" class="img-fluid img-intro-before" />
          </div>
        </div>
        <div class="top-sumarry">
          <div class="row">
            <div class="col-md-3">
              <div class="col-top-sumary">
                <img src="{{ asset('images/top-sumary-1.svg') }}" class="img-fluid" />
                <div class="number">
                  24
                </div>
                <div class="name">
                  Công ty thành viên
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="col-top-sumary">
                <img src="{{ asset('images/top-sumary-2.svg') }}" class="img-fluid" />
                <div class="number">
                  96
                </div>
                <div class="name">
                  Dự án BĐS
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="col-top-sumary">
                <img src="{{ asset('images/top-sumary-3.svg') }}" class="img-fluid" />
                  <div class="number">
                  32
                </div>
                <div class="name">
                  Doanh nghiệp hợp tác
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="col-top-sumary last-sumarry">
                <img src="{{ asset('images/top-sumary-4.svg') }}" class="img-fluid" />
                <div class="number">
                  04
                </div>
                <div class="name">
                  Nhà máy điện
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="top-news">
          <div class="title-top-news">
            Tin tức
          </div>
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
              <a class="nav-link" data-toggle="tab" href="#cultural_tab">Văn hoá doanh nghiệp</a>
            </li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane container active" id="tab_all">
              <div class="slide-top-news">
                <a href="#" class="item-news">
                  <div class="img-news">
                    <img src="{{ asset('images/top-news-1.png') }}" class="img-fluid" />
                  </div>
                  <div class="content-news">
                    <div class="cate-news">
                      BẤT ĐỘNG SẢN
                    </div>
                    <div class="title-news">
                      Đăng ví dụ tiêu chuẩn 9 với hình ảnh nổi bật Đăng
                    </div>
                    <div class="date-news">
                      27/09/2021
                    </div>
                  </div>
                </a>
                <a href="#" class="item-news">
                  <div class="img-news">
                    <img src="{{ asset('images/top-news-2.png') }}" class="img-fluid" />
                  </div>
                  <div class="content-news">
                    <div class="cate-news">
                      BẤT ĐỘNG SẢN
                    </div>
                    <div class="title-news">
                      Đăng ví dụ tiêu chuẩn 9 với hình ảnh nổi bật Đăng
                    </div>
                    <div class="date-news">
                      27/09/2021
                    </div>
                  </div>
                </a>
                <a href="#" class="item-news">
                  <div class="img-news">
                    <img src="{{ asset('images/top-news-3.png') }}" class="img-fluid" />
                  </div>
                  <div class="content-news">
                    <div class="cate-news">
                      BẤT ĐỘNG SẢN
                    </div>
                    <div class="title-news">
                      Đăng ví dụ tiêu chuẩn 9 với hình ảnh nổi bật Đăng
                    </div>
                    <div class="date-news">
                      27/09/2021
                    </div>
                  </div>
                </a>
                <a href="#" class="item-news">
                  <div class="img-news">
                    <img src="{{ asset('images/top-news-1.png') }}" class="img-fluid" />
                  </div>
                  <div class="content-news">
                    <div class="cate-news">
                      Công nghệ cao
                    </div>
                    <div class="title-news">
                      Fugiat ullamco reprehenderit Lorem nostrud
                    </div>
                    <div class="date-news">
                      27/09/2021
                    </div>
                  </div>
                </a>
              </div>
              <div class="text-center">
                <a href="#" class="btn btn-outline-success btn-see-more-news">
                  Xem tất cả
                </a>
              </div>
            </div>
            <div class="tab-pane container active" id="realty_tab"></div>
            <div class="tab-pane container active" id="technology_tab"></div>
            <div class="tab-pane container active" id="energy_tab"></div>
            <div class="tab-pane container active" id="cultural_tab"></div>            
          </div>
        </div>
      </div>
      <div class="top-partners">
        <div class="container">
          <div class="partner-intro">
            <div class="title-border-bottom">
              Công ty thành viên
            </div>
            <div class="container">
              <div class="partner-slide">
                <div class="item-slide">
                  <img src="{{ asset('images/partner-1.png') }}" class="img-fluid" />
                </div>
                <div class="item-slide">
                  <img src="{{ asset('images/partner-3.png') }}" class="img-fluid" />
                </div>
                <div class="item-slide">
                  <img src="{{ asset('images/partner-4.png') }}" class="img-fluid" />
                </div>
                <div class="item-slide">
                  <img src="{{ asset('images/partner-5.png') }}" class="img-fluid" />
                </div>
                <div class="item-slide">
                  <img src="{{ asset('images/partner-6.png') }}" class="img-fluid" />
                </div>
                <div class="item-slide">
                  <img src="{{ asset('images/partner-1.png') }}" class="img-fluid" />
                </div>
                <div class="item-slide">
                  <img src="{{ asset('images/partner-3.png') }}" class="img-fluid" />
                </div>
                <div class="item-slide">
                  <img src="{{ asset('images/partner-4.png') }}" class="img-fluid" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="top-consultation">
        <div class="title">
          Nhận tư vấn miễn phí
        </div>
        <div class="description">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        </div>
        <form action="" method="">
          <div class="form-consultation">
            <input type="email" name="email" placeholder="Email" class="form-control" />
            <input type="text" name="phone" placeholder="Số điện thoại" class="form-control" />
            <button type="submit" class="btn">
              Gửi
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('page-styles')
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
  <style>
    .navbar-top-area {
      background-image: url('../images/bg-header-home.svg');
    }

    @media screen and (max-width: 1023px) and (min-width: 768px) {
      .navbar-top-area {
        background-image: url('../images/bg-header-home-sm.svg');
      }
    }

    @media screen and (max-width: 767px) {
      .navbar-top-area {
        background-image: url('../images/bg-header-home-xs.svg');
      }
    }
  </style>
@endsection

@section('page-scripts')
	<script src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
      $('.top-page-slide').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false
      });
		});

    $(document).ready(function(){
      $('.slide-top-news').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<img src="{{ asset("images/arrow-left-ad.svg") }}" class="img-fluid prev-arrow" />',
        nextArrow: '<img src="{{ asset("images/arrow-right-ad.svg") }}" class="img-fluid next-arrow" />',
        responsive: [
					{
						breakpoint: 1023,
						settings: {
              slidesToShow: 2
						}
					},
          {
						breakpoint: 767,
						settings: {
              slidesToShow: 1
						}
					}
        ]
      });

      $('.partner-slide').slick({
        slidesToShow: 6,
        slidesToScroll: 3,
        dots: true,
        responsive: [
					{
						breakpoint: 1023,
						settings: {
              slidesToShow: 4
						}
					},
          {
						breakpoint: 767,
						settings: {
              slidesToShow: 3
						}
					}
        ]
      });
		});
	</script>
@endsection