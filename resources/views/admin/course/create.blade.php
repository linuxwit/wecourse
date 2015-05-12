@extends('admin')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-lg-12">
      <ol class="breadcrumb">
        <li><a href="/admin/course">课程管理</a></li>
        <li class="active">新增课程</li>
      </ol>
    </div>
    <div class="col-md-2 col-lg-2">
      <ul class="list-group">
        <li class="list-group-item"><a href="/admin/course/create">新增课程</a></li>
        <li class="list-group-item"><a href="/admin/course">课程列表</a></li>
      </ul>
    </div>
    <div class="col-md-10 col-lg-10">
      <div class="panel panel-default">
        <div class="panel-heading">新增课程</div>
        <div class="panel-body">@if (count($errors) > 0)
          <div class="alert alert-danger">
            <strong>注意!</strong>请检查以下是否输入正确.
            <br>
            <br>
            <ul>@foreach ($errors->all() as $error)
              <li>{{ $error }}</li>@endforeach</ul>
          </div>@endif
          <form class="form-horizontal" action="{{ URL('admin/course') }}" accept-charset="UTF-8" method="post" enctype="multipart/form-data">
            <fieldset>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iTitle">标题
                  <span class="text-danger">*</span>
                </label>
                <div class="col-lg-10">
                  <input type="text" name="title" value="{{ Input::old('title')}}" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iSubTitle">副标题
                  <span class="text-danger">*</span>
                </label>
                <div class="col-lg-10">
                  <input type="text" name="subtitle" value="{{ Input::old('subtitle')}}" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iCover">封面图片
                  <span class="text-danger">*</span>
                </label>
                <div class="col-lg-10">
                  <input type="file" name="cover" class="inputfile" value="{{ Input::old('cover')}}" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iSumarry">课程大纲
                  <span class="text-danger">*</span>
                </label>
                <div class="col-lg-10">
                  <textarea name="summary" class="editor">{{ Input::old('summary')}}</textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iBeginTime">开课时间
                  <span class="text-danger">*</span>
                </label>
                <div class="col-lg-4">
                  <input type="text" name="begintime" value="{{ Input::old('begintime')}}" class="form-control form_datetime" placeholder=""
                  required readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="endtime">结束时间
                  <span class="text-danger">*</span>
                </label>
                <div class="col-lg-4">
                  <input type="text" name="endtime" value="{{ Input::old('endtime')}}" class="form-control form_datetime" placeholder="" required
                  readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iCity">开课城市
                  <span class="text-danger">*</span>
                </label>
                <div class="col-lg-4">
                  <input type="text" name="city" value="{{ Input::old('city')}}" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="address">开课地址
                  <span class="text-danger">*</span>
                </label>
                <div class="col-lg-10">
                  <input type="text" name="address" value="{{ Input::old('address')}}" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="currentprice">当前价格
                  <span class="text-danger">*</span>
                </label>
                <div class="col-lg-4">
                  <input type="text" name="currentprice" value="{{ Input::old('currentprice')}}" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="oldprice">市场价格
                  <span class="text-danger">*</span>
                </label>
                <div class="col-lg-4">
                  <input type="text" name="oldprice" value="{{ Input::old('oldprice')}}" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="content">详细内容
                  <span class="text-danger">*</span>
                </label>
                <div class="col-lg-10">
                  <textarea name="content" class="editor">{{ Input::old('content')}}</textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iName">讲师</label>
                <div class="col-lg-10">
                  <select name="teacherid" class="form-control">
                    @foreach ($teachers as $item )
                      <option value="{{$item->id}}" {{ Input::old( 'teacherid')==$item->id ? 'selected': ''}} >{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iName">是否发布</label>
                <div class="col-lg-10">
                  <label class="radio-inline">
                    <input type="radio" name="online" value="1" {{ Input::old( 'online')!='1' ? 'checked': ''}}>是</label>
                  <label class="radio-inline">
                    <input type="radio" name="online" value="0" {{ Input::old( 'online')=='0' ? 'checked': ''}}>否</label>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button class="btn btn-success" type="submit" name="action" value="save">保存</button>
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