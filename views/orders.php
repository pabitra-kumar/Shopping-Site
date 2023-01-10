<?php

require "./mainpage.php";
require "../config/db.php";
$query = "select * from curr_users;";
require "../config/dbget.php";
$email = $posts[0]["email"];


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
        <?php foreach ($orders as $order) {
            if ($order["id"] == $email) {
                require "../config/db.php";
                $query = "select * from products where id = '$order[prodid]';";
                require "../config/dbget.php";
                $product = $posts;
                $con->close();
        ?>
                <div class="card <?php echo ($order['delivered'] == 0)?("bg-yellow-100"):("bg-green-300"); ?>">
                    <img src="../Admin/products/<?php echo $product[0]["filename"]; ?>" alt="image here">
                    <div class="info">
                        <h2> <?php echo $product[0]["name"]; ?> </h2>
                        <h1>
                            <i class="fa-solid fa-indian-rupee-sign"></i>
                            <?php echo $product[0]["price"]; ?>
                        </h1>
                        <h3>
                            Status: <?php if ($order['delivered'] == 0) {
                                        echo "not delivered";
                                    } else {
                                        echo "delivered";
                                    } ?>
                        </h3>
                    </div>
                    <div class="buttons">
                        <form action="orddetails.php" method="get">
                            <input type="text" name="ordid" style="display: none;" value="<?php echo $order['ordid']; ?>">
                            <button type="submit" name="orddetails" class="buy transition ease-in-out  hover:-translate-y-1 hover:scale-110 duration-300">Details</button>
                        </form>

                    </div>
                </div>
        <?php }
        } ?>
    </div>
</body>

</html>