<?php if ($this->session->flashdata('info')): ?>
    <?php echo "<script type='text/javascript'>alert('".$this->session->flashdata('info')."')</script>"; ?>
<?php endif ?>

<!-- BAGIAN PERTAMA -->
<div class="row">
    <div class="col-sm-12">
        <div class="well tile-stats tile-red">
            <h1><?= nama_hari(date('y-m-d')) ?>,&nbsp;<?= tgl_indo(date('Y-m-d')) ?></h1>
            <h3>Hello, <strong><?= $this->session->userdata('nama_akun'); ?></strong></h3>
        </div>
    </div>
</div>

<!-- BAGIAN KEDUA -->
<div class="row">

    <?php if ($this->session->userdata('level_akun') != 3): ?>
        <div class="col-sm-12">

            <div class="panel panel-primary table-responsive">
                <div class="panel-heading">
                    <div class="panel-title">Anggota yang baru mendaftar</div>

                    <div class="panel-options">
                        <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Tanggal Mendaftar</th>
                            <th>Foto</th>
                            <th width="200">Action</th>
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
                                        <td>$row->created_akun</td>
                                        <td><img src='{$base}assets/uploads/$row->foto_akun' alt='' width=80></td>";
                                echo '<td>
                                        <a href="'.site_url("adm_anggota48ptk/edit/$row->id_akun").'" class="btn btn-orange btn-sm btn-icon"><i class="entypo-pencil"></i>&nbsp Edit</a>
                                        <a href="'.site_url("adm_anggota48ptk/hapus/$row->id_akun").'" onclick="return confirm(\'Apakah ingin menghapus data ini?\')" class="btn btn-sm btn-icon btn-danger"><i class="entypo-erase"></i>&nbsp Hapus</a></td>
                                    </tr>
                                ';
                                $i++;
                            }
                         ?>
                    </tbody>
                </table>
            </div>

        </div>
    <?php endif ?>

    <div class="col-sm-4">
        <div class="tile-stats tile-black">
            <div class="icon"><i class="entypo-user"></i></div>
            <div class="num" data-start="0" data-end="<?= $jlhanggota; ?>" data-prefix="" data-postfix=" Anggota" data-duration="1500" data-delay="0">0 Anggota</div>
            <h3>48FansPontianak</h3>
            <p>Yang ada didalam website.</p>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="tile-stats tile-purple">
            <div class="icon"><i class="entypo-heart-empty"></i></div>
            <div class="num" data-start="0" data-end="<?= $jlhidol; ?>" data-prefix="" data-postfix=" Idol" data-duration="1500" data-delay="0">0 Idol</div>
            <h3>48Group</h3>
            <p>Yang ada didalam website.</p>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="tile-stats tile-pink">
            <div class="icon"><i class="entypo-mic"></i></div>
            <div class="num" data-start="0" data-end="<?= $jlhidolgroup; ?>" data-prefix="" data-postfix=" Data" data-duration="1500" data-delay="0">0 </div>
            <h3>Idol Group</h3>
            <p>Yang ada didalam website.</p>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="tile-stats tile-red">
            <div class="icon"><i class="entypo-megaphone"></i></div>
            <div class="num" data-start="0" data-end="<?= $jlhevent; ?>" data-prefix="" data-postfix=" Events" data-duration="1500" data-delay="0">0 Events</div>
            <h3>48FansPontianak</h3>
            <p>Yang ada didalam website.</p>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="tile-stats tile-green">
            <div class="icon"><i class="entypo-network"></i></div>
            <div class="num" data-start="0" data-end="<?= $jlhgathering; ?>" data-prefix="" data-postfix=" Gathering" data-duration="1500" data-delay="0">0 Gathering</div>
            <h3>48FansPontianak</h3>
            <p>Yang ada didalam website.</p>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="tile-stats tile-aqua">
            <div class="icon"><i class="entypo-newspaper"></i></div>
            <div class="num" data-start="0" data-end="<?= $jlhberita; ?>" data-prefix="" data-postfix=" Berita" data-duration="1500" data-delay="0">0 Berita</div>
            <h3>48FansPontianak</h3>
            <p>Yang ada didalam website.</p>
        </div>
    </div>

</div>