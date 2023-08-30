<?php $this->extend('_partials/index') ?>


<?= $this->section('content') ?>
<h1>Kelas</h1>
<hr>
<div class="row">
    <div class="col">
        <div class="data-kelas my-3">
            <h3>Data Kelas</h3>
            <div class="table-kelas rounded">
                <button class="btn btn-warning btn-sm text-light" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    <div class="d-flex align-items-center"><i class='bx bx-plus'></i>Kelas</div>
                </button>

                <div class="table-responsive my-2">
                    <table class="table table-hover table-sm w-100">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Kode Mk</th>
                                <th>Mata kuliah</th>
                                <th>NIK</th>
                                <th>Dosen</th>
                                <th>Grup</th>
                                <th>Kode</th>
                                <th>Jumlah</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($kelas as $k) : ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <td><?= $k->code ?></td>
                                <td><?= ucwords($k->subj_name) ?></td>
                                <td><?= $k->nik ?></td>
                                <td><?= $k->name ?></td>
                                <td><?= $k->std_group ?></td>
                                <td><?= $k->code_name . $k->std_group[0] . $k->std_group[1] ?></td>
                                <td><?= $count->count($k->std_group); ?> Mhs</td>
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
<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTambahLabel">Tambah kelas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-tambah" action="" method="POST">
                <?php csrf_field() ?>
                <div class="modal-body">
                    <div class="row ">
                        <div class="dosen col w-100 my-2 px-2">
                            <label for="dosen" class="form-label">Pengajaran</label><br>
                            <select id="dosen" name="dosen" class="form-select" aria-label="Default select example">
                                <option value="" selected>Pilih Pengajar</option>
                                <?php foreach ($teaching as $t) : ?>
                                <option value="<?= $t->id ?>"><?= $t->subj_code?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="matkul col w-100 my-2 px-2">
                            <label for="matkul" class="form-label">Kel. Mahasiswa</label><br>
                            <select id="matkul" name="matkul" class="form-select" aria-label="Default select example">
                                <option value="" selected>Pilih Grup</option>
                                <?php foreach ($group as $g) : ?>
                                <option value="<?= $g->id ?>"><?= $g->code ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button id="tambah" type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->endSection() ?>