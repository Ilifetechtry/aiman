<?php
    include 'db/connection.php';
?>
<?php
    $sel=mysqli_query($conn,"SELECT * from customer where id='".$_POST['id']."'");
    $fe=mysqli_fetch_assoc($sel);
    echo json_encode($fe); 
?>