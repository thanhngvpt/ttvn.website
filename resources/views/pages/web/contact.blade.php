@extends('pages.web.layouts.app')

@section('title-navbar')
	Liên hệ
@endsection

@section('title')
@foreach ($meta as $item)
    <?php 
      $url = explode('/', $item->link);
      array_pop($url);
      $url = implode('/', $url);
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
			<form method="POST" action="{!! action('Web\ContactController@index') !!}" class="form-contact">
				@csrf
				<div class="title-contact">
					Liên hệ với chúng tôi
				</div>
				<div class="item-form-contact">
					{{--  is-invalid class error  --}}
					<input type="email" required name="email" id="email" class="form-control" placeholder="Email">
				</div>
				<div class="item-form-contact">
					<input type="text" name="name" id="name" required class="form-control" placeholder="Họ và tên">
				</div>
				<div class="item-form-contact">
					<input type="number" name="phone" id="phone" required class="form-control" placeholder="Số điện thoại">
				</div>
				<div class="item-form-contact">
					<textarea name="content" placeholder="Nội dung" id="content" required class="form-control" rows="5"></textarea>
				</div>
				<div class="text-center">
					<button type="button" id="submit" class="btn btn-outline-success">Gửi</button>
				</div>
			</form>
		</div>
		<div class="contact-map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.1062393246775!2d105.7760800144074!3d21.028434693166517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b2f431c099%3A0xe44043bacd461128!2zQuG6v24geGUgTeG7uSDEkMOsbmg!5e0!3m2!1svi!2s!4v1571506147155!5m2!1svi!2s" width="2560" height="657" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
		</div>
	</div>
@endsection
@section('page-scripts')
	<script>
		$(document).on('click', '#submit', function() {
			let email = $('#email').val();
			let name = $('#name').val();
			let phone = $('#phone').val();
			let content = $('#content').val();

			$.ajax({
				url: "{!! action('Web\ContactController@index') !!}",
				type: "POST",
				data: {
					_token: "{!! csrf_token() !!}",
					email: email,
					name: name,
					phone: phone,
					content: content
				},
				success: function (res) {
					$('#email').val("");
					$('#name').val("");
					$('#phone').val("");
					$('#content').val("");
					let message = document.createElement("message");
						message.innerHTML='Thông tin của bạn đã được gửi <br> Chúng tôi sẽ liên hệ tư vấn với bạn trong thời gian sớm nhất'
					Swal.fire(
						'Thành công!',
						message,
						'success'
						)
				}
			});
		})
	</script>
@endsection
