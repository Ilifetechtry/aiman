<?php include 'sidebar.php';?>
<?php 
    $sel=mysqli_query($conn,"SELECT * FROM users WHERE id='".$_GET['id']."' ");
    if(mysqli_num_rows($sel)>0){
        $ft=mysqli_fetch_assoc($sel);
    }
?>
<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg" style="margin-top:50px">
<form method="post">
<div class="row g-gs">    
<div class="col-xxl-12">
<div class="gap gy-4">
<div class="gap-col">
<div class="card card-gutter-md">
<div class="card-body">
<button onclick="history.go(-1)" class="btn btn-danger btn-md"  style='margin-left:90%'>Back</button>    
<div class="row g-gs">
<h1>User Permission</h1>
<div class="col-lg-2 mb-4">
<img src=<?=$ft['image'];?> style="box-shadow:2px 2px 10px black" height="160px" width="130px">
</div>
<div class="col-lg-4">
<h3 style="color:red"><?=$ft['role'];?></h3>
<b><?=$ft['name'];?></b><br>
<b><?=$ft['age'];?></b><br>
<b><?=$ft['gender'];?></b><br>
<b><?php echo $ft['email'];?></b><br>
<b><?php echo $ft['city'];?></b><br>
</div>
<div class="col-lg-4">
    <input type="radio" value="1"<?php if($ft['block']=="1"){echo "checked";}?> name="block">&nbsp;Block
    <input type="radio" style="margin-left:40px;"value="0"<?php if($ft['block']=="0"){echo "checked";}?> name="block">&nbsp;Unblock
</div>
</div>
<div class="col-lg-12">
<table class="table">
<thead class="table-light">
<tr><th class="tb-col"><span class="overline-title"></span></th>
<th class="tb-col"><span class="overline-title">Read</span></th>
<th class="tb-col"><span class="overline-title">Write</span></th>
<th class="tb-col"><span class="overline-title">Disable</span></th></tr>
</thead>
<tbody>
    <tr><td class="tb-col"><span class="overline-title">Sales</span></td>
    <td class="tb-col"><input type="radio" value="0"<?php if($ft['sales']=="0"){echo "checked";}?> name="sales" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="1"<?php if($ft['sales']=="1"){echo "checked";}?> name="sales" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="2"<?php if($ft['sales']=="2"){echo "checked";}?> name="sales" class="form-radio"/></td></tr>
    
    
    <tr><td class="tb-col"><span class="overline-title">Load</span></td>
    <td class="tb-col"><input type="radio" value="0"<?php if($ft['load1']=="0"){echo "checked";}?> name="load1" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="1"<?php if($ft['load1']=="1"){echo "checked";}?> name="load1" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="2"<?php if($ft['load1']=="2"){echo "checked";}?> name="load1" class="form-radio"/></td></tr>

    <tr><td class="tb-col"><span class="overline-title">Customer</span></td>
    <td class="tb-col"><input type="radio" value="0" <?php if($ft['customer']=="0"){echo "checked";}?> name="customer" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="1" <?php if($ft['customer']=="1"){echo "checked";}?> name="customer" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="2" <?php if($ft['customer']=="2"){echo "checked";}?> name="customer" class="form-radio"/></td>
    </tr>
    
    
    <tr><td class="tb-col"><span class="overline-title">CRM</span></td>
    <td class="tb-col"><input type="radio" value="0" <?php if($ft['crm']=="0"){echo "checked";}?> name="crm" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="1" <?php if($ft['crm']=="1"){echo "checked";}?> name="crm" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="2" <?php if($ft['crm']=="2"){echo "checked";}?> name="crm" class="form-radio"/></td>
    </tr>


    <tr><td class="tb-col"><span class="overline-title">Enquiry</span></td>
    <td class="tb-col"><input type="radio" value="0" <?php if($ft['enquiry']=="0"){echo "checked";}?> name="enquiry" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="1" <?php if($ft['enquiry']=="1"){echo "checked";}?> name="enquiry" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="2" <?php if($ft['enquiry']=="2"){echo "checked";}?> name="enquiry" class="form-radio"/></td>
    </tr>



    <tr><td class="tb-col"><span class="overline-title">Procurement</span></td>
    <td class="tb-col"><input type="radio" value="0"<?php if($ft['procurement']=="0"){echo "checked";}?> name="procurement" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="1"<?php if($ft['procurement']=="1"){echo "checked";}?> name="procurement" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="2"<?php if($ft['procurement']=="2"){echo "checked";}?> name="procurement" class="form-radio"/></td></tr>
     
    
    <tr><td class="tb-col"><span class="overline-title">Quotation</span></td>
    <td class="tb-col"><input type="radio" value="0"<?php if($ft['quotation']=="0"){echo "checked";}?> name="quotation" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="1"<?php if($ft['quotation']=="1"){echo "checked";}?> name="quotation" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="2"<?php if($ft['quotation']=="2"){echo "checked";}?> name="quotation" class="form-radio"/></td></tr>


    <tr><td class="tb-col"><span class="overline-title">Invoice</span></td>
    <td class="tb-col"><input type="radio" value="0"<?php if($ft['invoice']=="0"){echo "checked";}?> name="invoice" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="1"<?php if($ft['invoice']=="1"){echo "checked";}?> name="invoice" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="2"<?php if($ft['invoice']=="2"){echo "checked";}?> name="invoice" class="form-radio"/></td></tr>

    <tr><td class="tb-col"><span class="overline-title">Sales Order</span></td>
    <td class="tb-col"><input type="radio" value="0"<?php if($ft['sales_order']=="0"){echo "checked";}?> name="sales_order" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="1"<?php if($ft['sales_order']=="1"){echo "checked";}?> name="sales_order" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="2"<?php if($ft['sales_order']=="2"){echo "checked";}?> name="sales_order" class="form-radio"/></td></tr>

    
    <tr><td class="tb-col"><span class="overline-title">Accounts</span></td>
    <td class="tb-col"><input type="radio" value="0" <?php if($ft['accounts']=="0"){echo "checked";}?> name="accounts" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="1" <?php if($ft['accounts']=="1"){echo "checked";}?> name="accounts" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="2" <?php if($ft['accounts']=="2"){echo "checked";}?> name="accounts" class="form-radio"/></td>
    </tr>
    

    <tr><td class="tb-col"><span class="overline-title">Credit</span></td>
    <td class="tb-col"><input type="radio" value="0" <?php if($ft['credit']=="0"){echo "checked";}?> name="credit" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="1" <?php if($ft['credit']=="1"){echo "checked";}?> name="credit" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="2" <?php if($ft['credit']=="2"){echo "checked";}?> name="credit" class="form-radio"/></td>
    </tr>


    <tr><td class="tb-col"><span class="overline-title">Inventory</span></td>
    <td class="tb-col"><input type="radio" value="0"<?php if($ft['inventory']=="0"){echo "checked";}?> name="inventory" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="1"<?php if($ft['inventory']=="1"){echo "checked";}?> name="inventory" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="2"<?php if($ft['inventory']=="2"){echo "checked";}?> name="inventory" class="form-radio"/></td>
