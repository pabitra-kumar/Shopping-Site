<?php

require "../config/db.php";
$logout = false;

if(isset($_POST["logout"]))
{
   require "../config/db.php";
   $logout = true;
   $query = "delete from curr_users;";
   $con->query($query);
   
   mysqli_close($con);
}


$query = "select * from curr_users;";
require "../config/dbget.php";
$id = $posts[0]['email'];
$query = "select * from users where email = '$id';";
require "../config/dbget.php";
$username = $posts[0]['username'];
$type = $posts[0]['type'];
$password = $posts[0]['password'];

mysqli_close($con);

?>

<?php
require "../config/db.php";

$query = "select * from products;";
require "../config/dbget.php";
$products = $posts;

$query = "select * from orders order by date desc;";
require "../config/dbget.php";
$orders = $posts;

mysqli_close($con);
?>

<?php
require "../config/db.php";


$con -> close();
?>
