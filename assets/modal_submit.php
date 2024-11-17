<?php include('db.php');?>

<div class="modal-dialog width-800px" role="document" data-latitude="-1.333731" data-longitude="36.927109" data-marker-drag="true"> <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closebut"><span aria-hidden="true">&times;</span></button>
    <div class="modal-content" id="section-to-print" class="">

        <div class="modal-body">
      <!--tabs-->
      <div style="border-bottom: 3px solid #000;padding-bottom: 15px; width:100%" class="row printTitle otherPrintTitle">
        <div class="col-md-2" style="float:left"><img src="assets/img/logo.jpg" style="max-height: 90px;" alt=""></div>
        <div class="col-md-7" style=" float:left;  text-align: center !important;     "><img src="assets/img/taxijkia_qrcode.png" class="printTitle" style="max-height: 90px;" alt=""><div><span>www.taxijkia.com</span> | <span>www.jetralogistics.com</span></div> </div>

        <div class="col-md-3" style=" float:left;  text-align: right !important;">
          <h1 style="font-size: 2.7em;">JL Travel Hub</h1>
          <b>JKIA, Terminal 1A</b><br>
          0716 643157 / 0716 643 193<br>
          info@jetralogistics.com

        </div>
        <div style="clear:both"></div>
      </div>
      <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#transfers" aria-controls="home" role="tab" data-toggle="tab">Airport Transfer</a></li>
                    <li role="presentation"><a href="#vouchers" aria-controls="profile" role="tab" data-toggle="tab">Vouchers</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="transfers">
                      <div class="modal-header">

                          <div class="section-title">

                          </div>
                      </div>
                      <form  id='dispatch' class="form inputs-underline">
                          <section class="leftprintsection">
