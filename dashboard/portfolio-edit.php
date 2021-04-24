<?php
require_once 'inc/header.php';
$portfolio_ids = $_GET['edit-id'];
$select_portfolio = "SELECT * FROM portfolio INNER JOIN categories on portfolio.category_id = categories.id  WHERE portfolio.p_id = '$portfolio_ids' ORDER BY categories.name ASC";
$select_portfolio_query = mysqli_query($db_connection, $select_portfolio);
$portfolio_check_assoc = mysqli_fetch_assoc($select_portfolio_query);

$categories_select = "SELECT * FROM categories WHERE trash_status = 1 ORDER BY name ASC";
$categories_query = mysqli_query($db_connection, $categories_select);


// $portfolio_check_ids = "SELECT * FROM portfolio WHERE id='$portfolio_ids'";
// $portfolio_check_query = mysqli_query($db_connection, $portfolio_check_ids);
// $portfolio_check_assoc = mysqli_fetch_assoc($portfolio_check_query);
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Rojon</a>
        <a class="breadcrumb-item" href="services-add.php">Services</a>
        <span class="breadcrumb-item active">Add Services</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">

        </div>

        <div class="card pd-20 pd-sm-40">

            <form action="portfolio-update.php" method="POST" enctype="multipart/form-data">
                <div>
                    <div class="row mg-b-25">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Project: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="p_name" value="<?= $portfolio_check_assoc['project']; ?>" placeholder="Enter project Name">
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                <select class="form-control" value="" name="p_category">
                                    <option value="<?= $portfolio_check_assoc['category_id']; ?>"><?= $portfolio_check_assoc['name']; ?></option>

                                    <?php foreach ($categories_query as $key => $categories_value) : ?>
                                        <option value="<?= $categories_value['id'] ?>">
                                            <?= $categories_value['name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- 
                                <input class="form-control" type="text" name="p_category" value="<?= $portfolio_check_assoc['name']; ?>" placeholder="Enter category"> -->
                            </div>
                        </div><!-- col-6 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Project Title: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="p_title" value="<?= $portfolio_check_assoc['title']; ?>" placeholder="Enter project title">
                            </div>
                        </div><!-- col-12 -->


                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Services Details: <span class="tx-danger">*</span></label>
                                <textarea class="form-control" id="summernote" aria-label="With textarea" rows="5" cols="80" name="p_details"><?= $portfolio_check_assoc['description']; ?></textarea>



                            </div>
                        </div>


                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label">Service Icon: <span class="tx-danger">*</span><span> (300px*300px)</span></label>
                                <input class="form-control" type="file" name="p_thumbnail" onchange="document.getElementById('service_thumb_preview_id').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="form-control-label"></label>
                                <img id="service_thumb_preview_id" src="upload/<?= $portfolio_check_assoc['thumbnail']; ?>" class="wd-55" alt="">
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Service Icon: <span class="tx-danger">*</span><span> (300px*300px)</span></label>
                                <input class="form-control" type="file" name="p_feature" onchange="document.getElementById('service_feature_preview_id').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="form-control-label"></label>
                                <img id="service_feature_preview_id" src="upload/<?= $portfolio_check_assoc['featured']; ?>" style="width: 150px; height:auto; margin:-10px;" alt="">
                            </div>
                        </div><!-- col-6 -->


                        <div class="col-lg-12">
                            <span class="text-danger">
                                <?php
                                if (isset($_SESSION['image-size'])) {
                                    echo $_SESSION['image-size'];
                                    unset($_SESSION['image-size']);
                                }
                                ?></span>
                            <span class="text-danger">
                                <?php
                                if (isset($_SESSION['image-field'])) {
                                    echo $_SESSION['image-field'];
                                    unset($_SESSION['image-field']);
                                }
                                ?></span>
                        </div><!-- col-12 -->
                    </div><!-- row -->

                    <div class="form-layout-footer text-center">
                        <button type="submit" name="portfolio_edit" class="btn btn-info pd-x-20" value="<?= $portfolio_check_assoc['p_id'] ?>" class=" btn btn-info mg-r-5 ">Submit Portfolio</button>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
            </form>
        </div>

    </div><!-- sl-page-title -->



    <?php require_once 'inc/footer.php' ?>

    <!-- ########## END: MAIN PANEL ########## -->