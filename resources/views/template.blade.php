<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="{{ asset('klorofil/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('klorofil/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('klorofil/vendor/linearicons/style.css') }}">
	<link rel="stylesheet" href="{{ asset('klorofil/vendor/chartist/css/chartist-custom.css') }}">
	<link rel="stylesheet" href="{{ asset('klorofil/css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('klorofil/css/demo.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('klorofil/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('klorofil/img/favicon.png') }}">
</head>

<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="{{ asset('klorofil/img/logo-dark.png') }}" alt="Klorofil Logo"
						class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i
							class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img
									src="{{ asset('klorofil/img/user.png') }}" class="img-circle" alt="Avatar">
								<span>{{ auth()->user()->name }}</span> <i
									class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
								<li><a href="{{ url('logout') }}"><i class="lnr lnr-exit"></i> <span>Logout</span></a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li>
							<a href="{{ url('siswa') }}" class="@if(Request::segment(1) == 'dashboard') active @endif">
								<i class="lnr lnr-home"></i> <span>Dashboard</span>
							</a>
						</li>
						@if(auth()->user()->role == "admin")
						<li>
							<a href="{{ url('/siswa') }}" class="@if(Request::segment(1) == 'dashboard') active @endif">
								<i class="lnr lnr-user"></i> <span>Siswa</span>
							</a>
						</li>
						@endif
					</ul>
				</nav>
			</div>
		</div>

		@yield('main')

		<div class="clearfix"></div>
	</div>

	<script src="{{ asset('klorofil/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('klorofil/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('klorofil/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('klorofil/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ asset('klorofil/vendor/chartist/js/chartist.min.js') }}"></script>
	<script src="{{ asset('klorofil/scripts/klorofil-common.js') }}"></script>
	<script>
		$(".alert-dismissible").fadeTo(3000, 500).slideUp(500, function () {
			$(".alert-dismissible").slideUp(500);
		});
	</script>
</body>

</html>