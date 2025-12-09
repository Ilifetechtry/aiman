<?php
    include 'db/connection.php';
?>
<?php
    $del=mysqli_query($conn,"DELETE FROM book where id='".$_GET['id']."'");
    if($del){
        ?>
        <script>location.href="book.php"</script>
    <?php
    } 
?>