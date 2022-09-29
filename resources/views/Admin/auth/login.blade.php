<!DOCTYPE html>
<html lang="en-US" dir="ltr">


<!-- Mirrored from prium.github.io/phoenix/v1.2.0/pages/authentication/simple/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Aug 2022 04:54:06 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Admin login page</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/')}}style/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/')}}style/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/')}}style/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://prium.github.io/phoenix/v1.2.0/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="https://prium.github.io/phoenix/v1.2.0/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="{{asset('/')}}style/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/')}}style/css/line.css">
    <link href="{{asset('/')}}style/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
    <link href="{{asset('/')}}style/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">
</head>

<body>
<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <div class="container-fluid px-0" data-layout="container">
        <div class="container">
            <div class="row flex-center min-vh-100 py-5">
                <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3"><a class="d-flex flex-center text-decoration-none mb-4" href="https://prium.github.io/phoenix/v1.2.0/index.html">
                        <div class="d-flex align-items-center fw-bolder fs-5 d-inline-block"><img src="{{asset('/')}}style/img/icons/logo.png" alt="phoenix" width="58" /></div>
                    </a>
                    <div class="text-center mb-7">
                        <h3>Sign In</h3>
                        <p class="text-700">Get access to your account</p>
                    </div><button class="btn btn-phoenix-secondary w-100 mb-3"><span class="fab fa-google text-danger me-2 fs--1"></span>Sign in with google</button><button class="btn btn-phoenix-secondary w-100"> <span class="fab fa-facebook text-primary me-2 fs--1"></span>Sign in with facebook</button>
                    <div class="position-relative mt-4">
                        <hr class="bg-200" />
                        <div class="divider-content-center">or use email</div>
                    </div>
                    <form class="form-horizontal" action="{{route('login')}}" method="POST">
                        @csrf

                        <div class="mb-3 text-start"><label class="form-label" for="email">Email address</label>
                            <div class="form-icon-container"><input class="form-control form-icon-input" name="email" id="email" type="email" placeholder="name@example.com" /><span class="fas fa-user text-900 fs--1 form-icon"></span></div>
                        </div>
                        <div class="mb-3 text-start"><label class="form-label" for="password">Password</label>
                            <div class="form-icon-container"><input class="form-control form-icon-input" name="password" type="password" placeholder="Password" /><span class="fas fa-user text-900 fs--1 form-icon"></span></div>
                        </div>

                        <button class="btn btn-primary w-100 mb-3">Sign In</button>
                    </form>

                    {{--                    <div class="row flex-between-center mb-7">--}}
                    {{--                        <div class="col-auto">--}}
                    {{--                            <div class="form-check mb-0"><input class="form-check-input" id="basic-checkbox" type="checkbox" checked="checked" /><label class="form-check-label mb-0" for="basic-checkbox">Remember me</label></div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="col-auto"><a class="fs--1 fw-semi-bold" href="{{route('forgotpassword')}}">Forgot Password?</a></div>--}}
                    {{--                    </div>--}}

                    <div class="text-center"><a class="fs--1 fw-bold" href="{{route('register')}}">Create an account</a></div>
                </div>
            </div>
        </div>
    </div>
</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->



<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="{{asset('/')}}style/vendors/popper/popper.min.js"></script>
<script src="{{asset('/')}}style/vendors/bootstrap/bootstrap.min.js"></script>
<script src="{{asset('/')}}style/vendors/anchorjs/anchor.min.js"></script>
<script src="{{asset('/')}}style/vendors/is/is.min.js"></script>
<script src="{{asset('/')}}style/vendors/fontawesome/all.min.js"></script>
<script src="{{asset('/')}}style/vendors/lodash/lodash.min.js"></script>
<script src="{{asset('/')}}style/js/polyfill.min58be.js?features=window.scroll"></script>
<script src="{{asset('/')}}style/vendors/list.js/list.min.js"></script>
<script src="{{asset('/')}}style/vendors/feather-icons/feather.min.js"></script>
<script src="{{asset('/')}}style/vendors/dayjs/dayjs.min.js"></script>
<script src="{{asset('/')}}style/js/phoenix.js"></script>
</body>


<!-- Mirrored from prium.github.io/phoenix/v1.2.0/pages/authentication/simple/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Aug 2022 04:54:12 GMT -->
</html>
