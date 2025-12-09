<?php
include 'db/connection.php';

$brand = $_POST['brand'];

$q = mysqli_query($conn, "
    SELECT id, bid, date
    FROM expenses
    WHERE brand = '$brand' AND active = 1
    ORDER BY id DESC
");

echo '<option value="">Select Bill</option>';

while ($row = mysqli_fetch_assoc($q)) {
    echo '<option value="'.$row['id'].'">'.
            $row['bid'].' - '.date("d-m-Y", strtotime($row['date'])).
         '</option>';
}
?>