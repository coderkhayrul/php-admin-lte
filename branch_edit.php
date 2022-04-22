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
                        <li class="breadcrumb-item active">Edit Branch</li>
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
                    <h3>Branch Edit</h3>
                    <a href="branch.php" class="btn btn-primary btn-sm ml-auto">All Branch</a>
                </div>
                <div class="card-body">
                    <?php
                    // Update Branch Data
                    if (isset($_POST['updateBranch'])) {
                        $branch_name = $_POST['branch_name'];
                        $branch_email = $_POST['branch_email'];
                        $branch_phone = $_POST['branch_phone'];
                        $branch_manager = $_POST['branch_manager'];
                        $branch_location = $_POST['branch_location'];
                        
                        if (empty($branch_name) || empty($branch_email) || empty($branch_phone) || empty($branch_manager) || empty($branch_location)) {
                            $_SESSION['error_message'] = "Please Fill all required fields!";
                        }else {
                            $branch_id=$_GET["id"];
                            branch_update($branch_name, $branch_email, $branch_phone, $branch_manager, $branch_location, $branch_id);
                        }
                    }

                    
                    // Get Branch Data
                    if (isset($_GET['id'])) {
                        $branch_id = $_GET['id'];
                        $branch = branch_edit($branch_id);
                        while ($data = $branch->fetch_assoc()) { ?>
                    <form method="post">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="branch_name" class="control-label">Name</label>
                                    <input type="text" class="form-control" name="branch_name" placeholder="Enter Name"
                                        value="<?php echo $data['branch_name'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="branch_email" class="control-label">Email</label>
                                    <input type="email" class="form-control" name="branch_email" placeholder="Enter Email"
                                        value="<?php echo $data['branch_email'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="branch_phone" class="control-label">Phone</label>
                                    <input type="text" class="form-control" name="branch_phone" placeholder="Enter Phone"
                                        value="<?php echo $data['branch_phone'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="branch_manager" class="control-label">Manager</label>
                                    <input type="text" class="form-control" name="branch_manager" placeholder="Enter Manager Name"
                                        value="<?php echo $data['branch_manager'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="branch_location" class="control-label">Location</label>
                                    <input type="text" class="form-control" name="branch_location"
                                        placeholder="Enter Location" value="<?php echo $data['branch_location'] ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <button name="updateBranch" type="submit" class="btn btn-success">Update
                                    Branch</button>
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