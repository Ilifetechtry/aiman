<?php include 'sidebar.php';
$sel2=mysqli_query($conn,"SELECT * FROM users where id='".$_SESSION['user_id']."'");
if(mysqli_num_rows($sel2)>0){
    $ft=mysqli_fetch_assoc($sel2);
}
?>
<!DOCTYPE html><html lang="en">
<head>
<meta charset="utf-8">
<meta name="author" content="Softnio">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>K7 Groups</title>
<link rel="shortcut icon" href="images/title.png">
<link rel="stylesheet" href="assets/css/style20d4.css?v1.1.2">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg" style="margin-top:50px">
<div class="nk-app-root">
<div class="nk-main">
<div class="nk-content">
<div class="container">
<div class="nk-content-inner">
<div class="nk-content-body">
<div class="nk-block-head">
<div class="nk-block-head-between flex-wrap gap g-2">
<div class="nk-block-head-content"><h2 class="nk-block-title">Expenses</h2><nav><ol class="breadcrumb breadcrumb-arrow mb-0"><li class="breadcrumb-item"><a href="#">Home</a></li><li class="breadcrumb-item active" aria-current="page">Expenses</li></ol></nav></div>
<div class="nk-block-head-content">
    <ul class="d-flex">
    <li><button onclick="Export()" class="btn btn-dark"><span class="ni ni-file" style="font-size:22px;font-weight:400"></span>&nbsp;Export as PDF</button></li>
    <li>&nbsp;&nbsp;<button onclick="ExportToExcel('xlsx')" class=" btn btn-success"><span class="ni ni-dashboard" style="font-size:22px;font-weight:400"></span>&nbsp;Export as Excel</button></li>
    <li>&nbsp;&nbsp;<a href="allexpenses.php" class="btn btn-primary"><span class="ni ni-eye" style="font-size:22px;font-weight:400"></span>&nbsp;&nbsp;View All Expenses</a></li>
</ul></div></div></div>
<div class="nk-block">
<div class="card">
<table id="maintable" class="datatable-init table display nowrap" data-nk-container="table-responsive">
<thead class="table-light">
<div class="row">
    <form method="post">
        <div class="col-6 m-4 d-flex">
            <div class="col-4">
                From:<input id="min" name="min" class="form-control" type="date" value="<?=date('Y-m-d');?>">
            </div>
            <div class="col-4" style='margin-left:40px;'>
                To:<input id="max" name="max" class="form-control" type="date" value="<?=date('Y-m-d');?>">
            </div>
            <div class="col-4" style='margin-left:40px;margin-top:25px'>
                <input  name="submit" class="btn btn-danger" type="submit" value="Search">
            </div>
        </div>
    </form>
    </div>
<tr>
<th class="tb-col tb-col-check" data-sortable="false">
<div class="form-check"><input class="form-check-input" type="checkbox" value=""></div></th>
<th class="tb-col"><span class="overline-title">Id</span></th>
<th class="tb-col"><span class="overline-title">Date</span></th>
<th class="tb-col tb-col-md"><span class="overline-title">Unit</span></th>
<th class="tb-col tb-col-md"><span class="overline-title">price</span></th>
</tr>
</thead>
<tbody>
<?php
$nowdate=date('Y-m-d');
if(isset($_POST['submit'])){
    $sel5a=mysqli_query($conn,"SELECT * FROM product where date<='".$_POST['max']."' and date>='".$_POST['min']."'");
    if(mysqli_num_rows($sel5a)>0){
        while($fef1=mysqli_fetch_assoc($sel5a)){

        ?>
        <tr>
    <td class="tb-col tb-col-check">
<div class="form-check">
    <input class="form-check-input" type="checkbox" value="" id="pid1"></div></td>
<td class="tb-col title"><?=$fef1['ecom_id'];?></td>
<td class="tb-col tb-col-md"><span><?=$fef1['date']?></span></td>
<td class="tb-col tb-col-md"><span class="badge bg-success">Genral</span></td>
<td class="tb-col tb-col-md"><span><?=$fef1['base_price']?></span></td>
</tr>
</tbody>
<?php
        }
    }
    $sel1a=mysqli_query($conn,"SELECT sum(base_price) FROM product where date<='".$_POST['max']."' and date>='".$_POST['min']."'");
    if(mysqli_num_rows($sel1a)>0){
        $fg2=mysqli_fetch_array($sel1a);
        $sumof1a=$fg2[0];
    }


    $sel5=mysqli_query($conn,"SELECT * FROM salesorder where date<='".$_POST['max']."' and date>='".$_POST['min']."'");
    if(mysqli_num_rows($sel5)>0){
        while($fef=mysqli_fetch_assoc($sel5)){

        ?>
        <tr>
    <td class="tb-col tb-col-check">
<div class="form-check">
    <input class="form-check-input" type="checkbox" value="" id="pid1"></div></td>
<td class="tb-col title"><?=$fef['bid'];?></td>
<td class="tb-col tb-col-md"><span><?=$fef['date']?></span></td>
<td class="tb-col tb-col-md"><span class="badge bg-danger">Sales Order</span></td>
<td class="tb-col tb-col-md"><span><?=$fef['vendor_charge']?></span></td>
</tr>
</tbody>
<?php
        }
    }
    $sel1=mysqli_query($conn,"SELECT sum(vendor_charge) FROM salesorder where date<='".$_POST['max']."' and date>='".$_POST['min']."'");
    if(mysqli_num_rows($sel1)>0){
        $fg1=mysqli_fetch_array($sel1);
        $sumof1=$fg1[0];
    }
    $sel=mysqli_query($conn,"SELECT * FROM maintainance where date<='".$_POST['max']."' and date>='".$_POST['min']."' and ate=1");
    if(mysqli_num_rows($sel)>0){
        while($fe=mysqli_fetch_assoc($sel)){
?>            
        <tr>
    <td class="tb-col tb-col-check">
<div class="form-check">
    <input class="form-check-input" type="checkbox" value="" id="pid1"></div></td>
<td class="tb-col title"><?=$fe['mid'];?></td>
<td class="tb-col tb-col-md"><span><?=$fe['date']?></span></td>
<td class="tb-col tb-col-md"><span class="badge bg-secondary">Maintainances</span></td>
<td class="tb-col tb-col-md"><span><?=$fe['charge']?></span></td>
</tr>
</tbody>
<?php
        }
    }
    $sel1=mysqli_query($conn,"SELECT sum(charge) FROM maintainance where date<='".$_POST['max']."' and date>='".$_POST['min']."'");
    if(mysqli_num_rows($sel1)>0){
        $fg=mysqli_fetch_array($sel1);
        $sumof=$fg[0];
?>
<?php
if($sumof!=0 || $sumof1!=0 || $sumof1a!=0){
?>
<tfoot><tr>
    <td colspan="4" style="background-color:#1db220;color:white"></td>
    <td class="tb-col" style="background-color:#1db220;color:white">Grand Total <b style="margin-left:50px;">Rs.<?=$sumof+$sumof1+$sumof1a;?>.00</b></td></tr></tfoot>
<?php
}
else{
    ?>
    <td colspan="4"><p style="margin-left:420px">No Expenses Found</p></td>
    <?php
}
?>
<?php    
    }
}  






