<script>
    $("#Funds").addClass("menu-item-active");
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

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

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<script language=javascript>
    function submitform(obj) {
        if (isNaN($(obj).closest('form').find('#usdfundamount').val()) || $(obj).closest('form').find('#usdfundamount')
            .val() == '' || parseFloat($(obj).closest('form').find('#usdfundamount').val()) < 10) {
            alert('Please Enter Valid Fund Amount in USD. Minimum Amount is 10 USD.');
            return false;
        }

        $(obj).attr('disabled', 'disabled');
        $(obj).find('[spinner=true]').show();
        $(obj).closest('form').submit();
    }
</script>
<style>
    .pay-bx {
        display: flex;
        justify-content: center;
        margin-bottom: 8px;
    }

    .pay-bx-cen {
        width: 250px;
        display: flex;
        align-items: center;
    }

    .add-fund__icon {
        margin-bottom: 0 !important;
        width: 60px !important;
        margin-right: 15px !important;
    }

    .add-fund__text {
        text-align: left;
        width: calc(100% - 75px);
    }

    .add-fund .add-fund__text p {
        margin-bottom: 0 !important;
    }

    .add-fund {
        padding: 15px !important;
    }

    .add-fund__icon img {
        width: 50px !important;
    }

    .add-fund .add-fund__text h4 {
        margin-bottom: 0 !important;
    }

    .add-fund__form p {
        margin-bottom: 5px !important;
    }
    .copy-btn {
    background-color: #ff6200;
    color: #ffffff;
    padding: 7px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 3px;
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
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap w-full justify-between">
                <div>
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Fund Deposit</h5>
                    <!--end::Page Title-->
                </div>
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
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
                                        <a href="#pills-home" aria-controls="pills-home-tab" role="tab"
                                            data-toggle="pill" class="py-crypto nav-link active" aria-selected="true"
                                            id="tab-home-first">
                                            <div class="py-c-left">
                                                <div>
                                                    <h4>Fund Deposit</h4>
                                                    <small>Deposit USDT</small>
                                                </div>
                                            </div>
                                            <div class="py-c-right">
                                                <div class="cur-coin">
                                                    <i class="fa fa-usd" style="font-size:36px"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <!-- tabs panes -->
                                <div class="tab-content">

                                    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">
                                        <div class="pay-op-tab">


                                            <!-- Tab panes -->
                                            <div class="tab-content" id="pills-tabContent1">

                                                <div class="tab-pane fade pay-single-tab show active" id="payer"
                                                    role="tabpanel" aria-labelledby="pills-payer-tab">
                                                    <ul>
                                                        <li>
                                                            <div class="cr-info-left">
                                                                <div>
                                                                     <i class="fa fa-usd" style="    font-size: 36px;padding: 14px;padding-left: 16px; padding-bottom: 26px;"></i>
                                                                </div>
                                                            </div>
                                                            <div class="cr-info-right">
                                                                <h4>Send only  USDT (BEP20) to this deposit Details</h4>
                                                                <small>Sending other the  USDT (BEP20)  may result in the
                                                                    loss of your deposit</small>
                                                            </div>
                                                        </li>
                                                      
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                    <div class="row pay-adrs-wrap">
                                                        <div class="col-lg-7 order-xs-7">
                                                            <div class="rcnt-wrap">
                                                              
                                                                <div class="table-responsive pay-report">
                                                                    <table class="table table-bordered">
                                      <thead style="text-align: center;">
    <tr>
        <th style="text-align: center;">
          <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode($data['address_in']) }}" alt="QR Code" style="max-width: 240px;">  
           <!-- <strong>Minimum deposit:</strong> 50 USDT     -->
        </th>
    </tr>

    <tr>
        <th style="text-align: center;">
            <span id="foo2">{{ $data['address_in'] ?? '' }}</span>
            <button class="copy-btn" data-clipboard-target="#foo2"
                    style="border-radius: 0; margin-left: 10px;">
                <i class="bx bx-copy mr-0 1"></i>
            </button>
        </th>
    </tr>
</thead>

                                                                    </table>
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
                        </div>
                    </div>
                </div>
            </div>

            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>

    <!--end::Entry-->
</div>
<!--end::Content-->
