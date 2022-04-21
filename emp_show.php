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
                    <h1 class="m-0">Employee</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Show Employee</li>
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
                    <h3>Employee Show</h3>
                    <a href="employee.php" class="btn btn-primary btn-sm ml-auto">All Employee</a>
                </div>
                <div class="card-body">
                    <?php
                        if (isset($_GET['id'])) {
                            $em_id = $_GET['id'];
                            $employee = emp_show($em_id);
                            while ($data = $employee->fetch_assoc()) { ?>
                                <form method="post" >
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_name" class="control-label">Name</label>
                                    <input disabled type="text" class="form-control" name="em_name" placeholder="Enter Name" value="<?php echo $data['em_name'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_email" class="control-label">Email</label>
                                    <input disabled type="email" class="form-control" name="em_email" placeholder="Enter Email" value="<?php echo $data['em_email'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_phone" class="control-label">Phone</label>
                                    <input disabled type="text" class="form-control" name="em_phone" placeholder="Enter Phone" value="<?php echo $data['em_phone'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_branch" class="control-label">Branch</label>
                                    <select class="form-control" name="em_branch">
                                        <option value="0" selected>Select Branch</option>
                                        <option value="1">Dhanmondi</option>
                                        <option value="2">Mirpur</option>
                                        <option value="3">FirmGate</option>
                                        <option value="4">Uttra</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_designation" class="control-label">Designation</label>
                                    <input disabled type="text" class="form-control" name="em_designation" placeholder="Enter Designation" value="<?php echo $data['em_designation'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_nid" class="control-label">NID (national id)</label>
                                    <input disabled type="number" class="form-control" name="em_nid" placeholder="Enter NID" value="<?php echo $data['em_nid'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_salary" class="control-label">Salary</label>
                                    <input disabled type="number" class="form-control" name="em_salary" placeholder="Enter Salary" value="<?php echo $data['em_salary'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_join_date" class="control-label">JOIN DATE</label>
                                    <input disabled type="date" class="form-control" name="em_join_date" placeholder="Enter Join Date" value="<?php echo $data['em_join_date'] ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="em_address" class="control-label">Address</label>
                                    <input disabled type="text" class="form-control text-center" name="em_address" placeholder="Enter Address" value="<?php echo $data['em_address'] ?>">
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