<h3>Walk-in Transfer</h3>
                              <div class="row">
                                  <div class="col-md-9 col-sm-9">

                                      <div class="form-group">
                                          <label for="title">Name</label>
                                          <input type="text" class="form-control" name="name" id="title" placeholder="Name of Guest">
                                      </div>
                                      <!--end form-group-->
                                  </div>
                                  <!--end col-md-9-->
                                  <div class="col-md-3 col-sm-3">
                                      <div class="form-group">
                                          <label for="category">Category</label>
                                          <select class="forhm-control selectpickerh" name="myChoice" id="categoryV">
                                              <option value="">Category</option>
                                              <?php  listCategories() ?>
                                          </select>
                                      </div>
                                      <!--end form-group-->
                                  </div>
                                  <!--col-md-3-->
                              </div>
                              <!--end row-->
                              <div class="form-group">
                                  <label for="description">Special Requests?</label>
                                  <textarea class="form-control" id="description" rows="4" name="description" placeholder="Describe any special request"></textarea>
                              </div>
                              <!--end form-group-->
                              <div class="form-group">
                                  <label for="tags">Tags</label>
                                  <input type="text" class="form-control" name="tags" id="tags" placeholder="+ Add tags such as smoker, VIP, tire etc">
                              </div>
                              <!--end form-group-->
                          </section>
                          <section class="rightprintsection">

                              <div class="row">
                                  <div class="col-md-6 col-sm-6">
                                    <h3>Travel Plan (FROM JKIA)</h3>
                                      <div class="form-group">
                                          <label for="address-autocomplete">Destination</label>
                                          <input type="text" class="form-control" name="destination" id="address-autocomplete" placeholder="Destination">
                                      </div>
                                      <!--end form-group-->
                                      <div class="map height-200px shadow" id="map-modal"></div>
                                      <!--end map-->
                                      <div class="form-group hidden">
                                          <input type="text" class="form-control" id="latitude" name="latitude" hidden="">
                                          <input type="text" class="form-control" id="longitude" name="longitude" hidden="">
                              <input type="text" class="form-control" id="myType" name="myType" hidden="" value="1">
                              <input type="text" class="form-control" id="dated" name="dated" hidden="" value="<?php echo date('Y-m-d H:i:s')?>">
                              <input type="text" class="form-control" name="feeO" id="feeO" hidden="">
                              <input type="text" class="form-control" name="ADMIN" id="ADMIN" hidden="" value="0">
                                      </div>
                                      <p class="note" id="note">Enter the exact address or drag the map marker to position of destination</p>
                                  </div>
                                  <!--end col-md-6-->
                                  <div class="col-md-6 col-sm-6 printAsRow">
                                      <div class="form-group">
                                          <label for="region">Travel Zone</label>
                                          <select class="form-conhtrol selhectpicker" name="region" id="region">
                                              <option value="">Select Zone</option>

                                             <?php listZones($selectedCab);?>
                                          </select>
                                      </div>
                                      <!--end form-group-->
                                      <div class="form-group">
                                          <label for="fee">FEE</label>
                                          <input type="text" class="form-control" name="fee" id="fee" placeholder="chargable fee">
                                      </div>
                        <div class="form-group">
                                          <label for="phone">Listing Phone</label>
                                          <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone number">
                                      </div>
                                      <!--end form-group-->
                                      <div class="form-group">
                                          <label for="email">Listing Email</label>
                                          <input type="email" class="form-control" name="email" id="email" placeholder="hello@example.com">
                                      </div>
                                      <!--end form-group-->
                                      <div class="form-group">
                                          <label for="website">Assign Driver</label>
                           <select class="form-conhtrol selhectpicker" name="driver" id="driverV">
                                           <?php listDrivers($vtype) ?>
                           </select>
                                      </div>
                                      <!--end form-group-->
                                  </div>
                                  <!--end col-md-6-->
                              </div>
                          </section>
                          <h3 class="leftprintsection" style="margin-top:50px">Payment Voucher</h3>
                          <div class="row leftprintsection " style="min-width:90%">
                            <div class="col-md-4">

                              <div class="form-group">
                                <label for="nights">Currency:</label>
                                <select class="form-control receiptmkr" name="payCurrency"  id="payCurrency">
                                  <option value="" disabled selected>Currency</option>
                                  <option value="kes">KES</option>
                                  <option value="USD">USD</option>
                                  <option value="GBP">GBP</option>
                                  <option value="EURO">EURO</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4 ">
                              <div class="form-group">
                                <label for="nights">Amount Paid:</label>
                                <input type="number" class="form-control receiptmkr" name="hotel_fees" id="hotel_fees" placeholder="Charges">
                              </div>
                          </div>

                          <div class="col-md-4 amigo">
                            <div class="form-group">
                              <label for="nights">Paid via:</label>
                              <select class="form-control receiptmkr" name="payMethod" id="payMethod">
                                <option value="" disabled selected>Payment Method</option>
                                <option value="cash">Cash</option>
                                <option value="cheque">Cheque</option>
                                <option value="mpesa">M-pesa</option>
                                <option value="airtel">Airtel</option>
                                <option value="tkash">T-kash</option>
                                <option value="cc">Credit/Debit card</option>
                              </select>
                            </div>
                          </div>
                        </div>




                          <section class="center" id="subsect">
                              <div class="form-group">
                                  <button type="submit" class="btn btn-primary btn-rounded">Preview & Submit Listing</button>
                              </div>
                              <!--end form-group-->
                          </section>
                      </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="vouchers">
                      <div class="modal-header">

                          <div class="section-title">
                          </div>
                      </div>
  <form class="form inputs-underline" id="voucherForm">
    <div class="row">
      <div class="col-md-4 ">
        <div class="form-group">
          <label for="destination">Hotel:</label>
          <input type="text" class="form-control receiptmkr" name="hotel" id="destination" placeholder="Enter destination">
        </div>
      </div>
      <div class="col-md-4 ">
        <div class="form-group">
          <label for="clientName">Client Name:</label>
          <input type="text" class="form-control receiptmkr" name="client" id="clientName" placeholder="Enter client name">
        </div>
      </div>
      <div class="col-md-4 ">
        <div class="form-group">
          <label for="confirmationContact">Confirmation Contact:</label>
          <input type="text" class="form-control" name="contact" id="confirmationContact" placeholder="Enter confirmation contact">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 ">
        <div class="form-group ">
            <label for="pax">Number of Pax:</label>
            <input type="number" class="form-control receiptmkr" name="pax" id="pax" placeholder="Enter number of pax">
        </div>
    </div>
    <div class="col-md-4 ">
      <div class="form-group ">
        <label for="childrenUnder12">Children Under 12:</label>
        <input type="number" class="form-control" name="underage" id="childrenUnder12" placeholder="Enter number of children under 12">

      </div>
    </div>
      <div class="col-md-4 ">
        <div class="form-group">
          <label for="nights">Number of Nights:</label>
          <input type="number" class="form-control receiptmkr" name="nights" id="nights" placeholder="Enter number of nights">
        </div>
      </div>
  </div>


  <div class="row noprint">
    <div class="col-md-4">

      <div class="form-group">
        <label for="nights">Currency:</label>
        <select class="form-control receiptmkr" name="payCurrency"  id="payCurrency">
          <option value="" disabled selected>Currency</option>
          <option value="kes">KES</option>
          <option value="USD">USD</option>
          <option value="GBP">GBP</option>
          <option value="EURO">EURO</option>
        </select>
      </div>
    </div>
    <div class="col-md-4 ">
      <div class="form-group">
        <label for="nights">Amount Paid:</label>
        <input type="number" class="form-control receiptmkr" name="hotel_fees" id="hotel_fees" placeholder="Charges">
      </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label for="nights">Paid via:</label>
      <select class="form-control receiptmkr" name="payMethod" id="payMethod">
        <option value="" disabled selected>Payment Method</option>
        <option value="cash">Cash</option>
        <option value="cheque">Cheque</option>
        <option value="mpesa">M-pesa</option>
        <option value="airtel">Airtel</option>
        <option value="tkash">T-kash</option>
        <option value="cc">Credit/Debit card</option>
      </select>
    </div>
  </div>
