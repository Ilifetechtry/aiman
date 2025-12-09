<?php
    include 'db/connection.php';
?>
<?php
    $sel=mysqli_query($conn,"SELECT * from service where service_name='".$_POST['name']."'");
    $fe=mysqli_fetch_assoc($sel);
    echo json_encode($fe); 
?>