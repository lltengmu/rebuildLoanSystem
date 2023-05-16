<div class="modal fade" id="IndividualCreatedClient">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">創建貸款</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-9">
                        <form class="tab-content" id="IndividualCreateClient">
                            <div id="basic-info" class="tab-pane fade active show">
                                <h5 class="text-primary">基本信息</h5>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="appellation">稱謂:</label>
                                        <select id="appellation" name="appellation" class="form-control">
                                            <option value="0">請選擇</option>
                                            @foreach($appellations as $key => $item)
                                            <option value="{{ $item->id }}">{{ $item->label_tc }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="last_name">姓氏:</label>
                                        <input type="text" id="last_name" name="last_name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="first_name">名字:</label>
                                        <input type="text" id="first_name" name="first_name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="mobile">電話號碼:</label>
                                        <input type="text" id="mobile" name="mobile" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">電郵地址:</label>
                                        <input type="text" id="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nationality">國籍:</label>
                                        <input type="text" id="nationality" name="nationality" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="date_of_birth">出生日期:</label>
                                        <input type="text" id="date_of_birth" name="date_of_birth" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div id="address-info" class="tab-pane fade">
                                <h5 class="text-primary">住宅地址</h5>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="unit">單位:</label>
                                        <input type="text" id="unit" name="unit" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="floor">樓層:</label>
                                        <input type="text" id="floor" name="floor" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="building">座數:</label>
                                        <input type="text" id="building" name="building" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="addressOne">地址第一行:</label>
                                        <input type="text" id="addressOne" name="addressOne" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="addressTwo">地址第二行:</label>
                                        <input type="text" id="addressTwo" name="addressTwo" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="area">地區:</label>
                                        <select id="area" name="area" class="form-control">
                                            <option value="0">請選擇</option>
                                            @foreach($area as $key => $item)
                                            <option value="{{ $item->id }}">{{ $item->label_tc }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="HKID">身分證明:</label>
                                        <input type="text" id="HKID" name="HKID" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div id="job-info" class="tab-pane fade">
                                <h5 class="text-primary">就業資料</h5>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="job_status">職業:</label>
                                        <select type="text" id="job_status" name="job_status" class="form-control">
                                            <option value="0">請選擇</option>
                                            @foreach($job as $key => $item)
                                            <option value="{{ $item->id }}">{{ $item->label_tc }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="company_name">公司名稱:</label>
                                        <input type="text" id="company_name" name="company_name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="company_contact">公司電話:</label>
                                        <input type="text" id="company_contact" name="company_contact" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="company_addres">公司地址:</label>
                                        <input type="text" id="company_addres" name="company_addres" class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">提交</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-3">
                        <div class="nav flex-column nav-pills">
                            <a href="#basic-info" data-toggle="pill" class="nav-link active show">基本信息</a>
                            <a href="#address-info" data-toggle="pill" class="nav-link">住宅地址</a>
                            <a href="#job-info" data-toggle="pill" class="nav-link">就業資料</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer hidden">
                <button type="button" class="btn btn-secondary" id="cancel" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary">确认</button>
            </div>
        </div>
    </div>
</div>
</div>