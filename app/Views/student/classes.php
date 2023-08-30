<?php $this->extend('_partials/index') ?>


<?= $this->section('content') ?>
<h1>Kelas</h1>
<hr>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
    <?php foreach ($kelas as $k) : ?>
        <div class="col mb-4">
            <div class="card kelas h-100">
                <a href="/m/classes/<?= $k->class_id ?>" class="nav-link">
                    <img src="https://dummyimage.com/600x400/000/fff.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <small class="card-text fw-bold text-secondary">
                            <?= $k->code . ' - ' . $k->code_name . $k->std_group[0] . $k->std_group[1] ?></small>
                        <h5 class="card-title"><?= ucwords($k->subj_name) ?></h5>
                    </div>
                </a>
            </div>
        </div>
    <?php endforeach ?>

</div>

<?php $this->endSection() ?>