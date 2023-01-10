<?php

require "./mainpage.php";
require "../config/db.php";
$buy = false;
$id = $_GET["id"];
$query = "select * from products where id = '$id';";
require "../config/dbget.php";
$product = $posts;
if(isset($_POST["placeorder"]))
{
    $ordid = uniqid("",true);
    
    $query = "select * from curr_users;";
    require "../config/dbget.php";
    $id = $posts[0]["email"];

    $prodid = $_POST["id"];
    $quantity = $_POST["quantity"];
    $addrs = $_POST["addrs"];
    $sql = "INSERT INTO `orders` (`ordid`, `id`, `prodid`, `quantity`, `addrs`, `rate`, `comment`, `date`, `delivered`) VALUES ('$ordid', '$id', '$prodid', '$quantity', '$addrs', NULL, NULL, current_timestamp(), '0');";
    $con->query($sql);
    $sql = "update products set quantity = (quantity-$quantity) where id = '$prodid';";
    $con->query($sql);
    $buy = true;
}
mysqli_close($con);
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
    <?php if($buy) { ?>
        <script>
            location = "main.php";
        </script>
        <?php } ?>

</head>

<body>
    <?php require "nav.php"; ?>
    <div class="cards">
        <form action="buy.php" method="post">
            <div class="card">
                <div class="form-main">
                    <div class="img-info flex">
                        <img src="../Admin/products/<?php echo $product[0]["filename"]; ?>" alt="image here">
                        <div class="info">
                            <h2> <?php echo $product[0]["name"]; ?> </h2>
                            <h1>
                                <i class="fa-solid fa-indian-rupee-sign"></i>
                                <?php echo $product[0]["price"]; ?>
                            </h1>
                            <h3>
                                Quantity Available: <?php echo $product[0]["quantity"]; ?>
                            </h3>
                        </div>
                    </div>
                    <input type="number" min=1 max=<?php echo $product[0]["quantity"]; ?> name="quantity" class="form-field" placeholder="quantity">
                    <input type="text" style="display: none;"  name="id" value="<?php echo $product[0]["id"]; ?>">
                    <button type="submit" name="placeorder" class="transition ease-in-out  hover:-translate-y-1 hover:scale-110 duration-300">Place Order</button>
                </div>

                <textarea name="addrs" cols="30" rows="10">Write your Address here...</textarea>
            </div>
        </form>
    </div>
</body>

</html>