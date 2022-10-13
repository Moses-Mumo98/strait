<?php include 'header.php';?>
<!-- Main Content -->
<div class="main-content">
<section class="section">
   <ul class="breadcrumb breadcrumb-style ">
      <li class="breadcrumb-item">
         <h4 class="page-title m-b-0">Invoice</h4>
      </li>
      <li class="breadcrumb-item">
         <a href="home">
         <i data-feather="home"></i></a>
      </li>
      <li class="breadcrumb-item">Events</li>
      <li class="breadcrumb-item">Invoice</li>
   </ul>
   <div class="section-body">
      <div id = "invoice" class="invoice">
         <div class="invoice-print">
            <div class="row">
               <div class="col-lg-12">
                  <div class="invoice-title">
                     <h2>PASA - STRAIT Invoice</h2>
                     <div class="invoice-number">Invoice #<span id = "invoice-number">12345</span></div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-md-6">
                        <address>
                           <strong>Billed To:</strong><br>
                           <span id = "eventname">Sarah Smith</span><br>
                           <span id = "taskname">6404 Cut Glass Ct,</span><br>
                           <span id = "myname">Wendell,</span><br>
                           <span id = "myemail">NC, 27591, USA</span>
                        </address>
                     </div>
                     <div class="col-md-6 text-md-right">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                     </div>
                     <div class="col-md-6 text-md-right">
                        <address>
                           <strong>Event Date:</strong><br>
                           <span id = "eventdate">June 26, 2018</span><br><br>
                        </address>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row mt-4">
               <div class="col-md-12">
                  <div class="section-title">Invoice Summary</div>
                  <p class="section-lead">All items here cannot be deleted.</p>
                  <div class="table-responsive">
                     <table class="table table-striped table-hover table-md">
                        <tr>
                           <th data-width="40">#</th>
                           <th>Item</th>
                           <th class="text-center">Price</th>
                           <th class="text-center">Time Worked</th>
                           <th class="text-right">Totals</th>
                        </tr>
                        <tr>
                           <td>1</td>
                           <td><span id = "sub_name">Mouse Wireless </span></td>
                           <td class="text-center"><span id = "fee">$10.99</span></td>
                           <td class="text-center"><span id = "minutes">1<span></td>
                           <td class="text-right"><span id = "total">$10.99</span></td>
                        </tr>
                        <tr>
                     </table>
                  </div>
                  <div class="row mt-4">
                     <div class="col-lg-8">
                        <div class="section-title">Payment Method</div>
                        <p class="section-lead">The payment method that we provide is to make it easier for you to pay
                           invoices.
                        </p>
                        <div class="images">
                           <img src="assets/img/cards/visa.png" alt="visa">
                           <img src="assets/img/cards/mpesa.png" alt="mpesa">
                           <img src="assets/img/cards/mastercard.png" alt="mastercard">
                           <img src="assets/img/cards/paypal.png" alt="paypal">
                        </div>
                     </div>
                     <div class="col-lg-4 text-right">
                        <div class="invoice-detail-item">
                           <div class="invoice-detail-name">Subtotal</div>
                           <div class="invoice-detail-value"><span id = "subtotal">$670.99<span></div>
                        </div>
                        <div class="invoice-detail-item">
                           <div class="invoice-detail-name">Tax</div>
                           <div class="invoice-detail-value">0</div>
                        </div>
                        <hr class="mt-2 mb-2">
                        <div class="invoice-detail-item">
                           <div class="invoice-detail-name">Total</div>
                           <div class="invoice-detail-value invoice-detail-value-lg"><span id = "totaldue">$685.99</span<</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <hr>
         <div class="text-md-right">
            <div class="float-lg-left mb-lg-0 mb-3">
               <button class="btn btn-primary btn-icon icon-left" onclick="startPayment()"><i class="fas fa-credit-card"></i> Process Payment</button>
               <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</button>
            </div>
            <button id="printInvoice" class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
         </div>
      </div>
   </div>
   <div id = "paymentRow" class="row">
      <div class="col-12 col-sm-12 col-lg-12">
         <div class="card">
            <div class="card-header">
               <h4><strong>Process Payment</strong></h4>
               <h4 id="confrimed" style="color:blue; display:none;"></h4>
            </div>
            <div class="card-body">
               <ul class="nav nav-pills" id="myTab3" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#mpesa" role="tab" aria-controls="home" aria-selected="true">
                     <img src="assets/img/cards/mpesa.jpg" style="width:200px"></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#card" role="tab" aria-controls="profile" aria-selected="false">
                     <img src="assets/img/cards/card.jpg" style="width:200px"></a>
                  </li>
               </ul>
               <div class="tab-content" id="myTabContent2">
                  <div class="tab-pane fade show active" id="mpesa" role="tabpanel" aria-labelledby="home-tab3">
                     <p><strong>PAY THROUGH M-PESA</strong></p>
                     <div class="form-group">
                        <label for="mobile">Your M-PESA Mobile No</label>
                        <input  name="mobile" class="form-control" id="mobile" placeholder="Mobile No">
                     </div>
                     <button type="button" class="btn btn-primary" name="mpesa_pay" id="mpesa_pay" onclick="mpesaPayer()"><i id = 'mpesaIcon' class="fa fa-spinner"></i> PAY</button>
                     <input type="hidden" name="payment_method" value="mpesa">
                     <input type="hidden" name="amount" value="150000">
                  </div>
                  <div class="tab-pane fade" id="card" role="tabpanel" aria-labelledby="profile-tab3">
                     <p><strong>PAY THROUGH CREDIT/DEBIT CARD</strong></p>
                     <div class="form-group col-md-4" style="padding-left:0px;padding-left:0px">
                        <input type="text" class="form-control" placeholder="Card Holder First Name" name="f_name" id="f_name" value="" style="padding:10px !important">
                     </div>
                     <div class="form-group col-md-4" style="padding-left:0px;padding-left:0px">
                        <input type="text" class="form-control" placeholder="Card Holder Middle Name" name="m_name" id="m_name" value="" style="padding:10px !important">
                     </div>
                     <div class="form-group col-md-4" style="padding-left:0px;padding-left:0px">
                        <input type="text" class="form-control" placeholder="Card Holder Last Name" name="l_name" id="l_name" value="" style="padding:10px !important">
                     </div>
                     <div class="form-group col-md-8" style="padding-left:0px;padding-left:0px">
                        <input type="text" class="form-control card-number" placeholder="Card Number" name="c_no" id="c_no" value="" style="padding:10px !important" autocomplete="off">
                     </div>
                     <div class="form-group col-md-4" style="padding-left:0px;padding-left:0px">
                        <input type="text" class="form-control card-cvc" placeholder="CVC" name="cvs" id="cvc" value="" style="padding:10px !important" autocomplete="off">
                     </div>
                     <div class="form-group col-md-12" style="padding-left:0px;padding-left:0px">
                        <input type="month" class="form-control card-expiry-month" placeholder="Exp. Month" name="e_month" id="e_month" value="" style="padding:10px !important; width:115px; display:inline" autocomplete="off" size="2">  &nbsp; 
                        <input type="number" class="form-control card-expiry-year" placeholder="Exp. Year" name="e_year" id="e_year" value="" style="padding:10px !important; width:130px;display:inline" autocomplete="off" size="4"> 
                     </div>
                     <button type="button" class="btn btn-primary" style="margin-top:25px" name="cc_pay" id="cc_pay" onclick="ccPayer()"><i id = 'ccIcon' class="fa fa-spinner"></i> PAY</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php include 'slider.php';?>
<?php include 'footer.php';?>