<?php include 'header.php';?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
              <h4 id = "page_title" class="page-title m-b-0">Add Hours</h4>
            </li>
            <li class="breadcrumb-item">
              <a href="home">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item"><a id = "timer_link" href="timer">Task Timer</a></li>
          </ul>
          <div class="section-body">
            <div class="row">
            <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4 id = 'project-edit-title'>Start Working</h4>
                <h4 id="confrimed" style="color:red; display:none;"></h4>
              </div>
              <div class="card-body">
                  <div class="row">
                        <div class="form-group col-4">
                          <label id = "projectlabel">Project Name</label>
                          <select id = "project-name" name = "project-name" class="form-control select2" onchange="getAllTasks()"></select>
                        </div>
                        
                        <div class="form-group col-4">
                            <label id = "tasklabel">Task Name</label>
                            <select id = "task-name" name = "task-name" class="form-control select2" onchange="listSubTasks()"></select>
                        </div>

                        <div class="form-group col-4">
                            <label id = "subtasklabel">Sub Task Name</label>
                            <select id = "sub-name" name = "sub-name" class="form-control select2"></select>
                        </div>
                
                        <div style="margin:0px auto">
                            <canvas id="canvas-timer" width="400" height="400"></canvas>
                            <div id="timer-plugin" style="display: none"></div>
                        </div>

                        <div  id = "myslider" class="slidecontainer">
                                <input type="range" min="0" max="100" value="0" class="slider" id="myRange">
                                <p>Progress: <span id="demo"></span></p>
                            </div>

                        <div class="btn-group" style="width:100%">
                            <input type="hidden" id="hidden_hours" name="hidden_hours" value="0">
                            <button style="width:30%" id = "btn_timer_reset" class="btn btn-danger">Reset</button>
                            <button style="width:30%" id = "btn_timer_playStop" class="btn btn-success">Start</button>
                            <button style="width:30%" id = "btn_timer_submit" class="btn btn-info"><i id = 'timersaverIcon' class="fa fa-spinner"></i> Finish</button>
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
    <script src="assets/js/page/timer.js"></script>
    <script>
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value+" %";
    
    slider.oninput = function() {
      output.innerHTML = this.value+" %";
    }
</script>

