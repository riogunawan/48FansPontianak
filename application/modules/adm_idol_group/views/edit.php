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
            <input type="hidden" value="<?= $detail->id_idol_group; ?>" name="id_idol_group" />
            <div class="box-body col-md-12">
                <?php echo validation_errors('<p style="color:red">*', '</p>'); ?>
                <div class="form-group col-sm-12">
                    <label for="nama_idol_group" class="col-sm-2 control-label">Nama Idol Group</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="cth: JKT48..." id="nama_idol_group" name="nama_idol_group" value="<?= $detail->nama_idol_group; ?>" required autofocus>
                    </div>
                    <label for="link_idol_group" class="col-sm-2 control-label">Link Website</label>
                    <div class="col-sm-4">
                        <input type="url" class="form-control" placeholder="cth: http://www.jkt48.com..." id="link_idol_group" name="link_idol_group" value="<?= $detail->link_idol_group; ?>">
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="tahun_idol_group" class="col-sm-2 control-label">Tahun Berdiri</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="cth: 2006..." id="tahun_idol_group" name="tahun_idol_group" value="<?= $detail->tahun_idol_group; ?>" required>
                    </div>
                    <label for="lokasi_idol_group" class="col-sm-2 control-label">Lokasi Idol Group</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="cth: Akihabara, Jepang..." id="lokasi_idol_group" name="lokasi_idol_group" value="<?= $detail->lokasi_idol_group; ?>" required>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <div class="col-sm-2">
                        <label class="control-label" style="font-size: 25px; color: #555;">Logo</label>
                        <a href="<?= site_url('adm_idol_group/editlogo/').$detail->id_idol_group ?>" class="btn btn-info">Edit Logo</a>
                    </div>
                    <div class="col-sm-4">
                        <img src="<?= base_url() ?>assets/uploads/<?= $detail->logo_idol_group; ?>" alt="Logo Belum Ada" class="img-responsive"><br>
                    </div>
                    <label class="col-sm-2 control-label">Banner</label>
                    <div class="col-sm-4">
                        <img src="<?= base_url() ?>assets/uploads/<?= $detail->banner_idol_group; ?>" alt="Banner Belum Ada" class="img-responsive"><br>
                        <a href="<?= site_url('adm_idol_group/editbanner/').$detail->id_idol_group ?>"><button type="button" class="btn btn-info">Edit Banner</button></a>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="ket_idol_group" class="col-sm-2 control-label">Penjelasan Singkat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control autogrow" id="ket_idol_group" placeholder="cth: Idol group ini adalah......" style="height: 100px;" name="ket_idol_group"><?= $detail->ket_idol_group; ?></textarea>
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