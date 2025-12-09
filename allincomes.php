<?php include 'sidebar.php';
$sel2=mysqli_query($conn,"SELECT * FROM users where id='".$_SESSION['user_id']."'");
if(mysqli_num_rows($sel2)>0){
    $ft=mysqli_fetch_assoc($sel2);
}
?>
<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg" style="margin-top:50px">
<div class="nk-app-root">
<div class="nk-main">
<div class="nk-content">
<div class="container">
<div class="nk-content-inner">
<div class="nk-content-body">
<div class="nk-block-head">
<div class="nk-block-head-between flex-wrap gap g-2">
<div class="nk-block-head-content"><h2 class="nk-block-title">All Income</h2><nav><ol class="breadcrumb breadcrumb-arrow mb-0"><li class="breadcrumb-item"><a href="#">Home</a></li><li class="breadcrumb-item active" aria-current="page">All Income</li></ol></nav></div>
<div class="nk-block-head-content">
<ul class="d-flex">
    <li><button onclick="Export()" class="btn btn-dark"><span class="ni ni-file" style="font-size:22px;font-weight:400"></span>&nbsp;Export as PDF</button></li>
    <li>&nbsp;&nbsp;<button onclick="ExportToExcel('xlsx')" class=" btn btn-success"><span class="ni ni-dashboard" style="font-size:22px;font-weight:400"></span>&nbsp;Export as Excel</button></li>
</ul></div></div></div>
<div class="nk-block">
<div class="card">
<table id="maintable" class="datatable-init table" data-nk-container="table-responsive">
<thead class="table-light">
<div class="row">
    <form method="post">
        <div class="col-6 m-4 d-flex">
            <div class="col-4">
                From:<input id="min" name="min" class="form-control" type="date" value="">
            </div>
            <div class="col-4" style='margin-left:40px;'>
                To:<input id="max" name="max" class="form-control" type="date" value="">
            </div>
            <div class="col-4" style='margin-left:40px;margin-top:25px'>
                <input  name="submit" class="btn btn-danger" type="submit" value="Search">
            </div>
        </div>
    </form>
    </div>
<tr>

<th class="tb-col"><span class="overline-title">Invoice Id</span></th>
<th class="tb-col"><span class="overline-title">Date</span></th>
<th class="tb-col"><span class="overline-title">Customer Name</span></th>
<th class="tb-col tb-col-md"><span class="overline-title">Phone</span></th>
<th class="tb-col"><span class="overline-title">Place</span></th>
<th class="tb-col tb-col-md"><span class="overline-title">Total</span></th>
<th class="tb-col tb-col-md"><span class="overline-title">Preview</span></th>
</tr>
</thead>
<tbody>
<?php
$nowdate=date('Y-m-d');
if(isset($_POST['submit'])){
    $sel=mysqli_query($conn,"SELECT * FROM customer1 where date<='".$_POST['max']."' and date>='".$_POST['min']."'");
    if(mysqli_num_rows($sel)>0){
        while($fe=mysqli_fetch_assoc($sel)){
?>            
        <tr>
<td class="tb-col title">
<?php 
    $a=explode(",", $fe['id']);
    foreach ($a as $a1){
        echo "#".(12000+$a1)."<br>";
    }
?></td>
<td class="tb-col tb-col-md"><span><?php echo date("d-m-Y", strtotime($fe['date']));?></span></td>
<td class="tb-col tb-col-md"><span><?=$fe['cname']?></span></td>
<td class="tb-col tb-col-md"><span><?=$fe['mobile']?></span></td>
<td class="tb-col tb-col-md"><span><?=$fe['city']?></span></td>

<td class="tb-col tb-col-md"><span>Rs.<?=$fe['total']?></span></td>
<td class="tb-col tb-col-md"> <a href="billing-invoice1.php?id=<?=$fe['id'];?>" class="btn btn-sm btn-lighter"> Preview </a></td>
</tr>
</tbody>
<?php
        }
    }
    $sel1=mysqli_query($conn,"SELECT sum(total) FROM customer1 where date<='".$_POST['max']."' and date>='".$_POST['min']."'");
    if(mysqli_num_rows($sel1)>0){
        $fg=mysqli_fetch_array($sel1);
        $sumof=$fg[0];
?>
<?php
        if($sumof != 0){
            ?>
        <tfoot><tr>
            <td colspan="6" style="background-color:#15b423"></td>
            <td class="tb-col" style="background-color:#15b423;color:white">Grand Total:<b style="margin-left:50px;">Rs.<?=$sumof;?></td></tr></tfoot>

        <?php
        }
        else{
            ?>
            <td colspan="7"><center>No Income Found</center></td>  
            <?php
        }

    }  

}
else{
    $sel3=mysqli_query($conn,"SELECT * FROM customer1");
    if(mysqli_num_rows($sel3)>0){
        while($fe=mysqli_fetch_assoc($sel3)){
?>            
        <tr>
<td class="tb-col title">
<?php 
    $a=explode(",", $fe['id']);
    foreach ($a as $a1){
        echo "#".(12000+$a1)."<br>";
    }
?></td>
<td class="tb-col tb-col-md"><span><?php echo date("d-m-Y", strtotime($fe['date']));?></span></td>
<td class="tb-col tb-col-md"><span><?=$fe['cname']?></span></td>
<td class="tb-col tb-col-md"><span><?=$fe['mobile']?></span></td>
<td class="tb-col tb-col-md"><span><?=$fe['city']?></span></td>

<td class="tb-col tb-col-md"><span>Rs.<?=$fe['total']?></span></td>
<td class="tb-col tb-col-md"> <a href="billing-invoice1.php?id=<?=$fe['id'];?>" class="btn btn-sm btn-lighter"> Preview </a></td>
</tr>
</tbody>
<?php
        
    }
}
$sel3a=mysqli_query($conn,"SELECT sum(total) FROM customer1");
    if(mysqli_num_rows($sel3a)>0){
        $fh=mysqli_fetch_array($sel3a);
        $sum1=$fh[0];
    }
?>
<?php
if($sum1!=0){
    ?>
    <tfoot><tr>
    <td colspan="6"></td>
    <td class="tb-col" style="background-color:#15b423;color:white">Grand Total:<b style="margin-left:50px;">Rs.<?=$sum1;?></b></td></tr></tfoot>
    <?php    
    
        }
        else{
            ?>
            <td colspan="7"><center>No Income Found</center></td>  
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
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
        