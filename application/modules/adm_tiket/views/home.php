<?php if ($this->session->flashdata('info')): ?>
    <?php echo "<script type='text/javascript'>alert('".$this->session->flashdata('info')."')</script>"; ?>
<?php endif ?>

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box panel-saya">
            <div class="box-header">
                <center><h3 class="box-title"><?= @$MASTER['DATA']['SUBTITLE'] ?></h3>
                <br><br>
                <a href="<?= site_url('adm_tiket/tambah') ?>" class="btn btn-icon btn-lg btn-success"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
                </center>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="table-3" class="table table-bordered table-striped datatable">
                    <thead>
                        <tr class="replace-inputs">
                            <th width="10">No.</th>
                            <th width="300">Event</th>
                            <th width="">Harga Tiket</th>
                            <th width="">Diskon Tiket</th>
                            <th width="">Stok Tiket</th>
                            <th width="170">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $base = base_url();
                        $i = 1;
                        foreach ($list->result() as $row) {
                            echo "
                                <tr>
                                    <td>$i</td>
                                    <td>$row->judul_event</td>
                                    <td>$row->harga_tiket</td>
                                    <td>$row->diskon_tiket%</td>
                                    <td>$row->stok_tiket</td>";
                            echo '<td>
                                    <a href="'.site_url("adm_tiket/edit/$row->id_tiket").'" class="btn btn-icon btn-orange"><i class="entypo-pencil"></i>&nbsp Edit</a>
                                    <a href="'.site_url("adm_tiket/hapus/$row->id_tiket").'" onclick="return confirm(\'Apakah ingin menghapus data ini?\')" class="btn btn-icon btn-danger"><i class="entypo-erase"></i>&nbsp Hapus</a></td>
                                </tr>
                            ';
                            $i++;
                        }

                     ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Event</th>
                            <th>Harga Tiket</th>
                            <th>Diskon Tiket</th>
                            <th>Stok Tiket</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.box -->
    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <!--/.col (right) -->
</div>