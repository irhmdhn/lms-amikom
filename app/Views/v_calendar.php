<?php $this->extend('_partials/index') ?>

<?= $this->section('content') ?>
<h1>Kalender</h1>
<hr>
<figure class="text-center">
    <h5>Kalender Akademik AMIKOM 2023-2024</h5>
    <img src="/assets/img/kalender2023-2024.png" alt="kalender2023-2024" class="img-fluid rounded w-75">
    <figcaption class="mt-2">
        Download Kalender
        <br>
        <a target="_blank" href="https://drive.google.com/file/d/1qb-cDuT4BStiSWPnJiBS7wW363P_O3bc/view" class="btn btn-danger">
            .pdf
        </a>
        <!-- <form action="/download/calendar" method="POST"> -->
        <a href="/download/calendar" class="btn btn-primary">
            .png
        </a>
        <!-- </form> -->
    </figcaption>
</figure>
<?= $this->endSection() ?>