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
                Data - Data Travel
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
                                    <th>Nama</th>
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
                                <?php foreach ($travels as $travel) : ?>
                                    <tr class="text-center align-middle">
                                        <td>
                                            <?= $i++; ?>
                                        </td>
                                        <td>
                                            <?= $travel['nama']; ?>
                                        </td>
                                        <td>
                                            <?= $travel['author_name']; ?>
                                        </td>
                                        <td>
                                            <?= ucwords($travel['kategori']); ?>
                                        </td>
                                        <td class="zoom">
                                            <img src="<?= base_url(); ?>/img/travels/<?= $travel['gambar']; ?>" class="img-thumbnail">
                                        </td>
                                        <td>
                                            <?= $travel['caption_gambar']; ?>
                                        </td>
                                        <td>
                                            <?= $travel['deskripsi']; ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-warning" id="btnEdit" data-bs-toggle="modal" data-bs-target="#editTravel" data-id="<?= $travel['id']; ?>" data-nama="<?= $travel['nama']; ?>" data-author="<?= $travel['author']; ?>" data-kategori="<?= $travel['kategori']; ?>" data-caption="<?= $travel['caption_gambar']; ?>" data-desc="<?= $travel['deskripsi']; ?>">
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
                <h5 class="modal-title" id="addModalLabel">Tambah Data Wisata</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?= form_open_multipart('', ['class' => 'formSimpanDataTravel']); ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="namaTravel">Nama Destinasi Wisata</label>
                    <input class="form-control form-label" type="text" name="namaTravel" id="namaTravel" />
                    <div class="invalid-feedback errorNamaTravel"></div>
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
                        <label for="kategoriTravel" class="form-label">Kategori Wisata : </label>
                        <select class="form-select" name="kategoriTravel" id="kategoriTravel">
                            <option value="alam">Alam</option>
                            <option value="kuliner">Kuliner</option>
                            <option value="sejarah">Sejarah</option>
                        </select>
                        <div class="invalid-feedback errorKategoriTravel"></div>
                    </div>
                </div>

                <label for="gambarTravel" class="form-label">Gambar Destinasi Wisata</label>
                <div class="input-group mb-3">
                    <input class="form-control" type="file" name="gambarTravel" id="gambarTravel" />
                    <div class="invalid-feedback errorGambarTravel"></div>
                </div>

                <div class="form-group">
                    <label for="captionGambar" class="form-label">Caption Gambar</label>
                    <textarea rows="1" name="captionGambar" id="captionGambar" class="form-control"></textarea>
                    <div class="invalid-feedback errorCaptionGambar"></div>
                </div>

                <div class="form-group">
                    <label for="deskripsiTravel" class="form-label">Deskripsi Wisata</label>
                    <textarea rows="3" name="deskripsiTravel" id="deskripsiTravel" class="form-control"></textarea>
                    <div class="invalid-feedback errorDeskripsiTravel"></div>
                </div>
            </div>

            <div class="d--sm-flex modal-footer mb-4" style="justify-content: space-between;">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="fas fa-trash"></i> Batal
                </button>
                <button type="submit" class="btn btn-primary addNewTravel" name="addNewTravel">
                    <i class="fas fa-plus"></i> Tambah
                </button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<!-- Edit Data Modal -->
<div class="modal fade" id="editTravel" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Update Data Wisata</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?= form_open_multipart('', ['class' => 'formUpdateDataTravel']); ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <input type="hidden" id="idTravel" name="idTravel" class="form-control" />

                <div class="form-group">
                    <label for="editNamaTravel">Nama Destinasi Wisata</label>
                    <input class="form-control form-label" type="text" name="editNamaTravel" id="editNamaTravel" />
                    <div class="invalid-feedback errorEditNamaTravel"></div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="editAuthor" class="form-label">Author : </label>
                            <select class="form-select" name="editAuthor" id="editAuthor" required>
                                <option value="<?= user()->id; ?>"><?= user()->nama_lengkap; ?></option>
                            </select>
                            <div class="invalid-feedback errorEditAuthor"></div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="editKategoriTravel" class="form-label">Kategori Wisata : </label>
                        <select class="form-select" name="editKategoriTravel" id="editKategoriTravel">
                            <option value="alam">Alam</option>
                            <option value="kuliner">Kuliner</option>
                            <option value="sejarah">Sejarah</option>
                        </select>
                        <div class="invalid-feedback errorEditKategoriTravel"></div>
                    </div>
                </div>

                <label for="editGambarTravel" class="form-label">Gambar Destinasi Wisata</label>
                <div class="input-group mb-3">
                    <input class="form-control" type="file" name="editGambarTravel" id="editGambarTravel" />
                    <div class="invalid-feedback errorEditGambarTravel"></div>
                </div>

                <div class="form-group">
                    <label for="editCaptionGambar" class="form-label">Caption Gambar</label>
                    <textarea rows="1" name="editCaptionGambar" id="editCaptionGambar" class="form-control"></textarea>
                    <div class="invalid-feedback errorEditCaptionGambar"></div>
                </div>

                <div class="form-group">
                    <label for="editDeskripsiTravel" class="form-label">Deskripsi Wisata</label>
                    <textarea rows="3" name="editDeskripsiTravel" id="editDeskripsiTravel" class="form-control"></textarea>
                    <div class="invalid-feedback errorEditDeskripsiTravel"></div>
                </div>
            </div>

            <div class="d--sm-flex modal-footer mb-4" style="justify-content: space-between;">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="fas fa-trash"></i> Batal
                </button>
                <button type="submit" class="btn btn-warning" name="editTravel">
                    <i class="fas fa-edit"></i> Edit
                </button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '#btnEdit', function() {
        $('.modal-body #idTravel').val($(this).data('id'));
        $('.modal-body #editNamaTravel').val($(this).data('nama'));
        $('.modal-body #editKategoriTravel').val($(this).data('kategori'));
        $('.modal-body #editAuthor').val($(this).data('author'));
        document.getElementById("editCaptionGambar").value = $(this).data('caption');
        document.getElementById("editDeskripsiTravel").value = $(this).data('desc');
    });
