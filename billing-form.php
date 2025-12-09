<?php
    $arr = explode(",", $_POST['row_name']);
    $count=[0,0,0,0];
    $a=0;
    $count1= 0;
    $count2= 0;
    $count3= 0;
    foreach($arr as $ar) {
        $ar = str_replace(" ", "", $ar);
        if (str_contains($ar, '-25')) { 
            $arr4 = explode("-25", $ar);
            if($arr4[0] != "" || $arr4[0] != " ") {
                 if($arr4[0]!="" && $arr4 [1]!=""){
                     $count[0]=$count[0]+1;
                 }
            }   
         }
        else if (str_contains($ar, '-50')) { 
           $arr1 = explode("-50", $ar);
           if($arr1[0] != "" || $arr1[0] != " ") {
                if($arr1[0]!="" && $arr1[1]!=""){
                    $count[1]=$count[1]+1;
                }
           }   
        }
        else if (str_contains($ar, '-75')) { 
            $arr2 = explode("-75", $ar);
            if($arr2[0] != "" || $arr2[0] != " ") {
                 if($arr2[0]!="" && $arr2[1]!=""){
                     $count[2]=$count[2]+1;
                 }
            }   
         }
         else if (str_contains($ar, '-100')) { 
            $arr3 = explode("-100", $ar);
            if($arr3[0] != "" || $arr3[0] != " ") {
                 if($arr3[0]!="" && $arr3[1]!=""){
                     $count[3]=$count[3]+1;
                 }
            }   
         }
    }
    $sumof=$count[0]+$count[1]+$count[2]+$count[3];
    echo $count[0];
    print_r ($count);
    echo "<br>";

    $sum=($_POST['bara1'])+($_POST['barb1'])+($_POST['barc1'])+($_POST['bard1']);
   

    // die;
?>
<?php include 'sidebar.php';?>

<style>
    spam{
        color:red;
    }
</style>

