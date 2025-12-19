<html lang="zxx">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Awaiken">
    <!-- Page Title -->
    <title>{{sitename('')}}</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('')}}main/images/favicon.png">
    <!-- Google Fonts Css-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&amp;display=swap" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="{{asset('')}}main/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- SlickNav Css -->
    <link href="{{asset('')}}main/css/slicknav.min.css" rel="stylesheet">
    <!-- Swiper Css -->
    <link rel="stylesheet" href="{{asset('')}}main/css/swiper-bundle.min.css">
    <!-- Font Awesome Icon Css-->
    <link href="{{asset('')}}main/css/all.min.css" rel="stylesheet" media="screen">
    <!-- Animated Css -->
    <link href="{{asset('')}}main/css/animate.css" rel="stylesheet">
    <!-- Magnific Popup Core Css File -->
    <link rel="stylesheet" href="{{asset('')}}main/css/magnific-popup.css">
    <!-- Mouse Cursor Css File -->
    <link rel="stylesheet" href="{{asset('')}}main/css/mousecursor.css">
    <!-- Main Custom Css -->
    <link href="{{asset('')}}main/css/custom.css" rel="stylesheet" media="screen">
</head>

<body style="">
    <style>
        .contact-form {
            background-position: center center;
            background-size: cover;
            padding: 40px;
            border: 1px solid #404040;
            border-radius: 16px;
        }
    </style>
    <!-- Preloader Start -->
    <div class="preloader" style="display: none;">
        <div class="loading-container">
            <div class="loading"></div>
            <div id="loading-icon"><img src="{{asset('')}}main/images/loader.svg" alt=""></div>
        </div>
    </div>
    <!-- Preloader End -->



    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">

        </div>
        <!-- Page Header End -->

        <!-- Page Contact Us Start -->

        <div class="row">
            <div class="col-lg-6 mx-auto">
                <!-- Contact Us Form Start -->
                <div class="conatct">

                    <div class="page-header-box">

                    </div>
                    <div class="contact-form" style="
    margin: 11px;
">
                        <!-- Section Title Start -->


                        <div class="text-center">
                            <img src="{{asset('')}}assets/images/logoIcon/logo.png" alt="Login" style="max-width: 50%;">
                        </div>

                        <div style="display: flex; justify-content: center;">
                            <h3 class="wow fadeInUp" data-cursor="-opaque">Register</h3>
                        </div>

                        <!-- Section Title End -->

                        <!-- Contact Form Start -->

                        </br></br></br>

                        @php


                        $sponsor = @$_GET['ref'];
                        $pos = @$_GET['pos'];
                        $name = \App\Models\User::where('username', $sponsor)->first();
                        @endphp
                        <form action="{{route('registers')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">

                                <div class="form-group col-12 mb-4">
                                    <input class="form-control check_sponsor_exist" name="sponsor" data-response="usernameExist" type="text"
                                        value="{{ $sponsor ? $sponsor : '' }}" placeholder="Enter Sponsor ID " required>
                                    <div class="help-block with-errors"></div>
                                    <small id="usernameExist"><?= $name ? $name->name : '' ?></small>
                                </div>


                                <div class="form-group col-12 mb-4">
                                    <input class="form-control checkUser" id="email" name="name"
                                        type="" value="" required placeholder="Enter Name">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-12 mb-4">
                                    <input class="form-control checkUser" id="email" name="email"
                                        type="email" value="" required placeholder="Email">
                                    <div class="help-block with-errors"></div>
                                </div>


                                <div class="form-group col-12 mb-4">
                                    <input type="text" class="form-control" value="" name="phone" required
                                        placeholder="Enter your Mobile NO">
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-12 mb-4">
                                    <input type="password" class="form-control form--control " name="password"
                                        placeholder=" Enter Password">

                                </div>
                            </div>


                            <div class="form-group col-12 mb-4">
                                <input class="form-control" id="password-confirm" name="password_confirmation"
                                    type="password" placeholder="Enter Confirm Password" required
                                    autocomplete="new-password">
                            </div>




                            <div class="col-12">
                                <div class="contact-form-btn">
                                    <button type="submit" class="btn-default"><span>Register</span></button>
                                    <div id="msgSubmit" class="h3 hidden"></div>




                                    <p>Haven't an account? <a href="{{route('login')}}" class="text--base">Create an
                                            account</a></p>
                                    <!-- <p><a href="{{ route('forgot-password') }}" class="text--base">Forget password?</a> -->
                                    </p>
                                </div>
                            </div>
                    </div>
                    </form>
                    <!-- Contact Form End -->
                </div>
            </div>
        </div>
    </div>


    @include('partials.notify')


    <link href="{{ asset('') }}assets/global/css/iziToast.min.css" rel="stylesheet">
    <script src="{{ asset('') }}assets/global/js/iziToast.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('.check_sponsor_exist').on('keyup', function() {
            let sponsor = $(this).val();
            let resultArea = $(this).data('response');

            $.ajax({
                type: "POST",
                url: "{{ route('getUserName') }}", // Make sure this route returns user name or 1
                data: {
                    user_id: sponsor,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response !== '1') {
                        $('.submit-btn').prop("disabled", false);
                        $('#' + resultArea).html(response).css({
                            'color': '#28a745',
                            'font-weight': 'bold',
                            'margin-top': '5px'
                        });
                    } else {
                        $('.submit-btn').prop("disabled", true);
                        $('#' + resultArea).html("Sponsor ID Not Exists!").css({
                            'color': 'red',
                            'font-weight': 'bold',
                            'margin-top': '5px'
                        });
                    }
                },
                error: function(xhr) {
                    console.log("AJAX error:", xhr.responseText);
                }
            });
        });
    </script>