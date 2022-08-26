$(document).ready(function() {
	var page = location.pathname.split('/').slice(-1)[0];
	if(page == 'pay'){
		var amount = sessionStorage.getItem("amount");
		$('#totals').html(amount);
		
		var ticket = sessionStorage.getItem("ticket");
		$('#ticket').html(ticket);
		
	}else{
		var ticketNo = getRandom(10);
		debug("Generated Ticket Number: "+ticketNo);
		$('#ticketRef').html(ticketNo);
	}
});

var apiurl = "https://aps.co.ke/paymentAPI/api.php";
var respondUrl = "https://aps.co.ke/paymentAPI/processResponse.php";

function mpesaPayer(){
	debug('mpesa_pay clicked');
	var amount = document.getElementById("totals").textContent;
	debug("Amount is: "+amount);
	
	var ticket = document.getElementById("ticket").textContent;
	debug("Ticket is: "+ticket);
	
	var mobile = $('#mobile').val();
	debug("mobile is: "+mobile);
	
	if (mobile == "") {
        alert("Enter Phone Number");
        return;
    }
	
	 var dataString = {
        'request': 1,
        'regKey': 'abc123',
        'msisdn': mobile,
        'respondUrl': respondUrl,
        'billAmount': 1,
        'reference': "PASA EVENTS"
    };
    debug(dataString);
	var saveButton = document.getElementById('registerIcon');
    saveButton.classList.add('fa-spin');
    $.ajax({
        type: "POST",
        url: apiurl,
        data: dataString,
        success: function(data) {
			saveButton.classList.remove('fa-spin');
            debug('M-PESA Pay Response: ' + data);
			var jsObject = JSON.parse(data);
            var message = jsObject.mpesapayment[0].message;
            document.getElementById("confrimed").innerText = message;
			document.getElementById('confrimed').style.display = 'block';
        },
        error: function(e) {
			saveButton.classList.remove('fa-spin');
         
        }
    });
	
	
    return false;
}


function ccPayer(){
	debug('cc_pay clicked');
	var amount = document.getElementById("totals").textContent;
	debug("Amount is: "+amount);
	
	var ticket = document.getElementById("ticket").textContent;
	debug("Ticket is: "+ticket);
	
	var f_name = $('#f_name').val();
	debug("f_name is: "+f_name);
	
	var m_name = $('#m_name').val();
	debug("m_name is: "+m_name);
	
	var l_name = $('#l_name').val();
	debug("l_name is: "+l_name);
	
	var c_no = $('#c_no').val();
	debug("c_no is: "+c_no);
	
	var cvc = $('#cvc').val();
	debug("cvc is: "+cvc);
	
	var e_month = $('#e_month').val();
	debug("e_month is: "+e_month);
	
	var e_year = $('#e_year').val();
	debug("e_year is: "+e_year);
	
	if (f_name == "" || m_name == "" || l_name == "" || c_no == "" || cvc == "" || e_month == "" || e_year == "") {
        alert("Enter All the Fields");
        return;
    }
	
	 var dataString = {
        'request': 2,
        'regKey': 'abc123',
        'respondUrl': respondUrl,
        'billAmount': 1,
		'reference': "PASA TICKETS",
        'c_no': c_no,
		'cvs': cvc,
		'f_name': f_name,
		'm_name': m_name,
		'l_name': l_name,
		'e_month': e_month,
		'e_year': e_year,
    };
    debug(dataString);
	var saveButton = document.getElementById('registerIcon');
    saveButton.classList.add('fa-spin');
    $.ajax({
        type: "POST",
        url: apiurl,
        data: dataString,
        success: function(data) {
			saveButton.classList.remove('fa-spin');
			document.open();
			document.write(data);
			document.close();
        },
        error: function(e) {
			saveButton.classList.remove('fa-spin');
        }
    });
	
	
    return false;
}


function getRandom(length) {
	return Math.floor(Math.pow(10, length-1) + Math.random() * 9 * Math.pow(10, length-1));
}



function payNow(){
	var amount = document.getElementById("priceTotal").textContent;
	sessionStorage.SessionName = "amount";
    sessionStorage.setItem("amount", amount);
	
	var ticket = document.getElementById("ticketRef").textContent;
	sessionStorage.SessionName = "ticket";
    sessionStorage.setItem("ticket", ticket);
	
	window.location = 'pay';
	return false;
}

function debug(msg){
	console.log(msg);
}


