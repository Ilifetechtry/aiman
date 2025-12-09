<?php include 'sidebar.php'?>
<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg" style='margin-top:50px;'>
<?php 
    $sel=mysqli_query($conn,"SELECT* FROM book WHERE id='".$_GET['id']."' ");
    if(mysqli_num_rows($sel)>0){
        $fe=mysqli_fetch_assoc($sel);
    }
?>
<div class="nk-content">
    <div class="container">
    <div class="nk-content-inner">
    <div class="nk-content-body">
    <div class="nk-block-head">
    <div class="nk-block-head-between flex-wrap gap g-2">
    <div class="nk-block-head-content">
        <h2 class="nk-block-title">View Book</h1>
        <nav><ol class="breadcrumb breadcrumb-arrow mb-0">
            <li class="breadcrumb-item">
            <a href="#">Home</a></li>
            <li class="breadcrumb-item">
            <a href="#">Book</a></li>
            <li class="breadcrumb-item">
            <a href="#">View Book</a></li>
        </ol></nav></div>
<div class="nk-block-head-content"></div></div></div>

<div class="nk-block">
        <form method="post"  enctype="multipart/form-data">
        <div class="row g-gs">
        <div class="col-xxl-12">
        <div class="gap gy-4">
        <div class="gap-col">
        <div class="card card-gutter-md">
        <div class="card-body">
        <div class="row g-gs">
        <div class="col-lg-4">
        <div class="form-group"><label class="form-label">Book Name</label>
    <div class="form-control-wrap"><input readonly type="text" class="form-control" name="book_name" value="<?=$fe['book_name'];?>"></div></div></div>
    <div class="col-lg-2">
        <div class="form-group"><label class="form-label">Book price</label>
    <div class="form-control-wrap"><input readonly type="text" class="form-control" name="book_price" value="<?=$fe['book_price'];?>">
    </div></div></div>

    <div class="col-lg-2">
        <div class="form-group"><label class="form-label">Book Stock</label>
    <div class="form-control-wrap"><input readonly type="text" class="form-control" name="book_stock" value="<?=$fe['book_stock'];?>">
    </div></div></div>

    <?php
    if($fe['upload_date']){
    ?>
        <div class="col-lg-4">
            <div class="form-group">
                <label class="form-label">Uploaded Date</label>
                <div class="form-control-wrap">
                    <input readonly type="date" class="form-control" name="upload_date" value="<?=$fe['upload_date'];?>">
                </div>
            </div>
        </div>
    <?php
    }
    ?>

            <?php
                if($fe['book_image']){
            ?>
            <div class="col-lg-3">
                <div class="form-control-wrap">
                    <div class="form-group">
                        <label class="form-label">Book Image</label>
                        <img src="uploads/<?=$fe['book_image']?>" alt="">
                    </div>
                </div>
            </div>
            <?php
            }
            else{
                ?>
                <center class='py-3'>
                <h3 class='text-danger'>No Book Image Found!</h3>  
                </center>
                <?php
            }
            ?>

</div></div></div>
    
    
</form>
    
    </body>
    <script src="assets/js/bundle.js"></script>
        <script src="assets/js/scripts.js"></script>
<link rel="stylesheet" href="assets/css/libs/editors/quill20d4.css?v1.1.2"></link><script src="assets/js/libs/editors/quill.js"></script><script src="assets/js/editors/quill.js"></script>
</html>