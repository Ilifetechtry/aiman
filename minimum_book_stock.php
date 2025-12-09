<?php 
include 'sidebar.php';

if(isset($_POST['submit'])){
    $update=mysqli_query($conn,"UPDATE minimum_book_stock set minimum_book_stock='".$_POST['minimum_book_stock']."' WHERE id=1");
    ?>
        <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Updated Successfully',
                    confirmButtonText: 'OK',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "minimum_book_stock.php";
                    }
                }); 
        </script>
    <?php
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
            <div class="nk-block-head-content">
                <h2 class="nk-block-title">Stock Limit</h2>
                <nav>
                    <ol class="breadcrumb breadcrumb-arrow mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Stock Limit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
   
    <form method="post">
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <input  name="minimum_book_stock" type="number" class="form-control" placeholder="Enter Book Count" style="border:1px solid silver" value=<?=$fett_min_count['minimum_book_stock']?> required>
                </div>
                <div class="col-3">
                    <button class="btn btn-primary w-100" name='submit'>
                        <i class='ni ni-edit me-1'></i>Update Stock Limit
                    </button>
                </div>
                <div class="col-12 mt-3">
                    <h5>Current Minimum Count for stock is <span class='text-danger'><?=$fett_min_count['minimum_book_stock']?></span></h5>
                </div>
            </div>
        </div>
    </form>

</body>
<script>
    let delete_url='delete_minimum_book_stock.php?id=';
</script>
<?php
    include 'common/sweet_confirm.php';
?>
<script src="assets/js/bundle.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/data-tables/data-tables.js"></script>
</html>

<style>
    #add_place{
        color:white;
    }
    #add_place:hover{
        color:white;
    }
    #add_place:active{
        color:white;
    }
    #add_place:focus{
        color:white;
    }
</style>
