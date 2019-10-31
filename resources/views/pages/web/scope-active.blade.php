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
          <a class="nav-link active" data-toggle="tab" href="#technology-tab">Công nghệ cao</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#energy-tab">Năng lượng tái tạo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#leader">Bất động sản</a>
        </li>
      </ul>
    </div>
    <div class="tab-content">
      <div class="tab-pane active" id="technology-tab">
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
          <div class="field-project">
            <div class="title-field-project">
              Dự án
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="leader">
        <div class="container">
          <div class="title-border-bottom">
            Hội đồng quản trị và Ban lãnh đạo
          </div>
          <div class="row des-leader">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </div>
            <div class="col-md-4">
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </div>
          </div>
        </div>
        <div class="list-member">
          <div class="bg-list-member"></div>
          <div class="container">
            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-8">
                <div class="leader-slide">
                  <div class="item-slide">
                    <div class="row-leader">
                      <div class="item-leader-slide" data-toggle="modal" data-target="#show-detail-leader">
                        <img src="{{ asset('images/leader-1.png') }}" class="img-fluid" />
                        <div class="info-leader">
                          <div class="name-leader">
                            Ông Đặng Trung Kiên
                          </div>
                          <div class="role-company">
                            CHỦ TỊCH HĐQT
                          </div>
                        </div>
                      </div>
                      <div class="item-leader-slide" data-toggle="modal" data-target="#show-detail-leader">
                        <img src="{{ asset('images/leader-2.png') }}" class="img-fluid" />
                        <div class="info-leader">
                          <div class="name-leader">
                            Ông Đặng Trung Kiên
                          </div>
                          <div class="role-company">
                            CHỦ TỊCH HĐQT
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row-leader">
                      <div class="item-leader-slide" data-toggle="modal" data-target="#show-detail-leader">
                        <img src="{{ asset('images/leader-1.png') }}" class="img-fluid" />
                        <div class="info-leader">
                          <div class="name-leader">
                            Ông Đặng Trung Kiên
                          </div>
                          <div class="role-company">
                            CHỦ TỊCH HĐQT
                          </div>
                        </div>
                      </div>
                      <div class="item-leader-slide" data-toggle="modal" data-target="#show-detail-leader">
                        <img src="{{ asset('images/leader-2.png') }}" class="img-fluid" />
                        <div class="info-leader">
                          <div class="name-leader">
                            Ông Đặng Trung Kiên
                          </div>
                          <div class="role-company">
                            CHỦ TỊCH HĐQT
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item-slide">
                    <div class="row-leader">
                      <div class="item-leader-slide" data-toggle="modal" data-target="#show-detail-leader">
                        <img src="{{ asset('images/leader-1.png') }}" class="img-fluid" />
                        <div class="info-leader">
                          <div class="name-leader">
                            Ông Đặng Trung Kiên
                          </div>
                          <div class="role-company">
                            CHỦ TỊCH HĐQT
                          </div>
                        </div>
                      </div>
                      <div class="item-leader-slide" data-toggle="modal" data-target="#show-detail-leader">
                        <img src="{{ asset('images/leader-2.png') }}" class="img-fluid" />
                        <div class="info-leader">
                          <div class="name-leader">
                            Ông Đặng Trung Kiên
                          </div>
                          <div class="role-company">
                            CHỦ TỊCH HĐQT
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row-leader">
                      <div class="item-leader-slide" data-toggle="modal" data-target="#show-detail-leader">
                        <img src="{{ asset('images/leader-1.png') }}" class="img-fluid" />
                        <div class="info-leader">
                          <div class="name-leader">
                            Ông Đặng Trung Kiên
                          </div>
                          <div class="role-company">
                            CHỦ TỊCH HĐQT
                          </div>
                        </div>
                      </div>
                      <div class="item-leader-slide" data-toggle="modal" data-target="#show-detail-leader">
                        <img src="{{ asset('images/leader-2.png') }}" class="img-fluid" />
                        <div class="info-leader">
                          <div class="name-leader">
                            Ông Đặng Trung Kiên
                          </div>
                          <div class="role-company">
                            CHỦ TỊCH HĐQT
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal" id="show-detail-leader">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <div class="img-detail-list">
                  <img src="{{ asset('images/leader-1.png') }}" class="img-fluid" />
                </div>
                <div class="info-leader">
                  <div class="name-leader">
                    Ông Đặng Trung Kiên
                  </div>
                  <div class="role-compay">
                    CHỦ TỊCH HĐQT
                  </div>
                  <div class="detail-leader">
                    <p>Ông Đặng Trung Kiên sinh năm 1973, là Chủ tịch Hội đồng quản trị Công ty Cổ phần Tập đoàn Trường Thành Việt Nam và là đại diện pháp luật của Công ty.</p>
                    <p>Ông Đặng Trung Kiên tốt nghiệp Cao cấp lý luận chính trị - Học viện Chính trị Quốc gia Hồ Chí Minh, Thạc sỹ Quản lý Hành chính công – Học viện Hành chính Quốc gia, Cử nhân luật - Đại học Luật Hà Nội.</p>
                    <p>Thực hiện chủ trương “Quy tụ nhân tài, gắn kết nhân tâm, nâng tầm trí tuệ và chia sẻ thành công”, bằng uy tín và khả năng của mình, ông Đặng Trung Kiên đã quy tụ được nhiều chuyên gia đầu ngành trong các lĩnh vực để cùng chung sức, đồng lòng thực hiện thành công các chiến lược đề ra, giúp Công ty có những bước phát triển vững chắc, khẳng định vị thế của mình trên thương trường.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
	</script>
@endsection