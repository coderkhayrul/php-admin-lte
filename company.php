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
                        <li class="breadcrumb-item active">Company</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex bg-info">
                            <h4 class="text-uppercase">All Company</h4>
                            <a href="company_create.php" class="btn btn-sm btn-primary ml-auto"><i class="fas fa-plus"></i> Add Company</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Branch</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Mananger</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    // Delete Company
                                    if (isset($_GET["id"])) {
                                        $id=$_GET['id'];
                                        company_destroy($id);
                                    }

                                    
                                    $company = company();
                                    $sl=1;
                                    if ($company->num_rows>0) {
                                        while ($data = $company->fetch_assoc()){ ?>
                                            <tr>
                                                <td><?php echo $sl++ ?></td>
                                                <td>
                                                    <?php
                                                        $branch = all_branch();
                                                        while ($info = $branch->fetch_assoc()){
                                                            echo $data['company_branch'] == $info['branch_id'] ? $info['branch_name'] : '';
                                                        } 
                                                    ?>
                                                </td>
                                                <td><?php echo $data['company_name'] ?></td>
                                                <td><?php echo $data['company_phone'] ?></td>
                                                <td><?php echo $data['company_email'] ?></td>
                                                <td><?php echo $data['company_address'] ?></td>
                                                <td><?php echo $data['company_manager'] ?></td>
                                                <td style="width: 10%" class="text-center">
                                                    <a href="company_edit.php?id=<?php echo $data['company_id'] ?>" class="btn btn-sm btn-primary"><i class="far fa-edit"></i></a>
                                                    <button data-toggle="modal" data-target="#delete<?php echo $data["company_id"] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="delete<?php echo $data["company_id"] ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure want to Delete this Company?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <a href="company.php?id=<?php echo $data['company_id']?>" type="button" class="btn btn-danger"
                                                                name="delete">Confirm</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                    }else {?>
                                        <tr>
                                            <td colspan="8" class="text-center">
                                                <h3>Not Found</h3>
                                            </td>
                                        </te>
                                    <?php }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
<?php include './includes/footer.php'; ?>