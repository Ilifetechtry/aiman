<?php
    include 'db/connection.php';
?>
<?php
    $del=mysqli_query($conn,"DELETE FROM product where id='".$_GET['id']."'");
    if($del){
        ?>
        <script>location.href="report3.php"</script>
    <?php
    } 
?>