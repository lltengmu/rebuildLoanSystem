@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="{{ asset('/focus-premium/focus/vendor/datatables/css/jquery.dataTables.min.css') }}">
<style>
    .btns {
        width: 100%;
        margin-left: 0px !important;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        gap: 10px;
    }

    ::-webkit-input-placeholder {
        color: #bdc3c7;
    }
</style>
@endsection
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        @include('public.components.crumbs',["title"=>"主菜单","currentPage" =>"客户管理"])
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ServiceProvide Managment</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2 btns">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-sp">創建賬號</button>
                        </div>
                        <table id="serviceProviderTable" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>編號</th>
                                    <th>名字</th>
                                    <th>姓名</th>
                                    <th>貸款公司</th>
                                    <th>電郵</th>
                                    <th>狀態</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 确认提示框 -->
<div class="modal fade delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-black">您确定删除此客户吗？</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary confirm">是的，删除</button>
                <button type="button" class="btn btn-primary" id="cancel" data-dismiss="modal">再想想</button>
            </div>
        </div>
    </div>
</div>

<!-- create sp modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="create-sp">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="individual-create-sp">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">電郵 <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">密碼 <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">名字 <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="first_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">姓名 <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="last_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">電話 <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="mobile" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">常聯係人 <span style="color: red;">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="contact" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2" for="company_id">服務提供商<span style="color: red;">*</span>:</label>
                        <div class="col-sm-10">
                            <select name="company_id" class="form-control">
                                <option value="0">請選擇</option>
                                @foreach($company as $key=>$item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel-modal">取消</button>
                        <button type="submit" class="btn btn-primary">確認</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- drawer -->
@include('public.components.model.drawer')
@endsection

@section('javascript')
<script src="{{ asset('/js/individual/serviceProviderManagement/index.js') }}"></script>
@endsection