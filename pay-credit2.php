<?php
    include 'sidebar.php';
?>
<?php

if(isset($_POST['save'])){   
    $upd_customer1=mysqli_query($conn,"UPDATE customer1 set c_amount='".$_POST['paid_amount']."',r_amount='".$_POST['balance_amount']."' where id='".$_GET['id']."'");

    $c=$_POST['due_amount']-$_POST['paid_amount'];
    $upd_customer2=mysqli_query($conn,"INSERT INTO credit(cname,bill_id,paid_amount,due_amount,balance_amount,date)VALUES('".$_POST['cname']."','".$_GET['id']."','".$_POST['paid_amount']."','".$c."','".$_POST['balance_amount']."','".$_POST['date']."')");
    $select_cus_rept=mysqli_query($conn,"SELECT * FROM credit where bill_id='".$_GET['id']."' && c_id='".$_GET['id']."'");    
    if(mysqli_num_rows($select_cus_rept)>1){
        $select=mysqli_query($conn,"SELECT max(c_id) from credit");
        $sele_fet=mysqli_fetch_array($select);
        $upd=mysqli_query($conn,"UPDATE credit set check_credit= '".$sele_fet[0]."' where c_id='".$sele_fet[0]."'");
       
    }

    ?>
    <script>location.href="credit.php";</script>
<?php
}
?>
<style>
    .emicon{
        font-size:30px;
    }
    .emiconall{
        margin-top:-3px;
    }
    .combine{
        display:flex;
    }
    spam{
        color:red;
    }
    label{
        font-size:16px!important;
    }
    .nav-link{
        font-size:18px!important;
    }
    .activea{
        color:white!important;
        background:#2daae0!important;
    }
</style>

<body class="nk-body" style="margin-top:40px" data-sidebar-collapse="lg" data-navbar-collapse="lg">
<script src="assets/js/bundle.js"></script>
<script src="assets/js/scripts.js"></script>
<div class="nk-content">
<div class="container m-auto">
<div class="nk-content-inner">
<div class="nk-content-body" >
    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
    <!--begin:::Tab item-->

    <!--end:::Tab item-->

    <!--begin:::Tab item-->
    <li class="nav-item">
        <a class="nav-link text-active-primary newuser activea" href="#">Pay  Credit</a>
    </li>
    
    <!--end:::Tab item-->

    </ul>
