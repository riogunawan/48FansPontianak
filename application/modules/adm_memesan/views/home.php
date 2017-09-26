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
                </center>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="table-3" class="table table-bordered table-striped datatable">
                    <thead>
                        <tr class="replace-inputs">
                            <th>No.</th>
                            <th>No. Pemesanan</th>
                            <th>Status Konfirmasi</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Jumlah Tiket</th>
                            <th>Total</th>
                            <th>Struk Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 1;
                        foreach ($list->result() as $row) {
                            echo "
                                <tr>
                                    <td>$i</td>
                                    <td>$row->no_memesan</td>
                                    <td><b>$row->status_bayar</b></td>
                                    <td>$row->tgl_memesan</td>
                                    <td>$row->jumlah_tiket</td>
                                    <td>Rp $row->total_harga ,-</td>
                                    ";
                            echo '<td>
                                    <a href="'.site_url("adm_memesan/upload_resi/$row->no_memesan").'" class="btn btn-orange"><i class="fa fa-upload"></i>&nbsp Upload Resi</a>
                                    </td>';
                            echo '<td>
                                    <a href="'.site_url("adm_memesan/cetak/$row->no_memesan").'" class="btn btn-success"><i class="fa fa-barcode"></i>&nbsp Minta Kode Tiket</a>
                                    </td>';
                            echo '</tr>';
                            $i++;
                        }
                     ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box -->
    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <!--/.col (right) -->
</div>