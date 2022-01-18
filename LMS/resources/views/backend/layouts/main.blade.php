<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>
	       {{ config('app.name', 'Laravel') }}
	</title>
    	<meta charset="UTF-8">
    	<meta name="description" content="WebUni Education Template">
    	<meta name="keywords" content="webuni, education, creative, html">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
   

	@yield('styles')
	@include('backend.layouts.styles')

</head>
<body class="app sidebar-mini">

	@include('backend.layouts.header')
    
	@yield('main')



	@include('backend.layouts.scripts')
	@yield('scripts')



	@include('backend.layouts.footer')

</body>
</html>

