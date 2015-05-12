@extends('app')
@section('content')
<div class="container">
	<div class="row">
		@foreach ($docs as $item)
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
			<div class="media well">
				<div class="media-left">
					<a href="/teacher/{{$item->id}}">
						<img class="media-object img-circle" style="height: 120px;width: 120px;" src="{{ Config::get('app.qiniu')['domain'].$item->avatar }}" alt="">
					</a>
				</div>
				<div class="media-body">
					<h4 class="media-heading"><a href="/teacher/{{$item->id}}">{{ $item->name }}</a></h4>
					<p style="height:100px">
						{!! $item->summary!!}
					</p>
					<p class="pull-right"> <a  href="/teacher/{{$item->id}}">详细</a></p>
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