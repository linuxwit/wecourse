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
				<div class="col-sm-6 col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<span>学习互动吧</span>
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
							<p>用于描述公众号的用途</p>
						</div>
						<ul class="list-group">
							<li class="list-group-item">接口地址：http://xue.mf23.cn/wechat/123</li>
							<li class="list-group-item">AppId:</li>
							<li class="list-group-item">AppSecret:</li>
							<li class="list-group-item">Token</li>
							<li class="list-group-item">EncodingaesKey:</li>
						</ul>
					</div>
				</div>
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
				<form class="form-horizontal" id="formAccount" action="{{ URL('admin/account') }}" accept-charset="UTF-8" method="post">
					<fieldset>
						<div class="form-group">
							<label class="col-md-3 control-label" for="iAppId">公众号名称<span class="text-danger">*</span></label>
							<div class="col-md-9">
								<input type="text" name="appid"  maxlength="32"  class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="iAppId">类型<span class="text-danger">*</span></label>
							<div class="col-md-9">
								<input type="text" name="appid"  maxlength="32"  class="form-control" required>
							</div>
						</div>
							<div class="form-group">
							<label class="col-md-3 control-label" for="iAppId">是否认证<span class="text-danger">*</span></label>
							<div class="col-md-9">
								<input type="text" name="appid" value="{{ Input::old('name') }}" maxlength="18"  class="form-control" placeholder="请在微信公众平台的开发者中心查找" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="iAppId">(AppId)ID<span class="text-danger">*</span></label>
							<div class="col-md-9">
								<input type="text" name="appid" value="{{ Input::old('name') }}" maxlength="18"  class="form-control" placeholder="请在微信公众平台的开发者中心查找" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="iAppId">AppSecret(应用密钥)<span class="text-danger">*</span></label>
							<div class="col-md-9">
								<input type="text" name="appsecret" value="{{ Input::old('name') }}" maxlength="32" class="form-control" placeholder="请在微信公众平台的开发者中心查找" required>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				<button type="submit" class="btn btn-primary" onclick="submit('#formAccount')" >确认</button>
			</div>
		</div>
	</div>
</div>
@endsection