<?php
    include 'db/connection.php';
?>
<?php
    $del=mysqli_query($conn,"DELETE FROM customer where id='".$_GET['id']."'");

    if($del){
        ?>
        <script>location.href="customer.php"</script>
        <?php
    }  
?>