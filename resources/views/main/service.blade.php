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
                                <a href="index.html">Home</a>
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
<div class="ss-bgcover ss-why-sec ss-serwhy-sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="ss-solar-box ss-why-box">
                    <div class="ss-why-img">
                        <img src="{{asset('')}}assets/images/wind-generator.png" alt="icon" />
                    </div>
                    <div class="ss-solar-text">
                        <h3>Wind Generators</h3>
                        <p>In publishing and graphic design, ipsum is a placeholder text commonly used to
                            ipsum is a placeholder text commonly the visual form of a document.</p>
                    </div>
                </div>
                <div class="ss-solar-box ss-why-box">
                    <div class="ss-why-img">
                        <img src="{{asset('')}}assets/images/clean-energy.png" alt="icon" />
                    </div>
                    <div class="ss-solar-text">
                        <h3>Always Clean Energy</h3>
                        <p>In publishing and graphic design, ipsum is a placeholder text commonly used to
                            ipsum is a placeholder text commonly the visual form of a document.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
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
                        <p>In publishing and graphic design, ipsum is a placeholder text commonly used to
                            ipsum is a placeholder text commonly the visual form of a document.</p>
                    </div>
                </div>
                <div class="ss-solar-box ss-why-box">
                    <div class="ss-why-img">
                        <img src="{{asset('')}}assets/images/installation.png" alt="icon" />
                    </div>
                    <div class="ss-solar-text">
                        <h3>Easy Installation</h3>
                        <p>In publishing and graphic design, ipsum is a placeholder text commonly used to
                            ipsum is a placeholder text commonly the visual form of a document.</p>
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
                    <h5>Solar Panel Supplier</h5>
                    <h3>Light Up With Your Solar & Save Natural Resource</h3>
                    <div class="bottom-line"></div>
                    <p>Lorem ipsum dolor sit amet consectetur. Ultrices dictum interdum a commodo molestie posuere
                        eu lobortis. Nunc semper lectus velit nisl facilisis blandit. Purus proin in commodo
                        elementum. Nam pretium posuere tempus mattis at. Cursus sed gravida viverra enim ipsum velit
                        adipiscing molestie. Donec velit consequat maecenas rhoncus mauris sit faucibus in sagittis.
                        Egestas proin in pharetra vitae convallis in luctus.</p>
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
<!------------- counter Section Start ----------->
<div class="ss-bgcover ss-counter-sec ss-sercounter-sec">
    <div class="ss-counter-section">
        <div class="ss-counter-box">
            <div class="ss-counter-icon">
                <img src="{{asset('')}}assets/images/co-icon1.png" alt="icon">
            </div>
            <div class="ss-couter-text">
                <h2 class="ss-counting" data-to="48">48</h2>
                <p>Years Experience</p>
            </div>
        </div>
        <div class="ss-counter-box">
            <div class="ss-counter-icon">
                <img src="{{asset('')}}assets/images/co-icon2.png" alt="icon">
            </div>
            <div class="ss-couter-text">
                <h2 class="ss-counting" data-to="2886">2886</h2>
                <p>Projects Completed</p>
            </div>
        </div>
        <div class="ss-counter-box">
            <div class="ss-counter-icon">
                <img src="{{asset('')}}assets/images/co-icon3.png" alt="icon">
            </div>
            <div class="ss-couter-text">
                <h2 class="ss-counting" data-to="2879">2879</h2>
                <p>Happy Customers</p>
            </div>
        </div>
        <div class="ss-counter-box">
            <div class="ss-counter-icon">
                <img src="{{asset('')}}assets/images/co-icon4.png" alt="icon">
            </div>
            <div class="ss-couter-text">
                <h2 class="ss-counting" data-to="389">389</h2>
                <p>Awards Milestones</p>
            </div>
        </div>
    </div>
    <div class="ss-bgshapes ss-counter-bgshape">
        <img src="{{asset('')}}assets/images/count-shape.png" alt="img" />
        <img src="{{asset('')}}assets/images/count-shape.png" alt="img" />
        <img src="{{asset('')}}assets/images/count-shape.png" alt="img" />
        <img src="{{asset('')}}assets/images/count-shape.png" alt="img" />
    </div>
    <div class="ss-why-bgicon ss-coun-icon">
        <img src="{{asset('')}}assets/images/coun-icon1.png" alt="icon">
        <img src="{{asset('')}}assets/images/coun-icon2.png" alt="icon">
        <img src="{{asset('')}}assets/images/coun-icon3.png" alt="icon">
    </div>
