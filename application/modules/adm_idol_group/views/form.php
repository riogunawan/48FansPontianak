<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box panel-saya">
            <div class="box-header">
                <center><h3 class="box-title"><?= @$MASTER['DATA']['SUBTITLE'] ?></h3></center>
            </div>
            <!-- /.box-header -->
            <?= form_open_multipart('adm_idol_group/tambah'); ?>
            <div class="box-body col-md-12">
                <?php echo validation_errors('<p style="color:red">*', '</p>'); ?>
                <div class="form-group col-sm-12">
                    <label for="nama_idol_group" class="col-sm-2 control-label">Nama Idol Group</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="cth: JKT48..." id="nama_idol_group" name="nama_idol_group" value="<?= set_value('nama_idol_group'); ?>" required autofocus>
                    </div>
                    <label for="link_idol_group" class="col-sm-2 control-label">Link Website</label>
                    <div class="col-sm-4">
                        <input type="url" class="form-control" placeholder="cth: http://www.jkt48.com..." id="link_idol_group" name="link_idol_group" value="<?= set_value('link_idol_group'); ?>">
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="tahun_idol_group" class="col-sm-2 control-label">Tahun Berdiri</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="cth: 2006..." id="tahun_idol_group" name="tahun_idol_group" value="<?= set_value('tahun_idol_group'); ?>" required>
                    </div>
                    <label for="lokasi_idol_group" class="col-sm-2 control-label">Lokasi Idol Group</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="cth: Akihabara, Jepang..." id="lokasi_idol_group" name="lokasi_idol_group" value="<?= set_value('lokasi_idol_group'); ?>" required>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label class="col-sm-2 control-label" style="font-size: 25px; color: #555;">Logo</label>
                    <div class="col-sm-4">
                        <div class="form-control dropzone" id="my-dropzone" style="width: 200px; color: #555; height: auto;"></div>
                        <?php
                            $hidden2_attr = array('type' => 'hidden',
                                                'name' => 'logo_idol_group',
                                                'id' => 'logo_idol_group',
                                                'class' => 'form-control');
                            echo form_input($hidden2_attr);
                         ?>
                    </div>
                    <label class="col-sm-2 control-label">Banner</label>
                    <div class="col-sm-4">
                        <input name="banner" type="file" class="form-control inline btn btn-primary" data-label="<i class='glyphicon glyphicon-file'></i> Browse" placeholder="tes" style="left: -1.25px; top: 14.5px;">
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="ket_idol_group" class="col-sm-2 control-label">Penjelasan Singkat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control autogrow" id="ket_idol_group" placeholder="cth: Idol group ini adalah......" style="height: 100px;" name="ket_idol_group"><?= set_value('ket_idol_group'); ?></textarea>
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