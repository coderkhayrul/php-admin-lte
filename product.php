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
                    <h1 class="m-0">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
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
                            <h4 class="text-uppercase">All Product</h4>
                            <a href="product_create.php" class="btn btn-sm btn-primary ml-auto"><i class="fas fa-plus"></i> Add Product</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                                if ($_SESSION['message']) {
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }
                            ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Branch</th>
                                        <th>Name</th>
                                        <th>Barcode</th>
                                        <th>Cost Price</th>
                                        <th>Sell Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    // Delete Employee
                                    if (isset($_GET["id"])) {
                                        $id=$_GET['id'];
                                        emp_destroy($id);
                                    }


                                    $product = product();
                                    $sl=1;
                                    if ($product->num_rows>0) {
                                        while ($data = $product->fetch_assoc()){ ?>
                                            <tr>
                                                <td><?php echo $sl++ ?></td>
                                                <td>
                                                <?php
                                                    $branch = all_branch();
                                                    while ($info = $branch->fetch_assoc()){
                                                        echo $data['product_branch'] == $info['branch_id'] ? $info['branch_name'] : '';
                                                    } 
                                                ?>
                                                </td>
                                                <td><?php echo $data['product_name'] ?></td>
                                                <td><?php echo $data['product_barcode'] ?></td>
                                                <td><?php echo $data['product_cost'] ?> ৳</td>
                                                <td><?php echo $data['product_sell'] ?> ৳</td>
                                                <td class="text-center">
                                                    <?php 
                                                    if ($data['product_status' ] == 1) { ?>
                                                        <span class="badge badge-success">Active</span>
                                                    <?php }else { ?>
                                                        <span class="badge badge-danger">Inactive</span>
                                                    <?php }  
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="product_show.php?id=<?php echo $data['product_id'] ?>" class="btn btn-sm btn-success"><i class="far fa-eye"></i></a>
                                                    <a href="product_edit.php?id=<?php echo $data['product_id'] ?>" class="btn btn-sm btn-primary"><i class="far fa-edit"></i></a>
                                                    <button data-toggle="modal" data-target="#delete<?php echo $data["product_id"] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="delete<?php echo $data["product_id"] ?>" tabindex="-1"
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
                                                            Are you sure want to Delete this Employee?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <a href="product.php?id=<?php echo $data['product_id']?>" type="button" class="btn btn-danger"
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