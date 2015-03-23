<div class="row">
	<div class="col-md-12">
		<h4></h4>
	</div>
	<div class="col-md-5 col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading text-right">
				<div class="btn-group" role="group" aria-label="...">
					<button type="button" class="btn btn-default btn-group-sm">新增</button>
					<button type="button" class="btn btn-default btn-group-sm">还原</button>
					<button type="button" class="btn btn-default btn-group-sm">同步</button>
				</div>
			</div>
			<div class="panel-body">
				<div class="tree">
					<ul>
						<li>
							<span><i class="icon-folder-open"></i> 菜单1</span> <a href="">添加</a>
							<ul>
								<li>
									<span><i class="icon-minus-sign"></i> 子菜单</span>
								</li>
								<li>
									<span><i class="icon-minus-sign"></i> 子菜单</span>
								</li>
							</ul>
						</li>
						<li>
							<span><i class="icon-folder-open"></i> 菜单2</span>
							<ul>
								<li>
									<span><i class="icon-leaf"></i> 子菜单</span>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
			<strong>注意!</strong>
			<p>目前只有认证过的公众号、服务号可以在第三方平台自定义菜单。</p>
			<p>同步设置后需要24小时才能生效，或者重新关注公众帐号</p>
		</div>
	</div>
	<div class="col-md-7 col-lg-8">
		<div class="panel">
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