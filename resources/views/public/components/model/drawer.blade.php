<div class="modal drawer animate__animated animate__bounce animate__fadeInRight" id="drawer" style="padding-right:0 !important;">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">编辑</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="spdetails">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="unit">電郵:</label>
                            <input type="text" id="unit" name="unit" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="password">密码:</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="first_name">名字:</label>
                            <input type="text" id="first_name" name="first_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="last_name">姓名:</label>
                            <input type="text" id="last_name" name="last_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="mobile">電話:</label>
                            <input type="text" id="mobile" name="mobile" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="contact">常聯係人:</label>
                            <input type="text" id="contact" name="contact" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="company_id">服務提供商*:</label>
                            <select type="text" id="company_id" name="company_id" class="form-control">
                                <option value="0">請選擇</option>
                                @foreach($company as $key=>$item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>