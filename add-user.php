<?php include 'sidebar.php';?>
<style>
    spam{
        color:red;
    }
</style>

<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg" style="margin-top:30px">
<script src="assets/js/bundle.js"></script>
<script src="assets/js/scripts.js"></script>

<div class="nk-content">
<div class="container m-auto">
<div class="nk-content-inner">
<div class="nk-content-body">
<div class="nk-block-head">
<div class="nk-block-head-between flex-wrap gap g-2">
<div class="nk-block-head-content"><h2 class="nk-block-title">Add User</h2>
<nav><ol class="breadcrumb breadcrumb-arrow mb-0">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add User</li></ol></nav></div>
<div class="nk-block-head-content">
    <ul class="d-flex">
    </ul></div></div></div>


<?php
if(isset($_POST['submit'])){
    $selll=mysqli_query($conn,"SELECT user_name from users where user_name='".$_POST['user_name']."'");
    if(mysqli_num_rows($selll)>0){
?>
            <script>alert("Username Already Exists")</script>
            <script>location.href="add-user.php"</script>
<?php
}
    else{
        $target_dir = "uploads/";
        $target_file1 = $target_dir . basename($_FILES["image"]["name"]);
        $target_file2 = $target_dir . basename($_FILES["resume"]["name"]);
        $target_file3 = $target_dir . basename($_FILES["proof"]["name"]);
        $check1 = getimagesize($_FILES["image"]["tmp_name"]);
        $check2 = $_FILES['resume']['type'];
        $check3 = $_FILES['proof']['type'];
        if($check1 !== false && $check2 !== "application/pdf" && $check3 !== "application/pdf" || $check3 !== "application/png" || $check3 !== "application/jpeg" || $check3 !== "application/jpg" ){
            if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_file1) && move_uploaded_file($_FILES["resume"]["tmp_name"],$target_file2) && move_uploaded_file($_FILES["proof"]["tmp_name"],$target_file3)){
                $ins=mysqli_query($conn,"INSERT INTO users (name,user_name,password, age,gender,mobile_num ,city , email,pincode , address1,role,  remarks , image,resume,proof) VALUES 
                ('".$_POST['name']."','".$_POST['user_name']."',
                '".$_POST['password']."',
                '".$_POST['age']."','".$_POST['gender']."',
                '".$_POST['mobile_num']."','".$_POST['city']."',
                '".$_POST['email']."','".$_POST['pincode']."',
                '".$_POST['address1']."',
                '".$_POST['role']."',
                '".$_POST['remarks']."','".$target_file1."',
                '".$target_file2."','".$target_file3."')");
 ?>
         <script>location.href="user.php"</script>
 <?php
                
                }
            }
        }
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
<div class="col-lg-12">
<div class="form-group"><label for="name" class="form-label">Name<spam>*</spam></label>
<div class="form-control-wrap">
    <input required type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name"></div></div></div>
    <div class="col-lg-6">
<div class="form-group"><label for="gender" class="form-label">Gender<spam>*</spam></label>
<div class="form-control-wrap">
<input required type="radio" class="form-radio" id="gender" name="gender" value="Male">&nbsp;Male&nbsp;&nbsp;&nbsp;
<input required type="radio" class="form-radio" id="gender" name="gender" value="Female">&nbsp;Female</div></div></div>
<div class="col-lg-6">
<div class="form-group"><label for="age" class="form-label">Age<spam>*</spam></label>
<div class="form-control-wrap">
<input required type="number" class="form-control" id="age" name="age" placeholder="Enter Your age"></div></div></div>    
<div class="col-lg-6">
<div class="form-group"><label for="username" class="form-label">Username<spam>*</spam></label>
<div class="form-control-wrap">
    <input required type="text" class="form-control" id="username" name="user_name" placeholder="Set Up Your User  Name"></div></div></div>
    <div class="col-lg-6">
<div class="form-group"><label for="password" class="form-label">Password<spam>*</spam></label>
<div class="form-control-wrap">
    <input required type="text" class="form-control" id="password" name="password" placeholder="Set Up Password"></div></div></div>    
    
<div class="card-body">
<div class="form-group"><label class="form-label">Photo<spam>*</spam></label>
<div class="image-upload-wrap d-flex flex-column align-items-center">
<div class="media media-huge">
    <img id="image-result" class="w-100 h-100"></div>
<div class="pt-3">
    <input required class="upload-image" name="image" data-target="image-result" id="change-image" type="file" max="1" hidden>
    <label for="change-image" class="btn btn-md btn-primary">Add Image</label></div></div></div>
<div class="form-note mt-3">Set the image thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted.</div></div></div>
<input type="hidden" value="User" name="role">
    <div class="gap-col">
<div class="card card-gutter-md">
<div class="card-body">
<div class="form-group"><label class="form-label">Resume<spam>*</spam></label>
<div class="form-control-wrap">
<input required  id="resume" name="resume" type="file" max="1">
<label for="resume" class="btn btn-md btn-primary">Upload Resume</label> 
<div class="form-note mt-3">Set the resume in pdf format.</div> 
</div>
</div>
    </div>
    </div>
    <br>
    <div class="gap-col">
<div class="card card-gutter-md">
<div class="card-body">
<div class="form-group"><label class="form-label">Proof<spam>*</spam></label>
<div class="form-control-wrap">
<input required  id="proof" name="proof" type="file" max="1"/>
<label for="proof" class="btn btn-md btn-primary">Signature Proof</label>
<div class="form-note mt-3">Accepts both files and images</div> 
</div>
</div>
    </div>
    </div>
    <br>

<div class="row g-gs">
<div class="col-lg-6">
<div class="form-group"><label for="mobile_num" class="form-label">Mobile Number<spam>*</spam></label>
<div class="form-control-wrap">
<input required type="tel" class="form-control" pattern="^[0-9]{10}$"  id="mobile_num" name="mobile_num" placeholder="Enter your mobile number">
</div></div></div>
<div class="col-lg-6">
<div class="form-group"><label for="city" class="form-label">City<spam>*</spam></label>
<div class="form-control-wrap">
    <input required type="text" class="form-control" id="city" name="city" placeholder="Enter Your Place"></div></div></div>
<div class="col-lg-6">
<div class="form-group"><label for="email" class="form-label">Email Id<spam>*</spam></label>
<div class="form-control-wrap">
    <input required type="email" class="form-control" id="email" name="email" placeholder="Enter your Email Id"></div></div></div>
<div class="col-lg-6">
<div class="form-group"><label for="pincode" class="form-label">Pincode<spam>*</spam></label>
<div class="form-control-wrap">
    <input required type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter your Pincode"></div></div></div>
    <div class="col-lg-12">
<div class="form-group"><label for="address1" class="form-label">Address<spam>*</spam></label>
<div class="form-control-wrap">
    <textarea class="form-control" id="address1" name="address1" placeholder="Enter your Present Address"></textarea></div></div></div>
    <div class="col-lg-12">

<div class="form-group"><label class="form-label">Remarks<spam>*</spam></label>
<div class="form-control-wrap">
<div class="form-group">
<textarea class="form-control" name="remarks" placeholder="Enter your Remarks" required></textarea></div>
</div></div></div>
<div class="col-lg-12">
<div class="form-group">
<input required type="submit" name="submit" class="btn btn-primary" style="margin-left:4%;margin-bottom:20px;margin-top:20px;" value="Save Changes"></div></form>
</div></div>   
</body>
</html>