<?php
require_once 'inc/header.php';

$brands_select = "SELECT * FROM brands WHERE trash_status = 1 ORDER BY id ASC";
$brands_query = mysqli_query($db_connection, $brands_select);
$information_select = "SELECT * FROM information";
$information_query = mysqli_query($db_connection, $information_select);
$information_assoc = mysqli_fetch_assoc($information_query);

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

        <div class="row row-sm mg-t-20">
            <div class="col-xl-12">
                <form action="information-update.php" method="POST">
                    <div class="card pd-20 pd-sm-40 form-layout form-layout-4">

                        <div class="row">
                            <label class="col-sm-2 form-control-label">Office Address: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <input type="text" name="address" class="form-control" value="<?= $information_assoc['address'] ?>" placeholder="">
                            </div>
                        </div><!-- row -->
                        <div class="row mg-t-20">
                            <label class="col-sm-2 form-control-label">City: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <input type="text" name="city" class="form-control" value="<?= $information_assoc['city'] ?>" placeholder="">
                            </div>
                        </div>

                        <div class="row mg-t-20">
                            <label class="col-sm-2 form-control-label">Phone Number: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <input type="text" name="phone" class="form-control" value="<?= $information_assoc['phone'] ?>" placeholder="">
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <label class="col-sm-2 form-control-label">Email: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <input type="email" name="email" class="form-control" value="<?= $information_assoc['email'] ?>" placeholder="">
                            </div>
                        </div>


                        <div class="form-layout-footer mg-t-30">
                            <button type="submit" name="info-update" class="btn btn-info mg-r-5">Update Information</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- card -->
                </form>
            </div><!-- col-6 -->
        </div>

    </div>

    <?php include 'inc/footer.php'; ?>