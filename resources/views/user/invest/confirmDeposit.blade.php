<div class="d-flex flex-column-fluid section-top-50">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Dashboard-->
            <!--begin::Row-->

            <div class="row mbt-25">

                <div class="col-md-12">
                    <!-- left section  -->

                    <!--begin::fund transfer-->
                    <style>
                        ul.mod-tab li {
                            width: 100%;
                        }
                    </style>

                    <div class="d-flex justify-content-center add-fund-main-tab">
                        <div class="col-lg-9">
                            <div class="card-fund pay-options rounded-18">
                                <ul class="nav nav-pills mod-tab" role="tablist">
                                    <li class="active nav-item">
                                        <a href="#pills-home" aria-controls="pills-home-tab" role="tab" data-toggle="pill" class="py-crypto nav-link active" aria-selected="true" id="tab-home-first">
                                            <div class="py-c-left">
                                                <div>
                                                    <h4> Deposit</h4>
                                                    <!--<small>Deposit USDT</small>-->
                                                </div>
                                            </div>
                                            <div class="py-c-right">
                                                <div class="cur-coin">
                                                    <i class="fa fa-usd" style="font-size:36px" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <!-- tabs panes -->
                                <div class="tab-content">

                                    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <div class="pay-op-tab">


                                            <!-- Tab panes -->
                                            <div class="tab-content" id="pills-tabContent1">

                                                <div class="tab-pane fade pay-single-tab show active" id="payer" role="tabpanel" aria-labelledby="pills-payer-tab">
                                                    <ul>
                                                        <!--<li>-->
                                                        <!--    <div class="cr-info-left">-->
                                                        <!--        <div>-->
                                                        <!--             <i class="fa fa-usd" style="    font-size: 36px;padding: 14px;padding-left: 16px; padding-bottom: 26px;"></i>-->
                                                        <!--        </div>-->
                                                        <!--    </div>-->
                                                        <!--    <div class="cr-info-right">-->
                                                        <!--        <h4>Send only  USDT (BEP20) to this deposit Details</h4>-->
                                                        <!--        <small>Sending other the  USDT (BEP20) may result in the-->
                                                        <!--            loss of your deposit</small>-->
                                                        <!--    </div>-->
                                                        <!--</li>-->
                                                    </ul>
                    </br></br>
                                                    <div class="clearfix"></div>
                                                    <div class="row pay-adrs-wrap">
                                                        <div class="col-lg-7 order-xs-7">



          <div class="rcnt-wrap mt-4">
        <h4 class="rcnt-trans text-black">Bank  Details</h4>

        <div class="table-responsive pay-report">
    <table class="table table-bordered bank-table">
     
        <tbody>
            <tr>
                <td>Bank Name</td>
                <td>State Bank of India</td>
            </tr>

            <tr>
                <td>Branch Name</td>
                <td>Main Branch, Delhi</td>
            </tr>

            <tr>
                <td>Account Number</td>
                <td>123456789012</td>
            </tr>

            <tr>
                <td>IFSC Code</td>
                <td>SBIN0001234</td>
            </tr>
        </tbody>
    </table>
</div>


    </div>
                                                        </div>



                                                        <div class="col-lg-5 order-xs-5">
                                                            <div class="pay-adrs pm-pay-adrs">
                                                                            <div class="pay-adrs__code">
                                                                                <form action="{{route('user.fundActivation')}}"    method="POST" enctype="multipart/form-data">
                                                                                     {{ csrf_field() }}
    <input type="hidden" name="amount" value="{{$amount}}">  
      <input type="hidden" name="paymentMode" value="{{$paymentMode}}"> 
    
    <div class="row">
        
        <div class="col-12 form-group">
            <label>Amount</label>
            <input type="number" value="{{$amount}}" min="1" class="form-control" name="amount" required="" placeholder="Enter amount" readonly="">
        </div>

        
        <div class="col-12 form-group">
            <label>Payment Type</label>
                
                <input type="text" value="INR" class="form-control"  value="{{$paymentMode}}" name="paymentMode" required="" placeholder="Payment Type" readonly="">

        </div>

        
        <div class="col-12 form-group">
            <label>Transaction Password</label>
            <input type="text" class="form-control" name="utrno" placeholder="Enter Transaction Password" required="">
        </div>

        
        <div class="col-12 form-group">
            <label>Upload Screenshot</label>
            <input type="file" class="form-control" name="icon_image" required="">
        </div>

        <div class="form-group col-12">
            <button type="submit" class="w-100 report-btn submit-btn">Deposit<span class="thin-arrow">→</span></button>
        </div>
    </div>
</form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                             
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>