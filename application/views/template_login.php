
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
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="<?= base_url() ?>assets/neon/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/neon/css/neon-core.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/neon/css/neon-theme.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/neon/css/neon-forms.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/neon/css/custom.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/neon/css/skins/red.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style1.css">

    <script src="<?= base_url() ?>assets/jquery.js"></script>

</head>
<body class="page-body login-page login-form-fall">

<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = 'http://48fansptk.coem-dev.id/';
</script>

<div class="login-container">

    <div class="login-header login-caret">

        <div class="login-content">

            <a href="<?= base_url() ?>" class="logo">
                <img src="<?= base_url() ?>assets/images/logo_48fanspontianak.jpg" width="120" alt="" />
            </a>

            <p class="description" style="font-size: 2em;"><?= @$MASTER['DATA']['SUBTITLE'] ?></p>

            <!-- progress bar indicator -->
            <div class="login-progressbar-indicator">
                <h3>48%</h3>
                <span>logging in...</span>
            </div>
        </div>

    </div>

    <div class="login-progressbar">
        <div></div>
    </div>

    <div class="login-form login-saya">

    <!-- ISI .... INI YANG DIMASUKKKAN, di kopi dimulai dari <div class="row"> -->
    <?php $this->load->view($VIEW['CONTENT'], $VIEW['DATA'], FALSE); ?>

    </div>

</div>


    <!-- Bottom scripts (common) -->
    <script src="<?= base_url() ?>assets/neon/js/gsap/TweenMax.min.js"></script>
    <script src="<?= base_url() ?>assets/neon/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="<?= base_url() ?>assets/neon/js/bootstrap.js"></script>
    <script src="<?= base_url() ?>assets/neon/js/joinable.js"></script>
    <script src="<?= base_url() ?>assets/neon/js/resizeable.js"></script>
    <script src="<?= base_url() ?>assets/neon/js/neon-api.js"></script>
    <script src="<?= base_url() ?>assets/neon/js/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>assets/neon/js/neon-login.js"></script>


    <!-- JavaScripts initializations and stuff -->
    <script src="<?= base_url() ?>assets/neon/js/neon-custom.js"></script>
</body>
</html>