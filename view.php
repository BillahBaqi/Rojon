<?php require_once 'front/include/header.php';
$portfolio_ids = $_GET['id'];
$portfolio_check_ids = "SELECT * FROM portfolio WHERE id='$portfolio_ids'";
$portfolio_check_query = mysqli_query($db_connection, $portfolio_check_ids);
$portfolio_check_assoc = mysqli_fetch_assoc($portfolio_check_query);
?>

<!-- main-area -->
<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="breadcrumb-content text-center">
                        <h2><?= $portfolio_check_assoc['project'] ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- portfolio-details-area -->
    <section class="portfolio-details-area pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10">
                    <div class="single-blog-list">
                        <div class="blog-list-thumb mb-35">
                            <img src="dashboard/upload/<?= $portfolio_check_assoc['featured'] ?>" alt="img">
                        </div>
                        <div class="blog-list-content blog-details-content portfolio-details-content">
                            <h2><?= $portfolio_check_assoc['title'] ?></h2>
                            <p><?= nl2br($portfolio_check_assoc['description']) ?></p>
                            <div class="blog-list-meta">
                                <ul>
                                    <li class="blog-post-date">
                                        <h3>Share On</h3>
                                    </li>
                                    <li class="blog-post-share">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="avatar-post mt-70 mb-60">
                            <ul>
                                <li>
                                    <div class="post-avatar-img">
                                        <img src="front/assets/img/blog/post_avatar_img.png" alt="img">
                                    </div>
                                    <div class="post-avatar-content">
                                        <h5>Thomas Herlihy</h5>
                                        <p>Vehicula dolor amet consectetur adipiscing elit. Cras sollicitudin, tellus vitae
                                            condimem
                                            egestliberos dolor auctor
                                            tellus.</p>
                                        <div class="post-avatar-social mt-15">
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- portfolio-details-area-end -->

</main>
<!-- main-area-end -->

<!-- footer -->
<footer>
    <div class="copyright-wrap primary-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="copyright-text text-center">
                        <p>Copyright© <span>Rojon</span> | All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-end -->



<!-- JS here -->
<script src="front/assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="front/assets/js/popper.min.js"></script>
<script src="front/assets/js/bootstrap.min.js"></script>
<script src="front/assets/js/isotope.pkgd.min.js"></script>
<script src="front/assets/js/one-page-nav-min.js"></script>
<script src="front/assets/js/slick.min.js"></script>
<script src="front/assets/js/ajax-form.js"></script>
<script src="front/assets/js/wow.min.js"></script>
<script src="front/assets/js/aos.js"></script>
<script src="front/assets/js/jquery.waypoints.min.js"></script>
<script src="front/assets/js/jquery.counterup.min.js"></script>
<script src="front/assets/js/jquery.scrollUp.min.js"></script>
<script src="front/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="front/assets/js/jquery.magnific-popup.min.js"></script>
<script src="front/assets/js/plugins.js"></script>
<script src="front/assets/js/main.js"></script>
</body>

<!-- Mirrored from themebeyond.com/html/kufa/portfolio-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:29:14 GMT -->

</html>