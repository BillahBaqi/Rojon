<?php
require_once 'inc/header.php';
$edit_page_ids = $_SESSION['id'];
$edit_page_check_ids = "SELECT * FROM users WHERE id='$users_ids'";
$edit_page_check_query = mysqli_query($db_connection, $edit_page_check_ids);
$edit_page_check_assoc = mysqli_fetch_assoc($edit_page_check_query);
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
        <form action="update-password.php" method="POST">
            <div class="row row-sm mg-t-20">
                <div class="col-xl-12">
                    <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                        <h6 class="text-center card-body-title">Left Label Alignment</h6>
                        <p class="text-center mg-b-20 mg-sm-b-30">A basic form where labels are aligned in left.</p>


                        <div class="row justify-content-center">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-left">Old Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input class="form-control" type="password" name="old_password">
                                        <div class="input-group-addon">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <span class="text-danger">
                                        <?php
                                        if (isset($_SESSION['old-password'])) {
                                            echo $_SESSION['old-password'];
                                            unset($_SESSION['old-password']);
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-left">New Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input class="form-control" type="password" name="new_password">
                                        <div class="input-group-addon">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <span class="text-danger">
                                        <?php
                                        if (isset($_SESSION['old-new-password'])) {
                                            echo $_SESSION['old-new-password'];
                                            unset($_SESSION['old-new-password']);
                                        }
                                        ?>
                                    </span>
                                    <span class="text-danger">
                                        <?php
                                        if (isset($_SESSION['password'])) {
                                            echo $_SESSION['password'];
                                            unset($_SESSION['password']);
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-left">Confirm Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input class="form-control" type="password" name="confirm_password">
                                        <div class="input-group-addon">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center form-layout-footer mg-t-30">
                            <button class="btn btn-info mg-r-5">Update Password</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- card -->
                </div>
            </div><!-- col-6 -->
        </form>
    </div>


    <?php include 'inc/footer.php'; ?>