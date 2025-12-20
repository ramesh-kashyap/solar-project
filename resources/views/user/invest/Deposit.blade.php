<script>
    $("#Purchase Package").addClass("menu-item-active");
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
<!-- Main Body -->
<style></style>
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
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Buy Package <span
                        style="text-transform:capitalize"></span></h5>
                <!--end::Page Title-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->

    <div class="d-flex flex-column-fluid section-top-50">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Dashboard-->
            <form  class="form mt-0" name="frmmain"  method="POST"
                action="{{ route('user.confirmDeposit') }}">
                {{ csrf_field() }}

                <div class="col-12">
                </div>

                <!-- investment-head::begin -->

                <div class="row">
                    <div class="col-xl-6 offset-xl-3">

                        <div class="invest-main-wrap transaction-card-wrap">
                            <div class="row">



                                <!-- ==================================== -->


             


                                <div class="col-lg-12">
                                    <div class="form-group mt-2 mb-3 text-left">
                                        <label for="optinvesttype"> Enter Amount </label>

                                      

                                            <select name="amount" id="" class="form-control" required> 
                                                <option value="10000">{{currency()}}10000 (Starter)</option>
                                                 <option value="25000"> {{currency()}}25000 (Growth)</option>
                                                  <option value="50000"> {{currency()}}50000 (Advanced )</option>
                                                   <option value="100000">{{currency()}} 100000 (Elite )</option>
                                            </select>
                                    </div>

                                </div>


                         

                                <div class="col-lg-12">
                                    <div class="form-group mt-2 mb-3 text-left">
                                        <label for="investfromwallet">Payment Mode</label>
                                        <input type="text" name="paymentMode" class="form-control"
                                            autocomplete="off" placeholder="paymentMode"
                                            value="INR">
                                    </div>
                                </div>


                            </div>



                            <div class="al-center">
                                <button type="submit" class="btn btn-primary report-btn submit-btn">Submit
                                   <span
                                                                                    class="thin-arrow">&rarr;</span></button>

                              
                            </div>
                        </div>
                        <div class="bronze-main-wrap mt-5 mb-4" style="display: none;">
                            <div class="box-wrap">
                                <h2 class="text-white">Your Investing</h2>
                                <div class="box">
                                    <h2 class="box-heading">Bronze</h2>
                                    <div class="box-image">
                                        <img src="{{ asset('') }}upnl/images/package1.png" alt="Box Image">
                                        <i class="bx bx-check check-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="silver-main-wrap mt-5" style="display: none;">
                            <div class="box-wrap mx-auto">
                                <h2 class="text-white">Your Investing</h2>
                                <div class="box">
                                    <h2 class="box-heading">Silver</h2>
                                    <div class="box-image">
                                        <img src="{{ asset('') }}upnl/images/package2.png" alt="Box Image">
                                        <i class="bx bx-check check-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="gold-main-wrap mt-5" style="display: none;">
                            <div class="box-wrap">
                                <h2 class="text-white">Your Investing</h2>
                                <div class="box">
                                    <h2 class="box-heading">Gold</h2>
                                    <div class="box-image">
                                        <img src="{{ asset('') }}upnl/images/package3.png" alt="Box Image">
                                        <i class="bx bx-check check-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="platinum-main-wrap mt-5" style="display: none;">
                            <div class="box-wrap">
                                <h2 class="text-white">Your Investing</h2>
                                <div class="box">
                                    <h2 class="box-heading">Platinum</h2>
                                    <div class="box-image">
                                        <img src="{{ asset('') }}upnl/images/package4.png" alt="Box Image">
                                        <i class="bx bx-check check-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>




            </form>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle" style="       margin: 0px auto;
    font-size: 2.6rem !important;
    font-family: none;
    text-shadow: none;
    font-weight: 800;">🎉 Congratulation 🎉</h5>
             
            </div>
            <div class="modal-body">
             <span id="withdral-popup"></span>
            </div>
            <div class="modal-footer">
            <br>
            </div>
          </div>
        </div>
      </div>

</div>

<!--end::Content-->
<script src="https://code.jquery.com//jquery-3.3.1.min.js"></script>

@if (session()->has('notify'))
    @foreach (session('notify') as $msg)
        @if ($msg[0] == 'success')
            <script>
                var depositId = {{ session('depositId') }};
                $.ajax({
                    type: "POST",
                    url: "{{ route('user.lastWithdrawal') }}",
                    data: {
                        "depositId": depositId,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        // alert(response);
                        if (response != 1) {
                            // alert("hh");
                            $('#withdral-popup').html(response);
                            $('.modal').addClass('show');
                            $('.modal').css('display','block');
                        } else {
                            // alert("hi");
                            $('#withdral-popup').html("No data found!").css('color', 'red').css(
                                'margin-buttom', '10px');
                        }
                    }
                });
            </script>
        @endif
    @endforeach
@endif


<script>
$('body').click(function(){

    $('.modal').removeClass('show');
     $('.modal').css('display','none');
});


    // function amtValue() {
    //     var amt = document.getElementById('PACKAGE_AMT').value;
    //     if (amt %  == 0) {
    //         return true;
    //     } else {
    //         alert('Please enter valid amount Multiple of ₹ 1000  ');
    //         return false;
    //     }
    // }



    $('.check_sponsor_exist').keyup(function(e) {
        var ths = $(this);
        var res_area = $(ths).attr('data-response');
        var sponsor = $(this).val();
        // alert(sponsor); 
        $.ajax({
            type: "POST",
            url: "{{ route('getUserName') }}",
            data: {
                "user_id": sponsor,
                "_token": "{{ csrf_token() }}",
            },
            success: function(response) {
                // alert(response);      
                if (response != 1) {
                    // alert("hh");
                    $(".submit-btn").prop("disabled", false);
                    $('#' + res_area).html(response).css('color', '#fff').css('font-weight', '800')
                        .css('margin-buttom', '10px');
                } else {
                    // alert("hi");
                    $(".submit-btn").prop("disabled", true);
                    $('#' + res_area).html("User Not exists!").css('color', 'red').css(
                        'margin-buttom', '10px');
                }
            }
        });
    });
</script>
