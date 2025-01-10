<?php
session_start();
include("authentications.php");

// if (isset($_SESSION["AdminLogged"]))
//     header("location:admin/index.php");


// if (isset($_SESSION["StaffLogged"]))
//     header("location:staff/index.php");


if (isset($_POST["btnAdminLogin"])) {
    $LoginProcess = new Authentications();
    $_SESSION["UserType"] = "ADMIN";
    $LoginProcess->username = $_POST["txtAdminUsername"];
    $LoginProcess->password = $_POST["txtAdminPassword"];
    $LoginProcess->type = $_SESSION["UserType"];
    $LoginProcess->Login();
}

if (isset($_POST["btnStaffLogin"])) {

    $LoginProcess = new Authentications();
    $_SESSION["UserType"] = "STAFF";
    $LoginProcess->username = $_POST["txtStaffUsername"];
    $LoginProcess->password = $_POST["txtStaffPassword"];
    $LoginProcess->type = $_SESSION["UserType"];
    $LoginProcess->Login();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logins</title>
    <link rel="stylesheet" href="css/background.css" />
    <link rel="stylesheet" href="css/form.css" />
    <link rel="stylesheet" href="css/formOverlay.css" />

</head>

<body class="body">
    <div class="ocean">
        <div class="wave"></div>
        <div class="wave"></div>
    </div>

    <section>
        <div class="container" id="container">
            <div class="form-container admin-container">
                <form method="post">
                    <h1>Staff Login</h1>
                    <div class="social-container"></div>
                    <label>
                        <input type="text" name="txtStaffUsername" placeholder="Enter Username Or Email" />
                    </label>
                    <label>
                        <input type="password" name="txtStaffPassword" placeholder="Enter Password" />
                    </label>
                    <a href="#">Forgot your password?</a>
                    <button name="btnStaffLogin" type="submit">Login</button>
                </form>
            </div>
            <div class="form-container staff-container">
                <form method="post">
                    <h1>Admin Login</h1>
                    <div class="social-container"></div>
                    <label>
                        <input type="text" name="txtAdminUsername" placeholder="Enter Username Or Email" />
                    </label>
                    <label>
                        <input type="password" name="txtAdminPassword" placeholder="Enter Password" />
                    </label>
                    <a href="#">Forgot your password?</a>
                    <button name="btnAdminLogin" type="submit">Login</button>
                </form>
            </div>


            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Staff Login</h1>
                        <p>Login in as Staff User</p>
                        <button class="ghost" id="adminSwap">Swap</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Admin Login</h1>
                        <p>Login in as Administrator User</p>
                        <button class="ghost mt-5" id="staffSwap">Swap</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js'></script> -->
    <script src="js/overlayPanel.js"></script>
</body>

</html>