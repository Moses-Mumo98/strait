<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.png' />
</head>

<body>
  <!-- <div class="loader"></div> -->
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>To reset your password enter your recent password</h4>
                <h4 id="confrimed" style="color:red; display:none;"></h4>
              </div>
              
              <div class="card-body">
                <form action="#" class="needs-validation" novalidate="">
                <div class="form-group">
                    <label for="user_email">User email</label>
                    <input id="user_email" type="email" class="form-control" name="user_email" tabindex="1">
                    <div class="invalid-feedback">
                      Please fill in your email address
                    </div>
                  <div class="form-group">
                    <label for="user_password">New password</label>
                    <input id="user_password" type="password" class="form-control" name="user_password" tabindex="1" >
                    <div class="invalid-feedback">
                      Please fill in your recent password
                    </div>
                    <div class="form-group">
                    <label for="user_password">confirm password</label>
                    <input id="password" type="password" class="form-control" name="password" tabindex="1" >
                    <div class="invalid-feedback">
                      Please fill in your new password
                    </div>
                  </div>
                  <button id ="resetPass2" type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4"><i id = 'resetIcon' class="fa fa-spinner"></i>
                      Submit
                    </button>

  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
 
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/language/lang.js"></script>

  </body>

</html>