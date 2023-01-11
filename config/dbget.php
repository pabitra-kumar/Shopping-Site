<?php

$result = mysqli_query($con,$query);
$posts = array();
if($result)
{
$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
}
?>