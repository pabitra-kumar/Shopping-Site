<nav>
        <a class="main-logo cursor-pointer" href="./admin.php">
            <img src="../assets/logo.png" alt="logo">
        </a>
        <div class="add cursor-pointer hover:-translate-y-1 hover:scale-110" onclick="add()">
            <h3> Upload a product </h3>
        </div>
        <div class="profile-tab group cursor-pointer">
            <div class="profile-menu hidden group-hover:flex dropdown">
                <a class="profile-link link"> Profile </a>
                <a class="setting-link link"> Setting </a>
                <a class="products-link link" onclick="product()"> Products </a>
                <a class="orders-link link"> Orders </a>
                <a class="feedbacks-link link"> Feedbacks </a>
                <a class="logout link" onclick="logout()"> Logout </a>
            </div>
            <i class="fa-sharp fa-solid fa-gear profile-icon"></i>
        </div>

    </nav>

    <script>

        function logout() {
            location= "../index.php";
        }

        function product() {
            location= "products.php";
        }

        function add() {
            location= "addproduct.php";
        }

    </script>