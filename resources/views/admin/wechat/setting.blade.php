@extends('admin')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<ol class="breadcrumb">
				<li><a href="/admin/account">微信管理</a></li>
				<li><a href="/admin/account">我的公众号</a></li>
				<li class="active">配置</li>
			</ol>
		</div>
		<div class="col-md-3 col-lg-2">
			<ul class="list-group">
				<li class="list-group-item"><a href="/admin/account">我的公众号</a></li>
				<li class="list-group-item"><a href="/admin/message">消息管理</a></li>
				<li class="list-group-item"><a href="/admin/media">素材管理</a></li>
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
							<li role="presentation" class="pull-right active"><a href="#info" aria-controls="messages" role="tab" data-toggle="tab">基本信息</a>
						</li>
					</ul>
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane " id="welcome">
							@include('admin.wechat.account_welcome', array('account'=>$account))
						</div>
						<div role="tabpanel" class="tab-pane" id="menu">
							@include('admin.wechat.account_menu', array('account'=>$account))
						</div>
						<div role="tabpanel" class="tab-pane active" id="info">
							@include('admin.wechat.account_info', array('account'=>$account))
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection