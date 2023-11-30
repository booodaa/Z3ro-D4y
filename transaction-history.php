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
            <li class="nav-heading"></li>

            <li class="nav-item">
            <a class="nav-link collapsed" href="index.php">
    <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
            </li>

            <li class="nav-heading">Pages</li>

            <li class="nav-item " >
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
                <a class="nav-link" href="transaction-history.php">
                    <i class="bi bi-clock-history"></i>
                    <span>Transaction History</span>
                </a>
            </li>
        </ul>
    </aside>

    <main id="main" class="main">

        <div class="pagetitle">

            <h1>Transaction History</h1>

        </div>

       <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>ID</th>
                    <th>Amount</th>
                  

                </tr>
            </thead>
            <tbody>
                <tr class="table-success">
                    <td>2023-03-10</td>
                    <td>Salary</td>
                    <td>5000</td>
                    <td>5000</td>
                </tr>
                <tr class="table-danger">
                    <td>2023-03-15</td>
                    <td>Groceries</td>
                    <td>-150</td>
                    <td>5000</td>
                </tr>
                <tr class="table-danger">
                    <td>2023-03-20</td>
                    <td>Rent</td>
                    <td>-1200</td>
                    <td>5000</td>
                </tr>
                <tr class="table-success">
                    <td>2023-03-25</td>
                    <td>Bonus</td>
                    <td>1000</td>
                    <td>5000</td>
                </tr>
                <tr class="table-danger">
                    <td>2023-03-30</td>
                    <td>Gas</td>
                    <td>-50</td>
                    <td>5000</td>
                </tr>
            </tbody>
        </table>


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

</body>

</html>
