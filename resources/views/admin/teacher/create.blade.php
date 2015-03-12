@extends('admin')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
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
                  <input type="file" name="avatar" value="{{ Input::old('avatar') }}" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iSumarry">简介<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <textarea  name="summary" class="form-control" >{{ Input::old('summary') }}</textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iSumarry">详细介绍<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <textarea name="content" class="form-control" id="editor" cols="30" rows="10"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iMobile">手机<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <input type="text" name="mobile"  value="{{ Input::old('mobile') }}" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iPhone">电话<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <input type="text" name="phone"  value="{{ Input::old('phone') }}" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iAddress">地址<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <input type="text" name="address"  value="{{ Input::old('adderss') }}" class="form-control" placeholder="" required>
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