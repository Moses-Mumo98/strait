<?php include 'header.php';?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
              <h4 id = "b_header" class="page-title m-b-0">Projects</h4>
            </li>
            <li class="breadcrumb-item">
              <a href="home">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item"><a id = "b_link" href="branches">Projects</a></li>
          </ul>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 id = "projectsHead">Projects</h4>
                    <div class="card-header-action">
                      <button id = "addBranch" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="" ><i data-feather="file-plus"></i><span id = "add_b"> Add New Project</span></button>
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
        </section>
       
        <?php include 'slider.php';?>
        <?php include 'footer.php';?>