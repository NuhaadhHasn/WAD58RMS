<?php
session_start();
// include("user.php");
include("food.php");
// $LoginProcess = new Authentications();
$food = new Food();

if (!isset($_SESSION["AdminLogged"]))
    header("location:../login.php");

if (isset($_POST["btnAdminLogOut"])) {
    unset($_SESSION["AdminLogged"]);
    header("location:../login.php");
}

if (isset($_POST["btnAddNewFood"])) {
    // echo "<script>alert('Register')</script>";
    $food->foodName = $_POST["txtRegisterFoodName"];
    $food->foodPrice = $_POST["txtRegisterFoodPrice"];
    $food->foodCategory = $_POST["txtRegisterFoodCategory"];
    $food->offerAvailable = $_POST["txtRegisterFoodOffer"];
    $food->foodDescription = $_POST["txtRegisterFoodDescription"];
    $imageName = $_FILES["txtRegisterFoodImage"]["name"];
    $fileInfo = new SplFileInfo($imageName);
    // echo $_FILES["txtRegisterFoodImage"]["tmp_name"];

    if (!empty($_FILES["txtRegisterFoodImage"]["name"])) {
        $food->foodImage = $_FILES["txtRegisterFoodImage"]["name"];
        move_uploaded_file($_FILES["txtRegisterFoodImage"]["tmp_name"], "../img/" . $imageName);
        // echo "Phot Added";
    } else {
        $food->foodImage = "defaultFood.png";
    }

    $food->AddFood();
}

if (isset($_GET["delete"])) {
    $id = $_GET['delete'];
    $food->foodId = $id;
    $food->DeleteFood();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Food</title>
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
                            <h2>Manage Foods</h2>
                        </div>
                        <div class="col-xs-6">
                            <a href="#addEmployeeModal" id="btnOpenAddUserModal" class="btn btn-success" data-toggle="modal"><i class="fas fa-add"></i> <span>Add New Food</span></a>
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

                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Offer</th>
                                <th>Date Added</th>
                                <th>Date Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $foods = $food->GetFoods();
                            $id;

                            foreach ($foods as $f) {
                                $id = "Food 0" . $f->foodId;
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
                                    <td><img src="../img/<?php echo $f->foodImage ?>" alt="" srcset="" width="80px"></td>
                                    <td><?php echo $f->foodName; ?></td>
                                    <td><?php echo "$f->foodDescription"; ?></td>
                                    <td><?php echo $f->foodCategory; ?></td>
                                    <td><?php echo $f->foodPrice; ?></td>
                                    <td><?php echo $f->offerAvailable; ?></td>
                                    <td><?php echo $f->dateAdded; ?></td>
                                    <td><?php echo $f->dateUpdated; ?></td>
                                    <td>
                                        <a href="editFood.php?editFood=<?php echo $f->foodId ?>" class="edit" data-toggle="modal"><i class="fas fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                                        <a href="manageFood.php?delete=<?php echo $f->foodId ?>" id="" class="delete" data-toggle="modal"><i class="fas fa-trash-can" data-toggle="tooltip" title="Delete"></i></a>
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
            include("addFood.php")
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