<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="https://mztech.sa/">
    <title>الدخول الى لوحة التحكم</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/vendors-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/authentication.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/style.css') }}">
</head>
<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  menu-collapsed blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="row flexbox-container">
                <div class="col-xl-8 col-11 d-flex justify-content-center">
                    <div class="card bg-authentication rounded-0 mb-0">
                        <div class="row m-0">
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                <img src="{{ asset('dashboard/images/login.png') }}" alt="branding logo" style="width: 100%">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <div class="card rounded-0 mb-0 px-2">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="mb-0">تسجيل الدخول</h4>
                                        </div>
                                    </div>
                                    <p class="px-2">برجاء ادخال بياناتك للدخول الى لوحة التحكم</p>
                                    <div class="card-content">
                                        <div class="card-body pt-1">
                                            <form method="POST" action="{{ route('dashboardLogin') }}">
                                                {{ csrf_field() }}
                                                <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                    <input type="email" name="email" class="form-control" id="user-name" placeholder="البريد الالكتروني" required>
                                                    <div class="form-control-position">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <label for="user-name">البريد الالكتروني</label>
                                                </fieldset>
                                                <fieldset class="form-label-group position-relative has-icon-left">
                                                    <input type="password" name="password" class="form-control" id="user-password" placeholder="كلمة المرور" required>
                                                    <div class="form-control-position">
                                                        <i class="fa fa-lock"></i>
                                                    </div>
                                                    <label for="user-password">كلمة المرور</label>
                                                </fieldset>
                                                <button type="submit" class="btn btn-primary btn-inline">دخول</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@include('messages.errors')
<script>
  setTimeout(function() {
    $('#myMsg').fadeOut('fast');
  }, 5000);
</script>
</body>
</html>

