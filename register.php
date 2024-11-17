
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>STRAIT REGISTER</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.png' />
</head>

<body>
  <style>
* {margin: 0; padding: 0; box-sizing: border-box;}
body {background: #f6f6f6; color: #444; font-family: 'Roboto', sans-serif; font-size: 16px; line-height: 1;}
.container {max-width: 1100px; padding: 0 20px; margin:0 auto;}
.panel {margin: 100px auto 40px; max-width: 500px; text-align: center;}
.button_outer {background: #83ccd3; border-radius:30px; text-align: center; height: 50px; width: 200px; display: inline-block; transition: .2s; position: relative; overflow: hidden;}
.btn_upload {padding: 17px 30px 12px; color: #fff; text-align: center; position: relative; display: inline-block; overflow: hidden; z-index: 3; white-space: nowrap;}
.btn_upload input {position: absolute; width: 100%; left: 0; top: 0; width: 100%; height: 105%; cursor: pointer; opacity: 0;}
.file_uploading {width: 100%; height: 10px; margin-top: 20px; background: #ccc;}
.file_uploading .btn_upload {display: none;}
.processing_bar {position: absolute; left: 0; top: 0; width: 0; height: 100%; border-radius: 30px; background:#83ccd3; transition: 3s;}
.file_uploading .processing_bar {width: 100%;}
.success_box {display: none; width: 50px; height: 50px; position: relative;}
.success_box:before {content: ''; display: block; width: 9px; height: 18px; border-bottom: 6px solid #fff; border-right: 6px solid #fff; -webkit-transform:rotate(45deg); -moz-transform:rotate(45deg); -ms-transform:rotate(45deg); transform:rotate(45deg); position: absolute; left: 17px; top: 10px;}
.file_uploaded .success_box {display: inline-block;}
.file_uploaded {margin-top: 0; width: 50px; background:#83ccd3; height: 50px;}
.uploaded_file_view {max-width: 300px; margin: 40px auto; text-align: center; position: relative; transition: .2s; opacity: 0; border: 2px solid #ddd; padding: 15px;}
.file_remove{width: 30px; height: 30px; border-radius: 50%; display: block; position: absolute; background: #aaa; line-height: 30px; color: #fff; font-size: 12px; cursor: pointer; right: -15px; top: -15px;}
.file_remove:hover {background: #222; transition: .2s;}
.uploaded_file_view img {max-width: 100%;}
.uploaded_file_view.show {opacity: 1;}
.error_msg {text-align: center; color: #f00}
  </style>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Register</h4>
                <h4 id="confrimed" style="color:red; display:none;"></h4>
              </div>
              <div class="card-body">
              <div class="form-group col-6">
                      <label for="c_name">Company Name</label>
                      <input id="c_name" type="text" class="form-control" name="c_name" autofocus>
                    </div>
                  <div class="row">
                   
                    <div class="form-group col-6">
                      <label for="u_name">First Name</label>
                      <input id="u_name" type="text" class="form-control" name="u_name">
                    </div>
                    <div class="form-group col-6">
                      <label for="l_name">Last Name</label>
                      <input id="l_name" type="text" class="form-control" name="l_name">
                    </div>
                    <div class="form-group col-6">
                      <label for="p_name">Phone Number</label>
                      <input id="p_name"  class="form-control" name="p_name">
                    </div>
                  </div>
                  <div class="form-group">
                      <label>Organization Type</label>
                      <select id = "orgTypes" class="form-control select2">
                        
                      </select>
                    </div>
                  <div class="form-group">
                    <label for="u_email">Email</label>
                    <input id="u_email" type="email" class="form-control" name="u_email">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="u_password" class="d-block">Password</label>
                      <input id="u_password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                        name="u_password">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="u_password2" class="d-block">Password Confirmation</label>
                      <input id="u_password2" type="password" class="form-control" name="u_password2" onkeyup='passConfirm()'/>
                    </div>
                    <span id="Message"></span>
                  </div>
                  
                  <!-- profile pic -->
                  <form id="myform">
                  <!-- <main class="main_full">
	<div class="container">
		<div class="panel">
			<div class="button_outer">
				<div class="btn_upload">
				<input type="file"  name="user_image" name="">
       
         Upload Image
				</div>
				<div class="processing_bar"></div>
				<div class="success_box"></div>
			</div>
		</div>
		<div class="error_msg"></div>
		<div class="uploaded_file_view" id="uploaded_view">
			<span class="file_remove">X</span>
		</div>
	</div>
</main> -->
<main class="main_full">
	<div class="container">
		<div class="panel">
			<div class="button_outer">
				<div class="btn_upload">
					<!-- <input type="file" id="upload_file" name=""> -->
          <input type="file"  id="user_image"></input>
					Upload Image
				</div>
				<div class="processing_bar"></div>
				<div class="success_box"></div>
			</div>
		</div>
		<div class="error_msg"></div>
		<div class="uploaded_file_view" id="uploaded_view">
			<span class="file_remove">X</span>
		</div>
	</div>
</main>
</form>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button  onclick="Upload()" type="submit" class="btn btn-primary btn-lg btn-block"><i id = 'registerIcon' class="fa fa-spinner"></i>
                      Register
                    </button>
                  </div>
              </div>
              <div class="mb-4 text-muted text-center">
                Already Registered? <a href="index">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/auth-register.js"></script>
  <script src="assets/bundles/sweetalert/sweetalert.min.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
  <script src='http://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js'>
</script>
</body>




