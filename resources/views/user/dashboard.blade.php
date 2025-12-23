         <script>
             $("#Dashboard").addClass("menu-item-active");
         </script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <script>
             // Initialize ClipboardJS
             var clipboard = new ClipboardJS('.copy-btn');

             // Show success message on successful copy
             clipboard.on('success', function(e) {
                 console.log('Copied:', e.text);
                 alert('Copied: ' + e.text);
                 e.clearSelection();
             });

             // Show error message on copy failure
             clipboard.on('error', function(e) {
                 console.error('Copy failed:', e.action);
                 alert('Copy failed. Please try again.');
             });
         </script>
         <script>
             // Get the copy button and icon elements
             const copyBtn = document.querySelector('.copy-btn');
             const icon = copyBtn.querySelector('i');

             // Add a click event listener to the copy button
             copyBtn.addEventListener('click', function() {
                 // Update the HTML of the icon element to change the icon
                 icon.classList.remove('bx-copy');
                 icon.classList.add('bx-check'); // Change the class to the desired new icon
             });
         </script>


         <style>
             .user-image {
                 width: 80px;
                 height: 52px;
                 border-radius: 50%;
                 overflow: hidden;
                 position: relative;
             }
         </style>

         <!--begin::Content-->
         <div class="no-tp-gap content d-flex flex-column flex-column-fluid " id="kt_content">
             <div class="mobile-nav" id="kt_header_mobile">
                 <div>
                     <button class="" id="kt_aside_mobile_toggle">
                         <i class="bi bi-text-left icon-lg"></i>
                     </button>
                     <span>Menu</span>
                 </div>
                 <div>
                     <span id="server-time-mobile"></span>
                 </div>
             </div>
             <!--begin::Subheader-->
             <!--end::Subheader-->
             <!--begin::Entry-->

             <div class="d-flex flex-column-fluid section-top-50 section-bottom-15 mobile-section-ptop" style="background:black;">
                 <!--begin::Container-->
                 <div class="container-fluid">


                     <style>
                         .html-marquee {
                             overflow: hidden;
                             position: relative;
                             /*background: #cef6f5;*/
                             color: #fff;
                             font-weight: bold;
                             font-size: 16px;
                             /*border: 1px solid #ccc;*/
                         }
                     </style>
                     <!-- <marquee class="html-marquee" direction="left" behavior="scroll" scrollamount="12" onmouseover="this.stop();" onmouseout="this.start();">
                    <p>{{$general->message}}    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </p></marquee> -->


                     <!-- Head Notification -->



                     <style>
                         .rank {
                             text-shadow: 0 14.36px 8.896px #2c482e, 0 -1px 1px;
                             font-size: 28px;
                             color: aliceblue;
                             background: linear-gradient(to right, #ff9400 0%, #ffe900 100%);
                             -webkit-background-clip: text;
                             -webkit-text-fill-color: transparent;
                         }

                         body {
                             margin: 0;
                             background: #1f7a1f;
                         }

                         .roulette {
                             /* display: flex; */
                             flex-direction: column;
                             align-items: center;
                             justify-content: center;
                             /* height: 100vh; */

                             .wheel img {
                                 transition: transform 10s cubic-bezier(0.3, 1, 0.7, 1),
                                     10s filter cubic-bezier(0.1, 1, 0.8, 1),
                                     10s -webkit-filter cubic-bezier(0.1, 1, 0.8, 1);
                                 will-change: transform;
                                 border-radius: 50%;
                                 box-shadow: 0 0 100px rgba(0, 0, 0, 0.5);
                                 width: 100%;
                                 max-width: 600px;
                                 /* border:4px dashed rgba(255,255,255, .5); */
                             }

                             .arrow {
                                 width: 0;
                                 height: 0;
                                 border: 80px solid transparent;
                                 border-top: 110px solid tomato;
                                 position: fixed;
                                 left: 50%;
                                 transform: translate(-50%, -100px);
                                 z-index: 20;
                                 border-radius: 0.35em;
                             }

                             .arrow:after {}
                         }

                         .spin {
                             cursor: crosshair;
                         }
                     </style>

                     <div class="row d-flex align-items-stretch">


                         <div class="col-lg-12">
                             <div class="dark-block w-100">
                                 <div class="heading-with-link mb-1">
                                     <h3 class="dash-headings float-left mt-0 text-dark">Dashboard</h3>
                                     <!-- <a href="" class="float-right arrow-right-wrap" title="View Profile">View Wallet Report <i class="fa-solid fa-arrow-right"></i></a> -->
                                     <div class="clearfix"></div>
                                 </div>
                                 <div class="row mb-0 d-flex align-items-stretc">
                                     <div class="col-lg-6 mt-4 mb-4 d-flex align-items-stretc">
                                         <div class="info-box w-100">
                                             <div class="icon">
                                                 <img src="{{ asset('') }}upnl/images/f-wallet.svg"
                                                     alt="">
                                             </div>
                                             <div class="text-content">
                                                 <h5>Account Balance</h5>
                                                 <h3>{{ currency() }}
                                                     {{ number_format(Auth::user()->available_balance(), 2) }}
                                                 </h3>

                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-lg-6 mt-4 mb-4 d-flex align-items-stretc">
                                         <div class="info-box w-100">
                                             <div class="icon">
                                                 <img src="{{ asset('') }}upnl/images/i-wallet.svg"
                                                     alt="">
                                             </div>
                                             <div class="text-content">
                                                 <h5>Activation Wallet</h5>
                                                 <h3>
                                                     {{ currency() }}
                                                     {{ number_format(Auth::user()->withdraw(), 2) }}
                                                 </h3>

                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row mt-4 mb-0">
                                     <div class="col-lg-4 mt-3 mb-3">
                                         <div class="dark-card-one">
                                             <div class="dc-left">
                                                 <span>Total Invested</span>
                                                 <p>{{ currency() }}
                                                     {{ number_format(Auth::user()->investment->sum('amount'), 2) }}
                                                 </p>

                                             </div>
                                             <div class="dc-right">
                                                 <i class="bi bi-wallet2" style="color: white;"></i>

                                             </div>
                                         </div>
                                     </div>





                                     <div class="col-lg-4 mt-3 mb-3">
                                         <div class="dark-card-one">
                                             <div class="dc-left">
                                                 <span>Direct Income</span>
                                                 <p>{{ currency() }}
                                                     {{ number_format(Auth::user()->sponsor_bonus->sum('comm'), 2) }}
                                                 </p>
                                             </div>
                                             <div class="dc-right">
                                                 <i class="bi bi-cash-coin" style="color: white;"></i>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-lg-4 mt-3 mb-3">
                                         <div class="dark-card-one">
                                             <div class="dc-left">
                                                 <span>Level Income</span>
                                                 <p>
                                                 <p>{{ currency() }}
                                                     {{ number_format(Auth::user()->level_bonus->sum('comm'), 2) }}
                                                 </p>
                                                 </p>
                                             </div>
                                             <div class="dc-right">
                                                 <i class="bi bi-cash-coin" style="color: white;"></i>
                                             </div>


                                         </div>

                                     </div>

                                     <div class="col-lg-4 mt-3 mb-3">
                                         <div class="dark-card-one">
                                             <div class="dc-left">
                                                 <span>Reward Income</span>
                                                 <p>{{ currency() }}
                                                     {{ number_format(Auth::user()->binary_bonus->sum('comm'), 2) }}
                                                 </p>
                                             </div>
                                             <div class="dc-right">
                                                 <i class="bi bi-cash-coin" style="color: white;"></i>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-lg-4 mt-3 mb-3">
                                         <div class="dark-card-one">
                                             <div class="dc-left">
                                                 <span>Franchise Model </span>
                                                 <p>
                                                 <p>{{ currency() }}
                                                     {{ number_format(Auth::user()->franchise_bonus->sum('comm'), 2) }}
                                                 </p>
                                                 </p>
                                             </div>
                                             <div class="dc-right">
                                                 <i class="bi bi-cash-coin" style="color: white;"></i>
                                             </div>


                                         </div>

                                     </div>

                                     <!-- <div class="col-lg-4 mt-3 mb-3">
                                        <div class="dark-card-one">
                                            <div class="dc-left">
                                                <span>Monthly Royalty</span>
                                                <p>
                                                <p>{{ currency() }}
                                                    {{ number_format(Auth::user()->reward_bonus->sum('comm'), 2) }}
                                                </p>
                                                </p>
                                            </div>
                                            <div class="dc-right">
                                                <i class="bi bi-box-fill" style="color: white;"></i>
                                            </div>


                                        </div>

                                    </div> -->
                                     <!-- 
                                    <div class="col-lg-4 mt-3 mb-3">
                                        <div class="dark-card-one">
                                            <div class="dc-left">
                                                <span>Left Active Team</span>
                                                <p>
                                                    {{$left_team }}</p>
                                            </div>
                                            <div class="dc-right">
                                                <i class="bi bi-diagram-3-fill" style="color: white;"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mt-3 mb-3">
                                        <div class="dark-card-one">
                                            <div class="dc-left">
                                                <span>Right Active Team</span>
                                                <p>
                                                    {{$right_team }}</p>
                                            </div>
                                            <div class="dc-right">
                                                <i class="bi bi-diagram-3-fill" style="color: white;"></i>
                                            </div>
                                        </div>
                                    </div> -->

                                     <div class="col-lg-4 mt-3 mb-3">
                                         <div class="dark-card-one">
                                             <div class="dc-left">
                                                 <span>Total Income</span>
                                                 <p>
                                                 <p>{{ currency() }}
                                                     {{ number_format(Auth::user()->users_incomes->sum('comm'), 2) }}
                                                 </p>
                                                 </p>
                                             </div>
                                             <div class="dc-right">
                                                 <i class="bi bi-bank" style="color: white;"></i>
                                             </div>


                                         </div>

                                     </div>

                                     <div class="col-lg-4 mt-3 mb-3">
                                         <div class="dark-card-one">
                                             <div class="dc-left">
                                                 <span>Total Withdrawal</span>
                                                 <p>
                                                 <p> {{ currency() }}{{ number_format(Auth::user()->withdraw(), 2) }}</p>
                                                 </p>
                                             </div>
                                             <div class="dc-right">
                                                 <i class="bi bi-safe-fill" style="color: white;"></i>
                                             </div>


                                         </div>

                                     </div>
                                     
                                    

   <div class="col-lg-4 mt-3 mb-3">
                                         <div class="" style="    border: 1px solid #3e3e3e;
                                                                border-radius: 7px;
                                                                padding-top: 15px;
                                                                padding-bottom: 65px;
                                                                background: #0f0f0f;
                                                              
                                                                height: 100px;">
                                             <div class="">
                                                 <!-- <span>Referral Link</span> -->
                                                 <p>
                                                 <div class="input-group" style="padding: 12px;">

                                                     <input class="form-control ref-bg" type="text" style=" font-size: 11px;
                                                                                        "
                                                         name=" link" readonly="" id="clipboardleft"
                                                         value="{{ asset('') }}register?ref={{ Auth::user()->username }}">
                                                     <span class="input-group-addon p-0"><button
                                                             class="btn-copy copyclipbtn"
                                                             onclick="copyclipboardleft('clipboardleft')"
                                                             style="border-radius: 0;"><i
                                                                 class="fas fa-copy"></i></button></span>
                                                 </div>

                                                 </p>
                                             </div>


                                         </div>

                                     </div>


                                 </div>

                             </div>
                         </div>
                         <!---row--->
                         <!--end::Container-->
                     </div>
                     <!--end::Entry-->

                     <!-- Modal -->
                     <div id="show_popup">
                     </div>