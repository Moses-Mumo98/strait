<?php include 'header.php';?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
              <h4 id = "p_title" class="page-title m-b-0">Client Account Statements</h4>
            </li>
            <li class="breadcrumb-item">
              <a href="home">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="accounts">Client Accounts</a></li>
            <li class="breadcrumb-item"><a href="account-statement">Client Account Statements</a></li>
          </ul>
		   <div class="section-body">
      <div class="row">
         <div class="col-12">
            <div class="card">
			   <div class="card-header">
                  <h4 id = "prorataHead">Search</h4>
               </div>
               <div class="card-body">
                  <div class="row">
					<div class="col-md-3">
                    <select  id = "company-user" name = "company-user" class="form-control select2"></select>
                 </div>
                     <div class="col-md-3">  
                        <input type="text" name="p_from" id="p_from" class="form-control datepicker" placeholder="From Date" />  
                     </div>
                     <div class="col-md-3">  
                        <input type="text" name="p_to" id="p_to" class="form-control datepicker" placeholder="To Date" />  
                     </div>
                     <div class="col-md-3">  
                        <input type="button" name="t_filter" id="t_filter" value="View" class="btn btn-warning" />  
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
	  
	  <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h4 id = "statementHead">Account Statement</h4>
               </div>
               <div class="card-body">
                  <div class="card-body">
                     <div class="table-responsive" id = "statement-table">
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

