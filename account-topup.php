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
            <li class="breadcrumb-item"><a href="accounts">Client Accounts</a></li>
            <li class="breadcrumb-item"><a href="account-topup">Top Up Client Account</a></li>
          </ul>
          <div class="section-body">
            <div class="row">
            <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4 id = 'project-edit-title'>Top Up Client Account</h4>
                <h4 id="confrimed" style="color:red; display:none;"></h4>
              </div>
              <div class="card-body">
				  <div class="form-group">
                    <label>Client Name</label>
                    <select  id = "company-user" name = "company-user" class="form-control select2"></select>
                 </div>
                   <div class="form-group">
                       <label for="acc_bal">Account Balance</label>
                        <input id="acc_bal" type="text" class="form-control" name="acc_bal" disabled>
                    </div>
					  <div class="form-group">
                       <label for="t_amount">Topup Amount</label>
                        <input id="t_amount" type="number" value = "0" class="form-control" name="t_amount" autofocus>
                    </div>
				 <div class="form-group">
                    <label>Payment Method</label>
                    <select  id = "payment-method" name = "payment-method" class="form-control select2"></select>
                 </div>
				  <div class="form-group">
                       <label for="trans_ref">Trans Reference</label>
                        <input id="trans_ref" type="text" class="form-control" name="trans_ref">
                    </div>
                  <div class="form-group">
                    <button id = "topSaver" type="submit" class="btn btn-primary btn-lg btn-block"><i id = 'topsaverIcon' class="fa fa-spinner"></i>
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