</script>

<script type="text/javascript">
    $('.formSimpanDataTravel').submit(function(e) {
        e.preventDefault();

        var formData = new FormData($('.formSimpanDataTravel')[0]);

        $.ajax({
            type: "post",
            url: "<?= site_url('admin/save_travel'); ?>",
            data: $(this).serialize(),
            contentType: false,
            processData: false,
            data: formData,
            dataType: "json",
            beforeSend: function() {
                $('.addNewTravel').attr('disable', 'disabled');
                $('.addNewTravel').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('.addNewTravel').removeAttr('disable');
                $('.addNewTravel').html('<i class="fa fa-save"></i> Simpan Data');
            },
            success: function(response) {
                if (response.error) {
                    if (response.error.nama) {
                        $('.modal-body #namaTravel').addClass('is-invalid');
                        $('.errorNamaTravel').html(response.error.nama);
                    } else {
                        $('.modal-body #namaTravel').removeClass('is-invalid');
                        $('.errorNamaTravel').html();
                    }

                    if (response.error.author) {
                        $('.modal-body #author').addClass('is-invalid');
                        $('.errorAuthor').html(response.error.author);
                    } else {
                        $('.modal-body #author').removeClass('is-invalid');
                        $('.errorAuthor').html();
                    }

                    if (response.error.kategori) {
                        $('.modal-body #kategoriTravel').addClass('is-invalid');
                        $('.errorKategoriTravel').html(response.error.kategori);
                    } else {
                        $('.modal-body #kategoriTravel').removeClass('is-invalid');
                        $('.errorKategoriTravel').html();
                    }

                    if (response.error.gambar) {
                        $('.modal-body #gambarTravel').addClass('is-invalid');
                        $('.errorGambarTravel').html(response.error.gambar);
                    } else {
                        $('.modal-body #gambarTravel').removeClass('is-invalid');
                        $('.errorGambarTravel').html();
                    }

                    if (response.error.caption) {
                        $('.modal-body #captionGambar').addClass('is-invalid');
                        $('.errorCaptionGambar').html(response.error.caption);
                    } else {
                        $('.modal-body #captionGambar').removeClass('is-invalid');
                        $('.errorCaptionGambar').html();
                    }

                    if (response.error.desc) {
                        $('.modal-body #deskripsiTravel').addClass('is-invalid');
                        $('.errorDeskripsiTravel').html(response.error.desc);
                    } else {
                        $('.modal-body #deskripsiTravel').removeClass('is-invalid');
                        $('.errorDeskripsiTravel').html();
                    }
                }

                if (response.success) {
                    window.location.href = ("<?= site_url('admin/travel'); ?>");

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
    $('.formUpdateDataTravel').submit(function(e) {
        e.preventDefault();

        var formData = new FormData($('.formUpdateDataTravel')[0]);

        $.ajax({
            type: "post",
            url: "<?= site_url('admin/update_travel'); ?>",
            data: $(this).serialize(),
            contentType: false,
            processData: false,
            data: formData,
            dataType: "json",
            beforeSend: function() {
                $('.editTravel').attr('disable', 'disabled');
                $('.editTravel').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('.editTravel').removeAttr('disable');
                $('.editTravel').html('<i class="fa fa-edit"></i> Update Data');
            },
            success: function(response) {
                if (response.error) {
                    if (response.error.nama) {
                        $('.modal-body #editNamaTravel').addClass('is-invalid');
                        $('.errorEditNamaTravel').html(response.error.nama);
                    } else {
                        $('.modal-body #editNamaTravel').removeClass('is-invalid');
                        $('.errorEditNamaTravel').html();
                    }

                    if (response.error.author) {
                        $('.modal-body #editAuthor').addClass('is-invalid');
                        $('.errorEditAuthor').html(response.error.author);
                    } else {
                        $('.modal-body #editAuthor').removeClass('is-invalid');
                        $('.errorEditAuthor').html();
                    }

                    if (response.error.kategori) {
                        $('.modal-body #editKategoriTravel').addClass('is-invalid');
                        $('.errorEditKategoriTravel').html(response.error.kategori);
                    } else {
                        $('.modal-body #editKategoriTravel').removeClass('is-invalid');
                        $('.errorEditKategoriTravel').html();
                    }

                    if (response.error.gambar) {
                        $('.modal-body #editGambarTravel').addClass('is-invalid');
                        $('.errorEditGambarTravel').html(response.error.gambar);
                    } else {
                        $('.modal-body #editGambarTravel').removeClass('is-invalid');
                        $('.errorEditGambarTravel').html();
                    }

                    if (response.error.caption) {
                        $('.modal-body #editCaptionGambar').addClass('is-invalid');
                        $('.errorEditCaptionGambar').html(response.error.caption);
                    } else {
                        $('.modal-body #editCaptionGambar').removeClass('is-invalid');
                        $('.errorEditCaptionGambar').html();
                    }

                    if (response.error.desc) {
                        $('.modal-body #editDeskripsiTravel').addClass('is-invalid');
                        $('.errorEditDeskripsiTravel').html(response.error.desc);
                    } else {
                        $('.modal-body #editDeskripsiTravel').removeClass('is-invalid');
                        $('.errorEditDeskripsiTravel').html();
                    }
                }

                if (response.success) {
                    window.location.href = ("<?= site_url('admin/travel'); ?>");

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