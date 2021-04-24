<?php
require_once 'inc/header.php';
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

            <form action="testimonials-post.php" method="POST" enctype="multipart/form-data">
                <div>
                    <div class="row mg-b-25">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="name" value="" placeholder="Enter Name">
                                <span class="text-danger">
                                    <?php
                                    if (isset($_SESSION['name'])) {
                                        echo $_SESSION['name'];
                                        unset($_SESSION['name']);
                                    }
                                    ?></span>
                            </div>
                        </div><!-- col-12 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Designation: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="designation" name="designation" value="" placeholder="Enter Designation">
                                <span class="text-danger">
                                    <?php
                                    if (isset($_SESSION['designation'])) {
                                        echo $_SESSION['designation'];
                                        unset($_SESSION['designation']);
                                    }
                                    ?></span>
                            </div>
                        </div><!-- col-12 -->


                        <div class="col-lg-12 ">
                            <div class="form-group">
                                <label class="form-control-label">Quotes: <span class="tx-danger">*</span></label>
                                <textarea class="form-control" id="editable" aria-label="With textarea" type="text" name="quote" value="" placeholder="">Enter Quotes...</textarea>
                                <span class="text-danger">
                                    <?php
                                    if (isset($_SESSION['quote'])) {
                                        echo $_SESSION['quote'];
                                        unset($_SESSION['quote']);
                                    }
                                    ?></span>
                            </div>
                        </div>


                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label">Image: <span class="tx-danger">*</span><span> (300px*300px)</span></label>
                                <input class="form-control" type="file" name="image" onchange="document.getElementById('service_icon_preview_id').src = window.URL.createObjectURL(this.files[0])">
                                <span class="text-danger">
                                    <?php
                                    if (isset($_SESSION['img_size'])) {
                                        echo $_SESSION['img_size'];
                                        unset($_SESSION['img_size']);
                                    }
                                    ?></span>
                                <span class="text-danger">
                                    <?php
                                    if (isset($_SESSION['services-icon'])) {
                                        echo $_SESSION['services-icon'];
                                        unset($_SESSION['services-icon']);
                                    }
                                    ?></span>
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-1">
                            <div class="form-group">
                                <label class="form-control-label"></label>
                                <img id="service_icon_preview_id" src="" class="wd-55" alt="">
                            </div>
                        </div><!-- col-6 -->
                    </div><!-- row -->

                    <div class="form-layout-footer text-center">
                        <button type="submit" class="btn btn-info mg-r-5 ">Submit Services</button>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
            </form>
        </div>

    </div><!-- sl-page-title -->

    <script>
        var editor = new MediumEditor('.editable');
    </script>
    <?php require_once 'inc/footer.php' ?>

    <!-- ########## END: MAIN PANEL ########## -->