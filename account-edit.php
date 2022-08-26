<?php include 'header.php';?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
              <h4 id = "p_title" class="page-title m-b-0">Client Accounts</h4>
            </li>
            <li class="breadcrumb-item">
              <a href="home">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item"><a id = "p_link" href="accounts">Client Accounts</a></li>
            <li class="breadcrumb-item"><a id = "p_a_link"  href="account-edit">Add/Edit Client Accounts</a></li>
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
				  <div class="form-group">
                    <label>Client Name</label>
                    <select  id = "company-users" name = "company-users" class="form-control select2"></select>
                 </div>
                   <div class="form-group">
                       <label for="acc_bal">Account Balance</label>
                        <input id="acc_bal" type="number" value = "0" class="form-control" name="acc_bal" autofocus>
                    </div>
                  <div class="form-group">
                    <button id = "accSaver" type="submit" class="btn btn-primary btn-lg btn-block"><i id = 'accsaverIcon' class="fa fa-spinner"></i>
                      Save
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

