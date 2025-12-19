   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Settings</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Add </a></li>
                    </ol>
                </div>
                <!-- row -->
                <div class="row">
     
     
                    <div class="col-xl-8 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Manage Bots</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('admin.change-return') }}" method="POST"  enctype="multipart/form-data">
                                     @csrf
                                        <div class="row"> 
                                       
                                           

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">UPI ID 1</label>                                            
                                               <input type="text" placeholder="" name="upiId1" value="{{$general->upiId1}}" class="form-control" required id="kb_ret">
                                            </div>
                                        <div class="mb-3 col-md-6">
                                                <label class="form-label">QR CODE 1</label>                                            
                                               <input type="file" placeholder="" name="qrcode1" value="{{$general->qrcode1}}" class="form-control"  id="kb_ret">
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">UPI ID 2</label>                                             
                                                <input type="text" placeholder="" value="{{$general->upiId2}}" name="upiId2" class="form-control" required id="mb_ret">
                                            </div>
                                             <div class="mb-3 col-md-6">
                                                <label class="form-label">QR CODE 2</label>                                            
                                               <input type="file" placeholder="" name="qrcode2" value="{{$general->qrcode2}}" class="form-control"  id="kb_ret">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">USDT ADDRESS</label>                                             
                                                <input type="text" placeholder="" value="{{$general->usdt_address}}" name="usdt_address" class="form-control" required id="mb_ret">
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">News Updates</label>                                             
                                                <textarea  class="form-control"  name="message"> {{$general->message }} </textarea>
                                            </div>

                                         
                                           
                                        </div>
     
                                      
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                
     
                </div>
            </div>
        </div>
        <!--**********************************
                 Content body end
             ***********************************-->
     