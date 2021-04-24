<?php
include 'include/header.php';
?>

<body>
    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">
        <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

            <form action="register-post.php" method="POST">
                <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
                    <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Rojon <span class="tx-info tx-normal">Admin</span></div>
                    <div class="tx-center mg-b-40">Enter your information below for registration</div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter your name*" name="name">
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['name'])) {
                                echo $_SESSION['name'];
                                unset($_SESSION['name']);
                            }
                            ?>
                        </span>
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['namecar'])) {
                                echo $_SESSION['namecar'];
                                unset($_SESSION['namecar']);
                            }
                            ?>
                        </span>
                    </div><!-- form-group -->

                    <div class="form-group">
                        <input type="Text" class="form-control" placeholder="Enter your email*" name="email">
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['email-exist'])) {
                                echo $_SESSION['email-exist'];
                                unset($_SESSION['email-exist']);
                            }
                            ?>
                        </span>
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['email'])) {
                                echo $_SESSION['email'];
                                unset($_SESSION['email']);
                            }
                            ?>
                        </span>
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['emailinv'])) {
                                echo $_SESSION['emailinv'];
                                unset($_SESSION['emailinv']);
                            }
                            ?>
                        </span>
                    </div><!-- form-group -->

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter your phone" name="phone">
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['Phoneinv'])) {
                                echo $_SESSION['Phoneinv'];
                                unset($_SESSION['Phoneinv']);
                            }
                            ?>
                        </span>

                    </div><!-- form-group -->
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Enter your password*" name="password">

                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['passwordinv'])) {
                                echo $_SESSION['passwordinv'];
                                unset($_SESSION['passwordinv']);
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

                    </div><!-- form-group -->
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Enter your confirm password*" name="cpassword">
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['cpassword'])) {
                                echo $_SESSION['cpassword'];
                                unset($_SESSION['cpassword']);
                            }
                            ?>
                        </span>
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['cpasswordinv'])) {
                                echo $_SESSION['cpasswordinv'];
                                unset($_SESSION['cpasswordinv']);
                            }
                            ?>
                        </span>

                    </div><!-- form-group -->
                    <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
                    <button type="submit" name="Baqi" class="btn btn-info btn-block">Sign Up</button>

                    <div class="mg-t-30 tx-center">Already have an account? <a href="login.php" class="tx-info">Sign In</a></div>
                </div><!-- login-wrapper -->
            </form>
        </div>

        <?php include 'include/footer.php'; ?>