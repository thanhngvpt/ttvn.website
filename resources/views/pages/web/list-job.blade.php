@extends('pages.web.layouts.app')

@section('title-navbar')
	Danh sách tuyển dụng
@endsection

@section('content')
	<div id="list-job-page">
		<div class="area-list-job">
			<div class="form-search-job">
				<div class="title-search-job">
					Tìm kiếm việc làm
				</div>
				<form method="POST" action="">
					<div class="search-keyword">
						<input type="text" name="keyword" class="form-control" placeholder="Từ khóa">
						<img src="{{ asset('images/icon-search.png') }}" class="img-fluid">
					</div>
					<div class="select-option-job facilty">
						<select class="form-control">
							<option>Ngành nghề</option>
						</select>
					</div>
					<div class="select-option-job workarea">
						<select class="form-control">
							<option>Nơi làm việc</option>
						</select>
					</div>
					<div class="btn-search-job">
						<button type="submit" class="btn">Tìm kiếm</button>
					</div>
				</form>
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
			<div class="list-job-mb">
				<div class="item-job-mb">
					<div class="name-job-mb">
						Kiến trúc sư thiết kế cảnh quan
					</div>
					<div class="des-job-mb">
						Công ty Tập đoàn Trường Thành Việt Nam
					</div>
					<div class="info-job-mb">
						<img src="{{ asset('images/icon-info-1.svg') }}" class="img-fluid" />
						<span>Hà nội</span>
					</div>
					<div class="info-job-mb">
						<img src="{{ asset('images/icon-info-2.svg') }}" class="img-fluid" />
						<span>03</span>
					</div>
					<div class="info-job-mb">
						<img src="{{ asset('images/icon-info-3.svg') }}" class="img-fluid" />
						<span>15-20 triệu</span>
					</div>
					<div class="info-job-mb">
						<img src="{{ asset('images/icon-info-4.svg') }}" class="img-fluid" />
						<span>31/12/2030</span>
					</div>
				</div>
				<div class="item-job-mb">
					<div class="name-job-mb">
						Kiến trúc sư thiết kế cảnh quan
					</div>
					<div class="des-job-mb">
						Công ty Tập đoàn Trường Thành Việt Nam
					</div>
					<div class="info-job-mb">
						<img src="{{ asset('images/icon-info-1.svg') }}" class="img-fluid" />
						<span>Hà nội</span>
					</div>
					<div class="info-job-mb">
						<img src="{{ asset('images/icon-info-2.svg') }}" class="img-fluid" />
						<span>03</span>
					</div>
					<div class="info-job-mb">
						<img src="{{ asset('images/icon-info-3.svg') }}" class="img-fluid" />
						<span>15-20 triệu</span>
					</div>
					<div class="info-job-mb">
						<img src="{{ asset('images/icon-info-4.svg') }}" class="img-fluid" />
						<span>31/12/2030</span>
					</div>
				</div>
				<div class="item-job-mb">
					<div class="name-job-mb">
						Kiến trúc sư thiết kế cảnh quan
					</div>
					<div class="des-job-mb">
						Công ty Tập đoàn Trường Thành Việt Nam
					</div>
					<div class="info-job-mb">
						<img src="{{ asset('images/icon-info-1.svg') }}" class="img-fluid" />
						<span>Hà nội</span>
					</div>
					<div class="info-job-mb">
						<img src="{{ asset('images/icon-info-2.svg') }}" class="img-fluid" />
						<span>03</span>
					</div>
					<div class="info-job-mb">
						<img src="{{ asset('images/icon-info-3.svg') }}" class="img-fluid" />
						<span>15-20 triệu</span>
					</div>
					<div class="info-job-mb">
						<img src="{{ asset('images/icon-info-4.svg') }}" class="img-fluid" />
						<span>31/12/2030</span>
					</div>
				</div>
				<div class="item-job-mb">
					<div class="name-job-mb">
						Kiến trúc sư thiết kế cảnh quan
					</div>
					<div class="des-job-mb">
						Công ty Tập đoàn Trường Thành Việt Nam
					</div>
					<div class="info-job-mb">
						<img src="{{ asset('images/icon-info-1.svg') }}" class="img-fluid" />
						<span>Hà nội</span>
					</div>
					<div class="info-job-mb">
						<img src="{{ asset('images/icon-info-2.svg') }}" class="img-fluid" />
						<span>03</span>
					</div>
					<div class="info-job-mb">
						<img src="{{ asset('images/icon-info-3.svg') }}" class="img-fluid" />
						<span>15-20 triệu</span>
					</div>
					<div class="info-job-mb">
						<img src="{{ asset('images/icon-info-4.svg') }}" class="img-fluid" />
						<span>31/12/2030</span>
					</div>
				</div>
			</div>
			<div class="download-cv">
				Ứng viên có thể tải mẫu ứng tuyển <a href="#">Tại đây</a>
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
	</div>
@endsection