<footer>
	<div class="container">
		<div class="logo-footer">
			<img src="{{ asset('images/logo-footer.svg') }}" class="img-fluid">
		</div>
		<div class="row">

			<div class="col-md-12 col-lg-7">
				@if (!empty($footerHQs) && $footerHQs->isNotEmpty())
						
							@foreach ($footerHQs as $footerHQ)
								<div class="row footer-row @if($loop->first) mb-3 @endif">
									<div class="col-md-6 col-lg-5 col-footer">
										<div class="title-col-footer">
											{{@$footerHQ->hn_name}}
										</div>
										<div class="content-col-footer">
											<div class="item-content-footer">
												<span class="title">
													Địa chỉ:
												</span>
												{{@$footerHQ->hn_address}}
											</div>
											<div class="item-content-footer">
												<span class="title">
													Tel:
												</span>
												{{@$footerHQ->hn_phone}}
											</div>
											<div class="item-content-footer">
												<span class="title">
													Fax:
												</span>
												{{@$footerHQ->hn_fax}}
											</div>
										</div>
									</div>
									<div class="col-md-6 col-lg-7 col-footer office-column">
										<div class="title-col-footer">
											{{@$footerHQ->other_name}}
										</div>
										<div class="content-col-footer">
											<div class="item-content-footer" style="width: 80%">
												<span class="title">
													Địa chỉ:
												</span>
												{{@$footerHQ->other_address}}
											</div>
											<div class="item-content-footer">
												<span class="title">
													Tel:
												</span>
												{{@$footerHQ->other_phone}}
											</div>
											<div class="item-content-footer">
												<span class="title">
													Fax:
												</span>
												{{@$footerHQ->other_fax}}
											</div>
										</div>
									</div>
								</div>
							@endforeach
						
				@endif
			</div>

			<div class="col-md-12 col-lg-5">
				<div class="row">
					<div class="col-md-6 col-lg-5 col-footer">
						<div class="title-col-footer">
							Danh mục
						</div>
						<div class="content-col-footer">
							<a class="item-content-footer" href="/">Trang chủ</a>
							<a class="item-content-footer" href="{!!action('Web\IntroduceCompanyController@index')!!}">Giới thiệu tập đoàn</a>
							<a class="item-content-footer" href="{!!action('Web\ScopeActiveController@index', @$menu_fields[0]->slug)!!}">Lĩnh vực hoạt động</a>
							<a class="item-content-footer" href="{!!action('Web\NewsController@index', 'tat-ca')!!}">Tin tức</a>
							<a class="item-content-footer" href="{!! action('Web\JobController@index') !!}">Tuyển Dụng</a>
							<a class="item-content-footer" href="/lien-he">Liên hệ</a>
						</div>
					</div>
					<div class="col-md-6 col-lg-7 col-footer connect-us">
						<div class="title-col-footer">
							Kết nối với chúng tôi
						</div>
						<ul class="contact-us-social">
							<li>
								<a href="{{@$footer->fb_link}}">
									<img src="{{ asset('images/icon-facebook.svg') }}" class="img-fluid">
								</a>
							</li>
							<li>
								<a href="{{@$footer->skype_link}}">
									<img src="{{ asset('images/icon-skype.svg') }}" class="img-fluid">
								</a>
							</li>
							<li>
								<a href="mailto:{{@$footer->email}}">
									<img src="{{ asset('images/icon-google.svg') }}" class="img-fluid">
								</a>
							</li>
						</ul>
					</div>
				</div>

			</div>
			
		</div>
	</div>
</footer>
