<?php include 'header.php';?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
              <h4 id = "p_title" class="page-title m-b-0">Projects</h4>
            </li>
            <li class="breadcrumb-item">
              <a href="home">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item"><a id = "p_link" href="projects">Projects</a></li>
            <li class="breadcrumb-item"><a id = "p_a_link"  href="project-edit">Add/Edit Project</a></li>
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
                      <label for="p_name">Name</label>
                      <input id="p_name" type="text" class="form-control" name="p_name" autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label for="p_desc">Description</label>
                      <input id="p_desc" type="text" class="form-control" name="p_desc">
                    </div>
                  </div>
                  <div class="form-group">
                    <label id = "dep_label">Department Name</label>
                    <select id = "dep_name" name = "dep_name" class="form-control select2"></select>
                 </div>
                <div class="form-group">
                    <label>Status</label>
                    <select id = "project-status" name = "project-status" class="form-control select2"></select>
                 </div>
                <div class="form-group">
                      <label>Start Date</label>
                      <input name = "startDate" type="text" class="form-control datepicker">
                    </div>
                    <div class="form-group">
                      <label>Deadline</label>
                      <input name = "endDate" type="text" class="form-control datepicker">
                    </div>
					          <div class="form-group">
                        <label>Client Name</label>
                        <select  id = "company-users" name = "company-users" class="form-control select2"></select>
                   </div>
                   <div class="section-title">Chargable ?</div>
                     <div class="pretty p-icon p-curve p-tada">
                        <input type="radio" name="radiochoice" onchange="eventStatus('1')">
                        <div class="state p-success-o">
                           <i class="icon material-icons">Yes</i>
                           <label>Yes</label>
                        </div>
                     </div>
                     <div class="pretty p-icon p-curve p-tada">
                        <input type="radio" name="radiochoice" onchange="eventStatus('0')">
                        <div class="state p-danger-o">
                           <i class="icon material-icons">No</i>
                           <label> No</label>
                        </div>
                     </div>
                     <div class="row">
                        <div id = "chargeFee" class="form-group col-6">
                           <label>Charge Amount</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <div class="input-group-text">$</div>
                              </div>
                              <input id="t_fee" name="t_fee" type="number" value = "0" class="form-control currency">
                           </div>
                        </div>
                        <div id = "chargeFee1" class="form-group col-6">
                           <label>Billing Cycle</label>
                           <select id = 'b_cycle' class="form-control select2">
                              <option value = '1' selected>One Off</option>
                              <option value = '2'>Hourly</option>
                              <option value = '3'>Daily</option>
                           </select>
                        </div>
                     </div>
                     <div style="height: 10px;"></div>
                  <div class="form-group">
                    <button id = "projectSaver" type="submit" class="btn btn-primary btn-lg btn-block"><i id = 'projectsaverIcon' class="fa fa-spinner"></i>
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
       
    <?php include 'slider.php';?>
    <?php include 'footer.php';?>

