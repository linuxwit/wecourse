@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<ul class="list-group">
				<li class="list-group-item"><a href="/user/profile">个人资料</a></li>
				<li class="list-group-item"><a href="/user/avatar">头像设置</a></li>
				<li class="list-group-item"><a href="/user/email">邮箱验证</a></li>
				<li class="list-group-item"><a href="/user/password">修改密码</a></li>
			</ul>
		</div>
		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-body">

				</div>
			</div>
		</div>
	</div>
</div>
@endsection