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
                    <h1 class="m-0">Company</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Create Company</li>
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
                    <h3>Company Create</h3>
                    <a href="company.php" class="btn btn-primary btn-sm ml-auto">All Company</a>
                </div>
                <div class="card-body">
                    <?php
                        if (isset($_POST['saveCompany'])) {

                            $company_branch = $_POST['company_branch'];
                            $company_name = $_POST['company_name'];
                            $company_email = $_POST['company_email'];
                            $company_phone = $_POST['company_phone'];
                            $company_manager = $_POST['company_manager'];
                            $company_address = $_POST['company_address'];

                            if (empty($company_name) || empty($company_email) || empty($company_phone) || empty($company_manager) || empty($company_address)) {
                                $_SESSION['error_message'] = "Please Fill all required fields!";
                            }else {
                                company_insert($company_branch, $company_name, $company_email, $company_phone, $company_manager, $company_address);
                            }
                        }
                    ?>
                    <form method="post">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="company_branch" class="control-label">Branch Name</label>
                                    <select class="form-control" name="company_branch">
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
                                    <label for="company_name" class="control-label">Name</label>
                                    <input type="text" class="form-control" name="company_name" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="company_email" class="control-label">Email</label>
                                    <input type="email" class="form-control" name="company_email" placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="company_phone" class="control-label">Phone</label>
                                    <input type="text" class="form-control" name="company_phone" placeholder="Enter Phone">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="company_manager" class="control-label">Manager</label>
                                    <input type="text" class="form-control" name="company_manager" placeholder="Enter Manager Name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="company_address" class="control-label">Address</label>
                                    <input type="text" class="form-control" name="company_address" placeholder="Enter Address">
                                </div>
                            </div>
                            <div class="col-12">
                                <button name="saveCompany" type="submit" class="btn btn-success">Add Company</button>
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