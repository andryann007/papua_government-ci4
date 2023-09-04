<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Halaman Awal E-Government Papua" />
    <meta name="author" content="" />

    <!-- Fontawesome Templates -->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap 5 Templates -->
    <link href="<?= base_url(); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom CSS Templates -->
    <link href="<?= base_url(); ?>/css/styles.css" rel="stylesheet" type="text/css" />

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Core JavaScript Plugins -->
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/jquery/jquery.slim.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <link rel="icon" type="image/png" href="<?= base_url(); ?>/img/assets/logo.png" />

    <title>Portal E-Government Papua | <?= $title; ?></title>
</head>

<body style="background-color: black;">
    <?= $this->include('layout/navbar'); ?>

    <?= $this->renderSection('content'); ?>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript">
        AOS.init();
    </script>
</body>

<footer class="page-footer font-small indigo">
    <div class="container text-center text-md-left">
        <div class="row" style="align-items: center">
            <div class="col-md-2 mx-auto">
                <a href="/"><img src="<?= base_url(); ?>/img/assets/logo.png" width="120px" style="padding-top: 20px" class="d-none d-md-block" /></a>
            </div>
            <div class="col-md-2 mx-auto margin">
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4 footer-title">
                    Berita Terbaru
                </h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="/News 01" class="footer-link">News 01</a>
                    </li>
                    <li>
                        <a href="/News 02" class="footer-link">News 02</a>
                    </li>
                    <li>
                        <a href="/News 03" class="footer-link">News 03</a>
                    </li>
                </ul>
            </div>
            <hr class="clearfix w-100 d-md-none" />
            <div class="col-md-2 mx-auto margin">
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4 footer-title">
                    Berita Populer
                </h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="/News 01" class="footer-link">News 01</a>
                    </li>
                    <li>
                        <a href="/News 02" class="footer-link">News 02</a>
                    </li>
                    <li>
                        <a href="/News 03" class="footer-link">News 03</a>
                    </li>
                </ul>
            </div>
            <hr class="clearfix w-100 d-md-none" />
            <div class="col-md-4 mx-auto margin d-none d-md-block">
                <ul class="list-unstyled row">
                    <li>
                        <a href="#!" class="footer-link"><img title="Facebook" src="<?= base_url(); ?>/img/icons/facebook.svg" alt="Facebook" class="footer-media" /></a>
                    </li>
                    <li>
                        <a href="#!" class="footer-link"><img title="Youtube" src="<?= base_url(); ?>/img/icons/youtube.svg" alt="Youtube" class="footer-media" /></a>
                    </li>
                    <li>
                        <a href="#!" class="footer-link"><img title="Twitter" src="<?= base_url(); ?>/img/icons/twitter.svg" alt="Twitter" class="footer-media" /></a>
                    </li>
                    <li>
                        <a href="#!" class="footer-link"><img title="Instagram" src="<?= base_url(); ?>/img/icons/instagram.svg" alt="Instagram" class="footer-media" /></a>
                    </li>
                    <li>
                        <a href="#!" class="footer-link"><img title="Email" src="<?= base_url(); ?>/img/icons/envelope.svg" alt="Email" class="footer-media" /></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 mx-auto margin d-md-none">
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4 footer-title">
                    Contact Us
                </h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="#!" class="footer-link">Facebook</a>
                    </li>
                    <li>
                        <a href="#!" class="footer-link">Youtube</a>
                    </li>
                    <li>
                        <a href="#!" class="footer-link">Twitter</a>
                    </li>
                    <li>
                        <a href="#!" class="footer-link">Instagram</a>
                    </li>
                    <li>
                        <a href="#!" class="footer-link">Email</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright text-center py-3">
        © 2023 Copyright :
        <a href="/" style="color: black">
            Created By : Andryan. All Rights Reserved</a>
    </div>
</footer>

</html>