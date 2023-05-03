@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="{{ asset('/focus-premium/focus/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}">
<!-- Material color picker -->
<!-- Pick date -->
<link rel="stylesheet" href="{{ asset('/focus-premium/focus/vendor/pickadate/themes/default.css') }}">
<link rel="stylesheet" href="{{ asset('/focus-premium/focus/vendor/pickadate/themes/default.date.css') }}">
<style>
    hr {
        margin-top: 0.5rem !important;
        margin-bottom: 0.5rem !important;
    }

    .content-body {
        min-height: auto !important;
    }
</style>
@endsection

@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">贷款详情 / loan details</h4>
                    </div>
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#viewCaseDetails">
                                    <span>
                                        <i class="ti-user"></i>
                                        <span>view</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#setting">
                                    <span>
                                        <i class="ti-home"></i>
                                        <span>setting</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane fade show active" id="viewCaseDetails" role="tabpanel">
                                <div class="pt-4 row grid">
                                    <div class="col-xl-6">
                                        <div class="col-lg-12 p-0">
                                            <h5 class="text-left text-primary">基本个人信息:</h5>
                                            <section class="alert-light text-left p-2">
                                                <div class="col-lg-12">
                                                    <span>稱謂:</span>
                                                    <span>{{ $data["client"]["appellation"] }}</span>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-12">
                                                    <span>姓氏:</span>
                                                    <span>{{ $data["client"]["last_name"] }}</span>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-12">
                                                    <span>名字:</span>
                                                    <span>{{ $data["client"]["first_name"] }}</span>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-12">
                                                    <span>電話號碼:</span>
                                                    <span>{{ $data["client"]["mobile"] }}</span>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-12">
                                                    <span>電郵地址:</span>
                                                    <span>{{ $data["client"]["email"] }}</span>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-12">
                                                    <span>國籍:</span>
                                                    <span>{{ $data["client"]["nationality"] }}</span>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-12">
                                                    <span>出生日期:</span>
                                                    <span>{{ $data["client"]["date_of_birth"] }}</span>
                                                    <hr>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="col-lg-12 p-0">
                                            <h5 class="text-left text-primary">住宅地址:</h5>
                                            <section class="alert-light text-left p-2">
                                                <div class="col-lg-12">
                                                    <span>單位:</span>
                                                    <span>{{ $data["client"]["unit"] }} 单元</span>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-12">
                                                    <span>樓層:</span>
                                                    <span>{{ $data["client"]["floor"] }} 楼</span>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-12">
                                                    <span>座數:</span>
                                                    <span>{{ $data["client"]["building"] }} 栋</span>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-12">
                                                    <span>地址第一行:</span>
                                                    <span>{{ $data["client"]["addressOne"] }}</span>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-12">
                                                    <span>地址第一行:</span>
                                                    <span>{{ $data["client"]["addressTwo"] }}</span>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-12">
                                                    <span>地區:</span>
                                                    <span>{{ $data["client"]["area"] }}</span>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-12">
                                                    <span>身分證明:</span>
                                                    <span>{{ $data["client"]["HKID"] }}</span>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-12">
                                                    <span>服務提供商:</span>
                                                    @if($data["company"])
                                                    <span>{{ $data["company"]["name"] }}</span>
                                                    @else
                                                    <span>未选择服務提供商</span>
                                                    @endif
                                                    <hr>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-4 row grid">
                                    <div class="col-xl-6">
                                        <div class="col-lg-12 p-0">
                                            <h5 class="text-left text-primary">就業資料:</h5>
                                            <section class="alert-light text-left p-2">
                                                <div class="col-lg-12">
                                                    <span>職業:</span>
                                                    <span>{{ $data["client"]["job_status"] }}</span>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-12">
                                                    <span>每月收入:</span>
                                                    <span>{{ $data["client"]["salary"] }}</span>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-12">
                                                    <span>公司名稱:</span>
                                                    <span>{{ $data["client"]["company_name"] }}</span>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-12">
                                                    <span>公司電話:</span>
                                                    <span>{{ $data["client"]["company_contact"] }}</span>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-12">
                                                    <span>公司地址:</span>
                                                    <span>{{ $data["client"]["company_addres"] }}</span>
                                                    <hr>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="col-lg-12 p-0">
                                            <h5 class="text-left text-primary">贷款资料:</h5>
                                            <section class="alert-light text-left p-2">
                                                <div class="col-lg-12">
                                                    <span>欲申請之貸款額:</span>
                                                    <span>{{ $data["loan_amount"] }}</span>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-12">
                                                    <span>還款期:</span>
                                                    <span>{{ $data["repayment_period"] }}</span>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-12">
                                                    <span>貸款用途:</span>
                                                    <span>{{ $data["purpose"] }}</span>
                                                    <hr>
                                                </div>
                                                <div class="col-lg-12 row">
                                                    <span class="col-lg-1 pr-0">備注:</span>
                                                    <p class="col-lg-11">{{ $data["case_remark"] }}</p>
                                                    <hr>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="setting" role="tabpanel">
                                <form>
                                    <div class="pt-4 row grid">
                                        <div class="col-xl-6">
                                            <div class="col-lg-12 p-0">
                                                <h5 class="text-left text-primary">基本个人信息:</h5>
                                                <section class="alert-light text-left p-2">
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label text-right px-0" for="appellations">
                                                            稱謂
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-10">
                                                            <select class="form-control" id="appellations" name="appellations">
                                                                <option value="0">請選擇</option>
                                                                @foreach($appellations as $key => $item)
                                                                <option value="0" {{ $item->label_tc == $data["client"]["appellation"] ? "selected" : "" }}>{{ $item->label_tc }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label text-right px-0" for="last_name">
                                                            姓氏
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $data['client']['last_name'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label text-right px-0" for="first_name">
                                                            名字
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $data['client']['first_name'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label text-right px-0" for="mobile">
                                                            電話號碼
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $data['client']['mobile'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label text-right px-0" for="email">
                                                            電郵地址
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="email" name="email" value="{{ $data['client']['email'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label text-right px-0" for="nationality">
                                                            國籍
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="nationality" name="nationality" value="{{ $data['client']['nationality'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label text-right px-0" for="date_of_birth">
                                                            出生日期
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $data['client']['date_of_birth'] }}">
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="col-lg-12 p-0">
                                                <h5 class="text-left text-primary">住宅地址:</h5>
                                                <section class="alert-light text-left p-2">
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label text-right px-0" for="unit">
                                                            單位
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="unit" name="unit" value="{{ $data['client']['unit'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label text-right px-0" for="floor">
                                                            樓層
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="floor" name="floor" value="{{ $data['client']['floor'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label text-right px-0" for="building">
                                                            座數
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="building" name="building" value="{{ $data['client']['building'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label text-right px-0" for="addressOne">
                                                            地址第一行
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="addressOne" name="addressOne" value="{{ $data['client']['addressOne'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label text-right px-0" for="addressTwo">
                                                            地址第二行
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="addressTwo" name="addressTwo" value="{{ $data['client']['addressTwo'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label text-right px-0" for="area">
                                                            地區
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-10">
                                                            <select class="form-control" id="area" name="area">
                                                                <option value="">請選擇</option>
                                                                @foreach($area as $key=>$item)
                                                                <option value="{{ $item->id }}" {{ $item->label_tc == $data['client']['area'] ? 'selected' : '' }}>{{ $item->label_tc }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label text-right px-0" for="HKID">
                                                            身分證明
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="HKID" name="HKID" value="{{ $data['client']['HKID'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label text-right px-0" for="company_id">
                                                            服務提供商
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-10">
                                                            <select class="form-control" id="company_id" name="company_id">
                                                                <option value="0">請選擇</option>
                                                                @if($data["company"])
                                                                @foreach($company as $key=>$item)
                                                                <option value="{{ $item->id }}" {{ $item->name == $data["company"]["name"] ? "selected" : "" }}>{{ $item->name }}</option>
                                                                @endforeach
                                                                @else
                                                                @foreach($company as $key=>$item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-4 row grid">
                                        <div class="col-xl-6">
                                            <div class="col-lg-12 p-0">
                                                <h5 class="text-left text-primary">就業資料:</h5>
                                                <section class="alert-light text-left p-2">
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label text-right px-0" for="salary">
                                                            每月收入
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="salary" name="salary" value="{{ $data['client']['salary'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label text-right px-0" for="company_name">
                                                            公司名稱
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $data['client']['company_name'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label text-right px-0" for="company_contact">
                                                            公司電話
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="company_contact" name="company_contact" value="{{ $data['client']['company_contact'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label text-right px-0" for="company_addres">
                                                            公司地址
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="company_addres" name="company_addres" value="{{ $data['client']['company_addres'] }}">
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="col-lg-12 p-0">
                                                <h5 class="text-left text-primary">贷款资料:</h5>
                                                <section class="alert-light text-left p-2">
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label text-right px-0" for="loan_amount">
                                                            欲申請之貸款額
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="loan_amount" name="loan_amount" value="{{ $data['loan_amount'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label text-right px-0" for="repayment_period">
                                                            還款期
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="repayment_period" name="repayment_period" value="{{ $data['repayment_period'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label text-right px-0" for="purpose">
                                                            貸款用途
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-10">
                                                            <select class="form-control" id="purpose" name="purpose">
                                                                <option value="0">請選擇</option>
                                                                @foreach($purpose as $key=>$item)
                                                                <option value="{{ $item->id }}" {{ $item->label_tc == $data["purpose"] ? "selected" : "" }}>{{ $item->label_tc }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-2" style="display: flex;justify-content: flex-end;">
                                        <button type="submit" class="btn btn-primary">提交</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
@endsection