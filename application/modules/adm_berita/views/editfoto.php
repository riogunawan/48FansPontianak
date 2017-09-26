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
            <?= form_open_multipart(); ?>
            <input type="hidden" value="<?= $detail->id_berita; ?>" name="id_berita" />
            <div class="box-body col-md-12">
                <!-- FOTO -->
                <div class="form-group col-xs-12 col-sm-12">
                    <label class="col-xs-4 col-sm-2 control-label" style="font-size: 25px; color: #555;">Foto</label>
                    <div class="col-xs-8 col-sm-10">
                        <input name="foto" type="file" class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-file'></i> Browse" style="left: -1.25px; top: 14.5px;">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <center><input type="button" value="Go Back" onclick="history.back(-1)" class="btn btn-orange" />&nbsp;<button type="submit" class="btn btn-primary" name="edit" value="edit">Edit</button></center>
            </div>
            <?= form_close(); ?>
        </div>
        <!-- /.box -->
    </div>
    <!--/.col (left) -->
</div>