@extends('pages.web.layouts.app')
@section('title')
	{{$job->meta_title}}
@endsection

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
				<span>{{$job->salary}}</span>
			</div>
			<div class="item-number-detail">
				<img src="{{ asset('images/icon-job-4.svg') }}" class="img-fluid" />
				<span>{!!  date('d/m/Y', (strtotime( $job->end_time))) !!}</span>
			</div>
		</div>
	</div>
@endsection

@section('content')
	@if ($message = Session::get('success'))
	<div class="alert alert-success alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button>	
			<strong>{{ $message }}</strong>
	</div>
	@endif
	@if ($message = Session::get('error'))
	<div class="alert alert-danger alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button>	
			<strong>{{ $message }}</strong>
	</div>
	@endif
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
				<form method="POST" action="{!! action('Web\JobController@postCV') !!}" enctype="multipart/form-data" class="form-cv">
					@csrf
					<input type="hidden" value="{{$job->slug}}" name="slug">
					<div class="input-apply-group">
						<input type="text" name="name" placeholder="Họ và tên" class="form-control">
						<input type="text" name="email" placeholder="Email" class="form-control">
						<input type="number" name="phone" placeholder="Số điện thoại" class="form-control">
						<div class="btn-upload-file-apply display-md" onclick="$('#file_apply').click()">
							<span class="note-upload-cv">Tải lên CV của bạn.</span>
							<div class="preview-fileupload">
								<i class="fas fa-times"></i>
							</div>
						</div>
					</div>
					<div class="btn-upload-file-apply hidden-md" onclick="$('#file_apply').click()">
						<span class="note-upload-cv">Tải lên CV của bạn.</span>
						<div class="preview-fileupload">
							<i class="fas fa-times"></i>
						</div>
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

@section('page-scripts')
		<script>
			$('#file_apply').on('change', function (e) {
				let files = e.target.files
				if (files.length) {
					let filename = files[0].name
					$('.note-upload-cv').html(filename)
					$('.preview-fileupload').css('display', 'block')
				}
			});

			$('.preview-fileupload').on('click', function (event) {
				event.stopPropagation();
				$('#file_apply').val(null);
				$('.note-upload-cv').html('Tải lên CV của bạn.')
				$('.preview-fileupload').css('display', 'none')
			});

			$('.form-cv').on('submit', function(e) {
				e.preventDefault();
				let formData = new FormData($('.form-cv')[0]);

				$.ajax({
					url: "{!! action('Web\JobController@postCV') !!}",
					type: "POST",
					data: formData,
					processData: false,
					contentType: false,
					success: function (res) {
						$('.form-cv')[0].reset();
						let message = document.createElement("message");
							message.innerHTML='Thông tin của bạn đã được gửi <br> Chúng tôi sẽ liên hệ tư vấn với bạn trong thời gian sớm nhất'
							Swal.fire(
								'Thành công!',
								message,
								'success'
							)
					},
					error: function (response) {
						obj = response.responseJSON
						let message = document.createElement("message");
						if (typeof obj == "string") {
							message.innerHTML='Thông tin của  chưa được được gửi. <br/>Vấn đề có thể liên quan tới đường truyền internet của bạn.'
							Swal.fire('Xảy ra lỗi!', message, 'error')
							return false;
						}

						errors = obj.errors
						msg = ''
						Object.keys(errors).forEach(key => {
							msg +=`${errors[key][0]}<br/>`;
						});

						message.innerHTML = msg;
						Swal.fire('Xảy ra lỗi!', message, 'error')
						return false;
					}
				});
			})
		</script>
@endsection
