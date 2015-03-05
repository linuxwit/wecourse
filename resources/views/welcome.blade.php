@extends('app')
@section('content')
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="jumbotron">
                <div class="container">
                    <h2>学习互动吧，</h2>
                    <p>国内最大的企业家思想学习网站</p>
                    <p><a class="btn btn-primary btn-lg" href="#" role="button">了解我们</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="jumbotron">
                <div class="container">
                    <h2>这里有丰富的教育课程，最重要的这里有最爱学习的企业家</h2>
                    <p>在这个最好的移动互联网创业时代，我们更要与时俱进</p>
                    <p><a class="btn btn-success btn-lg" href="#" role="button">加入我们</a></p>
                </div>
            </div>
        </div>
        <div class="item ">
            <div class="jumbotron">
                <div class="container">
                    <h2>O2O模式策略!</h2>
                    <p>中国最系统的O2O落地课程＂O2O模式策略＂总裁班，一次投资，终生免费复训</p>
                    <p><a class="btn btn-danger btn-lg" href="#" role="button">报名参家</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection