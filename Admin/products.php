<!DOCTYPE html>
<html lang="en">
<?php require "adminpage.php" ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" href="../assets/admin-logo.png" type="image/x-icon">
    <title>Products | Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/96020ab7db.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php require "components/nav.php"; ?>
    <div class="cards">
        <?php foreach ($products as $product) {  ?>
            <div class="card">
                <img src="products/<?php echo $product["filename"]; ?>" alt="image here">
                <div class="info">
                    <h2> <?php echo $product["name"]; ?> </h2>
                    <h1>
                        <i class="fa-solid fa-indian-rupee-sign"></i>
                        <?php echo $product["price"]; ?>
                    </h1>
                    <h3>
                        Quantity Available: <?php echo $product["quantity"]; ?>
                    </h3>
                </div>
                <div class="buttons">
                    <button class="edit transition ease-in-out  hover:-translate-y-1 hover:scale-110 duration-300">Edit</button>
                    <button class="delete transition ease-in-out  hover:-translate-y-1 hover:scale-110 duration-300">delete</button>
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>