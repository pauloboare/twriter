<?php
$connect=mysqli_connect ("localhost","root","","db_twriter");

if(mysqli_connect_errno()){
    echo "Failed to connect: ". mysqli_connect_error();
    die();
}
?>