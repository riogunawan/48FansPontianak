    <div class="login-content">

        <div class="form-login-error">
            <h3>Invalid login</h3>
            <p>Enter <strong>demo</strong>/<strong>demo</strong> as login and password.</p>
        </div>
        <?php if ($this->session->flashdata('info')): ?>
            <?php echo "<script type='text/javascript'>alert('".$this->session->flashdata('info')."')</script>"; ?>
        <?php endif ?>
        <?php
            echo validation_errors('<p class="error">');
            if (isset($MASTER['DATA']['error'])) {
                echo '<p class="error">'.@$MASTER['DATA']['error'].'</p>';
            }
         ?>

        <?php
            $atribut = array('style' => 'padding-bottom: 10px;');
            echo form_open('login/update_password', $atribut);
            ?>

            <?php if (isset($MASTER['DATA']['email_hash'], $MASTER['DATA']['email_code'])) { ?>
            <input type="hidden" name="email_hash" value="<?= $MASTER['DATA']['email_hash'] ?>">
            <input type="hidden" name="email_code" value="<?= $MASTER['DATA']['email_code'] ?>">
            <?php } ?>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="entypo-mail"></i>
                    </div>
                    <input type="email" value="<?php echo (isset($MASTER['DATA']['email_akun'])) ? $MASTER['DATA']['email_akun'] : ''; ?>" name="email_akun" class="form-control" placeholder="ketikan e-mail anda..." data-mask="email" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="entypo-key"></i>
                    </div>
                    <input type="password" placeholder="Ketikkan password baru..." class="form-control" name="pw_akun" autofocus>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="entypo-loop"></i>
                    </div>
                    <input type="password" placeholder="Ketikkan Ulang password..." name="pw_akun_conf" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block btn-lg" name="submit">
                    Update Password
                    <i class="entypo-right-open-mini"></i>
                </button>
            </div>
        <?= form_close(); ?>

        <!-- Implemented in v1.1.4 -->
        <div class="form-group">
            <em>- atau -</em>
        </div>

        <a href="<?= site_url('login') ?>" class="link">Kembali ke Halaman Login?</a>
    </div>