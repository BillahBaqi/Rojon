<?php
require_once 'inc/header.php';
$brand_ids = $_GET['edit-id'];
$brand_check_ids = "SELECT * FROM brands WHERE id='$brand_ids'";
$brand_check_query = mysqli_query($db_connection, $brand_check_ids);
$brand_check_assoc = mysqli_fetch_assoc($brand_check_query);
$brands_select = "SELECT * FROM brands WHERE trash_status = 1 ORDER BY id ASC";
$brands_query = mysqli_query($db_connection, $brands_select);
?>

<!-- ########## START: MAIN PANEL ########## -->

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

        <div class="row row-sm mg-t-50">
            <div class="col-lg-8 mg-t-25 mg-lg-t-0">
                <div class="row">
                    <?php foreach ($brands_query as $key => $brands_value) : ?>
                        <div style="margin-bottom: 40px;" class="col-lg-4 col-md-6 pitem">
                            <img class="card-img-top" style="height: 50px; width: auto; " src="upload/<?= $brands_value['brand_image'] ?>" alt="Card image cap">
                            <div style="margin-top: 20px;">
                                <h5 class="card-title"><?= $brands_value['brand_name'] ?> </h5>
                                <a href="brand-edit.php?edit-id=<?= $brands_value['id'] ?>" name="edit-id" value="<?= $brands_value['id'] ?>" class="btn btn-warning">Edit</a>
                                <?php if ($brands_value['status'] == 1) : ?>
                                    <a href="services-status.php?id=<?= $brands_value['id'] ?>" class=" btn btn-light">Activated</a>
                                <?php else : ?>
                                    <a href="services-status.php?id=<?= $brands_value['id'] ?>" class=" btn btn-dark">Deactivated</a>
                                <?php endif ?>
                                <a href="#" class="btn btn-danger">delete</a>
                            </div>
                        </div>
                    <?php endforeach ?>


                </div>
            </div><!-- col-6 -->
            <div class="col-lg-4 mg-t-25 mg-lg-t-0">
                <form action="brands-update.php" method="POST" enctype="multipart/form-data">
                    <div class="card pd-20 pd-sm-30">
                        <h6 class="card-body-title">Edit Brands</h6>
                        <div class="form-group">
                            <label class="form-control-label">Brand Name: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="brand_name" value="<?= $brand_check_assoc['brand_name'] ?>" placeholder="Enter Brand Name">
                            <span class="text-danger">
                                <?php
                                if (isset($_SESSION['bnameempty'])) {
                                    echo $_SESSION['bnameempty'];
                                    unset($_SESSION['bnameempty']);
                                }
                                ?></span>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Brand Image: <span class="tx-danger">*</span><span> (png, svg)</span></label>
                            <div class="form-control">
                                <label class="custom-file">
                                    <input type="file" name="brand_image" class="custom-file-input" onchange="document.getElementById('brand_preview_id').src = window.URL.createObjectURL(this.files[0])">
                                    <span class="custom-file-control custom-file-control-primary"></span>
                                </label>
                            </div>
                            <span class="text-danger">
                                <?php
                                if (isset($_SESSION['brand_image'])) {
                                    echo $_SESSION['brand_image'];
                                    unset($_SESSION['brand_image']);
                                }
                                ?></span>
                            <span class="text-danger">
                                <?php
                                if (isset($_SESSION['img_size'])) {
                                    echo $_SESSION['img_size'];
                                    unset($_SESSION['img_size']);
                                }
                                ?></span>
                        </div>
                        <div class="form-group">
                            <img id="brand_preview_id" src="upload/<?= $brand_check_assoc['brand_image'] ?>" class="wd-150" alt="">
                        </div>

                        <div class="form-layout-footer text-left">
                            <button type="submit" name="brand-edit" value="<?= $brand_check_assoc['id'] ?>" name="brands" class="btn btn-info mg-r-5 ">Update</button>
                        </div>
                    </div><!-- card -->
                </form><!-- form -->
            </div><!-- col-6 -->
        </div>

    </div>
    <?php require_once 'inc/footer.php' ?>

    <!-- ########## END: MAIN PANEL ########## -->