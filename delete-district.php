<?php
    include 'db/connection.php';
?>
<?php
    $del=mysqli_query($conn,"DELETE FROM district where id='".$_GET['id']."'");
    if($del){
        ?>
        <script>location.href="district.php"</script>
    <?php
    } 
?>