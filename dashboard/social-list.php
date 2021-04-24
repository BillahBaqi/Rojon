<?php
require_once 'inc/header.php';

$social_select = "SELECT * FROM socials ORDER BY name ASC";
$social_query = mysqli_query($db_connection, $social_select);

?>


<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Rojon</a>
        <a class="breadcrumb-item" href="social-list.php">socials</a>
        <span class="breadcrumb-item active">Social-list</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Social Information</h5>
            <p>Social List & Information's.</p>
        </div>

        <div class="card pd-20 pd-sm-30">

            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal1"><i class="fa fa-plus">Add More Social Information</i></button>
            <div class="table-responsive">
                <table class="table mg-b-8">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>icon</th>
                            <th>link</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php foreach ($social_query as $key => $social_value) : ?>

                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $social_value['name'] ?></td>
                            <td><i class="<?= str_replace('fab', 'fa', $social_value['icon']) ?>"></i></td>
                            <td><?= $social_value['link'] ?></td>
                            <td>
                                <?php if ($social_value['status'] == 1) : ?>
                                    <a href="social-status.php?id=<?= $social_value['id'] ?>" class=" btn btn-success">Activated</a>
                                <?php else : ?>
                                    <a href="social-status.php?id=<?= $social_value['id'] ?>" class=" btn btn-danger">Deactivated</a>
                                <?php endif ?>
                            </td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#modal2<?= $social_value['id'] ?>" class="btn  btn-primary"><i class="fa fa-edit"></i> edit</a>
                                <a href="social-delete.php?social_id=<?= $social_value['id']; ?>" onclick="return confirm('Are you sure?')" class="btn  btn-danger"><i class="fa fa-trash"></i> delete</a>
                            </td>
                        </tr>
                        <div id="modal2<?= $social_value['id'] ?>" class="modal fade">
                            <div class="modal-dialog modal-dialog-vertical-center" role="document">
                                <div class="modal-content bd-0 tx-14">
                                    <div class="modal-header pd-y-20 pd-x-25">
                                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Message Preview</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body pd-25">
                                        <form action="social-update.php" method="POST">
                                            <div>
                                                <div class="row mg-b-25">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Social name: <span class="tx-danger">*</span></label>
                                                            <input class="form-control" type="text" name="up_social_name" value="<?= $social_value['name'] ?>" placeholder="">
                                                        </div>
                                                    </div><!-- col-6 -->

                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Social Link: <span class="tx-danger">*</span></label>
                                                            <input class="form-control" type="text" name="up_social_link" value="<?= $social_value['link'] ?>" placeholder="">
                                                        </div>
                                                    </div><!-- col-12 -->

                                                </div><!-- row -->
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" name="social_edit" class="btn btn-info pd-x-20" value="<?= $social_value['id'] ?>">Save changes</button>
                                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- modal-dialog -->
                            </div><!-- modal -->
                        </div><!-- sl-pagebody -->

                    <?php endforeach ?>
                </table>
            </div>
        </div>
        <div id="modal1" class="modal fade">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <div class="modal-content bd-0 tx-14">
                    <div class="modal-header pd-y-20 pd-x-25">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Message Preview</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pd-25">
                        <form action="social-post.php" method="POST">
                            <div>
                                <div class="row mg-b-25">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="name" value="" placeholder="Ex: Facebook">
                                        </div>
                                    </div><!-- col-6 -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Socials: <span class="tx-danger">*</span></label>

                                            <select class="form-control" name="icon">
                                                <option value> Select One</option>
                                                <option value=" fab fa-twitter">Twitter</option>
                                                <option value="fab fa-linkedin-in">Linkedin</option>
                                                <option value="fab fa-youtube">Youtube</option>
                                            </select>

                                        </div>
                                    </div><!-- col-6 -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Social Link: <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="text" name="link" value="" placeholder="Ex: Facebook.com/xyz">
                                        </div>
                                    </div><!-- col-6 -->

                                </div><!-- row -->
                            </div>

                            <div class="modal-footer">
                                <button type="submit" name="social_add" class="btn btn-info pd-x-20">Save changes</button>
                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div><!-- modal-dialog -->
            </div><!-- modal -->
        </div><!-- sl-pagebody -->
    </div>

<?php include 'inc/footer.php'; ?>