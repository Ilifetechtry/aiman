<?php
    include 'db/connection.php';
?>
<?php
    $del=mysqli_query($conn,"DELETE FROM brand where id='".$_GET['id']."'");
    if($del){
        ?>
        <script>location.href="brand.php"</script>
    <?php
    } 
?>