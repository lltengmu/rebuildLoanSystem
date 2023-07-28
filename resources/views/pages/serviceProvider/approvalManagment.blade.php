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
</style>
@endsection


@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        @include('public.components.crumbs',["title"=>"主菜单","currentPage" =>"審批管理"])
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">pending</h4>
                    </div>
                    <div class="card-body">
                        <table id="pending" class="display" style="min-width: 845px">
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Approval / Reject</h4>
                    </div>
                    <div class="card-body">
                        <table id="Approval-Reject" class="display" style="min-width: 845px">
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

<!-- confirm modal -->
<div class="modal fade delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-black">你確定要驳回這個贷款嗎？</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary confirm">是的</button>
                <button type="button" class="btn btn-primary" id="cancel" data-dismiss="modal">再想想</button>
            </div>
        </div>
    </div>
</div>
<!-- approval model button-->
<button type="hidden" class="btn btn-primary" id="approvalbtn" data-toggle="modal" data-target="#approval">Approval</button>
<!-- approval model-->
<div class="modal fade delete-modal" tabindex="-1" role="dialog" aria-hidden="true" id="approval">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="card m-0">
                <div class="card-header">
                    <h5 class="card-title">同意申请</h5>
                </div>
                <div class="card-body">
                    <form id="approval-form">
                        <div class="form-row">
                            <div class="col-sm-7">
                                <label for="date_of_birth">支付日期 <span style="color: red;">*</span></label>
                                <input type="text" name="date_of_pay" id="date_of_birth" class="form-control">
                            </div>
                            <div class="col mt-2 mt-sm-0">
                                <label for="loan_interest">贷款利息 <span style="color: red;">*</span></label>
                                <div class="d-flex align-items-center m-0">
                                    <div>
                                        <input type="text" class="form-control" id="loan_interest" name="loan_interest">
                                    </div>
                                    <div class="pl-2">
                                        <label for="">%</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row pt-3">
                            <div class="col mt-12 mt-sm-0">
                                <label for="case_remark">备注 <span style="color: red;">*</span></label>
                                <textarea class="form-control" id="case_remark" name="case_remark"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancel" data-dismiss="modal">關閉</button>
                <button type="button" class="btn btn-primary" id="check">確認</button>
            </div>
        </div>
    </div>
</div>
<!-- refuse model button-->
<button type="hidden" class="btn btn-primary" id="refuseBtn" data-toggle="modal" data-target="#refuse">refuse</button>
<!-- refuse model-->
<div class="modal fade delete-modal" tabindex="-1" role="dialog" aria-hidden="true" id="refuse">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="card m-0">
                <div class="card-header">
                    <h5 class="card-title">備注</h5>
                </div>
                <div class="card-body">
                    <form id="refuse-form">
                        <div class="form-row pt-3">
                            <div class="col mt-12 mt-sm-0">
                                <label for="case_remark">备注 <span style="color: red;">*</span></label>
                                <textarea class="form-control" id="case_remark" name="case_remark"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cancel" data-dismiss="modal">關閉</button>
                <button type="button" class="btn btn-primary" id="check">確認</button>
            </div>
        </div>
    </div>
</div>

<!-- upload file component -->
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
<!-- 业务处理 -->
<script src="{{ asset('/js/serviceProvider/approvalManagement/index.js') }}"></script>
@endsection