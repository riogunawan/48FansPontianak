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
                <a href="<?= site_url('adm_event/tambah') ?>" class="btn btn-lg btn-success btn-icon"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="table-3" class="table table-bordered table-striped datatable">
                    <thead>
                        <tr class="replace-inputs text-center">
                            <th width="10">No.</th>
                            <th width="">Judul Event</th>
                            <th width="">Tanggal Event</th>
                            <th width="">Tanggal Posting</th>
                            <th width="60">Poster Event</th>
                            <th>Diposting</th>
                            <th>Tiket Online</th>
                            <th width="170" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        // Kita akan melakukan looping sesuai dengan data yang dimiliki
                        $base = base_url();
                        $i = 1; // nantinya akan digunakan untuk pengisian Nomor
                        foreach ($listBerita->result() as $row) {
                            echo "
                                <tr>
                                    <td>$i</td>
                                    <td>$row->judul_event</td>
                                    <td>$row->tgl_event</td>
                                    <td>$row->tgl_posting_event</td>
                                    <td><img src='{$base}assets/uploads/$row->poster_event' alt='' width=100></td>
                                    <td>$row->nama_akun</td>
                                    <td>$row->tiket_online</td>";
                            echo '<td>
                                    <a href="'.site_url("adm_event/edit/$row->id_event").'" class="btn btn-orange btn-icon"><i class="entypo-pencil"></i>&nbsp Edit</a>
                                    <a href="'.site_url("adm_event/hapus/$row->id_event").'" onclick="return confirm(\'Apakah ingin menghapus data ini?\')" class="btn btn-danger btn-icon"><i class="entypo-erase"></i>&nbsp Hapus</a></td>
                                </tr>
                            ';
                            $i++;
                        }

                     ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Judul Event</th>
                            <th>Tanggal Event</th>
                            <th>Tanggal Posting</th>
                            <th>Poster Event</th>
                            <th>Diposting</th>
                            <th>Tiket Online</th>
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