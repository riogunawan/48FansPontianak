<?php if ($this->session->flashdata('info')): ?>
    <?php echo "<script type='text/javascript'>alert('".$this->session->flashdata('info')."')</script>"; ?>
<?php endif ?>
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box panel-saya">
            <div class="box-header">
                <center><h3 class="box-title"><?= @$MASTER['DATA']['SUBTITLE'] ?></h3></center>
            </div>
            <!-- /.box-header -->
            <?= form_open(); ?>
            <input type="hidden" value="<?= $detail->id_akun; ?>" name="id_akun" />
            <div class="box-body">
                <?php echo validation_errors('<p style="color:red">*', '</p>'); ?>
                <div class="form-group col-sm-12">
                    <label for="username_akun" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="cth: Melody..." id="username_akun" name="username_akun" value="<?= $detail->username_akun; ?>" required autofocus>
                    </div>
                    <label for="pw_akun" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="cth: Melo..." id="pw_akun" name="pw_akun"required>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="nama_akun" class="col-sm-2 control-label">Nama Lengkap</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="cth: Melody..." id="nama_akun" name="nama_akun" value="<?= $detail->nama_akun; ?>" required autofocus>
                    </div>
                    <label for="panggilan_akun" class="col-sm-2 control-label">Panggilan</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="cth: Melo..." id="panggilan_akun" name="panggilan_akun" value="<?= $detail->panggilan_akun; ?>">
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="ttl_akun" class="col-sm-2 control-label">Tanggal Lahir</label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" data-format="yyyy-mm-dd" name="ttl_akun" style="margin-bottom:0;" value="<?= $detail->ttl_akun; ?>">
                            <div class="input-group-addon">
                                <a href="#"><i class="entypo-calendar"></i></a>
                            </div>
                        </div>
                    </div>
                    <label for="tinggi_akun" class="col-sm-2 control-label">Tinggi Badan</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="tinggi_akun" placeholder="ex: 130" name="tinggi_akun" min="100" max="250" value="<?= $detail->tinggi_akun; ?>">
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label class="col-sm-2 control-label">Idol</label>
                    <div class="col-sm-4">
                        <select class="select2" name="id_idol" data-allow-clear="true" data-placeholder="Pilih satu idol...">
                            <option value="<?= $detail->id_idol; ?>"><?= $detail->nama_idol; ?></option>
                            <optgroup label="Idol">
                            <?php foreach ($drop_idol->result() as $row) {
                                echo "<option value='$row->id_idol'>$row->nama_idol</option>";
                            } ?>
                            </optgroup>
                        </select>
                    </div>
                    <label for="email_akun" class="col-sm-2 control-label">E-Mail</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" placeholder="cth: Melo..." id="email_akun" name="email_akun" value="<?= $detail->email_akun; ?>" required>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="link_fb_akun" class="col-sm-1 control-label">Link Facebook</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="link" class="form-control" name="link_fb_akun" value="<?= $detail->link_fb_akun; ?>" placeholder="link facebook" style="color: #3b5998;">
                            <div class="input-group-addon">
                                <a href="#"><i class="entypo-facebook" style="color: #3b5998;"></i></a>
                            </div>
                        </div>
                    </div>
                    <label for="link_twitter_akun" class="col-sm-1 control-label">Twitter</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="link_twitter_akun" value="<?= $detail->link_twitter_akun; ?>" placeholder="cth: @officialjkt48..." style="color: #00aced;">
                            <div class="input-group-addon">
                                <a href="#"><i class="entypo-twitter" style="color: #00aced;"></i></a>
                            </div>
                        </div>
                    </div>
                    <label for="link_gplus_akun" class="col-sm-1 control-label">Link G+/Circle</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="link" class="form-control" name="link_gplus_akun" value="<?= $detail->link_gplus_akun; ?>" placeholder="link Google Plus/Circle" style="color: #bb0000;">
                            <div class="input-group-addon">
                                <a href="#"><i class="entypo-google-circles" style="color: #bb0000;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="kelamin_akun" class="col-sm-2 control-label">Jenis Kelamin</label>
                    <div class="col-sm-4">
                        <div class="radio" style="margin-top:0;">
                            <label>
                                <input type="radio" name="kelamin_akun" value="Laki-laki" <?= ($detail->kelamin_akun == 'Laki-laki') ? 'checked' : 'checked'; ?>><h4>Laki-laki</h4>
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="kelamin_akun" value="Perempuan" <?= ($detail->kelamin_akun == 'Perempuan') ? 'checked' : ''; ?>><h4>Perempuan</h4>
                            </label>
                        </div>
                    </div>
                    <label for="goldar_akun" class="col-sm-2 control-label">Golongan Darah</label>
                    <div class="col-sm-4">
                        <div class="radio" style="margin-top:0;">
                            <label>
                                <input type="radio" name="goldar_akun" value="A" <?php echo ($detail->goldar_akun == 'A') ? 'checked' : 'checked'; ?>><h4>A</h4>
                            </label>
                            <label>
                                <input type="radio" name="goldar_akun" value="AB" <?php echo ($detail->goldar_akun == 'AB') ? 'checked' : ''; ?>><h4>AB</h4>
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="goldar_akun" value="B" <?php echo ($detail->goldar_akun == 'B') ? 'checked' : ''; ?>><h4>B</h4>
                            </label>
                            <label>
                                <input type="radio" name="goldar_akun" value="O" <?php echo ($detail->goldar_akun == 'O') ? 'checked' : ''; ?>><h4>O</h4>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <div class="col-sm-2">
                        <label class="control-label" style="font-size: 25px; color: #555;">Foto</label>
                        <a href="<?= site_url('adm_anggota48ptk/editfoto/').$detail->id_akun ?>" class="btn btn-info">Edit Foto</a>
                    </div>
                    <div class="col-sm-4">
                        <img src="<?= base_url() ?>assets/uploads/<?= $detail->foto_akun; ?>" alt="" class="img-responsive"><br>
                    </div>
                    <label class="col-sm-2 control-label">Biografi Singkat</label>
                    <div class="col-sm-4">
                        <textarea class="form-control autogrow" id="deskripsi_akun" placeholder="Saya adalah......" rows="8" name="deskripsi_akun"><?= $detail->deskripsi_akun; ?></textarea>
                    </div>
                </div>
            </div>

            <!-- /.box-body -->
            <div class="box-footer">
                <center><input type="button" value="Kembali" onclick="history.back(-1)" class="btn btn-warning" />&nbsp;<button type="submit" class="btn btn-lg btn-success" name="edit" value="edit">Edit</button></center>
            </div>
            <?= form_close(); ?>
        </div>
        <!-- /.box -->
    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <!--/.col (right) -->
</div>