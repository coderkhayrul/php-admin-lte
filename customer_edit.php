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
                    <h1 class="m-0">Customer</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit Customer</li>
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
                    <h3>Customer Edit</h3>
                    <a href="customer.php" class="btn btn-primary btn-sm ml-auto">All Customer</a>
                </div>
                <div class="card-body">
                    <?php
                    // Update Customer Data
                    if (isset($_POST['updateCustomer'])) {
                        $customer_branch = $_POST['customer_branch'];
                        $customer_name = $_POST['customer_name'];
                        $customer_phone = $_POST['customer_phone'];
                        $customer_address = $_POST['customer_address'];
                        
                        if (empty($customer_branch) || empty($customer_name) || empty($customer_phone) || empty($customer_address)) {
                            $_SESSION['error_message'] = "Please Fill all required fields!";
                        }else {
                            $customer_id=$_GET["id"];
                            customer_update($customer_branch, $customer_name, $customer_phone, $customer_address, $customer_id);
                        }
                    }

                    
                    // Get Customer Data
                    if (isset($_GET['id'])) {
                        $customer_id = $_GET['id'];
                        $customer = customer_edit($customer_id);
                        while ($data = $customer->fetch_assoc()) { ?>
                    <form method="post">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="branch_name" class="control-label">Branch Name</label>
                                    <select class="form-control" name="customer_branch">
                                        <option value="0" selected>Select Branch</option>
                                        <?php
                                            $branch = all_branch();
                                            while ($info = $branch->fetch_assoc()){?>
                                        <option value="<?php echo $info['branch_id'] ?>" <?php echo $info['branch_id'] == $data['customer_branch'] ? 'selected' : '' ?> >
                                        <?php echo $info['branch_name'] ?></option>
                                            <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customer_name" class="control-label">Name</label>
                                    <input type="text" class="form-control" name="customer_name" placeholder="Enter Email"
                                        value="<?php echo $data['customer_name'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customer_phone" class="control-label">Phone</label>
                                    <input type="text" class="form-control" name="customer_phone" placeholder="Enter Phone"
                                        value="<?php echo $data['customer_phone'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customer_address" class="control-label">Address</label>
                                    <input type="text" class="form-control" name="customer_address" placeholder="Enter Address"
                                        value="<?php echo $data['customer_address'] ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <button name="updateCustomer" type="submit" class="btn btn-success">Update
                                    Customer</button>
                            </div>
                        </div>
                    </form>
                    <?php }}?>
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include './includes/footer.php'; ?>