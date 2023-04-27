@extends('layouts.admin')


@section('styles')
<link rel="stylesheet" href="{{ asset('/focus-premium/focus/vendor/datatables/css/jquery.dataTables.min.css') }}">
@endsection
@section('content')
<div class="content-body">
    @include('public.components.crumbs',["title"=>"主菜单","currentPage" =>"貸款申請"])
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cases Datatable</h4>
                    </div>
                    <div class="card-body">
                        <table id="example" class="display" style="min-width: 845px">
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
@endsection

@section('javascript')
<!-- 业务逻辑文件 -->
<script src="{{ asset('/js/individual/loanApplication/index.js') }}"></script>
@endsection