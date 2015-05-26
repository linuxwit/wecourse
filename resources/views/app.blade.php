<!DOCTYPE html>
<html lang="zh_cn">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>学习互动吧</title>
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/wecourse.css" rel="stylesheet">
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
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
						<li><a href="/course">课程</a></li>
						<li><a href="/teacher">讲师</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
						<li><a href="/auth/login">登录</a></li>
						<li><a href="/auth/register">免费注册</a></li>
						@else
						@if (Auth::user()->ispartner || Auth::user()->isadmin)
						<li><a href="/admin/course">后台管理</a></li>
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
		<div class="container">
			<footer>
				<div id="footer-white">
						<div class="row credits">
							<div class="col-md-12">
								Copyright &copy; {{ date('Y')}}. 众莲实业
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<!-- Scripts -->
		<script src="//cdn.bootcss.com/jquery/2.1.3/jquery.min.js"></script>
		<script src="//cdn.bootcss.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<script>
		window.jQuery || document.write('<script src="js/jquery.min.js"><\/script><script src="js/bootstrap.min.js"><\/script>');
		</script>
		<script src="/js/main.js"></script>
	</body>
</html>