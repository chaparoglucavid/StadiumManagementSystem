
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from phpstack-1384472-5121645.cloudwaysapps.com/template/html/axelit/template/sign_up.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Apr 2025 19:51:22 GMT -->
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

    <title>SMS - Stadium Management System</title>

    <!--font-awesome-css-->
    <link href="{{ asset('dashboard/') }}/vendor/fontawesome/css/all.css" rel="stylesheet">

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

<body class="sign-in-bg">
<div class="app-wrapper d-block">
    <div class="main-container">
        <!-- sign up start -->
        <div class="container">
            <div class="row sign-in-content-bg">
                <div class="col-lg-6 image-contentbox d-none d-lg-block">
                    <div class="form-container">

                        <div class="signup-content mt-4">
                    <span>
                      <img alt="" class="img-fluid " src="../assets/images/logo/1.png">
                    </span>
                        </div>

                        <div class="signup-bg-img">
                            <img alt="" class="img-fluid" src="../assets/images/login/02.png">
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 form-contentbox">
                    <div class="form-container">
                        <form class="app-form rounded-control">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5 text-center text-lg-start">
                                        <h2 class="text-primary-dark f-w-600">Create Account</h2>
                                        <p>Get Started For Free Today!</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Username</label>
                                        <input class="form-control" id="username" placeholder="Enter Your Username"
                                               required
                                               type="text">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Email</label>
                                        <input class="form-control" id="email" placeholder="Enter Your Email"
                                               required type="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <input class="form-control" id="password" placeholder="Enter Your Password"
                                               required
                                               type="password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="password">Confirm Password</label>
                                        <input class="form-control" id="password1" placeholder="Enter Your Password"
                                               required
                                               type="password">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-between gap-3">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="checkDefault" type="checkbox" value="">
                                            <label class="form-check-label text-secondary" for="checkDefault">
                                                Accept Terms & Conditions
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <a class="btn btn-light-primary w-100" href="index.html" role="button">Sign
                                            Up</a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="text-center text-lg-start">
                                        Already Have A Account? <a class="link-primary-dark text-decoration-underline"
                                                                   href="sign_in.html">
                                        Sign in</a>
                                    </div>
                                </div>
                                <div class="app-divider-v justify-content-center">
                                    <p>Or sign up with</p>
                                </div>
                                <div class="col-12">
                                    <div class="text-center">
                                        <button class="btn btn-light-facebook icon-btn b-r-22 m-1" type="button"><i
                                                class="ti ti-brand-facebook "></i></button>
                                        <button class="btn btn-light-gmail icon-btn b-r-22 m-1" type="button"><i
                                                class="ti ti-brand-google "></i></button>
                                        <button class="btn btn-light-github icon-btn b-r-22 m-1" type="button"><i
                                                class="ti ti-brand-github "></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- sign up end -->
    </div>
</div>


<!-- latest jquery-->
<script src="{{ asset('dashboard/js/jquery-3.6.3.min.js') }}"></script>

<!-- Bootstrap js-->
<script src="{{ asset('dashboard/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>

</body>


<!-- Mirrored from phpstack-1384472-5121645.cloudwaysapps.com/template/html/axelit/template/sign_up.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Apr 2025 19:51:22 GMT -->
</html>