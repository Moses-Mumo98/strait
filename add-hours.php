<?php include 'header.php';?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
              <h4 class="page-title m-b-0">Add Hours</h4>
            </li>
            <li class="breadcrumb-item">
              <a href="home">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="projects">Projects</a></li>
            <li class="breadcrumb-item"><a href="tasks">Tasks</a></li>
            <li class="breadcrumb-item"><a href="add-hours">Add Hours</a></li>
          </ul>
          <div class="section-body">
            <div class="row">
            <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4 id = 'project-edit-title'>Add Hours Worked on Task</h4>
                <h4 id="confrimed" style="color:red; display:none;"></h4>
              </div>
              <div class="card-body">
                  <div class="row">
                  <div class="form-group col-6">
                    <label>File Name</label>
                    <select id = "project-name" name = "project-name" class="form-control select2" onchange="getAllTasks()"></select>
                 </div>
                 <div class="form-group col-6">
                    <label>Task Name</label>
                    <select id = "task-name" name = "task-name" class="form-control select2" onchange="getAssignedUser()"></select>
                 </div>
                 <div class="form-group col-6">
                      <label>User</label>
                      <select  id = "company-users" name = "company-users" class="form-control"></select>
                </div>
                    <div class="form-group col-6">
                      <label for="hours">Minutes Worked</label>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hoursModal" style="float: right;">Need Help?</button>
                      <input id="hours" type="number" class="form-control" name="hours" autofocus>
                    </div>
                    <div class="form-group col-6">
                    <button id = "hoursSaver" type="submit" class="btn btn-primary btn-lg btn-block"><i id = 'hourssaverIcon' class="fa fa-spinner"></i>
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
        <div class="modal fade" id="hoursModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Convert Minutes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                </div>
              <div class="modal-body">
                <div class="form-group">
                    <b><span id="resultConverter">0.00</span> Minutes</b>
                 </div>
                  <div class="form-group">
                    <label>Hours</label>
                      <input id="inputHoursConverter" type="number" value="0" min="0" class="form-control">
                 </div>
                 <div class="form-group">
                    <label>Minutes</label>
                      <input id="inputMinutesConverter" type="number" value="0" min="0" max="60" class="form-control">
                 </div>
                 <div><button id="addHoursConverter" type="button" class="btn btn-primary m-t-15 waves-effect">Add</button>
              </div>
            </div>
          </div>
        </div>
       
    <?php include 'slider.php';?>
    <?php include 'footer.php';?>
    <script src="assets/js/page/hoursConverter.js"></script>

