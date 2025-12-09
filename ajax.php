<?php
    include 'db/connection.php';
?>
<?php
    // $sel=mysqli_query($conn,"SELECT * from book where book_name='".$_POST['name']."'");
    // $fe=mysqli_fetch_assoc($sel);
    // echo json_encode($fe); 
?>

<?php
$chassis = $_POST['chassis_no'];

$q = mysqli_query($conn, "SELECT * FROM book WHERE chassis_no = '$chassis'");
$r = mysqli_fetch_assoc($q);

echo json_encode($r);
?>