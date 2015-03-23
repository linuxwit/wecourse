@extends('app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<ol class="breadcrumb">
				<li><a href="#">微信管理</a></li>
				<li><a href="#">我的公众号</a></li>
				<li class="active">配置</li>
			</ol>
		</div>
		<div class="col-md-3 col-lg-2">
			<ul class="list-group">
				<li class="list-group-item"><a href="/wxmp/account">我的公众号</a></li>
				<li class="list-group-item"><a href="/wxmp/message">消息管理</a></li>
				<li class="list-group-item"><a href="/wxmp/media">素材管理</a></li>
			</ul>
		</div>
		<div class="col-md-9 col-lg-10">
			<div class="panel panel-default">
				<div class="container-fluid">
					<div role="tabpanel">
						<ul class="nav nav-tabs box-tabs" role="tablist">
							<li role="presentation"><span>学习互动吧</span></li>
							<li role="presentation" class="pull-right"><a href="#welcome" aria-controls="home" role="tab" data-toggle="tab">欢迎词</a></li>
							<li role="presentation" class="pull-right"><a href="#menu" aria-controls="profile" role="tab" data-toggle="tab">菜单</a></li>
							<li role="presentation" class="pull-right active"><a href="#info" aria-controls="messages" role="tab" data-toggle="tab">信息</a>
						</li>
					</ul>
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane " id="welcome">
							@include('wxmp.account_welcome', array('account'=>'data'))
						</div>
						<div role="tabpanel" class="tab-pane" id="menu">
							@include('wxmp.account_menu', array('account'=>'data'))
						</div>
						<div role="tabpanel" class="tab-pane active" id="info">
							@include('wxmp.account_info', array('account'=>'data'))
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection