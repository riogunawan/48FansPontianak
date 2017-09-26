<?php if ($this->session->flashdata('info')): ?>
    <?php echo "<script type='text/javascript'>alert('".$this->session->flashdata('info')."')</script>"; ?>
<?php endif ?>
<div class="row">
    <!-- left column -->
    <div class="col-sm-12">
        <!-- general form elements -->
        <div class="box panel-saya">
            <div class="box-header">
                <center><h3 class="box-title"><?= @$MASTER['DATA']['SUBTITLE'] ?></h3></center>
            </div>
            <!-- /.box-header -->
            <?= form_open(); ?>
            <input type="hidden" value="<?= $detail->id_berita; ?>" name="id_berita" />
            <div class="box-body">
                <?php echo validation_errors('<p style="color:red">*', '</p>'); ?>
                <!-- text input -->
                <div class="form-group col-sm-12">
                    <label for="judul_berita" class="col-sm-2 control-label">Judul Berita</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="cth: Judulnya Yang Menarik..." id="judul_berita" name="judul_berita" value="<?= $detail->judul_berita; ?>" required>
                    </div>
                </div>

                <!-- TEXT AREA -->
                <div class="form-group col-sm-12">
                    <label for="isi_berita" class="col-sm-2 control-label">Isi Berita</label>
                    <div class="col-sm-10" style="background: #981b1b; padding: 10px;">
                        <textarea class="form-control wysihtml5" data-stylesheet-url="<?= base_url() ?>assets/neon/css/wysihtml5-color.css" name="isi_berita" id="isi_berita" placeholder="Berita nya isi disini......"><?= $detail->isi_berita; ?></textarea>
                    </div>
                </div>

                <!-- DROPDOWN -->
                <div class="form-group col-sm-12">
                    <label class="col-sm-2 control-label">Jenis Berita</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_jns_berita">
                            <option value="<?= $detail->id_jns_berita; ?>"><?= $detail->jns_berita; ?></option>
                        <?php foreach ($drop_jns_berita->result() as $row) {
                            echo "<option value='$row->id_jns_berita'>$row->jns_berita</option>";
                        } ?>
                        </select>
                    </div>
                </div>

                <!-- FOTO -->
                <div class="form-group col-sm-12">
                    <label class="col-sm-2 control-label">Foto</label>
                    <div class="col-sm-10">
                        <div class="form-control" style="width: 200px; color: #555; height: auto;">
                            <img src="<?= base_url() ?>assets/uploads/<?= $detail->foto_berita; ?>" alt="" class="img-responsive"><br>
                            <a href="<?= site_url('adm_berita/editfoto/').$detail->id_berita ?>"><button type="button" class="btn btn-info">Edit Foto</button></a>
                        </div>
                    </div>
                </div>

                <!-- text input -->
                <div class="form-group col-sm-12">
                    <label for="foto_ket_berita" class="col-sm-2 control-label">Sumber Foto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="cth: photographer admin..." id="foto_ket_berita" name="foto_ket_berita" value="<?= $detail->foto_ket_berita; ?>" required>
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <center><input type="button" value="Kembali" onclick="history.back(-1)" class="btn btn-orange" />&nbsp;<button type="submit" class="btn btn-primary" name="edit" value="Simpan">Simpan</button></center>
            </div>
            <?= form_close(); ?>
        </div>
        <!-- /.box -->
    </div>
    <!--/.col (left) -->
</div>