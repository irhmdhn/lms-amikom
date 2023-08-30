<?php $this->extend('_partials/index') ?>


<?= $this->section('content') ?>

<h1 class="fs-2">
    <?= $kelas->code_name . $kelas->std_group[0] . $kelas->std_group[1] . ' - ' . ucwords($kelas->subj_name) ?>
    (<?= $kelas->subj_code ?>)
</h1>
<hr>
<?php if (session()->has('success')) : ?>
<?= session('success') ?>
<?php endif; ?>
<a href="/d/students/classes/<?= $kelas->std_group ?>" class="btn btn-warning"><i class="fa-solid fa-list-ul"></i>
    Mahasiswa</a>
<div class="row row-cols-1 gap-4 my-4">
    <?php $no = 1;
    foreach ($materi as $m) : ?>
    <article class="col">
        <div class="card p-3">
            <div class="card-header text-center pb-3">
                <h4 class="text-primary mb-0 mt-1 float-start"><?= $no++ ?>.</h4>
                <button type="button" class="edit btn btn-success btn-sm float-end" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop" data-idlesson="<?= $m->id ?>" data-title="<?= $m->title ?>"
                    data-description="<?= $m->description ?>" data-deadline="<?= $m->deadline ?>">
                    edit
                </button>
                <h4 class="text-primary mb-0 mt-1"><?= $m->title ?></h4>
            </div>
            <div class="card-body">
                <p><?= $m->description ?></p>

            </div>
            <?php if (!empty($m->deadline)) : $deadline = date_create($m->deadline) ?>
            <div class="card-footer">
                <div class="deadline-title">
                    <p class="m-0">Assignment</p>
                </div>
                <div class="deadline-body d-md-flex justify-content-between">
                    <p class="text-secondary">Deadline: <?= date_format($deadline, "D, d M Y | H:i"); ?></p>
                    <a href="/d/lessons/<?= $m->a_lesson_id ?>" class="btn btn-primary btn-sm ">
                        Pengumpulan >
                    </a>
                </div>
            </div>
            <?php endif ?>

        </div>
    </article>
    <?php endforeach ?>

    <article class="col-6 mx-auto">
        <div class="card p-3">
            <div class="card-header text-center">
                <h4 class="text-primary m-0">Tambah Materi</h4>
            </div>
            <div class="card-body text-center">
                <button class="btn btn-primary btn-lg" data-bs-toggle="modal"
                    data-bs-target="#modalTambah">Tambah</button>
            </div>
        </div>
    </article>


    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalTambahLabel">Tambah Materi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-tambah" action="/d/lessons" method="POST">
                    <?php csrf_field() ?>
                    <input class="d-none" hidden type="hidden" name="classId" value="<?= $kelas->class_id ?>">
                    <div class="modal-body">
                        <div class="my-2">
                            <label for="title" class="form-label">Judul materi</label>
                            <input class="form-control text-secondary" type="text" name="title">
                        </div>
                        <div class="my-2">
                            <label for="description" class="form-label">Deskripsi materi</label>
                            <textarea class="description form-control text-secondary" name="description" cols="30"
                                rows="10"></textarea>
                        </div>
                        <div class="form-check form-switch my-2">
                            <input name="tugas" class="form-check-input" type="checkbox" role="switch" id="penugasan">
                            <label class="form-check-label" for="penugasan">Tambah penugasan</label>
                        </div>
                        <div class="deadline my-2 d-none">
                            <label for="deadline" class="form-label">Deadline</label>
                            <input id="deadline" class="form-control" type="datetime-local" name="deadline">
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


    <!-- UBAH -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Materi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-update" action="act" method="POST">
                    <?php csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="modal-body">
                        <div class="my-2">
                            <label for="title" class="form-label">Judul materi</label>
                            <input class="form-control text-secondary" type="text" name="title" id="title">
                        </div>
                        <div class="my-2">
                            <label for="description" class="form-label">Deskripsi materi</label>
                            <textarea class="description form-control text-secondary" name="description"
                                id="description" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-check form-switch my-2">
                            <input name="tugas" class="form-check-input" type="checkbox" role="switch"
                                id="penugasan-update">
                            <label class="form-check-label" for="penugasan-update">Tambah penugasan</label>
                        </div>
                        <div class="deadline my-2 d-none">
                            <label for="deadline-up" class="form-label">Deadline</label>
                            <input id="deadline-up" class="form-control" type="datetime-local" name="deadline">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button id="ubah" type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$('.edit').on('click', function() {
    let id = $(this).data('idlesson')
    let title = $(this).data('title')
    let description = $(this).data('description')
    let deadline = $(this).data('deadline')

    if (deadline != '') {
        $('#penugasan-update').prop("checked", true);
        $('.deadline').removeClass('d-none')
    } else {
        $('#penugasan-update').prop("checked", false);
        $('.deadline').addClass('d-none')
    }
    $('#title').val(title)
    $('#description').val(description)
    $('#deadline-up').val(deadline)

    let action = '/d/lessons/' + id
    $('form').attr('action', action)
})

$('#penugasan, #penugasan-update').on('click', function() {
    if ($(this).is(":checked")) {
        $('.deadline').removeClass('d-none')
    } else if ($(this).is(":not(:checked)")) {
        $('.deadline').addClass('d-none')

    }
});
</script>


<?php $this->endSection() ?>