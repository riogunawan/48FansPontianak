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
            <div class="box-body">
                <div class="table-responsive">
                    <table id="table-3" class="table table-bordered table-striped datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>No. Pemesanan</th>
                                <th>Nama Pemesan</th>
                                <th>Status Konfirmasi</th>
                                <th>Foto Resi</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Jumlah Tiket</th>
                                <th>Total</th>
                                <th width="100">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                            foreach ($list->result() as $row) {
                            $modal = "jQuery('#modal-4').modal('show', {backdrop: 'static'});";
                                echo "
                                    <tr>
                                        <td>$i</td>
                                        <td>$row->no_memesan</td>
                                        <td>$row->nama_akun</td>
                                        <td><b>$row->status_bayar</b></td>";
                                echo '<td><img src="'.base_url().'assets/uploads/'.$row->foto_resi.'" alt="resi belum ada" height="100"></td>';
                                echo "<td>$row->tgl_memesan</td>
                                        <td>$row->jumlah_tiket</td>
                                        <td>Rp $row->total_harga ,-</td>
                                        ";
                                echo '<td>
                                        <a href="'.site_url("adm_memesan_semua/upload_resi/$row->no_memesan").'" class="btn btn-success btn-sm btn-icon icon-left"><i class="fa fa-check-square-o"></i>Konfirmasi</a><br><br>
                                        <a href="'.site_url("adm_memesan_semua/hapus/$row->no_memesan").'" class="btn btn-danger btn-sm btn-icon icon-left">
                                            <i class="entypo-cancel"></i>Delete</a>
                                        </td>';
                                echo '</tr>';
                                $i++;
                            }
                         ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>No. Pemesanan</th>
                                <th>Nama Pemesan</th>
                                <th>Status Konfirmasi</th>
                                <th>Foto Resi</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Jumlah Tiket</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.box -->
    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <!--/.col (right) -->
</div>