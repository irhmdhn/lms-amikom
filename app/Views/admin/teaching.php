<?php $this->extend('_partials/index') ?>


<?= $this->section('content') ?>
<h1>Pengajaran</h1>
<hr>
<?php if (session()->has('status')) : ?>
<?= session('status') ?>
<?php endif; ?>
<div class="row">
    <div class="col">
        <div class="data-pengajaran my-3">
            <h3>Data Pengajaran</h3>
            <div class="table-pengajaran rounded">
                <button class="btn btn-warning btn-sm text-light" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    <div class="d-flex align-items-center"><i class='bx bx-plus'></i>Pengajaran</div>
                </button>

                <div class="table-responsive my-2">
                    <table class="table table-hover table-sm w-100">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Dosen</th>
                                <th>Kode</th>
                                <th>Mata Kuliah</th>
                                <th>Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pengajaran as $p) : ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <td><?= $p->nik ?></td>
                                <td><?= $p->name ?></td>
                                <td><?= $p->code ?></td>
                                <td><?= ucwords($p->subj_name) ?></td>
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
                <h1 class="modal-title fs-5" id="modalTambahLabel">Tambah pengajaaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-tambah" action="" method="POST">
                <?php csrf_field() ?>
                <div class="modal-body">
                    <div class="row ">
                        <div class="dosen col w-100 my-2 px-2">
                            <label for="dosen" class="form-label">Dosen</label><br>
                            <select id="dosen" name="dosen" class="form-select" aria-label="Default select example">
                                <option value="" selected>Pilih Dosen</option>
                                <?php foreach ($dosen as $d) : ?>
                                <option value="<?= $d->id ?>"><?= $d->nik . ' - ' . $d->name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="matkul col w-100 my-2 px-2">
                            <label for="matkul" class="form-label">Mata kuliah</label><br>
                            <select id="matkul" name="matkul" class="form-select" aria-label="Default select example">
                                <option value="" selected>Pilih Mata Kuliah</option>
                                <?php foreach ($matkul as $m) : ?>
                                <option value="<?= $m->code ?>"><?= $m->code . ' - ' . ucwords($m->subj_name) ?>
                                </option>
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