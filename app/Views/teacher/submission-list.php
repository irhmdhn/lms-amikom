<?php $this->extend('_partials/index') ?>


<?= $this->section('content') ?>
<h1>Penugasan</h1>
<hr>
<div class="assignment-list">
    <div class="ket text-secondary">
        <p class="m-0">Sudah Submit: <?= $submitter ?></p>
        <p>Belum Submit: <?= count($mahasiswa) - $submitter ?></p>
    </div>
    <div class="submitted-table table-responsive">
        <table class="table table-hover">
            <tr>
                <td>No</td>
                <td>NIM</td>
                <td>Nama</td>
                <td>Submit</td>
                <td>Waktu</td>
                <td>File</td>
            </tr>
            <?php
            $no = 1;
            foreach ($mahasiswa as $mhs) : ?>
            <?php
                $model = model('SubmitModel');
                $model->submitted($asId, $mhs->id) ? $submit = true : $submit = false;
                $getSubmit = $model->getSubmit($asId, $mhs->id);
                $subTime = isset($getSubmit) ? $getSubmit['updated_at'] : '';
                $subFile = isset($getSubmit) ? $getSubmit['file'] : '';
                ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $mhs->nim ?></td>
                <td><?= $mhs->name ?></td>
                <td>
                    <button class="btn btn-sm btn-<?= $submit ? 'success' : 'danger' ?>"><i
                            class="fa fa-<?= $submit ? 'check' : 'xmark' ?>"></i></button>
                </td>
                <td>
                    <?= $subTime ?>
                </td>
                <td>
                    <?php if ($submit) : ?>
                    <a href="/download/submit/<?= $subFile ?>" class="btn btn-sm btn-outline-primary px-3"><i
                            class="fa fa-download"></i></a>
                    <?php endif ?>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>

</div>

<?php $this->endSection() ?>