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
            echo form_open('login/reset_password', $atribut); ?>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="entypo-mail"></i>
                    </div>

                    <input type="email" class="form-control" id="email" placeholder="ketikan e-mail anda..." data-mask="email" autocomplete="off" value="<?= set_value('email_akun'); ?>" name="email_akun" autofocus/>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info btn-block btn-lg" name="submit">
                    Reset Password
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