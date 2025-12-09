<?php
include 'db/connection.php';

$id = $_POST['id'];
$status = $_POST['status'];

mysqli_query($conn, "UPDATE expenses SET active='$status' WHERE id='$id'");

echo "success";
?>
