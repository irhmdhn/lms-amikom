<?php
$errors = session('inputs');
?>
<?php include '_partials/header.php' ?>
<section class="login container-fluid" style="height: 100vh; background-image: url('https://pmb.amikom.ac.id/assets/images/20232024/02Slide-Section-down07.jpg')">

    <div class="row h-100 justify-content-center align-items-center">
        <div class="col col-12 col-sm-8">
            <div class="card">
                <div class="row p-4 p-lg-5">
                    <div class="col text-center">
                        <div class="row h-100 justify-content-center align-items-center">
                            <img src="assets/img/logo.webp" style="max-width: 150px;" class="w-50" alt="LOGO AMIKOM">
                            <h2 class="my-3 fw-bold">LMS AMIKOM</h2>
                            <p class="mb-4 mb-lg-0 ">Belum terdaftar? <a data-toggle="tab" href="#signup">Daftar
                                    disini</a>
                            </p>
                        </div>
                    </div>
                    <hr class="d-block d-lg-none">
                    <div class="col col-12 col-lg-7 ">
                        <div class="wrap">
                            <div class="login-wrap">
                                <div class="d-flex">
                                    <div class="w-100">
                                        <h3 class="mb-4 text-center">Gunakan AMIKOM ID Anda</h3>
                                    </div>
                                </div>
                                <?php if (session('error')) : ?>
                                    <div class="alert alert-danger alert-dismissible w-100 fade show" role="alert">
                                        <?= session('error') ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                <form action="login/auth" method="POST" class="signin-form">
                                    <div class="form-group mb-3">
                                        <label class="form-control-placeholder" for="userid-field">No Induk atau
                                            Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-user text-secondary"></i></span>
                                            <input id="userid-field" name="userid" type="text" class="form-control " placeholder="Masukan no. induk atau email anda" value="<?= old('userid') ?>" required autofocus>
                                        </div>
                                        <?php if (isset($errors['userid'])) : ?>
                                            <span class="text-danger"><?= $errors['userid'] ?></span>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-control-placeholder" for="password-field">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-lock text-secondary"></i></span>
                                            <input id="password-field" name="password" type="password" class="form-control " placeholder="Masukan password anda" required>
                                        </div>
                                        <?php if (isset($errors['password'])) : ?>
                                            <span class="text-danger"><?= $errors['password'] ?></span>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group mt-4">
                                        <button type="submit" class="form-control btn btn-primary btn-lg submit px-3">Masuk</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php include '_partials/footer.php' ?>