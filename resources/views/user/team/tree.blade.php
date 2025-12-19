<script>
  $("#Withdrawal Report").addClass("menu-item-active");
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

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
</head>
<script>
  if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
  }

 
</script>
<link rel="stylesheet" href="{{asset('')}}upnl/css/tree.css">
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
                  <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">${{round($userRounds->amount)}} Autopool Tree</h5>
                  <!--end::Page Title-->
              </div>
              <div>
                  <!-- <div class="dropdown dropdown-profile dr-option">
      <button class="" aria-expanded="true" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true">
          <svg class="nav-d" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect x="0" y="0" width="24" height="24"></rect>
                  <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                  <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                  <circle fill="#000000" cx="19" cy="12" r="2"></circle>
              </g>
          </svg>
          <i class="nav-m bi bi-justify-left"></i>
      </button>
      <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="/rngapp/referral/report/RNG49911549">Affiliate Report</a>
          <a class="dropdown-item" href="/rngapp/deposit-fund-report/RNG49911549">Deposit Fund</a>
          <a class="dropdown-item" href="/rngapp/withdrawal/report/RNG49911549">Withdrawal</a>
          <a class="dropdown-item" href="/rngapp/withdrawal/status/RNG49911549">Withdrawal Status</a>
      </div>
  </div> -->
              </div>
          </div>
          <!--end::Info-->
      </div>
  </div><br><br>
  <div class="container-fluid">
  </div>

  <!--end::Subheader-->
  <!--begin::Entry-->

<style>
  .card {
    border: none;
    box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.03);
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
}

.card {
    position: relative;
    display: -ms-flexbox;
    display: flex
;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, .125);
    border-radius: .25rem;
}
.text-center {
    text-align: center !important;
}

.justify-content-center {
    -ms-flex-pack: center!important;
    justify-content: center !important;
}
.row {
    display: -ms-flexbox;
    display: flex
;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
.container{
    border: 1px solid #000;
    padding: 15px;
}

.user{
    height: 100px;
    width: 100px;
    margin-left: auto;
    margin-right: auto;
    line-height: 120px;
    position: relative;
    border-radius: 50%;
    background-color: transparent;
    border: none;
    -webkit-appearance: initial!important;
}
.user img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    position: relative;
    z-index: 99;
}
.line {
    width: 50%;
    margin-left: auto;
    margin-right: auto;
    height: 80px;
    display: inherit;
    border: 2px dotted #bbb;
    border-bottom: none;
    position: relative;
}
.line::before, .line::after {
    position: absolute;
    /*content: "\f107";*/
    font-family: "Line Awesome Free";
    font-weight: 600;
    font-size: 24px;
    color: #bbb;
    bottom: 0;
    width: 30px;
    text-align: center;
    background: #fff;
    z-index: 1;
    line-height: 20px;
    height: 20px;
}
.line::before {
    left: -15px;
}
.line::after {
    right: -15px;
}

.w-8 .line::before, .w-8 .line::after {
    display: none;
}
.llll:last-child  .line {
    border: none;
}

.w-1 {
    width: 100%;
}
.w-2 {
    width: 50%;
}
.w-4 {
    width: 25%;
}
.w-8 {
    width: 12.5%;
}
.user .user-name {
    line-height: 1.5;
    font-size: 16px;
    font-weight: 500;
    color: #fff;
}

@media (max-width: 767px) {
    .user {
        line-height: 0;
        position: relative;
        z-index: 2;
    }

    .w-4 .line::before, .w-4 .line::after {
        display: none;
    }

    .user img {
        border-width: 3px;
    }
    .line {
        transform: translateY(-10px);
    }
    .w-1 .user {
        width: 80px;
        height: 80px;
    }
    .w-1 .user img {
        width: 80px;
        height: 80px;
    }
    .user::before {
        display: none;
    }
    .w-1 .line {
        height: 50px;
    }
    .w-2 .user {
        width: 70px;
        height: 70px;
    }
    .w-2 .user img {
        width: 70px;
        height: 70px;
    }
    .w-2 .line {
        height: 50px;
    }
    .w-4 .user {
        width: 60px;
        height: 60px;
    }
    .w-4 .user img {
        width: 60px;
        height: 60px;
    }
    .w-4 .line {
        height: 40px;
        margin-top: 17px;
        width: 60%;
        transform: translate(-8px,-20px);
        z-index: 0;
    }
    .w-8 {
        transform: translateY(-30px);
    }
    .w-8 .user {
        width: 50px;
        height: 50px;
    }
    .w-8 .user img {
        width: 50px;
        height: 50px;
    }
    .w-8 .line {
        height: 0;
    }
   @media (max-width: 767px) {
    .user .user-name {
        display: block;
        font-size: 11px;
    }
}
}

