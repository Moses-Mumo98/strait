<?php include 'header.php';?>
<!-- Main Content -->
<div class="main-content">
<section class="section">
   <ul class="breadcrumb breadcrumb-style ">
      <li class="breadcrumb-item">
         <h4 id = 'page_title' class="page-title m-b-0">Projects</h4>
      </li>
      <li class="breadcrumb-item">
         <a href="home">
         <i data-feather="home"></i></a>
      </li>
      <li class="breadcrumb-item"><a id = "link_p" href="projects">Projects</a></li>
      <li class="breadcrumb-item"><a id = "link_t" href="tasks">Tasks</a></li>
      <li class="breadcrumb-item"><a id = "link_sub_t" href="sub-task">Sub Tasks</a></li>
      <li class="breadcrumb-item"><a id = "link_add_t" href="sub-edit">Add/Edit Task</a></li>
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
                           <label id = "l_t_name" for="t_name">Task Name</label>
                           <input id="t_name" type="text" class="form-control" name="t_name" autofocus>
                        </div>
                        <div class="form-group col-6">
                           <label id = "l_t_desc" for="t_desc">Task Description</label>
                           <input id="t_desc" type="text" class="form-control" name="t_desc">
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-6">
                           <label>Department</label>
                           <select id = "dep_name" name = "dep_name" class="form-control select2" onchange="getDepartmentProjects()"></select>
                        </div>
                        <div class="form-group col-6">
                           <label id = "l_project_name">Courses</label>
                           <select id = "project_name" name = "project_name" class="form-control select2" onchange="listProjectTasks()"></select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label id = "l_task_name">Unit</label>
                        <select  id = "task_name" name = "task_name" class="form-control select2"></select>
                     </div>
                     <div class="form-group">
                        <label>Assigned To</label>
                        <select  id = "company-users" name = "company-users" class="form-control select2" multiple=""></select>
                     </div>
                     <div class="row">
                        <div class="form-group col-6">
                           <label>Status</label>
                           <select id = "project-status" name = "project-status" class="form-control select2"></select>
                        </div>
                        <div class="form-group col-6">
                           <label id = "t_dur">Duration (Mins)</label>
                           <input id="t_dur" type="number"  value = 30 class="form-control" name="t_dur">
                        </div>
                     </div>
					  <div class="slidecontainer">
                        <input type="range" min="0" max="100" value="0" class="slider" id="myRange">
                        <p>Progress: <span id="demo"></span></p>
                     </div>
                     <div class="row">
                        <div class="form-group col-6">
                           <label id = "date_label">Start Date</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <div class="input-group-text">
                                    <i class="fas fa-calendar"></i>
                                 </div>
                              </div>
                              <input name = "startDate" type="text" class="form-control datepicker">
                           </div>
                        </div>
                        <div class="form-group col-6">
                           <label id = "time_label">Start Time</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <div class="input-group-text">
                                    <i class="fas fa-clock"></i>
                                 </div>
                              </div>
                              <input name = "startTime" id = "startTime" type="text" class="form-control timepicker">
                           </div>
                        </div>
                     </div>
                     <div class="section-title">Online Meeting ?</div>
                     <div class="pretty p-icon p-curve p-tada">
                        <input type="radio" name="radiochoice" onchange="meetingStatus('1')">
                        <div class="state p-success-o">
                           <i class="icon material-icons">Yes</i>
                           <label>Yes</label>
                        </div>
                     </div>
                     <div class="pretty p-icon p-curve p-tada">
                        <input type="radio" name="radiochoice" onchange="meetingStatus('0')">
                        <div class="state p-danger-o">
                           <i class="icon material-icons">No</i>
                           <label> No</label>
                        </div>
                     </div>
                     <div style="height: 10px;"></div>
                     <div class="form-group" style="margin-top: 15px">
                        <button id = "subtaskSaver" type="submit" class="btn btn-primary btn-lg btn-block"><i id = 'subtasksaverIcon' class="fa fa-spinner"></i> Submit</button>
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
<script>
   var slider = document.getElementById("myRange");
   var output = document.getElementById("demo");
   output.innerHTML = slider.value+" %";
   
   slider.oninput = function() {
     output.innerHTML = this.value+" %";
   }
</script>