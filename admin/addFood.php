<div class="container model-container" id="container">
    <div class="form-container display-container">
        <form action="#" method="post" enctype="multipart/form-data">
            <h1>Food Picture</h1>
            <div class="social-container"></div>
            <label>
                <img id="myimage" style="margin-bottom: 110px;" src="<?php
                                                                        if (empty($_GET["editFood"])) {
                                                                            echo "../img/defaultFood.png";
                                                                        } else {
                                                                            echo "../img/", $food->foodImage;
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
                                                if (empty($_GET["editFood"])) {
                                                    echo '<span class="close" name="close">&times;</span>';
                                                } else {
                                                    echo '<a href="manageFood.php" class="close">&times;</a>';
                                                }
                                                ?>
        <form action="#" method="post" enctype="multipart/form-data">
            <h1><?php
                if (empty($_GET["editFood"])) {
                    echo "Add Food";
                } else {
                    echo "Edit Food";
                }
                ?></h1>
            <label>
                <input type="text" name="txtRegisterFoodName" placeholder="Enter Food Name" value="<?php
                                                                                                    if (isset($food)) {
                                                                                                        echo $food->foodName;
                                                                                                    }
                                                                                                    ?>" />
            </label>
            <label>
                <input type="text" name="txtRegisterFoodDescription" placeholder="Enter Food Description" value="<?php
                                                                                                                    if (isset($food)) {
                                                                                                                        echo $food->foodDescription;
                                                                                                                    }
                                                                                                                    ?>" />
            </label>
            <label>
                <input type="text" name="txtRegisterFoodCategory" placeholder="Enter Food Category" value="<?php
                                                                                                            if (isset($food)) {
                                                                                                                echo $food->foodCategory;
                                                                                                            }
                                                                                                            ?>" />
            </label>
            <label>
                <input type="text" name="txtRegisterFoodPrice" placeholder="Enter Food Price" value="<?php
                                                                                                        if (isset($food)) {
                                                                                                            echo $food->foodPrice;
                                                                                                        }
                                                                                                        ?>" />
            </label>
            <label>
                <input type="text" name="txtRegisterFoodOffer" placeholder="Enter Food Offer" value="<?php
                                                                                                        if (isset($food)) {
                                                                                                            echo $food->offerAvailable;
                                                                                                        }
                                                                                                        ?>" />
            </label>
            <label>
                <input onchange="onFileSelected(event)" type="file" name="txtRegisterFoodImage" placeholder="Upload Image" />
            </label>
            <button style="margin-top: 9px" name="btnAddNewFood" type="submit"><?php
                                                                                if (empty($_GET["editFood"])) {
                                                                                    echo "Add Food";
                                                                                } else {
                                                                                    echo "Update Food";
                                                                                }
                                                                                ?></button>
        </form>
    </div>
</div>