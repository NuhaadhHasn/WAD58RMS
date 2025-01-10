<?php
session_start();
include("../authentications.php");

if (isset($_SESSION["CustomerLogged"]))
    header("location:index.php");
if (isset($_SESSION["btnCustomerLogOut"]))
    header("location:index.php");


if (isset($_POST["btnRegister"])) {
    // echo "<script>alert('Register')</script>";
    $LoginProcess = new Authentications();
    $_SESSION["UserType"] = "CUSTOMER";
    $LoginProcess->fullName = $_POST["txtRegisterFullName"];
    $LoginProcess->username = $_POST["txtRegisterUsername"];
    $LoginProcess->email = $_POST["txtRegisterEmail"];
    $LoginProcess->mobileNumber = $_POST["txtRegisterMobile"];
    $LoginProcess->password = $_POST["txtRegisterPassword"];
    $LoginProcess->type = $_SESSION["UserType"];
    $LoginProcess->displayPicture = "default.png";
    $LoginProcess->Register();
}
if (isset($_POST["btnCustomerLogin"])) {
    $LoginProcess = new Authentications();
    $_SESSION["UserType"] = "CUSTOMER";
    $LoginProcess->username = $_POST["txtCustomerUsername"];
    $LoginProcess->password = $_POST["txtCustomerPassword"];
    $LoginProcess->type = $_SESSION["UserType"];
    $LoginProcess->Login();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Page</title>
    <link rel="stylesheet" href="../css/background.css" />
    <link rel="stylesheet" href="../css/form.css" />
    <link rel="stylesheet" href="../css/formOverlay.css" />
</head>

<body class="body">

    <div class="ocean">
        <div class="wave"></div>
        <div class="wave"></div>
    </div>
    <section>
        <div class="container" id="container">
            <div class="form-container staff-container">
                <form action="#" method="post">
                    <h1>Register</h1>
                    <div class="social-container"></div>
                    <label>
                        <input type="text" name="txtRegisterFullName" required placeholder="Enter Full Name" />
                    </label>
                    <label>
                        <input type="text" name="txtRegisterUsername" required placeholder="Enter Username" />
                    </label>
                    <label>
                        <input type="email" name="txtRegisterEmail" placeholder="Enter Email" />
                    </label>
                    <label>
                        <input type="text" name="txtRegisterMobile" placeholder="Enter Mobile Number" />
                    </label>
                    <label>
                        <input type="password" name="txtRegisterPassword" required placeholder="Enter Password" />
                    </label>
                    <button style="margin-top: 9px" name="btnRegister" type="submit">Sign Up</button>
                </form>
            </div>

            <div class="form-container admin-container">
                <form action="#" method="post">
                    <h1>Login</h1>
                    <div class="social-container"></div>
                    <label>
                        <input type="text" name="txtCustomerUsername" placeholder="Enter Username Or Email" />
                    </label>
                    <label>
                        <input type="password" name="txtCustomerPassword" placeholder="Enter Password" />
                    </label>
                    <a href="#">Forgot your password?</a>
                    <button name="btnCustomerLogin" type="submit">Login</button>
                </form>
            </div>

            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Login</h1>
                        <p>Log in here if you already have an account </p>
                        <button class="ghost mt-5" id="adminSwap">Log In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Create, Account!</h1>
                        <p>Sign up if you still don't have an account ... </p>
                        <button class="ghost" id="staffSwap">Register</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js'></script> -->
    <script src="../js/overlayPanel.js"></script>
</body>

</html>