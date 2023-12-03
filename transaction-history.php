<!-- index.php -->
<?php
include('php/index.php');
include('php/transactionHistory.php');

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
                        <span class="d-lg-block balance-text" style="margin-right: 20px; font-weight: bold;">Your Balance: <?php echo $_SESSION['Balance']; ?> $</span>

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

        <table id="transactionTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Transaction ID</th>
                    <th>Amount</th>
                    <th>Sender ID</th> <!-- Add this line -->
                    <th>Receiver ID</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($transactions) && is_array($transactions)) : ?>
                    <?php foreach ($transactions as $transaction) : ?>
                        <?php $isIncome = $transaction['Receiver_ID'] == $_SESSION['User_ID']; ?>
                        <tr class="<?php echo $isIncome ? 'table-success' : 'table-danger'; ?>">
                            <td><?php echo date('Y/m/d h:i:s A', strtotime($transaction['Transaction_Date'])); ?></td>
                            <td><?php echo $transaction['Transaction_ID']; ?></td>
                            <td><?php echo ($isIncome ? '+' : '-') . $transaction['Amount']; ?></td>
                            <td><?php echo $transaction['Sender_ID']; ?></td> <!-- Add this line -->
                            <td><?php echo $isIncome ? 'to you' : $transaction['Receiver_ID']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5">No transactions found for this user.</td>
                    </tr>
                <?php endif; ?>
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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#transactionTable').DataTable({
                "order": [
                    [0, "desc"]
                ], // Sort by the 1st column (Date) in descending order
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ] // Entries in the length drop-down menu
            });
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