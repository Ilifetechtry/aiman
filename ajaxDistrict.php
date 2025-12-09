<?php
    include 'db/connection.php';
?>
<?php
    $query = $_POST["query"];
    $sql = mysqli_query($conn,"SELECT district FROM district WHERE district LIKE '%$query%'");
    if(mysqli_num_rows($sql)>0){
        while($fe = mysqli_fetch_assoc($sql)){
            $suggestions[] = $fe['district'];
        }
    }
    echo json_encode($suggestions);
?>
