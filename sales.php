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
    <?php

    // Product Search Function
    if (isset($_POST['searchProduct'])) {
        $sale_branch = $_SESSION['auth_branch'];
        $sale_customer = $_POST['sale_customer'];
        $sale_date = $_POST['sale_date'];
        $sale_barcode = $_POST['sale_barcode'];

        if (empty($sale_branch) || empty($sale_barcode)) {
            $_SESSION['error_message'] = "Please Fill all required fields!";
        }else{
            $single_product = get_single_product_for_seles($sale_barcode);
        }
    }

    // Product Sale Add Function
    if (isset($_POST['insertProduct'])) {
        $sale_branch = $_POST['sale_branch'];
        $sale_customer = $_POST['sale_customer'];
        $sale_date = $_POST['sale_date'];
        $sale_barcode = $_POST['sale_barcode'];
        $sale_invoice = $_POST['sale_invoice'];
        // ------------------------------------
        $sale_product_name = $_POST['sale_product'];
        $sale_price = $_POST['sale_price'];
        $sale_quantity = $_POST['sale_quantity'];
        $sale_total_price = $_POST['sale_total_price'];

        if (empty($sale_branch) || empty($sale_customer) || empty($sale_date) || empty($sale_barcode) || empty($sale_product_name) || empty($sale_price) || empty($sale_quantity) || empty($sale_total_price) || empty($sale_invoice)) {
            $_SESSION['error_message'] = "Please Fill all required fields!";
        }else{
            // single_product_add_on_sale($sale_branch, $sale_customer, $sale_date, $sale_barcode, );
        }

    }

    ?>  
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form method="POST">
                <div class="row pb-2">
                    <div class="col-md-3">
                        <label for="" class="control-label">Customer Name</label>
                        <select name="sale_customer" id="" class="form-control">
                            <option value="0">Select Customer</option>
                            <?php
                            $customers = get_customer_for_sale();
                            foreach ($customers as $customer) { ?>
                            <option value="<?php echo $customer['customer_id']; ?>"
                                <?php echo $customer['customer_id'] == $sale_customer ? "selected" : "" ?>>
                                <?php echo $customer['customer_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="sale_date" class="control-label">Sale Date</label>
                        <input name="sale_date" type="date" class="form-control" value="<?php echo $sale_date; ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="sale_invoice" class="control-label">Sale Invocie</label>
                        <input class="form-control" type="number" name="sale_invoice" min="1" value="<?php echo $sale_invoice; ?>" placeholder="Enter Invocie">
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="sale_barcode" class="control-label">Product Barcode</label>
                        <input class="form-control" type="number" name="sale_barcode" placeholder="Enter Barcode"
                            value="<?php echo $sale_barcode; ?>">
                    </div>
                    <div class="col-md-2">
                        <button name="searchProduct" class="btn btn-success" style="margin-top:30px"><i
                                class="fas fa-search"></i> Product</button>
                    </div>
                </div>
                <div class="dropdown-divider my-2"></div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="sale_product" class="control-label">Product Name</label>
                        <input type="text" name="sale_product" class="form-control" readonly
                            value="<?php echo $single_product['product_name'];?>">
                    </div>
                    <div class="col-md-2">
                        <label for="sale_product" class="control-label">Product Price</label>
                        <input id="product_price" type="number" min="0" name="sale_price" class="form-control"
                            value="<?php echo $single_product['product_sell'];?>">
                    </div>
                    <div class="col-md-2 d-block">
                        <label for="sale_quantity" class="control-label">Quantity</label>
                        <div class="row d-flex">
                            <input id="product_quantity" type="number" name="sale_quantity" class="form-control ml-2"
                                style="width: 50%" min="0" value="0">
                            <input onclick="increaseValue()" type="button" class="btn btn-sm btn-primary mx-2"
                                value="+">
                            <input onclick="decreaseValue()" type="button" class="btn btn-sm btn-primary mx-2"
                                value="-">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="sale_total_price" class="control-label">Total Price</label>
                        <input id="product_total_price" min="0" type="number" name="sale_total_price"
                            class="form-control" readonly>
                    </div>
                    <div class="col-md-3">
                        <button name="insertProduct" class="btn btn-success ml-4" style="margin-top:30px"><i
                                class="fas fa-plus"></i> Product</button>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-md-12">
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
                                <tr class="text-center">
                                    <td>Body</td>
                                    <td>Body</td>
                                    <td>Body</td>
                                    <td>Body</td>
                                    <td>Body</td>
                                    <td>
                                        <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-backspace"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                            <!-- <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">
                                        Working
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        Working
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        Working
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        Working
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        Working
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        Working
                                    </th>
                                </tr>
                            </tfoot> -->
                        </table>
                    </div>
                </div>

            </form>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    function increaseValue() {
        var quantity = parseInt(document.getElementById('product_quantity').value);
        var product_price = parseInt(document.getElementById('product_price').value);
        var totalQuantity = quantity + 1;
        document.getElementById('product_quantity').value = totalQuantity;
        var totalPrice = (product_price * totalQuantity);
        document.getElementById('product_total_price').value = totalPrice;
    }

    function decreaseValue() {
        var quantity = parseInt(document.getElementById('product_quantity').value);
        var product_price = parseInt(document.getElementById('product_price').value);
        if (quantity == 0) {
            document.getElementById('product_quantity').value = 0;
            document.getElementById('product_total_price').value = 0;
        } else {
            var totalQuantity = quantity - 1;
            document.getElementById('product_quantity').value = totalQuantity;
            var totalPrice = (product_price * totalQuantity);
            document.getElementById('product_total_price').value = totalPrice;
        }
    }
</script>
<?php include './includes/footer.php'; ?>