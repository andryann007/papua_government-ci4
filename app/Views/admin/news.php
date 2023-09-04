<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div style="justify-content: space-between; align-items: center; margin-bottom:10px;" class="d-none d-flex">
        <h3 class="mb-0 text-gray-800 col-md-6">Data <?= $title; ?></h3>

        <button type="button" style="margin-right: 10px;" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addAccount">
            <i class="fas fa-plus"></i>
            Tambah Data
        </button>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Data - Data Berita
            </h6>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive table-striped display nowrap">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr class="text-center align-middle">
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Author</th>
                                    <th>Kategori</th>
                                    <th>Gambar</th>
                                    <th>Caption Gambar</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($news as $n) : ?>
                                    <tr class="text-center align-middle">
                                        <td>
                                            <?= $i++; ?>
                                        </td>
                                        <td>
                                            <?= $n['title']; ?>
                                        </td>
                                        <td>
                                            <?= $n['author_name']; ?>
                                        </td>
                                        <td>
                                            <?= ucwords($n['kategori']); ?>
                                        </td>
                                        <td class="zoom">
                                            <img src="<?= base_url(); ?>/img/news/<?= $n['gambar']; ?>" class="img-thumbnail">
                                        </td>
                                        <td>
                                            <?= $n['caption_gambar']; ?>
                                        </td>
                                        <td>
                                            <?= $n['deskripsi']; ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-warning" id="btnEdit" data-bs-toggle="modal" data-bs-target="#editNews" data-id="<?= $n['id']; ?>" data-judul="<?= $n['title']; ?>" data-author="<?= $n['author']; ?>" data-kategori="<?= $n['kategori']; ?>" data-caption="<?= $n['caption_gambar']; ?>" data-desc="<?= $n['deskripsi']; ?>">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Data Modal -->
<div class="modal fade" id="addAccount" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Data Berita</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?= form_open_multipart('', ['class' => 'formSimpanDataBerita']); ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="judulBerita">Judul Berita</label>
                    <input class="form-control form-label" type="text" name="judulBerita" id="judulBerita" />
                    <div class="invalid-feedback errorJudulBerita"></div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="author" class="form-label">Author : </label>
                            <select class="form-select" name="author" id="author" required>
                                <option value="<?= user()->id; ?>"><?= user()->nama_lengkap; ?></option>
                            </select>
                            <div class="invalid-feedback errorAuthor"></div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="kategoriBerita" class="form-label">Kategori Berita : </label>
                        <select class="form-select" name="kategoriBerita" id="kategoriBerita">
                            <option value="umum">Umum</option>
                            <option value="edukasi">Edukasi</option>
                            <option value="ekonomi">Ekonomi</option>
                            <option value="kesehatan">Kesehatan</option>
                            <option value="politik">Politik</option>
                            <option value="olahraga">Olahraga</option>
                            <option value="otomotif">Otomotif</option>
                            <option value="sains">Sains</option>
                        </select>
                        <div class="invalid-feedback errorKategoriBerita"></div>
                    </div>
                </div>

                <label for="gambarBerita" class="form-label">Gambar Berita</label>
                <div class="input-group mb-3">
                    <input class="form-control" type="file" name="gambarBerita" id="gambarBerita" />
                    <div class="invalid-feedback errorGambarBerita"></div>
                </div>

                <div class="form-group">
                    <label for="captionGambar" class="form-label">Caption Gambar</label>
                    <textarea rows="1" name="captionGambar" id="captionGambar" class="form-control"></textarea>
                    <div class="invalid-feedback errorCaptionGambar"></div>
                </div>

                <div class="form-group">
                    <label for="deskripsiBerita" class="form-label">Deskripsi Berita</label>
                    <textarea rows="3" name="deskripsiBerita" id="deskripsiBerita" class="form-control"></textarea>
                    <div class="invalid-feedback errorDeskripsiBerita"></div>
                </div>
            </div>

            <div class="d--sm-flex modal-footer mb-4" style="justify-content: space-between;">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="fas fa-trash"></i> Batal
                </button>
                <button type="submit" class="btn btn-primary addNewNews" name="addNewNews">
                    <i class="fas fa-plus"></i> Tambah
                </button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<!-- Edit Data Modal -->
