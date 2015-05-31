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
						<li>
							<a href="{{ url('/user/course') }}">
								<i class="glyphicon glyphicon-home"></i>
							我的课程 </a>
						</li>
						<li class="active">
							<a  href="{{ url('/user/profile') }}">
								<i class="glyphicon glyphicon-user"></i>
							个人资料 </a>
						</li>
						<li>
							<a href="{{ url('/user/password') }}" >
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
				<div class="panel-heading" style="border-bottom: 2px solid #EEE">个人资料</div>
				<div class="panel-body">
					@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>注意!</strong> 请更正以下输入信息.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/user/profile') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label class="col-md-4 control-label">邮箱</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">呢称</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ $user->name }}">
							</div>
						</div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">姓名</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="realname" value="{{ $profile->realname }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">性别</label>
                            <div class="col-md-6">
                                <label class="radio-inline">
                                    <input type="radio" name="sex" id="sex1" {{ $profile->sex==1?'checked':'' }} value="1"> 男
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="sex" id="sex2" {{ $profile->sex==2?'checked':'' }}  value="2"> 女
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">手机</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone" value="{{ $profile->phone }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">公司</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="company" value="{{ $profile->company }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">职位</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="{{ $profile->title }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">微信</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="weixin" value="{{ $profile->weixin }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">QQ</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="qq" value="{{ $profile->qq }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">个性签名</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="sign">{{ $profile->sign }}</textarea>
                            </div>
                        </div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
								提交
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
