<?php
require_once 'inc/header.php';
$select = "SELECT * FROM messages WHERE trash_status = 1 ORDER BY id DESC";
$messages_query = mysqli_query($db_connection, $select);
?>

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Rojon</a>
        <a class="breadcrumb-item" href="messages-list.php">Contacts</a>
        <span class="breadcrumb-item active">Contact information</span>
    </nav>


    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Contacts list</h5>
            <p>Contact person information & message.</p>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <style type="text/css">
                .readmessage td {
                    background: white;
                    font-weight: 700;
                }
            </style>

            <div class="table-wrapper">
                <?php
                if (isset($_SESSION['message-delete'])) { ?>
                    <p class="text-danger">
                        <?php echo $_SESSION['message-delete']; ?>
                    </p>
                <?php }
                unset($_SESSION['message-delete']);  ?>

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
                            <th>Messages</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    foreach ($messages_query as $key => $messages_value) { ?>

                        <tr class="
                            <?php if ($messages_value['read_status'] == 2) : ?>
                            
                            readmessage
                            
                            <?php endif ?>">
                            <td><?= ++$key ?></td>
                            <td><?= $messages_value['name'] ?></td>
                            <td><?= $messages_value['email'] ?></td>
                            <td><?= $messages_value['messages'] ?></td>
                            <td>
                                <?php if ($messages_value['read_status'] == 1) : ?>
                                    <a href="messages-status.php?messages_id=<?= $messages_value['id'] ?>" class=" btn btn-success" width="70px">
                                        Read</a>
                                <?php else : ?>
                                    <a href="messages-status.php?messages_id=<?= $messages_value['id'] ?>" class=" btn btn-danger" width="70px">Unread</a>
                                <?php endif ?>
                            </td>
                            <td>
                                <a href="messages-delete.php?messages_id=<?= $messages_value['id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php }
                    ?>


                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->
    </div>
    <?php
    require_once 'inc/footer.php';
    ?>