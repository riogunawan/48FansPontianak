<?php
    // $atribut = array('class' => 'form-horizontal form-groups-bordered');
    echo form_open_multipart();
 ?>
     <input type="hidden" value="<?= $detail->id_berita; ?>" name="id_berita" />
    <?= validation_errors('<p style="color:red">*', '</p>'); ?>

    <div class="form-group">
        <label class="col-xs-2 col-sm-5 control-label">Foto</label>
        <div class="col-xs-10 col-sm-5">
            <input name="foto" type="file" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-default btn-lg" name="edit" value="edit">
            <center><i class="entypo-rocket"></i> Edit &nbsp;</center>
        </button>
    </div>
<?= form_close(); ?>