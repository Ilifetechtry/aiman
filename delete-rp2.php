<?php
    include 'db/connection.php';
?>
<?php
    $del=mysqli_query($conn,"DELETE FROM billing where id='".$_GET['id']."'");
    if($del){
        ?>
        <script>location.href="report2.php"</script>
    <?php
    } 
?>