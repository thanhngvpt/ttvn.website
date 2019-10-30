<!DOCTYPE html>
<html lang="vi">
<head>
  	<meta charset="UTF-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta name="csrf-token" content="{{ csrf_token() }}">
  	<title>@yield('title')</title>
  	<link rel="shortcut icon" href="/favicon.ico">

  	@stack('meta')
  	@stack('styles')
  	@yield('page-styles')
</head>
<body @yield('body-class')>
	@yield('body')
	@stack('scripts')
	@yield('page-scripts')
</body>
</html>

