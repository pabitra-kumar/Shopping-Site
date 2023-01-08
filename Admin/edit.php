<?php
require "../config/db.php";
$id = $_GET["id"];
$query = "select * from products where id = '$id';";
require "../config/dbget.php";
$product = $posts;


$con->close();
require "adminpage.php";
?>



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
    <title>Add Product</title>
</head>

<body>
    <?php require "components/nav.php"; ?>
    <div class="form">
        <form action="products.php" method="post" enctype="multipart/form-data">
            <textarea name="name" cols="30" rows="10"><?php echo $product[0]['name']; ?></textarea>
            <p class="chooseimg text-[2vw] mr-auto ml-[10vw]">Price of the Product:- </p>
            <input type="number" min=0 max="9999999999" name="price" class="form-field" placeholder="Price of the product" value="<?php echo $product[0]['price']; ?>">
            <p class="chooseimg text-[2vw] mr-auto ml-[10vw]">Quantity available:-</p>
            <input type="number" min=0 max="99999" name="quantity" class="form-field" placeholder="quantity available" value="<?php echo $product[0]['quantity']; ?>">

            <input type="text" style="display: none;"  name="id" value="<?php echo $product[0]["id"]; ?>">
            <input type="text" style="display: none;"  name="filename" value="<?php echo $product[0]["filename"]; ?>">
            <!-- <button class="choose-img" onclick="document.getElementById('getFile').click()">
            Select a image
            </button> -->
            <div class="image flex gap-[10vw]">
            <div class="choose">
                <p class="chooseimg text-[2vw]">Select a image:</p>
                <input type="file" class="text-[2vw]" name="image" id="getFile" accept="image/jpg, image/jpeg, image/png">
            </div>

            <div class="image-field h-[20vw] w-[20vw]">
                <img class="h-full w-full" alt="uploaded Image" src="<?php echo 'products/'.$product[0]['filename']; ?>" id="upl">
            </div>
            </div>
            
            <textarea name="desc" cols="30" rows="10" id="desc"><?php echo $product[0]['description']; ?></textarea>
            <button type="submit" name="editproduct" class="transition ease-in-out  hover:-translate-y-1 hover:scale-110 duration-300">Modify</button>
        </form>
    </div>
</body>

</html>