<?php
require_once 'inc/header.php';
$categories_ids = $_GET['edit-id'];
$categories_check = "SELECT * FROM categories WHERE id = $categories_ids";
$categories_check_query = mysqli_query($db_connection, $categories_check);
$categories_assoc = mysqli_fetch_assoc($categories_check_query);
$categories_select = "SELECT * FROM categories WHERE trash_status = 1 ORDER BY name ASC";
$categories_query = mysqli_query($db_connection, $categories_select);

?>


<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Rojon</a>
        <a class="breadcrumb-item" href="portfolio.php">Portfolios</a>
        <span class="breadcrumb-item active">Portfolio-list</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Portfolio Information</h5>
            <p>Portfolio List & Action.</p>
        </div>
        <!-- <span class="text-success">
            <?php
            if (isset($_SESSION['brands_update'])) {
                echo $_SESSION['brands_update'];
                unset($_SESSION['brands_update']);
            }
            ?></span> -->

        <div class="row">

            <div class="col-lg-7 mg-t-25 mg-lg-t-0">
                <div class="card pd-20 pd-sm-30">
                    <h6 class="card-body-title">Add Brands</h6>
                    <div class="table-responsive">
                        <form action="services-update.php" method="POST" enctype="multipart/form-data">
                            <table class="table mg-b-8">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                foreach ($categories_query  as $key => $categories_value) { ?>

                                    <tr>
                                        <td><?= ++$key ?></td>
                                        <td><?= $categories_value['name'] ?></td>
                                        <td>
                                            <a href="categories-edit.php?edit-id=<?= $categories_value['id'] ?>" value="<?= $categories_value['id'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="services-delete.php?id=<?= $categories_value['id'] ?>" onclick="return confirm('Are you sure?')" class="btn  btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>

                                <?php }
                                ?>


                            </table>
                        </form>

                    </div>
                </div><!-- card -->
            </div><!-- col-6 -->
            <div class="col-lg-5 mg-t-25 mg-lg-t-0">
                <form action="category-update.php" method="POST" enctype="multipart/form-data">
                    <div class="card pd-20 pd-sm-30">
                        <h6 class="card-body-title">Add categories</h6>
                        <div class="form-group">
                            <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="name" value="<?= $categories_assoc['name'] ?>" placeholder="Enter Category Name">
                            <span class="text-danger">
                                <?php
                                if (isset($_SESSION['cnameempty'])) {
                                    echo $_SESSION['cnameempty'];
                                    unset($_SESSION['cnameempty']);
                                }
                                ?></span>


                        </div>
                        <div class="form-layout-footer text-left">
                            <button type="submit" name="category-edit" value="<?= $categories_assoc['id'] ?>" class="btn btn-info mg-r-5 ">Update Category</button>
                        </div>
                    </div><!-- card -->
                </form><!-- form -->
            </div><!-- col-6 -->
        </div>

    </div>

    <?php include 'inc/footer.php'; ?>