<?php include 'sidebar.php';?>
<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg"style="margin-top:40px">
<script src="assets/js/bundle.js"></script><script src="assets/js/scripts.js"></script>
<style>
    spam{
        color:red;
    }
</style>
<?php
date_default_timezone_set('Asia/Kolkata'); // Set IST timezone
$datetime = date('Y-m-d'); // Format for datetime-local
?>
<div class="nk-content">
<div class="container">
<div class="nk-content-inner">
<div class="nk-content-body">
<div class="nk-block-head">
<div class="nk-block-head-between flex-wrap gap g-2">
<div class="nk-block-head-content"><h2 class="nk-block-title">Add Bike</h1>
<nav>
    <ol class="breadcrumb breadcrumb-arrow mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Bike</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Bike</li>
    </ol>
</nav>
</div>
<div class="nk-block-head-content"><ul class="d-flex"><li>
    <a href="book.php" class="btn btn-primary btn-md d-md-none">
        <em class="icon ni ni-eye"></em><span>View</span></a></li><li>
    <a href="book.php" class="btn btn-success d-none d-md-inline-flex"><em class="icon ni ni-eye"></em><span>View All Book</span></a></li>
    </ul></div></div></div>
<div class="nk-block">
<?php
if(isset($_POST['submit'])){
        $ins=mysqli_query($conn,"INSERT INTO book (book_id,
        purchase_bid,
        brand,
        hsn,
        book_name,
        upload_date,
        book_price,
        book_stock,
        color,
        chassis_no,
        motor_no,
        controller_no,
        charger_no,
        battery_model,
        battery_sn,
        remarks) VALUES 
        (
            '".$_POST['book_id']."',
            '".$_POST['purchase_bid']."',
            '".$_POST['brand']."',
            '".$_POST['hsn']."',
            '".$_POST['book_name']."',
            '".$_POST['upload_date']."',
            '".$_POST['book_price']."',
            '".$_POST['book_stock']."',
            '".$_POST['color']."',
            '".$_POST['chassis_no']."',
            '".$_POST['motor_no']."',
            '".$_POST['controller_no']."',
            '".$_POST['charger_no']."',
            '".$_POST['battery_model']."',
            '".$_POST['battery_sn']."',
            '".$_POST['remarks']."'
        )");
        $iddd=mysqli_insert_id($conn);
        if($_FILES["book_image"]["tmp_name"]!=''){
            $target_dir = "uploads/"; // Your upload directory
            $timestamp = time(); // Current timestamp
            $imageFileType = pathinfo($_FILES["book_image"]["name"], PATHINFO_EXTENSION); // Get file extension

            $target_file2 = $target_dir . $timestamp . "." . $imageFileType; // Rename with timestamp
            $target_file3 = $timestamp . "." . $imageFileType; // Rename with timestamp
            if($check2 !== false){
                if(move_uploaded_file($_FILES["book_image"]["tmp_name"],$target_file2)){
                $ins=mysqli_query($conn,"UPDATE book set book_image='".$target_file3."' where id='".$iddd."'");
                ?>
        <?php
            }
                }

            }
?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Added Successfully',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "book.php";
                    }
                }); 
            </script>
<?php
                
        }
?>
<form action="#" method="post" enctype="multipart/form-data">
<div class="row g-gs">
<div class="col-xxl-12">
<div class="gap gy-4">
<div class="gap-col">
<div class="card card-gutter-md">
<div class="card-body">
<div class="row g-gs">
<?php

$sel=mysqli_query($conn,"SELECT max(id) from book");
if(mysqli_num_rows($sel)>0){
    $fe=mysqli_fetch_array($sel);
    $fes=$fe[0];
    ?>
   <div class="col-lg-2">
    <div class="form-group"><label for="bookname" class="form-label">Bike Id</label>
    <div class="form-control-wrap">
        <input required type="text" class="form-control" id="bookname" name="book_id"  value="BIKE-<?=$fes+1;?>"  placeholder="Book Id">
    </div></div>

<?php
}
?>

    <!-- <div class="col-lg-2 hidden">
    <div class="form-group"><label for="bookname" class="form-label">Bike Id</label>
    <div class="form-control-wrap">
        <input required type="text" class="form-control" id="bookname" name="book_id"  value="BIKE-<?=$fes+1;?>"  placeholder="Book Id">
    </div></div> -->
</div>
<!-- PURCHASE BILL SELECT -->

<div class="col-lg-3">
    <div class="form-group">
        <label class="form-label">Brand <spam>*</spam></label>

        <?php 
        $brand_q = mysqli_query($conn, "SELECT id, brand FROM brand ORDER BY brand ASC");
        ?>

        <select class="form-control" name="brand" id="brand_select" onchange="loadBillsByBrand()" required>
            <option value="">Select Brand</option>
            <?php while($b = mysqli_fetch_assoc($brand_q)){ ?>
                <option value="<?= $b['brand']; ?>"><?= $b['brand']; ?></option>
            <?php } ?>
        </select>
    </div>
</div>


<div class="col-lg-3">
    <div class="form-group">
        <label class="form-label">Purchase Bill ID <spam>*</spam></label>

        <select name="purchase_bid" id="purchase_bid" class="form-control" required>
            <option value="">Select Bill</option>
        </select>
    </div>
