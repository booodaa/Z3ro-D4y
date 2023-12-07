<!-- register.php -->
<?php
include('php/register.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Z3ro D4y Register</title>
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

  <style>
    #passwordChecklist {
      list-style-type: none;
    }

    .checklist-item i {
      width: 1em;
      height: 1em;
    }

    .checklist-item .valid-icon {
      color: green;
    }

    .checklist-item .invalid-icon {
      color: red;
    }
  </style>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const passwordInput = document.getElementById("yourPassword");
      const passwordFeedback = document.getElementById("passwordFeedback");
      const checklist = document.getElementById("passwordChecklist");
      const checklistItems = checklist.getElementsByClassName("checklist-item");

      passwordInput.addEventListener("input", function() {
        const password = passwordInput.value;
        const isValid = validatePassword(password);

        if (!isValid) {
          passwordFeedback.textContent = "Password must contain at least 8 characters, including uppercase, lowercase, digit, and special character.";
          passwordInput.classList.add("is-invalid");
        } else {
          passwordFeedback.textContent = "";
          passwordInput.classList.remove("is-invalid");
        }

        updateChecklist(password);
      });

      function validatePassword(password) {
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        return passwordRegex.test(password);
      }

      function updateChecklist(password) {
        const conditions = [
          /[a-z]/, // Lowercase letter
          /[A-Z]/, // Uppercase letter
          /\d/, // Digit
          /[@$!%*?&]/ // Special character
        ];

        for (let i = 0; i < conditions.length; i++) {
          const icon = checklistItems[i].getElementsByTagName("i")[0];
          if (conditions[i].test(password)) {
            icon.classList.remove("bi-x-circle-fill", "invalid-icon");
            icon.classList.add("bi-check-circle-fill", "valid-icon");
          } else {
            icon.classList.remove("bi-check-circle-fill", "valid-icon");
            icon.classList.add("bi-x-circle-fill", "invalid-icon");
          }
        }
      }
    });
  </script>


</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span>Z3ro D4y</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate action="register.php" method="post">
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required placeholder="Enter your name">
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" placeholder="Enter your email" required>
                      <div class="invalid-feedback">Please enter a valid Email address!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="yourUsername" placeholder="Enter a username" required>
                        <div class="invalid-feedback">Please choose a username.</div>
                      </div>

                    </div>

                    <body>

                      <body>

                        <!-- ... (body content) ... -->
                        <div class="col-12">
                          <label for="yourPassword" class="form-label">Password</label>
                          <div class="input-group has-validation">
                            <div class="input-group">
                              <input type="password" name="password" class="form-control" id="yourPassword" placeholder="Enter a strong password" required>
                              <div class="input-group-append">
                                <label class="btn btn-outline-secondary d-flex align-items-center justify-content-center" style="--bs-btn-border-color: transparent; width: 35px; height: 100%; padding: 0; border-radius: 0;">
                                  <input type="checkbox" onclick="showPassword();" style="display: none;">
                                  <img id="showPasswordButton" src="/website/img/icons8-show-20.png" alt="Show Password" style="max-width: 100%; max-height: 100%;">
                                </label>
                              </div>
                            </div>
                            <div id="passwordFeedback" class="invalid-feedback"></div>
                          </div>
                        </div>

                        <!-- Password checklist -->
                        <div>
                          <ul id="passwordChecklist">
                            <li class="checklist-item"><i class="bi-x-circle-fill invalid-icon"></i> At least one lowercase letter</li>
                            <li class="checklist-item"><i class="bi-x-circle-fill invalid-icon"></i> At least one uppercase letter</li>
                            <li class="checklist-item"><i class="bi-x-circle-fill invalid-icon"></i> At least one digit</li>
                            <li class="checklist-item"><i class="bi-x-circle-fill invalid-icon"></i> At least one special character</li>
                          </ul>
                        </div>

                        <div class="col-12">
                          <div class="form-check">
                            <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                            <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                            <div class="invalid-feedback">You must agree before submitting.</div>
                          </div>
                        </div>
                        <div class="col-12">
                          <button class="btn btn-primary w-100" type="submit">Create Account</button>
                        </div>
                        <div class="col-12">
                          <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
                        </div>
                  </form>

                </div>
              </div>



            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <script>
    function showPassword() {
      var passwordInput = document.getElementById("yourPassword");
      var showPasswordButton = document.getElementById("showPasswordButton");
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        showPasswordButton.src = "/website/img/icons8-hide-20.png";
      } else {
        passwordInput.type = "password";
        showPasswordButton.src = "/website/img/icons8-show-20.png";
      }
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