</div>
<div class="form-group specialInst">
<label for="specialInstructions">Special Instructions:</label>
<textarea class="form-control" name="instructions" id="specialInstructions" placeholder="Enter any special instructions"></textarea>
</div>
    <span id="bgtext" style="font-size: 1em;color: #ececec;">Visitor Info</span><br>
    <span id="passengerInfo" style="background: #fcfcfc;padding: 30px; display: block;"> </span>
    <img src="assets/img/taxijkia_qrcode.png" style="max-height: 90px;" alt="">


    <button type="button" id="svouch" class="btn btn-primary">Save</button>
  </form>


  <div id="receiptPrintout" class="printTitle " >
    <div style="border-bottom: 3px solid #000;padding-bottom: 15px; width:100%" class="row ">
      <div class="col-md-2">
          <img src="assets/img/logo.jpg" style="max-height: 90px;" alt="">
          <br/>
          <div id="dateNow"></div>
      </div>
      <div class="col-md-2">
        <h1 style="font-size: 1.3em; margin-top: 10%;"> CUSTOMER RECEIPT</h1>
      </div>
      <div class="col-md-7" style="  text-align: center !important;     padding-top: 99px"><img src="assets/img/taxijkia_qrcode.png" class="printTitle" style="max-height: 90px;" alt=""><div><span>www.taxijkia.com</span> | <span>www.jetralogistics.com</span> </div></div>
      <div class="col-md-3" style="  text-align: right !important;">
        <h1 style="font-size: 2.7em;">JL Travel Hub</h1>
        <b>JKIA, Terminal 1A</b><br>
        0716 643157 / 0716 643 193<br>info@jetralogistics.com
     </div>
    </div>
    <hr>
    <div class="row" style="width:100%">
      <div class="col-md-2">Received <span class="payMethod"></span> from:</div><div class="col-md-9 client b-b-1"></div>
    </div>
    <div class="row" style="width:100%">
      <div class="col-md-2"><span class="payCurrency" style="font-size:inherit"></span>:</div>
      <div class="col-md-5 amtInWords b-b-1 hotel_feestowords"></div>
      <div class="col-md-4 amtInDigits boxBorder">
        <span class="payCurrency" style="font-size:inherit"></span>
        <span class="hotel_fees" style="font-size:inherit"></span>
      </div>
    </div>
    <div class="row amigo" style="width:100%">
      <div class="col-md-2">Being Payment of:</div><div class="col-md-10 b-b-1"><span class="nights"></span> nights at <span class="hotel"></span> for <span class="pax"></span></div>
    </div>


  </div>



</div><!--end of vouchers-->

                </div>

      <!--tabs end -->




        </div>
        <!--end modal-body-->
    </div>
    <!--end modal-content-->
</div>
<!--end modal-dialog-->';

