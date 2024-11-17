<?php include 'header.php';?>
<link rel="stylesheet" href="assets/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" href="assets/fullcalendar/fullcalendar.print.css" media="print">
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
              <h4 class="page-title m-b-0">Dashboard</h4>
            </li>
            <li class="breadcrumb-item">
              <a href="home">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ul>
          <div class="row ">
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"></i></div>
                  <div class="mb-4">
                    <h5 id = "projectsLabel" class="card-title mb-0">Projects</h5>
                  </div>
                  <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">
                      <h2 id ="no_of_projects" class="d-flex align-items-center mb-0">
                        0
                      </h2>
                    </div>
                    <div class="col-4 text-right">
                      <a href = "projects" style="color:#FFFFFFFF;">More</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"></div>
                  <div class="mb-4">
                    <h5 id = "tasksLabel" class="card-title mb-0">Tasks</h5>
                  </div>
                  <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">
                      <h2 id = "no_of_tasks" class="d-flex align-items-center mb-0">
                        0
                      </h2>
                    </div>
                    <div class="col-4 text-right">
                      <a href = "tasks" style="color:#FFFFFFFF;">More</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"></div>
                  <div class="mb-4">
                    <h5 id = "subtasksLabe" class="card-title mb-0">Sub Tasks</h5>
                  </div>
                  <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">
                      <h2 id = "no_of_subtasks" class="d-flex align-items-center mb-0">
                        0
                      </h2>
                    </div>
                    <div class="col-4 text-right">
                      <a href = "sub-task" style="color:#FFFFFFFF;">More</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"></div>
                  <div class="mb-4">
                    <h5 id = "usersLabel" class="card-title mb-0">Users</h5>
                  </div>
                  <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">
                      <h2 id = "no_of_users" class="d-flex align-items-center mb-0">
                        0
                      </h2>
                    </div>
                    <div class="col-4 text-right">
                      <a href = "users" style="color:#FFFFFFFF;">More</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
		   <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <div class="card">
                <div class="card-header">
                  <h4>Calendar</h4>
                </div>
                <div class="card-body">
					<div id="calendar" style="width: 100%"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
              <div class="card">
                <div class="card-header">
                  <h4 id = "home_p">Project List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive" id="proTeamScroll">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
              <div class="card">
                <div class="card-header">
                  <h4 id = "home_t">Project Team</h4>
                </div>
                <div class="card-body">
                  <div class="media-list position-relative">
                    <div class="table-responsive" id="project-team-scroll">

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--div class="row">
            <div class="col-12 col-sm-12 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Employee Throughput</h4>
                </div>
                <div class="card-body">
                  <div id="schart1"></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Employee Throughput</h4>
                </div>
                <div class="card-body">
                  <div id="schart2"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-6 ">
              <div class="card">
                <div class="card-header">
                  <h4>Project Budget</h4>
                </div>
                <div class="card-body">
                  <div id="barChart"></div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-6 ">
              <div class="card">
                <div class="card-header">
                  <h4>Project Hours </h4>
                </div>
                <div class="card-body">
                  <div id="lineChart"></div>
                </div>
              </div>
            </div>
          </div-->
        </section>

<?php include 'slider.php';?>
<?php include 'footer.php';?>
<script src="assets/js/page/index.js"></script>
<script src="assets/fullcalendar/fullcalendar.min.js"></script>
<script>
     if (!sessionStorage.getItem("loggedin")){
        logger("Kick out");
        window.location = 'index';
    }
  </script>