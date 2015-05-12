@extends('admin')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-lg-12">
      <ol class="breadcrumb">
        <li><a href="/admin/teacher">讲师管理</a></li>
        <li class="active">新增讲师</li>
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
        <div class="panel-heading">新增讲师</div>
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
          <form class="form-horizontal" action="{{ URL('admin/teacher') }}" accept-charset="UTF-8" method="post"  enctype="multipart/form-data">
            <fieldset>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iName">姓名<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <input type="text" name="name" value="{{ Input::old('name') }}" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iTitle">职称<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <input type="text" name="title" value="{{ Input::old('title') }}" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iCover">头像<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <input type="file" name="avatar" class="inputfile" value="{{ Input::old('avatar') }}" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iSumarry">简介<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <textarea  name="summary" class="form-control" >{{ Input::old('summary') }}</textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iMobile">联系手机<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <input type="text" name="mobile"  value="{{ Input::old('mobile') }}" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iPhone">联系电话</label>
                <div class="col-lg-10">
                  <input type="text" name="phone"  value="{{ Input::old('phone') }}" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iAddress">联系地址<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <input type="text" name="address"  value="{{ Input::old('adderss') }}" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iContent">详细信息<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <textarea name="content"  class="editor">{{ Input::old('content') }}</textarea>
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