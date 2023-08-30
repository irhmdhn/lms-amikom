<?php $this->extend('_partials/index') ?>

<?= $this->section('content') ?>
<h1>Daftar Mahasiswa</h1>
<hr>
<div class="table-mahasiswa rounded">
    <div class="table-responsive my-2">
        <table class="table table-hover table-sm w-100">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($mahasiswa as $mhs) : ?>
                    <tr>
                        <th><?= $no++ ?></th>
                        <td><?= $mhs->nim ?></td>
                        <td><?= $mhs->name ?></td>
                        <td><?= $mhs->email ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>