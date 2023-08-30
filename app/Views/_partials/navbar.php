<!-- TOPBAR -->
<header class="header d-flex align-items-center body-pd" id="header">
    <div class="header_toggle d-flex align-items-center me-auto"> <i class='bx bx-menu bx-x' id="header-toggle"></i>
    </div>
    <div class="user d-flex align-items-center gap-2">
        <?= session('email') ?>
    </div>
</header>

<?php $role = session()->get('role') ?>
<!-- SIDEBAR -->
<div class="l-navbar show" id="nav-bar">
    <nav class="nav d-flex flex-column justify-content-between">
        <div>
            <a href="#" class="nav_logo">
                <img src="/assets/img/logo.webp" width="20" alt="">
                <span class="nav_logo-name">LMS AMIKOM</span>
            </a>
            <?php $url = uri_string() ?>
            <div class="nav_list">
                <?php if ($role == 'admin') : ?>
                <a href="dashboard" class="nav_link <?= strpos($url, 'dashboard') != false ? 'active' : '' ?> "
                    title="Dashboard">
                    <i class='bx bx-grid-alt nav_icon'></i>
                    <span class="nav_name">Dashboard</span>
                </a>

                <a href="users" class="nav_link <?= strpos($url, 'users') != false ? 'active' : '' ?> " title="Users">
                    <i class='bx bx-user nav_icon'></i>
                    <span class="nav_name">User</span>
                </a>

                <a href="perkuliahan" class="nav_link <?= strpos($url, 'perkuliahan') != false ? 'active' : '' ?>"
                    title="Stats">
                    <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                    <span class="nav_name">Perkuliahan</span>
                </a>

                <a href="pengajaran" class="nav_link <?= strpos($url, 'pengajaran') != false ? 'active' : '' ?>"
                    title="Pengajaran">
                    <i class="fa-solid fa-chalkboard-user"></i>
                    <span class="nav_name">Pengajaran</span>
                </a>

                <a href="grup-mhs" class="nav_link <?= strpos($url, 'grup-mhs') != false ? 'active' : '' ?> "
                    title="Grup Mahasiswa">
                    <i class='bx bx-user-pin fs-5'></i>
                    <span class="nav_name">Grup Mahasiswa</span>
                </a>
                <a href="classes" class="nav_link <?= strpos($url, 'classes') != false ? 'active' : '' ?> "
                    title="Kelas">
                    <i class='bx bx-chalkboard nav_icon'></i>
                    <span class="nav_name">Kelas</span>
                </a>
                <?php endif ?>

                <?php if ($role != 'admin') : ?>
                <a href="<?= $role == 'dosen' ? '/d/classes' : '/m/classes' ?>"
                    class="nav_link <?= strpos($url, 'classes') != false ? 'active' : '' ?> " title="Kelas">
                    <i class='bx bx-chalkboard nav_icon'></i>
                    <span class="nav_name">Kelas</span>
                </a>
                <a href="<?= $role == 'dosen' ? '/d/calendar' : '/m/calendar' ?>"
                    class="nav_link <?= strpos($url, 'calendar') != false ? 'active' : '' ?>" title="Kalender">
                    <i class='bx bx-calendar nav_icon'></i>
                    <span class="nav_name">Kalender</span>
                </a>
                <?php endif ?>
            </div>
        </div>
        <a href="/logout" class="nav_link logout" title="Logout">
            <i class='bx bx-log-out nav_icon'></i>
            <span class="nav_name">Logout</span>
        </a>
    </nav>
</div>
<main id="main-body" class="vh-100 h-100 ">
    <button id="btn-back" class="btn text-secondary">
        <i class="fa-solid fa-angle-left"></i> Back
    </button>