<?php
require "config/db.php";

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'phpmailer/src/Exception.php';
// require 'phpmailer/src/PHPMailer.php';
// require 'phpmailer/src/SMTP.php';

$num = 4;
$id = "kk";
$registered = false;
$otpsent = false;
$verified = false;
$wrongemail = false;
$wrongotp = false;
$wrongusername = false;
$wrongname = false;
$wrongpa = false;
$wrongmatch = false;
$wrongpass = false;
$auth = false;

$query = "select * from curr_users;";
require "config/dbget.php";
if ($posts != null) {
    $auth = true;
}

if (isset($_GET["continue1"])) {
    $id = $_GET["email"];
    if ($id != null) {
        require 'PHPMailerAutoload.php';

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'goldenshop.goldenshop.shop@gmail.com';
        $mail->Password = 'lmfzawsqxeudssof';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('goldenshop.goldenshop.shop@gmail.com');

        $mail->addAddress($id);

        $mail->isHTML(true);

        $mail->Subject = "OTP Verification";

        $num =  rand(100000, 999999);

        $mail->Body = "OTP for registering on our site is : <br> <br> $num";


        $query = "select * from dummy where email = '$id';";
        require "config/dbget.php";

        if ($posts == null) {
            echo "success";
            // mail($id,"OTP Verification","OTP for registering on our site is : <br> <br> $num");
            $mail->Send();
            $sql = "INSERT INTO `dummy` (`email`, `otp`, `registered`) VALUES ('$id',$num,0);";
            $con->query($sql);
            $otpsent = true;
            $registered = false;
            $verified = false;
        } else {
            if ($posts[0]['registered'] == 1) {
                $registered = true;
                $otpsent = false;
                $verified = false;
            } else {
                echo "success";
                $mail->Send();
                $sql = "UPDATE `dummy` SET `otp` = '$num' WHERE `dummy`.`email` = '$id';";
                $con->query($sql);
                $otpsent = true;
                $registered = false;
                $verified = false;
            }
        }
    }
    else
    {
        $wrongemail = true;
    }
}
mysqli_close($con);
?>

<?php

require "config/db.php";


if (isset($_GET["continue2"])) {
    $id = $_GET["email"];
    $query = "select * from dummy where email = '$id'";
    require "config/dbget.php";

    $otp = $_GET["otp"];
    if ($posts[0]["otp"] == $otp) {
        $verified = true;
        $registered = false;
        $otpsent = false;
        $wrongotp = false;
    } else {
        $otpsent = true;
        $registered = false;
        $verified = false;
        $wrongotp = true;
    }
}
mysqli_close($con);
?>

<?php

require "config/db.php";

if (isset($_GET["register"])) {
    $id = $_GET["email"];
    $username = $_GET["username"];
    $name = $_GET["name"];
    $pa = $_GET["pa"];
    $cpa = $_GET["cpa"];
    $query = "select * from users where username = '$username';";
    require "config/dbget.php";
    if ($posts != null || $username == "") {
        $wrongusername = true;
        $wrongname = false;
        $wrongpa = false;
        $wrongmatch = false;
        $verified = true;
        $registered = false;
        $otpsent = false;
    } else if ($name == "") {
        $wrongusername = false;
        $wrongname = true;
        $wrongpa = false;
        $wrongmatch = false;
        $verified = true;
        $registered = false;
        $otpsent = false;
    } else if ($pa == null) {
        $wrongusername = false;
        $wrongname = false;
        $wrongpa = true;
        $wrongmatch = false;
        $verified = true;
        $registered = false;
        $otpsent = false;
    } else if ($cpa != $pa) {
        $wrongusername = false;
        $wrongname = false;
        $wrongpa = false;
        $wrongmatch = true;
        $verified = true;
        $registered = false;
        $otpsent = false;
    } else {
        $sql1 = "update dummy set registered = 1 where email = '$id'";
        $sql2 = "INSERT INTO `users` (`email`, `username`, `name`, `password`, `type`) VALUES ('$id', '$username', '$name', '$pa', '0');";
        $sql3 = "INSERT INTO `curr_users` (`email`, `date`) VALUES ('$id', current_timestamp());";
        if ($con->query($sql1) && $con->query($sql2) && $con->query($sql3)) {
            $auth = true;
        } else {
            $wrongusername = true;
            $wrongname = false;
            $wrongpa = false;
            $wrongmatch = false;
            $verified = true;
            $registered = false;
            $otpsent = false;
            $auth = false;
        }
    }
}

mysqli_close($con);
?>

<?php
require "config/db.php";

if (isset($_GET["log"])) {
    $id = $_GET["email"];
    $pass = $_GET["pass"];
    $query = "select * from users where email = '$id';";
    require "config/dbget.php";

    if ($posts[0]['password'] == $pass) {
        $sql3 = "INSERT INTO `curr_users` (`email`, `date`) VALUES ('$id', current_timestamp());";
        $con->query($sql3);
        // header("Location: index.php?success");
        $auth = true;
    } else {
        $auth = false;
        $registered = true;
        $otpsent = false;
        $verified = false;
        $wrongpass = true;
    }
}

mysqli_close($con);
?>