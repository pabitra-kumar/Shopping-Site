<?php

require "./mainpage.php";
require "../config/db.php";
$atcart = false;
if (isset($_POST["addcart"])) {
    $prodid = $_POST["id"];
    $sql = "insert into cart (prodid,email) values('$prodid','$id')";
    $con->query($sql);
    // $query = "select * from products;";
    // require "../config/dbget.php";
    // $products = $posts;
}

$con->close();
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
        <?php foreach ($products as $product) {  ?>
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
                    <?php
                    require "../config/db.php";
                    $prodid = $product['id'];
                    $query = "select * from cart;";
                    require "../config/dbget.php";
                    $carts = $posts;
                    foreach($carts as $cart)
                    {
                        if($cart['email'] == $id && $cart['prodid'] == $prodid)
                        {
                            $atcart = true;
                            break;
                        }
                    }
                    $con -> close();
                     ?>
                    <?php
                     if ($atcart == false) { ?>
                        <form action="main.php" method="post">
                            <input type="text" name="id" style="display: none;" value="<?php echo $product["id"]; ?>">
                            <button type="submit" name="addcart" class="addcart transition ease-in-out  hover:-translate-y-1 hover:scale-110 duration-300">Add to Cart</button>
                        </form>
                    <?php } else { ?>
                        <div class="desc">
                            <h3 class="text-zinc-500">Added to cart</h3>
                        </div>

                    <?php
                    } ?>

                </div>
            </div>
        <?php $atcart = false; } ?>
    </div>
</body>

</html>