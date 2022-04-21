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
                        include "./database/function.php";
                        if (isset($_POST['saveEmployee'])) {

                            $em_name = $_POST['em_name'];
                            $em_email = $_POST['em_email'];
                            $em_phone = $_POST['em_phone'];
                            $em_branch = $_POST['em_branch'];
                            $em_designation = $_POST['em_designation'];
                            $em_nid = $_POST['em_nid'];
                            $em_salary = $_POST['em_salary'];
                            $em_join_date = $_POST['em_join_date'];
                            $em_address = $_POST['em_address'];
                            $em_password = $_POST['em_password'];
                            $em_password = md5($em_password);
                            if (empty($em_name) || empty($em_email) || empty($em_phone) || empty($em_branch) || empty($em_designation) || empty($em_nid) || empty($em_join_date) || empty($em_password)) {
                                echo "<div class='alert alert-danger' role='alert'>Please Fill all required fields!</div>";
                            }else {
                                emp_insert($em_name, $em_email, $em_phone, $em_branch, $em_designation, $em_nid, $em_salary, $em_join_date,$em_address , $em_password);
                            }
                        }
                        if ($_SESSION['message']) {
                            session_start();
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                    ?>
                    <form method="post" >
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_name" class="control-label">Name</label>
                                    <input type="text" class="form-control" name="em_name" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_email" class="control-label">Email</label>
                                    <input type="email" class="form-control" name="em_email" placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_phone" class="control-label">Phone</label>
                                    <input type="text" class="form-control" name="em_phone" placeholder="Enter Phone">
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
                                    <input type="text" class="form-control" name="em_designation" placeholder="Enter Designation">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_nid" class="control-label">NID (national id)</label>
                                    <input type="number" class="form-control" name="em_nid" placeholder="Enter NID">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_salary" class="control-label">Salary</label>
                                    <input type="number" class="form-control" name="em_salary" placeholder="Enter Salary">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_join_date" class="control-label">JOIN DATE</label>
                                    <input type="date" class="form-control" name="em_join_date" placeholder="Enter Join Date">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_address" class="control-label">Address</label>
                                    <input type="text" class="form-control" name="em_address" placeholder="Enter Address">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="em_password" class="control-label">Password</label>
                                    <input type="password" class="form-control" name="em_password" placeholder="Enter Password">
                                </div>
                            </div>
                            <div class="col-12">
                                <button name="saveEmployee" type="submit" class="btn btn-success">Add Employee</button>
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