@include('layouts.mainsite.header')
   
   <!------------- Breadcrumb Section start ----------->
    <div class="ss-bread-section">
        <div class="ss-breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="ss-bread-content">
                            <h2>Contact</h2>
                            <div class="ss-bread-list">
                                <span>
                                    <a href="{{route('Index')}}">Home</a>
                                </span>
                                <span class="ss-active-page">Contact</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------- Breadcrumb Section end ----------->
     <!------------- Contact Section start ----------->
     <div class="ss-bgcover ss-contact-info">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="ss-contact-box">
                        <div class="ss-contact-icon">
                            <img src="{{asset('')}}assets/images/con-map.png" alt="icon">
                        </div>
                        <div class="ss-contact-text">
                            <h4>Contact Us</h4>
                            <p>+1-202-555-0101</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="ss-contact-box">
                        <div class="ss-contact-icon">
                            <img src="{{asset('')}}assets/images/con-email.png" alt="icon">
                        </div>
                        <div class="ss-contact-text">
                            <h4>Email Us</h4>
                            <p><a href="mailto:info@gmail.com" class="__cf_email__" data-cfemail="">info@gmail.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="ss-contact-box">
                        <div class="ss-contact-icon">
                            <img src="{{asset('')}}assets/images/con-call.png" alt="icon">
                        </div>
                        <div class="ss-contact-text">
                            <h4>Address</h4>
                            <p>XYZ, <br> India</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="ss-contact-form">
                        <h3 class="ss-title">Get In Touch</h3>
                        <form>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="ss-form-input">
                                        <input type="text" class="form-control require" placeholder="Enter Your Name"
                                        name="full_name" id="full_name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="ss-form-input">
                                        <input type="text" class="form-control require" placeholder="Enter Your Email" name="email"
                                            id="email" data-valid="email" data-error="Email should be valid." />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="ss-form-input">
                                        <input type="text" class="form-control require" placeholder="Enter Your Subject" name="subject"
                                            id="subject">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="ss-form-input">
                                        <input type="text" placeholder="Enter Your Number" class="form-control" id=""number>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="ss-form-input">
                                        <textarea placeholder="Enter Your Message..." class="form-control form-textarea require" name="message"
                                            id="message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <button type="button" class="ss-btn ss-con-btn submitForm">Submit</button>
                                    <div class="response"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="ss-bgshapes ss-blogpage-bgshape">
            <img src="{{asset('')}}assets/images/panel-bgleft.png" alt="image">
            <img src="{{asset('')}}assets/images/panel-bgright.png" alt="image">
        </div>
    </div>
    <!------------- Contact Section end ----------->
    <!------------- Map Section end ----------->
    <div class="responsive-map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2822.7806761080233!2d-93.29138368446431!3d44.96844997909819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52b32b6ee2c87c91%3A0xc20dff2748d2bd92!2sWalker+Art+Center!5e0!3m2!1sen!2sus!4v1514524647889"
            allowfullscreen></iframe>
    </div>
    <!------------- Map Section end ----------->
    <!------------- Newsletter Section start ----------->
    <div class="ss-bgcover ss-newsletter-sec">
        <div class="ss-newsletter-formsec">
            <div class="container-fluid">
                <div class="ss-nesletter-box">
                    <h3>Sign Up To Get Updates & News About Us..</h3>
                    <form method="" class="ss-form-sec">
                        <div class="ss-form-input">
                            <input type="email" class="form-control" placeholder="Enter Your Email" name="email">
                            <img src="{{asset('')}}assets/images/subscribe-icon.svg" alt="icon" class="ss-form-icon">
                        </div>
                        <div class="ss-form-btn">
                            <button type="submit" class="ss-btn">Subscribe</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="ss-newsleft-img">
            <img src="{{asset('')}}assets/images/news-leftimg.png" alt="image">
        </div>
    </div>
<!------------- Newsletter Section start ----------->
@include('layouts.mainsite.footer')