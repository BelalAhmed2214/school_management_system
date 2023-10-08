<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield("title", config('app.name'))</title>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<!-- Styles -->
	<!-- C3 Chart css -->
	<link href="{{ asset("assets/libs/c3/c3.min.css") }}" rel="stylesheet" type="text/css"/>

	<!-- Bootstrap Css -->
	<link href="{{ asset("assets/css/bootstrap.min.css") }}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
	<!-- Icons Css -->
	<link href="{{ asset("assets/css/icons.min.css") }}" rel="stylesheet" type="text/css"/>
	@yield("style")
	<!-- App Css-->
		<link href="{{ asset("assets/css/app-rtl.min.css") }}" id="app-style" rel="stylesheet" type="text/css"/>
		<link href="{{ asset("assets/css/app.min.css") }}" id="app-style" rel="stylesheet" type="text/css"/>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

</head>
<body data-sidebar="dark">
<!-- Begin page -->
<div id="layout-wrapper">
	@include("layouts.header")

    @include("layouts.sidebar")

	<div class="main-content">

		<div class="page-content">
			<div class="container-fluid">
				<div class="card">
					<div class="card-body">

						@yield("content")
					</div>
				</div>
			</div> <!-- container-fluid -->
		</div>
		<!-- End Page-content -->


	</div>


</div>
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{ asset("assets/libs/jquery/jquery.min.js") }}"></script>
<script src="{{ asset("assets/libs/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ asset("assets/libs/metismenu/metisMenu.min.js") }}"></script>
<script src="{{ asset("assets/libs/simplebar/simplebar.min.js") }}"></script>
<script src="{{ asset("assets/libs/node-waves/waves.min.js") }}"></script>

<!--C3 Chart-->
<script src="{{ asset("assets/libs/d3/d3.min.js") }}"></script>
<script src="{{ asset("assets/libs/c3/c3.min.js") }}"></script>

<script src="{{ asset("assets/libs/jquery-knob/jquery.knob.min.js") }}"></script>
    @yield("script")
<script src="{{ asset("assets/js/app.js") }}"></script>

</body>
</html>
