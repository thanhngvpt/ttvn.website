@extends('pages.web.layouts.app')

@section('title-navbar')
	Cơ hội nghề nghiệp tại TTVN Group
@endsection

@section('content')
	<div id="job-page">
		<div class="content-job-page">
			<div class="img-job-page">
				<img src="{{ asset('images/img-job.png') }}" class="img-fluid">
			</div>
			<div class="title-job-page">
				Bạn có thể làm điều bạn thích, và chúng tôi có thể giúp.
			</div>
			<div class="des-job-page">
				Chúng tôi tuyển dụng và đào tạo nhân sự hướng tới tinh thần làm việc Sáng tạo, Tận tâm, Chuyên nghiệp, Chính trực và Tinh thần đồng đội.
			</div>
			<div class="btn-list-job">
				<a href="#" class="btn">
					Danh sách việc làm
				</a>
			</div>
		</div>
		<div class="three-column-job">
			<div class="content-job-page">
				<div class="title-three-job">
					Tại sao chọn TTVN
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="title-reason-job clearfix">
							<div class="col-left">
								<img src="{{ asset('images/briefcase.png') }}" class="img-fluid">
							</div>
							<div class="col-left">
								<span>Môi trường làm việc trẻ</span>
							</div>
						</div>
						<div class="content-reason-job">
							TTVN với môi trường làm việc trẻ, không cấp bậc, thân thiện, chuyên nghiệp, khuyến khích sự năng động và sáng tạo.
						</div>
					</div>
					<div class="col-md-4">
						<div class="title-reason-job clearfix">
							<div class="col-left">
								<img src="{{ asset('images/business-contact.png') }}" class="img-fluid">
							</div>
							<div class="col-left">
								<span>Cơ hội phát triển bản thân</span>
							</div>
						</div>
						<div class="content-reason-job">
							TTVN có định hướng rõ ràng, có chiến lược cụ thể và kế hoạch hành động khả thi tạo cơ hội khẳng định và phát triển bản thân, nghề nghiệp.
						</div>
					</div>
					<div class="col-md-4">
						<div class="title-reason-job clearfix">
							<div class="col-left">
								<img src="{{ asset('images/money-coins.png') }}" class="img-fluid">
							</div>
							<div class="col-left">
								<span>Chế độ đãi ngộ cạnh tranh</span>
							</div>
						</div>
						<div class="content-reason-job">
							TTVN luôn ghi nhận năng lực và đóng góp không chỉ bằng khoản lương hàng tháng, mà còn là những chế độ thưởng dự án, sản phẩm hay ngày lễ.
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="content-job-page">
			<div class="cultural-job">
				<div class="column-left">
					<div class="title-cultural-job">
						Văn hóa TTVN
					</div>
					<div class="des-cultural-job">
						<p>Thành công của bạn cũng chính là thành công của TTVN.</p>
						<p>TTVN tự hào có một môi trường làm việc trẻ trung, thân thiện, chuyên nghiệp hướng tới sự năng động và sáng tạo.</p>
						<p>Không còn khoảng cách giữa các cấp quản lý và nhân viên. Không có cơ hội cho sự áp đặt, độc đoán. Mọi cá nhân đều được nói lên suy nghĩ, được lắng nghe, tôn trọng, thấu hiểu. </p>
						<p>Mọi nhân viên luôn được tạo điều kiện để tìm tòi, sáng tạo, nêu lên những đề xuất của mình, được tự do thể hiện năng lực của mình. Mọi sự cố gắng của các bạn sẽ được ghi nhận và đền đáp xứng đáng.</p>
					</div>	
				</div>
				<div class="column-right">
					<img src="{{ asset('images/job-cultural.png') }}" class="img-fluid">
				</div>
			</div>
		</div>
		<div class="detail-jobs">
			<div class="container">
				<div class="userfind-job">
					<div class="title-userfind-job">
						Chúng tôi tìm ai?
					</div>
					<div class="des-userfind-job">
						Hướng tới mục tiêu trở thành một trong 50 công ty hàng đầu Việt Nam, TTVN luôn chào đón các nhân sự trình độ cao, có kinh nghiệm trong lĩnh vực tài chính, năng lượng, hạ tầng, bất động sản gia nhập đội ngũ của chúng tôi.
					</div>
					<div class="skill-job">
						<div class="item-skill-job">
							<div class="title-skill-job">
								<img src="{{ asset('images/skill-one.png') }}" class="img-fluid">
								<span>Kĩ năng</span>
							</div>
							<div class="des-skill-job">
								Sử dụng tốt Tiếng Anh và các chương trình tin học ứng dụng văn phòng
							</div>
						</div>
						<div class="item-skill-job">
							<div class="title-skill-job">
								<img src="{{ asset('images/skill-two.png') }}" class="img-fluid">
								<span>Kĩ năng</span>
							</div>
							<div class="des-skill-job">
								Năng động, nhiệt tình, sáng tạo, trung thực, có tinh thần trách nhiệm, có khả năng chịu áp lực cao trong công việc
							</div>
						</div>
					</div>
					<div class="skill-job">
						<div class="item-skill-job">
							<div class="title-skill-job">
								<img src="{{ asset('images/skill-three.png') }}" class="img-fluid">
								<span>Kĩ năng</span>
							</div>
							<div class="des-skill-job">
								Có kỹ năng giao tiếp và làm việc độc lập hoặc theo nhóm với khả năng phân tích, đánh giá và tổng hợp
							</div>
						</div>
						<div class="item-skill-job">
							<div class="title-skill-job">
								<img src="{{ asset('images/skill-four.png') }}" class="img-fluid">
								<span>Kĩ năng</span>
							</div>
							<div class="des-skill-job">
								Ưu tiên ứng viên có kinh nghiệm chuyên môn từ 03 năm trở lên, từng làm việc tại các Tập đoàn hàng đầu trong và ngoài nước
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="content-job-page">
				<div class="title-feature-job">
					Danh sách việc làm nổi bật
				</div>
				<div class="list-job">
					<table>
						<thead>
							<tr>
								<th>TÊN</th>
								<th>ĐỊA ĐIỂM</th>
								<th>SỐ LƯỢNG</th>
								<th>MỨC LƯƠNG</th>
								<th>HẠN NỘP</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<a href="#" class="name-job">
										Kiến trúc sư thiết kế cảnh quan
									</a>
									<div class="company-job">
										Công ty Tập đoàn Trường Thành Việt Nam
									</div>
								</td>
								<td>Hà Nội</td>
								<td>03</td>
								<td>15-20 triệu</td>
								<td>31/12/2030</td>
							</tr>
							<tr>
								<td>
									<div class="name-job">
										Kiến trúc sư thiết kế cảnh quan
									</div>
									<div class="company-job">
										Công ty Tập đoàn Trường Thành Việt Nam
									</div>
								</td>
								<td>Hà Nội</td>
								<td>03</td>
								<td>15-20 triệu</td>
								<td>31/12/2030</td>
							</tr>
							<tr>
								<td>
									<div class="name-job">
										Kiến trúc sư thiết kế cảnh quan
									</div>
									<div class="company-job">
										Công ty Tập đoàn Trường Thành Việt Nam
									</div>
								</td>
								<td>Hà Nội</td>
								<td>03</td>
								<td>15-20 triệu</td>
								<td>31/12/2030</td>
							</tr>
							<tr>
								<td>
									<div class="name-job">
										Kiến trúc sư thiết kế cảnh quan
									</div>
									<div class="company-job">
										Công ty Tập đoàn Trường Thành Việt Nam
									</div>
								</td>
								<td>Hà Nội</td>
								<td>03</td>
								<td>15-20 triệu</td>
								<td>31/12/2030</td>
							</tr>
							<tr>
								<td>
									<div class="name-job">
										Kiến trúc sư thiết kế cảnh quan
									</div>
									<div class="company-job">
										Công ty Tập đoàn Trường Thành Việt Nam
									</div>
								</td>
								<td>Hà Nội</td>
								<td>03</td>
								<td>15-20 triệu</td>
								<td>31/12/2030</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="view-all-job">
					<a href="" class="btn btn-outline-success">
						Xem tất cả
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection