<?php include 'sidebar.php';?>
<style>
    spam{
        color:red;
    }
</style>
<?php
    $sele_last=mysqli_query($conn,"SELECT id FROM customer ORDER BY id DESC LIMIT 1");
    if(mysqli_num_rows($sele_last)<=0){
        $sele_last_id=1;
    }
    else{
        $row = mysqli_fetch_assoc($sele_last);
        $sele_last_id = $row['id'] + 1;
    }

?>
<body class="nk-body" style="margin-top:35px" data-sidebar-collapse="lg" data-navbar-collapse="lg">
<div class="nk-content">
    <div class="container">
    <div class="nk-content-inner">
    <div class="nk-content-body">
    <div class="nk-block-head">
    <div class="nk-block-head-between flex-wrap gap g-2">
    <div class="nk-block-head-content">
        <h2 class="nk-block-title">Add Customer</h1>
        <nav><ol class="breadcrumb breadcrumb-arrow mb-0">
            <li class="breadcrumb-item">

            <a href="#">Home</a></li>
            <li class="breadcrumb-item">
            <a href="#">Customer</a></li>
            <li class="breadcrumb-item">
            <a href="#">Add Customer</a></li>
        </ol></nav></div>
        <div class="nk-block-head-content"><ul class="d-flex">
        </ul></div></div></div>   
        <form method="post" enctype="multipart/form-data">
        <div class="row g-new" id="new">
        <div class="col-xxl-12">
        <div class="gap gy-4">
        <div class="gap-col">
            <div class="card card-gutter-md bg-white p-0 overflow-hidden">
                <div class="card-body p-0">
                    <!-- Cutomer Information -->
                    <div class="row g-gs py-5 pt-0 p-2 m-0">
                      
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="cname" class="form-label">Name<spam>*</spam></label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="cname" id="cname" placeholder="Enter customer name" required/>
                                </div>
                            </div>
                        </div>
                        <input type="date" hidden class="form-control" id="date" name="date" value="<?=date('Y-m-d');?>" required>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="mobile" class="form-label">Mobile<spam>*</spam></label>
                                <div class="form-control-wrap">
                                    <input type="tel" class="form-control" pattern="^[0-9]{10}$"  id="mobile" name="mobile" placeholder="Enter your mobile number" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group"><label for="email" class="form-label">Email<spam>*</spam></label>
                                <div class="form-control-wrap">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Id" required>
                                </div>
                            </div>
                        </div>
                      
                        <div class="col-lg-3">
                            <div class="form-group"><label for="city" class="form-label">City<spam>*</spam></label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="city" name="city" autocomplete="off" placeholder="Enter City"><div id="results"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="address" class="form-label">Address<spam>*</spam></label>
                                <div class="form-control-wrap">
                                    <textarea name="address1" id="address" class='form-control' placeholder='Enter Address'></textarea>
                                </div>
                                <input type="hidden" name="address" id="address1" >
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <div class="col-lg-3">
        <input type="submit" name="save" class="btn btn-primary" style="margin-left:4%;margin-bottom:20px;margin-top:20px;" value="Save Changes"></div></form>
    </body>
</html>
<?php
    if(isset($_POST['save'])){
        $insert1=mysqli_query($conn,"INSERT INTO customer(cname,date,email,mobile,city,address) VALUES ('".$_POST['cname']."','".$_POST['date']."','".$_POST['email']."','".$_POST['mobile']."','".$_POST['city']."','".$_POST['address']."')"); 

        $seel=mysqli_query($conn,"SELECT * FROM district where district='".$_POST['city']."'");
        if(mysqli_num_rows($seel)==0){
            $ins=mysqli_query($conn,"INSERT INTO district (district) values ('".$_POST['city']."')");
        }
?>    
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href="customer.php";
                    }
                }); 
            </script>
<?php
    }
?>
<script>
    let address = document.querySelector("#address");
    let address1 = document.querySelector("#address1");

    address.addEventListener("keyup", (e) => {
        address1.value = address.value.replace(/\n/g, "<br>"); // Replace newlines with <br>
    });
</script>
        <script>
            $(document).ready(function(){
                $('#city').autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            type: 'POST',
                            url: 'ajaxDistrict.php',
                            dataType: 'json',
                            data: {
                                query: request.term
                            },
                            success: function(data) {
                                response(data);
                            }
                        });
                    },
                    minLength: 1 // Minimum characters before triggering autocomplete
                });
            })
        </script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php
include 'scroll_link.php';
?>