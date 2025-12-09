<?php include 'sidebar.php';
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
                                        <h2 class="nk-block-title">Credit</h2>
                                        <nav>
                                            <ol class="breadcrumb breadcrumb-arrow mb-0">
                                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Credit</li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <ul class="d-flex">
                                            <li><button onclick="Export()" class="btn btn-dark"><span class="ni ni-file" style="font-size:22px;font-weight:400"></span>&nbsp;Export as PDF</button></li>
                                            <li>&nbsp;&nbsp;<button onclick="ExportToExcel('xlsx')" class=" btn btn-success"><span class="ni ni-dashboard" style="font-size:22px;font-weight:400"></span>&nbsp;Export as Excel</button></li>
                                            <li>&nbsp;&nbsp;<a href="allcredit.php" class="btn btn-primary"><span class="ni ni-eye" style="font-size:22px;font-weight:400"></span>&nbsp;&nbsp;View All Credit</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="card">
                                    <table id="maintable" class="datatable-init table display nowrap" data-nk-container="table-responsive">
                                        <thead class="table-light">
                                            <div class="row">
                                                <form method="post">
                                                    <div class="col-6 m-4 d-flex">
                                                        <div class="col-4">
                                                            From:<input id="min" name="min" class="form-control" type="date" value="<?= date('Y-m-d'); ?>">
                                                        </div>
                                                        <div class="col-4" style='margin-left:40px;'>
                                                            To:<input id="max" name="max" class="form-control" type="date" value="<?= date('Y-m-d'); ?>">
                                                        </div>
                                                        <div class="col-4" style='margin-left:40px;margin-top:25px'>
                                                            <input name="submit" class="btn btn-danger" type="submit" value="Search">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <tr>

                                                <th class="tb-col"><span class="overline-title">Invoice Id</span></th>
                                                <th class="tb-col"><span class="overline-title">Customer Name</span></th>
                                                <th class="tb-col"><span class="overline-title">Date</span></th>
                                                <th class="tb-col tb-col-md"><span class="overline-title">Due Amount</span></th>
                                                <th class="tb-col tb-col-md"><span class="overline-title">Paid Amount</span></th>
                                                <th class="tb-col tb-col-md"><span class="overline-title">Balance Amount</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id = 1;
                                            $nowdate = date('Y-m-d');
                                            if (isset($_POST['submit'])) {
                                                $sel5a = mysqli_query($conn, "SELECT * FROM credit1 where date<='" . $_POST['max'] . "' and date>='" . $_POST['min'] . "'");
                                                if (mysqli_num_rows($sel5a) > 0) {
                                                    while ($fef1 = mysqli_fetch_assoc($sel5a)) {
                                            ?>
                                                        <tr>
                                                            <td class="tb-col title"><?php echo "#" . (12000 + $fef1['bill_id']); ?></td>
                                                            <td class="tb-col title"><?php echo ($fef1['cname']); ?></td>
                                                            <td class="tb-col tb-col-md"><span><?php echo date("d-m-Y", strtotime($fef1['date'])); ?></span></td>
                                                            <?php
                                                            $selee = mysqli_query($conn, "SELECT * FROM customer1 where id='" . $fef1['bill_id'] . "'");
                                                            if (mysqli_num_rows($selee) > 0) {
                                                                $jj = mysqli_fetch_assoc($selee);
                                                            ?>
                                                                <td class="tb-col tb-col-md"><span>Rs.<?= $fef1['due_amount']; ?></span></td>
                                                            <?php
                                                            }
                                                            ?>

                                                            <td class="tb-col tb-col-md"><span>Rs.<?= $fef1['paid_amount'] ?></span></td>
                                                            <td class="tb-col tb-col-md"><span>
                                                                    <?php
                                                                    if ($fef1['balance_amount'] == 0) {
                                                                    ?>
                                                                        <p style="padding:2px 25px;background:#1db220;color:white;width:130px">No Balance</p>
                                                                    <?php
                                                                    } else {
                                                                        echo "Rs." . $fef1['balance_amount'];
                                                                    }
                                                                    ?>
                                                                </span></td>
                                                        </tr>
                                        </tbody>
                                <?php
                                                    }
                                                }

                                ?>
                                <?php

                                                $sel1 = mysqli_query($conn, "SELECT sum(paid_amount) FROM credit1 where date<='" . $_POST['max'] . "' and date>='" . $_POST['min'] . "'");
                                                if (mysqli_num_rows($sel1) > 0) {
                                                    $fg = mysqli_fetch_array($sel1);
                                                    $sumof = $fg[0];
                                ?>
                                    <?php
                                                    if ($sumof) {
                                    ?>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2" style="background-color:#15b423;color:white"></td>
                                                <td colspan="" class="tb-col" style="background-color:#15b423;color:white;">Grand Total </td>
                                                <td style="background-color:#15b423;color:white;"><b style="margin-left:;">Rs.<?= $sumof; ?>.00</b></td>
                                                <td colspan="3" style="background-color:#15b423;color:white"></td>
                                            </tr>
                                        </tfoot>

                                    <?php
                                                    }
                                    ?>
                                <?php
                                                } else {
                                ?>
                                    <td colspan="5">
                                        <center>No Credit Found</center>
                                    </td>
                                    <?php
                                                }
                                            } else {
                                                $c = 1;
                                                $sel3 = mysqli_query($conn, "SELECT * FROM credit1 where date='" . $nowdate . "'");
                                                if (mysqli_num_rows($sel3) > 0) {
                                                    while ($fef1 = mysqli_fetch_assoc($sel3)) {
                                    ?>
                                        <tr>
                                            <td class="tb-col title"><?php echo "#" . (12000 + $fef1['bill_id']); ?></td>
                                            <td class="tb-col title"><?php echo ($fef1['cname']); ?></td>
                                            <td class="tb-col tb-col-md"><span><?php echo date("d-m-Y", strtotime($fef1['date'])); ?></span></td>
                                            <?php
                                                        $selee = mysqli_query($conn, "SELECT * FROM customer1 where id='" . $fef1['bill_id'] . "'");
                                                        if (mysqli_num_rows($selee) > 0) {
                                                            $jj = mysqli_fetch_assoc($selee);
                                            ?>
                                                <td class="tb-col tb-col-md"><span>Rs.<?= $fef1['due_amount']; ?></span></td>
                                            <?php
                                                        }
                                            ?>

                                            <td class="tb-col tb-col-md"><span>Rs.<?= $fef1['paid_amount'] ?></span></td>
                                            <td class="tb-col tb-col-md"><span>
                                                    <?php
                                                        if ($fef1['balance_amount'] == 0) {
                                                    ?>
                                                        <p style="padding:2px 25px;background:#1db220;color:white;width:130px">No Balance</p>
                                                    <?php
                                                        } else {
                                                            echo "Rs." . $fef1['balance_amount'];
                                                        }
                                                    ?>
                                                </span></td>
                                        </tr>
                                        </tbody>
                                    <?php
                                                    }
                                                }
                                                $sel3a1 = mysqli_query($conn, "SELECT sum(paid_amount) FROM credit1 where date='" . $nowdate . "'");
                                                if (mysqli_num_rows($sel3a1) > 0) {
                                                    $fhm = mysqli_fetch_array($sel3a1);
                                                    $sum1m = $fhm[0];
                                                    if ($sum1m != 0) {
                                    ?>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3" style="background-color:#15b423;color:white"></td>
                                                <td class="tb-col" style="background-color:#15b423;color:white">Grand Total </td>
                                                <td style="background-color:#15b423;color:white"><b style="margin-left:;">Rs.<?= $sum1m; ?>.00</b></td>
                                                <td colspan="2" style="background-color:#15b423;color:white"></td>
                                            </tr>
                                        </tfoot>
                                    <?php
                                                    }
                                                } else {
                                    ?>
                                    <td colspan="5">
                                        <center>No Credit Found</center>
                                    </td>
                            <?php
                                                }
                                            }


                            ?>

                            <br><br>
                                </div>
                            </div>
                            </form>
</body>
<script src="assets/js/bundle.js"></script>
<script src="assets/js/scripts.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

</html>


<script>
    function ExportToExcel(type, fn, dl) {
        var elt = document.getElementById('maintable');
        var wb = XLSX.utils.table_to_book(elt, {
            sheet: "sheet1"
        });
        return dl ?
            XLSX.write(wb, {
                bookType: type,
                bookSST: true,
                type: 'base64'
            }) :
            XLSX.writeFile(wb, fn || ('MySheetName.' + (type || 'xlsx')));
    }
</script>
<script type="text/javascript">
    function Export() {
        html2canvas(document.getElementById('maintable'), {
            onrendered: function(canvas) {
                var data = canvas.toDataURL();
                var docDefinition = {
                    content: [{
                        image: data,
                        width: 500
                    }]
                };
                pdfMake.createPdf(docDefinition).download("Table.pdf");
            }
        });
    }
</script>