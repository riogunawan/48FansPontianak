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
            <input type="hidden" value="<?= $detail->id_tiket; ?>" name="id_tiket" />
            <div class="box-body">
                <?php echo validation_errors('<p style="color:red">*', '</p>'); ?>
                <div class="form-group col-sm-12">
                    <label class="col-sm-2 control-label">Tiket Event</label>
                    <div class="col-sm-4">
                        <select class="select2" name="id_event" data-allow-clear="true" data-placeholder="Pilih Event...">
                            <option value="<?= $detail->id_event; ?>"><?= $detail->judul_event; ?></option>
                            <optgroup label="Event Anda">
                            <?php foreach ($drop_event->result() as $row) {
                                echo "<option value='$row->id_event'>$row->judul_event</option>";
                            } ?>
                            </optgroup>
                        </select>
                    </div>
                    <label for="jenis_tiket" class="col-sm-2 control-label">Jenis Tiket</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="cth: Reguler, ViP, Diamond..." id="jenis_tiket" name="jenis_tiket" value="<?= $detail->jenis_tiket; ?>" min="0">
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="harga_tiket" class="col-sm-2 control-label">Harga Tiket</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" placeholder="cth: 100000..." id="harga_tiket" name="harga_tiket" value="<?= $detail->harga_tiket; ?>" required>
                    </div>
                    <label for="stok_tiket" class="col-sm-1 control-label">Stok Tiket</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" placeholder="cth: 200..." id="stok_tiket" name="stok_tiket" value="<?= $detail->stok_tiket; ?>" min="0" required>
                    </div>
                    <label for="diskon_tiket" class="col-sm-1 control-label">Diskon</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" placeholder="cth: 20..." id="diskon_tiket" name="diskon_tiket" value="<?= $detail->diskon_tiket; ?>" min="0">
                    </div>
                    <label for="diskon_tiket" class="col-sm-1 control-label">%</label>
                </div>
            </div>

            <!-- /.box-body -->
            <div class="box-footer">
                <center><input type="button" value="Kembali" onclick="history.back(-1)" class="btn btn-warning" />&nbsp;<button type="submit" class="btn btn-lg btn-success" name="edit" value="edit">Edit</button></center>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <!--/.col (right) -->
</div>