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
            <input type="hidden" value="<?= $detail->id_event; ?>" name="id_event" />
            <div class="box-body">
                <?php echo validation_errors('<p style="color:red">*', '</p>'); ?>
                <div class="form-group col-sm-12">
                    <label for="judul_event" class="col-sm-2 control-label">Judul Event/Gathering</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="cth: Judulnya Yang Menarik..." id="judul_event" name="judul_event" value="<?= $detail->judul_event; ?>" required autofocus>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label class="col-sm-2 control-label">Poster Event/Gathering</label>
                    <div class="col-sm-4">
                        <div class="form-control" style="width: 200px; color: #555; height: auto;">
                            <img src="<?= base_url() ?>assets/uploads/<?= $detail->poster_event; ?>" alt="" class="img-responsive"><br>
                            <a href="<?= site_url('adm_event/editfoto/').$detail->id_event ?>"><button type="button" class="btn btn-info">Edit Poster</button></a>
                        </div>
                    </div>
                    <label for="lokasi_event" class="col-sm-1 control-label">Lokasi Event</label>
                    <div class="col-sm-5">
                        <textarea class="form-control autogrow" id="lokasi_event" placeholder="cth: Taman Budaya..." rows="8" name="lokasi_event" required><?= $detail->lokasi_event; ?></textarea>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="isi_event" class="col-sm-2 control-label">Isi Event/Gathering</label>
                    <div class="col-sm-10" style="background: #981b1b; padding: 10px;">
                        <textarea class="form-control wysihtml5" data-stylesheet-url="<?= base_url() ?>assets/neon/css/wysihtml5-color.css" name="isi_event" id="isi_event" placeholder="Berita nya isi disini......"><?= $detail->isi_event; ?></textarea>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="waktu_event" class="col-sm-2 control-label">Waktu Event</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="cth: 10:00 wib - selesai..." id="waktu_event" name="waktu_event" value="<?= $detail->waktu_event; ?>" required>
                    </div>
                    <label class="col-sm-3 control-label">Tanggal Penyelenggaraan Event</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" data-format="yyyy-mm-dd" name="tgl_event" value="<?= $detail->tgl_event; ?>" placeholder="2017-08-01">
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
                            <option><?= $detail->jenis_event; ?></option>
                            <option value="gathering">Gathering</option>
                            <option value="event">Event</option>
                        </select>
                    </div>
                    <label class="col-sm-2 control-label">Tiket Online</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="tiket_online">
                            <option><?= $detail->tiket_online; ?></option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                            <option value="Tersedia">Tersedia</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="latitude" class="col-sm-1 control-label">Latitude</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" placeholder="cth: nilai latitude didapatkan dari link di bawah..." id="lat" name="latitude" value="<?= $detail->latitude; ?>" required>
                    </div>
                    <label for="longitude" class="col-sm-1 control-label">Longitude</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" placeholder="cth: nilai longitude didapatkan dari link di bawah..." id="lng" name="longitude" value="<?= $detail->longitude; ?>" required>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <center><h4>Drag n drop pointer map nya untuk mendapatkan nilai Latitude dan Longitude</h4>
                    <div id="map" style="width:600px;height: 300px;"></div></center>
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
<!-- MAPS -->
<script type="text/javascript">
    function updateMarkerPosition(latLng) {
      document.getElementById('lat').value = [latLng.lat()];
      document.getElementById('lng').value = [latLng.lng()];
    }

    var myOptions = {
      zoom: 17,
        scaleControl: true,
      center:  new google.maps.LatLng(<?= $detail->latitude; ?>,<?= $detail->longitude; ?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("map"),
        myOptions);

     var marker1 = new google.maps.Marker({
         position : new google.maps.LatLng(<?= $detail->latitude; ?>,<?= $detail->longitude; ?>),
         title : 'lokasi',
         map : map,
         draggable : true
     });

 //updateMarkerPosition(latLng);
     google.maps.event.addListener(marker1, 'drag', function() {
      updateMarkerPosition(marker1.getPosition());
 });
</script>