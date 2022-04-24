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

                        if (isset($_POST['updateProduct'])) {

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
                                $product_id = $_GET['id'];
                                product_update($product_name, $product_barcode, $product_size, $product_type, $product_branch, $product_cost, $product_sell, $product_quantity, $product_description, $product_id);
                            }
                        }
                        if (isset($_GET['id'])) {
                            $product_id = $_GET['id'];
                            $product = product_edit($product_id);
                            while ($data = $product->fetch_assoc()) { ?>
                    <form method="post">
                        <div class="row">
                            <!-- Product Branch -->
                            <input type="hidden" class="form-control" name="product_branch" placeholder="Enter Branch" value="<?php echo $_SESSION['auth_branch'] ?>">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_name" class="control-label">Name</label>
                                    <input type="text" class="form-control" name="product_name" placeholder="Enter Name"
                                        value="<?php echo $data['product_name'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_barcode" class="control-label">Barcode</label>
                                    <input type="number" class="form-control" name="product_barcode"
                                        placeholder="Enter Barcode"  value="<?php echo $data['product_barcode'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_size" class="control-label">Size</label>
                                    <select name="product_size" id="" class="form-control">
                                        <option value="0">Select Size</option>
                                        <option value="small" <?php echo $data['product_size'] == 'small' ? 'selected' : '' ?>>Small</option>
                                        <option value="medium" <?php echo $data['product_size'] == 'medium' ? 'selected' : '' ?>>Medium</option>
                                        <option value="large" <?php echo $data['product_size'] == 'clothing' ? 'selected' : '' ?>>Large</option>
                                        <option value="no-size" <?php echo $data['product_size'] == 'no-size' ? 'selected' : '' ?>>No Size</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_type" class="control-label">Type</label>
                                    <select name="product_type" id="" class="form-control">
                                        <option value="0">Select Type</option>
                                        <option value="clothing" <?php echo $data['product_type'] == 'clothing' ? 'selected' : '' ?>>Clothing</option>
                                        <option value="security" <?php echo $data['product_type'] == 'security' ? 'selected' : '' ?>>Security</option>
                                        <option value="gadget" <?php echo $data['product_type'] == 'gadget' ? 'selected' : '' ?>>Gadget</option>
                                        <option value="components" <?php echo $data['product_type'] == 'components' ? 'selected' : '' ?>>Components</option>
                                        <option value="accessories" <?php echo $data['product_type'] == 'accessories' ? 'selected' : '' ?>>Accessories</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_cost" class="control-label">Product Cost Price</label>
                                    <input type="number" class="form-control" name="product_cost"
                                        placeholder="Enter Product Cost Price"  value="<?php echo $data['product_cost'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_sell" class="control-label">Product Sell Price</label>
                                    <input type="number" class="form-control" name="product_sell"
                                        placeholder="Enter Product Sell Price"  value="<?php echo $data['product_sell'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_quantity" class="control-label">Quantity</label>
                                    <input type="number" class="form-control" name="product_quantity"
                                        placeholder="Enter Quantity"  value="<?php echo $data['product_quantity'] ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="product_description" class="control-label">Description</label>
                                    <textarea name="product_description" class="form-control"><?php echo $data['product_description'] ?></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button name="updateProduct" type="submit" class="btn btn-success">Update
                                    Product</button>
                            </div>
                        </div>
                    </form>
                    <?php }
                        } 
                    ?>
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
<?php include './includes/footer.php'; ?>