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
    @include('public.components.crumbs',["title"=>"主菜单","currentPage" =>"審批管理"])
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cases Datatable</h4>
                    </div>
                    <div class="card-body">
                        <table id="caseTable" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>編號</th>
                                    <th>名字</th>
                                    <th>姓名</th>
                                    <th>貸款額度</th>
                                    <th>貸款公司</th>
                                    <th>還款期</th>
                                    <th>付款日期</th>
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
            <div class="modal-body text-black">您确定删除此记录吗？</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary confirm">是的，删除</button>
                <button type="button" class="btn btn-primary" id="cancel" data-dismiss="modal">再想想</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<!-- 引入 layui.js -->
<!-- 业务逻辑文件 -->
<script src="{{ asset('/js/individual/approvalManagment/index.js') }}"></script>
@endsection