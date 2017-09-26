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
            <input type="hidden" value="<?= $detail->id_idol; ?>" name="id_idol" />
            <div class="box-body col-md-12">
                <?php echo validation_errors('<p style="color:red">*', '</p>'); ?>
                <div class="form-group col-sm-12">
                    <label for="nama_idol" class="col-sm-2 control-label">Nama Idol</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="cth: Melody..." id="nama_idol" name="nama_idol" value="<?= $detail->nama_idol; ?>" required autofocus>
                    </div>
                    <label for="panggilan_idol" class="col-sm-2 control-label">Panggilan</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="cth: Melo..." id="panggilan_idol" name="panggilan_idol" value="<?= $detail->panggilan_idol; ?>">
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="tlahir_idol" class="col-sm-2 control-label">Tanggal Lahir</label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" data-format="yyyy-mm-dd" name="tlahir_idol" style="margin-bottom:0;" value="<?= $detail->tlahir_idol ?>">
                            <div class="input-group-addon">
                                <a href="#"><i class="entypo-calendar"></i></a>
                            </div>
                        </div>
                    </div>
                    <label for="tinggi_idol" class="col-sm-2 control-label">Tinggi Badan</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="tinggi_idol" placeholder="ex: 130" name="tinggi_idol" min="100" max="250" value="<?= $detail->tinggi_idol; ?>">
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label class="col-sm-2 control-label">Idol Group</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="id_idol_group">
                            <option value="<?= $detail->id_idol_group; ?>"><?= $detail->nama_idol_group; ?></option>
                            <?php foreach ($drop_idol_group->result() as $row) {
                                echo "<option value='$row->id_idol_group'>$row->nama_idol_group</option>";
                            } ?>
                        </select>
                    </div>
                    <label for="goldar_idol" class="col-sm-2 control-label">Golongan Darah</label>
                    <div class="col-sm-4">
                        <div class="radio" style="margin-top:0;">
                            <label>
                                <input type="radio" name="goldar_idol" value="A" <?php echo ($detail->goldar_idol == 'A') ? 'checked' : 'checked'; ?>><h4>A</h4>
                            </label>
                            <label>
                                <input type="radio" name="goldar_idol" value="AB" <?php echo ($detail->goldar_idol == 'AB') ? 'checked' : ''; ?>><h4>AB</h4>
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="goldar_idol" value="B" <?php echo ($detail->goldar_idol == 'B') ? 'checked' : ''; ?>><h4>B</h4>
                            </label>
                            <label>
                                <input type="radio" name="goldar_idol" value="O" <?php echo ($detail->goldar_idol == 'O') ? 'checked' : ''; ?>><h4>O</h4>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <div class="col-sm-2">
                        <label class="control-label" style="font-size: 25px; color: #555;">Foto</label>
                        <a href="<?= site_url('adm_idol/editfoto/').$detail->id_idol ?>" class="btn btn-info">Edit Foto</a>
                    </div>
                    <div class="col-sm-4">
                        <img src="<?= base_url() ?>assets/uploads/<?= $detail->foto_idol; ?>" alt="Tidak Ada Foto" class="img-responsive"><br>
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