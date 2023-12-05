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
        <span class="d-none d-lg-block">Z3ro D4y</span>
      </a>

      <i class="bi bi-list toggle-sidebar-btn"></i>
      <!-- Dark Mode Switch -->
      <div class="form-check form-switch ms-3">
        <input class="form-check-input" type="checkbox" id="darkModeSwitch" data-bs-toggle="toggle">
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
            <span class="d-lg-block balance-text" style="margin-right: 20px; font-weight: bold;">
              Your Balance: <?php echo number_format($_SESSION['Balance'], 2, '.', ','); ?> $
            </span>
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

  <main>

    <aside id="sidebar" class="sidebar">
      <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading"></li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="index.php">
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
                        <input type="number" name="recipient_id" class="form-control" id="recipId" required placeholder="Enter recipient ID">
                      </div>
                      <div id="recipIdError" class="invalid-feedback"></div>
                    </div>

                    <div class="col-12">
                      <label for="amount" class="form-label">Amount</label>
                      <input type="number" name="amount" class="form-control" id="amount" required placeholder="Enter amount">
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
          <p>Recipient Name: <span id="recipientNameModal"></span></p>

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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



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