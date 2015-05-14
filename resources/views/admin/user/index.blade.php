@extends('admin')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-lg-12">
      <ol class="breadcrumb">
        <li class="active">用户管理</li>
      </ol>
    </div>
    <div class="col-md-12 col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">用户管理</div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>编号</th>
                <th>名称</th>
                <th>邮箱</th>
                <th>管理员</th>
                <th>合作伙伴</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($docs as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->isadmin?'是':'否'}}</td>
                <td>{{$item->ispartner==1?'是':'否'}}</td>
                <td>
                  <a href="{{ URL('admin/user/'.$item->id.'/edit') }}" class="btn btn-success btn-xs">编辑</a>
                  <form action="{{ URL('admin/user/'.$item->id) }}" method="POST" style="display: inline;">
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