<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box panel-saya">
            <div class="box-header">
                <center><h3 class="box-title"><?= @$MASTER['DATA']['SUBTITLE'] ?></h3></center>
            </div>
            <!-- /.box-header -->
            <?= form_open_multipart('adm_event/tambah'); ?>
            <div class="box-body">
                <div class="form-group col-sm-12">
                <?php echo validation_errors('<p style="color:red">*', '</p>'); ?>
                    <label for="judul_event" class="col-sm-2 control-label">Judul Event/Gathering</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="cth: Judulnya Yang Menarik..." id="judul_event" name="judul_event" value="<?= set_value('judul_event'); ?>" required autofocus>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label class="col-sm-2 control-label">Poster Event/Gathering</label>
                    <div class="col-sm-4">
                        <div class="form-control dropzone" id="my-dropzone" style="width: auto; color: #555; height: auto;"></div>
                        <?php
                            $hidden2_attr = array('type' => 'hidden',
                                                'name' => 'poster_event',
                                                'id' => 'poster_event',
                                                'class' => 'form-control');
                            echo form_input($hidden2_attr);
                         ?>
                    </div>
                    <label for="lokasi_event" class="col-sm-1 control-label">Lokasi Event</label>
                    <div class="col-sm-5">
                        <textarea class="form-control autogrow" id="lokasi_event" placeholder="cth: Taman Budaya..." rows="8" name="lokasi_event" required><?= set_value('lokasi_event'); ?></textarea>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="isi_event" class="col-sm-2 control-label">Isi Event/Gathering</label>
                    <div class="col-sm-10" style="background: #981b1b; padding: 10px;">
                        <textarea class="form-control wysihtml5" data-stylesheet-url="<?= base_url() ?>assets/neon/css/wysihtml5-color.css" name="isi_event" id="isi_event" placeholder="Berita nya isi disini......"><?= set_value('isi_event'); ?></textarea>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="waktu_event" class="col-sm-2 control-label">Waktu Event</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="cth: 10:00 wib - selesai..." id="waktu_event" name="waktu_event" value="<?= set_value('waktu_event'); ?>" required>
                    </div>
                    <label class="col-sm-3 control-label">Tanggal Penyelenggaraan Event</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <!-- <input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" name="tgl_event"> -->
                            <input type="text" class="form-control datepicker" data-format="yyyy-mm-dd" name="tgl_event" placeholder="2017-08-01" value="<?= set_value('tgl_event'); ?>">
                            <div class="input-group-addon">
                                <a href="#"><i class="entypo-calendar"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label class="col-sm-2 control-label">Jenis Event</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="jenis_event">
                            <option value="gathering">Gathering</option>
                            <option value="event">Event</option>
                        </select>
                    </div>
                    <label class="col-sm-2 control-label">Tiket Online</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="tiket_online">
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                            <option value="Tersedia">Tersedia</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="latitude" class="col-sm-1 control-label">Latitude</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" placeholder="cth: drag n drop pointer di map" id="lat" name="latitude" value="<?= set_value('latitude'); ?>" required>
                    </div>
                    <label for="longitude" class="col-sm-1 control-label">Longitude</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" placeholder="cth: drag n drop pointer di map" id="lng" name="longitude" value="<?= set_value('longitude'); ?>" required>
                    </div>
                    <!-- <a href="<= site_url('adm_event/lihatmap') ?>" target="_blank" class="alert-danger">klik disini untuk mendapatkan nilai latitude, longitude</a> -->
                </div>
                <div class="form-group col-sm-12">
                    <center><h4>Drag n drop pointer di map untuk mendapatkan nilai Latitude dan Longitude</h4>
                    <div id="map" style="width:600px;height: 300px;"></div></center>
                </div>
            </div>

            <!-- /.box-body -->
            <div class="box-footer">
                <center><button type="submit" class="btn btn-lg btn-success" name="submit" value="submit">Submit</button></center>
            </div>
            <?= form_close(); ?>
        </div>
        <!-- /.box -->
    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <!--/.col (right) -->
</div>