<!doctype html>
<html lang="en">

<head>
	@yield('title')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('administrator/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('administrator/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('administrator/assets/vendor/linearicons/style.css')}}">

	<!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('administrator/assets/css/main.css')}}">

	<!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
        @include('layouts.includes.navbar')
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
        @include('layouts.includes.sidebar-nav')
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
        @yield('content')
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; Jidhan 2020<i class="fa fa-love"></i>
</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{asset('administrator/assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('administrator/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('administrator/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('administrator/assets/scripts/klorofil-common.js')}}"></script>


     <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
                <script>
                    $(document).ready(function(){
                        $('#lfm').filemanager('image');
                    });
                </script>

</body>
</html>
