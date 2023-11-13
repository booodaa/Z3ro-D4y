<?php
session_start();

if (!isset($_SESSION['Clint_name']) || empty($_SESSION['Clint_name'])) {
 
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Z3ro D4y Users</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

 
</head>

<body>

 
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Z3ro D4y</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

   

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

      

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            
          </ul>

        </li>

        <li class="nav-item dropdown">

        

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            

          </ul>

        </li>
        <li class="nav-item dropdown">



          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
             
            </li>
          

           
            <li>
              <hr class="dropdown-divider">
            </li>

           
            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
          </ul> 
        </li>          
         <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="img/profile.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['Clint_name']; ?></span>
          </a>             <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['Clint_name']; ?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="Admin_users_profile.php">
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="Admin_users_profile.php">
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
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
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
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
        <a class="nav-link " href="Admin_users_profile.php">
          <i class="bi bi-person"></i>
          <span>Users</span>
        </a>
        <a class="nav-link collapsed" href="Admin_transaction.php">
          <img src="img/transaction.png" alt="image load error" width="20" height="25">
          <span>Transaction</span>
        </a>
      </li><!-- End Profile Page Nav -->
    </ul>
  </aside><!-- End Sidebar-->
  <main id="main" class="main">
    <div class="pagetitle">
    </div>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Users</h5>            
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
                    <td> <button class="transparent-button">no</button></td>
                    <td> <button class="transparent-button">1254</button></td>
                    <td> <button class="transparent-button">sadd@sada</button></td>
                    <td> <button class="transparent-button">3/10/2020</button></td>
                 </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td> <button class="transparent-button">no</button></td>
                    <td> <button class="transparent-button">1254</button></td>
                    <td> <button class="transparent-button">sadd@sada</button></td>
                    <td> <button class="transparent-button">3/10/2020</button></td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td> <button class="transparent-button">no</button></td>
                    <td> <button class="transparent-button">1254</button></td>
                    <td> <button class="transparent-button">sadd@sada</button></td>
                    <td> <button class="transparent-button">3/10/2020</button></td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td> <button class="transparent-button">no</button></td>
                    <td> <button class="transparent-button">1254</button></td>
                    <td> <button class="transparent-button">sadd@sada</button></td>
                    <td> <button class="transparent-button">3/10/2020</button></td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td> <button class="transparent-button">no</button></td>
                    <td> <button class="transparent-button">1254</button></td>
                    <td> <button class="transparent-button">sadd@sada</button></td>
                    <td> <button class="transparent-button">3/10/2020</button></td>
                  </tr>
                  <tr>
                    <th scope="row">6</th>
                    <td> <button class="transparent-button">no</button></td>
                    <td> <button class="transparent-button">1254</button></td>
                    <td> <button class="transparent-button">sadd@sada</button></td>
                    <td> <button class="transparent-button">3/10/2020</button></td>
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td> <button class="transparent-button">no</button></td>
                    <td> <button class="transparent-button">1254</button></td>
                    <td> <button class="transparent-button">sadd@sada</button></td>
                    <td> <button class="transparent-button">3/10/2020</button></td>
                  </tr>
                  <tr>
                    <th scope="row">8</th>
                    <td> <button class="transparent-button">no</button></td>
                    <td> <button class="transparent-button">1254</button></td>
                    <td> <button class="transparent-button">sadd@sada</button></td>
                    <td> <button class="transparent-button">3/10/2020</button></td>
                  </tr>
                  <tr>
                    <th scope="row">9</th>
                    <td> <button class="transparent-button">no</button></td>
                    <td> <button class="transparent-button">1254</button></td>
                    <td> <button class="transparent-button">sadd@sada</button></td>
                    <td> <button class="transparent-button">3/10/2020</button></td>
                  </tr>
                </tbody>
              </table>
              </div>
          </div>
        </div>
      </div>
    </section>
  </main>
   <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Z3ro D4y</span></strong>. All Rights Reserved
    </div>
    
  </footer>

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
