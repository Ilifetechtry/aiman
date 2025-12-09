<?php
    include 'db/connection.php';
?>
<?php

$sale=100;
    $chq = mysqli_query($conn, "select * from cube where cube_name='".$_POST['data']."' ");
    $fd=mysqli_fetch_assoc($chq);
    if($_POST['load']==100){
        mysqli_query($conn, "UPDATE `cube` set `sales`='".$sale."',`load1`='".$_POST['load']."' where `cube_name`='".$_POST['data']."'");
    }
    if(mysqli_num_rows($chq) == 0) {
        mysqli_query($conn, "INSERT INTO `cube`(`cube_name`, `load1`) VALUES ('".$_POST['data']."','".$_POST['load']."')");
    } else {
        mysqli_query($conn, "UPDATE `cube` set `load1`='".$_POST['load']."' where `cube_name`='".$_POST['data']."'");
    }
    if($_POST['salt']==1){
        mysqli_query($conn, "UPDATE `cube` set `salt`='".$_POST['salt']."' where `cube_name`='".$_POST['data']."'");
    }
?>