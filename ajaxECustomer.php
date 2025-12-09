<?php
    include 'db/connection.php';
?>
<?php
    $query = $_POST["query"];
    $sql = mysqli_query($conn,"SELECT cname FROM customer WHERE cname LIKE '%$query%'");
    if(mysqli_num_rows($sql)>0){
        while($fe = mysqli_fetch_assoc($sql)){
            $suggestions[] = $fe['cname'];
        }
    }
    echo json_encode($suggestions);
?>
