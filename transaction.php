<!-- transaction.php -->
<?php
include('php/transaction.php');
include('php/process_transfer.php');
include('php/transactionHistory.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Z3ro D4y Transaction</title>

  <link rel="icon" href="assets/img/favicon.png">
  <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
  <link rel="preconnect" href="https://fonts.gstatic.com">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i">

  <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/vendor/boxicons/css/boxicons.min.css">
  <link rel="stylesheet" href="assets/vendor/quill/quill.snow.css">
  <link rel="stylesheet" href="assets/vendor/quill/quill.bubble.css">
  <link rel="stylesheet" href="assets/vendor/remixicon/remixicon.css">
  <link rel="stylesheet" href="assets/vendor/simple-datatables/style.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    .card {
      margin: 24px -82px -58px -50px;
      margin-bottom: 30px;
      border: none;
      border-radius: 5px;
      box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);
    }

    .error-message {
      color: #dc3545;
      margin: auto;
      text-align: left;
      display: none;
    }

    .sidebar{
  background-color: #111111;
  box-shadow: 0 5px 30px 0 rgba(82, 63, 105, 0.2);
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
  box-shadow: 0 5px 30px 0 rgb(62 62 62 / 20%);
}
.logo span{
  color: white;
}
.header .toggle-sidebar-btn{
  color: white;
  margin: 16px 37px 18px -135px;
}
.header-nav .nav-profile{
  color: white;
}
.card{
  background-color: #1f1f1f;
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
  background-color: #171717;
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
.text-center small{
color: white;
}
.btn-primary{
  color: #fff;
    background-color: #111111;
    border-color: #56595c;
}
.card-body{
 
  box-shadow: 0 5px 30px 0 rgb(62 62 62 / 20%);
}
.dropdown-menu{
  background-color: #1f1f1f;
}




  </style>

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

          <div class="d-flex align-items-center">
            <!-- Notification Dropdown -->
            <div class="dropdown">
              <a class="nav-link nav-icon dropdown-toggle" href="#" role="button" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-bell-fill"></i> <!-- Notification bell icon -->
              </a>
              <ul class="dropdown-menu" aria-labelledby="notificationDropdown">
                <?php $count = 0; ?>
                <?php foreach ($transactions as $transaction) : ?>
                  <?php if ($transaction['Receiver_ID'] == $_SESSION['User_ID'] && $count < 5) : ?>
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
                  <h6><?php echo $_SESSION['Client_name']; ?></h6>
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

  <main>

    <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
          <a class="nav-link collapsed" href="index.php">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li>

   

        <li class="nav-item">
          <a class="nav-link collapsed" href="users-profile.php">
            <i class="bi bi-person"></i>
            <span>Profile</span>
          </a>
          <a class="nav-link " href="transaction.php">
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

    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">

        <div class="container">

          <div class="d-flex justify-content-center py-4">

            <a href="index.php" class="logo d-flex align-items-center w-auto">
              <img src="assets/img/logo.png" alt="">
              <span class="d-none d-lg-block">Z3ro D4y Transaction</span>
            </a>

          </div>

          <div class="row justify-content-center">

            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Transfer Money</h5>
                    <p class="text-center small">Enter Data to Transfer</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate action="transaction.php" method="post" id="transferForm">
                    <div class="col-12">
                      <label for="recipId" class="form-label">ID</label>
                      <div class="input-group has-validation">
                        <input type="number" name="recipient_id" class="form-control" id="recipId" required>
                      </div>
                      <div id="recipIdError" class="invalid-feedback"></div>
                    </div>

                    <div class="col-12">
                      <label for="amount" class="form-label">Amount</label>
                      <input type="number" name="amount" class="form-control" id="amount" required>
                      <div id="amountError" class="invalid-feedback"></div>
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

  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="assets/js/main.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>

  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="assets/vendor/chart.js/chart.umd.js"></script>

  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <script src="assets/vendor/quill/quill.min.js"></script>

  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>

  <script src="assets/vendor/tinymce/tinymce.min.js"></script>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <script>
    document.getElementById("recipId").addEventListener("input", validateRecipientId);
    document.getElementById("amount").addEventListener("input", validateAmount);

    function validateRecipientId() {
      const recipientId = document.getElementById("recipId");
      const recipientIdError = document.getElementById("recipIdError");

      // Clear previous error message and error class
      recipientIdError.innerText = "";
      recipientId.classList.remove("is-invalid");

      if (!recipientId.value) {
        recipientIdError.innerText = "Recipient ID cannot be empty";
        recipientId.classList.add("is-invalid");
        return false;
      }

      // Use Number() function to convert input to a number
      const recipientIdNum = Number(recipientId.value);

      // Check if the number is valid, positive, and finite
      if (isNaN(recipientIdNum) || recipientIdNum <= 0 || !isFinite(recipientIdNum)) {
        recipientIdError.innerText = "Please enter a valid positive recipient ID";
        recipientId.classList.add("is-invalid");
        return false;
      }

      return true;
    }

    function validateAmount() {
      const amount = document.getElementById("amount");
      const amountError = document.getElementById("amountError");

      // Clear previous error message and error class
      amountError.innerText = "";
      amount.classList.remove("is-invalid");

      if (!amount.value) {
        amountError.innerText = "Amount cannot be empty";
        amount.classList.add("is-invalid");
        return false;
      }

      // Use Number() function to convert input to a number
      const amountNum = Number(amount.value);

      // Check if the number is valid, positive, and finite
      if (isNaN(amountNum) || amountNum <= 0 || !isFinite(amountNum)) {
        amountError.innerText = "Please enter a valid amount";
        amount.classList.add("is-invalid");
        return false;
      }

      return true;
    }


    function showConfirmationPopup() {
      if (!validateAmount() || !validateRecipientId()) {
        return;
      }

      var recipientId = document.getElementById("recipId").value;
      var amount = document.getElementById("amount").value;

      document.getElementById("recipientIdModal").innerText = recipientId;
      document.getElementById("transferAmountModal").innerText = amount;

      $('#confirmationModal').modal('show');
    }

    function submitTransferForm() {

      document.getElementById("transferForm").submit();
    }
  </script>

  <!--start of  modal -->
  <div class="modal fade" id="popUpModal" tabindex="-1" aria-labelledby="popUpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="popUpModalLabel">Error</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modalBody">
          <!-- modal body -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!--end of  modal -->
</body>

</html>
