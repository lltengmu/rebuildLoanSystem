<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="stylesheet" href="{{ asset('/focus-premium/focus/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/global.css') }}">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">setting your password</h4>
                                    <form id="email-verification">
                                        @csrf
                                        <div class="form-group">
                                            <label for="password"><strong>密码:</strong></label>
                                            <input type="password" id="password" name="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation"><strong>确认密码:</strong></label>
                                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">提交</button>
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

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('focus-premium/focus/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('focus-premium/focus/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('focus-premium/focus/js/custom.min.js') }}"></script>
    <script src="{{ asset('js/common/verification/index.js') }}"></script>
</body>

</html>