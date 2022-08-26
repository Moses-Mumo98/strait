<?php include 'header.php';?>
<!-- Main Content -->
<div class="main-content">
<section class="section">
    <ul class="breadcrumb breadcrumb-style ">
        <li class="breadcrumb-item">
            <h4 id = "page_title" class="page-title m-b-0">Staff Throughput</h4>
        </li>
        <li class="breadcrumb-item">
            <a href="home">
            <i data-feather="home"></i></a>
        </li>
        <li class="breadcrumb-item"><a id = "link_throughput" href="throughput">Staff Throughput</a></li>
    </ul>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Filter</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-4">
                                <label>FROM</label>
                                <input name = "startDate" type="text" class="form-control datepicker" onchange="getStaffThroughPut()">
                            </div>
                            <div class="form-group col-4">
                                <label>TO</label>
                                <input name = "endDate" type="text" class="form-control datepicker" onchange="getStaffThroughPut()">
                            </div>
                            <div class="form-group col-4">
                                <label>STAFF</label>
                                <select  id = "company-users" name = "company-users" class="form-control select2" onchange="getStaffThroughPut()"></select>
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
                    <h4 id = "logsHead">Staff Throughput</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive" id = "logs-table">

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