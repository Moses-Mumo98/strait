<?php include 'header.php';?>
<!-- Main Content -->
<div class="main-content">
<section class="section">
    <ul class="breadcrumb breadcrumb-style ">
        <li class="breadcrumb-item">
            <h4  class="page-title m-b-0">Settings</h4>
        </li>
        <li class="breadcrumb-item">
            <a href="home">
            <i data-feather="home"></i></a>
        </li>
        <li class="breadcrumb-item"><a  href="profile">Profile</a></li>
        
    </ul>
    <div class="section-body">
    <div class="row">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 id = 'project-edit-title'>Settings</h4>
                            <h4 id="confrimed" style="color:red; display:none;"></h4>
                        </div>
                        <div class="card-body">
                        <div class="form-group">
                                <label id = "user_email" for="user_email">User Email</label>
                                <input id="user_email" type="text" class="form-control" name="user_email" autofocus>
                            </div>
                            <div class="form-group">
                                <label id = "first_name" for="first_name">First Name</label>
                                <input id="first_name" type="text" class="form-control" name="first_name" autofocus>
                            </div>
                            <div class="form-group">
                                <label id = "last_name" for="last_name">Last Name</label>
                                <input id="last_name" type="text" class="form-control" name="last_name">
                            </div>

                            <div class="form-group">
                                <label id = "user_phone" for="user_phone">User Phone</label>
                                <input id="user_phone" type="text" class="form-control" name="user_phone">
                            </div>
                            <div class="form-group">
                                <label id = "user_password" for="user_phone">User Password</label>
                                <input id="user_password" type="text" class="form-control" name="user_password">
                            </div>
                            <div class="form-group">
                                <button id = "useredit" type="submit" class="btn btn-primary btn-lg btn-block"><i id = 'usereditIcon' class="fa fa-spinner"></i>Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'slider.php';?>
<?php include 'footer.php';?>
 <!-- General JS Scripts -->
 <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/language/lang.js"></script>


  function Upload(){
    var file_data = document.getElementById('user_image').files[0];  
    var form_data = new FormData();                  
    form_data.append('user_image', file_data);
    form_data.append('request', 1);
    var c_name = $('input[name = "c_name"]').val();
    var u_name = $('input[name = "u_name"]').val();
    var l_name = $('input[name = "l_name"]').val();
    var p_name = $('input[name = "p_name"]').val();
    var u_email = $('input[name = "u_email"]').val();
    var u_password = $('input[name = "u_password"]').val();
    var orgTypes = $('#orgTypes').val();

    
	var errorMessage;
	
	if(c_name == ""){
		errorMessage = "Company Name is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("c_name").style.borderColor = "red";
		return;	
	}
	
	if(u_name == ""){
		errorMessage = "Your Name is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("u_name").style.borderColor = "red";
		return;	
	}

    if(l_name == ""){
		errorMessage = "Your Name is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("l_name").style.borderColor = "red";
		return;	
	}
	
    if(p_name == ""){
		errorMessage = "Your Name is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("p_name").style.borderColor = "red";
		return;	
	}

	if(u_email == ""){
		errorMessage = "Your Email is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("u_email").style.borderColor = "red";
		return;	
	}
	
	if(u_password == ""){
		errorMessage = "Your Password is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("u_password").style.borderColor = "red";
		return;	
	}
	

    form_data.append('c_name', c_name);
    form_data.append('u_name', u_name);
    form_data.append('l_name', l_name);
    form_data.append('p_name', p_name);
    form_data.append('u_email', u_email);
    form_data.append('u_password', u_password);
    form_data.append('orgTypes', orgTypes);




    //alert(form_data);                             
    $.ajax({
        url: myurl, // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'POST',
        success: function(php_script_response){
            //alert(php_script_response); // display response from the PHP script, if any
        }
     });
};
  