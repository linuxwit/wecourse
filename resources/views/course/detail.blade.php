@extends('app')
@section('content')
<div class="container-fluid">
	<h4>{{ $doc->title}} <small></small></h4>
	<div class="row hidden-md hidden-lg">
		<div class="col-md-12">
			<div class="thumbnail">
				<a href="/wecourse/course/{{ $doc->id }}" class="col-md-5 col-lg-4  img-responsive">
					<img src="{{ $doc->cover }}" >
				</a>
				<div class="caption col-md-7 col-lg-8">
					<h4><a href="/wecourse/course/{{ $doc->id }}">{{$doc->title}}</a>
					</h4>
					<p>{{ $doc->subtitle }}</p>
					<div class="row">
						<p  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="/course/{{ $doc->id }}/join" class="btn btn-danger pull-right" role="button">我要报名</a>
						</p>
						<p  class="col-sm-12 col-md-12 col-lg-12">
							<small class="pull-left">开课城市：{{$doc->city}}</small>
							<small class="pull-right">开课时间：{{ date('Y-m-d',strtotime($doc->endtime))}}</small>
						</p>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<div class="well hidden-xs hidden-sm">
		<div class="media">
			<div class="media-left">
				<a href="#">
					<img class="media-object" src="{{ $doc->cover }}" alt="...">
				</a>
			</div>
			<div class="media-body">
				<h4 class="media-heading">{{ $doc->title}}</h4>
				<p>开课城市：{{ $doc->city }}</p>
				<p>开课时间：{{ date('Y-m-d',strtotime($doc->begintime)) }}</p>
				<p><a href="/course/{{ $doc->id }}/join" class="btn btn-danger" role="button">立即报名</a></p>
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
					<div class="media">
						<div class="media-left">
							<a href="/wecourse/teacher/1">
								<img class="media-object img-circle" style="height: 50px;widows: 50px;" src="" alt="">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading">{{ $teacher->name}}</h4>
							<p>
								{{ $teacher->summary}}
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<nav class="navbar navbar-default navbar-fixed-bottom nav-bottom hidden-md hidden-lg">
	<ul class="nav navbar-nav row">
		<li class="pull-left text-center" style="width:25%"><a href="/course">返回</a></li>
		<li class="pull-left text-center" style="width: 50%;border-left: 1px solid #CCC;border-right: 1px solid #CCC;"><a href="/course/{{ $doc->id }}/join">立即报名</a></li>
		<li class="pull-left text-center" style="width: 25%"><a href="#" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">...</a></li>
	</ul>
</nav>
@endsection