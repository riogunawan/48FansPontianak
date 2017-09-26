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
            <?= form_open_multipart('adm_tiket/tambah'); ?>
            <div class="box-body">
                <?php echo validation_errors('<p style="color:red">*', '</p>'); ?>
                <div class="form-group col-sm-12">
                    <label class="col-sm-2 control-label">Tiket Event</label>
                    <div class="col-sm-4">
                        <select class="select2" name="id_event" data-allow-clear="true" data-placeholder="Pilih Event...">
                            <option></option>
                            <optgroup label="Event Anda">
                            <?php foreach ($drop_event->result() as $row) {
                                echo "<option value='$row->id_event'>$row->judul_event</option>";
                            } ?>
                            </optgroup>
                        </select>
                    </div>
                    <label for="jenis_tiket" class="col-sm-2 control-label">Jenis Tiket</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="cth: Reguler, ViP, Diamond..." id="jenis_tiket" name="jenis_tiket" value="<?= set_value('jenis_tiket'); ?>" min="0">
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="harga_tiket" class="col-sm-2 control-label">Harga Tiket</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" placeholder="cth: 100000..." id="harga_tiket" name="harga_tiket" value="<?= set_value('harga_tiket'); ?>" required>
                    </div>
                    <label for="stok_tiket" class="col-sm-1 control-label">Stok Tiket</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" placeholder="cth: 200..." id="stok_tiket" name="stok_tiket" value="<?= set_value('stok_tiket'); ?>" min="0" required>
                    </div>
                    <label for="diskon_tiket" class="col-sm-1 control-label">Diskon</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" placeholder="cth: 20..." id="diskon_tiket" name="diskon_tiket" value="<?= set_value('diskon_tiket'); ?>" min="0">
                    </div>
                    <label for="diskon_tiket" class="col-sm-1 control-label">%</label>
                </div>
            </div>

            <!-- /.box-body -->
            <div class="box-footer">
                <center><button type="submit" class="btn btn-lg btn-success" name="submit" value="submit">Submit</button></center>
            </div>
            <?= form_close(); ?>
        </div>
        <!-- /.box -->
        <div class="box panel-saya">
            <div class="box-header">
                <center><h3 class="box-title">Keranjang</h3></center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="10">NO</th>
                                <th width="300">Event</th>
                                <th>Jenis Tiket</th>
                                <th>Harga perTiket</th>
                                <th>Diskon</th>
                                <th>Stok</th>
                                <th width="170">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                foreach ($list->result() as $row) {
                                    echo "
                                        <tr>
                                            <td>$i</td>
                                            <td>$row->judul_event</td>
                                            <td>$row->jenis_tiket</td>
                                            <td>$row->harga_tiket</td>
                                            <td>$row->diskon_tiket</td>
                                            <td>$row->stok_tiket</td>";
                                    echo '<td>
                                            <a href="'.site_url("adm_tiket/hapusmeta/$row->id_metatiket").'" class="btn btn-danger btn-icon"><i class="entypo-erase"></i>&nbsp Hapus</a></td>
                                        </tr>
                                    ';
                                    $i++;
                                }
                             ?>
                        </tbody>
                    </table>
                    <br>
                        <?= form_open('adm_tiket/tambah'); ?>
                        <button type="submit" name="simpan" value="simpan" class="form-control btn btn-success">Simpan</button>
                        <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <!--/.col (right) -->
</div>