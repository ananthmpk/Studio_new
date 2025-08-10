<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Alime - Photography HTML Template</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/favicon.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Top Search Form Area -->
    <div class="top-search-area">
        <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <!-- Close -->
                        <button type="button" class="btn close-btn" data-dismiss="modal"><i class="ti-close"></i></button>
                        <!-- Form -->
                        <form action="index.html" method="post">
                            <input type="search" name="top-search-bar" class="form-control" placeholder="Search and hit enter...">
                            <button type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Area Start -->
    <?php
    include 'header.php';
    ?>
    <!-- Header Area End -->

    <!-- Welcome Area Start -->
    <section class="welcome-area">
        <div class="welcome-slides owl-carousel">
            <!-- Single Slide -->
            <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url(img/bg-img/1.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12 col-lg-8 col-xl-6">
                            <div class="welcome-text">
                                <h2 data-animation="bounceInDown" data-delay="900ms">Hello <br>I'm Jackson</h2>
                                <p data-animation="bounceInDown" data-delay="500ms">I photograph very instinctively. I see how it is taken like that. I do not follow certain styles, philosophies or teachers.</p>
                                <div class="hero-btn-group" data-animation="bounceInDown" data-delay="100ms">
                                    <a href="#" class="btn alime-btn mb-3 mb-sm-0 mr-4">Get a Quote</a>
                                    <a class="hero-mail-contact" href="mailto:hello.alime@gmail.com">hello.alime@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Slide -->
            <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url(img/bg-img/2.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12 col-lg-8 col-xl-6">
                            <div class="welcome-text">
                                <h2 data-animation="bounceInUp" data-delay="100ms">Hello <br>I'm Alime</h2>
                                <p data-animation="bounceInUp" data-delay="500ms">I photograph very instinctively. I see how it is taken like that. I do not follow certain styles, philosophies or teachers.</p>
                                <div class="hero-btn-group" data-animation="bounceInUp" data-delay="900ms">
                                    <a href="#" class="btn alime-btn mb-3 mb-sm-0 mr-4">Get a Quote</a>
                                    <a class="hero-mail-contact" href="mailto:hello.alime@gmail.com">hello.alime@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Welcome Area End -->

    <!-- Gallery Area Start -->
    <div class="alime-portfolio-area section-padding-80 clearfix">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Projects Menu -->
                    <div class="alime-projects-menu">
                        <div class="portfolio-menu text-center">
                            <button class="btn active" data-filter="*">All</button>
                            <button class="btn" data-filter=".human">Human</button>
                            <button class="btn" data-filter=".nature">Nature</button>
                            <button class="btn" data-filter=".country">Country</button>
                            <button class="btn" data-filter=".video">Video</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row alime-portfolio">
                <!-- Single Gallery Item -->
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item nature mb-30 wow fadeInUp" data-wow-delay="100ms">
                    <div class="single-portfolio-content">
                        <img src="img/bg-img/3.jpg" alt="">
                        <div class="hover-content">
                            <a href="img/bg-img/3.jpg" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>

                <!-- Single Gallery Item -->
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item video human mb-30 wow fadeInUp" data-wow-delay="300ms">
                    <div class="single-portfolio-content">
                        <img src="img/bg-img/4.jpg" alt="">
                        <div class="hover-content">
                            <a href="img/bg-img/4.jpg" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>

                <!-- Single Gallery Item -->
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item country mb-30 wow fadeInUp" data-wow-delay="500ms">
                    <div class="single-portfolio-content">
                        <img src="img/bg-img/5.jpg" alt="">
                        <div class="hover-content">
                            <a href="img/bg-img/5.jpg" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>

                <!-- Single Gallery Item -->
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item human mb-30 wow fadeInUp" data-wow-delay="700ms">
                    <div class="single-portfolio-content">
                        <img src="img/bg-img/6.jpg" alt="">
                        <div class="hover-content">
                            <a href="img/bg-img/6.jpg" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>

                <!-- Single Gallery Item -->
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item nature mb-30 wow fadeInUp" data-wow-delay="100ms">
                    <div class="single-portfolio-content">
                        <img src="img/bg-img/7.jpg" alt="">
                        <div class="hover-content">
                            <a href="img/bg-img/7.jpg" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>

                <!-- Single Gallery Item -->
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item video country mb-30 wow fadeInUp" data-wow-delay="300ms">
                    <div class="single-portfolio-content">
                        <img src="img/bg-img/8.jpg" alt="">
                        <div class="hover-content">
                            <a href="img/bg-img/8.jpg" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>

                <!-- Single Gallery Item -->
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item human mb-30 wow fadeInUp" data-wow-delay="500ms">
                    <div class="single-portfolio-content">
                        <img src="img/bg-img/10.jpg" alt="">
                        <div class="hover-content">
                            <a href="img/bg-img/10.jpg" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>

                <!-- Single Gallery Item -->
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item nature mb-30 wow fadeInUp" data-wow-delay="700ms">
                    <div class="single-portfolio-content">
                        <img src="img/bg-img/9.jpg" alt="">
                        <div class="hover-content">
                            <a href="img/bg-img/9.jpg" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>

                <!-- Single Gallery Item -->
                <div class="col-12 col-sm-6 col-lg-6 single_gallery_item video country mb-30 wow fadeInUp" data-wow-delay="100ms">
                    <div class="single-portfolio-content">
                        <img src="img/bg-img/36.jpg" alt="">
                        <div class="hover-content">
                            <a href="img/bg-img/36.jpg" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>

                <!-- Single Gallery Item -->
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item human mb-30 wow fadeInUp" data-wow-delay="300ms">
                    <div class="single-portfolio-content">
                        <img src="img/bg-img/37.jpg" alt="">
                        <div class="hover-content">
                            <a href="img/bg-img/37.jpg" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>

                <!-- Single Gallery Item -->
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item country mb-30 wow fadeInUp" data-wow-delay="500ms">
                    <div class="single-portfolio-content">
                        <img src="img/bg-img/5.jpg" alt="">
                        <div class="hover-content">
                            <a href="img/bg-img/5.jpg" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="700ms">
                    <a href="#" class="btn alime-btn btn-2 mt-15">View More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery Area End -->

    <!-- Follow Area Start -->
    <?php include "follow_area.php"; ?>
    <!-- Follow Area End -->

    <!-- Footer Area Start -->
    <?php include "footer.php"; ?>
    <!-- Footer Area End -->

    <!-- **** All JS Files ***** -->
    <!-- jQuery 2.2.4 -->
    <script src="js/jquery.min.js"></script>
    <!-- Popper -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All Plugins -->
    <script src="js/alime.bundle.js"></script>
    <!-- Active -->
    <script src="js/default-assets/active.js"></script>

</body>

</html>