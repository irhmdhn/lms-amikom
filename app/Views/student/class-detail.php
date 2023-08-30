    <?php



    $this->extend('_partials/index') ?>


    <?= $this->section('content') ?>

    <h1 class="fs-2">
        <?= $kelas->code_name . $kelas->std_group[0] . $kelas->std_group[1] . ' - ' . ucwords($kelas->subj_name) ?>
        (<?= $kelas->subj_code ?>)
    </h1>
    <?php if (session()->has('status')) : ?>
    <?= session('status') ?>
    <?php endif; ?>
    <div class="row row-cols-1 gap-4 my-5">
        <?php $no = 1;
        foreach ($materi as $m) : ?>
        <article class="col">
            <div class="card p-3">
                <div class="card-header text-center pb-3">
                    <h4 class="text-primary mb-0 mt-1 float-start"><?= $no++ ?>.</h4>
                    <h4 class="text-primary mb-0 mt-1"><?= $m->title ?></h4>
                </div>
                <div class="card-body">
                    <p><?= $m->description ?></p>
                </div>
                <?php $file = '';
                    if (!empty($m->deadline)) : $deadline = date_create($m->deadline) ?>
                <?php
                        $model = model('SubmitModel')->isSubmit(session('id'), $m->a_lesson_id);
                        $model ? ($submit = true) : $submit = false;
                        $submit ? $subTime = date_create($model[0]->updated_at) : '';
                        $submit ? $file = $model[0]->file : '';
                        $submit ? $subId = $model[0]->id : '';

                        ?>
                <div class="card-footer">
                    <div class="deadline-title mt-4">
                        <h4>Submission</h4>
                    </div>
                    <div class="deadline-footer">

                        <table class="table">
                            <tr>
                                <th>
                                    Status
                                </th>
                                <td>
                                    <p class="m-0 text-<?= $submit ? 'success' : 'danger' ?>">
                                        <?= $submit ? 'Sudah submit 👍' : 'Belum submit 🙄' ?>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Deadline
                                </th>
                                <td>
                                    <?= date_format($deadline, "D, d M Y | H:i"); ?>
                                </td>
                            </tr>
                            <?php if ($submit) : ?>
                            <tr>
                                <th>
                                    Waktu Submit
                                </th>
                                <td>
                                    <?= date_format($subTime, "D, d M Y | H:i:s") ?>
                                </td>
                            </tr>
                            <?php endif ?>
                            <tr>
                                <th>
                                    Submit
                                </th>
                                <td>
                                    <button type="button" class="submit btn btn-<?= $submit ? "outline-" : "" ?>primary"
                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                        data-subid="<?= $submit ? $subId : '' ?>"
                                        data-file="<?= $submit ? $file : '' ?>" data-asid="<?= $m->a_lesson_id ?>">
                                        <?= $submit ? "Ubah" : "Submit" ?>
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <?php endif ?>
            </div>
        </article>

        <?php endforeach ?>


    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">

                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-update" action="/m/classes" method="POST" enctype="multipart/form-data">
                    <?php csrf_field() ?>
                    <input type="hidden" name='subId' class="file-update d-none" hidden>
                    <input class="assignment_id d-none" type="hidden" hidden name="as_id">
                    <div class="modal-body">
                        <div class="download-file">

                        </div>
                        <div class="my-2">
                            <label for="file" class="form-label">File <small class="text-secondary">(hanya
                                    ekstensi file
                                    *.pdf yang diterima)</small></label>
                            <input class="form-control text-secondary" type="file" name="file" id="file" accept="pdf">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="batal btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button id="submit" type="submit" class="btn btn-primary"><i
                                class="fa-solid fa-arrow-up-from-bracket me-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
$('.submit').on('click', function() {
    $('.assignment_id').val($(this).data('asid'))
    let subId = $(this).data('subid')
    if (subId) {
        $('.modal-title').text('Ubah file tugas')
        $('#submit').text('Ubah')
        $('.file-update').val(subId)
        $('form').attr('action', '/m/classes/' + subId)
        let put = '<input class="method" type="hidden" name="_method" value="PUT">'
        let download =
            '<a href="/download/submit/<?= $file ?>" class="btn-download btn btn-danger btn-sm my-2"><i class="fa fa-download"></i>File submit</a>'
        $('form').append(put)
        $('.download-file').append(download)
        $('.btn-close,.batal').on('click', function() {
            $('input.method,.btn-download').remove()
        })
    } else {
        $('.modal-title').text('Submit file tugas')
        $('form').attr('action', '/m/classes')
        $('#submit').text('Submit')
    }
})
    </script>
    <?= $this->endSection() ?>