<?php include 'header.php';?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
              <h4 id = "title_users" class="page-title m-b-0">Documents</h4>
            </li>
            <li class="breadcrumb-item">
              <a href="home">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item"><a id = "link_users" href="users">Documents</a></li>
          </ul>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 id = "usersHead">Documents</h4>
                    <div class="card-header-action">
                      <button id = "adddoc" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="right"title=""><i data-feather="user-plus"></i>Add New <span id = "user_a_labe">Document</span></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive" id = "users-table">

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
       <!-- JS Libraies -->
 <!-- Page Specific JS File -->
 <!-- Template JS File -->
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script src="assets/js/scripts.js"></script>
 <!-- Custom JS File -->
 <script src="assets/js/custom.js"></script>
 <script src="assets/js/language/lang.js"></script>
 
 
        <?php include 'slider.php';?>
        <?php include 'footer.php';?>