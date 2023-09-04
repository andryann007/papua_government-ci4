<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="jumbotron jumbotron-fluid jumbotronSejarah" data-aos="fade-up">
    <div class="container">
        <h1 class="text-light" style="text-align: center;">About Papua</h1>
    </div>
</div>

<div class="container-fluid" style="background-color: black;">
    <div class="row justify-content-center">
        <h3 class="text-light my-3" style="text-align: center;" data-aos="fade-up" data-aos-offset="350">
            Sekilas Informasi Papua
        </h3>
        <div class="col-md-6 col-sm-3" style="padding: 20px;" data-aos="flip-left" data-aos-offset="350">
            <div class="card bg-dark text-white" style="border-radius: 10px;">
                <img src="<?= base_url(); ?>/img/assets/sejarah.png" class="img-fluid imgSejarah" />
                <figcaption class="figure-caption" style="text-align: center;">Salah satu destinasi wisata alam di Papua (Sumber : Traveloka)</figcaption>
                <div class="card-body">
                    <h5 class="card-title">Sejarah Singkat Papua</h5>
                    <p class="card-text">
                        Papua adalah sebuah provinsi di Indonesia yang terletak di pulau
                        Nugini bagian barat atau <i>West New Guinea</i>. Papua juga sering disebut
                        sebagai Papua Barat karena Papua bisa merujuk kepada seluruh pulau
                        Nugini termasuk bagian timur negara tetangga, <i>East New Guinea</i> atau
                        Papua Nugini. <br><br>

                        Papua Barat adalah sebutan yang lebih disukai para nasionalis yang ingin
                        memisahkan diri dari Indonesia dan membentuk negara sendiri. Provinsi
                        ini dulu dikenal dengan panggilan Irian Barat sejak tahun 1969 hingga 1973,
                        namanya kemudian diganti menjadi Irian Jaya oleh Soeharto pada saat meresmikan
                        tambang tembaga dan emas Freeport, nama yang tetap digunakan secara resmi
                        hingga tahun 2002. Nama provinsi ini diganti menjadi Papua sesuai UU No 21/2001
                        Otonomi Khusus Papua. Pada masa era kolonial Belanda, daerah ini disebut Nugini Belanda.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-3" style="padding: 20px;" data-aos="flip-right" data-aos-offset="350">
            <div class="card bg-dark text-white" style="border-radius: 10px;">
                <img src="<?= base_url(); ?>/img/assets/suku_asmat.jpg" class="img-fluid imgSejarah" />
                <figcaption class="figure-caption" style="text-align: center;">Suku Asmat di Papua (Sumber : Traveloka)</figcaption>
                <div class="card-body">
                    <h5 class="card-title">Suku Asli Papua</h5>
                    <p class="card-text">
                        Papua adalah salah satu pulau di Indonesia yang ditempati oleh berbagai
                        macam suku lokal, salah satu suku lokal yang mendiami pulau Papua
                        adalah Suku Asmat. <br><br>

                        Suku Asmat adalah suku asli yang mendiami wilayah
                        Papua Selatan, yang dikenal dengan hasil ukiran kayunya yang unik & khas.
                        Ukiran kayu Suku Asmat biasanya mengambarkan sosok manusia, hewan, atau
                        makhluk mitologi, yang biasanya digunakan untuk berbagai keperluan seperti
                        pembuatan perhiasan, perahu, dan rumah adat. <br><br>

                        Selain Suku Asmat, Terdapat pula beberapa suku asli lain yang mendiami pulau Papua,
                        seperti : Suku Dani, Suku Yali, Suku Marind Anim, Suku Sentani, Suku Biak, Suku Mandobo,
                        dan Suku Kamoro.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="row justify-content-center">
        <h3 class="text-light mb-3" style="text-align: center;" data-aos="fade-up" data-aos-offset="250">
            Destinasi Wisata Papua
        </h3>
        <?php foreach ($travels as $travel) : ?>
            <div class="col-md-4 col-sm-3" style="padding: 20px;" data-aos="flip-left" data-aos-offset="250">
                <div class="card bg-dark text-white cardTravel" style="border-radius: 10px;">
                    <img src="<?= base_url(); ?>/img/travels/<?= $travel['gambar']; ?>" class="img-fluid imgTravel" />
                    <figcaption class="figure-caption" style="text-align: center;"><?= $travel['caption_gambar']; ?></figcaption>
                    <div class="card-body cardBodyTravel">
                        <h5 class="card-title"><?= $travel['nama']; ?></h5>
                        <p class="card-text"><?= $travel['deskripsi']; ?></p>
                        <a href="/wisata/alam/<?= $travel['id']; ?>" class="btn btn-md btn-primary" style="justify-content: center;">See Details</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <hr>

    <div class="row justify-content-center">
        <h3 class="text-light mb-3" style="text-align: center;" data-aos="fade-up" data-aos-offset="250">
            Kuliner Khas Papua
        </h3>
        <?php foreach ($foods as $food) : ?>
            <div class="col-md-4 col-sm-3" style="padding: 20px;" data-aos="flip-right" data-aos-offset="250">
                <div class="card bg-dark text-white cardFood" style="border-radius: 10px;">
                    <img src="<?= base_url(); ?>/img/travels/<?= $food['gambar']; ?>" class="img-fluid imgFood" />
                    <figcaption class="figure-caption" style="text-align: center;"><?= $food['caption_gambar']; ?></figcaption>
                    <div class="card-body cardBodyFood">
                        <h5 class="card-title"><?= $food['nama']; ?></h5>
                        <p class="card-text"><?= $food['deskripsi']; ?></p>
                        <a href="/wisata/kuliner/<?= $food['id']; ?>" class="btn btn-md btn-primary" style="justify-content: center;">See Details</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>