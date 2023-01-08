<!DOCTYPE html>
<html lang="en">
<?php
$wrongpass = false;
$pass = false;
if(isset($_POST["log"]))
{
    $pass = $_POST["pass"];
    if($pass == "root")
    {
        $pass = true;
    }
    else
    {
        $wrongpass = true;
    }
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" href="../assets/admin-logo.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/96020ab7db.js" crossorigin="anonymous"></script>
    <title>Admin Authentication</title>
    <?php if($pass) { ?>
        <script>
            location = "admin.php";
        </script>
    <?php } ?>
</head>

<body>
    <h1 class="hero-title">Welcome Admin!</h1>
    <form action="adminauth.php" method="post" id="form4" >
        <div class="flex justify-center items-center flex-col">
            <input type="password" name="pass" class="form-field" placeholder="Enter Password" style="border-bottom-color :<?php echo ($wrongpass ? "red" : "#D1D1D4"); ?>;">
            <p class="text-red-700 text-xl" style="display :<?php echo ($wrongpass ? "flex" : "none"); ?>;">
                Password not matched</p>
        </div>
        <button type="submit" name="log" class="transition ease-in-out  hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 cursor-pointer" id="login"> Enter
            <i class="fa-sharp fa-solid fa-arrow-right "></i>
        </button>
    </form>
</body>

</html>