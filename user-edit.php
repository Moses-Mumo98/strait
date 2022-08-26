<?php include 'header.php';?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
              <h4 class="page-title m-b-0">Users</h4>
              <h4 id="confrimed" style="color:red; display:none;"></h4>
            </li>
            <li class="breadcrumb-item">
              <a href="home">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="users">Users</a></li>
            <li class="breadcrumb-item"><a href="project-edit">Add/Edit Users</a></li>
          </ul>
          <div class="section-body">
            <div class="row">
            <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4 id = 'project-edit-title'>Register</h4>
                <h4 id="confrimed" style="color:red; display:none;"></h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="u_name">Full Name</label>
                      <input id="u_name" type="text" class="form-control" name="u_name" autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label for="u_email">User Email</label>
                      <input id="u_email" type="email" class="form-control" name="u_email">
                    </div>
                  </div>
                  <div id = "branchDiv" class="form-group">
                        <label id = "l_b_name">Branch Name</label>
                        <select id = "branch-name" name = "branch-name" class="form-control select2" onchange="listDepartments(1)"></select>
                  </div>
                  <div id = "depDiv" class="form-group">
                    <label id = "dep_label">Department Name</label>
                    <select id = "dep_name" name = "dep_name" class="form-control select2"></select>
                 </div>
                  <div class="form-group">
                    <label>User Level</label>
                    <select id = "user-level" class="form-control"></select>
                 </div>
                <div class="form-group">
                    <label>User Status</label>
                    <select id = "user-status" class="form-control"></select>
                 </div>
                  <div class="form-group">
                    <button id = "userSaver" type="submit" class="btn btn-primary btn-lg btn-block"><i id = 'usersaverIcon' class="fa fa-spinner"></i>
                      Submit
                    </button>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </section>
    <script src="assets/js/custom.js"></script>
       
    <?php include 'slider.php';?>
    <?php include 'footer.php';?>

