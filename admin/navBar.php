    <header>
        <div class="inner-width">
            <h1 class="logo">Signature cuisine</h1>
            <i class="menu-toggle-btn fas fa-bars"></i>
            <nav class="navigation-menu">
                <!-- <button class="ghost">test</button> -->
                <a href="index.php"><i class="fas fa-home home"></i> Home</a>
                <a href="manageUsers.php"></i> Users</a>
                <a href="manageFood.php"></i> Food</a>
                <form method="post">
                    <a href="" class="logout" id="logoutALink"><i class="fas fa-lock" aria-hidden="true"></i>
                        Logout
                    </a>
                    <button hidden name="btnAdminLogOut" id="btnAdminLogOut" type="submit"><i class="fas fa-lock" aria-hidden="true">Logout</i></button>


                    <script>
                        // Add an event listener to the anchor tag
                        document.getElementById("logoutALink").addEventListener("click", function(event) {
                            event.preventDefault(); // Prevent the default behavior of the anchor tag (e.g., navigating to a new page)
                            document.getElementById("btnAdminLogOut").click(); // Trigger the click event of the button
                        });
                    </script>
                </form>
            </nav>
        </div>
    </header>