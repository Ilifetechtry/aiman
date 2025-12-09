<?php
    include 'db/connection.php';
?>
<?php
    session_start();
?>
<?php
if(isset($_POST['login'])){
$sel1=mysqli_query($conn,"SELECT * from users where user_name='".$_POST['uname']."' and password='".$_POST['pwd']."' and block=1");
if(mysqli_num_rows($sel1)>0){
    header("Location: block.php");
}

$sel=mysqli_query($conn,"SELECT * from users where user_name='".$_POST['uname']."' and password='".$_POST['pwd']."' and block=0");
    if(mysqli_num_rows($sel)>0){
        $fe=mysqli_fetch_assoc($sel);
        $_SESSION['user_id']=$fe['id'];
        $upd=mysqli_query($conn,"UPDATE users set time='".$_POST['time']."',date='".$_POST['date']."',ipaddress='".$_POST['ipaddress']."' where id='".$fe['id']."'");
?>
        <script>location.href="index1.php"</script>
<?php    
    }
    else if($_POST['uname']=="" && $_POST['pwd']==""){
            echo "<script>alert('Please Fill The inputs')
            location.href='index.php'</script>";

    }
    else{
            echo "<script>alert('Login Invalid')
            location.href='index.php'</script>";
    }
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8">
<meta name="author" content="Softnio">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<title>ILife | LOGIN</title>
<link rel="shortcut icon" href="images/fav.png">
<link rel="stylesheet" href="assets/css/style20d4.css">
<style>
        body{
            overflow-X:hidden;
            background-color: white;
            background-image:url('images/2.png');
            background-attachment: fixed;
            background-size:cover;
            background-position:center center;
            background-repeat:no-repeat;
        }
        .card{
            background:transparent;
        }
        input{
            border:1px solid silver!important;
        }
        input:focus{
            border:none;
            outline:none;
            box-shadow:0px 0px 5px #2daae0!important;
        }
        label{
            color:#502b72!important;
            font-weight: 1000;
        }
        #oname{
            color:#1db220;
            font-size:20px;
            font-weight: 500;
        }
        #ofounder{
            color:blue;
            font-size:17px;
            margin-top:-10px;
            line-height:0px;
            font-weight: 600;
        }
        .ieee{
            /* max-width: 850px!important; */
            padding-right:-50px;
            
            border-radius:20px;
            margin-left:22px;
            background:#ffffff92;
            box-shadow:0px 0px 15px silver;
        }
        .nnnn{
            /* max-width: 900px!important; */
            margin: -23px !important;
        }
        .ggggii{
            margin-top:10px;
        }
        .ggggi{

        }
        #parag{
            margin-bottom:-30px;
        }
        .ggggT2{
        }
        .ggggT1{
            padding-right:10px;

        }
        .ggggT2{
        }
        .alllh4{
            margin-bottom:10px;
            margin-top:20px;
            color:#1db220;
            font-size:22px;
        }
        .mmmmi{
            border:none;
        }
        #idsss{
            margin-bottom:-30px;
        }
        .k7logo{
            margin-top:-20px;
            margin-bottom:10px;
            height:90px;
            margin-left:0px;
            padding-right:70px;
        }
        .lta{
            /* font-size:25px; */
            font-weight:1000!important;
            text-transform:capitalize;
            color:black;
            
        }
        @media screen and (max-width:500px){
            .mmmmi{
                margin-left:-35px;
            }
            #founder_img{
                margin-top:30px;
            }
        }
        @media screen and (max-width:410px) {
            .ieee{
                max-width: 280px!important;
            }
            .nnnn{
                margin-top:-200px;
            }
            
            .mmmmi{
                border:none;
                border-radius:60px;
            }
            .k7logo{
                margin-top:-60px;
                height:70px;
            }
            .lta{
                font-size:18px !important;
                margin-bottom:-10px !important;
            
            }   
        }
        @media screen and (max-width:310px) {
            .ieee{
                max-width: 260px!important;
            }
            .nnnn{
                margin-top:-200px;
            }
            
            .mmmmi{
                border:none;
                border-radius:60px;
            }
            .k7logo{
                margin-top:-60px;
                height:70px;
            }
            .lta{
                font-size:18px !important;
                margin-bottom:-10px !important;
            
            } 
        }
        @media screen and (max-width:210px) {
            .ieee{
                max-width: 300px!important;
            }
            .k7logo{
                margin-top:-20px;
                height:70px;
            }
            .nnnn{
                margin-top:-200px;
            }
            
            .mmmmi{
                border:none;
                border-radius:60px;
            }
            .k7logo{
                margin-top:-40px;
                height:120px;
            }
            .lta{
                font-size:18px !important;
                margin-bottom:-10px !important;
            
            }
        }
   
</style>
</head>



<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg" >
    <div class="nk-app-root">
    <div class="nk-main">
    <div class="nk-wrap align-items-center justify-content-center">
<div class="container p-sm-4">
    <div class="row flex-lg nnnn" style="border-radius:25px;">
        <div class="col-lg-3 ">
        </div>
    <div class="col-lg-5 col-sm-10 col-xs-10 ieee">
    <div class="card card-gutter-lg hidden-xs card-auth mmmmi">
    <div class="card-body">
    <div class="brand-logo mb-2">   
        <center>
        <img   src="images/logo1.png" height="150px !important">
        </center>
<div class="nk-block-head">
    <div class="nk-block-head-content">
    <!-- <hr style="color:red;">     -->
    <h2 class="nk-block-title lta mt-2 mb-3">Login to Account</h2>
<form method="post">    
    <div class="row gy-3">
    <div class="col-lg-12">
        <input type="hidden" value="" id="time" name="time"/>
        <input type="hidden" value="" id="date" name="date"/>
        <input type="hidden" value="<?=$_SERVER['REMOTE_ADDR'];?>" name="ipaddress"/>
    <div class="form-group"><label for="username" class="form-label un">Username</label>
<div class="form-control-wrap"><input type="text" class="form-control" name="uname" id="username" placeholder="Enter username" required></div></div></div>
<div class="col-lg-12">
    <div class="form-group"><label for="password" class="form-label">Password</label>
<div class="form-control-wrap"><input type="password" class="form-control" name="pwd" id="password" placeholder="Enter password" required></div></div></div>
<!-- <div class="col-12">
    <div class="d-flex flex-wrap"> -->
    <!-- <div class="form-check form-check-sm"><input class="form-check-input" type="checkbox" value="" id="rememberMe"><label class="form-check-label" for="rememberMe"> Remember Me </label></div>
    <a href="auth-reset-fancy.html" class="small">Forgot Password?</a></div></div> -->
    <br>

<div class="col-12 mt-3">
<div class="d-grid">
        <input type="submit" class="btn btn-primary mt-2" id="idsss" name="login" value="Login" />
    </div>
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</body>
</html>
<script>
    $(document).ready(function(){
        var c=new Date().getMonth();
        var d=c+1;

        $("#time").val(new Date().getHours()+":"+new Date().getMinutes()+":"+new Date().getSeconds(2));
        $("#date").val(new Date().getDate()+"/"+d+"/"+new Date().getFullYear());
    })
</script> 

