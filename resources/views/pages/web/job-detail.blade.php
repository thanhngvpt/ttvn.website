@extends('pages.web.layouts.app')

@section('title-navbar')
	<div class="mb-2">
		Kiến trúc sư thiết kế cảnh quan
	</div>
	<div class="number-detail-job">
		<div class="item-number-detail">
			<img src="{{ asset('images/icon-job-1.svg') }}" class="img-fluid" />
			<span>Hà nội</span>
		</div>
		<div class="item-number-detail">
			<img src="{{ asset('images/icon-job-2.svg') }}" class="img-fluid" />
			<span>03</span>
		</div>
		<div class="item-number-detail">
			<img src="{{ asset('images/icon-job-3.svg') }}" class="img-fluid" />
			<span>15-20 triệu</span>
		</div>
		<div class="item-number-detail">
			<img src="{{ asset('images/icon-job-4.svg') }}" class="img-fluid" />
			<span>31/12/2030</span>
		</div>
	</div>
@endsection

@section('content')
	<div id="job-detail-page">
		<div class="content-job-detail">
			<div class="title-job-detail">
				Mô tả công việc
			</div>
			<div class="des-job-detail">
				<p>- Thực hiện các thủ tục pháp lý liên quan đến thành lập, thay đổi, chia tách, sáp nhập doanh nghiệp, đầu tư tài chính, đầu tư xây dựng… và các hoạt động khác của công ty;</p>

				<p>-  Tham gia trong việc dự thảo, sửa đổi, xây dựng cập nhật các nội quy, quy định của công ty và đảm bảo rằng tất cả các nội quy công ty tuân thủ pháp luật;</p>

				<p>-  Kiểm tra tính pháp lý các hợp đồng, văn bản quy chế hoạt động do các đơn vị trong công ty dự thảo và đề xuất;</p>

				<p>-  Chuẩn bị các báo cáo định kỳ và các báo cáo theo yêu cầu đột xuất của ban lãnh đạo;</p>

				<p>-  Tư vấn, soạn thảo, báo cáo HĐQT, Ban lãnh đạo về tất cả những công việc có liên quan đến lĩnh vực chuyên môn cũng như các hoạt động có liên quan theo yêu cầu.</p>
			</div>
			<div class="title-job-detail">
				Yêu cầu công việc
			</div>
			<div class="des-job-detail">
				<p>- Tốt nghiệp Đại học chuyên ngành Luật chính quy trở lên</p>

				<p>- Có tối thiểu 3 năm kinh nghiệm làm việc. Ưu tiên ứng viên có kinh nghiệm làm việc tại các doanh nghiệp, tập đoàn đa ngành.</p>

				<p>- Thành thạo tiếng Anh pháp lý.</p>

				<p>- Thành thạo tin học văn phòng.</p>

				<p>- Kỹ năng soạn thảo văn bản, đàm phán tốt.</p>

				<p>- Có trách nhiệm với công việc, khả năng chịu được áp lực công việc cao.</p>
			</div>
		</div>
		<div class="container-detail-job">
			<div class="area-apply">
				<div class="title-apply">
					Ứng tuyển cho vị trí này
				</div>
				<form method="POST" action="">
					<div class="input-apply-group">
						<input type="text" name="name" placeholder="Họ và tên" class="form-control">
						<input type="email" name="email" placeholder="Email" class="form-control">
						<input type="text" name="phone" placeholder="Số điện thoại" class="form-control">
						<div class="btn-upload-file-apply display-md" onclick="$('#file_apply').click()">
							Tải lên CV của bạn.
						</div>
					</div>
					<div class="btn-upload-file-apply hidden-md" onclick="$('#file_apply').click()">
						Tải lên CV của bạn.
					</div>
					<input type="file" name="" id="file_apply">
					<div class="btn-submit-apply">
						<button type="submit" class="btn">Nộp hồ sơ ứng tuyển</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('page-styles')
	<style>
		.navbar-top-area .title-page {
			padding-bottom: 87px;
		}
	</style>
@endsection