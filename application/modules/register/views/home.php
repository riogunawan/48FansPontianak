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

    <link rel="stylesheet" href="<?= base_url() ?>assets/neon/js/select2/select2.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/neon/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/dropzone-min.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style2.css">

    <?= @$MASTER['CSS'] ?>
    <script src="<?= base_url() ?>assets/jquery.js"></script>


</head>
<body class="page-body login-page login-form-fall">
<?php if ($this->session->flashdata('info')): ?>
    <?php echo "<script type='text/javascript'>alert('".$this->session->flashdata('info')."')</script>"; ?>
<?php endif ?>
<div class="login-container">

    <div class="login-header login-caret">

        <div class="login-content">

            <a href="<?= base_url() ?>" class="logo" target="_blank">
                <img src="<?= base_url() ?>assets/images/logo_48fanspontianak.jpg" width="120" alt="" />
            </a>

            <p class="description"><?= @$MASTER['DATA']['SUBTITLE'] ?></p>

        </div>

    </div>

    <div class="login-progressbar">
        <div></div>
    </div>

    <div class="login-form register">

        <div class="login-content">

            <div class="form-login-error">
                <h3>Invalid login</h3>
                <p>Enter <strong>demo</strong>/<strong>demo</strong> as login and password.</p>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-primary" data-collapsed="0">

                        <div class="panel-heading">
                            <div class="panel-title">
                                Formulir Pendaftaran
                            </div>

                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                            </div>
                        </div>

                        <div class="panel-body">

                            <?php
                                $atribut = array('class' => 'form-horizontal form-groups-bordered');
                                echo form_open_multipart('register/add', $atribut);
                             ?>
                                <?php
                                    if($this->session->flashdata('notif')){
                                        echo $this->session->flashdata('notif');
                                    }
                                ?>
                                <?= validation_errors('<p style="color: #fff">*', '</p>'); ?>
                                <div class="form-group">
                                    <label for="username_akun" class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="username_akun" placeholder="ex: 48fanspontianak" name="username_akun" value="<?= set_value('username_akun'); ?>" required autofocus>
                                    </div>

                                    <label for="nama_akun" class="col-sm-2 control-label">Nama Lengkap</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="nama_akun" placeholder="ex: 48 Fans Pontianak" name="nama_akun" value="<?= set_value('nama_akun'); ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pw_akun" class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" id="pw_akun" placeholder="ketik password anda..." name="pw_akun" required>
                                        <label for="pw_akun" class="control-label">Password minimal 8 karakter</label>
                                    </div>

                                    <label for="pw_confirm_akun" class="col-sm-2 control-label">Re-type Password</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="password" id="pw_confirm_akun" name="pw_confirm_akun" placeholder="Ketik ulang Password..." required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Nama Idol</label>
                                    <div class="col-md-4">
                                        <select class="select2" name="id_idol" data-allow-clear="true" data-placeholder="Pilih satu idol...">
                                            <option></option>
                                            <optgroup label="Idol">
                                                <?php foreach (@$MASTER['DATA']['drop_idol']->result() as $row) {
                                                    echo "<option value='$row->id_idol'>$row->nama_idol</option>";
                                                } ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <label for="email_akun" class="col-sm-2 control-label">E-Mail</label>
                                    <div class="col-sm-4">
                                        <input type="email" class="form-control" id="email_akun" placeholder="ex: 48fansptk@gmail.com" name="email_akun" value="<?= set_value('email_akun'); ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-2 control-label">Foto</label>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="form-control dropzone" id="my-dropzone" style="width: 200px; color: #555; height: auto;"></div>
                                        <?php
                                            $hidden2_attr = array(
                                                'type' => 'hidden',
                                                'name' => 'foto_akun',
                                                'id' => 'foto_akun',
                                                'class' => 'form-control'
                                                            );
                                            echo form_input($hidden2_attr);
                                         ?>
                                    </div>
                                    <!-- <label class="col-xs-12 col-sm-2 control-label">Foto</label>
                                    <div class="col-xs-12 col-sm-4">
                                        <input name="foto_akun" type="file" class="form-control inline btn btn-primary" data-label="<i class='glyphicon glyphicon-file'></i> Browse">
                                    </div> -->
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="row">

                                        <div class="col-xs-12 col-sm-5"><?= @$MASTER['DATA']['img'] ?></div>
                                        <div class="col-xs-12 col-sm-7">
                                            <label class="col-sm-12 control-label">Captcha</label>
                                            <div class="col-sm-12"><input type="text" class="form-control" name="secutity_code" placeholder="Ketikan captcha yang terlihat..." required></div>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-default btn-lg" name="submit" value="submit">
                                        <center><i class="entypo-rocket"></i> Register &nbsp;</center>
                                    </button>

                                </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Implemented in v1.1.4 -->
            <div class="form-group">
                <em>- atau -</em>
            </div>

            <a href="<?= site_url('login') ?>" class="link">Sudah punya akun?</a>

        </div>

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

    <script src="<?= base_url() ?>assets/neon/js/select2/select2.min.js"></script>
    <script src="<?= base_url() ?>assets/js/dropzone-min.js"></script>

    <!-- JavaScripts initializations and stuff -->
    <script src="<?= base_url() ?>assets/neon/js/neon-custom.js"></script>

    <?= @$MASTER['JS'] ?>

    <script>
        Dropzone.autoDiscover = false;
            var myDropzone = new Dropzone("#my-dropzone",{
                url: "<?= site_url("register/upload"); ?>",
                acceptedFiles: "image/*",
                addRemoveLinks: true,
                removefile: function(file){
                    var name = file.name;
                    $.ajax({
                        type: "post",
                        url: "<?= site_url("register/remove"); ?>",
                        data: {file: name},
                        dataType: 'html'
                    });
                    var previewElement;
                    return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
                },
                success: function( file, response ){
                       var filename=myDropzone.files[0].name;
                       $('#foto_akun').val(filename);
                },
            });
    </script>
</body>
</html>