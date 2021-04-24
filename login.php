<?php
require_once 'include/header.php';
?>

<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">
    <form action="login-post.php" method="POST">
        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
            <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Rojon <span class="tx-info tx-normal">Admin</span></div>
            <div class="tx-center mg-b-60">Insert your email & password for login</div>
            <?php if (isset($_SESSION['reg-success'])) { ?>
                <p class="alert alert-success">
                    <?php echo $_SESSION['reg-success']; ?>
                </p>
            <?php }
            unset($_SESSION['reg-success']) ?>
            <?php if (isset($_SESSION['email_p'])) { ?>
                <p class="alert alert-warning">
                    <?php echo $_SESSION['email_p']; ?>
                </p>
            <?php }
            unset($_SESSION['email_p']) ?>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter your username" name="email">
                <span class="text-danger">
                    <?php
                    if (isset($_SESSION['email_nf'])) {
                        echo $_SESSION['email_nf'];
                        unset($_SESSION['email_nf']);
                    }
                    ?>
                </span>
            </div><!-- form-group -->
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Enter your password" name="password">
                <span class="text-danger">
                    <?php
                    if (isset($_SESSION['email_w'])) {
                        echo $_SESSION['email_w'];
                        unset($_SESSION['email_w']);
                    }
                    ?>
                </span>
                <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
            </div><!-- form-group -->
            <button type="submit" class="btn btn-info btn-block">Sign In</button>

            <div class="mg-t-60 tx-center">Not yet a member? <a href="register.php" class="tx-info">Sign Up</a></div>
        </div><!-- login-wrapper -->
    </form>
</div>

<?php
require_once 'include/footer.php';
?>