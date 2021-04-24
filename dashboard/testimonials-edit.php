<?php
require_once 'inc/header.php';
$testimonial_ids = $_GET['testimonial-id'];
$testimonial_check_ids = "SELECT * FROM testimonials WHERE id='$testimonial_ids'";
$testimonial_check_query = mysqli_query($db_connection, $testimonial_check_ids);
$testimonial_check_assoc = mysqli_fetch_assoc($testimonial_check_query);
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Rojon</a>
        <a class="breadcrumb-item" href="services-edit.php">Services</a>
        <span class="breadcrumb-item active">Update Services</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">

        </div>

        <div class="card pd-20 pd-sm-40">

            <form action="testimonials-update.php" method="POST" enctype="multipart/form-data">
                <div>
                    <div class="row mg-b-25">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="name" value="<?= $testimonial_check_assoc['name'] ?>" placeholder="Enter Service Name">
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="designation" value="<?= $testimonial_check_assoc['designation'] ?>" placeholder="Enter Service Name">
                            </div>
                        </div><!-- col-6 -->


                        <div class="col-lg-12 ">
                            <div class="form-group">
                                <label class="form-control-label">Services Details: <span class="tx-danger">*</span></label>
                                <textarea class="form-control" id="editable" aria-label="With textarea" type="text" name="quote" value="" placeholder=""><?= $testimonial_check_assoc['quotes'] ?></textarea>
                            </div>
                        </div>



                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label">Service Icon: <span class="tx-danger">*</span><span> (300px*300px)</span></label>
                                <input class="form-control" type="file" name="image" onchange="document.getElementById('service_icon_preview_id').src = window.URL.createObjectURL(this.files[0])">
                                <span class="text-danger">
                                    <?php
                                    if (isset($_SESSION['img_size'])) {
                                        echo $_SESSION['img_size'];
                                        unset($_SESSION['img_size']);
                                    }
                                    ?></span>
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-1">
                            <div class="form-group">
                                <label class="form-control-label"></label>
                                <img id="service_icon_preview_id" src="upload/<?= $testimonial_check_assoc['image'] ?>" class="wd-55" alt="">
                            </div>
                        </div><!-- col-6 -->
                    </div><!-- row -->

                    <div class="form-layout-footer text-center">
                        <button type="submit" name="testimonial_edit" class="btn btn-info pd-x-20" value="<?= $testimonial_check_assoc['id'] ?>" class="btn btn-info mg-r-5 ">Update Testimonial</button>
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