<div class="modal fade" id="editNews" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Update Data Berita</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?= form_open_multipart('', ['class' => 'formUpdateDataBerita']); ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <input type="hidden" id="idBerita" name="idBerita" class="form-control" />

                <div class="form-group">
                    <label for="editJudulBerita" class="form-label">Judul Berita</label>
                    <input class="form-control" type="text" name="judulBerita" id="editJudulBerita" />
                    <div class="invalid-feedback errorEditJudulBerita"></div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="editAuthor" class="form-label">Author : </label>
                            <select class="form-select" name="editAuthor" id="editAuthor" disabled>
                                <option value="<?= user()->id; ?>"><?= user()->nama_lengkap; ?></option>
                            </select>
                            <div class="invalid-feedback errorEditAuthor"></div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="editKategoriBerita" class="form-label">Kategori Berita : </label>
                        <select class="form-select" name="editKategoriBerita" id="editKategoriBerita">
                            <option value="umum">Umum</option>
                            <option value="edukasi">Edukasi</option>
                            <option value="ekonomi">Ekonomi</option>
                            <option value="kesehatan">Kesehatan</option>
                            <option value="politik">Politik</option>
                            <option value="olahraga">Olahraga</option>
                            <option value="otomotif">Otomotif</option>
                            <option value="sains">Sains</option>
                        </select>
                        <div class="invalid-feedback errorEditKategoriBerita"></div>
                    </div>
                </div>

                <label for="editGambarBerita" class="form-label">Gambar Berita</label>
                <div class="input-group mb-3">
                    <input class="form-control" type="file" name="editGambarBerita" id="editGambarBerita" />
                    <div class="invalid-feedback errorEditGambarBerita"></div>
                </div>

                <div class="form-group">
                    <label for="editCaptionGambar" class="form-label">Caption Gambar</label>
                    <textarea rows="1" name="editCaptionGambar" id="editCaptionGambar" class="form-control"></textarea>
                    <div class="invalid-feedback errorEditCaptionGambar"></div>
                </div>

                <div class="form-group">
                    <label for="editDeskripsiBerita" class="form-label">Deskripsi Berita</label>
                    <textarea rows="3" name="editDeskripsiBerita" id="editDeskripsiBerita" class="form-control"></textarea>
                    <div class="invalid-feedback errorEditDeskripsiBerita"></div>
                </div>
            </div>

            <div class="d--sm-flex modal-footer mb-4" style="justify-content: space-between;">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="fas fa-trash"></i> Batal
                </button>
                <button type="submit" class="btn btn-warning" name="editNews">
                    <i class="fas fa-edit"></i> Edit
                </button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '#btnEdit', function() {
        $('.modal-body #idBerita').val($(this).data('id'));
        $('.modal-body #editJudulBerita').val($(this).data('judul'));
        $('.modal-body #editKategoriBerita').val($(this).data('kategori'));
        $('.modal-body #editAuthor').val($(this).data('author'));
        document.getElementById("editCaptionGambar").value = $(this).data('caption');
        document.getElementById("editDeskripsiBerita").value = $(this).data('desc');
    });
</script>

