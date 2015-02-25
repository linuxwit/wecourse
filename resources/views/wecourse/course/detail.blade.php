@extends('wecourse.layout')
@section('content')
<div class="container-fluid">
	<h4 class="text-center">O2O模式策略</h4>
	<img src="/upload/image/course/640.png" class="img-responsive" />
	<div role="tabpanel">
		<ul class="nav nav-tabs box-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#tab1" aria-controls="home" role="tab" data-toggle="tab">课程大纲</a></li>
			<li role="presentation" ><a href="#tab2" aria-controls="messages" role="tab" data-toggle="tab">课程详情</a>
		</li>
	</ul>
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active " id="tab1">
			<p>
			<ul>
				<li>
					第一章：O2O模式定义
					<ul>
						<li>什么是O2O模式</li>
					</ul>
				</li>
				<li>
					第二章：O2O模式设计五大版块之企业文化
					<ul>
						<li>使命决定企业格局</li>
						<li>愿景决定方向</li>
						<li>定位决定市场</li>
						<li>定位决定市场</li>
					</li>
				</ul>
				<li>第三章：O2O模式设计五大版块之产品呈现</li>
				<li>十种盈利模式</li>
				<li>用互联网思维思考品牌营销</li>
				<li>销售系统</li>
			</ul>
			</p>
		</div>
		<div role="tabpanel" class="tab-pane" id="tab2">
			<div class="panel panel-default">
				<div class="panel-heading">课程名称</div>
				<div class="panel-body">
					O2O模式策略
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
					中国最系统的O2O落地课程＂O2O模式策略＂总裁班，一次投资，终生免费，帮助企业建设O2O微系统模式，构建以消费者为核心的粉丝体系.
				</div>
				<div class="panel-heading">课程基本信息</div>
				<div class="panel-body">
					<p>时间: 2015年3月5日〜2015年3月8日</p>
					<p>地址: 北京人民大会堂</p>
				</div>
			</div>
		</div>
	</div>
</div>
<nav class="navbar navbar-default navbar-fixed-bottom nav-bottom">
	<ul class="nav navbar-nav row">
		<li class="pull-left text-center" style="width:20%"><a href="/wecourse/course">返回</a></li>
		<li class="pull-left text-center" style="width: 60%;border-left: 1px solid #CCC;border-right: 1px solid #CCC;"><a href="/wecourse/">立即报名</a></li>
		<li class="pull-left text-center" style="width: 20%"><a href="#" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">...</a></li>
	</ul>
</nav>
@endsection