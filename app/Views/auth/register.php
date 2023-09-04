<?= $this->extend('layout/template_auth'); ?>
<?= $this->section('content'); ?>

<div class="row justify-content-center">
    <div class="col-xl-6 col-lg-6 col-md-8">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.register') ?></h1>
                            </div>
                            <form class="user" action="<?= url_to('register') ?>" method="post">
                                <?= csrf_field(); ?>
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <div class="form-group">
                                    <label for="email"><?= lang('Auth.email') ?></label>
                                    <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.email'); ?>
                                    </div>
                                    <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="username"><?= lang('Auth.username') ?></label>
                                    <input type="text" class="form-control form-control-user <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.username'); ?>
                                    </div>
                                </div>
                                <?php if (in_array('nama_lengkap', $personalFields)) : ?>
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" class="form-control form-control-user <?php if (session('errors.nama_lengkap')) : ?>is-invalid<?php endif ?>" name="nama_lengkap" placeholder="Nama Lengkap" value="<?= old('nama_lengkap') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.nama_lengkap'); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="password"><?= lang('Auth.password') ?></label>
                                        <input type="password" name="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                        <div class="invalid-feedback">
                                            <?= session('errors.password'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                                        <input type="password" name="pass_confirm" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                        <div class="invalid-feedback">
                                            <?= session('errors.pass_confirm'); ?>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    <?= lang('Auth.register') ?>
                                </button>
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <?= lang('Auth.alreadyRegistered') ?> <a href="<?= url_to('login') ?>"><?= lang('Auth.signIn') ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>