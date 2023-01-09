<nav>
        <div class="main-logo cursor-pointer" onclick="home()">
            <img src="../assets/logo.png" alt="logo">
        </div>

        <div class="profile-tab group cursor-pointer">
            <div class="profile-menu hidden group-hover:flex dropdown">
                <a class="profile-link link"> profile </a>
                <a class="setting-link link"> Setting </a>
                <a class="orders-link link" onclick="order()"> My Orders </a>
            </div>
            <i class="fa-solid fa-user profile-icon"></i>

        </div>
        <form action="main.php" method="post">
            <button type="submit" name="logout"><i class="fa-solid fa-right-from-bracket"></i></button>
        </form>

    </nav>
    <?php if ($logout) { ?>
        <script>
            location = "../index.php";
        </script>
    <?php } ?>

    <script>
        function order()
        {
            location = "orders.php";
        }

        function home()
        {
            location = "main.php";
        }
    </script>