<?php
$select1=mysqli_query($conn,"SELECT * FROM  credit where c_id='".$_GET['id']."'");
if(mysqli_num_rows($select1)>0){
    $fc=mysqli_fetch_assoc($select1);
?>


<form method="post" name="form2" action="" style="margin-top:10px" onsubmit="return myFun()">
<div class="row g- new" id="new">
<div class="col-xxl-12">
<div class="gap gy-4">
<div class="gap-col">
<div class="card card-gutter-md">
<div class="card-body">
<div class="row g-gs">
<div class="col-lg-9"></div>
<div class="col-lg-3 new_cus">
<div class="form-group"><label for="name" class="form-label">INVOICE ID<spam>*</spam></label>
<div class="form-control-wrap">
<input type="text" class="form-control" name="cname" id="cname" placeholder="Enter your name" value="#<?=$fc['bill_id'];?>" readonly/>
</div></div></div>
<div class="col-lg-3 new_cus">
<div class="form-group"><label for="name" class="form-label">Customer Name<spam>*</spam></label>
<div class="form-control-wrap">
<input type="text" class="form-control" name="cname" id="cname" placeholder="Enter your name" value="<?=$fc['cname'];?>" required/>
</div></div></div>
<div class="col-lg-3">
<div class="form-group"><label for="date" class="form-label">Date<spam>*</spam></label>
<div class="form-control-wrap">
<input type="date" class="form-control" id="date"  name="date" value="<?=date('Y-m-d');?>"></div></div></div>









<!--================================Service===============================-->
<!--==============================Product=================================-->
<!--============================Ended=====================================-->
<div class="col-lg-3">
<div class="form-group"><label for="mop" class="form-label">Mode of Payment<spam>*</spam></label>
<div class="form-control-wrap">
<select class="form-select" name="mop" id="mop1">
        <option value="Credit" selected hidden>Credit</option>
        <option value="Cash">Cash</option>
        <option value="UPI">UPI</option>
        <option value="Credit">Credit</option>
    </select>
</div></div></div>  
   
    <div class="col-lg-3">
<div class="form-group"><label for="net_amount" class="form-label">Due Amount<spam>*</spam></label>
<div class="form-control-wrap">
    <input type="text" class="form-control" id="main_total" name="due_amount" value="<?=$fc['due_amount'];?>" required></div></div></div>
    <div class="col-lg-3" id="c_ra">
<div class="form-group"><label for="net_amount" class="form-label">Paid Amount<spam>*</spam></label>
<input type="hidden" value="" id="t_amount">
<div class="form-control-wrap">
    <input type="text" class="form-control" id="c_amount" name="paid_amount" value="0"></div></div></div>
    <div class="col-lg-3" id="c_r1a">
<div class="form-group"><label for="c_amount1" class="form-label">Remaining Amount<spam>*</spam></label>
<div class="form-control-wrap">
    <input type="text" class="form-control" id="r_amount" name="balance_amount" value="<?=$fc['balance_amount'];?>" readonly></div></div></div>
</div>
</div>
</div>
</div> 
</div>
<input type="hidden" id="id" name="id"/>
<input type="hidden" id="credit1" name="credit">
<input type="hidden" value=0 id="totalll"/>
<input type="hidden" value=0 id="totalll2"/>
<input type="hidden" value=0 id="totalll5"/>
<input type="hidden" value=0 id="net_amounta"/>
<input type="hidden" value=0 id="net_amountb"/>
<!-- <input type="hidden1" value="0" id="abcd"/> -->

    <div class="col-lg-3">
    <input type="submit" name="save" class="btn btn-primary" style="margin-left:4%;margin-bottom:20px;margin-top:20px;" value="Save Changes"></div>
</form>

<?php
}
?>
</body>
</html>
<script>


$(document).ready(function(){
//JQuery Service
// $("#main_total").val(0);
//         $("#net_amount").val(0);
            $("#c_ra").show();
            $("#c_r1").show();
            $("#c_r1a").show();
            $("#credit").val(1);
            $("#c_amount").keyup(function(){
                $("#r_amount").val($("#main_total").val()-$("#c_amount").val());
            })
    // $("#category").change(function(){
    //     var value=$(this).val();
    //     if(value=="")
    // })

    
   
   
   

    
//End of JQuery Product,service
    
    
           
    $("#mop1").change(function(event){
    let j=$("#main_total").val();
    $("#c_amount").val(j);
        if($(this).val()=="Credit"){
            $("#c_ra").show();
            $("#c_r1").show();
            $("#c_r1a").show();
            $("#credit").val(1);
            $("#c_amount").keyup(function(){
                $("#r_amount").val($("#main_total").val()-$("#c_amount").val());
            })
        }
        else{
            $("#r_amount").val('');
            $("#credit").val('');
            $("#c_amount").val($("#main_total").val());
            $("#c_ra").hide();
            $("#c_r1").hide();
            $("#c_r1a").hide();
        }
    })
});





// 

function calculatePrice() {
    var total = 0;
    if($('.pricee').length) {
        $('.pricee').each(function() {
        total += Number($(this).val());
        });
    }   
    var j=($("#edit_count").val());
    for(let i=1;i<=j;i++){
        if($('#quantity'+i).length){
            $('#quantity'+i).each(function() {
                total *= Number($(this).val());
            });
        }  
    }
    $('#net_amount').val(total);

    total -= Number($('#main_discount').val());
    total += (Number($('#main_tax').val())*Number(total))/100;
    

    $('#main_total').val(total);
    
}
function myFun(){
    if($('#main_total').val()==''||$('#main_total').val()==0){
        alert("Please choose any service your bill is empty");
        return false;
    }
}

</script>