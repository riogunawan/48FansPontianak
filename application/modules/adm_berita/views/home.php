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
                </center>
                <br><br>
                <a href="<?= site_url('adm_berita/tambah') ?>" class="btn btn-lg btn-success btn-icon"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="table-3" class="table table-bordered table-striped datatable">
                    <thead>
                        <tr class="replace-inputs">
                            <th width="10">No.</th>
                            <th width="200">Judul Berita</th>
                            <th width="80">Tanggal Berita</th>
                            <th width="80">Jenis Berita</th>
                            <th width="60">Foto Berita</th>
                            <th width="130">Aksi</th>
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
                                    <td>$row->judul_berita</td>
                                    <td>$row->tgl_berita</td>
                                    <td>$row->jns_berita</td>
                                    <td><img src='{$base}assets/uploads/$row->foto_berita' alt='' width=100></td>";
                                    if ($this->session->userdata('level_akun') == 3) {
                                        echo '<td>
                                                Tidak Ada</td>
                                            </tr>
                                        ';
                                    } else {
                                        echo '<td>
                                                <a href="'.site_url("adm_berita/edit/$row->id_berita").'" class="btn btn-orange btn-icon"><i class="entypo-pencil"></i>&nbsp Edit</a>
                                                <a href="'.site_url("adm_berita/hapus/$row->id_berita").'" onclick="return confirm(\'Apakah ingin menghapus data ini?\')" class="btn btn-danger btn-icon"><i class="entypo-erase"></i>&nbsp Hapus</a></td>
                                            </tr>
                                        ';
                                    }
                            $i++;
                        }

                     ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Judul Berita</th>
                            <th>Tanggal Berita</th>
                            <th>Jenis Berita</th>
                            <th>Foto Berita</th>
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