else{
    $sel3=mysqli_query($conn,"SELECT * FROM product where date='".$nowdate."'");
    if(mysqli_num_rows($sel3)>0){
        while($fe1=mysqli_fetch_assoc($sel3)){
?>            
        <tr>
    <td class="tb-col tb-col-check">
<div class="form-check">
    <input class="form-check-input" type="checkbox" value="" id="pid1"></div></td>
<td class="tb-col title"><?=$fe1['ecom_id'];?></td>
<td class="tb-col tb-col-md"><span><?=$fe1['date']?></span></td>
<td class="tb-col tb-col-md"><span class="badge bg-success">Genral</span></td>
<td class="tb-col"><?=$fe1['base_price'];?></td>
</tr>
</tbody>
<?php
    }
    
}
$sel3a=mysqli_query($conn,"SELECT sum(base_price) FROM product where date='".$nowdate."'");
    if(mysqli_num_rows($sel3a)>0){
        $fh=mysqli_fetch_array($sel3a);
        $sum1q=$fh[0];
    }
?>


<?php
$sel3=mysqli_query($conn,"SELECT * FROM salesorder where date='".$nowdate."'");
    if(mysqli_num_rows($sel3)>0){
        while($fe1=mysqli_fetch_assoc($sel3)){
?>            
        <tr>
    <td class="tb-col tb-col-check">
<div class="form-check">
    <input class="form-check-input" type="checkbox" value="" id="pid1"></div></td>
<td class="tb-col title"><?=$fe1['bid'];?></td>
<td class="tb-col tb-col-md"><span><?=$fe1['date']?></span></td>
<td class="tb-col tb-col-md"><span class="badge bg-danger">Salesorder</span></td>
<td class="tb-col"><?=$fe1['vendor_charge'];?></td>
</tr>
</tbody>
<?php
    }    
    
}
$sel3a=mysqli_query($conn,"SELECT sum(vendor_charge) FROM salesorder where date='".$nowdate."'");
    if(mysqli_num_rows($sel3a)>0){
        $fh=mysqli_fetch_array($sel3a);
        $sum1so=$fh[0];
    }

?>


<?php
$sel333=mysqli_query($conn,"SELECT * FROM maintainance where date='".$nowdate."'");
    if(mysqli_num_rows($sel333)>0){
        while($fe13=mysqli_fetch_assoc($sel333)){
?>            
        <tr>
    <td class="tb-col tb-col-check">
<div class="form-check">
    <input class="form-check-input" type="checkbox" value="" id="pid1"></div></td>
<td class="tb-col title"><?=$fe13['mid'];?></td>
<td class="tb-col tb-col-md"><span><?=$fe13['date']?></span></td>
<td class="tb-col tb-col-md"><span class="badge bg-dark">Maintainance</span></td>
<td class="tb-col"><?=$fe13['charge'];?></td>
</tr>
</tbody>
<?php
        }
    
}
$sel3a1=mysqli_query($conn,"SELECT sum(charge) FROM maintainance where date='".$nowdate."'");
    if(mysqli_num_rows($sel3a1)>0){
        $fhm=mysqli_fetch_array($sel3a1);
        $sum1m=$fhm[0];
    }

?>


<?php
if($sum1m!=0 && $sum1so!=0 && $sum1q!=0){
?>
<tfoot><tr>
<td colspan="4" style="background-color:#1db220;color:white"></td>
<td class="tb-col" style="background-color:#1db220;color:white">Grand Total <b style="margin-left:50px;">Rs.<?=$sum1so+$sum1q+$sum1m;?>.00</b></td></tr></tfoot>
<?php    
    }
    else{
        ?>
        <td colspan="4"><p style="margin-left:420px">No Expenses Found</p></td>  
        <?php
    }
}

    
?>

<br><br>
</div>
</div>
</form>
</body>
<script src="assets/js/bundle.js"></script>
<script src="assets/js/scripts.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
</html>


<script>
    function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('maintable');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('MySheetName.' + (type || 'xlsx')));
    }
</script>
<script type="text/javascript">
        function Export() {
            html2canvas(document.getElementById('maintable'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Table.pdf");
                }
            });
        }
    </script>



