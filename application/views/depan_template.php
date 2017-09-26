<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="48 Fans Pontianak - Fanbase 48 Group Regional Pontianak" />
        <meta name="keywords" content="idol,48group,sing,dance,school,group,48family,jkt48,akb48,ske48,nmb48,ngt48,snh48,bnk48,hkt48,ptk48,stu48,nogizaka46,keyakizaka46,pontianak,indonesia,jepang" />
        <meta name="author" content="ThemeTheFlash" />
        <!-- Page Title -->
        <title><?= @$MASTER['DATA']['TITLE'] ?> - <?= @$MASTER['DATA']['SUBTITLE'] ?></title>
        <!-- Favicon and Touch Icons -->
        <link href="<?php echo base_url() ?>assets/uploads/<?= @$MASTER['DATA']['MenuAbout']->foto_about; ?>" rel="shortcut icon" type="image/jpg">
        <link href="<?php echo base_url() ?>assets/uploads/<?= @$MASTER['DATA']['MenuAbout']->foto_about; ?>" rel="apple-touch-icon" type="image/jpg">
        <link href="<?php echo base_url() ?>assets/uploads/<?= @$MASTER['DATA']['MenuAbout']->foto_about; ?>" rel="apple-touch-icon" type="image/jpg" sizes="72x72">
        <link href="<?php echo base_url() ?>assets/uploads/<?= @$MASTER['DATA']['MenuAbout']->foto_about; ?>" rel="apple-touch-icon" type="image/jpg" sizes="114x114">
        <link href="<?php echo base_url() ?>assets/uploads/<?= @$MASTER['DATA']['MenuAbout']->foto_about; ?>" rel="apple-touch-icon" type="image/jpg" sizes="144x144">
        <!-- Stylesheet -->
        <!-- CSS | Dark Layout -->
        <link href="<?php echo base_url() ?>assets/charityfund/css/style-main-dark.css" rel="stylesheet" type="text/css" id="link-bg-color">
        <link href="<?php echo base_url() ?>assets/charityfund/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets/charityfund/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets/charityfund/css/animate.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() ?>assets/charityfund/css/css-plugin-collections.css" rel="stylesheet"/>
        <!-- CSS | menuzord megamenu skins-->
        <link id="menuzord-menu-skins" href="<?php echo base_url() ?>assets/charityfund/css/menuzord-skins/menuzord-boxed.css" rel="stylesheet"/>
        <!-- CSS | Main style file -->
        <link href="<?php echo base_url() ?>assets/charityfund/css/style-main.css" rel="stylesheet" type="text/css">
        <!-- CSS | Preloader Styles -->
        <link href="<?php echo base_url() ?>assets/charityfund/css/preloader.css" rel="stylesheet" type="text/css">
        <!-- CSS | Custom Margin Padding Collection -->
        <link href="<?php echo base_url() ?>assets/charityfund/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
        <!-- CSS | Responsive media queries -->
        <link href="<?php echo base_url() ?>assets/charityfund/css/responsive.css" rel="stylesheet" type="text/css">
        <!-- CSS | Theme Color -->
        <link href="<?php echo base_url() ?>assets/charityfund/css/colors/theme-skin-red.css" rel="stylesheet" type="text/css">
        <?php
          echo @$MASTER['CSS'];
        ?>
        <link href="<?php echo base_url() ?>assets/css/style1.css" rel="stylesheet" type="text/css">

        <!-- external javascripts -->
        <script src="<?php echo base_url() ?>assets/jquery.js"></script>
        <script src="<?php echo base_url() ?>assets/charityfund/js/jquery-ui.min.js"></script>
        <script src="<?php echo base_url() ?>assets/charityfund/js/bootstrap.min.js"></script>
        <!-- JS | jquery plugin collection for this theme -->
        <script src="<?php echo base_url() ?>assets/charityfund/js/jquery-plugin-collection.js"></script>

    </head>
    <body class="has-side-panel side-panel-right fullwidth-page side-push-panel">
        <div class="body-overlay"></div>
        <div id="wrapper" class="clearfix">
        <!-- PRELOADER -->
        <div id="preloader">
            <div id="spinner">
                <div class="preloader-loading-wrapper">
                    <div class="cssload-loading"><i></i><i></i></div>
                </div>
            </div>
            <div id="disable-preloader" class="btn btn-default btn-sm">Non-Aktifkan Preloader</div>
        </div>
        <!-- HEADER NAVIGASI-->
        <header class="header">
            <?php $this->load->view('menu'); ?>
        </header>
        <!-- Start main-content -->
        <div class="main-content">
            <?php $this->load->view($VIEW['CONTENT'], $VIEW['DATA'], FALSE); ?>
        </div>
        <!-- end main-content -->
        <!-- Footer -->
        <?php $this->load->view('footer'); ?>
        <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
        </div>
        <!-- end wrapper -->

        <!-- Footer Scripts -->
        <!-- JS | Custom script for all pages -->
        <script src="<?php echo base_url() ?>assets/charityfund/js/custom.js"></script>
        <?php
            echo @$MASTER['JS'];
        ?>
    </body>
</html>