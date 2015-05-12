@extends('app')
@section('content')
<div class="container">
	<h4>{{ $doc->title}} <small></small></h4>
	<div class="row hidden-md hidden-lg">
		<div class="col-md-12">
			<div class="thumbnail">
				<a href="/wecourse/course/{{ $doc->id }}" class="img-responsive">
					<img  src="{{ Config::get('app.qiniu')['domain'].$doc->cover }}" alt="{{$doc->title}}"></a>
				</a>
				<div class="caption">
					<h4><a href="/wecourse/course/{{ $doc->id }}">{{$doc->title}}</a>
					</h4>
					<p>{{ $doc->subtitle }}</p>
					<div class="row">
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
				<a href="/course/{{ $doc->id }}" >
					<img class="media-object img-responsive" src="{{ Config::get('app.qiniu')['domain'].$doc->cover }}?imageView2/2/w/450" alt="{{$doc->title}}">
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
				<div role="tabpanel" class="tab-pane active " id="tab1" style="border: none;padding: 8px ">
					{!! $doc->summary!!}
				</div>
				<div role="tabpanel" class="tab-pane " id="tab2" style="border: none;padding: 8px ">
					{!! $doc->content!!}
				</div>
				<div role="tabpanel" class="tab-pane" id="tab3" style="border: none;padding: 8px 12px">
					<div class="media">
						<div class="media-left">
							<a href="/teacher/{{$teacher->id}}">
								<img class="media-object img-circle" style="height: 80px;width: 80px;" src="{{ Config::get('app.qiniu')['domain'].$teacher->avatar }}" alt="">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading">{{ $teacher->name }}</h4>
							<p>
								{!! $teacher->summary!!}
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<nav class="navbar navbar-default  navbar-fixed-bottom nav-bottom hidden-md hidden-lg">
	<ul class="nav nav-pills-bottom">
		<li class="text-center"><a href="/course">返回</a></li>
		<li class="text-center"><a href="/course/{{ $doc->id }}/join">立即报名</a></li>
		<li class="text-center"><a href="#" data-toggle="collapse" data-target="#nav-header-1">...</a></li>
	</ul>
</nav>
@endsection