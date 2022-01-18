<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
		@yield('seo')

	{{-- @php isset($title) ? $title = $title." | " . get_setting('site_title') : $title = get_setting('site_title') . ' | ' . get_setting('site_slogan') ; @endphp --}}

	<title>
	       {{ config('app.name', 'Laravel') }}
	</title>
    	<meta charset="UTF-8">
    	<meta name="description" content="WebUni Education Template">
    	<meta name="keywords" content="webuni, education, creative, html">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
   

	@yield('styles')
	@include('backend.admin.includes.styles')

</head>
<body class="app sidebar-mini">


	<?php if (!isset($active1)) {
		$active1 = '';
	} ?>
	<?php if (!isset($active2)) {
		$active2 = '';
	} ?>
	 <div id="app">
		 @include('backend.'. Auth::user()->role . '.includes.header')
		 
		 
		 @yield('main')
	 </div>

	
	@include('backend.admin.includes.scripts')
	@yield('scripts')


	
</body>
</html>