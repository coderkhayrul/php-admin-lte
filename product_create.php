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
                    <h1 class="m-0">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Create Product</li>
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
                <div class="card-header d-flex">
                    <h3>Product Create</h3>
                    <a href="product.php" class="btn btn-primary btn-sm ml-auto">All Product</a>
                </div>
                <div class="card-body">
                    <?php

                        if (isset($_POST['saveProduct'])) {

                            $product_name = $_POST['product_name'];
                            $product_barcode = $_POST['product_barcode'];
                            $product_size = $_POST['product_size'];
                            $product_type = $_POST['product_type'];
                            $product_branch = $_POST['product_branch'];
                            $product_cost = $_POST['product_cost'];
                            $product_sell = $_POST['product_sell'];
                            $product_quantity = $_POST['product_quantity'];
                            $product_description = $_POST['product_description'];

                            if (empty($product_name) || empty($product_barcode) || empty($product_size) || empty($product_type) || empty($product_branch) || empty($product_cost) || empty($product_sell) || empty($product_quantity)) {
                                $_SESSION['error_message'] = "Please Fill all required fields!";
                            }else {
                                product_insert($product_name, $product_barcode, $product_size, $product_type, $product_branch, $product_cost, $product_sell, $product_quantity, $product_description);
                            }
                        }
                    ?>
                    <form method="post" >
                        <div class="row">
                            <!-- Product Branch -->
                            <input type="hidden" class="form-control" name="product_branch" placeholder="Enter Branch" value="<?php echo $_SESSION['auth_branch'] ?>">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_name" class="control-label">Name</label>
                                    <input type="text" class="form-control" name="product_name" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_barcode" class="control-label">Barcode</label>
                                    <input type="number" class="form-control" name="product_barcode" placeholder="Enter Barcode">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_size" class="control-label">Size</label>
                                    <select name="product_size" id="" class="form-control">
                                        <option value="0">Select Size</option>
                                        <option value="small">Small</option>
                                        <option value="medium">Medium</option>
                                        <option value="large">Large</option>
                                        <option value="no-size" selected>No Size</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_type" class="control-label">Type</label>
                                    <select name="product_type" id="" class="form-control">
                                        <option value="0">Select Type</option>
                                        <option value="clothing">Clothing</option>
                                        <option value="security">Security</option>
                                        <option value="gadget">Gadget</option>
                                        <option value="components">Components</option>
                                        <option value="accessories">Accessories</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_cost" class="control-label">Product Cost Price</label>
                                    <input type="number" class="form-control" name="product_cost" placeholder="Enter Product Cost Price">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_sell" class="control-label">Product Sell Price</label>
                                    <input type="number" class="form-control" name="product_sell" placeholder="Enter Product Sell Price">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_quantity" class="control-label">Quantity</label>
                                    <input type="number" class="form-control" name="product_quantity" placeholder="Enter Quantity">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="product_description" class="control-label">Description</label>
                                    <textarea name="product_description" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button name="saveProduct" type="submit" class="btn btn-success">Add Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
<?php include './includes/footer.php'; ?>