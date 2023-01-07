<!DOCTYPE html>
<html lang="en">
<?php require "adminpage.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" href="../assets/admin-logo.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/96020ab7db.js" crossorigin="anonymous"></script>
    <script>
        /*function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                let img = document.getElementById("upl");
                reader.onload = function (e) {
                    $('#upl')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        } */
    </script>
    <title>Add Product</title>
</head>

<body>
    <?php require "components/nav.php"; ?>
    <div class="form">
        <form action="addproduct.php" method="post" enctype="multipart/form-data">
            <textarea name="name" cols="30" rows="10">Name of the product here...</textarea>
            <input type="number" min=0 max="9999999999" name="price" class="form-field" placeholder="Price of the product">
            <input type="number" min=0 max="99999" name="quantity" class="form-field" placeholder="quantity available">
            <!-- <button class="choose-img" onclick="document.getElementById('getFile').click()">
            Select a image
            </button> -->
            <div class="choose">
                <p class="chooseimg">Select a image:</p>
                <input type="file" name="image" id="getFile" accept="image/jpg, image/jpeg, image/png">
            </div>

            <!-- <div class="image-field" style="display:none">
                <img alt="uploaded Image" src="#" id="upl">
            </div> -->
            <textarea name="desc" cols="30" rows="10" id="desc">Product information here...</textarea>
            <button type="submit" name="addproduct" class="transition ease-in-out  hover:-translate-y-1 hover:scale-110 duration-300">Upload</button>
        </form>
    </div>
</body>

</html>