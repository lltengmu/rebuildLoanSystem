@extends('layouts.admin')


@section('styles')
<!-- Material color picker -->
<link rel="stylesheet" href="{{ asset('/focus-premium/focus/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}">
<!-- Pick date -->
<link rel="stylesheet" href="{{ asset('/focus-premium/focus/vendor/pickadate/themes/default.css') }}">
<link rel="stylesheet" href="{{ asset('/focus-premium/focus/vendor/pickadate/themes/default.date.css') }}">
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
    .attachment-title {
        display: inline-block;
        width: 200px !important;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .single-attachment:hover{
        cursor: pointer;
        background: white !important;
    }
</style>
@endsection
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        @include('public.components.crumbs',["title"=>"主菜单","currentPage" =>"貸款申請"])
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cases Datatable</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2 btns">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#queryModalCenter">創建貸款</button>
                            <button type="button" class="btn btn-primary" onclick="_uploadExcel()">匯入Excel</button>
                            <button type="button" class="btn btn-primary" onclick="_handleExportAll()">匯出所有</button>
                        </div>
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

<!-- upload attachment model button-->
<button type="hidden" class="btn btn-primary" id="attachment-list" data-toggle="modal" data-target="#attachment-list-modal"></button>
<!-- upload attachment model-->
<div class="modal fade delete-modal" tabindex="-1" role="dialog" aria-hidden="true" id="attachment-list-modal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="card m-0">
                <div class="card-header">
                    <h5 class="card-title">文件列表</h5>
                </div>
                <div class="card-body">
                    <div class="row grid m-0" id="render"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancel" data-dismiss="modal">關閉</button>
            </div>
        </div>
    </div>
</div>

@include('public.components.model.center')
@include('public.components.uploadFile')
@endsection

@section('javascript')
<!-- momment js is must -->
<script src="{{ asset('/focus-premium/focus/vendor/moment/moment.min.js') }}"></script>
<!-- Material color picker -->
<script src="{{ asset('/focus-premium/focus/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
<!-- pickdate -->
<script src="{{ asset('/focus-premium/focus/vendor/pickadate/picker.js') }}"></script>
<script src="{{ asset('/focus-premium/focus/vendor/pickadate/picker.time.js') }}"></script>
<script src="{{ asset('/focus-premium/focus/vendor/pickadate/picker.date.js') }}"></script>
<!-- Material color picker init -->
<script src="{{ asset('/js/datepicker.js') }}"></script>
<!-- 业务逻辑文件 -->
<script src="{{ asset('/js/individual/loanApplication/index.js') }}"></script>
@endsection