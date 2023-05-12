<form class="form-valide" id="addLoanApplication">
    <div class="row">
        <div class="col-xl-3">
            <h5>基本个人资料:</h1>
                <div class="form-group row">
                    <label class="col-form-label col-lg-4">
                        稱謂
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-8">
                        <select class="form-control" id="appellation" name="appellation">
                            <option value="0">請選擇</option>
                            @foreach($appellations as $key=>$item)
                            <option value="{{ $item->id }}">{{ $item->label_tc }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="last_name">
                        姓氏
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="last_name" name="last_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="first_name">
                        名字
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="first_name" name="first_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="mobile">
                        電話號碼
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="mobile" name="mobile">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="email">
                        電郵地址
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="nationality">
                        國籍
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="nationality" name="nationality">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="date_of_birth">
                        出生日期
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="date_of_birth" name="date_of_birth">
                    </div>
                </div>
        </div>
        <div class="col-xl-3">
            <h5>住宅地址:</h5>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="unit">
                    單位
                    <span class="text-danger">*</span>
                </label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="unit" name="unit">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="floor">
                    樓層
                    <span class="text-danger">*</span>
                </label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="floor" name="floor">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="building">
                    座數
                    <span class="text-danger">*</span>
                </label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="building" name="building">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="addressOne">
                    地址第一行
                    <span class="text-danger">*</span>
                </label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="addressOne" name="addressOne">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="addressTwo">
                    地址第二行
                    <span class="text-danger">*</span>
                </label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="addressTwo" name="addressTwo">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="area">
                    地區
                    <span class="text-danger">*</span>
                </label>
                <div class="col-lg-8">
                    <select class="form-control" id="area" name="area">
                        <option value="">請選擇</option>
                        @foreach($area as $key=>$item)
                        <option value="{{ $item->id }}">{{ $item->label_tc }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="HKID">
                    身分證明
                    <span class="text-danger">*</span>
                </label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="HKID" name="HKID" value="">
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <h5>就業資料:</h5>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="job_status">
                    職業
                    <span class="text-danger">*</span>
                </label>
                <div class="col-lg-8">
                    <select class="form-control" id="job_status" name="job_status">
                        <option value="">請選擇</option>
                        @foreach($job as $key=>$item)
                        <option value="{{ $item->id }}">{{ $item->label_tc }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="salary">
                    每月收入
                    <span class="text-danger">*</span>
                </label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="salary" name="salary">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="company_name">
                    公司名稱
                    <span class="text-danger">*</span>
                </label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="company_name" name="company_name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="company_contact">
                    公司電話
                    <span class="text-danger">*</span>
                </label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="company_contact" name="company_contact">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="company_addres">
                    公司地址
                    <span class="text-danger">*</span>
                </label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="company_addres" name="company_addres">
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <h5>貸款資料:</h5>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="loan_amount">
                    欲申請之貸款額
                    <span class="text-danger">*</span>
                </label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="loan_amount" name="loan_amount">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="repayment_period">
                    還款期
                    <span class="text-danger">*</span>
                </label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" id="repayment_period" name="repayment_period">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="purpose">
                    貸款用途
                    <span class="text-danger">*</span>
                </label>
                <div class="col-lg-8">
                    <select class="form-control" id="purpose" name="purpose">
                        <option value="0">請選擇</option>
                        @foreach($purpose as $key=>$item)
                        <option value="{{ $item->id }}">{{ $item->label_tc }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="company_id">
                    服務提供商
                    <span class="text-danger">*</span>
                </label>
                <div class="col-lg-8">
                    <select class="form-control" id="company_id" name="company_id">
                        <option value="0">請選擇</option>
                        @foreach($company as $key=>$item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 ml-auto">
            <button type="submit" class="btn btn-primary">提交</button>
        </div>
    </div>
</form>