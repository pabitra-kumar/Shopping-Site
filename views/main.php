<?php

require "./mainpage.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/96020ab7db.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
    <script>
        // Function For Logout
        function logout() {
            <?php logout();  ?>
            location = "../index.php";
        }

        
    </script>

</head>

<body>
    <nav>
        <div class="main-logo cursor-pointer">
            <img src="../assets/logo.png" alt="logo">
        </div>

        <div class="profile-tab group cursor-pointer">
            <div class="profile-menu hidden group-hover:flex dropdown">
                <a class="profile-link link"> profile </a>
                <a class="setting-link link"> Setting </a>
                <a class="logout link" onclick="logout()"> Logout </a>
            </div>
            <i class="fa-solid fa-user profile-icon"></i>
        </div>

    </nav>

</body>

</html>