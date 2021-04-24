<?php
require_once 'inc/header.php';

$educations_select = "SELECT * FROM educations WHERE trash_status = 1 ORDER BY passing_year DESC";
$educations_query = mysqli_query($db_connection, $educations_select);

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
        <span class="text-success">
            <?php
            if (isset($_SESSION['education'])) {
                echo $_SESSION['education'];
                unset($_SESSION['education']);
            }
            ?></span>

        <div class="row row-sm mg-t-20">
            <div class="col-lg-8">
                <div class="card pd-20 pd-sm-30">
                    <div class="table-responsive">
                        <form action="services-update.php" method="POST" enctype="multipart/form-data">
                            <table class="table mg-b-8">
                                <thead>
                                    <tr>
                                        <!-- <th>
                                <label class="ckbox mg-b-0">
                                    <input type="checkbox"><span></span>
                                </label>
                            </th> -->
                                        <th>SL</th>
                                        <th>Degree</th>
                                        <th>Subject</th>
                                        <th>Year</th>
                                        <th>Percentage</th>
                                        <th>update</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                foreach ($educations_query  as $key => $educations_value) { ?>

                                    <tr>
                                        <td><?= ++$key ?></td>
                                        <td><?= $educations_value['degree'] ?></td>
                                        <td><?= $educations_value['subject'] ?></td>
                                        <td><?= $educations_value['passing_year'] ?></td>
                                        <td><?= $educations_value['percentage'] ?><span>%</span></td>

                                        <td>
                                            <a href="education-edit.php?edit-id=<?= $educations_value['id'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                        </td>
                                        <td>
                                            <a href="education-delete.php?id=<?= $educations_value['id'] ?>" onclick="return confirm('Are you sure?')" class="btn  btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>

                                <?php }
                                ?>


                            </table>
                        </form>

                    </div>
                </div>
            </div><!-- col-6 -->
            <div class="col-lg-4">
                <form action="education-post.php" method="POST">
                    <div class="card pd-20 pd-sm-30">
                        <h6 class="card-body-title">Add Education</h6>
                        <div class="form-group">
                            <label class="form-control-label">Degree Name: <span class="tx-danger">* </span><span>(Bachelor, Diploma)</span></label>
                            <input class="form-control" type="text" name="degree" value="" placeholder="Enter Degree Name">
                            <span class="text-danger">
                                <?php
                                if (isset($_SESSION['degree'])) {
                                    echo $_SESSION['degree'];
                                    unset($_SESSION['degree']);
                                }
                                ?></span>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Subject: <span class="tx-danger">* </span><span>(Computer Engineering)</span></label>
                            <input class="form-control" type="text" name="subject" value="" placeholder="Enter Subject">
                            <span class="text-danger">
                                <?php
                                if (isset($_SESSION['subject'])) {
                                    echo $_SESSION['subject'];
                                    unset($_SESSION['subject']);
                                }
                                ?></span>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Passing Year: <span class="tx-danger">* </span><span>(1999)</span></span></label>
                            <select class="form-control" type="text" name="passing_year" value="" placeholder="Enter Subject">
                                <option value>Passing Year</option>
                                <?php
                                $currentYear = date('Y');
                                foreach ((range(1980, $currentYear)) as $key => $value) : ?>

                                    <option value="<?= $value ?>"><?= $value?></option>

                                <?php endforeach ?>
                            </select>
                            <span class="text-danger">
                                <?php
                                if (isset($_SESSION['passing_year'])) {
                                    echo $_SESSION['passing_year'];
                                    unset($_SESSION['passing_year']);
                                }
                                ?></span>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Percentage: <span class="tx-danger">* </span><span>(69)</span> </span></label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="percentage" value="" placeholder="Enter Percentage">
                                <div class="input-group-addon">
                                    <span> %</span>
                                </div>
                            </div>

                            <span class="text-danger">
                                <?php
                                if (isset($_SESSION['percentage'])) {
                                    echo $_SESSION['percentage'];
                                    unset($_SESSION['percentage']);
                                }
                                ?></span>
                        </div>

                        <div class="form-layout-footer text-left">
                            <button type="submit" class="btn btn-info mg-r-5 ">Submit</button>
                        </div>
                    </div><!-- card -->
                </form><!-- form -->
            </div><!-- col-6 -->
        </div>
    </div>




    <?php include 'inc/footer.php'; ?>