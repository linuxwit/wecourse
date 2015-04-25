<div class="panel" ng-controller="MpWelcomeCtrl">
	<form class="form-horizontal">
		<div class="form-group">
			<label for="name" class="col-sm-2 col-md-2 control-label">是否启用</label>
			<div class="col-sm-10 col-md-6">
				<div class="checkbox">
					<label>
						<input type="checkbox" ng-model="welcome.enable" ng-checked="welcome.enable==1">
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="name" class="col-sm-2 col-md-2 control-label">响应类型</label>
			<div class="col-sm-10 col-md-6">
				<div class="radio">
					<label>
						<input type="radio" name="replytype" id="replytype1" ng-checked="welcome.type=='text'" value="text"  ng-model="welcome.type">
						文字
					</label>
					<label class="hide">
						<input type="radio" name="replytype" id="replytype2"  ng-checked="welcome.type=='news'"  value="news" ng-model="welcome.type">
						图文
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="name" class="col-sm-2 col-md-2 control-label">事件响应内容</label>
			<div class="col-sm-10 col-md-6">
				<textarea class="form-control" rows="3" ng-model="welcome.content">{{$account->subscribecontent}} </textarea>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default" ng-click="save('{{ URL('admin/account/'.$account->id) }}/welcome/save')">保存</button>
			</div>
		</div>
	</form>
</div>