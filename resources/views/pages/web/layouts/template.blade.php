@extends('pages.web.layouts.base')
@section('body')
    <div class="page-content">
        @include('pages.web.partials.navbar')
        <main role="main">
            @yield('content')
        </main>
    </div>
    @yield('content-after')
    @include('pages.web.partials.footer')
@endsection

@push('styles')
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"> --}}
    <link rel="stylesheet" href="/static/web/default/plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/web/default/plugins/slick/slick.min.css">
	<link rel="stylesheet" href="/static/web/default/plugins/slick/slick-theme.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.8.1/css/all.css">
@endpush

@push('scripts')
    {{-- <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script> --}}

    <script src="/static/web/default/plugins/jquery/jquery.min.js"></script>
    <script src="/static/web/default/plugins/bootstrap/dist/bootstrap.min.js"></script>
    <script src="/static/web/default/plugins/slick/slick.min.js"></script>
@endpush
