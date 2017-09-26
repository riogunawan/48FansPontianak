<img src="<?= base_url() ?>assets/images/1500x500.jpg" alt="" class="bg-login">

    <div class="login-content">

        <div class="form-login-error">
            <h3>Invalid login</h3>
            <p>Enter <strong>demo</strong>/<strong>demo</strong> as login and password.</p>
        </div>
        <?php if ($this->session->flashdata('info')): ?>
            <?php echo "<script type='text/javascript'>alert('".$this->session->flashdata('info')."')</script>"; ?>
        <?php endif ?>

        <?php
            // $atribut = array('role' => 'form', 'id' => 'form_login');
            // echo form_open('login/masuk', $atribut);
            echo form_open('login/masuk');
        ?>

            <div class="form-group">

                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="entypo-user"></i>
                    </div>

                    <input type="text" class="form-control" name="username_akun" id="username" autofocus placeholder="Username" autocomplete="off" />
                </div>

            </div>

            <div class="form-group">

                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="entypo-key"></i>
                    </div>

                    <input type="password" class="form-control" name="pw_akun" id="password" placeholder="Password" autocomplete="on" />
                </div>

            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-red btn-block btn-lg" name="submit">
                    Log-In
                    <i class="entypo-login"></i>
                </button>
            </div>
        <?= form_close(); ?>
        <!-- Implemented in v1.1.4 -->
        <div class="form-group">
            <em>- atau -</em>
        </div>

        <a href="<?= site_url('register') ?>" class="link">Belum pernah register?</a>


        <div class="login-bottom-links">

            <a href="<?= site_url('login/reset_password') ?>" class="link">Lupa password?</a>

        </div>

    </div>