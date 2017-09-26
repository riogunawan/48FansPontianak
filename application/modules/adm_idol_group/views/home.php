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
                <a href="<?= site_url('adm_idol_group/tambah') ?>" class="btn btn-lg btn-success btn-icon"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="table-3" class="table table-bordered table-striped datatable">
                    <thead>
                        <tr class="replace-inputs">
                            <th width="10">No.</th>
                            <th width="">Nama</th>
                            <th width="80">Logo</th>
                            <th width="100">link</th>
                            <th width="170">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $base = base_url();
                        $i = 1;
                        foreach ($listBerita->result() as $row) {
                            echo "
                                <tr>
                                    <td>$i</td>
                                    <td>$row->nama_idol_group</td>
                                    <td><img src='{$base}assets/uploads/$row->logo_idol_group' alt='Logo belum ada' width=100></td>
                                    <td>$row->link_idol_group</td>";
                            echo '<td>
                                    <a href="'.site_url("adm_idol_group/edit/$row->id_idol_group").'" class="btn btn-orange btn-icon"><i class="entypo-pencil"></i>&nbsp Edit</a>
                                    <a href="'.site_url("adm_idol_group/hapus/$row->id_idol_group").'" onclick="return confirm(\'Apakah ingin menghapus data ini?\')" class="btn btn-danger btn-icon"><i class="entypo-erase"></i>&nbsp Hapus</a></td>
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
                            <th>Logo</th>
                            <th>link</th>
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