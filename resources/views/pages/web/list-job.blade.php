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
						<input type="text" id="keyword" name="keyword" class="form-control" placeholder="Từ khóa">
						<img src="{{ asset('images/icon-search.png') }}" class="img-fluid">
					</div>
					<div class="select-option-job facilty">
						<select class="form-control" id="category">
							<option value="0">Ngành nghề</option>
							@foreach($job_categories as $job_category)
								<option value="{{$job_category->id}}">{{$job_category->name}}</option>
							@endforeach()
						</select>
					</div>
					<div class="select-option-job workarea">
						<select class="form-control" id="province">
							<option value="all">Nơi làm việc</option>
						</select>
					</div>
					<div class="btn-search-job">
						<button type="button" id="submit-search" class="btn">Tìm kiếm</button>
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
					<tbody id="tbody">
						@foreach($data['jobs'] as $job)
						<tr onclick="location.href='{!! action('Web\JobController@detail', $job->slug) !!}'">
							<td>
								<a href="#" class="name-job">
									{{$job->name}}
								</a>
								<div class="company-job">
									{{$job->company->name}}
								</div>
							</td>
							<td>{{$job->company->province}}</td>
							<td>{{$job->number}}</td>
							<td>{{$job->salary }} triệu</td>
							<td>{!!  date('d/m/Y', (strtotime( $job->end_time))) !!}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="list-job-mb">
					@foreach($data['jobs'] as $job)
					<div class="item-job-mb" onclick="location.href='{!! action('Web\JobController@detail', $job->slug) !!}'">
						<div class="name-job-mb">
								{{$job->name}}
						</div>
						<div class="des-job-mb">
								{{$job->company->name}}
						</div>
						<div class="info-job-mb">
							<img src="{{ asset('images/icon-info-1.svg') }}" class="img-fluid" />
							<span>{{$job->company->province}}</span>
						</div>
						<div class="info-job-mb">
							<img src="{{ asset('images/icon-info-2.svg') }}" class="img-fluid" />
							<span>{{$job->number}}</span>
						</div>
						<div class="info-job-mb">
							<img src="{{ asset('images/icon-info-3.svg') }}" class="img-fluid" />
							<span>{{$job->salary }} triệu</span>
						</div>
						<div class="info-job-mb">
							<img src="{{ asset('images/icon-info-4.svg') }}" class="img-fluid" />
							<span>{!!  date('d/m/Y', (strtotime( $job->end_time))) !!}</span>
						</div>
					</div>
					@endforeach
			</div>
			<div class="download-cv">
				Ứng viên có thể tải mẫu ứng tuyển <a href="#">Tại đây</a>
			</div>
			<ul class="pagination">
				<li class="page-item"><a class="page-link"><i class="fas fa-chevron-left"></i></a></li>
				@for($i=1;$i<=$data['total_page'];$i++)
					<li class="page-item @if ($data['current_page'] == $i) active @endif child-item" data-page-number="{{$i}}"><a class="page-link">{{$i}}</a></li>
				@endfor
				<li class="page-item"><a class="page-link"><i class="fas fa-chevron-right"></i></a></li>
			</ul>
		</div>
	</div>
@endsection
@section('page-scripts')
	<script>
		$(document).ready(function() {
			var provinces = [];
            $.each(masterData, function (key, value) {
                provinces.push(value.name);
			});
			$.each(provinces, function(key, value) {   
				$('#province')
					.append($("<option></option>")
							   .attr("value",value)
							   .text(value)); 
		   });
		})
		$(document).on('click', '.child-item', function() {
			let next_page = $(this).data('page-number');
			let category_id = $('#category').val()
			let province = $('#province').val()
			let keyword = $('#keyword').val()
		
			$.ajax({
				url: "{{action('Web\JobController@listJob')}}",
				type: "GET",
				dataType:"json",
				data: {
					_token: "{!! csrf_token() !!}",
					page: next_page,
					category_id:category_id,
					province:province,
					keyword:keyword
				},
				success: function (res) {
					$('#tbody').html(res.html_desktop)
					$('.list-job-mb').html(res.html_mobile)
					$('.pagination').html(res.paginate)

				}
			});
		})

		$(document).on('click', '#submit-search', function() {
			let category_id = $('#category').val()
			let province = $('#province').val()
			let keyword = $('#keyword').val()
		
			$.ajax({
				url: "{{action('Web\JobController@listJob')}}",
				type: "GET",
				dataType:"json",
				data: {
					_token: "{!! csrf_token() !!}",
					category_id:category_id,
					province:province,
					keyword:keyword
				},
				success: function (res) {
					$('#tbody').html(res.html_desktop)
					$('.list-job-mb').html(res.html_mobile)
					$('.pagination').html(res.paginate)

				}
			});
		})
	</script>
@endsection
