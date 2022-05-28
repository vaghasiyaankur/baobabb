<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="SiteName">

    <link rel="icon" type="image/png" sizes="16x16" href="http://127.0.0.1:8000/storage/app/default/ico/favicon.png">

    <title>Login :: SiteName Admin</title>


    <meta name="csrf-token" content="XEZ3NE52QAppnEjwGdJEmteOIvUg98RIvbeDy319" />


    <base target="_top" />

    <link rel="canonical" href="http://127.0.0.1:8080/admin/login" />


    <link href="http://127.0.0.1:8080/css/admin.css?id=23251a1b537c4ce15d7b" rel="stylesheet">




    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="dns-prefetch" href="//storage.googleapis.com">
    <link rel="dns-prefetch" href="//graph.facebook.com">
    <link rel="dns-prefetch" href="//google.com">
    <link rel="dns-prefetch" href="//apis.google.com">
    <link rel="dns-prefetch" href="//ajax.googleapis.com">
    <link rel="dns-prefetch" href="//www.google-analytics.com">
    <link rel="dns-prefetch" href="//www.googletagmanager.com">
    <link rel="dns-prefetch" href="//pagead2.googlesyndication.com">
    <link rel="dns-prefetch" href="//gstatic.com">
    <link rel="dns-prefetch" href="//cdn.api.twitter.com">
    <link rel="dns-prefetch" href="//oss.maxcdn.com">
    <link rel="dns-prefetch" href="//cloudflare.com">
</head>

<body>
    <div class="main-wrapper">



        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="">
            <div class="auth-box p-4 bg-white rounded">

                <div class="logo text-center mb-5">
                    <a href="http://127.0.0.1:8080">
                        <img src="" alt="logo" class="img-fluid" style="width:250px; height:auto;">
                    </a>
                    <hr class="border-0 bg-secondary">
                </div>




                <div id="loginform">

                    <div class="logo">
                        <h3 class="box-title mb-3">Login</h3>
                    </div>


                    <div class="row">
                        <div class="col-12">

                            <form class="form-horizontal mt-3" id="loginform" action="{{ route('admin.login') }}"
                                method="post">
                                @csrf
                                {{-- <input type="hidden" name="_token" value="XEZ3NE52QAppnEjwGdJEmteOIvUg98RIvbeDy319"> --}}


                                <div class="row mb-3">
                                    <div class="">
                                        <input class="form-control" type="text" name="email" value=""
                                            placeholder="Email address">
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>


                                <div class="row mb-3">
                                    <div class="">
                                        <input class="form-control" type="password" name="password"
                                            placeholder="Password">
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                </div>

                                {{-- <div class="row mb-3">
                                    <div class="d-flex">
                                        <div class="ms-auto">
                                            <a href="javascript:void(0)" id="to-recover" class="text-muted float-end">
                                                <i class="fa fa-lock me-1"></i> Forgot your password?
                                            </a>
                                        </div>
                                    </div>
                                </div> --}}


                                <div class="row mb-3 text-center mt-4">
                                    <div class="col-12 d-grid">
                                        <button class="btn btn-primary btn-lg waves-effect waves-light"
                                            type="submit">Login</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>

                <div id="recoverform">
                    <div class="logo">
                        <h3 class="fw-medium mb-3">Reset Password</h3>
                        <span class="text-muted">Enter your Email and instructions will be sent to you!</span>
                    </div>

                    <div class="row mt-3">

                        {{-- <form class="col-12" action="{{route('admin.password.email')}}" method="post">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-12">
                                    <input class="form-control" type="email" name="email" value=""
                                        placeholder="Email address">

                                </div>
                            </div>



                            <div class="row mb-3">
                                <div class="d-flex">
                                    <div class="ms-auto">
                                        <a href="javascript:void(0)" id="to-login" class="text-muted float-end">
                                            <i class="fas fa-sign-in-alt me-1"></i> Login
                                        </a>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3 text-center mt-4">
                                <div class="col-12 d-grid">
                                    <button class="btn btn-lg btn-primary" type="submit" name="action">Reset</button>
                                </div>
                            </div>
                        </form> --}}
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script src="http://127.0.0.1:8080/js/admin.js?id=837c373ae21d3891647f"></script>


    <script>
        preventPageLoadingInIframe();

        $(document).ready(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
            $('.preloader').fadeOut();


            $('#to-recover').on('click', function() {
                $('#loginform').slideUp();
                $('#recoverform').fadeIn();
            });
            $('#to-login').on('click', function() {
                $('#recoverform').slideUp();
                $('#loginform').fadeIn();
            });
        });

        /**
         * Prevent the page to load in IFRAME by redirecting it to the top-level window
         */
        function preventPageLoadingInIframe() {
            try {
                if (window.top.location !== window.location) {
                    window.top.location.replace(siteUrl);
                }
            } catch (e) {
                console.error(e);
            }
        }
    </script>




</body>

</html>
