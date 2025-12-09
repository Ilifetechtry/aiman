<?php
    include 'sidebar.php';
    include 'common/invoice_styles.php';
?>
<?php
$sel=mysqli_query($conn,"SELECT * FROM customer1 where id='".$_GET['id']."'");
if(mysqli_num_rows($sel)>0){
    $fe=mysqli_fetch_assoc($sel);
?>
<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg">
<div class="nk-content" style="margin-top:40px">
<div class="nk-content">
    <div class="container">
    <div class="nk-content-inner">
    <div class="nk-content-body">
    <div class="nk-block-head">
    <div class="nk-block-head-between flex-wrap gap g-2">
    <div class="nk-block-head-content">
    <h1 class="nk-block-title">Credit History</h1>
        </div>
<div class="nk-block-head-content"><ul class="d-flex">


<li><a href="invoice.php" class="btn btn-danger">Home</a></li>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li>
        <button onclick="Export()" class="btn btn-dark" id="exb">
        <span class="ni ni-file" style="font-size:22px;font-weight:400"></span>&nbsp;Export as PDF</button></li>

</ul></div></div></div>
<div class="nk-block">
<div class="card">
<div class="nk-invoice"  id="maintable">
<table border="1" cellpadding='10'>
    <tr>
       
        <td colspan='7' align='center'>
            <div class="d-flex myDiv22">
                <div class="img">
                    <img src="images/logo1.png">
                </div>
                <div class="content">
                    <b>WINNER PUBLICATIONS</b>
                    <br>
                    <span>8 / 378-2, Seeradi Sai Nagar, Bikshandarkoil- Post.</span>
                    <br>
                    <span>Trichy – 621216.</span>
                    <br>
                    <a class='urls' href="mailto:winnernotes123@gmail.com">winnernotes123@gmail.com</a>
                    <p>Phone: <a href="tel:9994338123" class='urls' >9994338123</a></p>
                </div>
            </div>

           
        </td>
    </tr>
    <tr>
        <td colspan='5'>
            <b>INVOICE - <?="#".$fe['id']?></b>
        </td>
        <td>
            <b>Bill Date: </b><?php echo date("d-m-Y", strtotime($fe['date']));?>
        </td>
    </tr>
    <tr>
        
        <td colspan='6'>
            <b>Name:</b><?=$fe['cname'];?>
            <br>
            <b>Phone:</b><?=$fe['mobile'];?>
        </td>
    </tr>
    <?php
    $i=1;
    $selec=mysqli_query($conn,"SELECT * FROM credit1 where bill_id='".$_GET['id']."'");
    $selec1=mysqli_query($conn,"SELECT * FROM customer1 where id='".$_GET['id']."'");
    $fe1=mysqli_fetch_assoc($selec1);
    if(mysqli_num_rows($selec)>0){
        ?>
                    <tr>
                        <th>SI.NO</th>
                        <th>Date</th>
                        <th>Total Amount</th>
                        <th colspan='2'>Paid Amount</th>
                        <th>Balance Amount</th>
                    </tr>
                    <?php
                    while($fe=mysqli_fetch_assoc($selec)){
                    ?>
                    <tr>
                        <td><?=$i++?></td>
                        <td><?=date("d-m-Y", strtotime($fe['date']));?></td>
                        <td>Rs.<?=$fe1['total'];?></td>
                        <td  colspan='2'>Rs.<?=$fe['paid_amount']?></td>
                        <td>Rs.<?=$fe['balance_amount']?></td>
                    </tr>
                    <?php
                        }
                    ?>
                
        <?php
    }
    ?>



<div class="mt-5">

</div></div></div></div></div></div></div></div>                     
    <?php
}
?>
</html>

<?php
    include 'common/billing_js.php';
?>