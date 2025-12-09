<?php
    session_start();
?>
<?php
if($_SESSION['user_id']=="")
{
    header("Location: index.php");
}
?>
