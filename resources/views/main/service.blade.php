@include('layouts.mainsite.header')

<!------------- Breadcrumb Section start ----------->
<div class="ss-bread-section">
    <div class="ss-breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="ss-bread-content">
                        <h2>Services</h2>
                        <div class="ss-bread-list">
                            <span>
                                <a href="{{route('Index')}}">Home</a>
                            </span>
                            <span class="ss-active-page">Services</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------- Breadcrumb Section end ----------->
<!------------- Why-choose Section start ----------->
<div class="ss-bgcover ss-why-sec">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="ss-heading-wrap ss-why-heading">
                    <h5>Why Choose Us</h5>
                    <h3>It's Safe Compared To Electricity Panel For Your Home</h3>
                    <div class="bottom-line"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="ss-solar-box ss-why-box">
                    <div class="ss-why-img">
                        <img src="{{asset('')}}assets/images/wind-generator.png" alt="icon" />
                    </div>
                    <div class="ss-solar-text">
                        <h3>Wind Generators</h3>
                        <p>Wind generators use natural wind power to produce clean and renewable electricity.
                            They are an efficient solution for reducing dependency on traditional power sources.</p>
                    </div>
                </div>
                <div class="ss-solar-box ss-why-box">
                    <div class="ss-why-img">
                        <img src="{{asset('')}}assets/images/clean-energy.png" alt="icon" />
                    </div>
                    <div class="ss-solar-text">
                        <h3>Always Clean Energy</h3>
                        <p>Clean energy reduces pollution and protects the environment for future generations.
                            It provides sustainable power without harming nature or increasing carbon emissions.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 p-0">
                <div class="ss-why-centerimg">
                    <img src="{{asset('')}}assets/images/center_img.png" alt="image" />
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="ss-solar-box ss-why-box">
                    <div class="ss-why-img">
                        <img src="{{asset('')}}assets/images/energy-reused.png" alt="icon" />
                    </div>
                    <div class="ss-solar-text">
                        <h3>Energy Can Be Reused</h3>
                        <p>Renewable energy sources can be reused again and again without depletion.
                            This ensures long-term energy availability and cost savings.</p>
                    </div>
                </div>
                <div class="ss-solar-box ss-why-box">
                    <div class="ss-why-img">
                        <img src="{{asset('')}}assets/images/installation.png" alt="icon" />
                    </div>
                    <div class="ss-solar-text">
                        <h3>Easy Installation</h3>
                        <p>Our systems are designed for quick and hassle-free installation.
                            They require minimal maintenance while delivering reliable performance.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ss-bgshapes ss-why-bgshape">
        <img src="{{asset('')}}assets/images/why-bgleft.png" alt="image">
        <img src="{{asset('')}}assets/images/why-bgright.png" alt="image">
    </div>
    <div class="ss-why-bgicon">
        <img src="{{asset('')}}assets/images/why-icon1.png" alt="icon">
        <img src="{{asset('')}}assets/images/why-icon2.png" alt="icon">
    </div>
</div>
<!------------- Why-choose Section end ----------->
<!------------- Solar-supplier Section start ----------->
<div class="ss-bgcover ss-solarpanel-sec">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="ss-heading-wrap ss-panel-heading">
                    <h5>Trusted Solar Solutions</h5>
                    <h3>Light Up With Your Solar & Save Natural Resource</h3>
                    <div class="bottom-line"></div>
                    <p>Harness the power of the sun with reliable and eco-friendly solar solutions.
                        Our systems help you reduce energy costs while protecting valuable natural resources.
                        We provide high-quality solar installations designed for long-term performance.
                        Our expert team ensures smooth installation and dependable after-sales support.
                        Switch to clean energy today and power your future with confidence.</p>
                </div>
                <div class="ss-panelimg-sec">
                    <div class="ss-pannel-img popup">
                        <img src="{{asset('')}}assets/images/panel-1.png" alt="image" />
                    </div>
                    <div class="ss-pannel-img">
                        <img src="{{asset('')}}assets/images/panel-2.png" alt="image" />
                        <a href="javascript:void(0);" class="ss-panel-videoicon" id="popup">
                            <img src="{{asset('')}}assets/images/video.png" a;t="icon">
                        </a>
                        <div id="videopopup1" class="ss-videopopup">
                            <div class="ss-videopopup-content">
                                <span class="close" id="close">×</span>
                                <iframe src="https://www.youtube.com/embed/hJTmi9euoNg" frameborder="0"
                                    allowfullscreen=""></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="ss-pannel-img popup">
                        <img src="{{asset('')}}assets/images/panel-3.png" alt="image" />
                    </div>

                </div>
                <div class="popup-imgshow">
                    <div class="overlay">
                        <div class="img-show">
                            <span>X</span>
                            <img src="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="ss-panel-rightimg">
                    <img src="{{asset('')}}assets/images/panel-4.png" alt="image" />
                    <button class="ss-panel-shareicon" data-bs-toggle="modal" data-bs-target="#modalshare">
                        <img src="{{asset('')}}assets/images/share-icon.png" alt="icon">
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="ss-bgshapes ss-panel-bgshape">
        <img src="{{asset('')}}assets/images/panel-bgleft.png" alt="image">
        <img src="{{asset('')}}assets/images/panel-bgright.png" alt="image">
    </div>
</div>
<!------------- Solar-supplier Section End ----------->


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