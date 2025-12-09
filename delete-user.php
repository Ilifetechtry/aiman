<?php
    include 'db/connection.php';
?>
<?php
    $del=mysqli_query($conn,"DELETE FROM users where id='".$_GET['id']."'");
    if($del){
        ?>
        <script>location.href="user.php"</script>
    <?php
    } 
?>