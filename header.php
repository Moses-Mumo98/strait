<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Iconz spa</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/prism/prism.css">

  <link rel="stylesheet" href="assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="assets/bundles/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="assets/bundles/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/bundles/owlcarousel2/dist/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <link rel="stylesheet" href="assets/bundles/pretty-checkbox/pretty-checkbox.min.css">
  <link rel="stylesheet" href="assets/bundles/jqvmap/dist/jqvmap.min.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.png' />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
  <style>
    body {
  background: whitesmoke;
  font-family: 'Open Sans', sans-serif;
}
.container {
  max-width: 960px;
  margin: auto; 
  padding: auto;
}
h1 {
  font-size: 20px;
  text-align: center;
  /* margin: 20px 0 20px; */
}
h1 small {
  display: block;
  font-size: 15px;
  /* padding-top: 8px; */
  color: gray;
}
.avatar-upload {
  position: relative;
  max-width: 205px;
  /* margin: 50px auto; */
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  /* top: 10px; */
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "\f040";
  font-family: 'FontAwesome';
  color: #757575;
  position: absolute;
  top: 0;
  display: "none";
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
  width: 150px;
  height: 150px;
  position: relative;
  border-radius: 100%;
  /* margin-left:3000px */
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}
  </style>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn" onclick="hideShowDiv()"> <i data-feather="menu"></i></a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
              <i data-feather="maximize"></i>
            </a></li>
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <div id = "myinitials"></div> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div id = "userlogged" class="dropdown-title">Hello Sarah Smith</div>
              <a href="profile" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a>
               <!-- <a href="#" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Activities
              </a>  -->
              <a href="setting" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a id = "logout" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2" >
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="home"  id="myDIV"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> STRAIT</a>
            </a>
          </div>
          <div class="sidebar-user">
            <div class="sidebar-user-picture">
                <!-- <div id = "userInitials"></div> -->
                <div class="container"  id="myDIV">
    <div class="avatar-upload" >
      
        <div class="avatar-edit">
            <input type='file' id="user_image" onchange="readURL(this);" accept=".png, .jpg, .jpeg" />
            <label for="user_image"><i class='fas fa-pencil-alt'></i></label>
        </div>
        
        <div class="avatar-preview" id="imagePreview">
            <div id="profile">
              
            </div>
        </div>
    </div>
</div>
                
            </div>
            <div class="sidebar-user-details">
              <div id = "user-name" class="user-name">Kerry Mann</div>
              <div id = "user-company" class="user-name">Company</div>
              <div id = "user-role" class="user-role">Administrator</div>
            </div>
          </div>
          <ul class="sidebar-menu">
          
          <li  class="dropdown active"><a class="nav-link" href="home"><i data-feather="airplay"></i><span>Dashboard</span></a></li><li>
          <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="home"></i><span id = "menu_identity">Organization</span></a>
              <ul class="dropdown-menu">
                <li><a id = "menu_link_branch" class="nav-link" href="branches">Branches</a></li>
                <li><a class="nav-link" href="departments">Departments</a></li>
                <li><a class="nav-link" href="users"><span id = "menu_users">Users</span></a></li>
            
              </ul>
            </li>

            <li>
            <a href="clients" ><i data-feather="user"></i><span id = "menu_users">Clients</span></a>
            </li>


            <!-- <li class="dropdown">
              <a href="clients" class="menu-toggle nav-link has-dropdown"><i data-feather="user"></i><span >Clients</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="clients"><span id = "menu_users">Clients</span></a></li>
              <li id = "link_accounts"><a id = "menu_link_accounts" class="nav-link" href="accounts"><i data-feather="list"></i> Accounts</a></li>
                <li id = "link_trans"><a  id = "menu_link_transactions" class="nav-link" href="account-statement"><i data-feather="activity"></i>Transactions</a></li>
               
              </ul>
            </li> -->

          <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="grid"></i><span id = "menu_p">Projects</span></a>
              <ul class="dropdown-menu">
                <li id = "link_projects"><a id = "menu_link_p" class="nav-link" href="projects">Projects</a></li>
                <li id = "link_tasks"><a  id = "menu_link_t" class="nav-link" href="tasks">Tasks</a></li>
                <li id = "link_sub_tasks"><a  id = "menu_link_sub_t" class="nav-link" href="sub-task">Sub Tasks</a></li>
                <li id = "add-hours"><a class="nav-link" href="add-hours">Add Hours</a></li>
              </ul>
            </li>
			<!-- <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="dollar-sign"></i><span id = "menu_acc">Client Accounting</span></a>
              <ul class="dropdown-menu">
                <li id = "link_accounts"><a id = "menu_link_accounts" class="nav-link" href="accounts"><i data-feather="list"></i> Accounts</a></li>
                <li id = "link_trans"><a  id = "menu_link_transactions" class="nav-link" href="account-statement"><i data-feather="activity"></i>Transactions</a></li>
              </ul>
            </li> -->
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file"></i><span id = "menu_p">Documents</span></a>
              <ul class="dropdown-menu">
                <li id = "link_projects"><a id = "menu_link_p" class="nav-link" href="document">View Documents</a></li>
                <li id = "link_task"><a  id = "menu_link_t" class="nav-link" href="add_document">Add document</a></li>
                <!-- <li id = "link_sub_tasks"><a  id = "menu_link_sub_t" class="nav-link" href="sub-task">Sub Tasks</a></li>
                <li id = "add-hours"><a class="nav-link" href="add-hours">Add Hours</a></li> -->
              </ul>
            </li>
			      <!-- <li><a id = "dms" class="nav-link"><i data-feather="briefcase"></i>DMS</a></li> -->
            <li><a class="nav-link" href="timer"><i data-feather="clock"></i><span id = "timer_label">Timer</span></a></li>
            <li><a class="nav-link" href="timeline"><i data-feather="sliders"></i><span id = "logs_label">Lesson</span></a></li>
            <!-- <li><a class="nav-link" href="throughput"><i data-feather="activity"></i><span id = "throuput_label">Staff Throughput</span></a></li> -->
            <li><a class="nav-link" href="filethroughput"><i data-feather="file-text"></i><span id = "throuput_label">File Throughput</span></a></li>
            <!-- <li><a class="nav-link" href="taskthroughput"><i data-feather="clipboard"></i><span id = "throuput_label">Task Throughput</span></a></li> -->
            <!-- <li><a class="nav-link" href="invoices"><i data-feather="credit-card"></i><span id = "invoices_label">Client Invoices</span></a></li> -->
          </ul>
        </aside>
        <!-- General JS Scripts -->
 
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
  
      </div>