<script>

  function addPassenger(nth) {
      var passengerInfo = document.getElementById("passengerInfo");
      var newPassenger = document.createElement("div");
      newPassenger.innerHTML = `<div class="row">
                                  <div class="col-md-4 ">
                                    <div class="form-group">
                                      <input type="text" class="form-control" name="identity[]" placeholder="${nth}. Name">
                                    </div>
                                  </div>

                                  <div class="col-md-4 ">
                                    <div class="form-group">
                                      <select class="form-control"  name="accommodationType[]" id="accommodationType">
                                      <option value="" disabled selected>Room Type</option>
                                        <option>Standard</option>
                                        <option>Deluxe</option>
                                        <option>Premium</option>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="col-md-4 ">
                                    <div class="form-group">
                                      <div class="form-group">
                                        <select class="form-control" name="boardingType[]" id="boardingType">
                                          <option value="" disabled selected>Boarding type</option>
                                          <option>Room Only</option>
                                          <option>Bed and Breakfast</option>
                                          <option>Half Board</option>
                                          <option>Full Board</option>
                                        </select>
                                      </div>

                                    </div>
                                  </div>

                                </div>`;
      passengerInfo.appendChild(newPassenger);
  }
</script>

<script>
var inititatedByButton=false;
var closeModal=false;

// Convert numbers to words
// copyright 25th July 2006, by Stephen Chapman http://javascript.about.com
// permission to use this Javascript on your web page is granted
// provided that all of the code (including this copyright notice) is
// used exactly as shown (you can change the numbering system if you wish)

// American Numbering System
var th = ['', 'thousand', 'million', 'billion', 'trillion'];
// uncomment this line for English Number System
// var th = ['','thousand','million', 'milliard','billion'];

var dg = ['zero', 'one', 'two', 'three', 'four','five', 'six', 'seven', 'eight', 'nine'];
var tn = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen','seventeen', 'eighteen', 'nineteen'];
var tw = ['twenty', 'thirty', 'forty', 'fifty','sixty', 'seventy', 'eighty', 'ninety'];

function toWords(s){

  let numberInput = s ;

    let oneToTwenty = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ',
    'eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
    let tenth = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

    if(numberInput.toString().length > 7) return myDiv.innerHTML = 'overlimit' ;
    console.log(numberInput);
    //let num = ('0000000000'+ numberInput).slice(-10).match(/^(\d{1})(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
  let num = ('0000000'+ numberInput).slice(-7).match(/^(\d{1})(\d{1})(\d{2})(\d{1})(\d{2})$/);
    console.log(num);
    if(!num) return;

    let outputText = num[1] != 0 ? (oneToTwenty[Number(num[1])] || `${tenth[num[1][0]]} ${oneToTwenty[num[1][1]]}` )+' million ' : '';

    outputText +=num[2] != 0 ? (oneToTwenty[Number(num[2])] || `${tenth[num[2][0]]} ${oneToTwenty[num[2][1]]}` )+'hundred ' : '';
    outputText +=num[3] != 0 ? (oneToTwenty[Number(num[3])] || `${tenth[num[3][0]]} ${oneToTwenty[num[3][1]]}`)+' thousand ' : '';
    outputText +=num[4] != 0 ? (oneToTwenty[Number(num[4])] || `${tenth[num[4][0]]} ${oneToTwenty[num[4][1]]}`) +'hundred ': '';
    outputText +=num[5] != 0 ? (oneToTwenty[Number(num[5])] || `${tenth[num[5][0]]} ${oneToTwenty[num[5][1]]} `) : '';

    return outputText;
}

