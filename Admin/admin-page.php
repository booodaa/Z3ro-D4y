<?php
include('php/transaction.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Z3ro D4y</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
<style>/* Add some basic styling for the button */
  .transparent-button {
    background-color: transparent;
    border: 2px solid #ffffff; /* Set the border color */
    color: #000; /* Set the text color */
    /* Adjust padding as needed */
    cursor: pointer;
    transition: background-color 0.3s ease; /* Add a smooth transition effect */
    
  }

  /* Change button background color on hover */
  .transparent-button:hover {
    background-color: #ffffff; /* Set the hover background color */
    color: #000000; /* Set the hover text color */
  }</style>
  
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="users.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Z3ro D4y</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown">
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
          </ul>
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

  
  <main id="main" class="main">

    

 

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Users</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Join Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td><button class="transparent-button">no</button></td>
                    <td><button class="transparent-button">2020</button></td>
                    <td><button class="transparent-button">Aftgdfg@dfhg</button></td>
                    <td><button class="transparent-button">2019-05-25</button></td>
                  </tr>
                  <tr>
                  <th scope="row">2</th>
                    <td><button class="transparent-button">yes</button></td>
                    <td><button class="transparent-button">2044</button></td>
                    <td><button class="transparent-button">dftgdfg@dfhg</button></td>
                    <td><button class="transparent-button">2016-05-25</button></td>
                  </tr>
                  <tr>
                  <th scope="row">3</th>
                    <td><button class="transparent-button">no</button></td>
                    <td><button class="transparent-button">2044</button></td>
                    <td><button class="transparent-button">dftgdfg@dfhg</button></td>
                    <td><button class="transparent-button">2016-05-25</button></td>
                  </tr>
                  <tr>
                  <th scope="row">4</th>
                    <td><button class="transparent-button">no</button></td>
                    <td><button class="transparent-button">2044</button></td>
                    <td><button class="transparent-button">dftgdfg@dfhg</button></td>
                    <td><button class="transparent-button">2016-05-25</button></td>
                  </tr>
                  <tr>
                  <th scope="row">5</th>
                    <td><button class="transparent-button">no</button></td>
                    <td><button class="transparent-button">2044</button></td>
                    <td><button class="transparent-button">dftgdfg@dfhg</button></td>
                    <td><button class="transparent-button">2016-05-25</button></td>
                  </tr>
                  <tr>
                  <th scope="row">6</th>
                    <td><button class="transparent-button">no</button></td>
                    <td><button class="transparent-button">2044</button></td>
                    <td><button class="transparent-button">dftgdfg@dfhg</button></td>
                    <td><button class="transparent-button">2016-05-25</button></td>
                  </tr>
                  <tr>
                  <th scope="row">7</th>
                    <td><button class="transparent-button">no</button></td>
                    <td><button class="transparent-button">2044</button></td>
                    <td><button class="transparent-button">dftgdfg@dfhg</button></td>
                    <td><button class="transparent-button">2016-05-25</button></td>
                  </tr>
                  <tr>
                  <th scope="row">8</th>
                    <td><button class="transparent-button">no</button></td>
                    <td><button class="transparent-button">2044</button></td>
                    <td><button class="transparent-button">dftgdfg@dfhg</button></td>
                    <td><button class="transparent-button">2016-05-25</button></td>
                  </tr>
                  <tr>
                  <th scope="row">9</th>
                    <td><button class="transparent-button">no</button></td>
                    <td><button class="transparent-button">2044</button></td>
                    <td><button class="transparent-button">dftgdfg@dfhg</button></td>
                    <td><button class="transparent-button">2016-05-25</button></td>
                   
                  </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Z3ro D4y</span></strong>. All Rights Reserved
    </div>
   
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
