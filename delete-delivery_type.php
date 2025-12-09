<?php
    include 'db/connection.php';
?>
<?php
    $del=mysqli_query($conn,"DELETE FROM delivery_type where id='".$_GET['id']."'");
    if($del){
        ?>
        <script>location.href="delivery_type.php"</script>
    <?php
    } 
?>