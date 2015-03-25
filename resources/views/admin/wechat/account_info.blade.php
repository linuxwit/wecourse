<form class="form-horizontal padding" id="formAccount" action="{{ URL('admin/account/'.$account->id) }}" method="post">
	<fieldset>
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>注意!</strong>请检查以下是否输入正确.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<input name="_method" type="hidden" value="PUT">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<label for="name" class="col-sm-2 col-md-2 control-label">接口地址</label>
			<div class="col-sm-10 col-md-6">
				<input type="text" class="form-control" disabled id="name" value="http://xue.mf23.cn/wechat/{{$account->id}}">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="name">公众号名称<span class="text-danger">*</span></label>
			<div class="col-md-6">
				<input type="text" name="name"  maxlength="32" value="{{$account->name}}" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="type">类型</label>
			<div class="col-md-6">
				<label class="radio-inline">
					<input type="radio" name="type" id="type" checked value="服务号"> 服务号
				</label>
				<label class="radio-inline">
					<input type="radio" name="type" id="type" value="订阅号"> 订阅号
				</label>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="audit">是否认证</label>
			<div class="col-md-6">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="audit" value="1" {{ $account->audit?'checked':'' }} >
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="appid">(AppId)ID<span class="text-danger">*</span></label>
			<div class="col-md-6">
				<input type="text" name="appid" maxlength="18"  class="form-control" value="{{$account->appid}}" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="appsecret">AppSecret(应用密钥)<span class="text-danger">*</span></label>
			<div class="col-md-6">
				<input type="text" name="appsecret"  maxlength="32" class="form-control" value="{{$account->appsecret}}" required>
			</div>
		</div>
		<div class="form-group">
			<label for="name" class="col-sm-2 col-md-2 control-label">Token</label>
			<div class="col-sm-10 col-md-6">
				<input type="text" class="form-control" name="token"  value="{{$account->token}}" placeholder="">
			</div>
		</div>
		<div class="form-group">
			<label for="name" class="col-sm-2 col-md-2 control-label">EncodingAESKey</label>
			<div class="col-sm-10 col-md-6">
				<input type="text" class="form-control"  name="encodingaeskey"  value="{{$account->encodingaeskey}}">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default">保存</button>
			</div>
		</div>
	</form>