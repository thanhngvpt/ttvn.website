@extends('pages.web.layouts.app')

@section('title-navbar')
	Lĩnh vực hoạt động
@endsection

@section('body-class')
class="background-white"
@endsection

@section('content')
	<div id="field-page">
    <div class="container">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#technology-tab">Công nghệ cao</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#energy-tab">Năng lượng tái tạo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#leader">Bất động sản</a>
        </li>
      </ul>
    </div>
    <div class="tab-content">
      <div class="tab-pane" id="technology-tab">
        <div class="container">
          <div class="tech-intro">
            <div class="tech-left">
              <div class="title-border-bottom">
                Công nghệ cao Trường Thành
              </div>
              <div class="des-tech-intro">
                <p>Chúng tôi luôn cố gắng từng ngày mang đến những giải pháp công nghệ hiệu quả nhất giải quyết các vấn đề cấp thiết hiện nay để mang đến nhiều giá trị cho cộng đồng và xã hội.</p>
                <p>Trong xu thế phát triển của nền kinh tế chia sẻ và cuộc cách mạng công nghiệp 4.0, TTVN hướng tới việc ứng dụng các công nghệ tiên tiến trên thế giới (Blockchain, Big data, IOT,…) để xây dựng các sản phẩm, ứng dụng và nền tảng nhằm cải thiện sử tiện dụng cho người dùng, tối ưu hóa các chi phí, khai thác tối đa các tài nguyên, nâng cao hiệu quả hoạt động của doanh nghiệp,... </p>
              </div>
            </div>
            <div class="tech-right">
              <img src="{{ asset('images/hight-technology.png') }}" class="img-fluid" />
            </div>
          </div>
          <div class="tech-list">
            <div class="tech-column-one">
              <div class="tech-item">
                <div class="tech-line"></div>
                <img src="{{ asset('images/item-tech-1.png') }}" class="img-fluid" />
                <div class="tech-item-title">
                  Khai thác tối đa tài nguyên
                </div>
                <div class="tech-item-des">
                  Xây dựng giải pháp công nghệ gắn với nền kinh tế chia sẻ ( ứng dung tích điểm dùng chung Sen Point), giúp tiết kiêm tài nguyên, chi phí và tăng hiệu quả hoạt động doanh nghiệp
                </div>
              </div>
              <div class="tech-item tech-item-down">
                <div class="tech-line"></div>
                <img src="{{ asset('images/item-tech-2.png') }}" class="img-fluid" />
                <div class="tech-item-title">
                  Khai thác tối đa tài nguyên
                </div>
                <div class="tech-item-des">
                  Xây dựng giải pháp công nghệ gắn với nền kinh tế chia sẻ ( ứng dung tích điểm dùng chung Sen Point), giúp tiết kiêm tài nguyên, chi phí và tăng hiệu quả hoạt động doanh nghiệp
                </div>
              </div>
            </div>
            <div class="tech-column-two">
              <div class="tech-item">
                <div class="tech-line"></div>
                <img src="{{ asset('images/item-tech-3.png') }}" class="img-fluid" />
                <div class="tech-item-title">
                  Mang tiện ích đến khách hàng
                </div>
                <div class="tech-item-des">
                  Chỉ với 1 thiết bị di động có kết nối internet, khách hàng có thể bắt kịp với xu hướng của nền công nghiệp 4.0, cải thiện cuộc sống hàng ngày và tiết kiệm thời gian
                </div>
              </div>
            </div>
            <div class="tech-column-three">
              <img src="{{ asset('images/item-tech-4.png') }}" class="img-fluid" />
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane active" id="energy-tab">
        <div class="container">
          <div class="tech-intro">
            <div class="tech-left">
              <div class="title-border-bottom">
                Năng lượng xanh
              </div>
              <div class="des-tech-intro">
                <p>Hướng tới mục tiêu bảo vệ môi trường, giảm bớt sự phụ thuộc vào các nguồn phát điện truyền thống và nắm bắt xu hướng phát triển năng lượng trên thế giới, TTVN luôn là một trong những tập đoàn tiên phong trong lĩnh vực công nghệ tái tạo.</p>
                <p>Chúng tôi tận dụng  những nguồn năng lượng có sẵn từ thiên nhiên như mặt trời, gió,… đầu tư vào nhiều dự án năng lượng tái tạo với công nghệ tiên tiến tiến tới một môi trường xanh - sạch  và gắn liền với sự phát triển của cộng đồng, xã hội.</p>
              </div>
            </div>
            <div class="tech-right">
              <img src="{{ asset('images/energy.png') }}" class="img-fluid" />
            </div>
          </div>
          <div class="tech-list">
            <div class="tech-column-one">
              <div class="tech-item">
                <div class="tech-line"></div>
                <img src="{{ asset('images/item-tech-1.png') }}" class="img-fluid" />
                <div class="tech-item-title">
                  Khai thác tối đa tài nguyên
                </div>
                <div class="tech-item-des">
                  Xây dựng giải pháp công nghệ gắn với nền kinh tế chia sẻ ( ứng dung tích điểm dùng chung Sen Point), giúp tiết kiêm tài nguyên, chi phí và tăng hiệu quả hoạt động doanh nghiệp
                </div>
              </div>
              <div class="tech-item tech-item-down">
                <div class="tech-line"></div>
                <img src="{{ asset('images/item-tech-2.png') }}" class="img-fluid" />
                <div class="tech-item-title">
                  Khai thác tối đa tài nguyên
                </div>
                <div class="tech-item-des">
                  Xây dựng giải pháp công nghệ gắn với nền kinh tế chia sẻ ( ứng dung tích điểm dùng chung Sen Point), giúp tiết kiêm tài nguyên, chi phí và tăng hiệu quả hoạt động doanh nghiệp
                </div>
              </div>
            </div>
            <div class="tech-column-two">
              <div class="tech-item">
                <div class="tech-line"></div>
                <img src="{{ asset('images/item-tech-3.png') }}" class="img-fluid" />
                <div class="tech-item-title">
                  Mang tiện ích đến khách hàng
                </div>
                <div class="tech-item-des">
                  Chỉ với 1 thiết bị di động có kết nối internet, khách hàng có thể bắt kịp với xu hướng của nền công nghiệp 4.0, cải thiện cuộc sống hàng ngày và tiết kiệm thời gian
                </div>
              </div>
            </div>
            <div class="tech-column-three">
              <img src="{{ asset('images/item-tech-4.png') }}" class="img-fluid" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content-after')
  <main>
    <div class="field-project">
      <div class="title-field-project">
        Dự án
      </div>
      <div class="content-page">
        <div class="slide-projects">
          <a href="#" class="item-news">
            <div class="img-news">
              <img src="{{ asset('images/project-1.png') }}" class="img-fluid" />
            </div>
            <div class="content-news">
              <div class="title-news">
                Nhà máy điện mặt trời Bình Nguyên
              </div>
              <div class="des-news">
                Địa điểm: xã Bình Nguyên, huyện Bình Sơn, tỉnh Quảng Ngãi
              </div>
            </div>
          </a>
          <a href="#" class="item-news">
            <div class="img-news">
              <img src="{{ asset('images/project-2.png') }}" class="img-fluid" />
            </div>
            <div class="content-news">
              <div class="title-news">
                Dự án thay thế đèn chiếu sáng công cộng bằng đèn led
              </div>
              <div class="des-news">
                Địa điểm: xã Bình Nguyên, huyện Bình Sơn, tỉnh Quảng Ngãi
              </div>
            </div>
          </a>
          <a href="#" class="item-news">
            <div class="img-news">
              <img src="{{ asset('images/project-3.png') }}" class="img-fluid" />
            </div>
            <div class="content-news">
              <div class="title-news">
                Dự án xây dựng nhà máy xử lý rác tập trung
              </div>
              <div class="des-news">
                Địa điểm: huyện Đức Trọng, tỉnh Lâm Đồng
              </div>
            </div>
          </a>
          <a href="#" class="item-news">
            <div class="img-news">
              <img src="{{ asset('images/project-1.png') }}" class="img-fluid" />
            </div>
            <div class="content-news">
              <div class="title-news">
                Fugiat ullamco reprehenderit Lorem nostrud
              </div>
              <div class="des-news">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </main>
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
    .page-content {
      background-image: url('../images/bg-scope-active.png');
	    background-repeat: no-repeat;
      background-position: bottom right;
      background-color: #f7f7f7;
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
  			$('.history-slide').slick({
  				infinite: true,
  				slidesToShow: 1,
  				slidesToScroll: 1,
  				prevArrow: '<img src="{{ asset("images/icon-left-develop.png") }}" class="img-fluid prev-arrow" />',
  				nextArrow: '<img src="{{ asset("images/icon-right-develop.png") }}" class="img-fluid next-arrow" />'
        });
        
        $('.partner-slide').slick({
  				slidesToShow: 6,
          slidesToScroll: 3,
          dots: true
        });
        
        $('.leader-slide').slick({
  				slidesToShow: 1,
          slidesToScroll: 1,
          dots: true
  			});
		});

    $(document).ready(function(){
      $('.slide-projects').slick({
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