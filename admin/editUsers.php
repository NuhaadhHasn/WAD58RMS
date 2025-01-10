<?php
session_start();
include("user.php");
$currentId = $_GET['edit'];

if (isset($_GET['edit'])) {
    $user = new User();
    $user->userId = $currentId;
    $user = $user->GetUser();
}

if (isset($_POST["btnAddNewUser"])) {
    $user = new User();
    $user->userId = $currentId;
    $getUser = $user->GetUser();
    $user->userId = $currentId;
    $user->fullName = $_POST["txtRegisterFullName"];
    $user->username = $_POST["txtRegisterUsername"];
    $user->email = $_POST["txtRegisterEmail"];
    $user->mobileNumber = $_POST["txtRegisterMobile"];
    $user->password = $_POST["txtRegisterPassword"];
    if ($_POST["txtRegisterType"] == "none") {
        $user->type = $getUser->type;
    } else {
        $user->type = $_POST["txtRegisterType"];
    }
    $imageName = $_FILES["txtRegisterDisplayPicture"]["name"];
    $fileInfo = new SplFileInfo($imageName);

    if (!empty($_FILES["txtRegisterDisplayPicture"]["name"])) {
        $user->displayPicture = $_FILES["txtRegisterDisplayPicture"]["name"];
        move_uploaded_file($_FILES["txtRegisterDisplayPicture"]["tmp_name"], "../img/" . $imageName);
    } else {
        $user->displayPicture = $getUser->displayPicture;
    }

    $user->Update();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Users</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/navBar.css" />
    <link rel="stylesheet" href="../css/background.css" />
    <link rel="stylesheet" href="../css/form.css" />
    <link rel="stylesheet" href="../css/formOverlay.css" />
    <link rel="stylesheet" href="../css/modal.css" />
    <link rel="stylesheet" href="../css/table.css" />
    <link rel="stylesheet" href="../css/test.css" />

</head>

<body>
    <?php
    include('navBar.php');


    ?>
    <div class="clearfix"></div>
    <div>
        <div class="ocean">
            <div class="wave"></div>
            <div class="wave"></div>
        </div>


        <?php
        include("addUser.php")
        ?>
    </div>
</body>

</html>