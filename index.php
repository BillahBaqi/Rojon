    <?php require_once 'front/include/header.php';

    $social_front = "SELECT * FROM socials WHERE status = 1 ORDER BY name ASC";
    $social_front_query = mysqli_query($db_connection, $social_front);
    $services = "SELECT * FROM services WHERE status = 1 ORDER BY id ASC";
    $services_query = mysqli_query($db_connection, $services);
    $portfolio = "SELECT * FROM portfolio WHERE trash_status = 1 ORDER BY id ASC";
    $portfolio_query = mysqli_query($db_connection, $portfolio);
    $education = "SELECT * FROM educations WHERE trash_status = 1 ORDER BY passing_year DESC";
    $education_query = mysqli_query($db_connection, $education);
    $brands = "SELECT * FROM brands WHERE status = 1 and trash_status = 1 ORDER BY id ASC";
    $brands_query = mysqli_query($db_connection, $brands);
    $testimonials = "SELECT * FROM testimonials WHERE trash_status = 1 ORDER BY id ASC";
    $testimonials_query = mysqli_query($db_connection, $testimonials);

    $information = "SELECT * FROM information";
    $information_query = mysqli_query($db_connection, $information);
    $information_assoc = mysqli_fetch_assoc($information_query);

    ?>


    <!-- main-area -->
    <main>

        <!-- banner-area -->
        <section id="home" class="banner-area banner-bg fix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-8 col-lg-7">
                        <div class="banner-content">
                            <h6 class="wow fadeInUp" data-wow-delay="0.2s">HELLO!</h6>
                            <h2 class="wow fadeInUp" data-wow-delay="0.3s">I am Baqi</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.5s">I'm Baqi, professional web developer with long time experience in this field​.</p>
                            <div class="banner-social wow fadeInUp" data-wow-delay="0.6s">
                                <ul>
                                    <?php foreach ($social_front_query as $key => $social_value) : ?>
                                        <li><a href="<?= $social_value['link']; ?>" target="_blank"><i class="<?= $social_value['icon']; ?>"></i></a></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <a href="#portfolio" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 d-none d-lg-block">
                        <div class="banner-img text-right">
                            <img src="front/assets/img/banner/banner_img1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-shape"><img src="front/assets/img/shape/dot_circle.png" class="rotateme" alt="img"></div>
        </section>
        <!-- banner-area-end -->

        <!-- about-area-->
        <section id="about" class="about-area primary-bg pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="front/assets/img/banner/banner_img2.png" title="me-01" alt="me-01">
                        </div>
                    </div>
                    <div class="col-lg-6 pr-90">
                        <div class="section-title mb-25">
                            <span>Introduction</span>
                            <h2>About Me</h2>
                        </div>
                        <div class="about-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, sed repudiandae odit deserunt, quas
                                quibusdam necessitatibus nesciunt eligendi esse sit non reprehenderit quisquam asperiores maxime
                                blanditiis culpa vitae velit. Numquam!</p>
                            <h3>Education:</h3>
                        </div>
                        <!-- Education Item -->

                        <?php foreach ($education_query as $key => $education_value) : ?>
                            <div class="education">
                                <div class="year"><?= $education_value['passing_year'] ?></div>
                                <div class="line"></div>
                                <div class="location">
                                    <span><?= $education_value['degree'] ?> of <?= $education_value['subject'] ?></span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: <?= $education_value['percentage'] ?>%;" aria-valuenow="<?= $education_value['percentage'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <!-- End Education Item -->
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->

        <!-- Services-area -->
        <section id="service" class="services-area pt-120 pb-50">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>WHAT WE DO</span>
                            <h2>Services and Solutions</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($services_query as $key => $services_value) : if ($key == 3) {
                            break;
                        } ?>

                        <div class="col-lg-4 col-md-6">
                            <div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                <i><img style="width: 80px; padding: 0 15px;" src="dashboard/upload/<?= $services_value['icon']; ?>" alt="icon"></i>

                                <h3><?= $services_value['name']; ?></h3>
                                <p>
                                    <?= $services_value['details']; ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach ?>

                </div>
            </div>
        </section>
        <!-- Services-area-end -->

        <!-- Portfolios-area -->
        <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>Portfolio Showcase</span>
                            <h2>My Recent Best Works</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php $select_portfolio = "SELECT * FROM portfolio INNER JOIN categories on portfolio.category_id = categories.id  WHERE portfolio.trash_status = 1 ORDER BY portfolio.p_id DESC";
                    $select_portfolio_query = mysqli_query($db_connection, $select_portfolio); ?>
                    <?php foreach ($select_portfolio_query as $key => $portfolio_value) : if ($key == 3) {
                            break;
                        } ?>

                        <div class="col-lg-4 col-md-6 pitem">
                            <div class="speaker-box">
                                <div class="speaker-thumb">
                                    <img src="dashboard/upload/<?= $portfolio_value['thumbnail']; ?>" alt="img">
                                </div>
                                <div class="speaker-overlay">
                                    <span><?= $portfolio_value['name']; ?></span>
                                    <h4><a href="view.php?id=<?= $portfolio_value['id']; ?>/<?php $string = $portfolio_value['title'];
                                    $replaced = str_replace(' ', '-', $string);
                                    echo $replaced; ?>"><?= $portfolio_value['project']; ?></a></h4>
                                    <a href="view.php?id=<?= $portfolio_value['id']; ?>/<?php $string = $portfolio_value['title'];
                                    $replaced = str_replace(' ', '-', $string);
                                    echo $replaced; ?>" value="<?= $portfolio_value['id']; ?>" class="arrow-btn">More information <span></span></a>
                                </div>
                            </div>
                        </div>

                    <?php endforeach ?>
                </div>
            </div>
        </section>
        <!-- services-area-end -->


        <!-- fact-area -->
        <section class="fact-area">
            <div class="container">
                <div class="fact-wrap">
                    <div class="row justify-content-between">
                        <div class="col-xl-2 col-lg-3 col-sm-6">
                            <div class="fact-box text-center mb-50">
                                <div class="fact-icon">
                                    <i class="flaticon-award"></i>
                                </div>
                                <div class="fact-content">
                                    <h2><span class="count">245</span></h2>
                                    <span>Feature Item</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-sm-6">
                            <div class="fact-box text-center mb-50">
                                <div class="fact-icon">
                                    <i class="flaticon-like"></i>
                                </div>
                                <div class="fact-content">
                                    <h2><span class="count">345</span></h2>
                                    <span>Active Products</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-sm-6">
                            <div class="fact-box text-center mb-50">
                                <div class="fact-icon">
                                    <i class="flaticon-event"></i>
                                </div>
                                <div class="fact-content">
                                    <h2><span class="count">39</span></h2>
                                    <span>Year Experience</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-sm-6">
                            <div class="fact-box text-center mb-50">
                                <div class="fact-icon">
                                    <i class="flaticon-woman"></i>
                                </div>
                                <div class="fact-content">
                                    <h2><span class="count">3</span>k</h2>
                                    <span>Our Clients</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- fact-area-end -->

        <!-- testimonial-area -->
        <section class="testimonial-area primary-bg pt-115 pb-115">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>testimonial</span>
                            <h2>happy customer quotes</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-10">
                        <div class="testimonial-active">
                            <?php foreach ($testimonials_query as $key => $testimonials_value) : if ($key == 3) {
                                    break;
                                } ?>
                                <div class="single-testimonial text-center">
                                    <div class="testi-avatar">
                                        <img class="rounded-circle" style="width: 100px;" src="dashboard/upload/<?= $testimonials_value['image'] ?>" alt="img">
                                    </div>
                                    <div class="testi-content">
                                        <h4><span>“</span><?= $testimonials_value['quotes'] ?> <span>”</span></h4>
                                        <div class="testi-avatar-info">
                                            <h5><?= $testimonials_value['name'] ?></h5>
                                            <span><?= $testimonials_value['designation'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial-area-end -->

        <!-- brand-area -->
        <div class="barnd-area pt-100 pb-100">
            <div class="container">
                <div class="row brand-active">
                    <?php foreach ($brands_query as $key => $brands_value) : if ($key == 5) {
                            break;
                        } ?>
                        <div class="col-xl-4">
                            <div class="single-brand">
                                <img style=" height: 50px; width: auto;" src=" dashboard/upload/<?= $brands_value['brand_image'] ?>" alt="img">
                            </div>
                        </div>
                    <?php endforeach ?>
                    <?php foreach ($brands_query as $key => $brands_value) : if ($key == 5) {
                            break;
                        } ?>
                        <div class="col-xl-4">
                            <div class="single-brand">
                                <img style=" height: 50px; width: auto;" src=" dashboard/upload/<?= $brands_value['brand_image'] ?>" alt="img">
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <!-- brand-area-end -->

        <!-- contact-area -->
        <section id="contact" class="contact-area primary-bg pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="section-title mb-20">
                            <span>information</span>
                            <h2>Contact Information</h2>
                        </div>
                        <div class="contact-content">
                            <p>Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.</p>
                            <h5>OFFICE IN <span><?= strtoupper($information_assoc['city']) ?></span></h5>
                            <div class="contact-list">
                                <ul>
                                    <li><i class="fas fa-map-marker"></i><span>Address :</span><?= $information_assoc['address'] ?></li>
                                    <li><i class="fas fa-headphones"></i><span>Phone :</span><?= $information_assoc['phone'] ?></li>
                                    <li><i class="fas fa-globe-asia"></i><span>e-mail :</span><?= $information_assoc['email'] ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-form">
                            <form action="dashboard/messages-post.php" method="POST">
                                <?php
                                if (isset($_SESSION['contactname'])) {
                                    echo $_SESSION['contactname'];
                                    unset($_SESSION['contactname']);
                                } ?>
                                <?php
                                if (isset($_SESSION['contactnameempty'])) {
                                    echo $_SESSION['contactnameempty'];
                                    unset($_SESSION['contactnameempty']);
                                } ?>
                                <input type="text" name="name" placeholder="your name *">
                                <?php
                                if (isset($_SESSION['contactemail'])) {
                                    echo $_SESSION['contactemail'];
                                    unset($_SESSION['contactemail']);
                                } ?>
                                <?php
                                if (isset($_SESSION['contactemailempty'])) {
                                    echo $_SESSION['contactemailempty'];
                                    unset($_SESSION['contactemailempty']);
                                } ?>
                                <input type="email" name="email" placeholder="your email *">
                                <?php
                                if (isset($_SESSION['contactmessagesempty'])) {
                                    echo $_SESSION['contactmessagesempty'];
                                    unset($_SESSION['contactmessagesempty']);
                                } ?>
                                <textarea name="messages" placeholder="your message *"></textarea>

                                <button type="submit" name="messages-post" class="btn">SEND</button>
                                <?php
                                if (isset($_SESSION['contactmessagessuccess'])) {
                                    echo $_SESSION['contactmessagessuccess'];
                                    unset($_SESSION['contactmessagessuccess']);
                                } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->

    <?php require_once 'front/include/footer.php' ?>