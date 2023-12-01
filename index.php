<!-- index.php -->
<?php
include('php/index.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Z3ro D4y: A secure and user-friendly platform for online money transactions. Create your profile today and experience seamless financial transactions at your fingertips.">

  <title>Z3ro D4y</title>

  <link rel="icon" href="assets/img/favicon.png">
  <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">

  <link rel="preconnect" href="https://fonts.gstatic.com">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/vendor/boxicons/css/boxicons.min.css">
  <link rel="stylesheet" href="assets/vendor/quill/quill.snow.css">
  <link rel="stylesheet" href="assets/vendor/quill/quill.bubble.css">
  <link rel="stylesheet" href="assets/vendor/remixicon/remixicon.css">
  <link rel="stylesheet" href="assets/vendor/simple-datatables/style.css">


  <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="error">
        <span class="d-none d-lg-block">Z3ro D4y</span>
      </a>

      <i class="bi bi-list toggle-sidebar-btn"></i>

    </div>

    <nav class="header-nav ms-auto">

      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">

          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>

        </li>

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

            <img src="img/profile.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['Client_name']; ?></span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

            <li class="dropdown-header">
              <h6><?php echo $_SESSION['Client_name']; ?></h6>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <span>My Profile</span>
              </a>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="php/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log out</span>
              </a>
            </li>

          </ul>

        </li>

      </ul>

    </nav>

  </header>

<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

<li class="nav-item">
    <a class="nav-link " href="index.php">
    <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li>

 

  <li class="nav-item">
   

    <a class="nav-link collapsed" href="users-profile.php">
    <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
   

  </li>
  <li class="nav-item">
   

    <a class="nav-link collapsed" href="transaction.php">
      <i class="bi bi-currency-dollar"></i>
      <span>Transaction</span>
    </a>
   

  </li>
  
  <li class="nav-item">
  <a class="nav-link collapsed" href="transaction-history.php">
    <i class="bi bi-clock-history"></i>
      <span>Transaction History</span>
    </a>
  </li>
</ul>

</aside>

  <main id="main" class="main">

    <div class="pagetitle">

      <h1>Dashboard</h1>

      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>

    </div>

    <section class="section dashboard">

      <div class="row">

        <div class="col-lg-8">

          <div class="row">

            <div class="col-xxl-4 col-md-6">

              <div class="card info-card revenue-card">

                <div class="filter">
                </div>

                <div class="card-body">

                  <h5 class="card-title">
                    Balance <span>| Current</span>
                  </h5>

                  <div class="d-flex align-items-center">

                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>

                    <div class="ps-3">
                      <h6 id="balance"><?php echo $_SESSION['Balance']; ?></h6>
                    </div>

                  </div>

                </div>

              </div>

            </div>

            <div class="col-12">

              <div class="card">

                <div class="card-body">

                  <h5 class="card-title">Reports <span>/Today</span></h5>

                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {

                      new ApexCharts(document.querySelector("#reportsChart"), {

                        series: [{
                          name: 'Sales',
                          data: [31, 40, 28, 51, 42, 82, 56],
                        }, {
                          name: 'Revenue',
                          data: [11, 32, 45, 32, 34, 52, 41]
                        }, {
                          name: 'Customers',
                          data: [15, 11, 32, 18, 9, 24, 11]
                        }],

                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },

                        markers: {
                          size: 4
                        },

                        colors: ['#4154f1', '#2eca6a', '#ff771d'],

                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },

                        dataLabels: {
                          enabled: false
                        },

                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },

                        xaxis: {
                          type: 'datetime',
                          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },

                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }

                      }).render();

                    });
                  </script>

                </div>

              </div>

            </div>

            <div class="col-12">

              <div class="card recent-sales overflow-auto">

                <div class="filter">

                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>

                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>

                  </ul>

                </div>

              </div>

            </div>

            <div class="col-12">

              <div class="card top-selling overflow-auto">

                <div class="filter">

                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>

                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>

                  </ul>

                </div>

              </div>

            </div>

          </div>

        </div>

        <div class="col-lg-4">

          <div class="card">

            <div class="filter">

              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>

              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>

              </ul>

            </div>

            <div class="card-body">

              <h5 class="card-title">Recent Activity <span>| Today</span></h5>

              <div class="activity">

                <div class="activity-item d-flex">

                  <div class="activite-label">32 min</div>

                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>

                  <div class="activity-content">
                    Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                  </div>

                </div>

                <div class="activity-item d-flex">

                  <div class="activite-label">56 min</div>

                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>

                  <div class="activity-content">
                    Voluptatem blanditiis blanditiis eveniet
                  </div>

                </div>

                <div class="activity-item d-flex">

                  <div class="activite-label">2 hrs</div>

                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>

                  <div class="activity-content">
                    Voluptates corrupti molestias voluptatem
                  </div>

                </div>

                <div class="activity-item d-flex">

                  <div class="activite-label">1 day</div>

                  <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>

                  <div class="activity-content">
                    Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                  </div>

                </div>

                <div class="activity-item d-flex">

                  <div class="activite-label">2 days</div>

                  <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>

                  <div class="activity-content">
                    Est sit eum reiciendis exercitationem
                  </div>

                </div>

                <div class="activity-item d-flex">

                  <div class="activite-label">4 weeks</div>

                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>

                  <div class="activity-content">
                    Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                  </div>

                </div>

              </div>

            </div>

          </div>

          <div class="card">

            <div class="filter">

              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>

              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>

              </ul>

            </div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {

                var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({

                  legend: {
                    data: ['Allocated Budget', 'Actual Spending']
                  },

                  radar: {
                    indicator: [{
                        name: 'Sales',
                        max: 6500
                      },
                      {
                        name: 'Administration',
                        max: 16000
                      },
                      {
                        name: 'Information Technology',
                        max: 30000
                      },
                      {
                        name: 'Customer Support',
                        max: 38000
                      },
                      {
                        name: 'Development',
                        max: 52000
                      },
                      {
                        name: 'Marketing',
                        max: 25000
                      }
                    ]
                  },

                  series: [{
                    name: 'Budget vs spending',
                    type: 'radar',
                    data: [{
                        value: [4200, 3000, 20000, 35000, 50000, 18000],
                        name: 'Allocated Budget'
                      },
                      {
                        value: [5000, 14000, 28000, 26000, 42000, 21000],
                        name: 'Actual Spending'
                      }
                    ]
                  }]

                });

              });
            </script>

          </div>

        </div>

        <script>
          document.addEventListener("DOMContentLoaded", () => {

            echarts.init(document.querySelector("#trafficChart")).setOption({

              tooltip: {
                trigger: 'item'
              },

              legend: {
                top: '5%',
                left: 'center'
              },

              series: [{

                name: 'Access From',
                type: 'pie',

                radius: ['40%', '70%'],

                avoidLabelOverlap: false,

                label: {
                  show: false,
                  position: 'center'
                },

                emphasis: {
                  label: {
                    show: true,
                    fontSize: '18',
                    fontWeight: 'bold'
                  }
                },

                labelLine: {
                  show: false
                },

                data: [{
                    value: 1048,
                    name: 'Search Engine'
                  },
                  {
                    value: 735,
                    name: 'Direct'
                  },
                  {
                    value: 580,
                    name: 'Email'
                  },
                  {
                    value: 484,
                    name: 'Union Ads'
                  },
                  {
                    value: 300,
                    name: 'Video Ads'
                  }
                ]

              }]

            });

          });
        </script>

      </div>

    </section>

  </main>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="assets/vendor/chart.js/chart.umd.js"></script>

  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <script src="assets/vendor/quill/quill.min.js"></script>

  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>

  <script src="assets/vendor/tinymce/tinymce.min.js"></script>

  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="assets/js/main.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      setInterval(function() {
        $.get('php/get-updates.php', function(data) {
          // Split the response into an array of strings
          var dataArray = data.split('//get-updates.php');

          // Select the first element of the array (which should be the balance)
          var balance = dataArray[1];
          if ($('#balance').text() != balance) {
            $('#balance').text(balance);
          }
        });
      }, 1000);
    });
  </script>

</body>

</html>
