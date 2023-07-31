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

    .single-template .active{
        position: absolute;
        width: 30px;
        height:30px;
        border-radius: 50%;
        background: #bef5e8;
        color: #50E3C2;
        font-size: 18px;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10;
        right: 0;
        transform: translateY(-50%);
    }
</style>
@endsection
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        @include('public.components.crumbs',["title"=>"主菜单","currentPage" =>"貸款管理模板"])
        <div class="row">
            @include("public.components.loan-template-list")
        </div>
    </div>
</div>

@include('public.components.uploadFile')

@endsection

@section('javascript')
<script src="{{ asset('/js/individual/templateManagment/index.js') }}"></script>
@endsection