<?php
include 'db/connection.php';
print_r($_POST['sales']);

$load=0;
$sales=0;
    $chq = mysqli_query($conn, "select * from cube where cube_name='".$_POST['data']."'");
    if(mysqli_num_rows($chq)>0){
        $fc=mysqli_fetch_assoc($chq);
        $n=$fc['sales'];
        $a=$_POST['sales'];
        $sl=$n-$a;
        if($sl>0){
            mysqli_query($conn, "UPDATE `cube` set `sales`='".$sl."' where `cube_name`='".$_POST['data']."'");
        }
        else if($sl==0){
            mysqli_query($conn, "UPDATE `cube` set `sales`='".$sl."',load1='".$load."',salt='0' where `cube_name`='".$_POST['data']."'");
        }
    }
?>