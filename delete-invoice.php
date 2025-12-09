<?php
include 'db/connection.php';
?>
<?php
$deldata = mysqli_query($conn, "SELECT * FROM customer1 where id='" . $_GET['id'] . "'");
if (mysqli_num_rows($deldata) > 0) {
    $feww = mysqli_fetch_assoc($deldata);
    $quantity = explode(",", $feww['quantity']);
    $specimen = explode(",", $feww['specimen']);
    $name = explode(",", $feww['category_name']);
    $chassis_no = $feww['chassis'];

    foreach ($quantity as $old_index => $bookname_old) {

        $qty_old = (int) ($quantity[$old_index] ?? 0);
        $specimen_old = (int) ($specimen[$old_index] ?? 0);
        $total_old = $qty_old + $specimen_old;

        $select_book = mysqli_query($conn, "SELECT * FROM book WHERE chassis_no='" . $chassis_no . "'");
        if ($fe_book = mysqli_fetch_assoc($select_book)) {
            echo ('qty');
            echo ($total_old);
            echo ('book');
            echo ($fe_book['book_stock']);
            $final_stock = $fe_book['book_stock'] + $total_old;
            echo ('final_stock');
            echo ($final_stock);
            $update_book = mysqli_query($conn, "UPDATE book SET book_stock='$final_stock' WHERE chassis_no='" . $chassis_no . "'");
        }
    }
}

$del = mysqli_query($conn, "DELETE FROM invoice where id='" . $_GET['id'] . "'");
$del1 = mysqli_query($conn, "DELETE FROM customer1 where id='" . $_GET['id'] . "'");

if ($del && $del1) {
?>
    <script>
        location.href = "invoice.php"
    </script>
<?php
}
?>