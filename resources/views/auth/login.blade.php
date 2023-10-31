<!doctype html>
<html lang="en" data-layout="vertical" data-layout-style="detached" data-sidebar="light" data-topbar="dark" data-sidebar-size="lg" data-sidebar-image="none">
<head>
    <meta charset="utf-8" />
    <title>Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sip3ri" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- auth-page wrapper -->
<div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="bg-overlay"></div>
    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden pt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="auth-one-bg" style="margin-top: 35px">
                                    <div class="bg-overlay"></div>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4">
                                    <div>
                                        <h5 class="text-primary"> Welcome Back !</h5>
                                        <p class="text-muted">Sign in to continue</p>
                                    </div>
                                    <div class="mt-4">
                                        <form method="post" action="{{ route('login.perform') }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="username" value="{{ old('username') }}" placeholder="name@example.com" required="required" autofocus>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="password-input">Password</label>
                                                <div class="position-relative auth-pass-inputgroup mb-3">
                                                    <input type="password" class="form-control pe-5" name="password" placeholder="Enter password" id="password-input" required="required">
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a href="/" class="btn btn-warning w-100">Home</a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button class="btn btn-info w-100" type="submit">Sign In</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0">&copy;
                            <script>document.write(new Date().getFullYear())</script> Sip3ri
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
<!-- end auth-page-wrapper -->

<!-- JAVASCRIPT -->
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>
<script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="assets/js/plugins.js"></script>

<!-- password-addon init -->
<script src="assets/js/pages/password-addon.init.js"></script>
</body>

</html>