</div>

 <div class="col-lg-3">
    <div class="form-group"><label for="bookname" class="form-label">HSN No<spam>*</spam></label>
<div class="form-control-wrap">
<input type="text" class="form-control" id="hsn" name="hsn">
    
</div></div></div>

<div class="col-lg-3">
    <div class="form-group"><label for="bookname" class="form-label">Bike Name <spam>*</spam></label>
<div class="form-control-wrap">
    <input required type="text" class="form-control" id="bookname" name="book_name" placeholder="Book Name"></div></div></div>


    <div class="col-lg-3">
    <div class="form-group"><label for="bookname" class="form-label">Uploaded Date<spam>*</spam></label>
<div class="form-control-wrap">
<input type="date" id="datetime" name="upload_date" value="<?=$datetime;?>" class='form-control'>
    
</div></div></div>
    
<div class="col-lg-2">
<div class="form-group"><label for="baseprice" class="form-label">Bike Price <spam>*</spam></label>
<div class="form-control-wrap">
    <input required type="number" class="form-control" id="baseprice" name="book_price" placeholder="Book Price"></div></div></div>
    <div class="col-lg-2">
        <div class="form-group">
            <label for="baseprice" class="form-label">Bike Stock <spam>*</spam></label>
            <div class="form-control-wrap">
                <input required type="number" class="form-control" id="basestock" name="book_stock" placeholder="Book stock" value="1">
            </div>
        </div>
    </div>
    <div class="col-lg-3">
    <div class="form-group">
        <label class="form-label">Color</label>
        <input type="text" name="color" class="form-control">
    </div>
</div>

<!-- CHASSIS NO -->
<div class="col-lg-3">
    <div class="form-group">
        <label class="form-label">Chassis No</label>
        <input type="text" name="chassis_no" class="form-control">
    </div>
</div>

<!-- MOTOR NO -->
<div class="col-lg-3">
    <div class="form-group">
        <label class="form-label">Motor No</label>
        <input type="text" name="motor_no" class="form-control">
    </div>
</div>

<!-- CONTROLLER NO -->
<div class="col-lg-3">
    <div class="form-group">
        <label class="form-label">Controller No</label>
        <input type="text" name="controller_no" class="form-control">
    </div>
</div>

<!-- CHARGER NO -->
<div class="col-lg-3">
    <div class="form-group">
        <label class="form-label">Charger No</label>
        <input type="text" name="charger_no" class="form-control">
    </div>
</div>

<!-- BATTERY MODEL -->
<div class="col-lg-3">
    <div class="form-group">
        <label class="form-label">Battery Model</label>
        <input type="text" name="battery_model" class="form-control">
    </div>
</div>

<!-- BATTERY SERIAL NO -->
<div class="col-lg-3">
    <div class="form-group">
        <label class="form-label">Battery Serial No</label>
        <input type="text" name="battery_sn" class="form-control">
    </div>
</div>
    <div class="col-lg-12">
        <div class="form-group">
            <label class="form-label">Bike Image</label>
            <div class="pt-3">
                <input id="book_image" name="book_image" type="file" max="1" accept='image/*' class='form-control'>
            </div>
        </div>
    </div>  
    <div class="col-lg-12">
<div class="form-group"><label for="baseprice" class="form-label">Remarks</label>
<div class="form-control-wrap">
    <textarea name="remarks" placeholder="Remarks" id="" class="form-control"></textarea>
    </div></div></div>
    </div>
    </div>
    </div>
    </div>
</div></div></div>
<br>
    <div class="row">
        <div class="col-9"></div>
        <div class="col-3 text-end">
            <input type="submit" name="submit" class="btn btn-primary" style="" value="Save Changes">
        </div>
    </div>

</div></form>
</div></div></div>
</body>

<script>
function fillExpenseDetails(select){
    let brand = select.options[select.selectedIndex].getAttribute("data-brand");

    if(select.value === ""){
        document.getElementById("brand_box").style.display = "none";
        return;
    }

    document.getElementById("brand_box").style.display = "block";

    document.getElementById("brand").value = brand;
}
</script>

<!-- <script>
function loadExpenseDetails(expenseId){
    if(expenseId === ""){
        document.getElementById("brand_box").style.display = "none";
        document.getElementById("hsn_box").style.display = "none";
        return;
    }

    // Fetch expense data via AJAX
    fetch("get_expense_data.php?id=" + expenseId)
    .then(response => response.json())
    .then(data => {
        document.getElementById("brand_box").style.display = "block";
        document.getElementById("hsn_box").style.display = "block";

        document.getElementById("brand").value = data.brand;
        document.getElementById("hsn").value = data.hsn;
    });
}
</script> -->
<script>
function loadBillsByBrand() {
    let brand = document.getElementById("brand_select").value;

    // reset list
    document.getElementById("purchase_bid").innerHTML = "<option value=''>Select Bill</option>";

    if (brand === "") return;

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "load_bills.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        document.getElementById("purchase_bid").innerHTML = this.responseText;
    };

    xhr.send("brand=" + brand);
}
</script>

</html>