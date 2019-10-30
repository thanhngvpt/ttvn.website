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
      <div class="tab-pane active" id="company">
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
              <a class="nav-link active" data-toggle="tab" href="#company">Về TTVN Group</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#leader">Ban lãnh đạo</a>
            </li>
          </ul>
          </div>
        </div>
      </div>
      <div class="tab-pane container active" id="leader">
      </div>
    </div>
  </div>
@endsection