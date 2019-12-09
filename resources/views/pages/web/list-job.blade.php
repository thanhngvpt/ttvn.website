@extends('pages.web.layouts.app')

@section('title-navbar')
	Danh sách tin tuyển dụng
@endsection
@section('title')
@foreach ($meta as $item)
    <?php 
	$url = trim( $item->link, "/" );
    ?>
	@if(Request::url() === $url)
		{{$item->meta_title}}
	@endif	
@endforeach
@endsection


@section('content')
	<div id="list-job-page">
		<div class="area-list-job">
			<div class="form-search-job">
				<div class="title-search-job">
					Tìm kiếm việc làm
				</div>
				<form method="POST" action="#" id="form-search">
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
						<button type="submit" id="submit-search" class="btn">Tìm kiếm</button>
					</div>
				</form>
			</div>
			<div class="box-search-result">
				<p class="search-counter"><span class="count-num">04</span> kết quả tìm kiếm</p>
				<hr>
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
						<tr data-link="{!! action('Web\JobController@detail', $job->slug) !!}" class="cursor-pointer click-action">
							<td>
								<div class="wrapper-first">
									<a href="#" class="name-job">
										{{$job->name}}
									</a>
									<div class="company-job">
										@if(empty($job->company))
										Công ty CP Tập đoàn Trường Thành Việt Nam (TTVN Group)
										@else
										{{$job->company->name}}
										@endif
									</div>
								</div>
							</td>
							<td>{{$job->province}}</td>
							<td>{{$job->number}}</td>
							<td>{{$job->salary }}</td>
							<td>
								<div class="wrapper-last">
								{!!  date('d/m/Y', (strtotime( $job->end_time))) !!}
								</div>
							</td>
						</tr>
						<tr class="row-spacer">
							<td colspan="100"></td>
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
								@if(empty($job->company))
								Công ty CP Tập đoàn Trường Thành Việt Nam (TTVN Group)
								@else
								{{$job->company->name}}
								@endif
						</div>
						<div class="info-job-mb">
							<img src="{{ asset('images/icon-info-1.svg') }}" class="img-fluid" />
							<span>{{$job->province}}</span>
						</div>
						<div class="info-job-mb">
							<img src="{{ asset('images/icon-info-2.svg') }}" class="img-fluid" />
							<span>{{$job->number}}</span>
						</div>
						<div class="info-job-mb">
							<img src="{{ asset('images/icon-info-3.svg') }}" class="img-fluid" />
							<span>{{$job->salary }}</span>
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
			@if($data['total_page'] > 1)
			<ul class="pagination arrow-pagination">
				<li class="page-item previous-page"><a class="page-link"><i class="fas fa-chevron-left"></i></a></li>
				@for($i=1;$i<=$data['total_page'];$i++)
					<li class="page-item @if ($data['current_page'] == $i) active @endif child-item" data-page-number="{{$i}}"><a class="page-link">{{$i}}</a></li>
				@endfor
				<li class="page-item next-page"><a class="page-link"><i class="fas fa-chevron-right"></i></a></li>
			</ul>
			@endif
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
				$('#province').append($("<option></option>").attr("value",value).text(value)); 
		   	});

			function scrollToTop(topPos) {
				$('html, body').animate({scrollTop: topPos}, 500);
			}

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
						scrollToTop($(".list-job").offset().top - 100)
					}
				});
			})

			$('#form-search').on('submit', function(e) {
				e.preventDefault();

				let category_id = $('#category').val()
				let province = $('#province').val()
				let keyword = $('#keyword').val()
			
				$.ajax({
					url: "{{action('Web\JobController@listJob')}}",
					type: "GET",
					dataType:"json",
					beforeSend: function() {
						$('.box-search-result').hide();
					},
					data: {
						_token: "{!! csrf_token() !!}",
						category_id:category_id,
						province:province,
						keyword:keyword
					},
					success: function (res) {
						$('#tbody').html(res.html_desktop)
						$('.list-job-mb').html(res.html_mobile)
						$('.pagination').html(res.paginate);
						$('.count-num').text(parseInt(res.count) > 9 ? res.count : '0' + res.count);
						$('.box-search-result').show();
					}
				});
			})

			$(document).on('click', '.next-page', function() {
				let current_page = $('.page-item.active').data('page-number');
				let next_page = parseInt(current_page) + 1;

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
						scrollToTop($(".list-job").offset().top - 100)

					}
				});
			})

			$(document).on('click', '.previous-page', function() {
				let current_page = $('.page-item.active').data('page-number');
				let next_page = parseInt(current_page) - 1;

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
						scrollToTop($(".list-job").offset().top - 100)
					}
				});
			});

			$(document).on('click', 'tr.click-action', function() {
				location.href = $(this).attr('data-link')
			})
		})
		
	</script>
@endsection
