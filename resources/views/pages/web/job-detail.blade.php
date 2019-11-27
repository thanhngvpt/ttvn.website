@extends('pages.web.layouts.app')

@section('title-navbar')
	<div class="mb-2">
		{{$job->name}}
	</div>
	<div class="number-detail-job">
		<div class="detail-job-left">
			<div class="item-number-detail">
				<img src="{{ asset('images/icon-job-1.svg') }}" class="img-fluid" />
				<span>{{$job->province}}</span>
			</div>
			<div class="item-number-detail">
				<img src="{{ asset('images/icon-job-2.svg') }}" class="img-fluid" />
				<span>{{$job->number}}</span>
			</div>
		</div>
		<div class="detail-job-right">
			<div class="item-number-detail">
				<img src="{{ asset('images/icon-job-3.svg') }}" class="img-fluid" />
				<span>{{$job->salary}} triệu</span>
			</div>
			<div class="item-number-detail">
				<img src="{{ asset('images/icon-job-4.svg') }}" class="img-fluid" />
				<span>{!!  date('d/m/Y', (strtotime( $job->end_time))) !!}</span>
			</div>
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
				{!! $job->description !!}
			</div>
		</div>
		<div class="container-detail-job">
			<div class="area-apply">
				<div class="title-apply">
					Ứng tuyển cho vị trí này
				</div>
				<form method="POST" action="{!! action('Web\JobController@postCV') !!}" enctype="multipart/form-data">
					@csrf
					<input type="hidden" value="{{$job->slug}}" name="slug">
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
					<input type="file" name="file" id="file_apply" value="{{ old('file') ?? old('file')}}">
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
