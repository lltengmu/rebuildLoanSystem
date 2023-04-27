@extends("layouts.index")

@section('styles')
<style>
    ::-webkit-input-placeholder {
        font-size: .5rem;
        color: #ddd !important;
    }
</style>
@endsection


@section("content")
<div class="col-md-6">
    <div class="authincation-content">
        <div class="row no-gutters">
            <div class="col-xl-12">
                <div class="auth-form">
                    <h4 class="text-center mb-4">serviceProvider login</h4>
                    <form id="login-form">
                        @csrf
                        <input type="hidden" name="_identify" value="serviceProvider">
                        <div class="form-group">
                            <label><strong>电邮</strong></label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="请输入电子邮箱">
                        </div>
                        <div class="form-group">
                            <label><strong>密码</strong></label>
                            <input type="password" name="password" class="form-control" placeholder="请输入密码">
                        </div>
                        <div class="form-group row grid">
                            <div class="col-lg-9 text-left">
                                <label for="captcha"></label>
                                <input type="text" id="captcha" name="captcha" class="form-control">
                            </div>
                            <div class="captcha-wrapper col-lg-3 pointer">
                                <img class="w-100" src="{{ url('captcha') }}" alt="captcha img">
                            </div>
                        </div>
                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                            <div class="form-group">
                                <div class="form-check ml-2">
                                    <input class="form-check-input" type="checkbox" id="remenber-me">
                                    <label class="form-check-label" for="remenber-me">Remember me</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="page-forgot-password.html">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-block">登录</button>
                        </div>
                    </form>
                    <div class="new-account mt-3">
                        <p>Don't have an account? <a class="text-primary" href="./page-register.html">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script src="/js/login/index.js"></script>
@endsection