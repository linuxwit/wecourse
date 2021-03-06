<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>学习互动吧</title>
	<link href="//cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
	<link href="//cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="/app/wecourse/style.css" rel="stylesheet">
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/wecourse">微课程</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="/wecourse">首页</a></li>
					<li><a href="/wecourse/course">课程</a></li>
					<li><a href="/wecourse/teacher">讲师</a></li>
					<li><a href="/wecourse/aboutus">关于我们</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="/auth/login">登录</a></li>
						<li><a href="/auth/register">免费注册</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/user/profile">我的课程</a></li>
								<li><a href="/user/profile">我的合作</a></li>
								<li><a href="/auth/logout">安全退出</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<script src="//cdn.bootcss.com/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdn.bootcss.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script>
    	window.jQuery || document.write('<script src="js/jquery.min.js"><\/script><script src="js/bootstrap.min.js"><\/script>') ;
	</script>
	<script src="/js/main.js"></script>
</body>
</html>
