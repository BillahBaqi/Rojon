<?php
require_once 'inc/header.php';

$portfolio_select = "SELECT * FROM portfolio WHERE trash_status = 1 ORDER BY id ASC";
$portfolio_query = mysqli_query($db_connection, $portfolio_select);

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

        <div class="card pd-20 pd-sm-30">
            <span class="text-success">
                <?php
                if (isset($_SESSION['update-success'])) {
                    echo $_SESSION['update-success'];
                    unset($_SESSION['update-success']);
                }
                ?></span>
            <a href="portfolio-add.php" style="margin-left: -15px;" class="mg-b-10 col-lg-2 text-left">
                <button type="button" class="btn btn-primary"><i class="fa fa-plus">Add Services</i></button>
            </a>
            <div class="table-responsive">
                <table id="datatable1" class="table responsive mg-b-8">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>category</th>
                            <th>project</th>
                            <th>title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select_portfolio = "SELECT * FROM portfolio INNER JOIN categories on portfolio.category_id = categories.id  WHERE portfolio.trash_status = 1 ORDER BY portfolio.p_id ASC";
                        $select_portfolio_query = mysqli_query($db_connection, $select_portfolio);
                        ?>
                        <?php foreach ($select_portfolio_query as $key => $portfolio_value) : ?>

                            <tr>
                                <td><?= ++$key ?></td>
                                <td>
                                    <?= $portfolio_value['name'] ?>
                                </td>
                                <td><?= $portfolio_value['project'] ?></td>
                                <td><?= $portfolio_value['title'] ?></td>
                                <td>
                                    <a href="portfolio-edit.php?edit-id=<?= $portfolio_value['p_id'] ?>" class="btn btn-warning"><i class="fa fa-edit" name="portfolio-id" value="<?= $portfolio_value['id'] ?>"></i> Edit</a>

                                    <a href="portfolio-delete.php?id=<?= $portfolio_value['p_id'] ?>" onclick="return confirm('Are you sure?')" class="btn  btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <?php include 'inc/footer.php'; ?>