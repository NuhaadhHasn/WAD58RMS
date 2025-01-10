<?php

if (isset($_POST["btnCustomerLoginRegisterPage"])) {
    header("Location: customer/customerLoginRegister.php");
}


if (isset($_POST["btnAdminLoginRegisterPage"])) {
    header("Location: admin/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RMS</title>
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
        <form method="post">
            <button name="btnCustomerLoginRegisterPage" type="submit">Customer Login</button>
            <button name="btnAdminLoginRegisterPage" type="submit">Admin Login</button>
        </form>
    </section>
</body>

</html>