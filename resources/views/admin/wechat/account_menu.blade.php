<div class="row" ng-controller="MpMenuCtrl">
	<div class="col-md-12">
		<p>
			<div class="btn-group btn-group-sm" role="group" aria-label="...">
				<button type="button" class="btn btn-default btn-xs " ng-click="save('{{ URL('admin/account/'.$account->id) }}/menu/save')">保存</button>
				<button type="button" class="btn btn-default btn-xs btn-group-sm" ng-click="save('{{ URL('admin/account/'.$account->id) }}/menu/publish')">保存并发布</button>
				<button type="button" class="btn btn-default btn-xs btn-group-sm" ng-click="save('{{ URL('admin/account/'.$account->id) }}/menu?/revert')">撤消发布</button>
			</div>
		</p>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<button type="button" class="btn btn-default btn-xs " ng-click="addMenu()">＋ 添加一级菜单</button>
			</div>
			<div class="panel-body">
				<table class="table table-menu">
					<thead>
						<th style="width:10px"></th>
						<th>菜单项</th>
						<th class="text-center">操作</th>
					</thead>
				</table>
				<ul class="list-group">
					<li ng-repeat="(i, item) in menu.button" class="list-group-item" >
						<div class="row" >
							<div  class="col-md-8">
								<a href="javascript:void(0)">
									<span aria-hidden="true" class="glyphicon glyphicon-play"></span>
								</a>
								<input type="text" ng-model="item.name" ng-focus="selectMenuItem(item)"/>
								<a href="javascript:void(0)" style="padding-left:5px " ng-click="addSubMenu(item)">
									<span aria-hidden="true" class="glyphicon glyphicon-plus"></span>
								</a>
							</div>
							<ul class="list-inline col-md-4" >
								<li><a href="javascript:void(0)" ng-click="up(true,i)" ><span aria-hidden="true" class="glyphicon glyphicon-arrow-up"></span></a></li>
								<li><a href="javascript:void(0)" ng-click="down(true,i)"><span aria-hidden="true" class="glyphicon glyphicon-arrow-down"></span></a></li>
								<li><a href="javascript:void(0)" ng-click="toggle(true,i)"><span aria-hidden="true" class="glyphicon glyphicon-eye-open"></span></a></li>
								<li><a href="javascript:void(0)" ng-click="remove(true,i)"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a></li>
							</ul>
						</div>
						<div class="row">
							<ul class="list-group sub-list-group">
								<li ng-repeat="(j, subitem) in item.sub_button"  class="list-group-item" >
									<div class="row" ng-click="selectMenuItem(subitem)">
										<div  class="col-md-8">
											<span style="margin-left: 15px">|_</span><input type="text" ng-model="subitem.name"/>
										</div>
										<ul class="list-inline col-md-4" >
											<li><a href="javascript:void(0)" ng-click="up(false,i,j)" ><span aria-hidden="true" class="glyphicon glyphicon-arrow-up"></span></a></li>
											<li><a href="javascript:void(0)" ng-click="down(false,i,j)"><span aria-hidden="true" class="glyphicon glyphicon-arrow-down"></span></a></li>
											<li><a href="javascript:void(0)" ng-click="toggle(false,i,j)"><span aria-hidden="true" class="glyphicon glyphicon-eye-open"></span></a></li>
											<li><a href="javascript:void(0)" ng-click="remove(false,i,j)"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a></li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				菜单项配置
			</div>
			<div class="panel-body menu-item-setting">
				<div class="row" ng-show="!selectedNode.sub_button ">
					<div class="col-md-12">
						<div class="btn-group btn-group-xs" role="group" aria-label="...">
							<button type="button" class="btn btn-default btn-xs" ng-click="choose('keyword')">匹配关键字</button>
							<button type="button" class="btn btn-default btn-xs" ng-click="choose('text')">文本回复</button>
							<button type="button" class="btn btn-default btn-xs" ng-click="choose('link')">跳转网页</button>
							<button type="button" class="btn btn-default btn-xs" ng-click="choose('module')">业务模块</button>
						</div>
					</div>
					<div class="col-md-12">
						<div class="popover bottom " ng-class="{true: 'active', false: ''}[selectedNode.fun=='keyword']">
							<div class="arrow one"></div>
							<div class="popover-content">
								<p><input type="text" id="keyword" class="form-control" placeholder="请输入关键字" ng-model="selectedNode.keyword"/></p>
							</div>
						</div>
						<div class="popover bottom " ng-class="{true: 'active', false: ''}[selectedNode.fun=='text']">
							<div class="arrow two"></div>
							<div class="popover-content">
								<p><textarea class="form-control" id="text" placeholder="请输入响应的文本信息" ng-model="selectedNode.text"></textarea></p>
							</div>
						</div>
						<div class="popover bottom " ng-class="{true: 'active', false: ''}[selectedNode.fun=='link']">
							<div class="arrow three"></div>
							<div class="popover-content">
								<p><input type="url" class="form-control" id="url" placeholder="请输入要跳转的网络地址" ng-model="selectedNode.link" /></p>
							</div>
						</div>
						<div class="popover bottom " ng-class="{true: 'active', false: ''}[selectedNode.fun=='module']">
							<div class="arrow four"></div>
							<div class="popover-content">
								<select name="" class="form-control" id="module" ng-model="selectedNode.module" ng-change="changeModule()">
									<option value="">请选择</option>
									@foreach ($modules as $key=>$item)
										<option value="{{ json_encode($item)}}">{{$key}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>