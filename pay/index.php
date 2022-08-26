<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>PASA Check Out</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/styler.css"/>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/jquery.js?ver=1"></script>
		<script type="text/javascript" src="js/bootstrap.js?ver=q"></script>
	</head>
	<body>
		<div id="main" class="site-main">
			<div id="main-content" class="main-content"><br>
				<div class="container">
					<div style="background:rgba(255,255,255,1.00); padding:20px">  
						<div class="col-md-4" style="padding:0px !important">
							<h3 style="font-size:20px">TOTAL COST : KSH <span id="totals">1,000<span> </h3>
							<h3 style="font-size:20px">Ticket Ref# : <span id="ticket">PASA EVENTS<span></h3>
							<h4 id="confrimed" style="color:blue; display:none;"></h4>
						</div>
						<div class="col-md-8">
							<div class="tabbable-panel">
								<div class="tabbable-line" style="padding:15px">
									<p style="text-transform:uppercase"><strong></strong><br>Please Select your payment method</p>
									<ul class="nav nav-tabs actions ">
										<li class="active">
											<a href="#tab_default_1" data-toggle="tab" style="padding:0px" aria-expanded="false">
											<img src="images/mpesa.jpg" style="width:200px">
											 </a>
										</li>
										<li class="">
											<a href="#tab_default_2" data-toggle="tab" style="padding:0px" aria-expanded="true">
											<img src="images/card.jpg" style="width:200px">
											</a>
										</li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="tab_default_1">
											<p><strong>PAY THROUGH MPESA</strong></p>
												 <div class="form-group">
													<label for="mobile">Your Mpesa Mobile No</label>
													<input type="number" name="mobile" class="form-control" id="mobile" placeholder="Mobile No">
												  </div>
												  <button type="button" class="btn btn-primary" name="mpesa_pay" id="mpesa_pay" onclick="mpesaPayer()"><i id = 'registerIcon' class="fa fa-spinner"></i> PAY</button>
												  <input type="hidden" name="payment_method" value="mpesa">
												  <input type="hidden" name="amount" value="150000">
										</div>
										<div class="tab-pane" id="tab_default_2">
											<p><strong>PAY THROUGH CREDIT/DEBIT CARD</strong></p>
												<div class="form-group col-md-4" style="padding-left:0px;padding-left:0px">
													<input type="text" class="form-control datepicker hasDatepicker" placeholder="Card Holder First Name" name="f_name" id="f_name" value="" style="padding:10px !important">
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
													<input type="number" class="form-control card-expiry-month" placeholder="Exp. Month" name="e_month" id="e_month" value="" style="padding:10px !important; width:115px; display:inline" autocomplete="off" size="2">  &nbsp; 
													<input type="number" class="form-control card-expiry-year" placeholder="Exp. Year" name="e_year" id="e_year" value="" style="padding:10px !important; width:130px;display:inline" autocomplete="off" size="4"> 
												</div>
												<button type="button" class="btn btn-primary" style="margin-top:25px" name="cc_pay" id="cc_pay" onclick="ccPayer()"><i id = 'registerIcon' class="fa fa-spinner"></i> PAY</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div style="clear:both"></div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>