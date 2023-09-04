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
                Data - Data Akun
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
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Password Hash</th>
                                    <th>Gambar Profil</th>
                                    <th>Status</th>
                                    <th>Hak Akses</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($accounts as $account) : ?>
                                    <tr class="text-center align-middle">
                                        <td>
                                            <?= $i++; ?>
                                        </td>
                                        <td>
                                            <?= $account['nama_lengkap']; ?>
                                        </td>
                                        <td>
                                            <?= $account['email']; ?>
                                        </td>
                                        <td>
                                            <?= $account['username']; ?>
                                        </td>
                                        <td>
                                            <?= $account['password_hash']; ?>
                                        </td>
                                        <td>
                                            <img src="<?= base_url(); ?>/img/profiles/<?= $account['user_image']; ?>" class="img-thumbnail rounded-circle">
                                        </td>
                                        <td>
                                            <?php if ($account['active'] == 1) : ?>
                                                Aktif
                                            <?php endif; ?>

                                            <?php if ($account['active'] == null || $account['active'] == 0) : ?>
                                                Belum Aktif
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($account['group_id'] == 1) : ?>
                                                Super Admin
                                            <?php endif; ?>

                                            <?php if ($account['group_id'] == 2) : ?>
                                                Admin
                                            <?php endif; ?>

                                            <?php if ($account['group_id'] == null) : ?>
                                                Belum Ada
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-warning" id="btnEdit" data-bs-toggle="modal" data-bs-target="#editAccount" data-id="<?= $account['id']; ?>" data-nama="<?= $account['nama_lengkap']; ?>" data-email="<?= $account['email']; ?>" data-username="<?= $account['username']; ?>" data-privillege="<?= $account['group_id']; ?>" data-status="<?= $account['active']; ?>">
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
                <h5 class="modal-title" id="addModalLabel">Tambah Data Akun</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?= form_open('admin/save_akun', ['class' => 'formSimpanDataAkun']); ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namaUser" class="form-label">Nama Lengkap</label>
                            <input class="form-control" type="text" name="namaUser" id="namaUser" />
                            <div class="invalid-feedback errorNamaUser"></div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control" />
                            <div class="invalid-feedback errorUsername"></div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="emailUser" class="form-label">Email</label>
                            <input type="email" name="emailUser" id="emailUser" class="form-control" />
                            <div class="invalid-feedback errorEmailUser"></div>
                        </div>

                        <div class="form-group">
                            <label for="passUser" class="form-label">Password</label>
                            <div class="input-group toogleVisibility">
                                <div class="input-group-append">
                                    <input type="password" name="passUser" id="passUser" class="form-control" />
                                    <button class="btn btn-outline-secondary btnTooglePassword" type="button">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="invalid-feedback errorPassUser"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="statusAkunUser" class="form-label">Status Akun</label>
                        <select class="form-control" name="statusAkunUser" id="statusAkunUser">
                            <option value="1">Active</option>
                            <option value="0">Not Active</option>
                        </select>
                        <div class="invalid-feedback errorStatusAkun"></div>
                    </div>
                </div>
            </div>

            <div class="d--sm-flex modal-footer mb-4" style="justify-content: space-between;">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="fas fa-trash"></i> Batal
                </button>
                <button type="submit" class="btn btn-primary addNewAccount" name="addNewAccount">
                    <i class="fas fa-plus"></i> Tambah
                </button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<!-- Edit Data Modal -->
<div class="modal fade" id="editAccount" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Update Data Akun</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?= form_open('admin/update_akun', ['class' => 'formUpdateDataAkun']); ?>
            <?= csrf_field(); ?>
            <div class="modal-body">

                <input type="hidden" id="idUser" name="idUser" class="form-control" />

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="editNamaUser" class="form-label">Nama Lengkap</label>
                            <input type="text" name="editNamaUser" id="editNamaUser" class="form-control" readonly />
                            <div class="invalid-feedback errorEditNamaUser"></div>
                        </div>

                        <div class="form-group">
                            <label for="editUsername" class="form-label">Username</label>
                            <input type="text" name="editUsername" id="editUsername" class="form-control" readonly />
                            <div class="invalid-feedback errorEditUsername"></div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="editEmailUser" class="form-label">Email</label>
                            <input type="email" name="editEmailUser" id="editEmailUser" class="form-control" readonly />
                            <div class="invalid-feedback errorEditEmailUser"></div>
                        </div>

                        <div class="form-group">
                            <label for="editPassUser" class="form-label">Password</label>
                            <div class="input-group toogleVisibility">
                                <input type="password" name="editPassUser" id="editPassUser" class="form-control" required />
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary btnTooglePassword" type="button">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="invalid-feedback errorEditPassUser"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="editStatusAkunUser" class="form-label">Status Akun</label>
                            <select class="form-control" name="editStatusAkunUser" id="editStatusAkunUser" required>
                                <option value="1">Active</option>
                                <option value="0">Not Active</option>
                            </select>
                            <div class="invalid-feedback errorEditStatusAkun"></div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="editHakAksesUser" class="form-label">Hak Akses</label>
                            <select class="form-control" name="editHakAksesUser" id="editHakAksesUser" disabled>
                                <option value="2">Admin</option>
                                <option value="1">Super Admin</option>
                            </select>
                            <div class="invalid-feedback errorEditHakAksesAkun"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d--sm-flex modal-footer mb-4" style="justify-content: space-between;">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="fas fa-trash"></i> Batal
                </button>
                <button type="submit" class="btn btn-warning" name="editAccount">
                    <i class="fas fa-edit"></i> Edit
                </button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '#btnEdit', function() {
        $('.modal-body #idUser').val($(this).data('id'));
        $('.modal-body #editNamaUser').val($(this).data('nama'));
        $('.modal-body #editEmailUser').val($(this).data('email'));
        $('.modal-body #editUsername').val($(this).data('username'));
        $('.modal-body #editStatusAkunUser').val($(this).data('status'));
        $('.modal-body #editHakAksesUser').val($(this).data('privillege'));
    });
