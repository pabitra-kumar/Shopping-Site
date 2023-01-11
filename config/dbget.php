<?php

$result = mysqli_query($con,$query);
$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
?>