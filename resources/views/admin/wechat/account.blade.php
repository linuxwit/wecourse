@extends('admin')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<ol class="breadcrumb">
				<li><a href="#">微信管理</a></li>
				<li class="active">我的公众号</li>
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
			<div class="row">
				@foreach ($accounts as $item)
				<div class="col-sm-6 col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<span>{{$item->name}}</span>
							<div class="dropdown pull-right">
								<a id="dLabel" href="#" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
									配置
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
									<li><a href="/wxmp/account/setting#welcome">欢迎语</a></li>
									<li><a href="/wxmp/account/setting#menu">菜单</a></li>
									<li><a href="/wxmp/account/setting#info">信息</a></li>
								</ul>
							</div>
						</div>
						<div class="panel-body">
							<p></p>
						</div>
						<ul class="list-group">
							<li class="list-group-item">接口地址：<strong>http://xue.mf23.cn/wechat/{{$item->uid}}</strong></li>
							<li class="list-group-item">AppId:<strong>{{$item->appid}}</strong></li>
							<li class="list-group-item">AppSecret:<strong>{{$item->appsecret}}</strong></li>
							<li class="list-group-item">Token:<strong>{{$item->token}}</strong></li>
							<li class="list-group-item">EncodingaesKey:<strong>{{$item->encodingaeskey}}</strong></li>
						</ul>
					</div>
				</div>
				@endforeach
				<div class="col-sm-6 col-md-4">
					<div class="panel panel-default box box-add-account">
						<a href="#" data-toggle="modal" data-target="#add_wx_mp">添加公众帐号</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="add_wx_mp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">添加公众帐号</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="formAccount" action="{{ URL('admin/account') }}" method="post">
					<fieldset>
					   <input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label class="col-md-3 control-label" for="name">公众号名称<span class="text-danger">*</span></label>
							<div class="col-md-9">
								<input type="text" name="name"  maxlength="32"  class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="type">类型<span class="text-danger">*</span></label>
							<div class="col-md-9">
								<label class="radio-inline">
									<input type="radio" name="type" id="type" value="服务号"> 服务号
								</label>
								<label class="radio-inline">
									<input type="radio" name="type" id="type" value="订阅号"> 订阅号
								</label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="audit">是否认证<span class="text-danger">*</span></label>
							<div class="col-md-9">
								<input type="checkbox" name="audit" value="1">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="appid">(AppId)ID<span class="text-danger">*</span></label>
							<div class="col-md-9">
								<input type="text" name="appid" maxlength="18"  class="form-control" placeholder="请在微信公众平台的开发者中心查找" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="appsecretid">AppSecret(应用密钥)<span class="text-danger">*</span></label>
							<div class="col-md-9">
								<input type="text" name="appsecret"  maxlength="32" class="form-control" placeholder="请在微信公众平台的开发者中心查找" required>
							</div>
						</div>
						<button type="submit">提交</button>
					</fieldset>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				<button type="button" class="btn btn-primary" onclick="submitFrom('#formAccount',true,'#add_wx_mp');return false" >确认</button>
			</div>
		</div>
	</div>
</div>
@endsection