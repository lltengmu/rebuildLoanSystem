<div class="modal fade" id="queryModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">創建貸款</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist" style="display: none;">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home8"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile8"></a>
                    </li>
                </ul>
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane fade show active" id="home8" role="tabpanel">
                        <div class="basic-form">
                            <form id="query">
                                @csrf
                                <label for="HKID">HKID <span style="color:red;">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="HKID" id="HKID" class="form-control">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Button</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile8" role="tabpanel">
                        @include('public.components.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>