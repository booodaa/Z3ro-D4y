<?php
session_start();
include("database.php");
if (!isset($_SESSION['Clint_name'])) {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Z3ro D4y Transaction</title>
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
  <main>
    <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
          <a class="nav-link " href="index.php">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">

          <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="charts-chartjs.php">
                <i class="bi bi-circle"></i><span>Chart.js</span>
              </a>
            </li>
            <li>
              <a href="charts-apexcharts.php">
                <i class="bi bi-circle"></i><span>ApexCharts</span>
              </a>
            </li>
            <li>
              <a href="charts-echarts.php">
                <i class="bi bi-circle"></i><span>ECharts</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-heading">Pages</li>

        <li class="nav-item">

          <a class="nav-link " href="users-profile.php">
            <i class="bi bi-person"></i>
            <span>Profile</span>
          </a>
          <a class="nav-link collapsed" href="transaction.php">
            <img src="img/transaction.png" alt="image load error" width="20" height="25">
            <span>Transaction</span>
          </a>
        </li>
      </ul>

    </aside>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">

                  <span class="d-none d-lg-block">Z3ro D4y Transaction</span>
                  <header id="header" class="header fixed-top d-flex align-items-center">

                    <div class="d-flex align-items-center justify-content-between">
                      <a href="index.php" class="logo d-flex align-items-center">
                        <img src="assets/img/logo.png" alt="error">
                        <span class="d-none d-lg-block">Z3ro D4y</span>
                      </a>
                      <i class="bi bi-list toggle-sidebar-btn"></i>
                    </div>
                    <div class="search-bar">
                      <form class="search-form d-flex align-items-center" method="POST" action="#">
                      </form>
                    </div>
                    <nav class="header-nav ms-auto">
                      <ul class="d-flex align-items-center">

                        <li class="nav-item d-block d-lg-none">
                          <a class="nav-link nav-icon search-bar-toggle " href="#">
                            <i class="bi bi-search"></i>
                          </a>
                        </li>
                        <li class="nav-item dropdown">



                          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                            <li class="dropdown-header">
                              You have 4 new notifications
                              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                            </li>
                            <li>
                              <hr class="dropdown-divider">
                            </li>

                            <li class="notification-item">
                              <i class="bi bi-exclamation-circle text-warning"></i>
                              <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                              </div>
                            </li>

                            <li>
                              <hr class="dropdown-divider">
                            </li>

                            <li class="notification-item">
                              <i class="bi bi-x-circle text-danger"></i>
                              <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                              </div>
                            </li>

                            <li>
                              <hr class="dropdown-divider">
                            </li>

                            <li class="notification-item">
                              <i class="bi bi-check-circle text-success"></i>
                              <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                              </div>
                            </li>

                            <li>
                              <hr class="dropdown-divider">
                            </li>

                            <li class="notification-item">
                              <i class="bi bi-info-circle text-primary"></i>
                              <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                              </div>
                            </li>

                            <li>
                              <hr class="dropdown-divider">
                            </li>
                            <li class="dropdown-footer">
                              <a href="#">Show all notifications</a>
                            </li>

                          </ul>
                        </li>
                        <li class="nav-item dropdown">



                          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                            <li class="dropdown-header">
                              You have 3 new messages
                              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                            </li>
                            <li>
                              <hr class="dropdown-divider">
                            </li>

                            <li class="message-item">
                              <a href="#">
                                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                                <div>
                                  <h4>Maria Hudson</h4>
                                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                  <p>4 hrs. ago</p>
                                </div>
                              </a>
                            </li>
                            <li>
                              <hr class="dropdown-divider">
                            </li>

                            <li class="message-item">
                              <a href="#">
                                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                <div>
                                  <h4>Anna Nelson</h4>
                                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                  <p>6 hrs. ago</p>
                                </div>
                              </a>
                            </li>
                            <li>
                              <hr class="dropdown-divider">
                            </li>

                            <li class="message-item">
                              <a href="#">
                                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                                <div>
                                  <h4>David Muldon</h4>
                                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                  <p>8 hrs. ago</p>
                                </div>
                              </a>
                            </li>
                            <li>
                              <hr class="dropdown-divider">
                            </li>

                            <li class="dropdown-footer">
                              <a href="#">Show all messages</a>
                            </li>

                          </ul>
                        </li>
                        <li class="nav-item dropdown pe-3">

                          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

                            <img src="img/profile.png" alt="Profile" class="rounded-circle">
                            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['Clint_name']; ?></span>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                              <h6><?php echo $_SESSION['Clint_name']; ?></h6>

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
                </a>
              </div>
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Transfer Money</h5>
                    <p class="text-center small">Enter Data to Transfer</p>
                  </div>
                  <form class="row g-3 needs-validation" novalidate action="process_transfer.php" method="post" id="transferForm">
                    <div class="col-12">
                      <label for="recipId" class="form-label">ID</label>
                      <div class="input-group has-validation">
                        <input type="number" name="recipient_id" class="form-control" id="recipId" required>
                        <div class="invalid-feedback">Please enter ID of the recipient</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="amount" class="form-label">Amount</label>
                      <input type="number" name="amount" class="form-control" id="amount" required>
                      <div class="invalid-feedback">Please enter an Amount</div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="button" onclick="showConfirmationPopup()">Transfer</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
  <div class="modal" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmationModalLabel">Confirm Transfer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p id="errorMessage" class="text-danger"></p>
          <p>Recipient ID: <span id="recipientIdModal"></span></p>
          <p>Amount: $<span id="transferAmountModal"></span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" onclick="submitTransferForm()">Confirm</button>
        </div>
      </div>
    </div>
  </div>


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
  <script>
    function validateInputFields() {
      var isValid = true;

      var recipientId = document.getElementById("recipId").value;
      var amount = document.getElementById("amount").value;

      if (recipientId.trim() === "" || isNaN(recipientId)) {
        document.getElementById("recipId").classList.add("is-invalid");
        isValid = false;

      } else {
        document.getElementById("recipId").classList.remove("is-invalid");
      }
      if (amount.trim() === "" || isNaN(amount) || parseFloat(amount) <= 0) {
        document.getElementById("amount").classList.add("is-invalid");
        isValid = false;

      } else {
        document.getElementById("amount").classList.remove("is-invalid");
      }
      return isValid;
    }

    function showConfirmationPopup() {
      if (!validateInputFields()) {

        return;
      }


      var recipientId = document.getElementById("recipId").value;
      var amount = document.getElementById("amount").value;

      document.getElementById("recipientIdModal").innerText = recipientId;
      document.getElementById("transferAmountModal").innerText = amount;
      $('#confirmationModal').modal('show');

    }

    function submitTransferForm() {
      if (!validateInputFields()) {
        return;
      }

      document.getElementById("transferForm").submit();
    }
  </script>


</body>

</html>
