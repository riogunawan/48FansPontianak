<?php if ($this->session->flashdata('info')): ?>
    <?php echo "<script type='text/javascript'>alert('".$this->session->flashdata('info')."')</script>"; ?>
<?php endif ?>
<div class="profile-env">

    <header class="row">

        <div class="col-xs-4 col-sm-2">

            <a href="<?= site_url('adm_editprofil/editfoto') ?>" class="profile-picture text-center">
                <img src="<?= base_url() ?>assets/uploads/<?= $detail->foto_akun ?>" class="img-circle img-responsive" width="130" height="130"/>
            </a>

        </div>

        <div class="col-xs-8 col-sm-5">

            <ul class="profile-info-sections">
                <li>
                    <div class="profile-name">
                        <strong>
                            <a href="#"><?= $detail->nama_akun ?></a>
                            <a href="#" class="user-status is-online tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="Online"></a>
                        </strong>

                        <span><a href="#">
                            <?php
                                echo "<b>".$this->session->userdata('keanggotaan')." 48 Fans Pontianak</b>";
                             ?>
                        </a></span>
                    </div>
                </li>

            </ul>

        </div>

        <div class="col-xs-12 col-sm-5">

            <div class="profile-buttons">
                <a href="<?= site_url('adm_editprofil/editfoto') ?>" class="btn btn-icon btn-info">
                    <i class="entypo-picture"></i>
                    Edit Foto Profile
                </a>
                <a href="javascript:;" class="btn btn-icon btn-orange" onclick="jQuery('#modal-7').modal('show', {backdrop: 'static'});">
                    <i class="entypo-pencil"></i>
                    Ubah Password

                </a>
            </div>
        </div>

    </header>
<script type="text/javascript">
                        function showAjaxModal()
                        {
                            jQuery('#modal-7').modal('show', {backdrop: 'static'});

                            jQuery.ajax({
                                url: "data/ajax-content.txt",
                                success: function(response)
                                {
                                    jQuery('#modal-7 .modal-body').html(response);
                                }
                            });
                        }
                    </script>

<!-- Modal 4 (Confirm)-->
        <div class="modal fade" id="modal-7" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Ubah Password</h4>
                    </div>

                    <div class="modal-body">

                        <?= form_open('adm_editprofil/ubahpw'); ?>
                        <div class="col-sm-12">
                            <div class="row">
                                <label for="pw_akun" class="col-sm-12 control-label">Password Lama</label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" placeholder="cth: Pass..." id="pw_akun" name="pw_akun_old" required>
                                </div>
                                <label for="pw_akun" class="col-sm-12 control-label">Password Baru</label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" placeholder="cth: Pass..." id="pw_akun" name="pw_akun" required>
                                </div>
                                <label for="pw_akun" class="col-sm-12 control-label">Re-type Password</label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" placeholder="cth: Pass..." id="pw_akun" name="pw_akun_confirm" required>
                                </div>
                                <center><button type="submit" name="ubah" class="btn btn-success">ubah</button></center>
                            </div>
                        </div>

                        <?= form_close(); ?>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <section class="profile-info-tabs">

        <div class="row">

            <div class="col-sm-12" style="margin-top: -40px;">
                <div class="row">
            <?= form_open(); ?>
                <!-- <input type="hidden" value="<= $detail->id_akun ?>" name="id_akun" /> -->
                <ul class="user-details">
                    <li>
                        <?= validation_errors('<p style="color:red">*', '</p>'); ?>
                        <div class="form-group col-sm-12">
                            <label for="nama_akun" class="col-sm-2 control-label">Nama Lengkap</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="cth: Nama Kamu Yang Lengkap..." id="nama_akun" name="nama_akun" value="<?= $detail->nama_akun; ?>" required>
                            </div>
                            <label class="col-sm-2 control-label">Idol</label>
                            <div class="col-sm-4">
                                <select class="select2" name="id_idol" data-allow-clear="true" data-placeholder="Pilih salah satu idol...">
                                    <option value="<?= $detail->id_idol; ?>">--<?= $detail->nama_idol; ?>--</option>
                                    <optgroup label="Idol 48 Group">
                                    <?php foreach ($drop_idol->result() as $row) {
                                        echo "<option value='$row->id_idol'>$row->nama_idol</option>";
                                    } ?>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="form-group col-sm-12">
                            <label for="panggilan_akun" class="col-sm-2 control-label">Panggilan</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="cth: Nama Panggilan..." id="panggilan_akun" name="panggilan_akun" value="<?= $detail->panggilan_akun; ?>">
                            </div>
                            <label for="email_akun" class="col-sm-2 control-label">E-mail</label>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" placeholder="cth: tes@48mail.com..." id="email_akun" name="email_akun" value="<?= $detail->email_akun; ?>" required>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="form-group col-sm-12">
                            <label for="tinggi_akun" class="col-sm-2 control-label">Tinggi Badan</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="tinggi_akun" placeholder="ex: 130" name="tinggi_akun" min="100" max="250" value="<?= $detail->tinggi_akun; ?>">
                            </div>
                            <label for="tinggi_akun" class="col-sm-1 control-label" style="text-align:left;">cm</label>
                            <label class="col-sm-2 control-label">Tanggal Lahir</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <!-- <input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" name="ttl_akun"> -->
                                    <input type="text" class="form-control datepicker" data-format="yyyy-mm-dd" name="ttl_akun" value="<?= $detail->ttl_akun; ?>">
                                    <div class="input-group-addon">
                                        <a href="#"><i class="entypo-calendar"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
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
                                    <input type="link" class="form-control" name="link_twitter_akun" value="<?= $detail->link_twitter_akun; ?>" placeholder="cth: @officialjkt48..." style="color: #00aced;">
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
                    </li>
                    <li>
                        <div class="form-group col-sm-12">
                            <label for="nama_akun" class="col-sm-2 control-label">Jenis Kelamin</label>
                            <div class="col-sm-4">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="kelamin_akun" value="laki-laki" <?php echo ($detail->kelamin_akun == 'laki-laki') ? 'checked' : 'checked'; ?>><h4>Laki-Laki</h4>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="kelamin_akun" value="perempuan" <?php echo ($detail->kelamin_akun == 'perempuan') ? 'checked' : ''; ?>><h4>Perempuan</h4>
                                    </label>
                                </div>
                            </div>
                            <label for="nama_akun" class="col-sm-2 control-label">Golongan Darah</label>
                            <div class="col-sm-4">
                                <div class="radio">
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
                    </li>
                    <li>
                        <div class="form-group col-sm-12">
                            <label class="col-xs-12 col-sm-2 control-label">Biografi Singkat</label>
                            <div class="col-xs-12 col-sm-10">
                                <textarea class="form-control autogrow" id="deskripsi_akun" placeholder="Saya adalah......" rows="8" name="deskripsi_akun"><?= $detail->deskripsi_akun; ?></textarea>
                            </div>
                        </div>
                    </li>
                    <center><button type="submit" class="btn btn-success btn-lg" name="simpan" value="simpan"><i class="fa fa-save"></i>&nbsp;Simpan</button></center>
                </ul>


                <!-- tabs for the profile links -->
            <?= form_close(); ?>

                </div>
            </div>

        </div>

    </section>
</div>