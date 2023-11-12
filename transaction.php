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
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Z3ro D4y Transaction</span>
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
  <!-- Confirmation Modal -->
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

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

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
