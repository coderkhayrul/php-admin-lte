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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Branch</li>
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
                            <h4 class="text-uppercase">All Branch</h4>
                            <a href="branch_create.php" class="btn btn-sm btn-primary ml-auto"><i class="fas fa-plus"></i> Add Branch</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Manager</th>
                                        <th>Locaton</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    // Delete Branch
                                    if (isset($_GET["id"])) {
                                        $id=$_GET['id'];
                                        branch_destroy($id);
                                    }


                                    $branch = branch();
                                    $sl=1;
                                    if ($branch->num_rows>0) {
                                        while ($data = $branch->fetch_assoc()){ ?>
                                            <tr>
                                                <td><?php echo $sl++ ?></td>
                                                <td><?php echo $data['branch_name'] ?></td>
                                                <td><?php echo $data['branch_phone'] ?></td>
                                                <td><?php echo $data['branch_email'] ?></td>
                                                <td><?php echo $data['branch_manager'] ?></td>
                                                <td><?php echo $data['branch_location'] ?></td>
                                                <td class="text-center">
                                                    <a href="branch_edit.php?id=<?php echo $data['branch_id'] ?>" class="btn btn-sm btn-primary"><i class="far fa-edit"></i></a>
                                                    <button data-toggle="modal" data-target="#delete<?php echo $data["branch_id"] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="delete<?php echo $data["branch_id"] ?>" tabindex="-1"
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
                                                            Are you sure want to delte this Branch?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <a href="branch.php?id=<?php echo $data['branch_id']?>" type="button" class="btn btn-danger"
                                                                name="delete">Confirm</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                    }
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