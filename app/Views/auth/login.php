<?= $this->extend('layout/template_auth'); ?>
<?= $this->section('content'); ?>

<!-- Outer Row -->
<div class="row justify-content-center">
    <div class="col-xl-6 col-lg-6 col-md-8">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.loginTitle') ?></h1>
                            </div>

                            <form class="user" action="<?= url_to('login') ?>" method="post">
                                <?= csrf_field(); ?>
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <?php if ($config->validFields === ['email']) : ?>
                                    <div class="form-group">
                                        <label for="login"><?= lang('Auth.email') ?></label>
                                        <input type="email" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                    </div>

                                <?php else : ?>
                                    <div class="form-group">
                                        <label for="login"><?= lang('Auth.emailOrUsername') ?></label>
                                        <input type="text" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="form-group">
                                    <label for="password"><?= lang('Auth.password') ?></label>
                                    <input type="password" name="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.password') ?>
                                    </div>
                                </div>

                                <?php if ($config->allowRemembering) : ?>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                            <?= lang('Auth.rememberMe') ?>
                                        </label>
                                    </div>
                                <?php endif; ?>

                                <br>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    <?= lang('Auth.loginAction') ?>
                                </button>
                                <hr>
                            </form>

                            <?php if ($config->allowRegistration) : ?>
                                <div class="text-center">
                                    <a href="<?= url_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a>
                                </div>
                            <?php endif; ?>

                            <br>

                            <?php if ($config->activeResetter) : ?>
                                <div class="text-center">
                                    <a href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>