<script type="text/javascript">
    $('.formSimpanDataBerita').submit(function(e) {
        e.preventDefault();

        var formData = new FormData($('.formSimpanDataBerita')[0]);

        $.ajax({
            type: "post",
            url: "<?= site_url('admin/save_news'); ?>",
            contentType: false,
            processData: false,
            data: formData,
            dataType: "json",
            beforeSend: function() {
                $('.addNewNews').attr('disable', 'disabled');
                $('.addNewNews').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('.addNewNews').removeAttr('disable');
                $('.addNewNews').html('<i class="fa fa-save"></i> Simpan Data');
            },
            success: function(response) {
                if (response.error) {
                    if (response.error.judul) {
                        $('.modal-body #judulBerita').addClass('is-invalid');
                        $('.errorJudulBerita').html(response.error.judul);
                    } else {
                        $('.modal-body #judulBerita').removeClass('is-invalid');
                        $('.errorJudulBerita').html();
                    }

                    if (response.error.author) {
                        $('.modal-body #author').addClass('is-invalid');
                        $('.errorAuthor').html(response.error.author);
                    } else {
                        $('.modal-body #author').removeClass('is-invalid');
                        $('.errorAuthor').html();
                    }

                    if (response.error.kategori) {
                        $('.modal-body #kategoriBerita').addClass('is-invalid');
                        $('.errorKategoriBerita').html(response.error.kategori);
                    } else {
                        $('.modal-body #kategoriBerita').removeClass('is-invalid');
                        $('.errorKategoriBerita').html();
                    }

                    if (response.error.gambar) {
                        $('.modal-body #gambarBerita').addClass('is-invalid');
                        $('.errorGambarBerita').html(response.error.gambar);
                    } else {
                        $('.modal-body #gambarBerita').removeClass('is-invalid');
                        $('.errorGambarBerita').html();
                    }

                    if (response.error.caption) {
                        $('.modal-body #captionGambar').addClass('is-invalid');
                        $('.errorCaptionGambar').html(response.error.caption);
                    } else {
                        $('.modal-body #captionGambar').removeClass('is-invalid');
                        $('.errorCaptionGambar').html();
                    }

                    if (response.error.desc) {
                        $('.modal-body #deskripsiBerita').addClass('is-invalid');
                        $('.errorDeskripsiBerita').html(response.error.desc);
                    } else {
                        $('.modal-body #deskripsiBerita').removeClass('is-invalid');
                        $('.errorDeskripsiBerita').html();
                    }
                }

                if (response.success) {
                    window.location.href = ("<?= site_url('admin/news'); ?>");

                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.success
                    })
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
</script>

<script type="text/javascript">
    $('.formUpdateDataBerita').submit(function(e) {
        e.preventDefault();

        var formData = new FormData($('.formUpdateDataBerita')[0]);

        $.ajax({
            type: "post",
            url: "<?= site_url('admin/update_news'); ?>",
            contentType: false,
            processData: false,
            data: formData,
            dataType: "json",
            beforeSend: function() {
                $('.editNews').attr('disable', 'disabled');
                $('.editNews').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('.editNews').removeAttr('disable');
                $('.editNews').html('<i class="fa fa-edit"></i> Update Data');
            },
            success: function(response) {
                if (response.error) {
                    if (response.error.judul) {
                        $('.modal-body #editJudulBerita').addClass('is-invalid');
                        $('.errorEditJudulBerita').html(response.error.judul);
                    } else {
                        $('.modal-body #editJudulBerita').removeClass('is-invalid');
                        $('.errorEditJudulBerita').html();
                    }

                    if (response.error.author) {
                        $('.modal-body #editAuthor').addClass('is-invalid');
                        $('.errorEditAuthor').html(response.error.author);
                    } else {
                        $('.modal-body #editAuthor').removeClass('is-invalid');
                        $('.errorEditAuthor').html();
                    }

                    if (response.error.kategori) {
                        $('.modal-body #editKategoriBerita').addClass('is-invalid');
                        $('.errorEditKategoriBerita').html(response.error.kategori);
                    } else {
                        $('.modal-body #editKategoriBerita').removeClass('is-invalid');
                        $('.errorEditKategoriBerita').html();
                    }

                    if (response.error.gambar) {
                        $('.modal-body #editGambarBerita').addClass('is-invalid');
                        $('.errorEditGambarBerita').html(response.error.gambar);
                    } else {
                        $('.modal-body #editGambarBerita').removeClass('is-invalid');
                        $('.errorEditGambarBerita').html();
                    }

                    if (response.error.caption) {
                        $('.modal-body #editCaptionGambar').addClass('is-invalid');
                        $('.errorEditCaptionGambar').html(response.error.caption);
                    } else {
                        $('.modal-body #editCaptionGambar').removeClass('is-invalid');
                        $('.errorEditCaptionGambar').html();
                    }

                    if (response.error.desc) {
                        $('.modal-body #editDeskripsiBerita').addClass('is-invalid');
                        $('.errorEditDeskripsiBerita').html(response.error.desc);
                    } else {
                        $('.modal-body #editDeskripsiBerita').removeClass('is-invalid');
                        $('.errorEditDeskripsiBerita').html();
                    }
                }

                if (response.success) {
                    window.location.href = ("<?= site_url('admin/news'); ?>");

                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.success
                    })
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
</script>

<script type="text/javascript">
    $('#dataTable').DataTable({
        responsive: true
    });
</script>

<?= $this->endSection(); ?>