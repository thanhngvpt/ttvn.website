@extends('pages.web.layouts.app')

@section('title-navbar')
	Liên hệ
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
	@if ($message = Session::get('success'))
	<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
		<strong>{{ $message }}</strong>
	</div>
	@endif
	<div id="contact-page">
		<div class="form-contact-area">
			{!! Form::open(['action' => 'Web\ContactController@index', 'class' => 'form-contact', 'method' => 'POST', 'id' => 'formData']) !!}
				<div class="title-contact">
					Liên hệ với chúng tôi
				</div>
				<div class="item-form-contact">
					{!! Form::text('text', null, ['class' => 'form-control ' . ($errors->has('email') ? 'is-invalid' : ''), 'placeholder' => 'Email', 'id' => 'email', 'type' => 'email']) !!}
					@if ($errors->has('email')) <div class="invalid-feedback">{{ $errors->first('email') }}</div> @endif
				</div>
				<div class="item-form-contact">
					{!! Form::text('name', null, ['class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''), 'placeholder' => 'Họ và tên', 'id' => 'name']) !!}
					@if ($errors->has('name')) <div class="invalid-feedback">{{ $errors->first('name') }}</div> @endif
				</div>
				<div class="item-form-contact">
					{!! Form::text('phone', null, ['class' => 'form-control ' . ($errors->has('phone') ? 'is-invalid' : ''), 'placeholder' => 'Số điện thoại', 'id' => 'phone']) !!}
					@if ($errors->has('phone')) <div class="invalid-feedback">{{ $errors->first('phone') }}</div> @endif
				</div>
				<div class="item-form-contact">
					{!! Form::textarea('content', null, ['class' => 'form-control ' . ($errors->has('content') ? 'is-invalid' : ''), 'id' => 'content', 'placeholder' => 'Nội dung', 'rows' => 5]) !!}
					@if ($errors->has('content')) <div class="invalid-feedback">{{ $errors->first('content') }}</div> @endif
				</div>
				<div class="text-center">
					<button type="submit" id="submit" class="btn btn-outline-success">Gửi</button>
				</div>
			{!! Form::close() !!}
		</div>
		<div class="contact-map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.1062393246775!2d105.7760800144074!3d21.028434693166517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b2f431c099%3A0xe44043bacd461128!2zQuG6v24geGUgTeG7uSDEkMOsbmg!5e0!3m2!1svi!2s!4v1571506147155!5m2!1svi!2s" width="2560" height="657" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
		</div>
	</div>
@endsection
@section('page-scripts')
	<script>
		$(document).ready(function() {
			$('.form-contact').on('submit', function(e) {
				e.preventDefault();
				let formData = new FormData($('#formData')[0]);

				$.ajax({
					url: "{!! action('Web\ContactController@index') !!}",
					type: "POST",
					data: formData,
					processData: false,
					contentType: false,
					success: function (res) {
						$('#formData')[0].reset();
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
						$('.invalid-feedback').remove();
						if (typeof obj == "string") {
							let message = document.createElement("message");
							message.innerHTML='Thông tin của  chưa được được gửi. <br/>Vấn đề có thể liên quan tới đường truyền internet của bạn.'
							Swal.fire('Xảy ra lỗi!', message, 'error')
							return false;
						}

						errors = obj.errors
						Object.keys(errors).forEach(key => {
							$('#' + key).addClass('is-invalid');
							$('#' + key).closest('.item-form-contact').append(`<div class="invalid-feedback">${errors[key][0]}</div>`);
						});
					}
				});
			})

			$('.form-control').on('input paste change', function() {
				$(this).removeClass('is-invalid');
				$(this).closest('.item-form-contact').find('.invalid-feedback').remove();
			})
		})
	</script>
@endsection
