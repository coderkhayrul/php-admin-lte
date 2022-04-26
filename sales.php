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
    if (isset($_POST['searchProduct'])) {
        $sale_branch = $_POST['sale_branch'];
        $sale_customer = $_POST['sale_customer'];
        $sale_date = $_POST['sale_date'];
        $sale_barcode = $_POST['sale_barcode'];

        if (empty($sale_branch) || empty($sale_barcode)) {
            $_SESSION['error_message'] = "Please Fill all required fields!";
        }else{
            $single_product = get_single_product_for_seles($sale_barcode);
        }
    }
?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form method="POST">
                <div class="row pb-2">
                    <div class="col-md-3">
                        <label for="sale_branch" class="control-label">Branch Name</label>
                        <select name="sale_branch" id="" class="form-control">
                            <?php $sale_branch = get_branch_for_sale(); ?>
                            <option value="<?php echo $sale_branch['branch_id']; ?>"><?php echo $sale_branch['branch_name']; ?></option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="" class="control-label">Customer Name</label>
                        <select name="sale_customer" id="" class="form-control">
                            <option value="0">Select Customer</option>
                            <?php
                            $customers = get_customer_for_sale();
                            foreach ($customers as $customer) { ?>
                            <option value="<?php echo $customer['customer_id']; ?>" <?php echo $customer['customer_id'] == $sale_customer ? "selected" : "" ?>><?php echo $customer['customer_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="sale_date" class="control-label">Sale Date</label>
                        <input name="sale_date" type="date" class="form-control" value="<?php echo $sale_date; ?>">
                    </div>
                    <div class="col-md-2">
                        <label for="sale_barcode" class="control-label">Product Barcode</label>
                        <input class="form-control" type="number" name="sale_barcode" placeholder="Enter Barcode" value="<?php echo $sale_barcode; ?>">
                    </div>
                    <div class="col-md-2">
                        <button name="searchProduct" class="btn btn-success" style="margin-top:30px"><i class="fas fa-search"></i> Product</button>
                    </div>
                </div>

                <div class="dropdown-divider my-2"></div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="sale_product" class="control-label">Product Name</label>
                        <input type="text" name="sale_product" class="form-control" readonly value="<?php echo $single_product['product_name'];?>">
                    </div>
                    <div class="col-md-2">
                        <label for="sale_product" class="control-label">Product Price</label>
                        <input id="product_price" type="number" min="0" name="sale_price" class="form-control" value="<?php echo $single_product['product_sell'];?>">
                    </div>

                    <div class="col-md-2 d-block">
                        <label for="sale_quantity" class="control-label">Quantity</label>
                        <div class="row d-flex">
                        <input id="product_quantity" type="number" name="sale_quantity" class="form-control ml-2" style="width: 50%" min="0" value="0">
                        <input onclick="increaseValue()" type="button" class="btn btn-sm btn-primary mx-2" value="+">
                        <input onclick="decreaseValue()" type="button" class="btn btn-sm btn-primary mx-2" value="-">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="sale_total_price" class="control-label">Total Price</label>
                        <input id="product_total_price" min="0" type="number" name="sale_total_price" class="form-control" readonly>
                    </div>
                    <div class="col-md-3 text-center">
                        <button name="insertProduct" class="btn btn-success ml-4" style="margin-top:30px"><i class="fas fa-plus"></i> Product</button>
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