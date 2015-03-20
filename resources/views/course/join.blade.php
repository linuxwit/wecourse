@extends('app')
@section('content')
<div class="container-fluid">
    <div class="well">
        <form class="form-horizontal" action="/course/{{$doc->id}}/join" accept-charset="UTF-8" method="post">
            <input type="hidden" name="spm" value="{{Input::get('spm')}}">
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
            <fieldset>
                <legend>填写报名表</legend>
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="iName">姓名<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="name" value="{{ Input::old('name') }}"value="" class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="iSex">性别</label>
                    <div class="col-lg-10">
                        <label class="radio-inline">
                            <input type="radio" name="sex" value="男" "{{ Input::old('sex')=='男'?'checked':'' }}"> 男
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="sex" value="女" "{{ Input::old('sex')=='女'?'checked':'' }}"> 女
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="iName">手机<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="mobile"  value="{{ Input::old('mobile') }}" class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="iCompany">公司<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="company" maxlength="20" value="{{ Input::old('company') }}" class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="iTitle">职位<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="title" maxlength="30" value="{{ Input::old('title') }}" class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="iSource">推荐人<span class="text-danger"></span></label>
                    <div class="col-lg-10">
                        <input type="text" name="source" maxlength="30" value="{{ Input::old('source') }}" class="form-control" placeholder="填写推荐人" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button class="btn btn-success" type="submit" name="action"  value="save">提交报名</button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <div class="bs-callout bs-callout-info" id="callout-type-b-i-elems">
                            <h4>若报名遇到问题</h4>
                            <p>请直接与客服联系</p>
                        </div>
                    </blockquote>
                </div>
            </div>
        </fieldset>
    </form>
</div>
</div>
@endsection