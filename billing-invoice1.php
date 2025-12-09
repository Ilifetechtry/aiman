<?php
    include 'sidebar.php';
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
    <h1 class="nk-block-title">Invoice</h1>
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
<?php
    include 'common/invoice_content.php';
}
?>
</html>
<link rel="stylesheet" href="assets/css/libs/editors/quill20d4.css?v1.1.2"></link><script src="assets/js/libs/editors/quill.js"></script><script src="assets/js/editors/quill.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script src="assets/js/data-tables/data-tables.js"></script>



<?php
    include 'common/billing_js.php';
?>
<script src="assets/js/bundle.js"></script>
<script src="assets/js/scripts.js"></script>