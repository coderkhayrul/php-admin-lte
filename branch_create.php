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
                    <h1 class="m-0">Branch</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Create Branch</li>
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
                    <h3>Branch Create</h3>
                    <a href="branch.php" class="btn btn-primary btn-sm ml-auto">All Branch</a>
                </div>
                <div class="card-body">
                    <?php
                        if (isset($_POST['saveBranch'])) {

                            $branch_name = $_POST['branch_name'];
                            $branch_email = $_POST['branch_email'];
                            $branch_phone = $_POST['branch_phone'];
                            $branch_manager = $_POST['branch_manager'];
                            $branch_location = $_POST['branch_location'];
                            if (empty($branch_name) || empty($branch_email) || empty($branch_phone) || empty($branch_manager) || empty($branch_location)) {
                                $_SESSION['error_message'] = "Please Fill all required fields!";
                            }else {
                                branch_insert($branch_name, $branch_email, $branch_phone, $branch_manager, $branch_location);
                            }
                        }
                    ?>
                    <form method="post">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="branch_name" class="control-label">Name</label>
                                    <input type="text" class="form-control" name="branch_name" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="branch_email" class="control-label">Email</label>
                                    <input type="email" class="form-control" name="branch_email" placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="branch_phone" class="control-label">Phone</label>
                                    <input type="text" class="form-control" name="branch_phone" placeholder="Enter Phone">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="branch_manager" class="control-label">Manager</label>
                                    <input type="text" class="form-control" name="branch_manager" placeholder="Enter Maanger Name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="branch_location" class="control-label">Location</label>
                                    <input type="text" class="form-control" name="branch_location" placeholder="Enter Location">
                                </div>
                            </div>
                            <div class="col-12">
                                <button name="saveBranch" type="submit" class="btn btn-success">Add Branch</button>
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