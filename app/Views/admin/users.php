<?php $this->extend('_partials/index') ?>


<?= $this->section('content') ?>
<h1>Users</h1>
<hr>
<div class="w-100 d-none d-lg-flex justify-content-end">
    <button id="col_set" class="btn btn-primary"><i class='bx bx-list-ul'></i></button>
</div>
<div class="row">
    <div id="col_mahasiswa" class="col-lg-6">
        <div class="data-mahasiswa my-3">
            <h3>Data Mahasiswa</h3>
            <div class="table-mahasiswa rounded">
                <button class="btn btn-warning btn-sm text-light">
                    <div class="d-flex align-items-center"><i class='bx bx-plus'></i>Mahasiswa
                    </div>
                </button>
                <div class="table-responsive my-2">
                    <table class="table table-hover table-sm w-100">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($students as $student) : ?>
                                <tr>
                                    <th><?= $no++ ?></th>
                                    <td><?= $student->user_id ?></td>
                                    <td><?= $student->nim ?></td>
                                    <td><?= $student->name ?></td>
                                    <td><?= $student->email ?></td>
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

    <div id="col_dosen" class="col-lg-6">
        <div class="data-dosen my-3">
            <h3>Data Dosen</h3>
            <div class="table-dosen rounded">
                <button class="btn btn-warning btn-sm text-light">
                    <div class="d-flex align-items-center"><i class='bx bx-plus'></i>Dosen
                    </div>
                </button>
                <div class="table-responsive my-2">
                    <table class="table table-hover table-sm w-100">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Menu</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($teachers as $teacher) : ?>
                                <tr>
                                    <th><?= $no++ ?></th>
                                    <td><?= $teacher->user_id ?></td>
                                    <td><?= $teacher->nik ?></td>
                                    <td><?= $teacher->name ?></td>
                                    <td><?= $teacher->email ?></td>
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

<script>
    document.getElementById('col_set').addEventListener('click', () => {
        document.getElementById('col_mahasiswa').classList.toggle('col-lg-12')
        document.getElementById('col_dosen').classList.toggle('col-lg-12')
    })
</script>

<?php $this->endSection() ?>