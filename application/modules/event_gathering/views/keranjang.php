<!-- Section: inner-header -->
<section class="inner-header divider layer-overlay overlay-dark" data-bg-img="<?php echo base_url() ?>assets/images/1500x500.jpg" style="background-image: url(<?= base_url() ?>assets/images/1500x500.jpg);">
  <div class="container pt-30 pb-30">
    <!-- Section Content -->
    <div class="section-content text-center">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
          <h2 class="text-theme-colored font-36">Keranjang</h2>
          <ol class="breadcrumb text-center mt-10 white">
            <li><a href="<?= site_url('') ?>">Home</a></li>
            <li><a href="<?= site_url('event_gathering') ?>"><?= @$MASTER['DATA']['SUBTITLE'] ?></a></li>
            <li class="active">Keranjang</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section Blog -->
<section>
  <div class="container mt-30 mb-30 pt-30 pb-30">
    <div class="row">
      <!-- KIRI -->
      <div class="col-sm-12 col-md-12">
        <div class="table-responsive">
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Event</th>
                <th>Jenis Tiket</th>
                <th>Jumlah Tiket</th>
                <th>Diskon</th>
                <th>Total Harga Tiket</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $total = 0;
                $i = 1;
                foreach ($listtiket->result() as $row) {
                  echo "
                      <tr>
                          <td>$i</td>
                          <td>$row->judul_event</td>
                          <td>$row->jenis_tiket</td>
                          <td>$row->jumlah_tiket</td>
                          <td>$row->diskon_tiket %</td>
                          <td>Rp $row->total_harga ,-</td>";
                  echo '<td>
                          <a href="'.site_url("event_gathering/hapusmeta/$row->id_metamemesan").'" onclick="return confirm(\'Apakah ingin menghapus data ini?\')" class="btn btn-danger"><i class="fa fa-close"></i>&nbsp Hapus</a></td>
                      </tr>
                  ';
                  $total = $total + $row->total_harga;
                  $i++;
                }
               ?>
               <tr class="success">
                 <td colspan="1"></td>
                 <td colspan="4"><b>TOTAL</b></td>
                 <td colspan="2" class="danger"><b>Rp <?= $total ?>,-</b></td>
               </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-12">
        <div class="col-md-8">
          <h3>Cara Pembayaran</h3>
          <legend></legend>
          <p>- Lakukan pembayaran melalui transfer uang melalui ATM/BANK</p>
          <p>- Nomor Rekening Tujuan pembayaran akan dikirim ke e-mail pemesan tiket setelah menekan tombol Pesan</p>
          <p>- Kirim foto struk bukti pembayaran tiket di halaman admin 48FansPontianak</p>
          <p>- Pada menu Konfirmasi Pembayaran*</p>
          <p>- Kode Tiket akan dikirim ke e-mail pemesan tiket setelah Admin mengkonfirmasi pembayaran</p>
          <legend></legend>
          <p style="color: red">*Jika dalam 1x24 jam tidak mengkonfirmasi pembayaran maka pemesanan tiket dibatalkan</p>
        </div>
        <div class="col-md-4">
          <?php if ($this->session->flashdata('info')): ?>
              <?php echo "<script type='text/javascript'>alert('".$this->session->flashdata('info')."')</script>"; ?>
          <?php endif ?>
          <?= form_open('event_gathering/lihatkeranjang/'); ?>
            <button type="submit" class="btn btn-success btn-block" name="pesan" value="pesan"><i class="fa fa-send"></i>&nbsp; Pesan</button>
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</section>