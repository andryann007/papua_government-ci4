<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="card mb-3 bg-dark text-white" style="margin: 20px; border-radius:10px;" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <img src="<?= base_url(); ?>/img/travels/<?= $travel['gambar']; ?>" class="img-fluid zoom imgDetailTravel" alt="Gambar Wisata">
            </div>

            <div class="col-md-6">
                <div class="card-body">
                    <h5 class="card-title"><?= $travel['nama']; ?></h5>
                    <p class="card-text"><small class="text-muted">Created at : <?= $travel['created_at']; ?></small></p>
                    <p class="card-text"><?= $travel['deskripsi']; ?></p>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="row justify-content-center">
        <h3 class="text-light my-2" style="text-align: center;" data-aos="fade-up" data-aos-offset="350">
            Destinasi / Kuliner Serupa
        </h3>
        <?php foreach ($similar_travel as $similar) : ?>
            <div class="col-md-4 col-sm-3" style="padding: 20px;">
                <div class="card bg-dark text-white cardFood" style="border-radius: 10px;" data-aos="flip-left" data-aos-offset="350">
                    <img src="<?= base_url(); ?>/img/travels/<?= $similar['gambar']; ?>" class="img-fluid imgFood" />
                    <figcaption class="figure-caption" style="text-align: center;"><?= $similar['caption_gambar']; ?></figcaption>
                    <div class="card-body cardBodyFood">
                        <h5 class="card-title"><?= $similar['nama']; ?></h5>
                        <p class="card-text"><?= $similar['deskripsi']; ?></p>
                        <a href="/wisata/<?= $similar['kategori']; ?>/<?= $similar['id']; ?>" class="btn btn-md btn-primary" style="justify-content: center;">See Details</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?= $pager->links('travels', 'custom_pagination'); ?>
</div>

<?= $this->endSection(); ?>