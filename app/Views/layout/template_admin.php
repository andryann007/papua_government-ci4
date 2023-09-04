<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Andryan" />

    <link rel="icon" type="image/png" href="<?= base_url(); ?>/img/assets/logo.png" />

    <title>Dashboard Admin Portal E-Government Papua</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- template table bootstrap 5 -->
    <link href="<?= base_url(); ?>/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/css/responsive.dataTables.min.css" rel="stylesheet" />

    <!-- Sweet Alert 2 Library-->
    <link href="<?= base_url(); ?>/css/sweetalert2.min.css" rel="stylesheet" />

    <!-- Custom CSS Templates -->
    <link href="<?= base_url(); ?>/css/styles.css" rel="stylesheet" type="text/css" />

    <!-- Core JavaScript-->
    <script src="<?= base_url(); ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/js/jquery.easing.min.js"></script>
    <script src="<?= base_url(); ?>/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url(); ?>/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>
    <script src="<?= base_url(); ?>/js/sweetalert2.all.min.js"></script>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a style="justify-content: space-arround; align-items:center;" class="sidebar-brand d-flex" href="/admin">
                <i class="fas fa-file-invoice"></i>
                <div class="sidebar-brand-text mx-2">E-Gov Papua CMS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading Data Master -->
            <div class="sidebar-heading">Data Master</div>

            <?php if (in_groups('super-admin')) : ?>
                <!-- Nav Item - Data Akun -->
                <li class="nav-item <?= ($title === 'Akun') ? 'active' : ''; ?>">
                    <a class="nav-link" href="/admin/akun">
                        <img class="<?= ($title === 'Akun') ? 'icon-white' : 'icon-grey'; ?>" src="<?= base_url(); ?><?= ($title === 'Akun') ? '/img/icons/person-badge-fill.svg' : '/img/icons/person-badge.svg'; ?>" />
                        <span>Data Akun</span></a>
                </li>
            <?php endif; ?>

            <!-- Nav Item - Data Berita -->
            <li class="nav-item <?= ($title === 'Berita') ? 'active' : ''; ?>">
                <a class="nav-link" href="/admin/news">
                    <img class="<?= ($title === 'Berita') ? 'icon-white' : 'icon-grey'; ?>" src="<?= base_url(); ?>/img/icons/newspaper.svg" />
                    <span>Data Berita</span></a>
            </li>

            <!-- Nav Item - Data Wisata -->
            <li class="nav-item <?= ($title === 'Wisata') ? 'active' : ''; ?>">
                <a class="nav-link" href="/admin/travel">
                    <img class="<?= ($title === 'Wisata') ? 'icon-white' : 'icon-grey'; ?>" src="<?= base_url(); ?><?= ($title === 'Wisata') ? '/img/icons/airplane-fill.svg' : '/img/icons/airplane.svg'; ?>" />
                    <span>Data Wisata</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Contact Us</div>

            <!-- Nav Item - Data Contact Us -->
            <li class="nav-item <?= ($title === 'Contact Us') ? 'active' : ''; ?>">
                <a class="nav-link" href="/admin/contact">
                    <img class="<?= ($title === 'Contact Us') ? 'icon-white' : 'icon-grey'; ?>" src="<?= base_url(); ?><?= ($title === 'Contact Us') ? '/img/icons/envelope-open-fill.svg' : '/img/icons/envelope-open.svg'; ?>" />
                    <span>Data Contact Us</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Logout</div>

            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link btnLogout" type="button" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <i class="fas fa-power-off"></i>
                    <span>Logout</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?= $this->include("layout/navbar_admin"); ?>

                <?= $this->renderSection('content'); ?>
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script type="text/javascript">
        $(document).on('click', '#btnProfile', function() {
            $('.modal-body #idUser').val($(this).data('id'));
            $('.modal-body #namaUser').val($(this).data('nama'));
            $('.modal-body #emailUser').val($(this).data('email'));
            $('.modal-body #username').val($(this).data('username'));
            $('.modal-body #passUser').val($(this).data('password'));
        })
    </script>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Select <b>"Logout"</b> below if you are ready to leave !!!
                </div>
                <div class="modal-footer">
                    <a class="btn btn-danger" href="<?= base_url('/logout'); ?>">
                        <i class="fas fa-power-off"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>