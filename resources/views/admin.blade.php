<!DOCTYPE html>
<html lang="zh_cn" ng-app="wecourse">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>学习互动吧</title>
		<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="/assets/css/vendor.min.css" rel="stylesheet">
		<link href="/assets/css/admin.min.css" rel="stylesheet">
		<link href="/css/main.css" rel="stylesheet">
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-header-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">学习互动吧</a>
				</div>
				<div class="collapse navbar-collapse" id="nav-header-1">
					<ul class="nav navbar-nav">
						@if (Auth::user()->isadmin)
						<li><a href="/admin/user">用户管理</a></li>
						@endif
						@if (Auth::user()->ispartner || Auth::user()->isadmin)
						<li><a href="/admin/account">微信管理</a></li>
						<li><a href="/admin/course">课程管理</a></li>
						<li><a href="/admin/teacher">讲师管理</a></li>
						<li><a href="/admin/order">订单管理</a></li>
						<li><a href="/admin/media">图片管理</a></li>
						@endif
					</ul>
					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
						<li><a href="/auth/login">登录</a></li>
						<li><a href="/auth/register">免费注册</a></li>
						@else
							@if (Auth::user()->isadmin)
								<li><a href="/" target="_blank">浏览效果</a></li>
							@endif
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								{{ Auth::user()->name }}
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/user/profile">我的设置</a></li>
								<li><a href="/auth/logout">安全退出</a></li>
							</ul>
						</li>
						@endif
					</ul>
				</div>
			</div>
		</nav>
		@yield('content')
		<toaster-container toaster-options="{'position-class': 'toast-bottom-right','close-button':true}"></toaster-container>
		<!-- Scripts -->
		<script src="/assets/js/vendor.min.js"></script>
		<script src="/assets/js/admin.min.js"></script>
		<script src="/js/admin.js"></script>
	</body>
</html>