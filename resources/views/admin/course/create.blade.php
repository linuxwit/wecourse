@extends('app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">新增课程</div>
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
          <form class="form-horizontal" action="{{ URL('admin/course') }}" accept-charset="UTF-8" method="post">
            <fieldset>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iTitle">标题<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <input type="text" name="title" value="" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iSubTitle">副标题<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <input type="text" name="subtitle" value="" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iCover">封面图片<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <input type="text" name="cover" value="" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iSumarry">简介<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <textarea  name="summary" class="form-control" ></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iBeginTime">开课时间<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <input type="text" name="begintime" value="" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iName">结束时间<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <input type="text" name="endtime" value="" class="form-control" placeholder="" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label" for="iName">开课地址<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                  <input type="text" name="address" value="" class="form-control" placeholder="" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="iName">当前价格<span class="text-danger">*</span></label>
              <div class="col-lg-10">
                <input type="text" name="currentprice" value="" class="form-control" placeholder="" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="iName">市场价格<span class="text-danger">*</span></label>
              <div class="col-lg-10">
                <input type="text" name="oldprice" value="" class="form-control" placeholder="" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="iName">详细内容<span class="text-danger">*</span></label>
              <div class="col-lg-10">
                <textarea name="content" class="form-control" ></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="iName">客服电话<span class="text-danger">*</span></label>
              <div class="col-lg-10">
                <input type="text" name="name" maxlength="6" value="" class="form-control" placeholder="" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="iName">是否发布</label>
              <div class="col-lg-10">
                <label class="radio-inline">
                  <input type="radio" name="online" value="1" checked> 是
                </label>
                <label class="radio-inline">
                  <input type="radio" name="online" value="0"> 否
                </label>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button class="btn btn-success" type="submit" name="action"  value="save">保存</button>
              </div>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
</div>
</div>
@endsection