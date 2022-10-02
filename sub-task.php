<?php include 'header.php';?>
<!-- Main Content -->
<div class="main-content">
<section class="section">
    <ul class="breadcrumb breadcrumb-style ">
        <li class="breadcrumb-item">
            <h4 id = "page_title" class="page-title m-b-0">Project Sub-Tasks</h4>
        </li>
        <li class="breadcrumb-item">
            <a href="home">
            <i data-feather="home"></i></a>
        </li>
        <li class="breadcrumb-item"><a id = "link_p" href="projects">Projects</a></li>
        <li class="breadcrumb-item"><a id = "link_t" href="tasks">Project Tasks</a></li>
        <li class="breadcrumb-item"><a id = "link_sub_t" href="sub-task">Project Tasks</a></li>
    </ul>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 id = "projectsHead">Tasks</h4>
                        <div class="card-header-action">
                            <button id = "addSubTask" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="right"title=""><i data-feather="file-plus"></i><span id = "add_t">Add New Task</span></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-4">
             
                            <label>Department</label>
                                <select id = "dep_name" name = "dep_name" class="form-control select2" onchange="getDepartmentProjects()"></select>
                            </div>
                            <div class="form-group col-4">
                                <label id = "l_project_name">Courses</label>
                                <select id = "project_name" name = "project_name" class="form-control select2" onchange="listProjectTasks()"></select>
                            </div>
                            <div class="form-group col-4">
                                <label id = "l_task_name">Lessons</label>
                                <select id = "task_name" name = "task_name" class="form-control select2" onchange="getSubTasks()"></select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" id = "projects-table">
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