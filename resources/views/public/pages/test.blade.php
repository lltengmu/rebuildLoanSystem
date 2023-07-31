<div class="card mb-3">
    <div class="card-header">
        编辑
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">图片</label>
                    <div class="col-sm-10">
                        <img class="card-img-top img-fluid" src="{{ asset($data['template_image']) }}" alt="Card image cap">
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <label class="col-form-label col-sm-2 pt-0">Radios</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" value="option1" checked>
                                <label class="form-check-label">
                                    First radio
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" value="option2">
                                <label class="form-check-label">
                                    Second radio
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <input class="form-check-input" type="radio" name="gridRadios" value="option3" disabled>
                                <label class="form-check-label">
                                    Third disabled radio
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <div class="col-sm-2">Checkbox</div>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">
                                Example checkbox
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>