<?php include 'header.php';?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
              <h4 class="page-title m-b-0">Dashboard</h4>
            </li>
            <li class="breadcrumb-item">
              <a href="index.html">
                <i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ul>
          <div class="row ">
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"></i></div>
                  <div class="mb-4">
                    <h5 id = "projectsLabel" class="card-title mb-0">Projects</h5>
                  </div>
                  <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">
                      <h2 id ="no_of_projects" class="d-flex align-items-center mb-0">
                        0
                      </h2>
                    </div>
                    <div class="col-4 text-right">
                      <a href = "projects" style="color:#FFFFFFFF;">More</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"></div>
                  <div class="mb-4">
                    <h5 id = "tasksLabel" class="card-title mb-0">Tasks</h5>
                  </div>
                  <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">
                      <h2 id = "no_of_tasks" class="d-flex align-items-center mb-0">
                        0
                      </h2>
                    </div>
                    <div class="col-4 text-right">
                      <a href = "tasks" style="color:#FFFFFFFF;">More</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"></div>
                  <div class="mb-4">
                    <h5 id = "subtasksLabel" class="card-title mb-0">Sub Tasks</h5>
                  </div>
                  <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">
                      <h2 id = "no_of_subtasks" class="d-flex align-items-center mb-0">
                        0
                      </h2>
                    </div>
                    <div class="col-4 text-right">
                      <a href = "sub-task" style="color:#FFFFFFFF;">More</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                  <div class="card-icon card-icon-large"></div>
                  <div class="mb-4">
                    <h5 id = "usersLabel" class="card-title mb-0">Users</h5>
                  </div>
                  <div class="row align-items-center mb-2 d-flex">
                    <div class="col-8">
                      <h2 id = "no_of_users" class="d-flex align-items-center mb-0">
                        0
                      </h2>
                    </div>
                    <div class="col-4 text-right">
                      <a href = "users" style="color:#FFFFFFFF;">More</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
              <div class="card">
                <div class="card-header">
                  <h4 id = "home_p">Project List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive" id="proTeamScroll">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
              <div class="card">
                <div class="card-header">
                  <h4 id = "home_t">Project Team</h4>
                </div>
                <div class="card-body">
                  <div class="media-list position-relative">
                    <div class="table-responsive" id="project-team-scroll">

                    <table class="table table-hover table-xl mb-0"> <thead><tr><th>Project Name</th><th>Staff</th><th>Minutes</th></tr></thead><tbody><td class='text-truncate'>Project AB2</td><td class="text-truncate"><ul class="list-unstyled order-list m-b-0">undefined<li class="team-member team-member-sm"><figure class="avatar mr-2 avatar-sm bg-success text-white" data-initial="AM"></figure>"></li></ul></td><td class="text-truncate">$8999</td></tr></tbody></table>
                      <table class="table table-hover table-xl mb-0">
                        <thead>
                          <tr>
                            <th>Project Name</th>
                            <th>Employees</th>
                            <th>Cost</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="text-truncate">Project X</td>
                            <td class="text-truncate">
                              <ul class="list-unstyled order-list m-b-0">
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-8.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Wildan Ahdian"></li>
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-9.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="John Deo"></li>
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-10.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Sarah Smith"></li>
                                <li class="avatar avatar-sm"><span class="badge badge-primary">+3</span></li>
                              </ul>
                            </td>
                            <td class="text-truncate">$8999</td>
                          </tr>
                          <tr>
                            <td class="text-truncate">Project AB2</td>
                            <td class="text-truncate">
                              <ul class="list-unstyled order-list m-b-0">
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-1.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Wildan Ahdian"></li>
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-3.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="John Deo"></li>
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-2.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Sarah Smith"></li>
                                <li class="avatar avatar-sm"><span class="badge badge-primary">+1</span></li>
                              </ul>
                            </td>
                            <td class="text-truncate">$5550</td>
                          </tr>
                          <tr>
                            <td class="text-truncate">Project DS3</td>
                            <td class="text-truncate">
                              <ul class="list-unstyled order-list m-b-0">
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-5.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Wildan Ahdian"></li>
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-9.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Sarah Smith"></li>
                                <li class="avatar avatar-sm"><span class="badge badge-primary">+4</span></li>
                              </ul>
                            </td>
                            <td class="text-truncate">$9000</td>
                          </tr>
                          <tr>
                            <td class="text-truncate">Project XCD</td>
                            <td class="text-truncate">
                              <ul class="list-unstyled order-list m-b-0">
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-8.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Wildan Ahdian"></li>
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-3.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="John Deo"></li>
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-5.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Sarah Smith"></li>
                                <li class="avatar avatar-sm"><span class="badge badge-primary">+2</span></li>
                              </ul>
                            </td>
                            <td class="text-truncate">$7500</td>
                          </tr>
                          <tr>
                            <td class="text-truncate">Project Z2</td>
                            <td class="text-truncate">
                              <ul class="list-unstyled order-list m-b-0">
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-8.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Wildan Ahdian"></li>
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-10.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Sarah Smith"></li>
                                <li class="avatar avatar-sm"><span class="badge badge-primary">+3</span></li>
                              </ul>
                            </td>
                            <td class="text-truncate">$8500</td>
                          </tr>
                          <tr>
                            <td class="text-truncate">Project GTe</td>
                            <td class="text-truncate">
                              <ul class="list-unstyled order-list m-b-0">
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-3.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Wildan Ahdian"></li>
                                <li class="team-member team-member-sm"><img class="rounded-circle"
                                    src="assets/img/users/user-5.png" alt="user" data-toggle="tooltip" title=""
                                    data-original-title="Sarah Smith"></li>
                                <li class="avatar avatar-sm"><span class="badge badge-primary">+3</span></li>
                              </ul>
                            </td>
                            <td class="text-truncate">$8500</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-sm-12 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Chart</h4>
                </div>
                <div class="card-body">
                  <div id="schart1"></div>
                  <div class="row">
                    <div class="col-4">
                      <p class="text-muted font-15 text-truncate">Target</p>
                      <h5>
                        <i class="fas fa-arrow-circle-up col-green m-r-5"></i>$15.3k
                      </h5>
                    </div>
                    <div class="col-4">
                      <p class="text-muted font-15 text-truncate">Last
                        week</p>
                      <h5>
                        <i class="fas fa-arrow-circle-down col-red m-r-5"></i>$2.8k
                      </h5>
                    </div>
                    <div class="col-4">
                      <p class="text-muted text-truncate">Last
                        Month</p>
                      <h5>
                        <i class="fas fa-arrow-circle-up col-green m-r-5"></i>$12.5k
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Chart</h4>
                </div>
                <div class="card-body">
                  <div id="schart2"></div>
                  <div class="row">
                    <div class="col-4">
                      <p class="text-muted font-15 text-truncate">Target</p>
                      <h5>
                        <i class="fas fa-arrow-circle-up col-green m-r-5"></i>$15.3k
                      </h5>
                    </div>
                    <div class="col-4">
                      <p class="text-muted font-15 text-truncate">Last
                        week</p>
                      <h5>
                        <i class="fas fa-arrow-circle-down col-red m-r-5"></i>$2.8k
                      </h5>
                    </div>
                    <div class="col-4">
                      <p class="text-muted text-truncate">Last
                        Month</p>
                      <h5>
                        <i class="fas fa-arrow-circle-up col-green m-r-5"></i>$12.5k
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-6 ">
              <div class="card">
                <div class="card-header">
                  <h4>Revenue Chart</h4>
                </div>
                <div class="card-body">
                  <div id="barChart"></div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-6 ">
              <div class="card">
                <div class="card-header">
                  <h4>User Visit </h4>
                </div>
                <div class="card-body">
                  <div id="lineChart"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-sm-12 col-lg-8">
              <div class="card">
                <div class="card-header">
                  <h4>Visitors By Countries</h4>
                </div>
                <div class="card-body">
                  <div class="row ">
                    <div class="col-12 col-sm-12 col-lg-8">
                      <div id="visitorMap"></div>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-4">
                      <div class="row m-b-15">
                        <div class="col-9">India</div>
                        <div class="col-3 text-right">28%</div>
                        <div class="col-12">
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-success" data-width="28%"></div>
                          </div>
                        </div>
                      </div>
                      <div class="row m-b-15">
                        <div class="col-9"> Canada</div>
                        <div class="col-3 text-right">21%</div>
                        <div class="col-12">
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-orange" data-width="21%"></div>
                          </div>
                        </div>
                      </div>
                      <div class="row m-b-15">
                        <div class="col-9"> Australia</div>
                        <div class="col-3 text-right">33%</div>
                        <div class="col-12">
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-purple" data-width="33%"></div>
                          </div>
                        </div>
                      </div>
                      <div class="row m-b-15">
                        <div class="col-9">Egypt</div>
                        <div class="col-3 text-right">42%</div>
                        <div class="col-12">
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-amber" data-width="42%"></div>
                          </div>
                        </div>
                      </div>
                      <div class="row m-b-15">
                        <div class="col-9">Thailand</div>
                        <div class="col-3 text-right">56%</div>
                        <div class="col-12">
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-cyan" data-width="56%"></div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-9">Panama</div>
                        <div class="col-3 text-right">39%</div>
                        <div class="col-12">
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-pink" data-width="39%"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
              <div class="card gradient-bottom">
                <div class="card-header">
                  <h4>Top 5 Products</h4>
                  <div class="card-header-action dropdown">
                    <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Month</a>
                    <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                      <li class="dropdown-title">Select Period</li>
                      <li><a href="#" class="dropdown-item">Today</a></li>
                      <li><a href="#" class="dropdown-item">Week</a></li>
                      <li><a href="#" class="dropdown-item active">Month</a></li>
                      <li><a href="#" class="dropdown-item">This Year</a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body" id="top-5-scroll">
                  <ul class="list-unstyled list-unstyled-border">
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="assets/img/products/product-3.png" alt="product">
                      <div class="media-body">
                        <div class="float-right">
                          <div class="font-weight-600 text-muted text-small">112 Sales</div>
                        </div>
                        <div class="media-title">Mobile</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="61%"></div>
                            <div class="budget-price-label">$24,897</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="38%"></div>
                            <div class="budget-price-label">$18,865</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="assets/img/products/product-4.png" alt="product">
                      <div class="media-body">
                        <div class="float-right">
                          <div class="font-weight-600 text-muted text-small">49 Sales</div>
                        </div>
                        <div class="media-title">Laptop</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="78%"></div>
                            <div class="budget-price-label">$74,568</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="55%"></div>
                            <div class="budget-price-label">$65,892</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="assets/img/products/product-1.png" alt="product">
                      <div class="media-body">
                        <div class="float-right">
                          <div class="font-weight-600 text-muted text-small">63 Sales</div>
                        </div>
                        <div class="media-title">Headphone</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="38%"></div>
                            <div class="budget-price-label">$2,859</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="25%"></div>
                            <div class="budget-price-label">$1,872</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="assets/img/products/product-2.png" alt="product">
                      <div class="media-body">
                        <div class="float-right">
                          <div class="font-weight-600 text-muted text-small">28 Sales</div>
                        </div>
                        <div class="media-title">Tablet</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="48%"></div>
                            <div class="budget-price-label">$11,238</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="33%"></div>
                            <div class="budget-price-label">$7,564</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="assets/img/products/product-5.png" alt="product">
                      <div class="media-body">
                        <div class="float-right">
                          <div class="font-weight-600 text-muted text-small">19 Sales</div>
                        </div>
                        <div class="media-title">Camera</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="91%"></div>
                            <div class="budget-price-label">$7,285</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="74%"></div>
                            <div class="budget-price-label">$5,147</div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="card-footer pt-3 d-flex justify-content-center">
                  <div class="budget-price justify-content-center">
                    <div class="budget-price-square bg-primary" data-width="20"></div>
                    <div class="budget-price-label">Selling Price</div>
                  </div>
                  <div class="budget-price justify-content-center">
                    <div class="budget-price-square bg-danger" data-width="20"></div>
                    <div class="budget-price-label">Product Cost</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

<?php include 'slider.php';?>
<?php include 'footer.php';?>
<script src="assets/js/page/index.js"></script>
