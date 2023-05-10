@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="{{ asset('/focus-premium/focus/vendor/owl-carousel/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('/focus-premium/focus/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('/focus-premium/focus/vendor/jqvmap/css/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('/focus-premium/focus/vendor/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('/focus-premium/focus/vendor/bootstrap-daterangepicker/daterangepicker.css') }}">
<style>
    .stat-digit {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .example {
        display: grid;
        grid-template-rows: 100%;
        grid-template-columns: 1fr 3.5fr;
    }

    .example>label {
        display: flex;
        align-items: center;
    }

    .submitButton {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
</style>
@endsection


@section('content')
<div class="content-body">
    <!-- 数据筛选 -->
    <div class="container-fluid">
        @include('public.components.crumbs',["title"=>"主菜单","currentPage" =>"儀表板"])
        <form class="row page-titles mx-0" id="cards">
            @csrf
            <div class="col-sm-4 p-md-0">
                <div class="col-md-12">
                    <div class="example">
                        <label class="m-0" for="daterange">选择时间范围：</label>
                        <input class="form-control input-daterange-datepicker" id="daterange" type="text" name="daterange" value="01/01/2015 - 01/31/2015">
                    </div>
                </div>
            </div>
            <div class="col-sm-4 p-md-0">
                <div class="col-md-12">
                    <div class="example">
                        <label class="m-0" for="multi-value-select">請選擇機構:</label>
                        <select class="w-100" name="companies" id="multi-value-select" multiple="multiple">
                            @foreach($companies as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 p-md-0">
                <div class="col-md-12 pr-0 submitButton">
                    <button type="submit" class="btn btn-outline-primary">提交</button>
                </div>
            </div>
        </form>
    </div>
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Case</div>
                            <div class="stat-digit">
                                <span class="showCaseCount">{{ $cards["caseCount"] }}</span>
                                <span class="text-14 green">
                                    <span>10%</span>
                                    <i class="ti-hand-point-up text-14"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Person</div>
                            <div class="stat-digit">
                                <span class="showClientsCount">{{ $cards["clientsCount"] }}</span>
                                <span class="text-14 green">
                                    <span>10%</span>
                                    <i class="ti-hand-point-up text-14"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Service Provider</div>
                            <div class="stat-digit">
                                <span class="showServiceProviderCount">{{ $cards["serviceProvider"] }}</span>
                                <span class="text-14 green">
                                    <span>10%</span>
                                    <i class="ti-hand-point-up text-14"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Success case / Reject case</div>
                            <div class="stat-digit">
                                <div>
                                    <span class="showSuccessCase">{{ $cards["successCases"] }}</span> / <span class="showRejectCase">{{ $cards["rejectCases"] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->
        </div>
        <!-- 图表 -->
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sales Overview</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-8">
                                <div id="morris-bar-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-xxl-6 col-xl-4 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Product Sold</h4>
                        <div class="card-action">
                            <div class="dropdown custom-dropdown">
                                <div data-toggle="dropdown">
                                    <i class="ti-more-alt"></i>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Option 1</a>
                                    <a class="dropdown-item" href="#">Option 2</a>
                                    <a class="dropdown-item" href="#">Option 3</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart py-4">
                            <canvas id="sold-product"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<!-- Vectormap -->
<script src="{{ asset('/focus-premium/focus/vendor/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('/focus-premium/focus/vendor/morris/morris.min.js') }}"></script>
<script src="{{ asset('/focus-premium/focus/vendor/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('/focus-premium/focus/vendor/chart.js/Chart.bundle.min.js') }}"></script>
<!-- select2 -->
<script src="{{ asset('/focus-premium/focus/vendor/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('/focus-premium/focus/js/plugins-init/select2-init.js') }}"></script>
<!-- 业务逻辑文件 -->
<script src="{{ asset('/js/individual/dashboard/index.js') }}"></script>
@endsection