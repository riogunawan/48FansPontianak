<div class="row">
    <!-- left column -->
    <div class="col-sm-12">
        <!-- general form elements -->
        <div class="box panel-saya">
            <div class="box-header">
                <center><h3 class="box-title"><?= @$MASTER['DATA']['SUBTITLE'] ?></h3></center>
            </div>
            <!-- /.box-header -->
            <?= form_open_multipart('adm_berita/tambah'); ?>
            <div class="box-body">
                <?php echo validation_errors('<p style="color:red">*', '</p>'); ?>
                <!-- text input -->
                <div class="form-group col-sm-12">
                    <label for="judul_berita" class="col-sm-2 control-label">Judul Berita</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="cth: Judulnya Yang Menarik..." id="judul_berita" name="judul_berita" value="<?= set_value('judul_berita'); ?>" required autofocus>
                    </div>
                </div>

                <!-- TEXT AREA -->
                <div class="form-group col-sm-12">
                    <label for="isi_berita" class="col-sm-2 control-label">Isi Berita</label>
                    <div class="col-sm-10" style="background: #981b1b; padding: 10px;">
                        <!-- <textarea class="form-control autogrow" id="isi_berita" placeholder="Berita nya isi disini......" style="height: 100px;" name="isi_berita"><?= set_value('isi_berita'); ?></textarea> -->
                        <textarea class="form-control wysihtml5" data-stylesheet-url="<?= base_url() ?>assets/neon/css/wysihtml5-color.css" name="isi_berita" id="isi_berita" placeholder="Berita nya isi disini......"><?= set_value('isi_berita'); ?></textarea>
                    </div>
                </div>

                <!-- DROPDOWN -->
                <div class="form-group col-sm-12">
                    <label class="col-sm-2 control-label">Jenis Berita</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_jns_berita">
                            <option value="1">-- Pilih --</option>
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
                        <div class="form-control dropzone" id="my-dropzone" style="width: 200px; color: #555; height: auto;"></div>
                        <?php
                            $hidden2_attr = array(
                                'type' => 'hidden',
                                'name' => 'foto_berita',
                                'id' => 'foto_berita',
                                'class' => 'form-control'
                                            );
                            echo form_input($hidden2_attr);
                         ?>
                    </div>
                </div>

                <!-- text input -->
                <div class="form-group col-sm-12">
                    <label for="foto_ket_berita" class="col-sm-2 control-label">Sumber Foto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="cth: photographer admin..." id="foto_ket_berita" name="foto_ket_berita" value="<?= set_value('foto_ket_berita'); ?>" required>
                    </div>
                </div>
            </div>

            <!-- /.box-body -->
            <div class="box-footer">
                <center><button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button></center>
            </div>
            <?= form_close(); ?>
        </div>
        <!-- /.box -->
    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <!--/.col (right) -->
</div>