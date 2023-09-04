<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<?php foreach ($news as $n) : ?>
    <div class="container-fluid">
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
    </div>
<?php endforeach; ?>
<?= $pager->links('news', 'custom_pagination'); ?>

<?= $this->endSection(); ?>