<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel" data-aos="fade-up">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <div class="carousel-inner">
    <div class="carousel-item active carouselHome">
      <img src="<?= base_url(); ?>/img/assets/kantor_papua.png" />
      <div class="container">
        <div class="carousel-caption">
          <h1 class="carouselTitle">Welcome to Papua</h1>
          <p><a class="btn btn-md btn-dark" href="/about">Learn More</a></p>
        </div>
      </div>
    </div>

    <div class="carousel-item carouselHome">
      <img src="<?= base_url(); ?>/img/news/64def9773065d.jpg" />
      <div class="container">
        <div class="carousel-caption">
          <h1 class="carouselTitle">Berita Terkini</h1>
          <p><a class="btn btn-md btn-dark" href="/berita/umum">Read News</a></p>
        </div>
      </div>
    </div>

    <div class="carousel-item carouselHome">
      <img src="<?= base_url(); ?>/img/assets/sejarah.png" />
      <div class="container">
        <div class="carousel-caption">
          <h1 class="carouselTitle">Destinasi Wisata</h1>
          <p><a class="btn btn-md btn-dark" href="/wisata/alam">Explore Destination</a></p>
        </div>
      </div>
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="container-fluid bg-dark text-light py-3">
  <div class="row justify-content-center">
    <div class="col-md-8 col-sm-3" style="padding: 20px;" data-aos="flip-left" data-aos-offset="500">
      <h2 class="mt-2 mb-2" style="text-align: center;">Headline News</h2>
      <div id="trendingNewsCarousel" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">
          <?php foreach ($news as $n => $value) {
            $active = ($n == 0) ? 'active' : '';
            echo '<div class="carousel-item ' . $active . '">
            <h2 class="mt-2 titleBerita">' . $value['title'] . '</h2>
            <h5 class="infoBerita">' . $value['author_name'] . ', ' . $value['news_date'] . '</h5>
            <img class="img-thumbnail carouselImgNews" src="' . base_url() . '/img/news/' . $value['gambar'] . '"/>
            <figcaption class="figure-caption captionNews">' . $value['caption_gambar'] . '</figcaption>
            <p class="mt-2 descBerita">' . $value['deskripsi'] . '</p>
            </div>';
          } ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#trendingNewsCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#trendingNewsCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <div class="col-md-4 col-sm-3" style="padding: 20px;" data-aos="flip-right" data-aos-offset="500">
      <div class="card bg-dark text-white" style="border-radius: 10px;">
        <h2 class="mt-2 mb-2" style="text-align: center;">Lambang Papua</h2>
        <div class="d-flex justify-content-center">
          <img class="img-fluid imgLogo mt-2" src="<?= base_url(); ?>/img/assets/logo.png" />
        </div>
        <figcaption class="figure-caption" style="text-align: center;">Logo / Lambang Papua (Sumber : Pemprov-Papua)</figcaption>

        <div class="card-body">
          <h5 class="card-title">Arti Lambang Papua</h5>
          <p class="card-text">
            Lambang Papua berbentuk perisai yang didominasi warna kuning emas, yang melambangkan simbol kesiapsiagaan
            dan ketahanan.<br><br>

            Dalam perisai tersebut terdapat tiga buah tugu yang berdiri diatas tumukan batu bersusun 6 dan 9
            yg melambangkan perjuangan Trikora dan kemenangan Pepera pada 1969. Sedangkan lambang Padi & Kapas masing masing memiliki
            makna tanggal kemerdekaan Indonesia yang dimana 17 butir padi dan 8 buah kapas berarti 17 Agustus, sedangkan pita atas yang
            berjumlah 4 & pita bawah yang berjumlah 5 berarti 45. Jika digabung berarti 17 Agustus 1945.
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center" data-aos="zoom-in-up" data-aos-offset="500">
    <div class="col-md-12 col-sm-3">
      <h2 class="mt-2 mb-2" style="text-align: center;">Destinasi Wisata</h2>
      <div id="travelCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <?php foreach ($travels as $travel => $value) {
            $active = ($travel == 0) ? 'active' : '';
            echo '<li data-bs-target="#travelCarousel" data-bs-slide-to="' . $travel . '" class= "' . $active . '"></li>';
          } ?>
        </div>

        <div class="carousel-inner">
          <?php foreach ($travels as $travel => $value) {
            $active = ($travel == 0) ? 'active' : '';
            echo '<div class="carousel-item ' . $active . '">
            <img class="img-thumbnail carouselImgTravel" src="' . base_url() . '/img/travels/' . $value['gambar'] . '">
            <div class="carousel-caption">
            <h3>' . $value['nama'] . '</h3>
            </div>
            </div>';
          } ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#travelCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#travelCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>