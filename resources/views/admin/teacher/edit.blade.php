@extends('admin')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-lg-12">
      <ol class="breadcrumb">
        <li><a href="/admin/teacher">讲师管理</a></li>
        <li><a href="/admin/teacher">讲师列表</a></li>
        <li class="active">{{ $doc->name }}</li>
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
        <div class="panel-heading">编辑讲师</div>
        <div class="panel-body">
          @if (count($errors) > 0)
          <div class="alert alert-danger">
            <strong>注意!</strong>请检查以下是否输入正确.<br><br>
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <form class="form-horizontal" action="{{ URL('admin/teacher/'.$doc->id) }}" method="POST" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <fieldset>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iName">姓名<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <input type="text" name="name" value="{{ $doc->name }}" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iTitle">职称<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <input type="text" name="title" value="{{ $doc->title  }}" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iCover">头像<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <input type="file" name="avatar"  class="inputfile" placeholder="" value="{{ $qiniu.$doc->avatar }}" >
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iSumarry">简介<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <textarea  name="summary" class="form-control" >{{ $doc->summary }}</textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iMobile">手机<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <input type="text" name="mobile"  value="{{ $doc->mobile }}" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iPhone">电话<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <input type="text" name="phone"  value="{{ $doc->phone }}" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iAddress">地址<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <input type="text" name="address"  value="{{ $doc->address }}" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="content">详细介绍<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <textarea  name="content" class="editor" >{{ $doc->content }}</textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button class="btn btn-success" type="submit" name="save"  value="save">保存</button>
                </div>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection