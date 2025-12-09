<script>
    $(document).ready(function() {
        $(".ex_cus").show();
        $(".new_cus").hide();
        $(".newuser").click(function() {
            $(".ex_cus").hide();
            $(this).addClass("activea");
            $(".existing").removeClass("activea");
            $(".new_cus").show();
            $('#cname').val('');
            $('#mobile_num').val('');
            $('#email').val('')
            $('#city').val('');
            $('#aadhar').val('');
            $('#choose_cus').val('');
            $(".category_append").hide();
            $("#c_amount").val('');
            $("#r_amount").val('');
            $(".btn_tax").text('0');
            $(".btn_discount").text('0');
            $(".main_discount").val('0');
            $(".main_discount1").val('0');
            $("#main_total").val(0);
            $("#net_amount").val(0);
            $("#quantity").val('');
            $("#specimen").val('');
            $("#courier").val('');
            $("#courieramt").val('0');
            $(".btn_courieramt").text('0');
            $("#price").val('');
            $("#credit_status").val(0);
            $("#address1").val('');
            $("#address").val('');
            $("#q_count").val('');
            $("#tprice1").val('');
            $("#cal").val('');
            $("#quantity_text").text('');
            $("#specimen_text").text('');
            $("#p5").html('<?php $sel = mysqli_query($conn, "SELECT book_name FROM book");
                            if (mysqli_num_rows($sel) > 0) {
                                for ($i = 0; $i < mysqli_num_rows($sel); $i++) { ?><option value="0" hidden>---SELECT BOOK NAME---</option><?php while ($fe = mysqli_fetch_assoc($sel)) { ?><option value="<?= $fe['book_name']; ?>"><?= $fe['book_name']; ?></option><?php }
                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                            } ?>');
        });
        $(".existing").click(function() {
            $(".ex_cus").show();
            $(".new_cus").hide();
            $(this).addClass("activea");
            $(".newuser").removeClass("activea");
            $(".category_append").hide();
            $('#mobile_num').val('');
            $('#email').val('');
            $('#city').val('');
            $('#aadhar').val('');
            $('#choose_cus').val('');
            $(".category_append").hide();
            $("#c_amount").val('');
            $("#r_amount").val('');
            $(".btn_tax").text('0');
            $(".btn_discount").text('0');
            $("#main_total").val(0);
            $("#net_amount").val(0);
            $("#quantity").val('');
            $("#specimen").val('');
            $("#courier").val('');
            $("#courieramt").val('0');
            $(".btn_courieramt").text('0');
            $("#price").val('');
            $("#credit_status").val(0);
            $("#address1").val('');
            $("#address").val('');
            $("#q_count").val('');
            $(".main_discount").val('0');
            $(".main_discount1").val('0');
            $("#tprice1").val('');
            $("#cal").val('');
            $("#quantity_text").text('');
            $("#specimen_text").text('');
            $("#p5").html('<?php $sel = mysqli_query($conn, "SELECT book_name FROM book");
                            if (mysqli_num_rows($sel) > 0) {
                                for ($i = 0; $i < mysqli_num_rows($sel); $i++) { ?><option value="0" hidden>---SELECT BOOK NAME---</option><?php while ($fe = mysqli_fetch_assoc($sel)) { ?><option value="<?= $fe['book_name']; ?>"><?= $fe['book_name']; ?></option><?php }
                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                            } ?>');
            $("#credit_status").val(0);
        });
        var g = $("#price").val();
        $(".main_discount").keyup(function() {
            calculatePrice();
            discount_price();
        });
        $("#cal").change(function() {
            calculatePrice();
            discount_price();
        });

        $(".main_tax").keyup(function() {
            calculatePrice();
            discount_price();
            var diff = Number($("#net_amount").val()) - Number($(".main_discount").val());
            $(".btn_tax").text(parseInt(diff * ($(".main_tax").val() / 100)));
        });
        $("#main_total").val(0);
        $("#net_amount").val(0);
        $("#c_ra").hide();
        $("#c_r1").hide();
        $("#c_r1a").hide();
        let qtyKeyUp = function() {
            $("#tprice1").val(($("#price").val()) * ($(this).val()))
            let total = $("#price").val() * $(this).val();
            // $("#tprice1").val(total);
            let pr = $("#price").val()
            console.log('$("#price").val()', pr, ',');
            console.log('total', total);
            calCourier();
            calculatePrice();
            discount_price();
        }
        $("#quantity").keyup(qtyKeyUp)
        $("#quantity").change(qtyKeyUp)
        let couKeyUp = function() {
            calCourier();
            calculatePrice();
            discount_price();
        }
        $("#courier").keyup(couKeyUp)
        $("#courier").change(couKeyUp)
        let priceKeyUp = function() {
            // calCourier();
            $("#tprice1").val(($("#quantity").val()) * ($(this).val()))
            calculatePrice();
            discount_price();
        }
        // $("#price").keyup(function() {
        //     calCourier();
        //     calculatePrice();
        //     discount_price();
        // })
        $("#price").keyup(priceKeyUp)
        $("#price").change(priceKeyUp)
        $("#choose_cus").change(function() {
            var id = $(this).val();
            $("#store_id").val();
            $.ajax({
                url: "ajaxCustomer.php",
                type: "post",
                data: {
                    "id": id
                },
                success: function(result) {
                    var obj = JSON.parse(result);
                    $('#cname').val(obj.cname);
                    $('#mobile_num').val(obj.mobile);
                    $('#email').val(obj.email)
                    $('#city').val(obj.city);
                    $('#aadhar').val(obj.aadhar);
                    $("#store_id").val(obj.id);
                    let formattedText = obj.address.replace(/<br\s*\/?>/g, "\n");
                    $("#address").val(formattedText);
                    $("#address1").val(formattedText);
                }
            })
        })
        // chassis_select

        $("#chassis_no").change(function() {

            let chassis = $(this).val();
            if (chassis == "") return;

            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    chassis_no: chassis
                },
                success: function(res) {

                    let obj = JSON.parse(res);

                    // Fill fields
                    $("#book_name").val(obj.book_name);
                    $("#price").val(obj.book_price);
                    $("#quantity").val(1);
                    $("#tprice1").val(obj.book_price);

                    // Additional fields
                    $("#brand").val(obj.brand);
                    $("#color").val(obj.color);
                    $("#motor").val(obj.motor_no);
                    $("#controller").val(obj.controller_no);
                    $("#charger").val(obj.charger_no);
                    $("#batterymodel").val(obj.battery_model);
                    $("#batterysn").val(obj.battery_sn);
                    $("#hsn").val(obj.hsn);

                    // Trigger existing functions
                    calCourier();
                    calculatePrice();
                    discount_price();

                    // Stock info
                    if (obj.book_stock <= <?= $fett_min_count['minimum_book_stock'] ?>) {
                        $("#quantity_text").html(
                            `<span class='text-danger'>(${obj.book_stock} in Stock)</span>`
                        );
                    } else {
                        $("#quantity_text").html(
                            `<span class='text-success'>(${obj.book_stock} in Stock)</span>`
                        );
                    }
                }
            });
        }); 


        $("#p5").change(function() {
            var name = $(this).closest("#p5").val();
            $.ajax({
                url: 'ajax.php',
                type: 'post',
                data: {
                    'name': name
                },
                success: function(result) {
                    var obj = JSON.parse(result);
                    $("#q_count").val(obj.book_price);
                    $("#tprice1").val(obj.book_price);
                    $("#quantity").val(1);
                    $("#courier").val(6);
                    $("#specimen").val(0);
                    var g = $("#price").val(obj.book_price);
                    $("#quantity").attr("max", obj.book_stock);
                    if (obj.book_stock <= <?= $fett_min_count['minimum_book_stock'] ?>) {
                        $("#quantity_text").html(
                            `<span class='form-label text-danger'>(${obj.book_stock} in Stock)</span>`
                        );
                    } else {
                        $("#quantity_text").html(
                            `<span class='form-label text-success'>(${obj.book_stock} in Stock)</span>`
                        );
                    }
                    calCourier();
                    calculatePrice();
                    discount_price();
                }
            })
        })

        $("#add_category").click(function() {
            var click_count = Number($("#totalll").val()) + 1;
            $("#totalll").val(click_count);
            $(".category_append1").append('<div class="row category_append p-2 py-0"><div class="col-lg-3 vav"><div class="form-group"><div class="form-control-wrap"><label for=""  class="form-label">Book Name<spam>*</spam></label><select class="form-select" data_id="' + click_count + '" id="p5_s_name' + click_count + '" name="category_name[]"><option value="0" hidden>---SELECT BOOK NAME---</option><?php $seli = mysqli_query($conn, "SELECT * from book");
                                                                                                                                                                                                                                                                                                                                                                                                                    if (mysqli_num_rows($seli)) {
                                                                                                                                                                                                                                                                                                                                                                                                                        while ($fz = mysqli_fetch_assoc($seli)) {; ?><option value="<?= $fz['book_name']; ?>"><?= $fz['book_name']; ?></option><?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        } ?></select></div></div></div><div class="col-lg-3 vav"><div class="form-group"><div class="form-control-wrap"><label for=""  class="form-label">Quantity<span id="quantity_text' + click_count + '" class="form-label"></span><spam>*</spam></label><input type="number" placeholder="Quantity" id="quantity1' + click_count + '" name="quantity[]" class="form-control qty"></div></div></div><div class="col-lg-3 vav"><div class="form-group"><div class="form-control-wrap"><label for=""  class="form-label">Specimen<span id="specimen_text' + click_count + '" class="form-label"></span><spam>*</spam></label><input type="number" placeholder="Specimen" id="specimen1' + click_count + '" name="specimen[]" class="form-control qty"></div></div></div><div class="col-lg-2 vav"><div class="form-group"><div class="form-control-wrap"><label for=""  class="form-label">Price<spam>*</spam></label><input type="text" placeholder="Price" class="form-control pricee" data_id="' + click_count + '" id="price1' + click_count + '" name="price[]"></div></div></div><div class="col-lg-3 vav"><div class="form-group"><div class="form-control-wrap"><label for=""  class="form-label">Total Price<spam>*</spam></label><input type="text" placeholder="Total Price" class="form-control tp" data_id="' + click_count + '" id="tprice2' + click_count + '" readonly></div></div></div><div class="col-lg-1 vav"><div class="form-group"><label for="quantity" class="form-label"></label><div class="form-control-wrap"><button class="btn btn-danger mt-4 rms-button btn-block" data_id="' + click_count + '" id="rms-button1"><em style="color:white;font-size:20px" class="icon ni ni-trash"></em></button></div><br></div></div></div>');
            $(".rms-button").click(function() {
                var r_data_id = $(this).attr('data_id');
                if ($("#price1" + r_data_id).val() != '') {
                    $(this).closest(".category_append").remove();
                    calCourier();
                    calculatePrice();
                } else {
                    $(this).closest(".category_append").remove();
                }
                discount_price();
            })
            $(".pricee").keyup(function() {
                calculatePrice();
                discount_price();
            });

            $(".main_discount").keyup(function() {
                calculatePrice();
                discount_price();
            });
            $(".main_discount1").keyup(function() {
                calculatePrice();
                discount_price();
            });
            $(".main_tax").keyup(function() {
                calculatePrice();
                discount_price();
                var diff = Number($("#net_amount").val()) - Number($(".main_discount1").val());
                if (diff > 0) {
                    $(".btn_tax").text(parseInt(diff * ($(".main_tax").val() / 100)));
                } else {
                    $(".btn_tax").text(0);
                }
            });
            var lennn = $("#totalll").val();
            for (let ii = 1; ii <= lennn; ii++) {
                $("#p5_s_name" + ii).change(function() {
                    var this_data_id = $(this).attr("data_id");
                    var name = $(this).closest("#p5_s_name" + this_data_id).val();
                    $.ajax({
                        url: 'ajax.php',
                        type: 'post',
                        data: {
                            'name': name
                        },
                        success: function(result) {
                            var obj = JSON.parse(result);
                            $("#price1" + this_data_id).val(obj.book_price);
                            $("#tprice2" + this_data_id).val(obj.book_price);
                            var num = this_data_id;
                            $("#quantity1" + num).val(1);
                            $("#quantity1" + num).attr("max", obj.book_stock);
                            $("#quantity_text" + num).attr("max", obj.book_stock);
                            let qtyKey = function() {
                                $("#tprice2" + num).val(($("#price1" + num).val()) * ($(this).val()))
                                calCourier();
                                calculatePrice();
                                discount_price();
                            }
                            $("#quantity1" + num).keyup(qtyKey)
                            $("#quantity1" + num).change(qtyKey)

                            if (obj.book_stock <= <?= $fett_min_count['minimum_book_stock'] ?>) {
                                $("#quantity_text" + num).html(
                                    `<span class='form-label text-danger'>(${obj.book_stock} in Stock)</span>`
                                );
                            } else {
                                $("#quantity_text" + num).html(
                                    `<span class='form-label text-success'>(${obj.book_stock} in Stock)</span>`
                                );
                            }

                            $("#price1" + num).keyup(function() {
                                $("#tprice2" + num).val(($("#quantity1" + num).val()) * ($(this).val()));
                                calCourier();
                                calculatePrice();
                                discount_price();
                            })
                            calCourier();
                            calculatePrice();
                            discount_price();
                        }
                    })
                })
            }
        })

        function calCourier() {
            let totalQty = 0;
            let perBookCourierCharge = $('#courier').val();
            // console.log('camt', camt);
            $("input[name='quantity[]']").each(function() {
                let val = parseInt($(this).val());
                if (!isNaN(val)) {
                    totalQty += val;
                }
            });

            // let perBookCourierCharge = 10;
            let totalCourierAmount = totalQty * perBookCourierCharge;

            $('#courieramt').val(totalCourierAmount);
            $(".btn_courieramt").text(totalCourierAmount);
        }

        function calculatePrice() {
            var total = 0;
            var couramt = 0;
            var len = $("#totalll").val();
            if ($('.tp').length) {
                $('.tp').each(function() {
                    total += Number($(this).val());
                });
            }
            $('#net_amount').val(total);
            $('#total_sample').val(total);
            couramt = Number($(".btn_courieramt").text()) || 0;
            total -= Number($('.main_discount1').val());
            // total += (Number($('.main_tax').val()) * Number(total)) / 100;
            total += Number(couramt);
            if (total < 0) {
                $('#main_total').val(0);
            } else {
                $('#main_total').val(parseInt(total));
            }
        }

        function myFun() {
            if ($('#main_total').val() == '' || $('#main_total').val() == 0) {
                alert("Please book your bill is empty");
                return false;
            }
        }

        function discount_price() {
            var j = $(".main_discount").val();
            console.log('j', j)
            if (j.includes('%')) {
                console.log('execute%')
                j = j.replace('%', '');
                var c = parseInt(j * ($("#net_amount").val() / 100));
                var b = $("#net_amount").val() - c;
                console.log('b', b)
                if (b < 0) {
                    $(".btn_discount").text(0);
                } else {
                    $(".btn_discount").text(b);
                    $(".main_discount1").val(c);
                }
                // var md = Number($(".main_discount").val());
                var diff = Number($("#net_amount").val()) - j;
                console.log('diff%', diff, $(".main_tax").val());
                var a = parseInt(b * ($(".main_tax").val() / 100));
                console.log('a%', a)
                // a = Number(a);
                a = String(a).replace(/[^0-9.-]/g, '');
                // a = parseFloat(a);
                if (a < 0) {
                    console.log('a% in side if', a)
                    $(".btn_tax").text(0);
                } else {
                    console.log('a% in side else', a)
                    $(".btn_tax").text(a);
                }
                calculatePrice()
            } else {
                console.log('execute1234')
                var b = parseInt($("#net_amount").val() - j);
                console.log('b', b)
                if (b < 0) {
                    $(".btn_discount").text(0);
                } else {
                    $(".btn_discount").text(b);
                    $(".main_discount1").val(j);
                }
                var diff = Number($("#net_amount").val()) - Number($(".main_discount").val());
                var a = parseInt(b * ($(".main_tax").val() / 100));
                if (a < 0) {
                    $(".btn_tax").text(0);
                } else {
                    $(".btn_tax").text(a);
                }
                calculatePrice()
            }

        }
        $("#mop1").change(function(event) {
            let j = $("#main_total").val();
            $("#c_amount").val(j);
            if ($(this).val() == "Credit") {
                $("#c_ra").show();
                $("#c_r1").show();
                $("#c_r1a").show();
                $("#credit_status").val(0);
                $("#c_amount").keyup(function() {
                    $("#credit_status").val(0);
                    $("#r_amount").val($("#main_total").val() - $("#c_amount").val());

                    if ($("#r_amount").val() < 0) {
                        $("#r_amount").val("Warning!");
                    }
                    if ($("#r_amount").val() != 0) {
                        $("#credit_status").val(1);
                    } else if ($("#r_amount").val() == 0 || $("#r_amount").val() == "Warning!") {
                        $("#credit_status").val(0);
                    }
                })
            } else {
                $("#r_amount").val('');
                $("#credit").val('');
                $("#c_amount").val($("#main_total").val());
                $("#c_ra").hide();
                $("#c_r1").hide();
                $("#c_r1a").hide();
                $("#credit_status").val(0);
            }
        })
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
            minLength: 1 // Minimum number of characters before autocomplete starts
        })

        // //editpage
        // $(document).on('keyup change', '.quantity', function() {
        //     let $row = $(this).closest('.category_append');
        //     let qty = parseFloat($(this).val()) || 0;
        //     let price = parseFloat($row.find('.pricee').val()) || 0;
        //     let total = qty * price;

        //     $row.find('.tp').val(total);

        //     console.log('price', price);
        //     console.log('total', total);

        //     calCourier(); // if needed
        //     calculatePrice(); // if needed
        //     discount_price(); // if needed
        // });
        $(document).on("input", ".form-control", function() {
            let dataId = $(this).attr("data_id");

            // Select relevant fields by ID and data_id
            let quantity = parseFloat($("#quantity[data_id='" + dataId + "']").val()) || 0;
            let price = parseFloat($("#price[data_id='" + dataId + "']").val()) || 0;

            // Calculate and update total price
            let total = quantity * price;
            $("#tprice1[data_id='" + dataId + "']").val(total);
        });

    })
</script>
<!-- jQuery Core (already included) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery UI -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>