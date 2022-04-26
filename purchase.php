<!-- Header -->
<?php include './includes/header.php'; ?>

<?php include './includes/topbar.php'; ?>
<?php include './includes/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Purchase</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Purchase</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <?php
                if (isset($_POST['purchaseSummary'])) {
                    
                    $ps_branch = $_POST['pd_branch'];
                    $ps_company = $_POST['pd_company'];
                    $ps_purchase_date = $_POST['pd_date'];
                    $ps_invoice = $_POST['pd_invoice'];
                    $ps_total_price = $_POST['ps_total_price'];
                    $ps_total_quantity = $_POST['ps_total_quantity'];
                    $ps_discount = $_POST['ps_discount'];
                    $ps_employee = $_POST['ps_employee'];
                    $ps_net_amount = $_POST['ps_net_amount'];
                    $ps_payment_amount = $_POST['ps_payment_amount'];
                    $ps_due_amount = $_POST['ps_due_amount'];

                    if (empty($ps_branch) || empty($ps_company) || empty($ps_purchase_date) || empty($ps_invoice) || empty($ps_total_price) || empty($ps_total_quantity) || empty($ps_discount) || empty($ps_employee) || empty($ps_net_amount) || empty($ps_payment_amount) || empty($ps_due_amount)) {
                        $_SESSION['error_message'] = "Please Fill all required fields!";
                    }else {
                        purchase_summery_insert($ps_branch, $ps_company, $ps_purchase_date, $ps_invoice, $ps_total_price, $ps_total_quantity, $ps_discount, $ps_employee, $ps_net_amount, $ps_payment_amount, $ps_due_amount);
                    }
                }
                ?>

                <?php
                if (isset($_POST['findProduct'])) {
                    $pd_product_barcode = $_POST['pd_product_barcode'];
                    $pd_branch = $_POST['pd_branch'];
                    $pd_company = $_POST['pd_company'];
                    $pd_date = $_POST['pd_date'];
                    $pd_invoice = $_POST['pd_invoice'];
                    $search_product = search_product_for_purchase($pd_product_barcode, $pd_branch);
                }

                if (isset($_POST['insertPurchase'])) {
                    $pd_branch = $_POST['pd_branch'];
                    $pd_company = $_POST['pd_company'];
                    $pd_date = $_POST['pd_date'];
                    $pd_invoice = $_POST['pd_invoice'];
                    $pd_product_barcode = $_POST['pd_product_barcode'];
                    $pd_product_price = $_POST['pd_product_price'];
                    $pd_quantity = $_POST['pd_quantity'];
                    $pd_total_price = $_POST['pd_total_price'];
                    
                    if (empty($pd_branch) && empty($pd_company) && empty($pd_date) && empty($pd_invoice) && empty($pd_product_barcode) && empty($pd_product_price) && empty($pd_quantity) && empty($pd_total_price)) {
                        $_SESSION['error_message'] = "Please Fill all required fields!";
                    }else{
                        product_quantity_update($pd_product_barcode, $pd_quantity);
                        insertPurchase($pd_branch, $pd_company, $pd_date, $pd_invoice, $pd_product_barcode, $pd_product_price, $pd_quantity, $pd_total_price);
                    }
                }
                ?>
                <form method="POST">
                    <div class="card-header">
                        <!-- 1 ROW START -->
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-3">
                                <select name="pd_branch" class="form-control">
                                    <?php
                                $branchs = get_branch_for_purchase();
                                $auth_branch = $_SESSION['auth_branch'];
                                foreach ($branchs as $branch) {?>
                                    <option value="<?php echo $branch['branch_id'] ?>"
                                        <?php echo $info['branch_id'] == $_SESSION['auth_branch'] ? 'selected' : '' ?>>
                                        <?php echo $branch['branch_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="pd_company" id="">
                                    <option value="0">Select Company</option>
                                    <?php
                                    $pu_company = get_company_for_purchase();
                                    foreach ($pu_company as $company) { ?>
                                    <option value="<?php echo $company['company_id']; ?>"
                                        <?php echo $company['company_id'] == $pd_company ? 'selected' : '' ?>>
                                        <?php echo $company['company_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input name="pd_date" type="date" class="form-control" value="<?php echo $pd_date ?>">
                            </div>
                            <div class="col-md-3">
                                <input name="pd_invoice" type="number" class="form-control" placeholder="Invoice"
                                    value="<?php echo $pd_invoice ?>">
                            </div>
                        </div>
                        <!-- 2 ROW START -->
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <input name="pd_product_barcode" type="number" class="form-control"
                                    placeholder="Enter Barcode" value="<?php echo $pd_product_barcode ?>">
                            </div>
                            <div class="col-md-1">
                                <button name="findProduct" class="btn btn-success">Find</button>
                            </div>
                            <div class="col-md-2">
                                <?php
                                foreach ($search_product as $product){?>
                                <input id="product_price" name="pd_product_price" type="number" class="form-control"
                                    placeholder="Product Price" value="<?php echo $product['product_cost'] ?>">
                                <?php } ?>
                            </div>

                            <div class="col-md-2 d-flex">
                                <input id="pd_quantity" name="pd_quantity" type="number" class="form-control"
                                    placeholder="Qty" value="0">
                                <!-- Quantity Button -->
                                <input name="addition" type="button" class="btn btn-sm btn-primary ml-2" value="+"
                                    onclick="increaseValue()">
                                <input name="subtraction" type="button" class="btn btn-sm btn-primary ml-2" value="-"
                                    onclick="decreaseValue()">
                            </div>
                            <div class="col-md-2">
                                <input id="pd_total_price" name="pd_total_price" type="number" class="form-control"
                                    placeholder="Total Price" readonly>
                            </div>
                            <div class="col-md-2 text-center">
                                <button name="insertPurchase" class="btn btn-success">Purchase Add</button>
                            </div>
                        </div>
                        <!-- </form> -->
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>Invoice</th>
                                    <th>Product Name</th>
                                    <th>Date</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            $purchases = get_purchase_product($pd_company, $pd_date, $pd_invoice);
                            foreach ($purchases as $purchase){ ?>
                                <tr class="text-center">
                                    <td><?php echo $purchase['pd_invoice'] ?></td>
                                    <td>
                                        <?php
                                            $all_product = get_all_product_for_purchases($pd_branch);
                                            foreach ($all_product as $product){
                                                echo $purchase['pd_product_barcode'] == $product['product_barcode'] ? $product['product_name'] : '';
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $purchase['pd_date'] ?></td>
                                    <td><?php echo $purchase['pd_product_price'] ?> ৳</td>
                                    <td><?php echo $purchase['pd_quantity'] ?></td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-backspace"></i></a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="2">
                                        <label for="" class="control-label">Purchase By:</label>
                                        <input type="text" class="form-control"
                                            value="<?php echo $_SESSION['auth_name']; ?>" readonly>

                                        <input name="ps_employee" type="hidden" class="form-control"
                                            value="<?php echo $_SESSION['auth_id']; ?>" readonly>
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        <label for="" class="control-label">Purchase From:</label>
                                        <select name="purchases_form" class="form-control">
                                            <?php
                                            $pu_company = get_company_for_purchase();
                                            foreach ($pu_company as $company) { ?>
                                            <option disabled value="<?php echo $company['company_id']; ?>"
                                                <?php echo $company['company_id'] == $pd_company ? 'selected' : '' ?>>
                                                <?php echo $company['company_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        <label for="" class="control-label">Total Price:</label>
                                        <?php
                                            $total_prices = purchase_total_price($pd_company, $pd_date, $pd_invoice);
                                            foreach ($total_prices as $total_price){ ?>
                                        <input name="ps_total_price" id="total_price" type="number"
                                            class="form-control text-center"
                                            value="<?php echo $total_price['product_price']; ?>" readonly>
                                        <?php } ?>
                                    </th>
                                    <th rowspan="1" colspan="1" class="text-center">
                                        <label for="" class="control-label">Total Quantity:</label>
                                        <?php
                                            $total_quantitys = purchase_total_quantity($pd_company, $pd_date, $pd_invoice);
                                            foreach ($total_quantitys as $total_quantity){ ?>
                                        <input name="ps_total_quantity" id="total_quantity" type="number"
                                            class="form-control text-center"
                                            value="<?php echo $total_quantity['product_quantity']; ?>" readonly>
                                        <?php } ?>
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        <label for="" class="control-label">Discount Amount:</label>
                                        <input name="ps_discount" id="discount_amount" type="number"
                                            class="form-control" onkeyup="CalcDiscount();" min="0">
                                    </th>
                                </tr>
                                <tr>

                                    <th rowspan="1" colspan="3">

                                    </th>
                                    <th rowspan="1" colspan="1">
                                        <label for="" class="control-label">Net Amount:</label>
                                        <input name="ps_net_amount" id="net_amount" type="number" class="form-control"
                                            readonly>
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        <label for="" class="control-label">Due Amount:</label>
                                        <input name="ps_due_amount" id="due_amount" type="number" class="form-control"
                                            readonly>
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        <label for="" class="control-label">Payment Amount:</label>
                                        <input name="ps_payment_amount" id="payment_amount" type="number"
                                            class="form-control" onkeyup="payDiscount();" min="0">
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button name="purchaseSummary" class="btn btn-success text-uppercase btn-lg"><i
                                        class="fas fa-save"></i> Save
                                    Summary</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    function increaseValue() {
        var quantity = parseInt(document.getElementById('pd_quantity').value);
        var product_price = parseInt(document.getElementById('product_price').value);
        var totalQuantity = quantity + 1;
        document.getElementById('pd_quantity').value = totalQuantity;
        var totalPrice = (product_price * totalQuantity);
        document.getElementById('pd_total_price').value = totalPrice;
    }

    function decreaseValue() {
        var quantity = parseInt(document.getElementById('pd_quantity').value);
        var product_price = parseInt(document.getElementById('product_price').value);
        if (quantity == 0) {
            document.getElementById('pd_quantity').value = 0;
            document.getElementById('pd_total_price').value = 0;
        } else {
            var totalQuantity = quantity - 1;
            document.getElementById('pd_quantity').value = totalQuantity;
            var totalPrice = (product_price * totalQuantity);
            document.getElementById('pd_total_price').value = totalPrice;
        }
    }
</script>
<script>
    function CalcDiscount() {
        var total_price = parseInt(document.getElementById('total_price').value);
        var discount_amount = parseInt(document.getElementById('discount_amount').value);

        if (discount_amount <= 0) {
            $("#net_amount").val(total_price);
        } else {
            var net_amount = total_price - discount_amount;
            if (discount_amount >= total_price) {
                document.getElementById('net_amount').value = 0;

            } else {
                $("#net_amount").val(net_amount);
            }
        }
    }

    function payDiscount() {
        var payment_amount = parseInt(document.getElementById('payment_amount').value);
        var net_amount = parseInt(document.getElementById('net_amount').value);
        var due_amount = parseInt(document.getElementById('due_amount').value);

        if (net_amount <= payment_amount) {
            $("#due_amount").val(0);
        } else {
            var due_blances = net_amount - payment_amount;
            $("#due_amount").val(due_blances);
        }
    }
</script>
<?php include './includes/footer.php'; ?>