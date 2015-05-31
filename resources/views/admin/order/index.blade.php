@extends('admin')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-lg-12">
      <ol class="breadcrumb">
        <li><a href="/admin/order">订单管理</a></li>
        <li class="active">订单列表</li>
      </ol>
    </div>
    <div class="col-md-12 col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">订单管理</div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>编号</th>
                <th>姓名</th>
                <th>电话</th>
                <th>公司</th>
                <th>职位</th>
                <th>课程名称</th>
                <th>渠道</th>
                <th>推荐人</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($docs as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->mobile}}</td>
                <td>{{$item->company}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->itemtitle}}</td>
                <td>{{$item->spm}}</td>
                <td>{{$item->source}}</td>
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