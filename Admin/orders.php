<?php
require "../config/db.php";
$query = "select * from orders order by date desc;";
require "../config/dbget.php";
$orders = $posts;
if(isset($_POST["delivered"]))
{
    $ordid = $_POST["ordid"];
    $sql = "update orders set delivered = '1' where ordid = '$ordid';";
    $con -> query($sql);
    $query = "select * from orders order by date desc;";
    require "../config/dbget.php";
    $orders = $posts;
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
    <link rel="stylesheet" href="admin.css">
    <title>Document</title>


</head>

<body>
    <?php require "components/nav.php"; ?>
    <div class="cards">
        <?php foreach ($orders as $order) {
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
                        <?php if($order["delivered"] == 0) { ?>
                        <form action="orders.php" method="post">
                            <input type="text" name="ordid" style="display: none;" value="<?php echo $order['ordid']; ?>">
                            <button type="submit" name="delivered" class="delivered transition ease-in-out  hover:-translate-y-1 hover:scale-110 duration-300">Mark As Delivered</button>
                        </form>
                        <?php } ?>
                    </div>
                </div>
        <?php } ?>
    </div>
</body>

</html>