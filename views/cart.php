<?php

require "./mainpage.php";
require "../config/db.php";
$query = "select * from cart where email = '$id';";
require "../config/dbget.php";
$carts = $posts;
$con -> close();
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


</head>

<body>
    <?php require "nav.php"; ?>
    <div class="cards">
        <?php foreach ($carts as $cart) { 
            require "../config/db.php";
            $query = "select * from products where id = '$cart[prodid]';";
            require "../config/dbget.php";
            $product = $posts[0];
            $con -> close();
             ?>
            <div class="card ">
                <img src="../Admin/products/<?php echo $product["filename"]; ?>" alt="image here">
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
                    <?php if ($product["quantity"] > 0) { ?>
                        <form action="buy.php" method="get">
                            <input type="text" name="id" style="display: none;" value="<?php echo $product["id"]; ?>">
                            <button type="submit" name="buy" class="buy transition ease-in-out  hover:-translate-y-1 hover:scale-110 duration-300">Buy Now</button>
                        </form>
                    <?php } else { ?>
                        <div class="desc">
                            <h2 class="text-red-600">OUT OF STOCK</h2>
                        </div>

                    <?php
                    } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>