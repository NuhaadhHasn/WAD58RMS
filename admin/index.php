<?php
session_start();
include("../admin/food.php");
$food = new Food();

if (!isset($_SESSION["AdminLogged"]))
    header("location:../login.php");

if (isset($_POST["btnAdminLogOut"])) {
    unset($_SESSION["AdminLogged"]);
    header("location:../login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- <link rel="stylesheet" href="../css/all.min.css"> -->
    <link rel="stylesheet" href="../css/background.css" />
    <!-- <link rel="stylesheet" href="../css/form.css" /> -->
    <link rel="stylesheet" href="../css/navBar.css" />
    <link rel="stylesheet" href="../css/content.css" />

</head>

<body>
    <?php include('navBar.php') ?>
    <div class="ocean">
        <div class="wave"></div>
        <div class="wave"></div>
    </div>


    <?php
    include("../content.php")
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <script src="../js/respNavBar.js"></script>
</body>

</html>