<?php
    include 'db/connection.php';
?>
<?php
    $del=mysqli_query($conn,"DELETE FROM quotation where id='".$_GET['id']."'");
    if($del){
        ?>
        <script>location.href="quotation_list.php"</script>
    <?php
    } 
?>