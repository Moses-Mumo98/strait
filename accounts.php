<?php include 'header.php';?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
              <h4 id = "p_header" class="page-title m-b-0">Client Accounts</h4>
            </li>
            <li class="breadcrumb-item">
              <a href="home">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item"><a id = "p_link" href="accounts">Client Accounts</a></li>
          </ul>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 id = "projectsHead">Client Accounts</h4>
                    <div class="card-header-action">
                      <button id = "addAccount" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="" ><i data-feather="file-plus"></i><span id = "add_p">Add Client Account</span></button>
					  <button id = "accTopup" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="right"title=""><i data-feather="dollar-sign"></i>Topup Account</button>
					  <button id = "accStatement" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="right"title=""><i data-feather="activity"></i>Transaction History</button>
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