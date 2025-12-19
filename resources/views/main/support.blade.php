@include('layouts.mainsite.header')

    <!-- Page Header Start -->
	<div class="page-header">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<!-- Page Header Box Start -->
					<div class="page-header-box">
						<h1 class="wow fadeInUp" data-cursor="-opaque" style="visibility: visible; animation-name: fadeInUp;">Contact <span>us</span></h1>
						<nav class="wow fadeInUp" data-wow-delay="0.2s" style="visibility: hidden; animation-delay: 0.2s; animation-name: none;">
                            <ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="./">home</a></li>
								<li class="breadcrumb-item active" aria-current="page">contact us</li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

   <!-- Page Contact Us Start -->
   <div class="page-contact-us">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp" style="visibility: hidden; animation-name: none;">get in touch</h3>
                        <h2 class="wow fadeInUp" data-wow-delay="0.2s" data-cursor="-opaque" style="visibility: hidden; animation-delay: 0.2s; animation-name: none;">Join Forces with Beagers: Empower Innovation with<span> Crypto Investments</span></h2>
                    </div>
                    <!-- Section Title End -->
                </div>         
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Contact Us Form Start -->
                    <div class="conatct-us-form">
                        <!-- Contact Form Start -->
                        <div class="contact-form">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h2 class="wow fadeInUp" data-cursor="-opaque" style="visibility: hidden; animation-name: none;">Have any questions?</h2>
                            </div>
                            <!-- Section Title End -->
                            
                            <!-- Contact Form Start -->
                            <form id="contactForm" action="#" method="POST" data-toggle="validator" class="wow fadeInUp" data-wow-delay="0.2s" novalidate="true" style="visibility: hidden; animation-delay: 0.2s; animation-name: none;">
                                <div class="row">
                                    <div class="form-group col-md-6 mb-4">
                                        <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
            
                                    <div class="form-group col-md-6 mb-4">
                                        <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    
                                    <div class="form-group col-md-6 mb-4">
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone No." required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
            
                                    <div class="form-group col-md-6 mb-4">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
            
                                    <div class="form-group col-md-12 mb-5">
                                        <textarea name="message" class="form-control" id="message" rows="4" placeholder="Write Message..."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
            
                                    <div class="col-lg-12">
                                        <div class="contact-form-btn">
                                            <button type="submit" class="btn-default disabled"><span>submit now</span></button>
                                            <div id="msgSubmit" class="h3 hidden"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Contact Form End -->
                        </div>
                        <!-- Contact Form End -->
                
                        <!-- Google Map Iframe Start -->
                        <div class="google-map-iframe">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96737.10562045308!2d-74.08535042841811!3d40.739265258395164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1703158537552!5m2!1sen!2sin" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <!-- Google Map Iframe End -->
                    </div>
                    <!-- Contact Us Form End -->
                </div>

                <div class="col-lg-12">
                    <!-- Contact Info List Start -->
                    <div class="contact-info-list">
                        <!-- Contact Info Item Start -->
                        <div class="contact-info-item wow fadeInUp" style="visibility: hidden; animation-name: none;">
                            <div class="icon-box">
                                <img src="{{asset('')}}main/images/icon-phone.svg" alt="">
                            </div>
                            <div class="contact-info-content">
                                <h3>contact us</h3>
                                <p><a href="tel:+123254963">(+00) 123-254-963</a></p>
                                <p><a href="tel:+761852339">(+12) 761 852 339</a></p>
                            </div>
                        </div>
                        <!-- Contact Info Item End -->

                        <!-- Contact Info Item Start -->
                        <div class="contact-info-item wow fadeInUp" data-wow-delay="0.2s" style="visibility: hidden; animation-delay: 0.2s; animation-name: none;">
                            <div class="icon-box">
                                <img src="{{asset('')}}main/images/icon-mail.svg" alt="">
                            </div>
                            <div class="contact-info-content">
                                <h3>email us</h3>
                                <p><a href="mailto:info@domain.com">info@Beagers.com</a></p>
                                <p><a href="mailto:support@domain.com">support@Beagers.com</a></p>
                            </div>
                        </div>
                        <!-- Contact Info Item End -->

                        <!-- Contact Info Item Start -->
                        <div class="contact-info-item wow fadeInUp" data-wow-delay="0.4s" style="visibility: hidden; animation-delay: 0.4s; animation-name: none;">
                            <div class="icon-box">
                                <img src="{{asset('')}}main/images/icon-clock.svg" alt="">
                            </div>
                            <div class="contact-info-content">
                                <h3>Working hours</h3>
                                <p>Mon - Fri : 08AM -  10PM</p>
                                <p>sat - sun : close</p>
                            </div>
                        </div>
                        <!-- Contact Info Item End -->

                        <!-- Contact Info Item Start -->
                        <div class="contact-info-item wow fadeInUp" data-wow-delay="0.6s" style="visibility: hidden; animation-delay: 0.6s; animation-name: none;">
                            <div class="icon-box">
                                <img src="{{asset('')}}main/images/icon-location.svg" alt="">
                            </div>
                            <div class="contact-info-content">
                                <h3>location</h3>
                                <p>2715 Ash San Jose, USA</p>
                                <p>2715 Ash San Jose, USA</p>
                            </div>
                        </div>
                        <!-- Contact Info Item End -->
                    </div>
                    <!-- Contact Info List Start -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Contact Us End -->
@include('layouts.mainsite.footer')
