@extends('app')
@section('content')
<div class="container-fluid">
	<div class="row">
		@foreach ($docs as $item)
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<a href="/wecourse/course/{{ $item->id }}" class="img-responsive"><img src="{{ $item->cover }}" ></a>
				<div class="caption">
					<h4><a href="/wecourse/course/{{ $item->id }}">{{$item->title}}</a></h4>
					<p>{{ $item->subtitle }}</p>
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
	<div class="row text-center">
		<?php echo $docs->render();?>
	</div>
</div>
@endsection