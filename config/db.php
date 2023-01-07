<?php
$server = 'localhost';
$con = mysqli_connect($server,"root","","golden_shop");

if(!$con)
{
    echo "failed to connect database";
}

?>