<?php
if(isset($_POST['save1'])){
    $select=mysqli_query($conn,"SELECT * from billing");
    if(mysqli_num_rows($select)>0){
        $fes=mysqli_fetch_assoc($select);        
        if($fes['mobile_num'] !== $_POST['mobile_num1']){
            $insert11=mysqli_query($conn,"INSERT into billing
            (name,date,mobile_num,remarks,status,mop,address,product_id,product_description,array_price,r_amount,
            quantity,price,tax,total,net_amount,credit) values 
            ('".$_POST['name1']."','".$_POST['date']."',
            '".$_POST['mobile_num1']."','".$_POST['remarks1']."',
            '".$_POST['category1']."','".$_POST['mop']."','".$_POST['address1']."',
            '".$_POST['product_id']."','".$_POST['row_name']."','".$_POST['array_price1']."','".$_POST['r_amount1']."',
            '".$_POST['quantity']."','".$_POST['price']."',
            '".$_POST['tax']."','".$_POST['total']."','".$_POST['net_amount']."','".$_POST['credit1']."'
            )");
            $insert_id = mysqli_insert_id($conn);
?>
<script>location.href='billing-invoice1.php?id=<?php echo $insert_id ?>'</script>
<?php
        }
    }   
}
$percentage=100*(2/$_POST['result']);
?> 
<body class="nk-body" style="margin-top:40px" data-sidebar-collapse="lg" data-navbar-collapse="lg">
<script src="assets/js/bundle.js"></script>
<script src="assets/js/scripts.js"></script>
<div class="nk-content">
<div class="container m-auto">
<div class="nk-content-inner">
<div class="nk-content-body" >
    <h1 style="margin-top:-20px;margin-bottom:20px">Billing Form</h1>
    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
    <!--begin:::Tab item-->
    <li class="nav-item">
        <a class="nav-link text-active-primary active existing" href="#">Exiting Customer</a>
    </li>
    <!--end:::Tab item-->

    <!--begin:::Tab item-->
    <li class="nav-item">
        <a class="nav-link text-active-primary newuser" href="#">New Customer</a>
    </li>
    <!--end:::Tab item-->

    </ul>
<form method="post" name="form1" enctype="multipart/form-data" action="billing-invoice.php">
<div class="row g-gs" id="existing">
<div class="col-xxl-12">
<div class="gap gy-4">
<div class="gap-col">
<div class="card card-gutter-md">
<div class="card-body">
<div class="row g-gs">
<div class="col-lg-12 form-label" style="font-size:16px;font-weight:700;">&nbsp;Customer</div>
<div class="col-lg-3">
<input type="hidden" id="id" name="id"/>
<div class="form-group">
    <label for="select_name" class="form-label">Name<spam>*</spam></label>
<div class="form-control-wrap">
<select class="form-select" id="select_name" name="name">
<?php
    $sel2=mysqli_query($conn,"SELECT * from billing where name!='' && date!='' && status!='' && mobile_num!='' && remarks!='' && address!=''");
    if(mysqli_num_rows($sel2)>0){
        while($fb=mysqli_fetch_array($sel2)){
            
?>
    <option hidden selected>Choose an customer</option>
    <option value="<?=$fb['id'];?>"><?=$fb['name'];?></option>
<?php    } 
    }
?>
</select>
</div></div></div>
<input type="hidden" name="name_sub" id="name_sub">
<div class="col-lg-3">
<div class="form-group"><label for="date" class="form-label">Date<spam>*</spam></label>
<div class="form-control-wrap">
    <input type="date" class="form-control"  name="date" value="<?=date('Y-m-d');?>"></div></div></div>
    <div class="col-lg-3">
<div class="form-group"><label for="category" class="form-label">Category<spam>*</spam></label>
<div class="form-control-wrap">
<select class="form-select" name="category" id="category">
        <option hidden selected><center>--SELECT--</center></option>
        <option value="Retail">Retail</option>
        <option value="Wholesale">Wholesale</option>
    </select></div></div></div>
<div class="col-lg-3">
<div class="form-group"><label for="mobile_num" class="form-label">Mobile<spam>*</spam></label>
<div class="form-control-wrap">
<input type="tel" class="form-control" pattern="^[0-9]{10}$"  id="mobile_num" name="mobile_num" required></div></div></div>
<div class="col-lg-6">
<div class="form-group"><label for="address" class="form-label">Address<spam>*</spam></label>
<div class="form-control-wrap">
    <textarea class="form-control" id="address" name="address" required></textarea></div></div></div>
    <div class="col-lg-6">
<div class="form-group"><label for="remarks" class="form-label">Remarks<spam>*</spam></label>
<div class="form-control-wrap">
    <textarea class="form-control" id="remarks" name="remarks" required></textarea></div></div></div>
<div class="col-lg-12 form-label" style="font-size:16px;font-weight:700;">&nbsp;Product</div>
    <div class="col-lg-3">
<div class="form-group"><label for="product_id" class="form-label">Product Id<spam>*</spam></label>

<div class="form-control-wrap">
<?php
    $product_number=1;
    if($product_number>0){
    $product_number++;
?>
    <input type="text" class="form-control" id="product_id" name="product_id" value="<?php 
            if($count >0){
                if($count[0] >0){
                    echo "BAR-0.25-".$count[0].",";
                }
                if($count[1] >0){
                    echo "BAR-0.50-".$count[1].",";
                }
                if($count[2] >0){
                    echo "BAR-0.75-".$count[2].",";
                }
                if($count[3] >0){
                    echo "BAR-1.00-".$count[3].",";
                }
            }
            ?>
    "></div></div></div>
<?php
    }
?>
    <div class="col-lg-4">
<div class="form-group"><label for="product description" class="form-label">Product Description<spam>*</spam></label>
<div class="form-control-wrap">
    <input type="text" class="form-control" id="product description" name="row_name" value="<?=$_POST['row_name'];?>" readonly></div></div></div>
    <div class="col-sm-2">
<div class="form-group"><label for="quantity" class="form-label">Quantity<spam>*</spam></label>
<div class="form-control-wrap">
    <input type="number" class="form-control" id="quantity" name="quantity" value=<?=$sumof;?> readonly></div></div></div>
    
    <div class="col-lg-3">
<div class="form-group"><label for="price" class="form-label">Price<spam>*</spam></label>
<div class="form-control-wrap">
    <input type="text" class="form-control" id="price" name="price" value=<?=$sum;?> readonly></div></div></div>
<div class="col-lg-4">
<div class="form-group"><label for="mop" class="form-label">Mode of Payment<spam>*</spam></label>
<div class="form-control-wrap">
<select class="form-select" name="mop" id="mop1">
        <option value="Cash" selected>Cash</option>
        <option value="UPI">UPI</option>
        <option value="Credit">Credit</option>
    </select>
</div></div></div>   
<div class="col-lg-2">
<div class="form-group"><label for="tax" class="form-label">Tax<spam>*</spam></label>
<div class="form-control-wrap">
    <input type="text" class="form-control" id="tax1" name="tax" value="2"></div></div></div>
    <div class="col-lg-3">
<div class="form-group"><label for="total" class="form-label">Total<spam>*</spam></label>
<div class="form-control-wrap">
    <input type="text" class="form-control" id="total1" name="total" 
    value=<?=($sum)+(2*(($sum)/100));?> readonly></div></div></div>
<?php
    $sele=mysqli_query($conn,"SELECT max(check_id) as check_id from user_details");
    if(mysqli_num_rows($sele)>0){
        $fff=mysqli_fetch_array($sele);
        ?>
        <input type="hidden" name="check_id" value=<?=$fff['check_id'];?>> 
<?php
    }
?>

    <div class="col-lg-3">
<div class="form-group"><label for="net_amount" class="form-label">Net Amount<spam>*</spam></label>
<div class="form-control-wrap">
    <input type="text" class="form-control" id="net_amount" name="net_amount" value=<?=round(($sum)+(2*(($sum)/100))).".00";?>  readonly></div></div></div>

    <div class="col-lg-3" id="c_r">
<div class="form-group"><label for="net_amount" class="form-label">Credit Amount<spam>*</spam></label>
<div class="form-control-wrap">
    <input type="text" class="form-control" id="c_amount" name="c_amount"></div></div></div>
    <div class="col-lg-3" id="c_r1">
<div class="form-group"><label for="c_amount" class="form-label">Remaining Amount<spam>*</spam></label>
<div class="form-control-wrap">
    <input type="text" class="form-control" id="r_amount" name="r_amount"  readonly></div></div></div>
    </div></div>
    </div>
    <input type="hidden" value=<?=round(($sum)+(2*(($sum)/100)));?> id="t_amount">
    <input type="hidden" id="credit" name="credit">
    <input type="hidden" id="c_p">
    <input type="hidden" id="t_p">
<!--  -->
    <?php
        $array_price=[$_POST['barap'],$_POST['barbp'],$_POST['barcp'],$_POST['bardp']];
    ?>
    <input type="hidden" value=<?php echo $array_price[0].",".$array_price[1].",".$array_price[2].",".$array_price[3];?> name="array_price">
    <div class="col-lg-3">
    <input type="submit" name="save" class="btn btn-primary" style="margin-left:4%;margin-bottom:20px;margin-top:20px;" value="Save Changes"></div>
    </div>
</form>
</div>
</div>
</div>
</div>



<form method="post" name="form2" action="" style="margin-top:10px">
<div class="row g- new" id="new">
<div class="col-xxl-12">
<div class="gap gy-4">
<div class="gap-col">
<div class="card card-gutter-md">
<div class="card-body">
<div class="row g-gs">
<div class="col-lg-12 form-label" style="font-size:16px;font-weight:700;">&nbsp;Customer</div>
<div class="col-lg-3">
<div class="form-group"><label for="name" class="form-label">Name<spam>*</spam></label>
<div class="form-control-wrap">
<input type="text" class="form-control" name="name1" id="name" placeholder="Enter your name"required/>
</div></div></div>
<div class="col-lg-3">
<div class="form-group"><label for="date" class="form-label">Date<spam>*</spam></label>
<div class="form-control-wrap">
<input type="date" class="form-control"  name="date" value="<?=date('Y-m-d');?>"></div></div></div>
    <div class="col-lg-3">
<div class="form-group"><label for="category" class="form-label">Category<spam>*</spam></label>
<div class="form-control-wrap">
<select class="form-select" name="category1" id="category">
        <option hidden selected><center>--SELECT--</center></option>
        <option value="Retail">Retail</option>
        <option value="Wholesale">Wholesale</option>
    </select>    
</div></div></div>
<div class="col-lg-3">
<div class="form-group"><label for="mobile_num" class="form-label">Mobile<spam>*</spam></label>
<div class="form-control-wrap">
<input type="tel" class="form-control" pattern="^[0-9]{10}$"  id="mobile_num" name="mobile_num1"  placeholder="Enter your mobile number" required></div></div></div>
<div class="col-lg-6">
<div class="form-group"><label for="address1" class="form-label">Address<spam>*</spam></label>
<div class="form-control-wrap">
    <textarea class="form-control" id="address1" name="address1" placeholder="Enter your address" required></textarea></div></div></div>
    <div class="col-lg-6">
<div class="form-group"><label for="remarks" class="form-label">Remarks<spam>*</spam></label>
<div class="form-control-wrap">
    <textarea class="form-control" id="remarks" name="remarks1" placeholder="Mention remarks if any"></textarea></div></div></div>
<div class="col-lg-12 form-label" style="font-size:16px;font-weight:700;">&nbsp;Product</div>
<div class="col-lg-3">
<div class="form-group"><label for="product_id" class="form-label">Product Id<spam>*</spam></label>
<div class="form-control-wrap">
    <input type="text" class="form-control" id="product_id" name="product_id" value="<?php 
            if($count >0){
                if($count[0] >0){
                    echo "BAR-0.25-".$count[0].",";
                }
                if($count[1] >0){
                    echo "BAR-0.50-".$count[1].",";
                }
                if($count[2] >0){
                    echo "BAR-0.75-".$count[2].",";
                }
                if($count[3] >0){
                    echo "BAR-1.00-".$count[3].",";
                }
            }
            ?>"></div></div></div>
    <div class="col-lg-4">
<div class="form-group"><label for="product description" class="form-label">Product Description<spam>*</spam></label>
<div class="form-control-wrap">
    <input type="text" class="form-control" id="product description" name="row_name" value="<?php echo $_POST['row_name'];?>" readonly></div></div></div>
    <div class="col-sm-2">
<div class="form-group"><label for="quantity" class="form-label">Quantity<spam>*</spam></label>
<div class="form-control-wrap">
    <input type="number" class="form-control" id="quantity" name="quantity" value=<?=$sumof;?> readonly></div></div></div>
    
    <div class="col-lg-3">
<div class="form-group"><label for="price" class="form-label">Price<spam>*</spam></label>
<div class="form-control-wrap">
    <input type="text" class="form-control" id="price" name="price" value="<?=$sum;?>" readonly></div></div></div>
<div class="col-lg-4">
<div class="form-group"><label for="mop" class="form-label">Mode of Payment<spam>*</spam></label>
<div class="form-control-wrap">
<select class="form-select" name="mop" id="mop2">
        <option value="Cash" selected>Cash</option>
        <option value="UPI">UPI</option>
        <option value="Credit">Credit</option>
    </select>
</div></div></div>  
<div class="col-lg-2">
<div class="form-group"><label for="tax" class="form-label">Tax<spam>*</spam></label>
<div class="form-control-wrap">
    <input type="text" class="form-control" id="tax2" name="tax" value="2"></div></div></div>
    <div class="col-lg-3">
<div class="form-group">
<input type="hidden" value=<?php echo $array_price[0].",".$array_price[1].",".$array_price[2].",".$array_price[3].",";?> name="array_price1">
<label for="total" class="form-label">Total<spam>*</spam></label>
<div class="form-control-wrap">
    <input type="text" class="form-control" id="total2" name="total" value="<?=($sum)+(2*(($sum)/100));?>" readonly></div></div></div>
    <div class="col-lg-3">
<div class="form-group"><label for="net_amount" class="form-label">Net Amount<spam>*</spam></label>
<div class="form-control-wrap">
    <input type="text" class="form-control" id="net_amount2" name="net_amount" value=<?=round(($sum)+(2*(($sum)/100))).".00";?> readonly></div></div></div>
    <div class="col-lg-3" id="c_ra">
<div class="form-group"><label for="net_amount" class="form-label">Credit Amount<spam>*</spam></label>
<input type="hidden" value=<?=round(($sum)+(2*(($sum)/100)));?> id="t_amount1">
<div class="form-control-wrap">
    <input type="text" class="form-control" id="c_amount1" name="c_amount1"></div></div></div>
    <div class="col-lg-3" id="c_r1a">
<div class="form-group"><label for="c_amount1" class="form-label">Remaining Amount<spam>*</spam></label>
<div class="form-control-wrap">
    <input type="text" class="form-control" id="r_amount1" name="r_amount1"  readonly></div></div></div>
</div>
</div>
</div>
</div>
</div>
<input type="hidden" id="id" name="id"/>
<input type="hidden" id="credit1" name="credit1">

    <div class="col-lg-3">
    <input type="submit" name="save1" class="btn btn-primary" style="margin-left:4%;margin-bottom:20px;margin-top:20px;" value="Save Changes"></div>
</form>
</body>
</html>
<script>

$(document).ready(function(){

    $("#new").hide();
    $(".newuser").click(function(){
        $("#new").show();
        $("#select_name").val('');
        $("#category").val('');
        $("#mobile_num").val('');
        $("#remarks").val('');
        $("#address").val(''); 
        $("#existing").hide(); 
    })
    $(".existing").click(function(){
        $("#new").hide();
        $("#name1").val('');
        $("#category1").val('');
        $("#mobile_num1").val('');
        $("#remarks1").val('');
        $("#address1").val(''); 
        $("#existing").show(); 
    })
    $("#select_name").change(function(event){
        event.preventDefault();
        var id=$(this).val();
        $.ajax({
            url:"ajax.php",
            type:"post",
            data:{"id":id},
            success: function(result){
                var obj = JSON. parse(result);
                $('#id').val(obj.id)
                $('#name_sub').val(obj.name)
                $('#category').val(obj.status)
                $('#mobile_num').val(obj.mobile_num)
                $('#remarks').val(obj.remarks)
                $('#address').val(obj.address)
                $('#c_p').val(obj.r_amount)
            }
        })
    })
})
$("#tax1").keyup(function(event){
    event.preventDefault();
    var tax=$(this).val();
    var res=$("#price").val();
    var tax1=parseInt(tax)*(parseInt(res)/100);
    var toti=parseFloat(tax1)+parseFloat(res);
    var tot=Math.round(toti);
    $("#total1").val(toti)
    $("#net_amount").val(tot+".00")
})
$("#tax2").change(function(event){
    event.preventDefault();
    var tax=$(this).val();
    var res=$("#price").val();
    var tax1=parseInt(tax)*(parseInt(res)/100);
    var toti=parseFloat(tax1)+parseFloat(res);
    var tot=Math.round(toti);
    $("#total2").val(toti)
    $("#net_amount2").val(tot+".00")
})
$("#c_r").hide();
$("#c_ra").hide();
$("#c_r1").hide();
$("#c_r1a").hide();
$("#credit").val(0);
$("#credit1").val(0);
$("#r_amount").val(0);
$("#r_amount1").val(0);
$("#mop1").change(function(event){
$("#t_p").val(parseInt($("#c_p").val())+parseInt($("#t_amount").val()));
let j=parseInt($("#c_p").val())+parseInt($("#t_amount").val());
$("#c_amount").val(j);

    if($(this).val()=="Credit"){
        $("#c_r").show();
        $("#c_r1").show();
        $("#credit").val(1);
        $("#c_amount").keyup(function(){
            $("#r_amount").val($("#t_p").val()-$("#c_amount").val());
        })
    }
    else{
        $("#r_amount").val(0);
        $("#credit").val(0);
        $("#c_amount").val($("#c_p").val());
        $("#c_r").hide();
        $("#c_r1").hide();
    }
})
$("#mop2").change(function(event){
    if($(this).val()=="Credit"){
        $("#c_ra").show();
        $("#c_r1a").show();
        $("#credit1").val(1);
        $("#c_amount1").val($("#t_amount1").val());
        $("#c_amount1").keyup(function(){
            $("#r_amount1").val($("#t_amount1").val()-$("#c_amount1").val());
        })
    }
    else{
        $("#r_amount1").val(0);
        $("#credit1").val(0);
        $("#c_amount1").val($("#t_amount1").val());
        $("#c_ra").hide();
        $("#c_r1a").hide();
    }
})
$("#r_amount").val(0);
$("#r_amount1").val(0);

</script>