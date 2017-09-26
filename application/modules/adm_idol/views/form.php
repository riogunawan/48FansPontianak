<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box panel-saya">
            <div class="box-header">
                <center><h3 class="box-title"><?= @$MASTER['DATA']['SUBTITLE'] ?></h3></center>
            </div>
            <!-- /.box-header -->
            <?= form_open_multipart('adm_idol/tambah'); ?>
            <div class="box-body col-md-12">
                <?php echo validation_errors('<p style="color:red">*', '</p>'); ?>
                <div class="form-group col-sm-12">
                    <label for="nama_idol" class="col-sm-2 control-label">Nama Idol</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="cth: Melody..." id="nama_idol" name="nama_idol" value="<?= set_value('nama_idol'); ?>" required autofocus>
                    </div>
                    <label for="panggilan_idol" class="col-sm-2 control-label">Panggilan</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="cth: Melo..." id="panggilan_idol" name="panggilan_idol" value="<?= set_value('panggilan_idol'); ?>">
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="tlahir_idol" class="col-sm-2 control-label">Tanggal Lahir</label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" data-format="yyyy-mm-dd" name="tlahir_idol" style="margin-bottom:0;">
                            <div class="input-group-addon">
                                <a href="#"><i class="entypo-calendar"></i></a>
                            </div>
                        </div>
                    </div>
                    <label for="tinggi_idol" class="col-sm-2 control-label">Tinggi Badan</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="tinggi_idol" placeholder="ex: 130" name="tinggi_idol" min="100" max="250" value="<?= set_value('tinggi_idol'); ?>">
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label class="col-sm-2 control-label">Idol Group</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="id_idol_group">
                            <option value="1">-- Pilih --</option>
                            <?php foreach ($drop_idol_group->result() as $row) {
                                echo "<option value='$row->id_idol_group'>$row->nama_idol_group</option>";
                            } ?>
                        </select>
                    </div>
                    <label for="goldar_idol" class="col-sm-2 control-label">Golongan Darah</label>
                    <div class="col-sm-4">
                        <div class="radio" style="margin-top:0;">
                            <label>
                                <input type="radio" name="goldar_idol" value="A"><h4>A</h4>
                            </label>
                            <label>
                                <input type="radio" name="goldar_idol" value="AB"><h4>AB</h4>
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="goldar_idol" value="B"><h4>B</h4>
                            </label>
                            <label>
                                <input type="radio" name="goldar_idol" value="O"><h4>O</h4>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label class="col-sm-2 control-label" style="font-size: 25px; color: #555;">Foto</label>
                    <div class="col-sm-4">
                        <div class="form-control dropzone" id="my-dropzone" style="width: 200px; color: #555; height: auto;"></div>
                        <?php
                            $hidden2_attr = array('type' => 'hidden',
                                                'name' => 'foto_idol',
                                                'id' => 'foto_idol',
                                                'class' => 'form-control');
                            echo form_input($hidden2_attr);
                         ?>
                    </div>
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