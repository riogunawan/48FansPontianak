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
                <a href="<?= site_url('adm_pengurus/tambah') ?>" class="btn btn-lg btn-success btn-icon"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
                </center>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="table-3" class="table table-bordered table-striped datatable">
                    <thead>
                        <tr class="replace-inputs">
                            <th width="10">No.</th>
                            <th width="">Nama</th>
                            <th width="">E-mail</th>
                            <th width="80">Foto</th>
                            <th width="100">Keanggotaan</th>
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
                                    <td>$row->nama_akun</td>
                                    <td>$row->email_akun</td>
                                    <td><img src='{$base}assets/uploads/$row->foto_akun' alt='' width=80></td>
                                    <td>$row->keanggotaan</td>";
                            echo '<td>
                                    <a href="'.site_url("adm_pengurus/edit/$row->id_akun").'" class="btn btn-orange btn-icon"><i class="entypo-pencil"></i>&nbsp Edit</a>
                                    <a href="'.site_url("adm_pengurus/hapus/$row->id_akun").'" onclick="return confirm(\'Apakah ingin menghapus data ini?\')" class="btn btn-danger btn-icon"><i class="entypo-erase"></i>&nbsp Hapus</a></td>
                                </tr>
                            ';
                            $i++;
                        }

                     ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>E-mail</th>
                            <th>Foto</th>
                            <th>Keanggotaan</th>
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