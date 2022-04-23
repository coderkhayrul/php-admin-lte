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
                        <li class="breadcrumb-item active">Show Product</li>
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
                    <h3>Product Show</h3>
                    <a href="product.php" class="btn btn-primary btn-sm ml-auto">All Product</a>
                </div>
                <div class="card-body">
                    <?php
                        if (isset($_GET['id'])) {
                            $product_id = $_GET['id'];
                            $product = product_show($product_id);
                            while ($data = $product->fetch_assoc()) { ?>
                                <form method="post" >
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_name" class="control-label">Name</label>
                                    <input disabled type="text" class="form-control" name="product_name" placeholder="Enter Name" value="<?php echo $data['product_name'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_barcode" class="control-label">Barcode</label>
                                    <input disabled type="text" class="form-control" name="product_barcode" placeholder="Enter Email" value="<?php echo $data['product_barcode'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_type" class="control-label">Type</label>
                                    <input disabled type="text" class="form-control" name="product_type" value="<?php echo $data['product_type'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_branch" class="control-label">Product Branch</label>
                                    <select disabled class="form-control" name="product_branch">
                                    <?php
                                            $branch = all_branch();
                                            while ($info = $branch->fetch_assoc()){?>
                                        <option value="<?php echo $info['branch_id'] ?>" <?php echo $info['branch_id'] == $data['product_branch'] ? 'selected' : '' ?> >
                                        <?php echo $info['branch_name'] ?></option>
                                            <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_size" class="control-label">Size</label>
                                    <input disabled type="text" class="form-control" name="product_size" value="<?php echo $data['product_size'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_cost" class="control-label">Cost Price</label>
                                    <input disabled type="number" class="form-control" name="product_cost" value="<?php echo $data['product_cost'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_sell" class="control-label">Sell Price</label>
                                    <input disabled type="number" class="form-control" name="product_sell" value="<?php echo $data['product_sell'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_quantity" class="control-label">Quantity</label>
                                    <input disabled type="number" class="form-control" name="product_quantity" value="<?php echo $data['product_quantity'] ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="product_description" class="control-label">Description</label>
                                    <textarea disabled name="product_description" class="form-control"><?php echo $data['product_description'] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                            <?php }
                        }?>
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include './includes/footer.php'; ?>