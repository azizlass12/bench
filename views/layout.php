<?php
session_start();

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <title>
        <?php
        // echo ucfirst(str_replace('.php', '', basename($_SERVER['PHP_SELF'])));
?>
    </title>
    <link rel="stylesheet" href="../public/css/style.css" />
    <link rel="shortcut icon" href="../public/images/favicon.ico" />

    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>

    <div class="sidebar hidden-print">
        <div class="logo-details">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    d="M9.858 27.123c.49.639 1.106.876 1.962.876h1.184A1.996 1.996 0 0 0 15 26.005v-.009A1.996 1.996 0 0 0 13.004 24h-1.307A1.998 1.998 0 0 1 9.7 22.003h0c0-1.106.896-2.002 2.002-2.002h1.178c.856 0 1.47.237 1.961.876M16.45 20h5.3m-2.65 8v-8m6.75 8a2.65 2.65 0 0 1-2.65-2.65v-2.7a2.65 2.65 0 1 1 5.3 0v2.7A2.65 2.65 0 0 1 25.85 28Zm9.4-2.683v.033a2.65 2.65 0 1 1-5.3 0v-2.7A2.65 2.65 0 0 1 32.6 20h0a2.65 2.65 0 0 1 2.65 2.65v.033M36.7 20v8m4.3 0l-3.29-4L41 20.027M37.706 24H36.7" />
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    d="M20.613 29.402c-1.547 3.692-5.203 6.223-9.703 6.223h-5.5v-23.5h5.5c4.5 0 8.156 2.531 9.703 6.223m5.657 11.296c-1.26 5.911-5.535 11.481-12.21 11.481H5.31m.25-34.25h8.5c6.738 0 11.085 5.32 12.29 11.48" />
            </svg> -->
            <img style="    width: 55px;
    background: #ffffff;
    

    background: #ffffff;
    margin: 0 15px 0 15px;

    border-radius: 56px;" src="../public/images/sv1.png" alt="">
            <span class="logo_name">StockVision</span>
            
        </div>
      
        <ul class="nav-links">
            <li>
                <a href="dashboard.php"
                    class="
                    <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?> "
                    >
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                    
                </a>
            </li>
            <li>
                <a href="article.php"
                    class="<?php echo basename($_SERVER['PHP_SELF']) == 'med.php' ? 'active' : ''; ?> ">
                    <i class="bx bx-box"></i>
                    <span class="links_name">MÉDECINS</span>
                </a>
            </li>
            <li>
                <a href="vente.php"
                    class="<?php echo basename($_SERVER['PHP_SELF']) == 'patient.php' ? 'active' : ''; ?> ">
                    <i class='bx bx-shopping-bag'></i>
                    <span class="links_name">PATIENTS</span>
                </a>
            </li>
           




        </ul>
    </div>
    <section class="home-section">
        <nav class="hidden-print">
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
                <span class="dashboard">
                    <?php
            echo ucfirst(str_replace('.php', '', basename($_SERVER['PHP_SELF'])));
?>
 
                </span>
                <?php
        if (!empty($_SESSION['messageL']['text'])) {
            $messageText = $_SESSION['messageL']['text'];
            $messageType = $_SESSION['messageL']['type'];

            // Clear the session message after retrieving its values
            unset($_SESSION['messageL']);
            ?>
          <div id="alertBox" class="alert <?php echo $messageType; ?>">
            <?php echo $messageText; ?>
          </div>

          <script>
            setTimeout(function () {
              var alertBox = document.getElementById('alertBox');
              alertBox.style.opacity = '0';
              alertBox.style.transition = "opacity 1s";

              setTimeout(function () {
                // alertBox.style.display = 'none';
              }, 1000); // 1000 milliseconds = 1 second (fade out duration)
            }, 1000); // 3000 milliseconds = 3 seconds
          </script>
          <?php
        }
?>
            </div>


            


         

            <span class="links_name"></span>


            <div class="profile-details">
                <!--<img src="images/profile.jpg" alt="">-->
                <span class="admin_name">
                    
aziz                </span>
                <i style="cursor: pointer;" class="bx bx-chevron-down" id="chevron-icon"></i>
                <ul style="text-decoration:none;" class="profile-options" id="profile-options">
                    <li class="log_out">
                        <a style="text-decoration: none;" href="../auth/logout.php">
                            <i class="bx bx-log-out"></i>
                            <span class="links_name">Déconnexion</span>
                        </a>
                    </li>






                    
                    <!-- <li>
                        <?php echo $_SESSION['user_id']; ?>
                    </li> -->

                    <!-- Add more list items as needed -->
                </ul>
                <style>
                    .profile-options {
                        display: none;
                        position: absolute;
                        background-color: #ffffff;
                        list-style: none;
                        padding: 10px;
                        border: 1px solid #ccc;
                        margin: 137px 5px 0 0;

                        border-radius: 5px;
                        z-index: 999;
                    }

                    .profile-options li {
                        margin-bottom: 5px;
                    }
                </style>
                <script>
                    document.getElementById('chevron-icon').addEventListener('click', function () {
                        var profileOptions = document.getElementById('profile-options');
                        if (profileOptions.style.display === 'none') {
                            profileOptions.style.display = 'block';
                        } else {
                            profileOptions.style.display = 'none';
                        }
                    });
                </script>
            </div>

        </nav>












        <script>
            let sidebar = document.querySelector(".sidebar");
            let sidebarBtn = document.querySelector(".sidebarBtn");
            sidebarBtn.onclick = function () {
                sidebar.classList.toggle("active");
                if (sidebar.classList.contains("active")) {
                    sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
                } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            };
        </script>




        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</body>

</html>