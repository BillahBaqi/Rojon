<?php
require_once 'inc/header.php';
$categories_select = "SELECT * FROM categories WHERE trash_status = 1 ORDER BY name ASC";
$categories_query = mysqli_query($db_connection, $categories_select);

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

            <form action="portfolio-post.php" method="POST" enctype="multipart/form-data">
                <div>
                    <div class="row mg-b-25">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Project: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="p_name" value="" placeholder="Enter project Name">
                                <span class="text-danger">
                                    <?php
                                    if (isset($_SESSION['pnameempty'])) {
                                        echo $_SESSION['pnameempty'];
                                        unset($_SESSION['pnameempty']);
                                    }
                                    ?></span>
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                <select class="form-control" name="p_category">
                                    <option value>Select Category</option>
                                    <?php foreach ($categories_query as $key => $categories_value) : ?>
                                        <option value="<?= $categories_value['id']?>">
                                            <?= $categories_value['name'] ?></option>
                                    <?php endforeach ?>
                                </select>

                                <span class="text-danger">
                                    <?php
                                    if (isset($_SESSION['pcategoryempty'])) {
                                        echo $_SESSION['pcategoryempty'];
                                        unset($_SESSION['pcategoryempty']);
                                    }
                                    ?></span>
                            </div>
                        </div><!-- col-6 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Project Title: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="p_title" value="" placeholder="Enter project title">
                                <span class="text-danger">
                                    <?php
                                    if (isset($_SESSION['ptitleempty'])) {
                                        echo $_SESSION['ptitleempty'];
                                        unset($_SESSION['ptitleempty']);
                                    }
                                    ?></span>
                            </div>
                        </div><!-- col-12 -->


                        <div class="col-lg-12 ">
                            <div class="form-group">
                                <label class="form-control-label">Project Details: <span class="tx-danger">*</span></label>
                                <textarea class="form-control" aria-label="With textarea" id="summernote" name="p_details" value="" placeholder="">Enter portfolio details...</textarea>
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
                                <img id="service_thumb_preview_id" src="" class="wd-55" alt="">
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
                                <img id="service_feature_preview_id" src="" style="width: 150px; height:auto; margin:-10px;" alt="">
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
                        <button type="submit" name="portfolio" class="btn btn-info mg-r-5 ">Submit Portfolio</button>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
            </form>
        </div>

    </div><!-- sl-page-title -->


    <?php require_once 'inc/footer.php' ?>

    <!-- ########## END: MAIN PANEL ########## -->