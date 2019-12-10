@extends('pages.web.layouts.app')
@section('title')
{{@$cultural_companies->meta_title}}
@endsection
@section('title-navbar')
	{{@$cultural_companies->title_page}}
@endsection

@section('nav-header')
	@include('pages.web.partials.title-style-1', ['content' => @$cultural_companies->title_page])
@endsection

@section('content')
	<div id="job-page">
		<div class="content-job-page section-introduce">
			<div class="img-job-page">
				<img src="{!! $cultural_companies->present()->coverImage()->present()->url !!}" class="img-fluid">
			</div>
			<div class="title-job-page">
				{{$cultural_companies->introduce}}
			</div>
			<div class="des-job-page">
				{{$cultural_companies->content}}
			</div>
			<div class="btn-list-job">
				<a href="{!! action('Web\JobController@listJob') !!}" class="btn">
					Danh sách việc làm
				</a>
			</div>
		</div>
		<div class="three-column-job section-job-reason">
			<div class="content-job-page">
				<div class="title-three-job">
					Tại sao chọn TTVN
				</div>
				<div class="row">
					<div class="col-md-4 reason-item">
						<div class="title-reason-job clearfix">
							@if(!empty($cultural_companies->present()->icon1Image()))
							<img src="{!! $cultural_companies->present()->icon1Image()->present()->url !!}">
							@endif
							<span>{{$cultural_companies->reason1}}</span>
						</div>
						<div class="content-reason-job">{{$cultural_companies->detail1}}</div>
					</div>
					<div class="col-md-4 reason-item">
						<div class="title-reason-job clearfix">
							@if(!empty($cultural_companies->present()->icon2Image()))
							<img src="{!! $cultural_companies->present()->icon2Image()->present()->url !!}" class="img-fluid">
							@endif
							<span>{{$cultural_companies->reason2}}</span>
						</div>
						<div class="content-reason-job">{{$cultural_companies->detail2}}</div>
					</div>
					<div class="col-md-4 reason-item">
						<div class="title-reason-job clearfix">
							@if(!empty($cultural_companies->present()->icon3Image()))
								<img src="{!! $cultural_companies->present()->icon3Image()->present()->url !!}" class="img-fluid">
							@endif
							<span>{{$cultural_companies->reason3}}</span>
						</div>
						<div class="content-reason-job">{{$cultural_companies->detail3}}</div>
					</div>
				</div>
			</div>
		</div>

		<div class="section-cultural">
			<div class="content-job-page">
				<div class="cultural-job">
					<div class="column-left">
						<div class="title-border-bottom">{{$cultural_companies->ttvn_title}}</div>
						<div class="des-cultural-job">{!! $cultural_companies->ttvn_content !!}</div>	
					</div>
					<div class="column-right">
						@if(!empty($cultural_companies->present()->ttvnImage()))
						<img src="{!! $cultural_companies->present()->ttvnImage()->present()->url !!}" class="img-fluid">
						@endif
					</div>
				</div>
			</div>
		</div>

		<div class="section-who-find">
			<div class="section-find-bg">
				
			</div>
			<div class="container">
				<div class="userfind-job">
					<div class="title-userfind-job">Chúng tôi tìm ai?</div>
					<div class="des-userfind-job">
						{{$cultural_companies->we_find_introduce}}
					</div>
					<div class="skill-job">
						@foreach($criteria_candidate as $key => $value)
							<div class="item-skill-job">
								<div class="item-wrapper">
									<div class="title-skill-job">
										@if(!empty($value->present()->iconImage()))
											<img src="{!! $value->present()->iconImage()->present()->url !!}" class="img-fluid">
										@endif
										<span>{{$value->name}}</span>
									</div>
									<div class="des-skill-job">
											{{$value->content}}
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>

		<div id="list-job-page" class="detail-jobs">
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
								@foreach($jobs as $job)
								<tr onclick="location.href='{!! action('Web\JobController@detail', $job->slug) !!}'" class="cursor-pointer">
									<td>
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
									</td>
									<td>{{$job->province}}</td>
									<td>{{$job->number}}</td>
									<td>{{$job->salary }}</td>
									<td>{!!  date('d/m/Y', (strtotime( $job->end_time))) !!}</td>
								</tr>
								<tr class="row-spacer">
									<td colspan="100"></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="list-job-mb">
						@foreach($jobs as $job)
						<div class="item-job-mb">
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
					<div class="view-all-job">
						<a href="{!! action('Web\JobController@listJob') !!}" class="btn btn-outline-success">
							Xem tất cả
						</a>
					</div>
				</div>
		</div>
	</div>
@endsection

@section('page-scripts')
	<script type="text/javascript">
		function drawBgFind() {
			maxHeight = $('.section-find-bg').height();
			maxWidth = $('.section-find-bg').width();
			ratio  = 0.08212058212;
			offset = (maxHeight* ratio)

			html = `
				<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 ${maxWidth} ${maxHeight}">
					<defs><style>.cls-1{fill:#f7f7f7;}</style></defs>
					<polygon class="cls-1" points="${maxWidth} ${offset} ${maxWidth} ${maxHeight} 0 ${maxHeight} 0 ${maxHeight} ${maxWidth} ${offset}"/>
				</svg>
			`;

			$('.section-find-bg').html(html);
		}
		window.onload = drawBgFind
		$(document).ready(function() {
			$(window).on('resize', function() {
				drawBgFind();
			})
		});
	</script>
@endsection
