<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row justify-content-center" data-aos="fade-up">
        <h3 class="text-light mt-3 mb-1" style="text-align: center;">
            Detail Berita
        </h3>
        <div class="col-md-8 col-sm-3" style="padding: 20px;">
            <div class="card bg-dark text-white cardFood" style="border-radius: 10px;" data-aos="flip-left">
                <div class="card-body">
                    <h5 class="card-title"><?= $news['title']; ?></h5>
                    <p class="card-text infoBerita"><small class="text-muted">Created at : <?= $news['created_at']; ?></small></p>
                </div>
                <img src="<?= base_url(); ?>/img/news/<?= $news['gambar']; ?>" class="img-fluid card-img" />
                <div class="card-body">
                    <figcaption class="figure-caption captionNews" style="text-align: center;"><?= $news['caption_gambar']; ?></figcaption>
                    <p class="card-text mt-3"><?= $news['deskripsi']; ?></p>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <h3 class="text-light my-2" style="text-align: center;" data-aos="fade-up" data-aos-offset="350">
        Berita Lainnya
    </h3>

    <?php foreach ($similar_news as $n) : ?>
        <div class="card mb-3 bg-dark text-white" style="margin: 20px; border-radius:10px;" data-aos="zoom-in" data-aos-offset="350">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <img src="<?= base_url(); ?>/img/news/<?= $n['gambar']; ?>" class="img-fluid zoom imgDetailTravel" alt="Gambar Wisata">
                </div>

                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title titleBerita"><?= $n['title']; ?></h5>
                        <p class="card-text infoBerita"><small class="text-muted">Created at : <?= $n['created_at']; ?></small></p>
                        <p class="card-text descListBerita"><?= $n['deskripsi']; ?></p>
                        <a href="/berita/<?= $n['kategori']; ?>/<?= $n['id']; ?>" class="btn btn-md btn-primary" style="justify-content: center;">See Details</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?= $pager->links('news', 'custom_pagination'); ?>
</div>

<?= $this->endSection(); ?>