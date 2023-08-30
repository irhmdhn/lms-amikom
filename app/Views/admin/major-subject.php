<?php $this->extend('_partials/index') ?>


<?= $this->section('content') ?>
<h1>Program Studi</h1>
<hr>
<div class="row">
    <div class="col-lg-6">
        <div class="data-prodi my-3">
            <h3>Data Prodi</h3>
            <div class="table-prodi rounded">
                <button class="btn btn-warning btn-sm text-light">
                    <div class="d-flex align-items-center"><i class='bx bx-plus'></i>Prodi
                    </div>
                </button>
                <div class="table-responsive my-2">
                    <table class="table table-hover table-sm w-100">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Code</th>
                                <th>Nama</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($prodi as $p) : ?>
                                <tr>
                                    <th><?= $no++ ?></th>
                                    <td><?= $p->code ?></td>
                                    <td><?= $p->maj_name ?></td>
                                    <td>
                                        <button class="btn btn-success btn-sm"><i class='bx bxs-edit'></i></button>
                                        <button class="btn btn-outline-danger btn-sm"><i class='bx bxs-trash'></i></button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="data-matkul my-3">
            <h3>Data Mata Kuliah</h3>
            <div class="table-matkul rounded">
                <button class="btn btn-warning btn-sm text-light">
                    <div class="d-flex align-items-center"><i class='bx bx-plus'></i>Mata Kuliah
                    </div>
                </button>
                <div class="table-responsive my-2">
                    <table class="table table-hover table-sm w-100">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Code</th>
                                <th>Nama</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($matkul as $m) : ?>
                                <tr>
                                    <th><?= $no++ ?></th>
                                    <td><?= $m->code ?></td>
                                    <td><?= $m->subj_name ?></td>
                                    <td>
                                        <button class="btn btn-success btn-sm"><i class='bx bxs-edit'></i></button>
                                        <button class="btn btn-outline-danger btn-sm"><i class='bx bxs-trash'></i></button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $this->endSection() ?>