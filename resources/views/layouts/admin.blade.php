<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Admin</title>
	<link rel="icon" href="{{asset('contents/admin')}}/assets/img/icon.ico" type="image/x-icon"/>
	<link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/azzara.min.css">
	<link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/demo.css">
	<link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/dataTables.bootstrap4.min.css">
	<script src="{{asset('contents/admin')}}/assets/js/plugin/webfont/webfont.min.js"></script>
	<link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/datepicker.css">
	<link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/style.css">
	<script src="{{asset('contents/admin')}}/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="{{asset('contents/admin')}}/assets/js/sweetalert.min.js"></script>
	<script>
	WebFont.load({
		google: {"families":["Open+Sans:300,400,600,700"]},
		active: function() {
			sessionStorage.fonts = true;
		}
	});
	</script>
</head>
<body>
	<div class="wrapper">
		<div class="main-header" data-background-color="purple">
			<div class="logo-header">
				<a href="index.html" class="logo">
					<img src="{{asset('contents/admin')}}/assets/img/logoazzara.svg" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">

				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									@if(Auth::user()->photo!='')
										<img src="{{asset('uploads/users/'.Auth::user()->photo)}}" alt="..." class="avatar-img rounded-circle">
									@else
										<img src="{{asset('uploads/avatar.jpg')}}" alt="..." class="avatar-img rounded-circle">
									@endif
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg">
											@if(Auth::user()->photo!='')
												<img src="{{asset('uploads/users/'.Auth::user()->photo)}}" alt="..." class="avatar-img rounded-circle">
											@else
												<img src="{{asset('uploads/avatar.jpg')}}" alt="..." class="avatar-img rounded-circle">
											@endif
										</div>
										<div class="u-text">
											<h4>{{Auth::user()->name}}</h4>
											<p class="text-muted">{{Auth::user()->email}}</p>
											<a href="{{ url('admin/user/profile/'.Auth::user()->slug) }}" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="{{ url('admin/user/profile/'.Auth::user()->slug) }}">My Profile</a>
									
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
								</li>
							</ul>
						</li>

					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar">

			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							@if(Auth::user()->photo!='')
								<img src="{{asset('uploads/users/'.Auth::user()->photo)}}" alt="..." class="avatar-img rounded-circle">
							@else
								<img src="{{asset('uploads/avatar.jpg')}}" alt="..." class="avatar-img rounded-circle">
							@endif
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{Auth::user()->name}}
									<span class="user-level">{{Auth::user()->roleInfo->role_name}}</span>
								</span>
							</a>
							<div class="clearfix"></div>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">NAVBAR</h4>
						</li>
						<li class="nav-item {{Request::is('admin')? 'active':''}}">
							<a href="{{url('admin')}}"><i class="fa fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item {{Request::is('admin/user')? 'active':''}}">
							<a href="{{url('admin/user')}}"><i class="fa fa-users"></i>
								<p>Users</p>
							</a>
						</li>
						<li class="nav-item {{Request::is('admin/income')? 'active':''}}">
							<a href="{{url('admin/income')}}"><i class="fa fa-gift"></i>
								<p>Income</p>
							</a>
						</li>
						<li class="nav-item {{Request::is('admin/expense')? 'active':''}}">
							<a href="{{url('admin/expense')}}"><i class="fa fa-ils"></i>
								<p>Expense</p>
							</a>
						</li>
						<li class="nav-item {{Request::is('admin/summary')? 'active':''}}">
							<a href="{{url('admin/summary')}}"><i class="fa fa-line-chart"></i>
								<p>Summary</p>
							</a>
						</li>
						<li class="nav-item {{Request::is('admin/income/category')? 'active':''}}">
							<a href="{{url('admin/income/category')}}"><i class="fa fa-hourglass"></i>
								<p>Income Category</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{url('admin/expense/category')}}"><i class="fa fa-hourglass-end"></i>
								<p>Expense Category</p>
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fa fa-cogs"></i>
								<p>Manage</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="#">
											<span class="sub-item">Basic Information</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="{{url('admin/recycle')}}"><i class="fa fa-recycle"></i>
								<p>Recycle</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
								<i class="fa fa-power-off"></i>
								<p>Logout</p>
							</a>
						</li>
					</ul>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			      @csrf
			  </form>
				</div>
			</div>
		</div>
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Dashboard</h4>
					</div>
					@yield('content')
				</div>
			</div>
		</div>
	</div>
</div>
<script src="{{asset('contents/admin')}}/assets/js/core/popper.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/core/bootstrap.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/plugin/moment/moment.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/ready.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/setting-demo.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/demo.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/jquery.dataTables.min.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js" integrity="sha512-VCHVc5miKoln972iJPvkQrUYYq7XpxXzvqNfiul1H4aZDwGBGC0lq373KNleaB2LpnC2a/iNfE5zoRYmB4TRDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/bootstrap-datepicker.js"></script>
<script src="{{asset('contents/admin')}}/assets/js/custom.js"></script>
@yield('script')
</body>
</html>
