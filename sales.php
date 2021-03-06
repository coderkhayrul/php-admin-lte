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
                    <h1 class="m-0">Sales</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sales</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php
    // Product Sale Summery Add Function
    if (isset($_POST['saleSummery'])) {
        $sale_employe = $_SESSION['auth_id'];
        $sale_branch = $_SESSION['auth_branch'];
        $sale_customer = $_POST['sale_customer'];
        $sale_date = $_POST['sale_date'];
        $sale_invoice = $_POST['sale_invoice'];
        // ------------------------------------
        $sale_total_quantity = $_POST['sale_total_quantity'];
        $sale_total_price = $_POST['sale_total_price'];
        $sale_total_discount = $_POST['sale_total_discount'];
        $sale_net_amount = $_POST['sale_net_amount'];
        $sale_due_amount = $_POST['sale_due_amount'];
        $sale_due_date = $_POST['sale_due_date'];
        // ----------------- Extra -------------
        $sale_barcode = $_POST['sale_barcode'];

        if (empty($sale_employe) || empty($sale_branch) || empty($sale_customer) || 
            empty($sale_date) || empty($sale_invoice) || 
            empty($sale_total_price) || empty($sale_total_discount) ||
            empty($sale_net_amount) || empty($sale_due_amount) || empty($sale_due_date)){
            $_SESSION['error_message'] = "Please Fill all required fields!";
            
        }else{
            sales_summery_add_product($sale_employe, $sale_branch, $sale_customer, $sale_date, 
            $sale_invoice, $sale_total_quantity, $sale_total_price, $sale_total_discount,  
            $sale_net_amount, $sale_due_amount, $sale_due_date);
        }
    }

    // Product Search Function
    if (isset($_POST['searchProduct'])) {
        $sale_branch = $_SESSION['auth_branch'];
        $sale_customer = $_POST['sale_customer'];
        $sale_date = $_POST['sale_date'];
        $sale_barcode = $_POST['sale_barcode'];
        $sale_invoice = $_POST['sale_invoice'];

        if (empty($sale_branch)) {
            $_SESSION['error_message'] = "Please Fill all required fields!";
        }else{
            $single_product = get_single_product_for_seles($sale_barcode);
        }
    }

    // Single Product Sale Add Function
    if (isset($_POST['insertProduct'])) {
        $sale_branch = $_SESSION['auth_branch'];
        $sale_customer = $_POST['sale_customer'];
        $sale_date = $_POST['sale_date'];
        $sale_barcode = $_POST['sale_barcode'];
        $sale_invoice = $_POST['sale_invoice'];
        // ------------------------------------
        $sale_price = $_POST['sale_price'];
        $sale_quantity = $_POST['sale_quantity'];
        $product_total_price = $_POST['product_total_price'];

        if (empty($sale_branch) || empty($sale_customer) || empty($sale_date) || empty($sale_barcode) ||  empty($sale_price) || empty($sale_quantity) || empty($product_total_price) || empty($sale_invoice)) {
            $_SESSION['error_message'] = "Please Fill all required fields!";
        }else{
            sales_product_quantity_update($sale_barcode, $sale_quantity);
            single_product_add_on_sales($sale_branch, $sale_customer, $sale_date, $sale_barcode, $sale_invoice, $sale_price, $sale_quantity, $product_total_price);
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
                        <label for="sale_invoice" class="control-label">Sale Invoice</label>
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
                        <input id="product_total_price" min="0" type="number" name="product_total_price"
                            class="form-control" readonly >
                    </div>
                    <div class="col-md-1">
                        <label for="previous_quantity" class="control-label text-danger">Qty</label>
                        <input disabled type="number" name="previous_quantity"
                            class="form-control" readonly value="<?php echo $single_product['product_quantity'];?>">
                    </div>
                    <div class="col-md-2">
                        <button name="insertProduct" class="btn btn-success" style="margin-top:30px"><i
                                class="fas fa-plus"></i> Product</button>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>Product Name</th>
                                    <th>Date</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $products= get_product_for_sales($sale_customer, $sale_date, $sale_invoice);
                                    foreach($products as $product){ ?>
                                    <tr class="text-center">
                                        <td>
                                        <?php 
                                        $sale_products = get_product_name_for_sales();
                                        foreach ($sale_products as $date){ ?>
                                            <?php echo $product['sale_barcode'] == $date['product_barcode'] ? $date['product_name'] : '' ?>
                                        <?php } ?>
                                        </td>
                                        <td><?php echo $product['sale_date']; ?></td>
                                        <td><?php echo $product['sale_price']; ?> ???</td>
                                        <td><?php echo $product['sale_quantity']; ?></td>
                                        <td><?php echo $product['sale_total_price']; ?> ???</td>
                                        <td>
                                            <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-backspace"></i></a>
                                        </td>
                                    </tr>
                                    <?php }
                                ?>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="2">
                                        <label for="" class="control-label">Sales By</label>
                                        <input disabled type="text" class="form-control" readonly value="<?php echo $_SESSION['auth_name']; ?>">
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        <label for="" class="control-label">Sales To</label>
                                        <input disabled type="text" class="form-control" readonly>
                                    </th>
                                    <th rowspan="1" colspan="1" style="width: 20%;">
                                        <label for="" class="control-label">Total Quantity</label>
                                        <?php $sales = sales_total_quantity($sale_customer, $sale_date, $sale_invoice); ?>
                                        <input name="sale_total_quantity" type="number" class="form-control" readonly value="<?php echo $sales['quantity'] ?>">
                                    </th>
                                    <th rowspan="1" colspan="1" style="width: 20%;">
                                        <label for="" class="control-label">Total Price</label>
                                        <?php $sales = sales_total_price($sale_customer, $sale_date, $sale_invoice); ?>
                                        <input name="sale_total_price"  id="total_price" type="number" class="form-control" readonly value="<?php echo $sales['price'] ?>">
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        
                                    </th>
                                </tr>
                                <tr>
                                    <th rowspan="1" colspan="2">
                                        <label for="" class="control-label">Discount Amount</label>
                                        <input id="discount_amount" name= "sale_total_discount" onkeyup="CalcDiscount();" name="discount_amount" type="number" class="form-control">
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        <label for="" class="control-label">Net Amount</label>
                                        <input id="net_amount" name="sale_net_amount" type="number" class="form-control" readonly>
                                    </th>
                                    <th rowspan="1" colspan="1" style="width: 20%;">
                                        <label for="" class="control-label">Due Amount</label>
                                        <input id="due_amount" name="sale_due_amount" type="number" class="form-control">
                                    </th>
                                    <th rowspan="1" colspan="1" style="width: 20%;">
                                        <label for="" class="control-label">Due Date</label>
                                        <input name="sale_due_date" type="date" class="form-control">
                                    </th>
                                    <th rowspan="1" colspan="1">
                                        
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12 text-center">
                        <button name="saleSummery" class="btn btn-success btn-lg">Submit Sale</button>
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
</script>
<?php include './includes/footer.php'; ?>