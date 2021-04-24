<?php
require_once 'inc/header.php';
$select = "SELECT * FROM services WHERE trash_status = 1 ORDER BY name ASC";
$services_query = mysqli_query($db_connection, $select);
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
            <a href="services-add.php" style="margin-left: 15px;" class="mg-b-10 col-lg-12 text-right">
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
                                <th>details</th>
                                <th>icon</th>
                                <th>status</th>
                                <th>update</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        foreach ($services_query  as $key => $services_value) { ?>

                            <tr>
                                <!-- <td>
                                <label class="ckbox mg-b-0">
                                    <input type="checkbox"><span></span>
                                </label>
                            </td> -->
                                <td><?= ++$key ?></td>
                                <td><?= $services_value['name'] ?></td>
                                <td><?= $services_value['details'] ?></td>
                                <td>
                                    <img src="upload/<?= $services_value['icon'] ?>" class="wd-40" alt="icon">
                                </td>
                                <td>
                                    <?php if ($services_value['status'] == 1) : ?>
                                        <a href="services-status.php?id=<?= $services_value['id'] ?>" class=" btn btn-success">Activated</a>
                                    <?php else : ?>
                                        <a href="services-status.php?id=<?= $services_value['id'] ?>" class=" btn btn-danger">Deactivated</a>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <a href="services-edit.php?service-id=<?= $services_value['id'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                </td>
                                <td>
                                    <a href="services-delete.php?id=<?= $services_value['id'] ?>" onclick="return confirm('Are you sure?')" class="btn  btn-danger"><i class="fa fa-trash"></i> Delete</a>
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