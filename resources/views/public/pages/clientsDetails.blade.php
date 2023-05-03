@extends("layouts.admin")

@section('styles')
<style>
    .mask{
        position: absolute;
        border-radius: 50%;
        width: 100%;
        height: 100%;
        cursor: pointer;
        z-index: 999;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .mask i{
        display: none;
        color: white;
        font-size: 50px;
    }
    .mask:hover{
        border: 20px solid rgba(0,0,0,.1);
        background-color: rgba(255,255,255,0);
    }
</style>
@endsection
@section('content')
<div class="content-body">
    @include('public.components.crumbs',["title"=>"客户管理","currentPage" =>"客户详情"])
    <!-- row -->
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo"></div>
                            <div class="profile-photo">
                                <div class="mask">
                                    <i class="ti-camera"></i>
                                </div>
                                <img src="{{ asset('/focus-premium/focus/images/profile/profile.png') }}" class="img-fluid rounded-circle" alt="avatar">
                            </div>
                        </div>
                        <div class="profile-info">
                            <div class="row justify-content-center">
                                <div class="col-xl-8">
                                    <div class="row">
                                        <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                            <div class="profile-name">
                                                <h4 class="text-primary">{{ $data['client']['last_name'].$data['client']['first_name'] }}</h4>
                                                <p>这个人很懒，什么都没留下....</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                            <div class="profile-email">
                                                <h4 class="text-muted">{{ $data['client']['email'] }}</h4>
                                                <p>Email</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-statistics">
                            <div class="text-center mt-4 border-bottom-1 pb-3">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="m-b-0">150</h3>
                                        <span>Follower</span>
                                    </div>
                                    <div class="col">
                                        <h3 class="m-b-0">140</h3>
                                        <span>Place Stay</span>
                                    </div>
                                    <div class="col">
                                        <h3 class="m-b-0">45</h3>
                                        <span>Reviews</span>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <a href="javascript:void()" class="btn btn-primary pl-5 pr-5 mr-3 mb-4">Follow</a>
                                    <a href="javascript:void()" class="btn btn-dark pl-5 pr-5 mb-4">Send Message</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a href="#profile-settings" data-toggle="tab" class="nav-link">账户设置</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="profile-settings" class="tab-pane fade active show">
                                        <div class="pt-3">
                                            <div class="settings-form">

                                                <form>
                                                    <h5 class="text-primary">基本信息</h5>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="appellations">稱謂:</label>
                                                            <select id="appellations" name="appellations" class="form-control">
                                                                <option value="0">請選擇</option>
                                                                @foreach($appellations as $key => $item)
                                                                <option value="0" {{ $item->label_tc == $data["client"]["appellation"] ? "selected" : "" }}>{{ $item->label_tc }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="last_name">姓氏:</label>
                                                            <input type="text" id="last_name" name="last_name" class="form-control" value="{{ $data['client']['last_name'] }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="first_name">名字:</label>
                                                            <input type="text" id="first_name" name="first_name" class="form-control" value="{{ $data['client']['first_name'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-3">
                                                            <label for="mobile">電話號碼:</label>
                                                            <input type="text" id="mobile" name="mobile" class="form-control" value="{{ $data['client']['mobile'] }}">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="email">電郵地址:</label>
                                                            <input type="text" id="email" name="email" class="form-control" value="{{ $data['client']['email'] }}">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="nationality">國籍:</label>
                                                            <input type="text" id="nationality" name="nationality" class="form-control" value="{{ $data['client']['nationality'] }}">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="date_of_birth">出生日期:</label>
                                                            <input type="text" id="date_of_birth" name="date_of_birth" class="form-control" value="{{ $data['client']['date_of_birth'] }}">
                                                        </div>
                                                    </div>
                                                    <h5 class="text-primary">住宅地址</h5>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="addressOne">地址第一行:</label>
                                                            <input type="text" id="addressOne" name="addressOne" class="form-control" value="{{ $data['client']['addressOne'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="addressTwo">地址第二行:</label>
                                                            <input type="text" id="addressTwo" name="addressTwo" class="form-control" value="{{ $data['client']['addressTwo'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="unit">單位:</label>
                                                            <input type="text" id="unit" name="unit" class="form-control" value="{{ $data['client']['unit'] }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="floor">樓層:</label>
                                                            <input type="text" id="floor" name="floor" class="form-control" value="{{ $data['client']['floor'] }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="building">座數:</label>
                                                            <input type="text" id="building" name="building" class="form-control" value="{{ $data['client']['building'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="area">地區:</label>
                                                            <select id="area" name="area" class="form-control">
                                                                <option value="0">請選擇</option>
                                                                @foreach($area as $key => $item)
                                                                <option value="0" {{ $item->label_tc == $data["client"]["area"] ? "selected" : "" }}>{{ $item->label_tc }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="HKID">身分證明:</label>
                                                            <input type="text" id="HKID" name="HKID" class="form-control" value="{{ $data['client']['HKID'] }}">
                                                        </div>
                                                    </div>
                                                    <h5 class="text-primary">就業資料</h5>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="job_status">職業:</label>
                                                            <select type="text" id="job_status" name="job_status" class="form-control">
                                                                <option value="0">請選擇</option>
                                                                @foreach($job as $key => $item)
                                                                <option value="0" {{ $item->label_tc == $data["client"]["job_status"] ? "selected" : "" }}>{{ $item->label_tc }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="company_name">公司名稱:</label>
                                                            <input type="text" id="company_name" name="company_name" class="form-control" value="{{ $data['client']['company_name'] }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="company_contact">公司電話:</label>
                                                            <input type="text" id="company_contact" name="company_contact" class="form-control" value="{{ $data['client']['company_contact'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="company_addres">公司地址:</label>
                                                            <input type="text" id="company_addres" name="company_addres" class="form-control" value="{{ $data['client']['company_addres'] }}">
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">提交</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection