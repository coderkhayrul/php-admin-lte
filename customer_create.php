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
                        <li class="breadcrumb-item active">Create Customer</li>
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
                    <h3>Customer Create</h3>
                    <a href="customer.php" class="btn btn-primary btn-sm ml-auto">All Customer</a>
                </div>
                <div class="card-body">
                    <?php
                        if (isset($_POST['saveCustomer'])) {

                            $customer_branch = $_POST['customer_branch'];
                            $customer_name = $_POST['customer_name'];
                            $customer_phone = $_POST['customer_phone'];
                            $customer_address = $_POST['customer_address'];

                            if (empty($customer_branch) || empty($customer_name) || empty($customer_phone) || empty($customer_address)) {
                                $_SESSION['error_message'] = "Please Fill all required fields!";
                            }else {
                                customer_insert($customer_branch, $customer_name, $customer_phone, $customer_address);
                            }
                        }
                    ?>
                    <form method="post">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customer_branch" class="control-label">Branch Name</label>
                                    <select class="form-control" name="customer_branch" id="">
                                        <option value="0">Select Branch</option>
                                        <?php
                                            $branch = all_branch();
                                            while ($data = $branch->fetch_assoc()){?>
                                        <option value="<?php echo $data['branch_id'] ?>"><?php echo $data['branch_name'] ?></option>
                                            <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customer_name" class="control-label">Name</label>
                                    <input type="text" class="form-control" name="customer_name" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customer_phone" class="control-label">Phone</label>
                                    <input type="text" class="form-control" name="customer_phone" placeholder="Enter Phone">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="customer_address" class="control-label">Address</label>
                                    <textarea class="form-control" name="customer_address" id="" placeholder="Enter Address"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button name="saveCustomer" type="submit" class="btn btn-success">Add Customer</button>
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