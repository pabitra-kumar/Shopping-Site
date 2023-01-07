<?php
require "../config/db.php";
$wrongimg = false;
if(isset($_POST["addproduct"])) {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $desc = $_POST["desc"];
    $id = uniqid("",true);

    $file = $_FILES["image"];


    $file_name = $file["name"];
    $file_type = $file["type"];
    $file_tmp = $file["tmp_name"];
    $file_error = $file["error"];
    $file_size = $file["size"];

    $fileExt = explode(".",$file_name);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("jpg","jpeg","png");
    $fileNameNew = "";
    if(in_array($fileActualExt,$allowed))
    {
        if($file_error === 0)
        {
            if($file_size <= 1000000000)
            {
                $fileNameNew = $id.".".$fileActualExt;
                echo $fileNameNew;
                $fileDestination = "products/".$fileNameNew;
                move_uploaded_file($file_tmp,$fileDestination);
                header("Location: products.php?uploadsuccess");
            }
            else
            $wrongimg = true;
        }
        else
        $wrongimg = true;
    }
    else
    {
        $wrongimg = true;
    }

    $sql = "insert into products values('$id', '$name', $price, '$desc', $quantity, '$fileNameNew');";
    $con->query($sql);
}

$con->close();

?>

<?php
require "../config/db.php";
$query = "select * from products;";
require "../config/dbget.php";
$products = $posts;
$con->close();
?>