<!-- Section: inner-header -->
<section class="inner-header divider layer-overlay overlay-dark" data-bg-img="<?php echo base_url() ?>assets/images/1500x500.jpg" style="background-image: url(<?= base_url() ?>assets/images/1500x500.jpg);">
  <div class="container pt-30 pb-30">
    <!-- Section Content -->
    <div class="section-content text-center">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
          <h2 class="text-theme-colored font-36"><?= $detail->judul_event ?></h2>
          <ol class="breadcrumb text-center mt-10 white">
            <li><a href="<?= site_url('') ?>">Home</a></li>
            <li><a href="<?= site_url('event_gathering') ?>"><?= @$MASTER['DATA']['SUBTITLE'] ?></a></li>
            <li class="active"><?= $detail->judul_event ?></li>
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
      <div class="col-sm-12 col-md-8">
        <div class="row">
          <div class="col-md-4">
            <ul>
              <li>
                <h5>Tema Event:</h5>
                <p><?= $detail->judul_event ?></p>
              </li>
              <li>
                <h5>Tanggal Pelaksanaan:</h5>
                <p><span class="fa fa-calendar-o"></span>&nbsp;<?= nama_hari($detail->tgl_event) ?>,&nbsp;<?= tgl_indo($detail->tgl_event) ?></p>
              </li>
              <li>
                <h5>Waktu Pelaksanaan:</h5>
                <p><span class="fa fa-clock-o"></span>&nbsp; <?= $detail->waktu_event ?></p>
              </li>
              <li>
                <h5>Bagikan:</h5>
                <div class="styled-icons icon-sm icon-gray icon-circled">
                  <a href="#"><i class="fa fa-facebook"></i></a>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                  <a href="#"><i class="fa fa-google-plus"></i></a>
                </div>
              </li>
            </ul>
          </div>
          <div class="col-md-8">
            <img src="<?= base_url() ?>assets/uploads/<?= $detail->poster_event ?>" alt="logo idol group" class="img-fullwidth">
          </div>
        </div>
        <!-- ISI DESKRIPSI -->
        <div class="row mt-60">
          <div class="col-md-5">
            <h4 class="mt-0">Deskripsi Event</h4>
            <p><?= $detail->isi_event ?></p>
          </div>
          <div class="col-md-7">
            <blockquote class="col-md-12">
              <p>Tiket Online</p>
              <table>
                <tbody>
              <?php
                if ($detail->tiket_online == 'tersedia') {
                  if ($listtiket->row('id_event') == $detail->id_event) {
                    foreach ($listtiket->result() as $row) {
                      echo form_open("event_gathering/keranjang/{$row->id_tiket}");
                      echo "<tr>
                              <td><b>$row->jenis_tiket</b></td>
                              <td>&nbsp;| &nbsp;Rp &nbsp;$row->harga_tiket ,-&nbsp;</td>
                              <td><input type='number' name='jumlah_tiket' class='form-control' value='1' min='1' max='5'></td>
                              <td>&nbsp;<button type='submit' class='btn btn-sm btn-success'>Beli</button></td>
                            </tr>";
                      echo form_close();
                      echo '<tr style="border-bottom: 1px solid #bbb;">
                              <td>Stok Tiket</td>
                              <td colspan="3">&nbsp;=&nbsp;'.$row->stok_tiket.' Tiket</td>
                            </tr>';
                    }
                  } else {
                    echo "<footer>Tidak Tersedia</footer>";
                  }
                } elseif (!$detail->tiket_online || $detail->tiket_online == 'tidak tersedia') {
                  echo "<footer>Tidak Tersedia</footer>";
                }
               ?>
                </tbody>
              </table>
            </blockquote>
          </div>
        </div>
        <!-- MAP -->
        <div class="row">
          <div class="col-md-12">
            <h5>Lokasi:</h5>
                <p><span class="fa fa-map"></span>&nbsp; <?= $detail->lokasi_event ?></p>
            <div class="map">
              <div id="map">
              </div>
              <script>
                  function initMap() {
                    var uluru = {lat: <?= $detail->latitude ?>, lng: <?= $detail->longitude ?>};
                    var map = new google.maps.Map(document.getElementById('map'), {
                      zoom: 17,
                      draggable: false,
                      scrollwheel: false,
                      center: uluru
                    });
                    var marker = new google.maps.Marker({
                      position: uluru,
                      animation: google.maps.Animation.BOUNCE,
                      map: map
                    });
                  }
              </script>
              <script async defer
              src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkkPvqDOaSXSmG8KEzy1u22ErzLrOM8uY&callback=initMap">
              </script>

            </div>
          </div>
        </div>
      </div>
      <!-- KANAN -->
      <div class="col-sm-12 col-md-4">
        <div class="sidebar sidebar-right mt-sm-30">
          <div class="widget">
            <div class="wow fadeInRight animation-delay3">
                <h4 class="text-uppercase line-bottom mt-0">Tweet Twitter</h4>
                <div class="event media">
                    <a class="twitter-timeline" data-lang="id" data-height="700" data-dnt="true" data-theme="light" data-link-color="#E81C4F" href="<?= @$MASTER['DATA']['MenuAbout']->link_twitter_about; ?>">Tweets by 48FansPontianak</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>