@media (max-width: 575px) {
    .user {
        line-height: 0;
        position: relative;
        z-index: 2;
    }
    .line {
        transform: translateY(-10px);
    }
    .w-1 .user {
        width: 70px;
        height: 70px;
    }
    .w-1 .user img {
        width: 70px;
        height: 70px;
    }
    .w-1 .line {
        height: 50px;
    }
    .w-2 .user {
        width: 60px;
        height: 60px;
    }
    .w-2 .user img {
        width: 60px;
        height: 60px;
    }
    .w-2 .line {
        height: 50px;
    }
    .w-4 .user {
        width: 55px;
        height: 55px;
    }
    .w-4 .user img {
        width: 55px;
        height: 55px;
    }
    .w-4 .line {
        height: 40px;
        margin-top: 18px;
        width: 70%;
        transform: translate(-1px,-20px);
        z-index: 0;
    }
    .w-8 {
        transform: translateY(-30px);
    }
    .w-8 .user {
        width: 45px;
        height: 45px;
    }
    .w-8 .user img {
        width: 45px;
        height: 45px;
    }
    .w-8 .line {
        height: 0;
    }
    .user img {
        border-width: 2px;
    }
}
@media (max-width: 400px) {
    .user {
        line-height: 0;
        position: relative;
        z-index: 2;
    }
    .line {
        transform: translateY(-10px);
    }
    .w-1 .user {
        width: 70px;
        height: 70px;
    }
    .w-1 .user img {
        width: 70px;
        height: 70px;
    }
    .w-1 .line {
        height: 50px;
    }
    .w-2 .user {
        width: 60px;
        height: 60px;
    }
    .w-2 .user img {
        width: 60px;
        height: 60px;
    }
    .w-2 .line {
        height: 50px;
    }
    .w-4 .user {
        width: 50px;
        height: 50px;
    }
    .w-4 .user img {
        width: 50px;
        height: 50px;
    }
    .w-4 .line {
        height: 50px;
        margin-top: 17px;
        width: 49%;
        transform: translate(-2px,-19px);
        z-index: 0;
    }
    .w-8 {
        transform: translateY(-30px);
    }
    .w-8 .user {
        width: 35px;
        height: 35px;
    }
    .w-8 .user img {
        width: 35px;
        height: 35px;
    }
    .w-8 .line {
        height: 0;
    }
    .card {
        padding: 30px;
        margin: 0 -30px;
    }

}

.user::before {
      position: absolute;
    content: '';
    top: 5px;
    left: -5px;
    width: 110px;
    height: 110px;
    border-radius: 50%;
    background-color: #ffffff;
    z-index: 2;
}
.paid-user {
    border: 5px solid #2ecc71;
}
.free-user {
    border: 5px solid #101536;
}
.no-user {
    border: 5px solid #ddd;
}
.user-details-modal-area .modal-body {
    padding: 0;
}
.user-details-header {
    /*background-color: rgba(6, 243, 183, 0.22);*/
    display: flex;
    align-items: center;
    padding: 25px 30px;
}

.Paid {
    background-color: rgba(6, 243, 183, 0.22);
}

.Free {
    background-color: rgba(241, 196, 15, 0.22);
}




.user-details-header .thumb {
    width: 80px;
    height: 80px;
    overflow: hidden;
    border-radius: 50%;
}
.user-details-header .content {
    width: calc(100% - 80px);
    padding-left: 30px;
}
.user-details-header .content .user-name {
    display: block;
    font-size: 22px;
    font-weight: 500;
    text-transform: capitalize;
}
.user-details-header .content .user-status {
    font-weight: 500;
}
.user-details-body {
    padding: 20px 30px;
}
.user-details-body h4 {
    margin-bottom: 20px;
}
.user-details-body p {
    margin-bottom: 0;
    color: #777777;
}
.user-details-body p+p {
    margin-top: 10px;
}
img {
    max-width: 100%;
}
</style>






<input type="hidden" name="base_url" value="{{asset('')}}">
  <!--begin: Wizard-->
  <div class="wizard wizard-4 mbl-top-135" id="kt_wizard_v4" data-wizard-state="step-first"
      data-wizard-clickable="true">
      <div class="container-fluid">
          
   
          
              
        
        <div class="card" style="background:#111218;">
 <br>
   <div class="row text-center justify-content-center llll">
            <div class="w-1">
                @php echo showSingleUserinTree($tree['a']); @endphp
            </div>
        </div>
        <div class="row text-center justify-content-center llll">
            <div class="w-2">
                @php echo showSingleUserinTree($tree['b']); @endphp
            </div>
            <div class="w-2 ">
                @php echo showSingleUserinTree($tree['c']); @endphp
            </div>
        </div>
        <div class="row text-center justify-content-center llll">
            <div class="w-4 ">
                @php echo showSingleUserinTree($tree['d']); @endphp
            </div>
            <div class="w-4 ">
                @php echo showSingleUserinTree($tree['e']); @endphp
            </div>
            <div class="w-4 ">
                @php echo showSingleUserinTree($tree['f']); @endphp
            </div>
            <div class="w-4 ">
                @php echo showSingleUserinTree($tree['g']); @endphp
            </div>

        </div>
        <div class="row text-center justify-content-center llll">
            <div class="w-8">
                @php echo showSingleUserinTree($tree['h']); @endphp
            </div>
            <div class="w-8">
                @php echo showSingleUserinTree($tree['i']); @endphp
            </div>
            <div class="w-8">
                @php echo showSingleUserinTree($tree['j']); @endphp
            </div>
            <div class="w-8">
                @php echo showSingleUserinTree($tree['k']); @endphp
            </div>
            <div class="w-8">
                @php echo showSingleUserinTree($tree['l']); @endphp
            </div>
            <div class="w-8">
                @php echo showSingleUserinTree($tree['m']); @endphp
            </div>
            <div class="w-8">
                @php echo showSingleUserinTree($tree['n']); @endphp
            </div>
            <div class="w-8">
                @php echo showSingleUserinTree($tree['o']); @endphp
            </div>
        </div>
    </div>
    
      </div>
  </div>
</div>

<script>
document.getElementById('treeLevel').addEventListener('change', function() {
    const selectedRound = this.value;
    window.location.href = `/tree/${selectedRound}`;
});
</script>
<div id="userDataRes">
  <!-- Modal -->
  <div class="modal fade" id="userDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="userName"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="userData"><span class="load-gif"><img style="width: 100%;" src="{{asset('assets/images/load.gif')}}"> System calculating reports</span></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="{{asset('upnl/js/om_all_function.js')}}"></script>