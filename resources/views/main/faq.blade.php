@include('layouts.mainsite.header')

    <!-- Page Header Start -->
	<div class="page-header">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<!-- Page Header Box Start -->
					<div class="page-header-box">
						<h1 class="wow fadeInUp" data-cursor="-opaque" style="visibility: visible; animation-name: fadeInUp;">Frequently asked <span>question</span></h1>
						<nav class="wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="./">home</a></li>
								<li class="breadcrumb-item active" aria-current="page">FAQs</li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

    <!-- Page Faqs Start -->
    <div class="page-faqs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- Page Single Sidebar Start -->
                    <div class="page-single-sidebar">
                        <!-- Page Category List Start -->
                        <div class="page-catagery-list wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <ul>
                                <li><a href="#faq_1"> BeaTrust</a></li>
                                <li><a href="#faq_2">BeaLaunch</a></li>
                                <li><a href="#faq_3">Technical Support</a></li>
                                <li><a href="#faq_4">BeaChain</a></li>
                            </ul>
                        </div>
                        <!-- Page Category List End -->

                        <!-- Sidebar CTA Box Start -->
                        <div class="sidebar-cta-box">
                            <!-- Sidebar CTA Logo Start -->
                            <div class="sidebar-cta-logo">
                                <img src="{{asset('')}}main/images/sidebar-cta-logo.svg" alt="">
                            </div>
                            <!-- Sidebar CTA Logo End -->
                            
                            <!-- Sidebar CTA Content Start -->
                            <div class="sidebar-cta-content">
                                <h3>Need Support? Beagers Has Your Back</h3>
                                <p>At Beagers, we’re committed to empowering your crypto fundraising journey. Whether you need help launching a campaign, managing investor queries, or navigating blockchain tech—our team is ready 24/7 with expert support and guidance..</p>
                            </div>
                            <!-- Sidebar CTA Content End -->

                          
                        </div>
                        <!-- Sidebar CTA Box End -->
                    </div>
                    <!-- Page Single Sidebar End -->
                </div>

                <div class="col-lg-8">
                    <!-- Page FAQs Catagery Start -->
                    <div class="page-faqs-catagery">
                        <!-- FAQs section start -->
                        <div class="page-single-faqs page-faq-accordion" id="faq_1">
                            <div class="section-title">
                                <h2 class="wow fadeInUp" data-cursor="-opaque" style="visibility: visible; animation-name: fadeInUp;">AI <span>solutions</span></h2>
                            </div>
                            <!-- FAQ Accordion Start -->
                            <div class="faq-accordion" id="accordion">
                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                    <h2 class="accordion-header" id="heading1">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                           1. What is Beagers and how does it work?
                                        </button>
                                    </h2>
                                    <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            <p>Beagers is a crypto-powered fundraising platform that helps startups and projects raise capital using blockchain technology. We connect creators with global crypto investors and provide tools for secure, transparent, and efficient fundraising.

    </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->

                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.4s" style="visibility: hidden; animation-delay: 0.4s; animation-name: none;">
                                    <h2 class="accordion-header" id="heading2">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                            2.How can I raise funds through Beagers?
                                        </button>
                                    </h2>
                                    <div id="collapse2" class="accordion-collapse collapse show" aria-labelledby="heading2" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            <p>Simply sign up, create your project profile, set your fundraising goal, and choose a supported cryptocurrency. Once approved, your campaign goes live for global investors to contribute.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->

                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.6s" style="visibility: hidden; animation-delay: 0.6s; animation-name: none;">
                                    <h2 class="accordion-header" id="heading3">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                            3.Is it safe to invest or fund through Beagers?

                                        </button>
                                    </h2>
                                    <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            <p>Yes, Beagers uses blockchain technology for full transparency and employs smart contracts to ensure that transactions are secure, traceable, and tamper-proof</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->

                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.8s" style="visibility: hidden; animation-delay: 0.8s; animation-name: none;">
                                    <h2 class="accordion-header" id="heading4">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                            4. Which cryptocurrencies are supported on Beagers?
                                        </button>
                                    </h2>
                                    <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            <p>We currently support popular cryptocurrencies like Bitcoin (BTC), Ethereum (ETH), USDT, and more. Our platform is regularly updated to support trending and stable digital assets.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->

                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" data-wow-delay="1s" style="visibility: hidden; animation-delay: 1s; animation-name: none;">
                                    <h2 class="accordion-header" id="heading5">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                            5. Can anyone launch a fundraising campaign on Beagers?
                                        </button>
                                    </h2>
                                    <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            <p>Yes, as long as your project meets our compliance standards. We review every submission for legitimacy, clarity, and potential before approving it for live listing.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->
                            </div>
                            <!-- FAQ Accordion End -->
                        </div>
                        <!-- FAQs section End -->

                        <!-- FAQs section start -->
                      
                            <!-- FAQ Accordion Start -->
                         
                            <!-- FAQ Accordion End -->
                        </div>
                        <!-- FAQs section End -->

                        <!-- FAQs section start -->
                     
                            <!-- FAQ Accordion End -->
                        </div>
                        <!-- FAQs section End -->

                        <!-- FAQs section start -->
                    
                            <!-- FAQ Accordion Start -->
                          
                            <!-- FAQ Accordion End -->
                        </div>
                        <!-- FAQs section End -->
                    </div> 
                    <!-- Page FAQs Catagery End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Faqs End -->
@include('layouts.mainsite.footer')