</tr>
    <tr><td class="tb-col"><span class="overline-title">Stocks</span></td>
    <td class="tb-col"><input type="radio" value="0"<?php if($ft['stocks']=="0"){echo "checked";}?>  name="stocks" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="1"<?php if($ft['stocks']=="1"){echo "checked";}?> name="stocks" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="2"<?php if($ft['stocks']=="2"){echo "checked";}?> name="stocks" class="form-radio"/></td>
</tr>
    <tr><td class="tb-col"><span class="overline-title">Maintainance & Services</span></td>
    <td class="tb-col"><input type="radio" value="0"<?php if($ft['service']=="0"){echo "checked";}?> name="service" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="1"<?php if($ft['service']=="1"){echo "checked";}?> name="service" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="2"<?php if($ft['service']=="2"){echo "checked";}?> name="service" class="form-radio"/></td>
</tr>
    <tr><td class="tb-col"><span class="overline-title">Reports</span></td>
    <td class="tb-col"><input type="radio" value="0"<?php if($ft['reports']=="0"){echo "checked";}?> name="reports" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="1"<?php if($ft['reports']=="1"){echo "checked";}?> name="reports" class="form-radio"/></td>
    <td class="tb-col"><input type="radio" value="2"<?php if($ft['reports']=="2"){echo "checked";}?> name="reports" class="form-radio"/></td>
</tr>
    <tr><td><input type="submit" value="Save" name="submit" class="btn btn-primary"  style="margin-left:140%;margin-top:30px;"></td></tr>
</tbody>
</form>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $upd=mysqli_query($conn,"UPDATE users 
        set sales='".$_POST['sales']."',
        load1='".$_POST['load1']."',
        procurement='".$_POST['procurement']."',
        customer='".$_POST['customer']."',
        crm='".$_POST['crm']."',
        enquiry='".$_POST['enquiry']."',
        accounts='".$_POST['accounts']."',
        credit='".$_POST['credit']."',
        invoice='".$_POST['invoice']."',
        quotation='".$_POST['quotation']."',
        sales_order='".$_POST['sales_order']."',
        inventory='".$_POST['inventory']."',
        stocks='".$_POST['stocks']."',
        service='".$_POST['service']."',
        reports='".$_POST['reports']."',
        block='".$_POST['block']."'
        where id='".$_GET['id']."'");
?>
        <script>alert('Updated Sucessfully')</script>
        <script>location.href='user.php'</script>;
<?php    
    }
    else{
        die;
    }
?>