<?php
    include 'db/connection.php';
?>
<?php
    $del=mysqli_query($conn,"DELETE FROM expenses where id='".$_GET['id']."'");

    if($del){
        ?>
        <script>location.href="expenses.php"</script>
        <?php
    }  
?>