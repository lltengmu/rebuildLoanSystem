@extends('layouts.admin')

@section('styles')
<style>
    ::-webkit-input-placeholder {
        color: #bdc3c7;
    }

    .image-wapper {
        position: relative;
        width: 500px;
        height: 300px;
        overflow: hidden;
        cursor: pointer;
    }

    .image {
        width: 100%;
        height: 100%;
    }

    .image-wapper:hover .upload-block {
        transform: translateY(0%);
    }

    .upload-block {
        position: absolute;
        width: 100%;
        height: 40px;
        background-color: rgba(255, 255, 255, .2);
        color: white;
        bottom: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 18px;
        transform: translateY(100%);
        transition: .5s ease;
    }
</style>
@endsection
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        @include('public.components.crumbs',["title"=>"主菜单","currentPage" =>"模板详情"])
        <div class="row m-0 w-100">
            <div class="card mb-3 w-100">
                <div class="card-header">
                    <h4>编辑</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form id="edit-loan-template" loan-template-id="{{$data['id']}}">
                            <div class="form-group row">
                                <label class="col-sm-1 col-form-label">图片 <span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <div class="image-wapper">
                                        <div id="image-container">
                                            <img class="image" src="{{ asset($data['template_image']) }}" alt="Card image cap">
                                        </div>
                                        <div class="upload-block" onclick="_uploadImage()">
                                            <i class="fa fa-folder mr-1"></i>
                                            Upload
                                        </div>
                                    </div>
                                    <input type="file" name="template_image" class="form-control hidden">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-1 col-form-label">模版标题 <span style="color: red;">*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" name="title" class="form-control" value="{{ $data['title'] }}">
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                    <label class="col-form-label col-sm-1 pt-0">状态 <span style="color: red;">*</span></label>
                                    <div class="col-sm-11">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="1" @if($data['status']==1) checked @endif>
                                            <label class="form-check-label">
                                                启用
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="0" @if($data['status']==0) checked @endif>
                                            <label class="form-check-label">
                                                禁用
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group row">
                                <div class="col-sm-1">描述 <span style="color: red;">*</span></div>
                                <div class="col-sm-11">
                                    <textarea class="form-control" rows="4" name="template_text">{{ $data['template_text'] }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <button type="submit" style="float: right;" class="btn btn-primary">提交</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('public.components.uploadFile')

@endsection

@section('javascript')
<script src="{{ asset('/js/individual/loanTemplateDetail/index.js') }}"></script>
@endsection