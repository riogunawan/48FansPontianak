<?php if ($this->session->flashdata('info')): ?>
    <?php echo "<script type='text/javascript'>alert('".$this->session->flashdata('info')."')</script>"; ?>
<?php endif ?>

<div class="row">
    <!-- left column -->
    <div class="col-xs-12 col-md-12">
        <!-- general form elements -->
        <div class="box panel-saya col-xs-12 col-md-12">
            <div class="box-header">
                <center><h3 class="box-title"><?= @$MASTER['DATA']['SUBTITLE'] ?></h3>
                <br><br>
                </center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                    foreach ($list->result() as $row) {
                        echo '
                            <div class="col-xs-12 col-md-12 kertas-tiket">
                                <div class="col-xs-2 col-md-2">
                                    <img src="'.base_url('assets/images/logo_48fanspontianak.jpg').'" class="img-responsive" alt="tidak ada logo" height="100">
                                </div>
                                <div class="col-xs-10 col-md-7">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <td width="100">Event</td>
                                                    <td width="20">:</td>
                                                    <td>'.$row->judul_event.'</td>
                                                </tr>
                                                <tr>
                                                    <td>Kode Tiket</td>
                                                    <td>:</td>
                                                    <td>'.$row->kode_tiket.'</td>
                                                </tr>
                                                <tr>
                                                    <td>Pembeli</td>
                                                    <td>:</td>
                                                    <td>'.$row->nama_akun.'</td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis Tiket</td>
                                                    <td>:</td>
                                                    <td>'.$row->jenis_tiket.'</td>
                                                </tr>
                                                <tr>
                                                    <td>Jumlah Tiket</td>
                                                    <td>:</td>
                                                    <td>'.$row->jumlah_tiket.'</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                 ?>

            </div>
        </div>
        <!-- /.box -->
    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <!--/.col (right) -->
</div>