@extends('admin')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-lg-12">
      <ol class="breadcrumb">
        <li><a href="/admin/teacher">讲师管理</a></li>
        <li class="active">讲师列表</li>
      </ol>
    </div>
    <div class="col-md-2 col-lg-2">
      <ul class="list-group">
        <li class="list-group-item"><a href="/admin/teacher/create">新增讲师</a></li>
        <li class="list-group-item"><a href="/admin/teacher">讲师列表</a></li>
      </ul>
    </div>
     <div class="col-md-10 col-lg-10">
      <div class="panel panel-default">
        <div class="panel-heading">讲师管理</div>
        <div class="panel-body">
          <a href="{{ URL('admin/teacher/create') }}" class="btn  btn-primary pull-right">新增</a>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>编号</th>
                <th>姓名</th>
                <th>职称</th>
                <th>联系电话</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($docs as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->mobile}}</td>
                <td>
                  <a href="{{ URL('admin/teacher/'.$item->id.'/edit') }}" class="btn btn-success btn-xs">编辑</a>
                  <form action="{{ URL('admin/teacher/'.$item->id) }}" method="POST" style="display: inline;">
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