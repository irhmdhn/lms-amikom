<div class="data-<?= $name ?> my-3">
    <h3><?= $table_title ?></h3>
    <div class="table-<?= $name ?> rounded">
        <button class="btn btn-warning btn-sm text-light">
            <div class="d-flex align-items-center"><i class='bx bx-plus'></i><?= $table_title ?>
            </div>
        </button>
        <div class="table-responsive my-2">
            <table class="table table-hover table-sm w-100">
                <thead class="table-primary">
                    <?= $this->renderSection('table-head') ?>
                </thead>
                <tbody>
                    <?= $this->renderSection('table-body') ?>
                </tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>