<html lang="zxx"><head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Awaiken">
	<!-- Page Title -->
    <title>{{sitename()}}</title>
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
            <div class="contact-form">
                <!-- Section Title Start -->

                
               <div class="text-center">
    <img src="{{asset('')}}assets/images/logoIcon/logo.png" alt="Login" style="max-width: 50%;">
</div>

						<!-- <div style="display: flex; justify-content: center;">
    <h3 class="wow fadeInUp" data-cursor="-opaque">Login</h3>
</div> -->

                <!-- Section Title End -->

                <!-- Contact Form Start -->

</br></br></br>
               
                                                <form name="frmlogin" method="POST"
                                                    class="request_qoute_form wrap-form clearfix"
                                                    action="{{route('login')}}">
                                                    {{ csrf_field() }}

                                                    <center>
                                                        <table cellspacing=0 cellpadding=2 border=0 width="100%">
                                                            <tr>
                                                                <td class="loginborder" colspan="2">
                                                                    @if(session()->has('messages'))
                                                                    <?php
                                $user_details=session()->get('messages')
                              ?>



                                                                    <h4 style="color: #fff">Congratulations! Your
                                                                        Account has been successfully
                                                                        Created.</h4>
                                                                    <br>

                                                                    <h4 style="color: #fff">Dear <span
                                                                            class="main-color"
                                                                            style="color: #ffc70d;font-weight: 700;">{{$user_details->name }}</span>,
                                                                    </h4>
                                                                    <br>
                                                                    <h4 style="color: #fff"> You have been successfully
                                                                        registered. <br> Your
                                                                        user id is <span class="main-color"
                                                                            style="  color: #ffc70d;font-weight: 700;">{{$user_details->username  }}</span>
                                                                        Password is: <span class="main-color"
                                                                            style="color: #ffc70d;font-weight: 700;">
                                                                            {{$user_details->PSR  }}</span> and
                                                                        Transaction Password is: <span
                                                                            class="main-color"
                                                                            style="color: #ffc70d;font-weight: 700;">
                                                                            {{$user_details->TPSR  }}</span>
                                                                        please check your mail for more details.</h4>

                                                                    @endif

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="loginborder" colspan="2">

                                                                <br>

                                                         <div class="contact-form-btn">
    <a href="{{route('login')}}" class="btn-default"><span style="display: block; text-align: center;" >Login</span></a>
    <div id="msgSubmit" class="h3 hidden"></div>
</div>

                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </center>
                                                </form>
                </form>
                <!-- Contact Form End -->
            </div>
        </div>
    </div>
</div>


              @include('partials.notify')