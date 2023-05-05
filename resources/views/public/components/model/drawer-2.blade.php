<div class="modal drawer animate__animated animate__fadeInRight" id="drawer">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">编辑</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="spdetails">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="email">電郵:</label>
                            <input type="text" id="email" name="email" class="form-control">
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="cancel" data-dismiss="modal">取消</button>
                        <button type="button" class="btn btn-primary">确认</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<button type="button" class="btn btn-outline-info" id="open" data-toggle="modal" data-target="#drawer">查看</button>