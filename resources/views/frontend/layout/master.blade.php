<!DOCTYPE html>
<html lang="zxx">
<head>
	@include('frontend.layout.head')
</head>
<body class="js">

	<!-- Preloader -->
    <div class="layer"></div>
	<!-- Mobile menu overlay mask -->

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preloader -->

	<!-- Header -->
	@include('frontend.layout.header')
	<!--/ End Header -->
	@yield('main-content')

	@include('frontend.layout.footer')

</body>
</html>
