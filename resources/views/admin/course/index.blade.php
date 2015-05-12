@extends('admin')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-lg-12">
      <ol class="breadcrumb">
        <li><a href="/admin/course">课程管理</a></li>
        <li class="active">用户列表</li>
      </ol>
    </div>
    <div class="col-md-2 col-lg-2">
      <ul class="list-group">
        <li class="list-group-item"><a href="/admin/course/create">添加课程</a></li>
        <li class="list-group-item"><a href="/admin/course">课程列表</a></li>
      </ul>
    </div>
    <div class="col-md-10 col-lg-10">
      <div class="panel panel-default">
        <div class="panel-heading">课程管理</div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>编号</th>
                <th>标题</th>
                <th>开课时间</th>
                <th>结束时间</th>
                <th>是否发布</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($docs as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->begintime}}</td>
                <td>{{$item->endtime}}</td>
                <td>{{$item->online==1?'是':'否'}}</td>
                <td>
                  <a href="{{ URL('admin/course/'.$item->id.'/edit') }}" class="btn btn-success btn-xs">编辑</a>
                  <form action="{{ URL('admin/pages/'.$item->id) }}" method="POST" style="display: inline;">
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-danger btn-xs">删除</button>
                  </form>
                </td>
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