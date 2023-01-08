<?php
if(isset($_POST["submit"]))
{
    $file = $_FILES["image"];

    echo print_r($file);
}

?>

<div class="choose">
    <form action="dbtest.php" method="post" enctype="multipart/form-data">
        <p class="chooseimg">Select a image:</p>
        <input type="file" name="image" id="getFile" accept="image/jpg, image/jpeg, image/png">
        <button type="submit" name="submit">submit</button>
    </form>

</div>