<?php
session_start();
include("../admin/food.php");
$food = new Food();

if (!isset($_SESSION["StaffLogged"]))
    header("location:../login.php");

if (isset($_POST["btnStaffLogOut"])) {
    unset($_SESSION["StaffLogged"]);
    header("location:../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <link rel="stylesheet" href="../css/background.css" />
    <link rel="stylesheet" href="../css/content.css" />
</head>

<body>
    <div class="ocean">
        <div class="wave"></div>
        <div class="wave"></div>
    </div>
    <form method="post">
        <!-- <h1>Staff Dashboard</h1> -->
        <button name="btnStaffLogOut" type="submit">Log Out</button>
    </form>
    <?php
    include("../content.php")
    ?>
</body>

</html>