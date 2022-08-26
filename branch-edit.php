<?php include 'header.php';?>
<!-- Main Content -->
<style>
 
  
</style>
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
        <li class="breadcrumb-item"><a id = "b_add_link" href="branch-edit">Add/Edit Project</a></li>
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
                                <label id = "l_pname" for="p_name">Project Name</label>
                                <input id="p_name" type="text" class="form-control" name="p_name" autofocus>
                            </div>
                            <div class="form-group">
                                <label id = "l_pdesc" for="p_desc">Project Description</label>
                                <input id="p_desc" type="text" class="form-control" name="p_desc">
                            </div>
                            <div class="wrap">

                            <div class="center">
  
 
  
  <h2>Status</h2>
  <input type="radio" name="rb" id="status_desc" />
  <label for="rb1">Open</label>
  <input type="radio" name="rb" id="status_desc" />
  <label for="rb2">Closed</label>
  
  

</div>
	</div>
                            <div class="form-group">
                                <button id = "branchSaver" type="submit" class="btn btn-primary btn-lg btn-block"><i id = 'branchsaverIcon' class="fa fa-spinner"></i>Submit</button>
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