<!-- Category Section Starts Here -->
<section class="category" id="Categories">
    <div class="container">
        <h2></h2>
        <h2></h2>
        <h2 class="textCenter">Explore Products</h2>

        <a href="categoryProducts.html">
            <div class="box-3 floatContainer">
                <img src="http://localhost/WAD58RMS/img/pizza.jpg" alt="Pizza" class="imgResponsive imgCurve" />
                <h3 class="floatText textWhite">Pizza</h3>
            </div>
        </a>

        <a href="#">
            <div class="box-3 floatContainer">
                <img src="http://localhost/WAD58RMS/img/burger.jpg" alt="burger" class="imgResponsive imgCurve" />
                <h3 class="floatText textWhite">Burger</h3>
            </div>
        </a>

        <a href="#">
            <div class="box-3 floatContainer">
                <img src="http://localhost/WAD58RMS/img/CranberryKiss.jpg" alt="beverages" class="imgResponsive imgCurve" />
                <h3 class="floatText textWhite">beverages</h3>
            </div>
        </a>

        <div class="clearFix"></div>
    </div>
</section>
<!-- Category Section Ends Here -->

<!-- Product List Section Starts Here -->
<section class="productList">
    <div class="container">
        <h2 class="textCenter textWhite" id="AllProducts">Product List</h2>
        <?php
        $foods = $food->GetFoods();
        $id;

        foreach ($foods as $f) {
            $id = "Food 0" . $f->foodId;
            // echo $u->id;
        ?>

            <div class="productListBox imgCurve">
                <div class="productListImg">
                    <img src="../img/<?php echo $f->foodImage ?>" alt="Chicken Hawaiian Pizza" class="imgResponsive imgCurve" />
                </div>

                <div class="productListDesc">
                    <h4><?php echo $f->foodName; ?></h4>
                    <p class="productPrice">LKR <?php echo $f->foodPrice; ?></p>
                    <p class="productDetail">
                        <?php echo "$f->foodDescription"; ?>
                    </p>
                    <br />
                    <button class="btn btn-primary">Order Now</button>
                </div>

                <div class="clearFix"></div>
            </div>
        <?php } ?>

        <div class="clearFix"></div>
    </div>

    <!-- <p class="textCenter">
        <a href="#">See All Foods</a>
    </p> -->
</section>
<!-- Product List Section Ends Here -->