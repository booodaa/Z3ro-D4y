<!-- index.php -->
<?php
include('php/index.php');
include('php/transactionHistory.php');
include('php/login.php');


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

<body style="display: none">

  <script>
    // Check the $_SESSION['dark_mode'] value when the page loads
    document.addEventListener('DOMContentLoaded', (event) => {
      const darkMode = <?php echo $_SESSION['dark_mode']; ?>;
      if (darkMode == 1) {
        // Trigger the change event on the darkModeSwitch checkbox

        document.getElementById('darkModeSwitch').checked = true;
        document.getElementById('darkModeSwitch').dispatchEvent(new Event('change'));
      }
      document.body.style.display = "";
    });
  </script>

  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="error">
        <span>Z3ro D4y</span>

      </a>

      <i class="bi bi-list toggle-sidebar-btn"></i>
      <!-- Dark Mode Switch -->

      <div class="form-check form-switch ms-3">
        <input class="form-check-input" type="checkbox" id="darkModeSwitch" data-bs-toggle="toggle" <?php echo $_SESSION['dark_mode'] ? 'checked' : ''; ?>>
        <label class="form-check-label" for="darkModeSwitch">Dark Mode</label>

      </div>

    </div>

    <nav class="header-nav ms-auto">

      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">

          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>

        </li>

        <li class="nav-item dropdown pe-3">

          <div class="d-flex align-items-center">


            <!-- Notification Dropdown -->
            <div class="dropdown">
              <a class="nav-link position-relative" href="#" role="button" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="margin-right: 20px;">
                <i class="bi bi-bell" style="font-size: 1.5rem;"></i> <!-- Increase the size of the bell icon -->

                <?php
                $unseenCount = 0; // Initialize the counter
                foreach ($transactions as $transaction) {
                  // Check if the transaction is for the current user and is unseen
                  if ($transaction['Receiver_ID'] == $_SESSION['User_ID'] && !$transaction['seen']) {
                    $unseenCount++; // Increment the unseen count
                  }
                }

                ?>
                <?php if ($unseenCount > 0) : ?>
                  <span class="badge bg-danger rounded-pill" style="position: absolute; top: -10px; right: -10px; padding: 2px 6px; font-size: 0.75rem; transform: scale(0.8);">
                    <?php echo $unseenCount; ?>
                  </span>
                <?php endif; ?>

              </a>


              <ul class="dropdown-menu" aria-labelledby="notificationDropdown">
                <?php $count = 0; ?>
                <?php foreach ($transactions as $transaction) : ?>
                  <?php if ($transaction['Receiver_ID'] == $_SESSION['User_ID'] && $transaction['seen'] == 0 && $count < 5) : ?>
                    <li><a class="dropdown-item text-success" href="#">
                        Amount: <?php echo $transaction['Amount']; ?>,
                        Receiver ID: <?php echo $transaction['Receiver_ID']; ?>
                      </a></li>
                    <?php $count++; ?>
                  <?php endif; ?>
                <?php endforeach; ?>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="transaction-history.php">View All Transactions</a></li>
              </ul>
            </div>
            <!-- Profile Dropdown -->
            <div class="dropdown">
              <a class="nav-link nav-profile d-flex align-items-center pe-0 dropdown-toggle" href="#" role="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="img/profile.png" alt="Profile" class="rounded-circle">
                <span class="d-none d-md-block ps-2"><?php echo $_SESSION['Client_name']; ?></span>
              </a>

              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                  <h6>Your ID: <?php echo $_SESSION['User_ID']; ?></h6>
                </li>

                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                    <i class="bi bi-person"></i>
                    <span>My Profile</span>
                  </a>
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
            </div>
          </div>

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
      <li class="nav-heading"></li>

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>


      <li class="nav-item ">
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



    </div>

    <section class="section dashboard">

      <div class="row">

        <div class="col-lg-8">

          <div class="row">

            <div class="col-xxl-4 col-md-6">

              <div class="card info-card revenue-card" id="balanceCard">
                <div class="card-body">
                  <h5 class="card-title">
                    Balance <span>| Current</span>
                  </h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6 id="displayBalance"></h6>
                    </div>
                  </div>
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
    // Function to format the raw balance with commas
    function formatWithCommas(number) {
      return number.toLocaleString('en-US');
    }

    var currentRawBalance = <?php echo json_encode($_SESSION['Balance']); ?>; // Get the initial raw balance from PHP
    var formattedBalance = "<?php echo formatNumber($_SESSION['Balance']); ?>"; // Get the initial formatted balance from PHP
    var displayFormatted = true; // Initial state to display formatted balance

    // Set the initial display balance
    $('#displayBalance').text(formattedBalance);

    // Add click event listener to the card
    $('#balanceCard').on('click', function() {
      // Toggle the display format
      displayFormatted = !displayFormatted;

      // Update the display balance based on the toggle state
      if (displayFormatted) {
        $('#displayBalance').text(formattedBalance);
      } else {
        $('#displayBalance').text(formatWithCommas(currentRawBalance));
      }
    });

    setInterval(function() {
      $.get('php/get-updates.php', function(data) {
        var dataArray = data.split('\n');
        var newFormattedBalance = dataArray[0]; // The formatted balance from the server
        var newRawBalance = parseFloat(dataArray[1]); // The new raw balance as a numerical value

        // If new data from the server is received and it's different from the current raw balance
        if (!isNaN(newRawBalance) && currentRawBalance !== newRawBalance) {
          // Update the currentRawBalance and formattedBalance with the new values
          currentRawBalance = newRawBalance;
          formattedBalance = newFormattedBalance;

          // Update the display balance based on the current display format
          if (displayFormatted) {
            $('#displayBalance').text(formattedBalance);
          } else {
            $('#displayBalance').text(formatWithCommas(currentRawBalance));
          }
        }
      });
    }, 1000);
  });
