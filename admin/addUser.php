<div class="container model-container" id="container">
    <div class="form-container display-container">
        <form action="#" method="post" enctype="multipart/form-data">
            <h1>Display Picture</h1>
            <div class="social-container"></div>
            <label>
                <img id="myimage" style="margin-bottom: 110px;" src="<?php
                                                                        if (empty($_GET["edit"])) {
                                                                            echo "../img/default.png";
                                                                        } else {
                                                                            echo "../img/", $user->displayPicture;
                                                                        }
                                                                        ?>" height="300">
            </label>
        </form>
    </div>
    <script>
        function onFileSelected(event) {
            var selectedFile = event.target.files[0];
            var reader = new FileReader();

            var imgtag = document.getElementById("myimage");
            imgtag.title = selectedFile.name;

            reader.onload = function(event) {
                imgtag.src = event.target.result;
            };

            reader.readAsDataURL(selectedFile);
        }
    </script>
    <div class="form-container admin-container"><?php
                                                if (empty($_GET["edit"])) {
                                                    echo '<span class="close" name="close">&times;</span>';
                                                } else {
                                                    echo '<a href="manageUsers.php" class="close">&times;</a>';
                                                }
                                                ?>
        <form action="#" method="post" enctype="multipart/form-data">
            <h1><?php
                if (empty($_GET["edit"])) {
                    echo "Add User";
                } else {
                    echo "Edit User";
                }
                ?></h1>
            <label>
                <input type="text" name="txtRegisterFullName" placeholder="Enter Full Name" value="<?php
                                                                                                    if (isset($user)) {
                                                                                                        echo $user->fullName;
                                                                                                    }
                                                                                                    ?>" />
            </label>
            <label>
                <input type="text" name="txtRegisterUsername" placeholder="Enter Username" value="<?php
                                                                                                    if (isset($user)) {
                                                                                                        echo $user->username;
                                                                                                    }
                                                                                                    ?>" />
            </label>
            <label>
                <input type="email" name="txtRegisterEmail" placeholder="Enter Email" value="<?php
                                                                                                if (isset($user)) {
                                                                                                    echo $user->email;
                                                                                                }
                                                                                                ?>" />
            </label>
            <label>
                <input type="text" name="txtRegisterMobile" placeholder="Enter Mobile Number" value="<?php
                                                                                                        if (isset($user)) {
                                                                                                            echo $user->mobileNumber;
                                                                                                        }
                                                                                                        ?>" />
            </label><select name="txtRegisterType">
                <option value="none" selected hidden><?php
                                                        if (empty($_GET["edit"])) {
                                                            echo "";
                                                        } else {
                                                            echo $user->type;
                                                        }
                                                        ?></option>
                <option value="ADMIN">ADMIN</option>
                <option value="STAFF">STAFF</option>
                <option value="CUSTOMER">CUSTOMER</option>
            </select>
            <label>
                <input onchange="onFileSelected(event)" type="file" name="txtRegisterDisplayPicture" placeholder="Upload Image" />
            </label>
            <label>
                <input type="password" name="txtRegisterPassword" placeholder="Enter Password" value="<?php
                                                                                                        if (isset($user)) {
                                                                                                            echo $user->password;
                                                                                                        }
                                                                                                        ?>" />
            </label>
            <button style="margin-top: 9px" name="btnAddNewUser" type="submit"><?php
                                                                                if (empty($_GET["edit"])) {
                                                                                    echo "Add User";
                                                                                } else {
                                                                                    echo "Update User";
                                                                                }
                                                                                ?></button>
        </form>
    </div>
</div>