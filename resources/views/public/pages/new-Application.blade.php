<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/focus-premium/focus/images/favicon.png') }}">
    <!-- Material color picker -->
    <link rel="stylesheet" href="{{ asset('/focus-premium/focus/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}">
    <!-- Pick date -->
    <link rel="stylesheet" href="{{ asset('/focus-premium/focus/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('/focus-premium/focus/vendor/pickadate/themes/default.date.css') }}">
    <link rel="stylesheet" href="{{ asset('/focus-premium/focus/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/global.css') }}">
    <style>
        .new-loanApplication {
            height: 100vh;
        }
    </style>
</head>

<body>
    <!-- loading -->
    @include('public.loading.index')

    <div class="row new-loanApplication">
        <div class="col-xl-3">
            <section>

            </section>
        </div>
        <div class="col-xl-9">
            <section>
                <form class="p-4 bg-wihte" id="register">
                    @csrf
                    <div>
                        <h3 class="pt-4 text-32">WELCOME TO LOANSYSTEM!</h3>
                        <p>Create your account to start managing your loan application.</p>
                    </div>
                    <h5 class="text-primary">基本信息</h5>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="email">
                                <span>登陸郵箱:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="email" name="email" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="last_name">
                                <span>姓氏:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="last_name" name="last_name" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="first_name">
                                <span>名字:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="first_name" name="first_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="appellations">
                                <span>稱謂:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <select id="appellations" name="appellations" class="form-control">
                                <option value="0">請選擇</option>
                                @foreach($appellations as $key => $item)
                                <option value="{{ $item->id }}">{{ $item->label_tc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="mobile">
                                <span>電話號碼:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="mobile" name="mobile" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="nationality">
                                <span>國籍:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="nationality" name="nationality" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="date_of_birth">
                                <span>出生日期:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="date_of_birth" name="date_of_birth" class="form-control">
                        </div>
                    </div>
                    <h5 class="text-primary">住宅地址</h5>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="addressOne">
                                <span>地址第一行:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="addressOne" name="addressOne" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="addressTwo">
                                <span>地址第二行:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="addressTwo" name="addressTwo" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="unit">
                                <span>單位:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="unit" name="unit" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="floor">
                                <span>樓層:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="floor" name="floor" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="building">
                                <span>座數:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="building" name="building" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="area">
                                <span>地區:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <select id="area" name="area" class="form-control">
                                <option value="0">請選擇</option>
                                @foreach($area as $key => $item)
                                <option value="{{ $item->id }}">{{ $item->label_tc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="HKID">
                                <span>身分證明:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="HKID" name="HKID" class="form-control">
                        </div>
                    </div>
                    <h5 class="text-primary">就業資料</h5>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="job_status">
                                <span>職業:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <select type="text" id="job_status" name="job_status" class="form-control">
                                <option value="0">請選擇</option>
                                @foreach($job as $key => $item)
                                <option value="{{ $item->id }}">{{ $item->label_tc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="company_name">
                                <span>公司名稱:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="company_name" name="company_name" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="company_contact">
                                <span>公司電話:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="company_contact" name="company_contact" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="company_addres">
                                <span>公司地址:</span>
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="company_addres" name="company_addres" class="form-control">
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="agree" name="agree">
                        <label class="form-check-label" for="agree">
                            同意xxxxxx
                        </label>
                    </div>
                    <button class="btn btn-primary" style="float: right;" type="submit">提交</button>
                </form>
            </section>
        </div>
    </div>

    <!-- base focus js -->
    <script src="{{ asset('focus-premium/focus/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('focus-premium/focus/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('focus-premium/focus/js/custom.min.js') }}"></script>

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
    <!-- customer js -->
    <script src="{{ asset('/js/common/form/index.js') }}"></script>
</body>

</html>