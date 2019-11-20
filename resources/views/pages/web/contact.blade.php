@extends('pages.web.layouts.app')

@section('title-navbar')
	Liên hệ
@endsection

@section('content')
	<div id="contact-page">
		<div class="form-contact-area">
			<form method="POST" action="" class="form-contact">
				@csrf
				<div class="title-contact">
					Liên hệ với chúng tôi
				</div>
				<div class="item-form-contact">
					<input type="text" name="name" class="form-control is-invalid" placeholder="Họ và tên">
					<div class="invalid-feedback">
						Email chưa đúng
					</div>
				</div>
				<div class="item-form-contact">
					<input type="text" name="email" class="form-control" placeholder="Email">
				</div>
				<div class="item-form-contact">
					<input type="text" name="phone" class="form-control" placeholder="Số điện thoại">
				</div>
				<div class="item-form-contact">
					<textarea name="content" placeholder="Nội dung" class="form-control" rows="5"></textarea>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-outline-success">Gửi</button>
				</div>
			</form>
		</div>
		<div class="contact-map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.1062393246775!2d105.7760800144074!3d21.028434693166517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b2f431c099%3A0xe44043bacd461128!2zQuG6v24geGUgTeG7uSDEkMOsbmg!5e0!3m2!1svi!2s!4v1571506147155!5m2!1svi!2s" width="2560" height="657" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
		</div>
	</div>
@endsection