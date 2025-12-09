<?php include 'sidebar.php'; ?>

<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg" style="margin-top:50px">
    <div class="nk-content">
        <div class="container">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head">
                        <div class="nk-block-head-between flex-wrap gap g-2">
                            <div class="nk-block-head-content">
                                <h2 class="nk-block-title">Quotation</h1>
                                    <nav>
                                        <ol class="breadcrumb breadcrumb-arrow mb-0">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">Quotation</a></li>
                                        </ol>
                                    </nav>
                            </div>
                            <div class="nk-block-head-content">
                                <ul class="d-flex">
                                    <li hidden>
                                        <a href="javascript:void(0);" onclick="exportSelected()" class="btn btn-danger d-none d-md-inline-flex " style="margin-right:10px;">
                                            <!-- <em class="icon ni ni-download-cloud"></em> -->
                                            <em style="font-size:25px" class="icon ni ni-file-pdf"></em>
                                            <span>Export PDF</span>
                                        </a>
                                    </li>
                                    <li><a href="quotation.php" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add Quotation</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="card">
                    <table class="datatable-init table" data-nk-container="table-responsive">
                        <thead class="table-light">
                            <tr>
                                <!-- <th class="tb-col"><input type="checkbox" class="selectAll" id="selectAll"></th> -->
                                <th colspan='2' class="tb-col "><span class="overline-title">SI No</span></th>
                                <th class="tb-col "><span class="overline-title">date</span></th>
                                <th class="tb-col "><span class="overline-title">Quotation id</span></th>
                                <th class="tb-col "><span class="overline-title">Customer Name</span></th>
                                <th class="tb-col "><span class="overline-title">Mobile</span></th>
                                <th class="tb-col "><span class="overline-title">Bike Model</span></th>
                                <th class="tb-col "><span class="overline-title">amount</span></th>
                                <!-- <th class="tb-col "><span class="overline-title">Mode of payment</span></th> -->
                                <th class="tb-col tb-col-end" data-sortable="false"><span class="overline-title">Preview</span></th>
                                <th class="tb-col tb-col-end" data-sortable="false"><span class="overline-title">Action</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $sel = mysqli_query($conn, "SELECT * FROM customer1 where total!='' and mop!='Credit' ORDER BY date desc");
                            $sel = mysqli_query($conn, "SELECT * FROM quotation ORDER BY date DESC");
                            $i = 1;
                            if (mysqli_num_rows($sel) > 0) {
                                while ($fe = mysqli_fetch_assoc($sel)) {
                            ?>
                                    <tr>
                                        <!-- <td></td> -->
                                        <td colspan="2" class="tb-col">
                                            <span style="display:flex;justify-items:center;align-items:center;">
                                                <!-- <input type="checkbox" class="selectBox" style="scale: 1.4;" value="<?= $fe['id']; ?>"> -->
                                                <span style="margin-left:10px;"><?= $i++; ?></span>
                                            </span>
                                        </td>
                                        <td class="tb-col "><span><?php echo date("d-m-Y", strtotime($fe['date'])); ?></span></td>
                                        <td class="tb-col">
                                            <span style="display:flex; justify-content:space-between;align-items:center;color:black;">
                                                <b>#<?= $fe['id']; ?></b>
                                            </span>
                                        </td>
                                        <td class="tb-col"><span><?= $fe['cname']; ?></span></td>
                                        <td class="tb-col"><span><?= $fe['mobile']; ?>.00</span></td>
                                        <td class="tb-col">
                                            <span class='badge bg-primary' style='text-transform:uppercase;'><?= $fe['category_name']; ?></span>
                                        </td>
                                        <td class="tb-col"><span><?= $fe['total']; ?>.00</span></td>
                                        <td class="tb-col tb-col-end">
                                            <div class="gap-col">

                                                <a href="billing-quotation.php?id=<?= $fe['id']; ?>" class="btn btn-sm btn-lighter"> Preview </a>
                                            </div>

                                        </td>

                                        <td class="tb-col tb-col-end">
                                            <div class="gap-col">
                                                <a href="edit-quotation.php?id=<?= $fe['id']; ?>" class="">
                                                    <em style="color:blue; font-size:20px" class="icon ni ni-edit"></em>
                                                </a>
                                                <a href="javascript:void(0);" onclick="confirmDelete(<?= $fe['id']; ?>)">
                                                    <em style="color:red; font-size:20px" class="icon ni ni-trash"></em>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                            <?php        }
                            }
                            ?>
                            <script>
                                let delete_url = 'delete-quotation.php?id=';
                                let edit_url = 'edit-courier.php?id=';
                            </script>

                            <script>
                                document.getElementById("selectAll").addEventListener("click", function() {
                                    let isChecked = this.checked;
                                    document.querySelectorAll(".selectBox").forEach(cb => cb.checked = isChecked);
                                });

                                function exportSelected() {
                                    let selectedIds = [];
                                    document.querySelectorAll(".selectBox:checked").forEach(cb => {
                                        selectedIds.push(cb.value);
                                    });

                                    if (selectedIds.length === 0) {
                                        alert("Please select at least one invoice to export.");
                                        return;
                                    }

                                    // Send selected IDs to backend via POST
                                    let form = document.createElement("form");
                                    form.method = "POST";
                                    form.action = "export-invoice-address.php";
                                    selectedIds.forEach(id => {
                                        let input = document.createElement("input");
                                        input.type = "hidden";
                                        input.name = "ids[]";
                                        input.value = id;
                                        form.appendChild(input);
                                    });

                                    document.body.appendChild(form);
                                    form.submit();
                                }
                            </script>


                            <?php
                            include 'common/sweet_confirm.php';
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</body>
<script src="assets/js/bundle.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/data-tables/data-tables.js"></script>

</html>