@extends('pages.web.layouts.app')

@section('title-navbar')
	Giới thiệu tập đoàn
@endsection

@section('body-class')
class="background-white"
@endsection

@section('content')
	<div id="introduce-page">
    <div class="container">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#company">Về TTVN Group</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#leader">Ban lãnh đạo</a>
        </li>
      </ul>
    </div>
      
    <div class="tab-content">
      <div class="tab-pane" id="company">
        <div class="container">
          <div class="title-border-bottom">
            Giới thiệu chung
          </div>
        </div>
        <div class="introduce-general">
          <div class="container ml-0">
            <div class="row">
              <div class="col-md-4">
                <div class="img-introduce">
                  <img src="{{ asset('images/introduce.png') }}" />
                </div>
              </div>
              <div class="col-md-4">
                <p>Công ty Cổ phần Tập đoàn Trường Thành Việt Nam (TTVN Group) là doanh nghiệp kinh doanh đa ngành, trong đó tập trung vào 04 lĩnh vực chính đều hướng tới các mục tiêu xanh, sạch và gắn với sự phát triển của cộng đồng, xã hội.</p>
                <p>Một trong những yếu tố quan trọng tạo nên sức mạnh của TTVN Group là: </p>
              </div>
              <div class="col-md-4">
                <p>Xây dựng đội ngũ quản lý có năng lực, trình độ cao, sáng tạo và đoàn kết. </p>
                <p>Với triết lý “Quy tụ NHÂN TÀI, gắn kết NHÂN TÂM, nâng tầm TRÍ TUỆ và chia sẻ THÀNH CÔNG” sẽ giúp TTVN Group phát triển vững chắc trong thời gian tới.</p>
              </div>
            </div>
          </div>
          <div class="view-more-intro clearfix">
            <div class="float-left">Xem tiếp</div>
            <div class="float-right">
              <img src="{{ asset('images/icon-show-more.png') }}" class="img-fluid" />
            </div>
          </div>
        </div>
        <div class="content-page">
          <div class="cultural-job">
            <div class="column-left column-text">
              <div class="title-border-bottom">
                Tầm nhìn - Sứ mệnh
              </div>
              <div class="des-cultural-job">
                <p>Bằng ánh sáng của Trí Huệ, TTVN Group mong muốn tiên phong trong lĩnh vực mới, đột phá trong lĩnh vực kinh doanh truyền thống với chiến lược phát triển nhanh và bền vững, phấn đấu trở thành một trong năm mươi doanh nghiệp hàng đầu Việt Nam và từng bước vươn ra tầm khu vực.</p>
                <p>Quy tụ nhân tài, gắn kết nhân tâm, nâng tầm trí tuệ và chia sẻ thành công</p>
              </div>	
            </div>
            <div class="column-right column-image">
              <img src="{{ asset('images/view-intro.png') }}" class="img-fluid">
            </div>
          </div>
          <div class="cultural-job">
            <div class="column-left column-image">
              <img src="{{ asset('images/value-intro.png') }}" class="img-fluid">
            </div>
            <div class="column-right column-text">
              <div class="title-border-bottom">
              Giá trị cốt lõi
              </div>
              <div class="des-cultural-job">
                <p>Bằng ánh sáng của Trí Huệ, TTVN Group mong muốn tiên phong trong lĩnh vực mới, đột phá trong lĩnh vực kinh doanh truyền thống với chiến lược phát triển nhanh và bền vững, phấn đấu trở thành một trong năm mươi doanh nghiệp hàng đầu Việt Nam và từng bước vươn ra tầm khu vực.</p>
              </div>	
            </div>
          </div>
        </div>
        <div class="history-develop">
          <div class="container">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#2012">2012</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#2013">2013</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#2015">2015</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#2017">2017</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#2018">2018</a>
              </li>
            </ul>
            <div class="tab-content">
            <div class="tab-pane active" id="2012">
              <div class="title-history-develop">
                Lịch sử phát triển
              </div>
              <div class="history-slide">
                <div class="item-slide">
                  <div class="item-history-slide">
                    <div class="text-history-slide">
                      <p>Ngày 19 tháng 10 năm 2017, Công ty TNHH MTV chính thức chuyển đổi loại hình doanh nghiệp thành Công ty Cổ phần với tên gọi mới là Công ty Cổ phần Tập đoàn Trường Thành Việt Nam.</p>
                      <p>TTVN Group đã cấu trúc lại doanh nghiệp theo chiều dọc thành 4 Tổng công ty tương ứng với 4 lĩnh vực hoạt động chính. Các lĩnh vực trên cùng với các Dự án có ý nghĩa xã hội cao, đã và đang góp phần vào việc xây dựng cộng đồng và nâng cao vị thế, uy tín của TTVN Group.</p>
                    </div>
                    <div class="img-history-slide">
                      <img src="{{ asset('images/history-develop.png') }}" class="img-fluid" />
                    </div>
                  </div>
                </div>
                <div class="item-slide">
                  <div class="item-history-slide">
                    <div class="text-history-slide">
                      <p>Ngày 19 tháng 10 năm 2017, Công ty TNHH MTV chính thức chuyển đổi loại hình doanh nghiệp thành Công ty Cổ phần với tên gọi mới là Công ty Cổ phần Tập đoàn Trường Thành Việt Nam.</p>
                      <p>TTVN Group đã cấu trúc lại doanh nghiệp theo chiều dọc thành 4 Tổng công ty tương ứng với 4 lĩnh vực hoạt động chính. Các lĩnh vực trên cùng với các Dự án có ý nghĩa xã hội cao, đã và đang góp phần vào việc xây dựng cộng đồng và nâng cao vị thế, uy tín của TTVN Group.</p>
                    </div>
                    <div class="img-history-slide">
                      <img src="{{ asset('images/history-develop.png') }}" class="img-fluid" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="2013"></div>
            <div class="tab-pane" id="2015"></div>
            <div class="tab-pane" id="2017"></div>
            <div class="tab-pane" id="2018"></div>
            </div>
          </div>
        </div>
        <div class="partner-intro">
          <div class="title-border-bottom">
            Đối tác đồng hành
          </div>
          <div class="des-partner-intro">
            TTVN chào đón cơ hội hợp tác với đối tác chiến lược trong và ngoài nước phù hợp dựa trên tiêu chí không chỉ góp vốn mà còn có khả năng cung cấp hỗ trợ kỹ thuật và thương hiệu tốt để cùng TTVN phát triển mạnh và bền vững.
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
      <div class="tab-pane active" id="leader">
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