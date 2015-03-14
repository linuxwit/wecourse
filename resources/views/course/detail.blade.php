@extends('app')
@section('content')
<div class="container-fluid">
	<h4>{{ $doc->title}} <small></small></h4>
	<div class="thumbnail">
		<a href="/wecourse/course/{{ $doc->id }}" class="img-responsive"><img src="{{ $doc->cover }}" ></a>
		<div class="caption">
			<div class="row">
				<div class='col-md-12'><small>开课城市：{{ $doc->city }}</small><small class="pull-right">开课时间：{{ date('Y-m-d',strtotime($doc->begintime)) }}</small></div>
				<div class='col-md-12'>
					<a href="/join/course/{{ $doc->id }}" class="btn btn-danger pull-right" role="button">立即报名</a>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div role="tabpanel">
			<ul class="nav nav-tabs box-tabs" role="tablist">
				<li role="presentation" class="active">
					<a href="#tab1" aria-controls="home" role="tab" data-toggle="tab">课程大纲</a>
				</li>
				<li role="presentation" >
					<a href="#tab2" aria-controls="messages" role="tab" data-toggle="tab">课程详情</a>
				</li>
				<li role="presentation" >
					<a href="#tab3" aria-controls="messages" role="tab" data-toggle="tab">授课讲师</a>
				</li>
			</ul>
			<div class="tab-content" >
				<div role="tabpanel" class="tab-pane active " id="tab1" style="border: none">
					{{ $doc->summary}}
				</div>
				<div role="tabpanel" class="tab-pane " id="tab2" style="border: none">
					{{ $doc->content}}
				</div>
				<div role="tabpanel" class="tab-pane" id="tab3">
					<div class="panel panel-default">
						<div class="panel-heading">课程名称</div>
						<div class="panel-body">
							<p>{{ $doc->title }}</p>
							<p>{{ $doc->subtitle }}</p>
						</div>
						<div class="panel-heading">讲师</div>
						<div class="panel-body">
							<div class="media">
								<div class="media-left">
									<a href="/wecourse/teacher/1">
										<img class="media-object img-circle" style="height: 50px;widows: 50px;" src="/upload/image/teacher/avatar_1.png" alt="">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading">沈周俞</h4>
									（IPTS）国际讲师协会讲师
									O2O微系统模式创始人
									中国最大培训社群“O学社”创始人
									香港华人商学院特聘教授
									北大电子商务课题组讲师
									“K师团”金牌讲师
									中华商学院O2O课题组组长
									365咖啡创办人
									深圳韵商易购总顾问
									上海奥丽莎礼服定制总顾问
								</div>
							</div>
							<p class="text-right"><a href="/wecourse/teacher/1">了解更多</a></p>
						</div>
						<div class="panel-heading">课程介绍</div>
						<div class="panel-body">
							{{ $doc->content}}
						</div>
						<div class="panel-heading">课程基本信息</div>
						<div class="panel-body">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-default navbar-fixed-bottom nav-bottom">
		<ul class="nav navbar-nav row">
			<li class="pull-left text-center" style="width:25%"><a href="/wecourse/course">返回</a></li>
			<li class="pull-left text-center" style="width: 50%;border-left: 1px solid #CCC;border-right: 1px solid #CCC;"><a href="/wecourse/">立即报名</a></li>
			<li class="pull-left text-center" style="width: 25%"><a href="#" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">...</a></li>
		</ul>
	</nav>
	@endsection