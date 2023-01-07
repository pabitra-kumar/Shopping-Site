<?php

 require "../config/db.php";

 function logout()
 {
    require "../config/db.php";
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