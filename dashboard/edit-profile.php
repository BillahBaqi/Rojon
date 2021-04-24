<?php require_once 'inc/header.php';
$edit_page_ids = $_SESSION['id'];
$edit_page_check_ids = "SELECT * FROM users WHERE id='$users_ids'";
$edit_page_check_query = mysqli_query($db_connection, $edit_page_check_ids);
$edit_page_check_assoc = mysqli_fetch_assoc($edit_page_check_query);
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Rojon</a>
        <a class="breadcrumb-item" href="edit-profile.php">Edit profile</a>
        <span class="breadcrumb-item active">Profile Update</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Profile Update</h5>
            <p>Update Your Profile Information.</p>
            <div class="text-center">
                <?php if (isset($_SESSION['update-success'])) { ?>
                    <p class="alert alert-primary">
                        <?php echo $_SESSION['update-success']; ?>
                    </p>
                <?php }
                unset($_SESSION['update-success']) ?>
            </div>
        </div>

        <div class="card pd-20 pd-sm-40">

            <form action="update-profile.php" method="POST" enctype="multipart/form-data">
                <div>
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="up_name" value="<?= $edit_page_check_assoc['name'] ?>" placeholder="Enter Name">
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Email address: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="email" name="up_email" value="<?= $edit_page_check_assoc['email'] ?>" placeholder="Enter Email">
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="up_phone" value="<?= $edit_page_check_assoc['phone'] ?>" placeholder="Enter Phone No.">
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-1">
                            <div class="form-group">
                                <label class="form-control-label">Preview: </label>
                                <img id="image_preview_id" src="upload/<?= $edit_page_check_assoc['image'] ?>" class="wd-40" alt="Image">

                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label">Profile Picture: <span class="tx-danger">*</span><span> (300px*300px)</span></label>
                                <input class="form-control" type="file" name="up_image" onchange="document.getElementById('image_preview_id').src = window.URL.createObjectURL(this.files[0])">
                                <span class="text-danger">
                                    <?php
                                    if (isset($_SESSION['img_size'])) {
                                        echo $_SESSION['img_size'];
                                        unset($_SESSION['img_size']);
                                    }
                                    ?></span>
                            </div>
                        </div><!-- col-6 -->
                    </div><!-- row -->

                    <div class="form-layout-footer text-center">
                        <button class="btn btn-info mg-r-5 ">Update Profile</button>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
            </form>
        </div>

    </div><!-- sl-page-title -->


    <?php require_once 'inc/footer.php' ?>

    <!-- ########## END: MAIN PANEL ########## -->