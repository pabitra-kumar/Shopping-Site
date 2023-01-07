<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" href="../assets/admin-logo.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/96020ab7db.js" crossorigin="anonymous"></script>
    <title>Admin</title>
</head>

<body>
    <?php require "components/nav.php"; ?>
    <div class="welcome">
        <h1>Welcome Admin!</h1>
    </div>
    <div class="admin-form">
        <div class="products cursor-pointer" onclick="product()">
            <i class="fa-solid fa-gifts form-icon"></i>
            <h2>PRODUCTS</h2>
        </div>
        <div class="orders cursor-pointer">
            <i class="fa-solid fa-boxes-packing form-icon"></i>
            <h2>ORDERS</h2>
        </div>
        <div class="feedbacks cursor-pointer">
            <i class="fa-sharp fa-solid fa-comments form-icon"></i>
            <h2>FEEDBACKS</h2>
        </div>
    </div>
</body>

</html>