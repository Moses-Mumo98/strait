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
        <li class="breadcrumb-item"><a id = "link_add_t" href="task-edit">Add/Edit Task</a></li>
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
                                    <label>Practice Group</label>
                                    <select id = "dep_name" name = "dep_name" class="form-control select2" onchange="getDepartmentProjects()"></select>
                                </div>
                                <div class="form-group col-6">
                                    <label id = "l_project_name">Courses</label>
                                    <select id = "project_name" name = "project_name" class="form-control select2"></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Assigned To</label>
                                <select  id = "company-users" name = "company-users" class="form-control select2"></select>
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
                            <div class="slidecontainer">
                                <input type="range" min="0" max="100" value="0" class="slider" id="myRange">
                                <p>Progress: <span id="demo"></span></p>
                            </div>
                            <div class="form-group">
                                <button id = "taskSaver" type="submit" class="btn btn-primary btn-lg btn-block"><i id = 'tasksaverIcon' class="fa fa-spinner"></i>
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
<script>
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value+" %";
    
    slider.oninput = function() {
      output.innerHTML = this.value+" %";
    }
</script>