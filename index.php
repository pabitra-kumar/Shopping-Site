<!DOCTYPE html>
<html lang="en">
<?php
require "otp.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/96020ab7db.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="assets/web-icon.ico" type="image/x-icon">
    <title>Welcome</title>
    <?php
    if ($verified) { ?>
        <script>
            console.log("verified");
        </script>

    <?php }
    if ($auth) { ?>
        <script>
            location = "views/main.php";
        </script>
    <?php } ?>
</head>

<body>


    <h1 class="hero-title">Welcome to Our Site.</h1>


    <form action="index.php" id="form1" method="get" style="display: <?php echo (($registered || $otpsent || $verified) ? "none" : "flex"); ?>;">
        <input type="email" name="email" placeholder="Enter your Email" id='email'>
        <button type="submit" name="continue1" class="transition ease-in-out  hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 cursor-pointer " id="continue1">continue
            <i class="fa-sharp fa-solid fa-arrow-right "></i>
        </button>
    </form>



    <form action="index.php" method="get" id="form2" style="display: <?php echo ($otpsent ? "flex" : "none");  ?>;">

        <div class="flex justify-center items-center flex-col">
            <input type="number" name="otp" class="otp form-field" min="100000" max="999999" placeholder="Enter OTP" style="border-bottom-color :<?php echo ($wrongotp ? "red" : "#D1D1D4"); ?>;">
            <p class="text-red-700 text-xl" style="display :<?php echo ($wrongotp ? "flex" : "none"); ?>;">
                Incorrect otp</p>
        </div>

        <input type="email" name="email" value=<?php echo ($otpsent ? $_GET["email"] : "none");  ?> style="display: none;">
        <button type="submit" name="continue2" class="transition ease-in-out  hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 cursor-pointer " id="continue2">continue
            <i class="fa-sharp fa-solid fa-arrow-right "></i>
        </button>
    </form>



    <form action="index.php" method="get" id="form3" style="display: <?php echo ($verified ? "flex" : "none");  ?>;">
        <div class="flex justify-center items-center flex-col">
            <input type="text" name="username" class="form-field" placeholder="Create a username" style="border-bottom-color :<?php echo ($wrongusername ? "red" : "#D1D1D4"); ?>;">
            <p class="text-red-700 text-lg" style="display :<?php echo ($wrongusername ? "flex" : "none"); ?>;">
                Invalid Username or already exist</p>
        </div>
        <div class="flex justify-center items-center flex-col">
            <input type="text" name="name" class="form-field" placeholder="Your Name" style="border-bottom-color :<?php echo ($wrongname ? "red" : "#D1D1D4"); ?>;">
            <p class="text-red-700 text-lg" style="display :<?php echo ($wrongname ? "flex" : "none"); ?>;">
                Invalid Name</p>
        </div>
        <div class="flex justify-center items-center flex-col">
            <input type="password" name="pa" class="form-field" placeholder="Create a Password" style="border-bottom-color: <?php echo ($wrongpa ? "red" : "#D1D1D4"); ?>;">
            <p class="text-red-700 text-lg" style="display :<?php echo ($wrongpa ? "flex" : "none"); ?>;">
                Invalid Password</p>
        </div>
        <div class="flex justify-center items-center flex-col">
            <input type="password" name="cpa" class="form-field" placeholder="Retype Password" style="border-bottom-color :<?php echo ($wrongmatch ? "red" : "#D1D1D4"); ?>;">
            <p class="text-red-700 text-xl" style="display :<?php echo ($wrongmatch ? "flex" : "none"); ?>;">
                Password not matched</p>
        </div>
        <input type="email" name="email" value=<?php echo ($verified ? $_GET["email"] : "none");  ?> style="display: none;">
        <button type="submit" name="register" class="transition ease-in-out  hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 cursor-pointer " id="resister">register
            <i class="fa-sharp fa-solid fa-arrow-right "></i>
        </button>
    </form>



    <form action="index.php" method="get" id="form4" style="display: <?php echo ($registered ? "flex" : "none");  ?>">
        <div class="flex justify-center items-center flex-col">
        <input type="password" name="pass" class="form-field" placeholder="Enter Password" style="border-bottom-color :<?php echo ($wrongpass ? "red" : "#D1D1D4"); ?>;">
            <p class="text-red-700 text-xl" style="display :<?php echo ($wrongpass ? "flex" : "none"); ?>;">
                Password not matched</p>
        </div>
        <input type="email" name="email" value= "<?php echo ($registered ? $_GET["email"] : "none");  ?>"  style="display: none;">
        <button type="submit" name="log" class="transition ease-in-out  hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 cursor-pointer" id="login"> Login
            <i class="fa-sharp fa-solid fa-arrow-right "></i>
        </button>
    </form>



</body>

</html>