@extends('admin')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-lg-12">
      <ol class="breadcrumb">
        <li><a href="/admin/user">图片管理</a></li>
        <li class="active">图片列表</li>
      </ol>
    </div>
    <div class="col-md-12 col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">图片管理</div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>编号</th>
                <th>图片</th>
                <th>图片地址</th>
                <th class="hide">存放位置</th>
                <th>同步</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($docs as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td> <img style="height: 80px" src="{{ Config::get('app.qiniu')['domain'].$item->cloudurl}}??imageView2/2/h/80" alt=""/> </td>
                <td> {{ Config::get('app.qiniu')['domain'].$item->cloudurl}} </td>
                <td class="hide">{{$item->localpath}}</td>
                <td>{{$item->sync==1?'是':'否'}}</td>
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