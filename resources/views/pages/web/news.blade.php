@extends('pages.web.layouts.app')

@section('title-navbar')
	Tin tức - sự kiện
@endsection

@section('content')
	<div id="news-page">
		<div class="container">
			<ul class="nav nav-tabs">
			    <li class="nav-item">
			        <a class="nav-link active" data-toggle="tab" href="#tab_all">Tất cả</a>
			    </li>
			    <li class="nav-item">
			        <a class="nav-link" data-toggle="tab" href="#realty_tab">Bất động sản</a>
			    </li>
			    <li class="nav-item">
			        <a class="nav-link" data-toggle="tab" href="#technology_tab">Công nghệ</a>
			    </li>
			    <li class="nav-item">
			        <a class="nav-link" data-toggle="tab" href="#energy_tab">Năng lượng</a>
			    </li>
			    <li class="nav-item">
			        <a class="nav-link" data-toggle="tab" href="#menu2">Văn hoá</a>
			    </li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
			    <div class="tab-pane container active" id="home">...</div>
			    <div class="tab-pane container fade" id="menu1">...</div>
			    <div class="tab-pane container fade" id="menu2">...</div>
			</div>
		</div>
	</div>
@endsection