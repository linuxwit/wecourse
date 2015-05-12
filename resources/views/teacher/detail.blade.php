@extends('app')
@section('content')
<div class="container">
	<div class="media well">
		<div class="media-left">
			<a href="/teacher/{{$doc->id}}">
				<img class="media-object img-circle" style="height: 120px;width: 120px;" src="{{ Config::get('app.qiniu')['domain'].$doc->avatar }}" alt="">
			</a>
		</div>
		<div class="media-body">
			<h4 class="media-heading"><a href="/teacher/{{$doc->id}}">{{ $doc->name }}</a></h4>
			<p style="height:100px">
				{!! $doc->summary!!}
			</p>
		</div>
	</div>
	<div class="row">
		@foreach ($courses as $item)
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<a href="/course/{{ $item->id }}" class="img-responsive"><img style="height: 200px;" src="{{ Config::get('app.qiniu')['domain'].$item->cover }}" alt="{{$item->title}}"></a>
				<div class="caption">
					<h4><a href="/course/{{ $item->id }}" title="{{$item->title}}">{{$item->title}}</a></h4>
					<p class="subtitle">{{ $item->subtitle }}</p>
					<div class="row">
						<p  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="/course/{{ $item->id }}" class="btn btn-danger pull-right" role="button">我要报名</a>
						</p>
						<p  class="col-sm-12 col-md-12 col-lg-12">
							<small class="pull-left">开课城市：{{$item->city}}</small>
							<small class="pull-right">开课时间：{{ date('Y-m-d',strtotime($item->endtime))}}</small>
						</p>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
</div>
@endsection