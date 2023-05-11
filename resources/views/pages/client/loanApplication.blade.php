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
        @include('public.components.crumbs',["title"=>"主菜单","currentPage" =>"貸款申請"])
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cases Datatable</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2 btns">
                            <button type="button" class="btn btn-primary" id="open" data-toggle="modal" data-target=".new-loan">創建貸款</button>
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
<!-- model add new loan -->
<div class="modal fade new-loan" id="newloan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">編輯</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form class="add-loan" id="add">
                <div class="modal-body">
                    <h5 class="text-primary">貸款資料</h5>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="loan_amount">
                                <span>欲申請之貸款額:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="loan_amount" name="loan_amount" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="repayment_period">
                                <span>還款期:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="repayment_period" name="repayment_period" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="purpose">
                                <span>貸款用途:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <select id="purpose" name="purpose" class="form-control">
                                <option value="0">請選擇</option>
                                @foreach($purpose as $key=> $item)
                                <option value="{{ $item->id }}">{{ $item->label_tc }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button id="add-cancel" type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- model show detail -->
<div class="modal fade new-loan" id="showdetails" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">編輯</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form class="add-loan" id="update">
                <div class="modal-body">
                    <h5 class="text-primary">貸款資料</h5>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="loan_amount">
                                <span>欲申請之貸款額:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="loan_amount" name="loan_amount" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="repayment_period">
                                <span>還款期:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="repayment_period" name="repayment_period" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="purpose">
                                <span>貸款用途:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <select id="purpose" name="purpose" class="form-control">
                                <option value="0">請選擇</option>
                                @foreach($purpose as $key=> $item)
                                <option value="{{ $item->id }}">{{ $item->label_tc }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button id="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <button id="save" type="submit" class="btn btn-primary">保存</button>
                </div>
            </form>
        </div>
    </div>
</div>
<button type="button" class="btn btn-primary hidden" id="show-open" data-toggle="modal" data-target="#showdetails">創建貸款</button>
@include('public.components.uploadFile')
@endsection

@section('javascript')
<!-- 引入 layui.js -->
<!-- 业务逻辑文件 -->
<script src="{{ asset('/js/client/loanApplication/index.js') }}"></script>
@endsection