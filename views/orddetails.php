<?php

require "./mainpage.php";
require "../config/db.php";

$ordid = $_GET["ordid"];
$query = "select * from orders where ordid = '$ordid';";
require "../config/dbget.php";
$order = $posts[0];

$query = "select * from products where id = '$order[prodid]';";
require "../config/dbget.php";
$product = $posts[0];

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
        <div class="card flex-col gap-[3vw]">
            <div class="flex">
                <img src="../Admin/products/<?php echo $product["filename"]; ?>" alt="image here">
                <div class="info">
                    <h2> <?php echo $order["name"]; ?> </h2>
                    <h1>
                        <i class="fa-solid fa-indian-rupee-sign"></i>
                        <?php echo $order["price"]; ?>
                    </h1>
                    <h3>
                    <?php echo $order["date"]; ?>
                    </h3>

                </div>
            </div>
            <div class="desc flex flex-col gap-[3vw]">
                <h2>
                    Status: <?php if ($order['delivered'] == 0) {
                                echo "not delivered";
                            } else {
                                echo "delivered";
                            } ?>
                </h2>
                <h2>
                    quantity Ordered : <?php echo $order["quantity"]; ?>
                </h2>
            </div>

            <div class="desc flex gap-[2vw] items-center">
                <h2>Address: </h2>
                <?php echo $order["addrs"]; ?>
            </div>

        </div>

    </div>
</body>

</html>