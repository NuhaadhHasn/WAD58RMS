    <header style="
    position: fixed;
    overflow: visible;
    width: 100%;
    z-index: 1;">
        <div class="inner-width">
            <h1 class="logo">Signature cuisine</h1>
            <i class="menu-toggle-btn fas fa-bars"></i>
            <nav class="navigation-menu">
                <!-- <button class="ghost">test</button> -->
                <a href="index.php"><i class="fas fa-home home"></i> Home</a>
                <a href="index.php#Categories"></i> Categories</a>
                <a href="index.php#AllProducts"></i> All Products</a>
                <a href="contactUs.php"></i> Contact</a>
                <form method="post">
                    <a href="" class="logout" id="logoutLink"><i class="fas fa-lock" aria-hidden="true"></i>
                        Logout
                    </a>
                    <button hidden name="btnCustomerLogOut" id="btnCustomerLogOut" type="submit"><i class="fas fa-lock" aria-hidden="true">Logout</i></button>


                    <script>
                        // Add an event listener to the anchor tag
                        document.getElementById("logoutLink").addEventListener("click", function(event) {
                            event.preventDefault(); // Prevent the default behavior of the anchor tag (e.g., navigating to a new page)
                            document.getElementById("btnCustomerLogOut").click(); // Trigger the click event of the button
                        });
                    </script>
                </form>
            </nav>
        </div>
    </header>