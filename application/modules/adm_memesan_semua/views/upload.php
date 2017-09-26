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
                <table id="table-3" class="table table-bordered table-striped table-hover datatable">
                    <thead>
                        <tr class="replace-inputs">
                            <th>No.</th>
                            <th>No. Pemesanan</th>
                            <th>Event</th>
                            <th>Jenis Tiket</th>
                            <th>Harga Tiket</th>
                            <th>Jumlah Tiket</th>
                            <th>Diskon</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 1;
                        $total = 0;
                        foreach ($list->result() as $row) {
                            echo "
                                <tr>
                                    <td>$i</td>
                                    <td>$row->no_memesan</td>
                                    <td>$row->judul_event</td>
                                    <td>$row->jenis_tiket</td>
                                    <td>Rp $row->harga_tiket ,-</td>
                                    <td>$row->jumlah_tiket</td>
                                    <td>$row->diskon_tiket%</td>
                                    <td>Rp $row->total_harga ,-</td>";
                            $total = $total + $row->total_harga;
                            $i++;
                        }
                     ?>
                        <tr class="info">
                            <td colspan="8"></td>
                        </tr>
                        <tr class="success">
                            <td colspan="6"></td>
                            <td class="warning"><b>TOTAL</b></td>
                            <td class="warning"><b>Rp <?= $total ?> ,-</b></td>
                        </tr>
                    </tbody>
                </table>
                <div class="">
                            <!-- FOTO -->
                            <div class="form-group col-sm-12">
                                <label class="col-xs-12 col-sm-3 control-label" style="font-size: 25px; color: #555;">Foto Resi</label>
                                <a href="javascript:;" onclick="jQuery('#modal-7').modal('show', {backdrop: 'static'});"><img src="<?= base_url('assets/uploads/') ?><?= $list->row('foto_resi') ?>" alt="Foto Resi Belum Ada" class="col-xs-12 col-sm-3" height="250"></a>
                                <div class="col-xs-12 col-sm-3">
                                </div>
                            </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <center><input type="button" value="Go Back" onclick="history.back(-1)" class="btn btn-warning" />&nbsp;
                            <?php
                             echo '<a href="'.site_url("adm_memesan_semua/konfirmasi/").''.$list->row('no_memesan').'" class="btn btn-primary btn-sm btn-icon icon-left"><i class="fa fa-check-square-o"></i>Konfirmasi</a>';
                            ?>
                            </center>
                        </div>
                </div>
                <script type="text/javascript">
                function showAjaxModal()
                {
                    jQuery('#modal-7').modal('show', {backdrop: 'static'});

                    jQuery.ajax({
                        url: "data/ajax-content.txt",
                        success: function(response)
                        {
                            jQuery('#modal-7 .modal-body').html(response);
                        }
                    });
                }
                </script>
            </div>
        </div>
        <!-- /.box -->
    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <!--/.col (right) -->
</div>

<!-- Modal 4 (Confirm)-->
<div class="modal fade" id="modal-7" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Foto Resi</h4>
            </div>

            <div class="modal-body">

                <img src="<?= base_url('assets/uploads/') ?><?= $list->row('foto_resi') ?>" alt="Foto Resi Belum Ada" class="img-responsive">

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>