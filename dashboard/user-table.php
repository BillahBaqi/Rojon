<?php
require_once 'inc/header.php';

$select = "SELECT * FROM users WHERE status = 1 ORDER BY name ASC";
$users_query = mysqli_query($db_connection, $select);

?>


<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Rojon</a>
        <a class="breadcrumb-item" href="user-table.php">Users</a>
        <span class="breadcrumb-item active">User Table</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Users Table</h5>
            <p>User List & Information's.</p>
        </div>

        <div class="card pd-20 pd-sm-30">


            <div class="table-responsive">
                <?php
                if (isset($_SESSION['delete'])) { ?>
                    <p class="text-danger">
                        <?php echo $_SESSION['delete']; ?>
                    </p>
                <?php }
                unset($_SESSION['delete']);  ?>

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
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    foreach ($users_query as $key => $value) { ?>

                        <tr>
                            <!-- <td>
                                <label class="ckbox mg-b-0">
                                    <input type="checkbox"><span></span>
                                </label>
                            </td> -->
                            <td><?= ++$key ?></td>
                            <td><?= $value['name'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td><?= $value['phone'] ?></td>
                            <td>
                                <a href="user-delete.php?user_id=<?= $value['id']; ?>" onclick="return confirm('Are you sure?')" class="btn  btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php }
                    ?>


                </table>
            </div>
        </div>
    </div><!-- sl-pagebody -->

    <?php include 'inc/footer.php'; ?>