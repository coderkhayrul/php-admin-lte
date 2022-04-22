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
                        <li class="breadcrumb-item active">Create Employee</li>
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
                    <h3>Employee Create</h3>
                    <a href="employee.php" class="btn btn-primary btn-sm ml-auto">All Employee</a>
                </div>
                <div class="card-body">
                    <?php
                    // Update Employee Data
                    if (isset($_POST['updateEmployee'])) {
                        $em_name = $_POST['em_name'];
                        $em_email = $_POST['em_email'];
                        $em_phone = $_POST['em_phone'];
                        $em_branch = $_POST['em_branch'];
                        $em_designation = $_POST['em_designation'];
                        $em_nid = $_POST['em_nid'];
                        $em_salary = $_POST['em_salary'];
                        $em_join_date = $_POST['em_join_date'];
                        $em_address = $_POST['em_address'];
                        
                        if (empty($em_name) || empty($em_email) || empty($em_phone) || empty($em_branch) || empty($em_designation) || empty($em_nid) || empty($em_join_date)) {
                            echo "<div class='alert alert-danger' role='alert'>Please Fill all required fields!</div>";
                        }else {
                            $em_id=$_GET["id"];
                            emp_update($em_name, $em_email, $em_phone, $em_branch, $em_designation, $em_nid, $em_salary, $em_join_date,$em_address, $em_id);
                        }
                    }

                    
                    // Get Employee Data
                    if (isset($_GET['id'])) {
                        $em_id = $_GET['id'];
                        $employee = emp_edit($em_id);
                        while ($data = $employee->fetch_assoc()) { ?>
                    <form method="post">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_name" class="control-label">Name</label>
                                    <input type="text" class="form-control" name="em_name" placeholder="Enter Name"
                                        value="<?php echo $data['em_name'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_email" class="control-label">Email</label>
                                    <input type="email" class="form-control" name="em_email" placeholder="Enter Email"
                                        value="<?php echo $data['em_email'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_phone" class="control-label">Phone</label>
                                    <input type="text" class="form-control" name="em_phone" placeholder="Enter Phone"
                                        value="<?php echo $data['em_phone'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_branch" class="control-label">Branch</label>
                                    <select class="form-control" name="em_branch">
                                        <option value="0" selected>Select Branch</option>
                                        <?php
                                            $branch = all_branch();
                                            while ($info = $branch->fetch_assoc()){?>
                                        <option value="<?php echo $info['branch_id'] ?>" <?php echo $info['branch_id'] == $data['em_branch'] ? 'selected' : '' ?> >
                                        <?php echo $info['branch_name'] ?></option>
                                            <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_designation" class="control-label">Designation</label>
                                    <input type="text" class="form-control" name="em_designation"
                                        placeholder="Enter Designation" value="<?php echo $data['em_designation'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_nid" class="control-label">NID (national id)</label>
                                    <input type="number" class="form-control" name="em_nid" placeholder="Enter NID"
                                        value="<?php echo $data['em_nid'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_join_date" class="control-label">JOIN DATE</label>
                                    <input type="date" class="form-control" name="em_join_date"
                                        placeholder="Enter Join Date" value="<?php echo $data['em_join_date'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_address" class="control-label">Address</label>
                                    <input type="text" class="form-control text-center" name="em_address"
                                        placeholder="Enter Address" value="<?php echo $data['em_address'] ?>">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="em_salary" class="control-label">Salary</label>
                                    <input type="number" class="form-control" name="em_salary"
                                        placeholder="Enter Salary" value="<?php echo $data['em_salary'] ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <button name="updateEmployee" type="submit" class="btn btn-success">Update
                                    Employee</button>
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