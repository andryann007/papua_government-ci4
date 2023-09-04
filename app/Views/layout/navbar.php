<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-md-top sticky-lg-top" style="opacity: 0.90;">
    <div class="container-fluid">
        <!-- Navbar Brand Bootstrap 5 -->
        <a class="navbar-brand" title="TFU" alt="there for you home page">
            <img id="logo_navbar" src="<?= base_url(); ?>/img/assets/logo-navbar.png" />
        </a>
        <!-- End Navbar Brand Bootstrap 5 -->

        <!-- Navbar Toogler Bootstrap 5 -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- End Navbar Toogler Bootstrap 5 -->

        <!-- Navbar Collapse Bootstrap 5 -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link navTitle" style="<?= ($title === 'Home') ? 'font-weight: bold; color: white;' : ''; ?>" href="/">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link navTitle" style="<?= ($title === 'About') ? 'font-weight: bold; color: white;' : ''; ?>" href="/about">
                        About
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link navTitle" style="<?= ($title === 'Services') ? 'font-weight: bold; color: white;' : ''; ?>" href="/services">
                        Layanan
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toogle navTitle" style="<?= ($title === 'Berita') ? 'font-weight: bold; color: white;' : ''; ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Berita Terbaru
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/berita/umum">Umum</a></li>
                        <li><a class="dropdown-item" href="/berita/ekonomi">Ekonomi</a></li>
                        <li><a class="dropdown-item" href="/berita/politik">Politik</a></li>
                        <li><a class="dropdown-item" href="/berita/kesehatan">Kesehatan</a></li>
                        <li><a class="dropdown-item" href="/berita/olahraga">Olahraga</a></li>
                        <li><a class="dropdown-item" href="/berita/edukasi">Edukasi</a></li>
                        <li><a class="dropdown-item" href="/berita/otomotif">Otomotif</a></li>
                        <li><a class="dropdown-item" href="/berita/sains">Sains</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toogle navTitle" style="<?= ($title === 'Wisata') ? 'font-weight: bold; color: white;' : ''; ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Destinasi Wisata
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/wisata/alam">Wisata Alam</a></li>
                        <li><a class="dropdown-item" href="/wisata/kuliner">Wisata Kuliner</a></li>
                        <li><a class="dropdown-item" href="/wisata/sejarah">Wisata Sejarah</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- End Navbar Collapse Bootstrap 5 -->
    </div>
</nav>