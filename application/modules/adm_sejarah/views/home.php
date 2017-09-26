<?php if ($this->session->flashdata('info')): ?>
    <?php echo "<script type='text/javascript'>alert('".$this->session->flashdata('info')."')</script>"; ?>
<?php endif ?>
<div class="profile-env">

    <header class="row">
        <div class="col-sm-offset-5 col-sm-2">
            <a href="<?= site_url('adm_edittentang/editfoto') ?>" class="profile-picture">
                <img src="<?= base_url() ?>assets/uploads/<?= $detail->foto_about ?>" class="img-rounded" width="130" height="130" alt="MANTAP"/>
            </a>
        </div>

        <div class="col-sm-5">
            <div class="profile-buttons">
                <center><h3 class="box-title"><?= @$MASTER['DATA']['SUBTITLE'] ?></h3></center>
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
                            <label for="isi_about" class="col-sm-2 control-label">Isi Sejarah</label>
                            <div class="col-sm-10">
                                <textarea class="form-control autogrow" id="isi_about" placeholder="Komunitas ini adalah......" rows="8" name="isi_about" required="required"><?= $detail->isi_about; ?></textarea>
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