</script>

<script type="text/javascript">
    $('.formSimpanDataAkun').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $('.addNewAccount').attr('disable', 'disabled');
                $('.addNewAccount').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('.addNewAccount').removeAttr('disable');
                $('.addNewAccount').html('<i class="fa fa-save"></i> Simpan Data');
            },
            success: function(response) {
                if (response.error) {
                    if (response.error.nama_lengkap) {
                        $('.modal-body #namaUser').addClass('is-invalid');
                        $('.errorNamaUser').html(response.error.nama_lengkap);
                    } else {
                        $('.modal-body #namaUser').removeClass('is-invalid');
                        $('.errorNamaUser').html();
                    }

                    if (response.error.username) {
                        $('.modal-body #username').addClass('is-invalid');
                        $('.errorUsername').html(response.error.username);
                    } else {
                        $('.modal-body #username').removeClass('is-invalid');
                        $('.errorUsername').html();
                    }

                    if (response.error.email) {
                        $('.modal-body #emailUser').addClass('is-invalid');
                        $('.errorEmailUser').html(response.error.email);
                    } else {
                        $('.modal-body #emailUser').removeClass('is-invalid');
                        $('.errorEmailUser').html();
                    }

                    if (response.error.password) {
                        $('.modal-body #passUser').addClass('is-invalid');
                        $('.errorPassUser').html(response.error.password);
                    } else {
                        $('.modal-body #passUser').removeClass('is-invalid');
                        $('.errorPassUser').html();
                    }

                    if (response.error.is_active) {
                        $('.modal-body #statusAkunUser').addClass('is-invalid');
                        $('.errorStatusAkun').html(response.error.is_active);
                    } else {
                        $('.modal-body #statusAkunUser').removeClass('is-invalid');
                        $('.errorStatusAkun').html();
                    }
                }

                if (response.success) {
                    window.location.href = ("<?= site_url('admin/akun'); ?>");

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
    $('.formUpdateDataAkun').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $('.editAccount').attr('disable', 'disabled');
                $('.editAccount').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('.editAccount').removeAttr('disable');
                $('.editAccount').html('<i class="fa fa-edit"></i> Update Data');
            },
            success: function(response) {
                if (response.error) {
                    if (response.error.nama_lengkap) {
                        $('.modal-body #editNamaUser').addClass('is-invalid');
                        $('.errorEditNamaUser').html(response.error.nama_lengkap);
                    } else {
                        $('.modal-body #editNamaUser').removeClass('is-invalid');
                        $('.errorEditNamaUser').html();
                    }

                    if (response.error.username) {
                        $('.modal-body #editUsername').addClass('is-invalid');
                        $('.errorEditUsername').html(response.error.username);
                    } else {
                        $('.modal-body #editUsername').removeClass('is-invalid');
                        $('.errorEditUsername').html();
                    }

                    if (response.error.email) {
                        $('.modal-body #editEmailUser').addClass('is-invalid');
                        $('.errorEditEmailUser').html(response.error.email);
                    } else {
                        $('.modal-body #editEmailUser').removeClass('is-invalid');
                        $('.errorEditEmailUser').html();
                    }

                    if (response.error.password) {
                        $('.modal-body #editPassUser').addClass('is-invalid');
                        $('.errorEditPassUser').html(response.error.password);
                    } else {
                        $('.modal-body #editPassUser').removeClass('is-invalid');
                        $('.errorEditPassUser').html();
                    }

                    if (response.error.is_active) {
                        $('.modal-body #editStatusAkunUser').addClass('is-invalid');
                        $('.errorEditStatusAkun').html(response.error.is_active);
                    } else {
                        $('.modal-body #editStatusAkunUser').removeClass('is-invalid');
                        $('.errorEditStatusAkun').html();
                    }

                    if (response.error.hak_akses) {
                        $('.modal-body #editHakAksesUser').addClass('is-invalid');
                        $('.errorEditHakAksesUser').html(response.error.hak_akses);
                    } else {
                        $('.modal-body #editHakAksesUser').removeClass('is-invalid');
                        $('.errorEditHakAksesUser').html();
                    }
                }

                if (response.success) {
                    window.location.href = ("<?= site_url('admin/akun'); ?>");

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