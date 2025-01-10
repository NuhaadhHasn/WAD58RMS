<?php

if (isset($_POST["btnCustomerLoginRegisterPage"])) {
    header("Location: customer/customerLoginRegister.php");
}


if (isset($_POST["btnCustomerLogOut"])) {
    unset($_SESSION["CustomerLogged"]);
    header("location:customerLoginRegister.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RMS</title>
    <link rel="stylesheet" href="../css/ContactUsStyle.css" />
    <link rel="stylesheet" href="../css/background.css" />
    <link rel="stylesheet" href="../css/navBar.css" />
    <!-- <link rel="stylesheet" href="../css/form.css" /> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" />
</head>

<body>
    <?php
    include('navBar.php')
    ?>

    <div class="ocean">
        <div class="wave"></div>
        <div class="wave"></div>
    </div>
    <section class="form">
        <form action="#" class="card imgCurve cardShadow">
            <h2 class="contactTitle">CONTACT US</h2>
            <p type="Name:" class="pType">
                <input class="textInput" placeholder="Write your name here.." />
            </p>
            <p type="Email:" class="pType">
                <input class="textInput" placeholder="Let us know how to contact you back.." />
            </p>
            <p type="Message:" class="pType">
                <input class="textInput" placeholder="What would you like to tell us.." />
            </p>
            <button class="btn">Send Message</button>
            <div class="detailContainer imgCurve cardShadow">
                <span class="fa fa-phone"></span>+94 75 290 7003
                <span class="fa fa-envelope-o"></span> nuhaadh9991@gmail.com
            </div>
        </form>
        <div class="clearFix"></div>
    </section>
</body>

</html>