<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="jumbotron jumbotron-fluid 
    <?= ($kategori === 'alam') ? 'jumbotronWisataAlam' : ''; ?>
    <?= ($kategori === 'kuliner') ? 'jumbotronWisataKuliner' : ''; ?>
    <?= ($kategori === 'sejarah') ? 'jumbotronWisataSejarah' : ''; ?>" data-aos="fade-up">
    <div class="container">
        <h1 class="text-light" style="text-align: center;">Destinasi Wisata
            <?= ($kategori === 'alam') ? 'Alam' : ''; ?>
            <?= ($kategori === 'kuliner') ? 'Kuliner' : ''; ?>
            <?= ($kategori === 'sejarah') ? 'Sejarah' : ''; ?>
        </h1>
    </div>
</div>

<div class="container-fluid" style="background-color: black;">
    <div class="row justify-content-center">
        <h3 class="text-light my-3" style="text-align: center;" data-aos="fade-up" data-aos-offset="350">
            Destinasi Wisata
            <?= ($kategori === 'alam') ? 'Alam' : ''; ?>
            <?= ($kategori === 'kuliner') ? 'Kuliner' : ''; ?>
            <?= ($kategori === 'sejarah') ? 'Sejarah' : ''; ?> di Papua
        </h3>
        <?php foreach ($travels as $travel) : ?>
            <div class="col-md-4 col-sm-3" style="padding: 20px;">
                <div class="card bg-dark text-white cardTravel" style="border-radius: 10px;" data-aos="flip-left" data-aos-offset="350">
                    <img src="<?= base_url(); ?>/img/travels/<?= $travel['gambar']; ?>" class="img-fluid imgTravel" />
                    <figcaption class="figure-caption" style="text-align: center;"><?= $travel['caption_gambar']; ?></figcaption>
                    <div class="card-body cardBodyTravel">
                        <h5 class="card-title"><?= $travel['nama']; ?></h5>
                        <p class="card-text"><?= $travel['deskripsi']; ?></p>
                        <a href="/wisata/<?= $travel['kategori']; ?>/<?= $travel['id']; ?>" class="btn btn-md btn-primary" style="justify-content: center;">See Details</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?= $pager->links('travels', 'custom_pagination'); ?>
</div>

<?= $this->endSection(); ?>