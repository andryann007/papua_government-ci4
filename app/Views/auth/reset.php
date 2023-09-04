<?= $this->extend('layout/template_auth'); ?>
<?= $this->section('content'); ?>

<div class="row justify-content-center">
    <div class="col-xl-6 col-lg-6 col-md-8">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row" style="align-items: center;">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-2"><?= lang('Auth.resetYourPassword') ?></h1>
                                <p class="mb-4"><?= lang('Auth.enterCodeEmailPassword') ?></p>
                            </div>
                            <form class="user" action="<?= url_to('reset-password') ?>" method="post">
                                <?= csrf_field(); ?>
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <div class="form-group">
                                    <label for="token"><?= lang('Auth.token') ?></label>
                                    <input type="text" class="form-control form-control-user <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>" name="token" placeholder="<?= lang('Auth.token') ?>" value="<?= old('token', $token ?? '') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.token') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email"><?= lang('Auth.email') ?></label>
                                    <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.email') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password"><?= lang('Auth.newPassword') ?></label>
                                    <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password">
                                    <div class="invalid-feedback">
                                        <?= session('errors.password') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pass_confirm"><?= lang('Auth.newPasswordRepeat') ?></label>
                                    <input type="password" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm">
                                    <div class="invalid-feedback">
                                        <?= session('errors.pass_confirm') ?>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    <?= lang('Auth.resetPassword') ?>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>