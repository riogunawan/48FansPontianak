<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="48 Fans Pontianak Admin Panel" />
    <meta name="author" content="ThemeTheFlash" />

    <link rel="icon" href="<?= base_url() ?>assets/images/logo_48fanspontianak.jpg">

    <title><?= @$MASTER['DATA']['TITLE'] ?></title>

    <link rel="stylesheet" href="<?= base_url() ?>assets/neon/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/neon/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/neon/css/font-icons/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="<?= base_url() ?>assets/neon/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/neon/css/neon-core.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/neon/css/neon-theme.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/neon/css/neon-forms.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/neon/css/custom.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/neon/css/skins/red.css">

    <script src="<?= base_url() ?>assets/neon/js/jquery-1.11.3.min.js"></script>

    <?php
        echo @$MASTER['CSS'];
    ?>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style-admin.css">

</head>
<body class="page-body page-fade">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

    <!-- NAVIGASI KIRI -->
    <div class="sidebar-menu">
        <?= $this->load->view('menu_left'); ?>
    </div>

    <div class="main-content">
        <img src="<?= base_url('assets/images/logo_48fanspontianak.jpg') ?>" alt="" class="bg">
        <!-- NAVIGASI ATAS -->
        <div class="row">
            <!-- Profile Info and Notifications -->
            <div class="col-md-6 col-sm-8 clearfix">

                <ul class="user-info pull-left pull-none-xsm">

                    <!-- Profile Info -->
                    <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?= base_url() ?>assets/uploads/<?= $this->session->userdata('foto_akun'); ?>" alt="" class="img-circle" width="50" height="50"/>
                            <?= $this->session->userdata('nama_akun'); ?> |
                            <?php
                                echo "<b>".$this->session->userdata('keanggotaan')." 48 Fans Pontianak</b>";
                             ?>
                        </a>
                        <ul class="dropdown-menu">

                            <!-- Reverse Caret -->
                            <li class="caret"></li>

                            <!-- Profile sub-links -->
                            <li>
                                <a href="<?= site_url('adm_editprofil') ?>">
                                    <i class="entypo-user"></i>
                                    Edit Profile
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>

            </div>


            <!-- Raw Links -->
            <div class="col-md-6 col-sm-4 clearfix hidden-xs">

                <ul class="list-inline links-list pull-right">
                    <li>
                        <a href="<?= site_url('login/logout') ?>">
                            Logout <i class="entypo-logout right"></i>
                        </a>
                    </li>
                </ul>

            </div>
        </div>

        <hr />

        <!-- ISI .... INI YANG DIMASUKKKAN, di kopi dimulai dari <div class="row"> -->
        <?php $this->load->view($VIEW['CONTENT'], $VIEW['DATA'], FALSE); ?>


        <!-- Footer -->
        <footer class="main">

            &copy; 2017 <strong>48 Fans Pontianak</strong> by <a href="http://www.instagram.com/riogunawan_ja" target="_blank">Rio</a>

        </footer>
    </div>

</div>

    <!-- Bottom scripts (common) -->
    <script src="<?= base_url() ?>assets/neon/js/gsap/TweenMax.min.js"></script>
    <script src="<?= base_url() ?>assets/neon/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="<?= base_url() ?>assets/neon/js/bootstrap.js"></script>
    <script src="<?= base_url() ?>assets/neon/js/joinable.js"></script>
    <script src="<?= base_url() ?>assets/neon/js/resizeable.js"></script>
    <script src="<?= base_url() ?>assets/neon/js/neon-api.js"></script>

    <!-- Imported scripts on this page -->
    <script src="<?= base_url() ?>assets/neon/js/jquery.sparkline.min.js"></script>
    <script src="<?= base_url() ?>assets/neon/js/raphael-min.js"></script>
    <script src="<?= base_url() ?>assets/neon/js/morris.min.js"></script>
    <script src="<?= base_url() ?>assets/neon/js/toastr.js"></script>

    <!-- JavaScripts initializations and stuff -->
    <script src="<?= base_url() ?>assets/neon/js/neon-custom.js"></script>

    <?php
        echo @$MASTER['JS'];
    ?>
</body>
</html>