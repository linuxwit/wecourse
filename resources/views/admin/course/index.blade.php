@extends('app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">课程管理</div>
        <div class="panel-body">
          <a href="{{ URL('admin/course/create') }}" class="btn  btn-primary pull-right">新增</a>
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
                  <a href="{{ URL('admin/course/'.$item->id.'/edit') }}" class="btn btn-success">编辑</a>
                  <form action="{{ URL('admin/pages/'.$item->id) }}" method="POST" style="display: inline;">
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-danger">删除</button>
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