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
                            <h4 id = 'project-edit-title'>Edit profile</h4>
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
                            <!-- <div class="form-group">
                                <label id = "user_password" for="user_phone">User Password</label>
                                <input id="user_password" type="text" class="form-control" name="user_password">
                            </div> -->
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


  