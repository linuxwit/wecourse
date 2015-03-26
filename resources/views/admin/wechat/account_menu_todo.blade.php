<<style type="text/css" media="screen">
	.device-preview {
    background: url("/img/phone-case.png") no-repeat scroll right top rgba(0, 0, 0, 0);
    height: 810px;
    position: absolute;
    right: 0;
    width: 380px;
    z-index: 1;
}

.device-preview > div {
    background-color: white;
    border: 4px solid #22272d;
    height: 576px;
    left: 33px;
    opacity: 0;
    position: absolute;
    top: 104px;
    transition: opacity 0.2s ease-in-out 0s;
    width: 328px;
    z-index: 0;
}

.device-preview > div.active-preview {
    opacity: 1;
    z-index: 100;
}

.content-wrapper {
    height: 100%;
    overflow: hidden !important;
}

.ionic-body {
    -moz-text-size-adjust: none;
    -moz-user-select: none;
    bottom: 0;
    color: #000;
    font-family: "Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
    font-size: 14px;
    left: 0;
    line-height: 20px;
    margin: 0;
    overflow: hidden;
    padding: 0;
    right: 0;
    text-rendering: optimizelegibility;
    top: 0;
    word-wrap: break-word;
}

</style>
<div class="row" >
	<div class="col-md-12">
		<h4></h4>
	</div>
	<div class="alert alert-warning alert-dismissible hide" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
		<strong>注意!</strong>
		<p>目前只有认证过的公众号、服务号可以在第三方平台自定义菜单。</p>
		<p>同步设置后需要24小时才能生效，或者重新关注公众帐号</p>
	</div>
	<div class="col-md-5 col-lg-4" >
		<div ng-app="devicePreview" class="device-preview ionic">
			<div class="screen-bg"></div>
			<div class="default-screen ionic-body active-preview">
				<div class="content-wrapper">
					<div class="content padding has-header"></div>
				</div>
			</div>
			<div class="ionic-body">
				<div style="position: relative;color:red">
					abc
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-7 col-lg-8">
		<div class="panel" style=" height:800px">
			<form class="form-horizontal">
				<div class="form-group">
					<label for="name" class="col-sm-2 col-md-2 control-label">菜单名称</label>
					<div class="col-sm-10 col-md-6">
						<input type="text" class="form-control" id="name" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="col-sm-2 col-md-2 control-label">菜单类型</label>
					<div class="col-sm-10 col-md-6">
						<div class="radio">
							<label>
								<input type="radio" name="eventtype" id="optionsRadios2" value="view" checked>
								链接
							</label>
							<label>
								<input type="radio" name="eventtype" id="optionsRadios1" value="click" >
								点击事件
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="col-sm-2 col-md-2 control-label">链接地址</label>
					<div class="col-sm-10 col-md-6">
						<input type="url" class="form-control" id="url" placeholder="http://www.example.com">
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="col-sm-2 col-md-2 control-label">事件ID</label>
					<div class="col-sm-10 col-md-6">
						<input type="text" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="col-sm-2 col-md-2 control-label">响应类型</label>
					<div class="col-sm-10 col-md-6">
						<div class="radio">
							<label>
								<input type="radio" name="replytype" id="replytype1" value="text" checked>
								文字
							</label>
							<label>
								<input type="radio" name="replytype" id="replytype2" value="article" >
								图文
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="col-sm-2 col-md-2 control-label">事件响应内容</label>
					<div class="col-sm-10 col-md-6">
						<textarea class="form-control" rows="3"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">保存</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>