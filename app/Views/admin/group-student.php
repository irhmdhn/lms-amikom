<?php $this->extend('_partials/index') ?>


<?= $this->section('content') ?>
<h1>Grup Mahasiswa</h1>
<hr>

<div class="row">
    <div class="col">
        <div class="data-prodi my-3">
            <h3>Data grup mahasiswa</h3>
            <div class="table-prodi rounded">
                <div class="table-responsive my-2">
                    <table class="table table-hover table-sm w-100">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Code</th>
                                <th>Prodi</th>
                                <th>Tahun</th>
                                <th>Jumlah Mhs</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($groupCode as $row) :
                                $tahun = $row->code
                            ?>
                                <tr>
                                    <th><?= $no++ ?></th>
                                    <td><?= $row->code ?></td>
                                    <td><?= $model->major($row->major); ?></td>
                                    <td>20<?= $tahun[0] . $tahun[1] ?></td>
                                    <td><?= $model->count($row->code); ?></td>
                                    <td>
                                        <button class="btn btn-info btn-sm"><i class='bx bx-chevrons-right'></i></button>
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