</div>
<!------------- counter Section end ----------->
<!------------- Pricing plan Section start ----------->
<div class="ss-bgcover ss-pricing-sec">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="ss-pricing-content">
                    <div class="ss-heading-wrap ss-pricing-head">
                        <h5>Pricing Plans</h5>
                        <h3>Reasonable Pricing Plans</h3>
                        <div class="bottom-line"></div>
                    </div>
                    <div class="ss-price-para">
                        <p>Lorem ipsum dolor sit amet consectetur. Ultrices dictum interdum a commodo molestie
                            posuere eu lobortis. Nunc semper lectus velit nisl facilisis blandit. Purus proin in
                            commodo elementum. Nam pretium posuere tempus mattis at. Cursus sed gravida viverra enim
                            ipsum velit adipiscing molestie.</p>
                        <p>Nam pretium posuere tempus mattis at. Cursus sed gravida viverra enim ipsum velit
                            adipiscing molestie.</p>
                    </div>
                    <div class="ss-pricingsec-btn">
                        <a href="javascript:void(0);" class="ss-btn">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="ss-pricingbox-wrapper">
                    <h4>Basic</h4>
                    <div class="ss-price-img">
                        <img src="{{asset('')}}assets/images/plan-img1.png" alt="icon">
                    </div>
                    <h3 class="ss-price">$29 / Month</h3>
                    <ul class="ss-pricelist">
                        <li>
                            <img src="{{asset('')}}assets/images/right-icon.png" alt="icon" />
                            <p>Free Service</p>
                        </li>
                        <li>
                            <img src="{{asset('')}}assets/images/right-icon.png" alt="icon" />
                            <p>Open Circuit</p>
                        </li>
                        <li>
                            <img src="{{asset('')}}assets/images/wrong-icon.png" alt="icon" />
                            <p class="text-color">Power Watts-PMAX</p>
                        </li>
                        <li>
                            <img src="{{asset('')}}assets/images/wrong-icon.png" alt="icon" />
                            <p class="text-color">Output Tolerance-PMAX</p>
                        </li>
                        <li>
                            <img src="{{asset('')}}assets/images/wrong-icon.png" alt="icon" />
                            <p class="text-color">Maximum Power Voltage</p>
                        </li>
                    </ul>
                    <div class="ss-price-btn">
                        <a href="javascript:void(0);" class="ss-btn">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="ss-pricingbox-wrapper">
                    <h4>Standard</h4>
                    <div class="ss-price-img">
                        <img src="{{asset('')}}assets/images/plan-img2.png" alt="icon">
                    </div>
                    <h3 class="ss-price">$39 / Month</h3>
                    <ul class="ss-pricelist">
                        <li>
                            <img src="{{asset('')}}assets/images/right-icon.png" alt="icon" />
                            <p>Free Service</p>
                        </li>
                        <li>
                            <img src="{{asset('')}}assets/images/right-icon.png" alt="icon" />
                            <p>Open Circuit</p>
                        </li>
                        <li>
                            <img src="{{asset('')}}assets/images/right-icon.png" alt="icon" />
                            <p>Power Watts-PMAX</p>
                        </li>
                        <li>
                            <img src="{{asset('')}}assets/images/wrong-icon.png" alt="icon" />
                            <p class="text-color">Output Tolerance-PMAX</p>
                        </li>
                        <li>
                            <img src="{{asset('')}}assets/images/wrong-icon.png" alt="icon" />
                            <p class="text-color">Maximum Power Voltage</p>
                        </li>
                    </ul>
                    <div class="ss-price-btn">
                        <a href="javascript:void(0);" class="ss-btn">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="ss-pricingbox-wrapper">
                    <h4>Advanced</h4>
                    <div class="ss-price-img">
                        <img src="{{asset('')}}assets/images/plan-img3.png" alt="icon">
                    </div>
                    <h3 class="ss-price">$59 / Month</h3>
                    <ul class="ss-pricelist">
                        <li>
                            <img src="{{asset('')}}assets/images/right-icon.png" alt="icon" />
                            <p>Free Service</p>
                        </li>
                        <li>
                            <img src="{{asset('')}}assets/images/right-icon.png" alt="icon" />
                            <p>Open Circuit</p>
                        </li>
                        <li>
                            <img src="{{asset('')}}assets/images/right-icon.png" alt="icon" />
                            <p>Power Watts-PMAX</p>
                        </li>
                        <li>
                            <img src="{{asset('')}}assets/images/right-icon.png" alt="icon" />
                            <p>Output Tolerance-PMAX</p>
                        </li>
                        <li>
                            <img src="{{asset('')}}assets/images/right-icon.png" alt="icon" />
                            <p>Maximum Power Voltage</p>
                        </li>
                    </ul>
                    <div class="ss-price-btn">
                        <a href="javascript:void(0);" class="ss-btn">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------- Pricing plan Section end ----------->
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