</script>




  <script>
    // Enable Bootstrap Toggle functionality
    $(function() {
      $('[data-bs-toggle="toggle"]').bootstrapToggle();
    });

    document.getElementById('darkModeSwitch').addEventListener('change', function() {
      const darkMode = this.checked ? 1 : 0;
      fetch('php/toggleDarkMode.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'darkMode=' + darkMode,
      });
      if (this.checked) {
        // Apply dark mode styles
        document.documentElement.style.setProperty('--bg-color', 'black');
        document.documentElement.style.setProperty('--text-color', 'white');

        // Add dark mode styles
        var style = document.createElement('style');
        style.innerHTML = `
          .sidebar{
              background-color: #111111;
          }
          .sidebar-nav .nav-link.collapsed{
              background-color: #111111;
              color: white;
          }
          .sidebar-nav .nav-link{
              background-color: #303030;
              color: white;
          }
          .sidebar-nav .nav-link i{
              color: #8086b0;
          }
          .header{
              background-color: #111111;
          }
          .logo span{
              color: white;
          }
          .header .toggle-sidebar-btn{
              color: white;
          }
          .header-nav .nav-profile{
              color: white;
          }
          .card{
              --bs-card-bg: #1f1f1f;
              color: white;
          }
          .card-title{
              color: white;
          }
          .card-title span{
              color: white;
          }
          .dashboard .info-card h6{
              color: white;
          }
          body{
              background-color: #222;
          }
          .pagetitle h1{
              color: white;
          }
          .dropdown-menu{
              --bs-dropdown-bg: #1f1f1f;
          }
          .dropdown-item{
              color: white;
          }
          .header-nav .profile .dropdown-header h6{
              color: white;
          }
          .nav-tabs-bordered .nav-link.active{
              background-color: #303030;
              color: #ffffff;
          }
          .profile .profile-card h2{
              color: white;
          }
          .profile .profile-overview .card-title{
              color: white;
          }
          .profile .profile-overview .label{
              color: white;
          }
          .nav-tabs-bordered .nav-link{
              color: white;
          }
          .profile .profile-edit label{
              color: white;
          }
          .form-check-label {
              color: white;
          }

          #notificationDropdown {
          color: white; /* Set text color to white */
        }

        #notificationDropdown .bi-bell {
          color: white; /* Set bell icon color to white */
        }

        #notificationDropdown .badge.bg-danger {
          background-color: #dc3545; /* Set badge background color to red */
          color: white; /* Set badge text color to white */
        }

          
      `;
        document.head.appendChild(style);
      } else {
        // Remove dark mode styles
        var styles = document.querySelectorAll('style');
        styles.forEach(function(style) {
          if (style.innerHTML.includes('background-color: #111111;')) {
            document.head.removeChild(style);
          }
        });

        // Reset colors
        document.documentElement.style.setProperty('--bg-color', 'white');
        document.documentElement.style.setProperty('--text-color', 'black');
      }
    });

    // Check the $_SESSION['dark_mode'] value when the page loads
    document.addEventListener('DOMContentLoaded', (event) => {
      const darkMode = <?php echo $_SESSION['dark_mode']; ?>;
      if (darkMode == 1) {
        // Trigger the change event on the darkModeSwitch checkbox
        document.getElementById('darkModeSwitch').checked = true;
        document.getElementById('darkModeSwitch').dispatchEvent(new Event('change'));
      }
    });
  </script>


</body>

</html>