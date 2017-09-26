<div class="sidebar-menu-inner">
    <header class="logo-env">

        <!-- logo -->
        <div class="logo">
            <a href="<?= site_url('') ?>" target="_blank">
                <img src="<?php echo base_url() ?>assets/images/logo_48fanspontianak.jpg" width="120" alt="" />
            </a>
        </div>

        <!-- logo collapse icon -->
        <div class="sidebar-collapse">
            <a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                <i class="entypo-menu"></i>
            </a>
        </div>


        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                <i class="entypo-menu"></i>
            </a>
        </div>

    </header>

    <!-- MENU -->
    <ul id="main-menu" class="main-menu">
        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
        <li class="">
            <a href="<?= site_url('adm_home') ?>">
                <i class="entypo-monitor"></i>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li class="mn-editprofil">
            <a href="<?= site_url('adm_editprofil') ?>">
                <i class="fa fa-pencil"></i>
                <span class="title">&nbsp; Edit Profil</span>
            </a>
        </li>
        <li class="has-sub mn-berita">
            <a href="#">
                <i class="fa fa-newspaper-o"></i>
                <span class="title">&nbsp; Berita</span>
            </a>
            <ul class="mn-beritav">
                <li class="mn-beritaa">
                    <a href="<?= site_url('adm_berita') ?>">
                        <i class="fa fa-eye"></i>
                        <span class="title">Lihat Semua Berita</span>
                    </a>
                </li>
                <li class="mn-beritab">
                    <a href="<?= site_url('adm_berita/tambah') ?>">
                        <i class="fa fa-plus"></i>
                        <span class="title">Tambah Berita</span>
                    </a>
                </li>
            </ul>
        </li>

        <?php if ($this->session->userdata('level_akun') == 1 || $this->session->userdata('level_akun') == 2): ?>
            <li class="has-sub mn-gathering">
                <a href="#">
                    <i class="fa fa-star-o"></i>
                    <span class="title">&nbsp; Gathering</span>
                </a>
                <ul class="mn-gatheringv">
                    <li class="mn-gatheringa">
                        <a href="<?= site_url('adm_event/gathering') ?>">
                            <i class="fa fa-eye"></i>
                            <span class="title">Lihat Semua Gathering</span>
                        </a>
                    </li>
                    <li class="mn-gatheringb">
                        <a href="<?= site_url('adm_event/tambah') ?>">
                            <i class="fa fa-plus"></i>
                            <span class="title">Tambah Gathering</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="has-sub mn-event">
                <a href="#">
                    <i class="fa fa-birthday-cake"></i>
                    <span class="title">&nbsp; Events</span>
                </a>
                <ul class="mn-eventv">
                    <li class="mn-eventa">
                        <a href="<?= site_url('adm_event') ?>">
                            <i class="fa fa-eye"></i>
                            <span class="title">Lihat Semua Events</span>
                        </a>
                    </li>
                    <li class="mn-eventb">
                        <a href="<?= site_url('adm_event/tambah') ?>">
                            <i class="fa fa-plus"></i>
                            <span class="title">Tambah Events</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="has-sub mn-anggota">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span class="title">&nbsp; Anggota 48FansPotianak</span>
                </a>
                <ul class="mn-anggotav">
                    <li class="mn-anggotaa">
                        <a href="<?= site_url('adm_anggota48ptk') ?>">
                            <i class="fa fa-eye"></i>
                            <span class="title">Lihat Semua Anggota</span>
                        </a>
                    </li>
                    <li class="mn-anggotab">
                        <a href="<?= site_url('adm_anggota48ptk/tambah') ?>">
                            <i class="fa fa-plus"></i>
                            <span class="title">Tambah Anggota</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="has-sub mn-idol">
                <a href="#">
                    <i class="fa fa-female"></i>
                    <span class="title">&nbsp; Idol</span>
                </a>
                <ul class="mn-idolv">
                    <li class="mn-idola">
                        <a href="<?= site_url('adm_idol') ?>">
                            <i class="fa fa-eye"></i>
                            <span class="title">Lihat Semua Idol</span>
                        </a>
                    </li>
                    <li class="mn-idolb">
                        <a href="<?= site_url('adm_idol/tambah') ?>">
                            <i class="fa fa-plus"></i>
                            <span class="title">Tambah Idol</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mn-memesan">
                <a href="<?= site_url('adm_memesan_semua') ?>">
                    <i class="fa fa-cart-arrow-down"></i>
                    <span class="title">&nbsp; Konfirmasi Semua Pembayaran</span>
                </a>
            </li>
        <?php endif ?>

        <?php if ($this->session->userdata('level_akun') == 3): ?>
            <li class="mn-memesan">
                <a href="<?= site_url('adm_memesan') ?>">
                    <i class="fa fa-cart-plus"></i>
                    <span class="title">&nbsp; Konfirmasi Pembayaran</span>
                </a>
            </li>
        <?php endif ?>

        <?php if ($this->session->userdata('level_akun') == 1): ?>
            <li class="has-sub mn-idolg">
                <a href="#">
                    <i class="fa fa-group"></i>
                    <span class="title">&nbsp; Idol Group</span>
                </a>
                <ul class="mn-idolgv">
                    <li class="mn-idolga">
                        <a href="<?= site_url('adm_idol_group') ?>">
                            <i class="fa fa-eye"></i>
                            <span class="title">Lihat Semua Idol Group</span>
                        </a>
                    </li>
                    <li class="mn-idolgb">
                        <a href="<?= site_url('adm_idol_group/tambah') ?>">
                            <i class="fa fa-plus"></i>
                            <span class="title">Tambah Idol Group</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="has-sub mn-pengurus">
                <a href="#">
                    <i class="fa fa-user-secret"></i>
                    <span class="title">&nbsp; Keanggotaan 48FansPotianak</span>
                </a>
                <ul class="mn-pengurusv">
                    <li class="mn-pengurusa">
                        <a href="<?= site_url('adm_pengurus') ?>">
                            <i class="fa fa-eye"></i>
                            <span class="title">Lihat Semua Keanggotaan</span>
                        </a>
                    </li>
                    <li class="mn-pengurusb">
                        <a href="<?= site_url('adm_pengurus/tambah') ?>">
                            <i class="fa fa-plus"></i>
                            <span class="title">Tambah Keanggotaan</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="has-sub mn-tiket">
                <a href="#">
                    <i class="fa fa-ticket"></i>
                    <span class="title">&nbsp; Tiket Online</span>
                </a>
                <ul class="mn-tiketv">
                    <li class="mn-tiketa">
                        <a href="<?= site_url('adm_tiket') ?>">
                            <i class="fa fa-eye"></i>
                            <span class="title">Lihat Semua Tiket</span>
                        </a>
                    </li>
                    <li class="mn-tiketb">
                        <a href="<?= site_url('adm_tiket/tambah') ?>">
                            <i class="fa fa-plus"></i>
                            <span class="title">Tambah Tiket</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mn-about">
                <a href="<?= site_url('adm_edittentang') ?>">
                    <i class="fa fa-edit"></i>
                    <span class="title">&nbsp; Edit Tentang 48FansPontianak</span>
                </a>
            </li>
        <?php endif ?>

        <?php if ($this->session->userdata('level_akun') == 1 || $this->session->userdata('level_akun') == 4 ) : ?>
            <li class="mn-sejarah">
                <a href="<?= site_url('adm_sejarah') ?>">
                    <i class="fa fa-edit"></i>
                    <span class="title">&nbsp; Edit Sejarah 48FansPontianak</span>
                </a>
            </li>
        <?php endif ?>

        <li>
            <a href="<?= site_url('login/logout') ?>">
                <i class="fa fa-sign-out"></i>
                <span class="title">&nbsp; Keluar</span>
            </a>
        </li>
    </ul>
</div>