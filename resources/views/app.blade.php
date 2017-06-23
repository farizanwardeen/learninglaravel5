<!dOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My First App</title>
	
	<!--
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset(elixir('css/all.css'))}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css">
    -->
    <!--
	<link rel="stylesheet"  href="/css/all.css">
    -->
     <link rel="stylesheet" href="{{ asset('css/all.css') }}" >

</head>
<body>
	 
	 @include('partials.nav');

	<div class="container">
		@include('flash::message')

		@yield('content')

	</div>
	
	<script src="{{ asset('js/all.js') }}"></script>
	<!--
	<script src="/js/all.js"></script>
	-->
	<!--
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	-->
	<script>

		$('#flash-overlay-modal').modal();
	//	$('div.alert').not('.alert-important').delay(3000).slideUp(300);
	</script>
	
	<!--
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
    -->
	@yield('footer')

</body>
</html>