$(document).ready(function(){
  var printed_copies=0;
	$( ".gmnoprint" ).removeClass( "gmnoprint" );

  $('.receiptmkr').on('change',
  function(c){
    console.log($(this).val());
    console.log('.'+$(this).prop('name'));
    //if(  $('.'+$(this).prop('name')).hasClass('towords')){
      $('.'+$(this).prop('name')+'towords').html(toWords($(this).val())+' ONLY----');
    //}else{
      $('.'+$(this).prop('name')).html($(this).val());
    //}

    console.log($('.'+$(this).prop('name')).val());
  }

  );
  var clicked=false;

  console.log(inititatedByButton);
  $('#svouch').on('click',function(c){
    if(clicked==true) return true;
    $(this).html('Saving...');
    clicked=true;
    //serialise the forms
    var dataToPost=$('#voucherForm').serialize();

    //submit forms
    $.ajax({
      type: 'post',
      url: '../backend/atadmin/en.php?vi=1',
//url: '../../ksmbp/en.php?di=1',
      data: dataToPost,
      success: function (results) {
        console.log(results);
        $('#svouch').html("..success");
        console.log(JSON.parse(results));
        //start print one;
        inititatedByButton=true;
        printed_copies=0;
        print(); // this will print the voucher

        clicked=false;

      },

      error: function(e){
        console.log(e);
      }
    });








  });

  var beforePrint = function(mql) {
        console.log('Functionality to run before printing.');
      //  mql.preventDefault();
      //always hide receipt first
      beforePrint.focus();
      beforePrint.print();
      beforePrint.close();
      $('#receiptPrintout').hide();
        if(inititatedByButton==true){
          if(printed_copies<1){
            //close off receipt printing
            console.log('prints are'+printed_copies);
            printed_copies++;

            $('#receiptPrintout').hide();//removeClass('noPrint');
            $('.otherPrintTitle').show();
            $('#voucherForm').show()//addClass('noPrint');
          }else{
            inititatedByButton=false;
            closeModal=true;
              console.log('prints are'+printed_copies);
            //allow only printing of vouchers
            //remove print css from receipt
            $('#receiptPrintout').show();//removeClass('noPrint');
            $('.otherPrintTitle').hide();
            $('#voucherForm').hide()//addClass('noPrint');

          }
        }
    };

    var afterPrint = function(mql) {
      if(inititatedByButton==true){
        if(printed_copies==1){
          print();
        }
      }

      if(closeModal==true){
        $( ".close" ).trigger( "click" );
      }

        console.log('Functionality to run after printing');
    };

    if (window.matchMedia) {
        var mediaQueryList = window.matchMedia('print');
        mediaQueryList.addListener(function(mql) {
            if (mql.matches) {
                beforePrint(mql);
            } else {
                afterPrint(mql);
            }
        });
    }




  $('#paxs').on('change', function (a){


    if($("#passengerInfo").children().length!=$(this).val()){
      if($("#passengerInfo").children().length<$(this).val()){
        var n=$(this).val()-$("#passengerInfo").children().length;
        for(i=1; i<=n; i++){
          console.log(i+"<="+n);
          addPassenger(($("#passengerInfo").children().length+1));
        }

      }else{
        var n = $("#passengerInfo").children().length-$(this).val()
        for(i=1; i<=n; i++){
          $("#passengerInfo").children().last().remove();
        }


    }
    if($("#passengerInfo").children().length>0){
      $('#bgtext').hide();
    }else{
      $('#bgtext').show();
    }

  }

});

	//alert();
	});



	//dispatch loader

$("#categoryV").change(function(){
	//alert

    // replace the choices for zonal charges
	$('#region').load('assets/external/remoteLoad.php?s=c&v='+$("#categoryV").val()).fadeIn("slow");
	// replace the choices for zonal drivers
	//alert($("#categoryV").val());
	$('#driverV') .load('assets/external/remoteLoad.php?s=d&v='+$("#categoryV").val()).fadeIn("fast");
});

$("#region").change(function(){
	var fee = $('#region option:selected').data('fee');
	$("#fee").val(fee);
	$("#feeO").val(fee);
});


	$('#dispatch').on('submit', function (e) {
          e.preventDefault();
          $("#submt").html("processing...");

 if($( "#title" ).val()==''){
				alert("Sorry, You have not selected a Customer Name, please select Customer Name");
				$( "#title" ).focus();
				return false;
		}

 if($( "#driverV" ).val()==''){
				alert("Sorry, You have not selected a driver, please select driver");
				$( "#driverV" ).focus();
				return false;
		}

		 if($( "#phone" ).val()==''){
				alert("Sorry, You have not put in a phone, please insert phone");
				$( "#phone" ).focus();
				return false;
		}

		 if($( "#address-autocomplete" ).val()==''){
				alert("Sorry, You have not entered a destination, please enter destination");
				$( "#address-autocomplete" ).focus();
				return false;
		}

		if($( "#region" ).val()==''){
				alert("Sorry, You have not selected a zone, please select zone");
				$( "#region" ).focus();
				return false;
		}	/**/

          $.ajax({
            type: 'post',
            url: '../backend/atadmin/en.php?di=1',
			//url: '../../ksmbp/en.php?di=1',
            data: $('form').serialize(),
            success: function (results) {
			//	alert(results);
              $("#submt").html("..success");

			         print(this);
			  $( ".close" ).trigger( "click" );
            }
          });

        });


</script>


<?php  if(is_resource(@$connection) )mysqli_close(@$connection); ?>
