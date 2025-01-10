<?php
session_start();
include("user.php");
$LoginProcess = new Authentications();
$user = new User();

if (!isset($_SESSION["AdminLogged"]))
    header("location:../login.php");

if (isset($_POST["btnAdminLogOut"])) {
    unset($_SESSION["AdminLogged"]);
    header("location:../login.php");
}

if (isset($_POST["btnAddNewUser"])) {
    // echo "<script>alert('Register')</script>";
    $LoginProcess->fullName = $_POST["txtRegisterFullName"];
    $LoginProcess->username = $_POST["txtRegisterUsername"];
    $LoginProcess->email = $_POST["txtRegisterEmail"];
    $LoginProcess->mobileNumber = $_POST["txtRegisterMobile"];
    $LoginProcess->password = $_POST["txtRegisterPassword"];
    $LoginProcess->type = $_POST["txtRegisterType"];
    $imageName = $_FILES["txtRegisterDisplayPicture"]["name"];
    $fileInfo = new SplFileInfo($imageName);
    echo $_FILES["txtRegisterDisplayPicture"]["tmp_name"];

    if (!empty($_FILES["txtRegisterDisplayPicture"]["name"])) {
        $LoginProcess->displayPicture = $_FILES["txtRegisterDisplayPicture"]["name"];
        move_uploaded_file($_FILES["txtRegisterDisplayPicture"]["tmp_name"], "../img/" . $imageName);
        echo "Phot Added";
    } else {
        $LoginProcess->displayPicture = "default.png";
    }

    $LoginProcess->Register();
}

if (isset($_GET["delete"])) {
    $id = $_GET['delete'];
    $user->userId = $id;
    $user->Delete();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
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
    include('navBar.php')
    ?>
    <div class="clearfix"></div>
    <div>
        <div class="ocean">
            <div class="wave"></div>
            <div class="wave"></div>
        </div>


        <!-- <section>
            <div class="container clearContainer" id="container">
            </div>
        </section> -->

        <div class="container">
            <div class="table-wrapper ">
                <div class="table-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>Manage Users</h2>
                        </div>
                        <div class="col-xs-6">
                            <a href="#addEmployeeModal" id="btnOpenAddUserModal" class="btn btn-success" data-toggle="modal"><i class="fas fa-add"></i> <span>Add New User</span></a>
                            <!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="fas fa-trash-can"></i> <span>Delete</span></a> -->
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover ">
                        <thead>
                            <tr>
                                <th>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="selectAll">
                                        <label for="selectAll"></label>
                                    </span>
                                </th>

                                <th>User Id</th>
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>User Type</th>
                                <th>Date Registered</th>
                                <th>Date Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $users = $user->GetUsers();
                            $id;

                            foreach ($users as $u) {
                                $id = "User 0" . $u->userId;
                                // echo $u->id;
                            ?>
                                <tr>
                                    <td>
                                        <span class="custom-checkbox">
                                            <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                            <label for="checkbox1"></label>
                                        </span>
                                    </td>
                                    <td><?php echo htmlentities($id); ?></td>
                                    <td><img src="../img/<?php echo $u->displayPicture ?>" alt="" srcset="" width="80px"></td>
                                    <td><?php echo $u->fullName; ?></td>
                                    <td><?php echo "$u->username"; ?></td>
                                    <td><?php echo $u->email; ?></td>
                                    <td><?php echo $u->mobileNumber; ?></td>
                                    <td><?php echo $u->type; ?></td>
                                    <td><?php echo $u->dateRegistered; ?></td>
                                    <td><?php echo $u->dateUpdated; ?></td>
                                    <td>
                                        <a href="editUsers.php?edit=<?php echo $u->userId ?>" class="edit" data-toggle="modal"><i class="fas fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                                        <a href="manageUsers.php?delete=<?php echo $u->userId ?>" id="btnOpenDeleteUserModal" class="delete" data-toggle="modal"><i class="fas fa-trash-can" data-toggle="tooltip" title="Delete"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="clearfix">
                        <!-- <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div> -->
                        <!-- <ul class="pagination">
                            <li class="page-item "><a href="#" class="page-link">Previous</a></li>
                            <li class="page-item"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item active"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link">4</a></li>
                            <li class="page-item"><a href="#" class="page-link">5</a></li>
                            <li class="page-item"><a href="#" class="page-link">Next</a></li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div id="addUserModal" class="modal">
        <section>
            <!-- <div class="modal-dialog"> -->
            <!-- <div class="modal-content"> -->
            <?php
            include("addUser.php")
            ?>
            <!-- </div> -->
        </section>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/modal.js"></script>
    <script src="../js/respNavBar.js"></script>
    <script src="../js/tableCheckBox.js"></script>
</body>

</html>