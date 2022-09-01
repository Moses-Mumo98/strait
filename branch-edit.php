<?php include 'header.php';?>
<!-- Main Content -->
<style>
    .select-dropdown,
.select-dropdown * {
	margin: 0;
	padding: 0;
	position: relative;
	box-sizing: border-box;
}
.select-dropdown {
	position: relative;
	background-color: #E6E6E6;
	border-radius: 4px;
   
}
.select-dropdown select {
	font-size: 1rem;
	font-weight: normal;
	max-width: 100%;
	padding: 8px 24px 8px 10px;
	border: none;
	background-color: transparent;
		-webkit-appearance: none;
		-moz-appearance: none;
	appearance: none;
    width:100%;
    height:100%
}
.select-dropdown select:active, .select-dropdown select:focus {
	outline: none;
	box-shadow: none;
}
.select-dropdown:after {
	content: "";
	position: absolute;
	top: 50%;
	right: 8px;
	width: 0;
	height: 0;
	margin-top: -2px;
	border-top: 5px solid #aaa;
	border-right: 5px solid transparent;
	border-left: 5px solid transparent;
}
.open{
    width:100%;
    height:100%
}
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
                            <div>
                                <!-- <select id="status_dropdown">
                                    <option>Open</option>
                                    <option>Close</option>

                                </select> -->
                                <label>Firm Branch Status</label>
                                <div class="select-dropdown">
                              
	<select id="status_dropdown">
		<option value="Open" class="open">Open</option>
		<option value="Closed">Closed</option>

	</select>
</div>
                            </div>
</br>
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