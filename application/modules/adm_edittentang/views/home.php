<?php if ($this->session->flashdata('info')): ?>
    <?php echo "<script type='text/javascript'>alert('".$this->session->flashdata('info')."')</script>"; ?>
<?php endif ?>
<div class="profile-env">

    <header class="row">

        <div class="col-sm-offset-5 col-sm-2">
            <a href="<?= site_url('adm_edittentang/editfoto') ?>" class="profile-picture">
                <img src="<?= base_url() ?>assets/uploads/<?= $detail->foto_about ?>" class="img-rounded" width="130" height="130"/>
            </a>
        </div>

        <div class="col-sm-5">
            <div class="profile-buttons">
                <a href="<?= site_url('adm_edittentang/editfoto') ?>" class="btn btn-info btn-icon">
                    <i class="entypo-picture"></i>
                    Edit Logo Komunitas
                </a>
            </div>
        </div>

    </header>

    <section class="profile-info-tabs">

        <div class="row">

            <div class="col-sm-12" style="margin-top: -40px;">
                <div class="row">
            <?= form_open(); ?>
                <ul class="user-details">
                    <li>
                        <?= validation_errors('<p style="color:red">*', '</p>'); ?>
                        <div class="form-group col-sm-12">
                            <label for="isi_about" class="col-sm-2 control-label">Deskripsi Komunitas</label>
                            <div class="col-sm-10">
                                <textarea class="form-control autogrow" id="isi_about" placeholder="Komunitas ini adalah......" rows="8" name="isi_about" required="required"><?= $detail->isi_about; ?></textarea>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="form-group col-sm-12">
                            <label for="nohp_about" class="col-sm-2 control-label">Nomor HP</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="cth: Melo : +92472984..." id="nohp_about" name="nohp_about" value="<?= $detail->nohp_about; ?>" required>
                            </div>
                            <label for="email_about" class="col-sm-2 control-label">E-mail</label>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" placeholder="cth: tes@48mail.com..." id="email_about" name="email_about" value="<?= $detail->email_about; ?>" required>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="form-group col-sm-12">
                            <label for="link_fb_about" class="col-sm-1 control-label">Link Facebook</label>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <input type="link" class="form-control" name="link_fb_about" value="<?= $detail->link_fb_about; ?>" placeholder="link facebook" style="color: #3b5998;">
                                    <div class="input-group-addon">
                                        <a href="#"><i class="entypo-facebook" style="color: #3b5998;"></i></a>
                                    </div>
                                </div>
                            </div>
                            <label for="link_twitter_about" class="col-sm-1 control-label">Link Twitter</label>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <input type="link" class="form-control" name="link_twitter_about" value="<?= $detail->link_twitter_about; ?>" placeholder="link twitter" style="color: #00aced;">
                                    <div class="input-group-addon">
                                        <a href="#"><i class="entypo-twitter" style="color: #00aced;"></i></a>
                                    </div>
                                </div>
                            </div>
                            <label for="link_youtube_about" class="col-sm-1 control-label">Link Youtube</label>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <input type="link" class="form-control" name="link_youtube_about" value="<?= $detail->link_youtube_about; ?>" placeholder="link youtube" style="color: #bb0000;">
                                    <div class="input-group-addon">
                                        <a href="#"><i class="entypo-play" style="color: #bb0000;"></i></a>
                                    </div>
                                </div>
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