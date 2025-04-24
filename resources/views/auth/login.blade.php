
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from phpstack-1384472-5121645.cloudwaysapps.com/template/html/axelit/template/sign_in_1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Apr 2025 19:51:22 GMT -->
<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Multipurpose, super flexible, powerful, clean modern responsive bootstrap 5 admin template"
          name="description">
    <meta content="admin template, axelit admin template, dashboard template, flat admin template, responsive admin template, web app"
          name="keywords">
    <meta content="la-themes" name="author">
    <link href="{{ asset('dashboard/images/logo/favicon.png') }}" rel="icon" type="image/x-icon">
    <link href="{{ asset('dashboard/images/logo/favicon.png') }}" rel="shortcut icon" type="image/x-icon">

    <title>axelit - Premium Admin Template</title>

    <!--font-awesome-css-->
    <link href="{{ asset('dashboard/vendor/fontawesome/css/all.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/" rel="preconnect">
    <link crossorigin href="https://fonts.gstatic.com/" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&amp;display=swap"
          rel="stylesheet">

    <!-- iconoir icon css  -->
    <link href="{{ asset('dashboard/vendor/ionio-icon/css/iconoir.css') }}" rel="stylesheet">

    <!-- tabler icons-->
    <link href="{{ asset('dashboard/vendor/tabler-icons/tabler-icons.css') }}" rel="stylesheet" type="text/css">

    <!-- Bootstrap css-->
    <link href="{{ asset('dashboard/vendor/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

    <!-- App css-->
    <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet" type="text/css">

    <!-- Responsive css-->
    <link href="{{ asset('dashboard/css/responsive.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
<div class="app-wrapper d-block">
    <div class="">
        <!-- Body main section starts -->
        <main class="w-100 p-0">
            <!-- Login to your Account start -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="login-form-container">
                            <div class="mb-4">
                                <a class="logo d-inline-block" href="{{ route('login') }}">
                                    <img alt="#" src="{{ asset('dashboard/images/logo/1.png') }}" width="250">
                                </a>
                            </div>
                            <div class="form_container">

                                <form class="app-form rounded-control" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3 text-center">
                                        <h3 class="text-primary-dark">Hesaba daxil olun</h3>
                                        <p class="f-s-12 text-secondary">Sistemin təhlükəsizliyi üçün şifrənizi gizli saxlayın</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email ünvanı</label>
                                        <input class="form-control" name="email" type="email">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Şifrə</label>
                                        <input class="form-control" name="password" type="password">
                                    </div>
                                    <div>
                                        <button class="btn btn-light-primary w-100"
                                           type="submit">Sistemə daxil olun</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Login to your Account end -->
        </main>
        <!-- Body main section ends -->
    </div>
</div>
<!-- latest jquery-->
<script src="{{ asset('assets/js/jquery-3.6.3.min.js') }}"></script>

<!-- Bootstrap js-->
<script src="{{ asset('dashboard/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>

</body>


<!-- Mirrored from phpstack-1384472-5121645.cloudwaysapps.com/template/html/axelit/template/sign_in_1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Apr 2025 19:51:22 GMT -->
</html>