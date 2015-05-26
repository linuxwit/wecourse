@extends('app')
@section('content')
<div class="container">
	<div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="/img/avatar/cat.jpg" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						{{ $user->name}}
					</div>
					<div class="profile-usertitle-job">
						{{ $profile?$profile->title:''}}
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<!-- <div class="profile-userbuttons">
										<button type="button" class="btn btn-success btn-sm">Follow</button>
										<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>
				-->
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="{{ url('/user/course') }}">
								<i class="glyphicon glyphicon-home"></i>
							我的课程 </a>
						</li>
						<li>
							<a  href="{{ url('/user/profile') }}">
								<i class="glyphicon glyphicon-user"></i>
							个人资料 </a>
						</li>
						<li>
							<a href="{{ url('/user/password') }}" target="_blank">
								<i class="glyphicon glyphicon-ok"></i>
							修改密码 </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
			<div class="profile-content">
				<div class="panel-heading" style="border-bottom: 2px solid #DDD">我的课程</div>
				<div class="panel-body">
					<table class="table table-bordered text-center">
						<thead class="text-center">
							<tr >
								<th class="text-center">编号</th>
								<th class="text-center">课程名称</th>
								<th class="text-center">联系姓名</th>
								<th class="text-center">联系电话</th>
								<th class="text-center">所在公司</th>
								<th class="text-center">当前职位</th>
								<th class="text-center">报名时间</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($docs as $item)
							<tr>
								<td >{{$item->id}}</td>
								<td>{{$item->itemtitle}}</td>
								<td>{{$item->name}}</td>
								<td>{{$item->mobile}}</td>
								<td>{{$item->company}}</td>
								<td>{{$item->title}}</td>
								<td>{{$item->created_at}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<?php echo $docs->render();?>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection