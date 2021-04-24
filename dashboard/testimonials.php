<?php
require_once 'inc/header.php';
$select = "SELECT * FROM testimonials WHERE trash_status = 1 ORDER BY name ASC";
$testimonial_query = mysqli_query($db_connection, $select);
?>



<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Rojon</a>
        <a class="breadcrumb-item" href="services.php">Users</a>
        <span class="breadcrumb-item active">Services And Solutions</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Services And Solutions</h5>
            <p>Brief description of Services.</p>
            <span class="text-success">
                <?php
                if (isset($_SESSION['services'])) {
                    echo $_SESSION['services'];
                    unset($_SESSION['services']);
                }
                ?></span>
        </div>

        <div class="card pd-20 pd-sm-30">
            <span class="text-success">
                <?php
                if (isset($_SESSION['update-success'])) {
                    echo $_SESSION['update-success'];
                    unset($_SESSION['update-success']);
                }
                ?></span>
            <a href="testimonials-add.php" style="margin-left: 15px;" class="mg-b-10 col-lg-12 text-right">
                <button type="button" class="btn btn-primary"><i class="fa fa-plus">Add Services</i></button>
            </a>

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
                                <th>Name</th>
                                <th>Designation</th>
                                <th>details</th>
                                <th>thumbnail</th>
                                <th>update</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        foreach ($testimonial_query  as $key => $testimonial_value) { ?>

                            <tr>
                                <!-- <td>
                                <label class="ckbox mg-b-0">
                                    <input type="checkbox"><span></span>
                                </label>
                            </td> -->
                                <td><?= ++$key ?></td>
                                <td><?= $testimonial_value['name'] ?></td>
                                <td><?= $testimonial_value['designation'] ?></td>
                                <td><?= $testimonial_value['quotes'] ?></td>
                                <td>
                                    <img src="upload/<?= $testimonial_value['image'] ?>" class="wd-40" alt="Thumb">
                                </td>

                                <td>
                                    <a href="testimonials-edit.php?testimonial-id=<?= $testimonial_value['id'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                </td>
                                <td>
                                    <a href="testimonials-delete.php?id=<?= $testimonial_value['id'] ?>" onclick="return confirm('Are you sure?')" class="btn  btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>

                        <?php }
                        ?>


                    </table>
                </form>

            </div>
        </div>
    </div><!-- sl-pagebody -->

    <?php
    require_once 'inc/footer.php';
    ?>