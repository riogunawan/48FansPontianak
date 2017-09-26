<!-- Section: inner-header -->
<section class="inner-header divider layer-overlay overlay-dark" data-bg-img="<?php echo base_url() ?>assets/images/1500x500.jpg" style="background-image: url(<?= base_url() ?>assets/images/1500x500.jpg);">
  <div class="container pt-30 pb-30">
    <!-- Section Content -->
    <div class="section-content text-center">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
          <h2 class="text-theme-colored font-36"><?= $detail->nama_idol_group ?></h2>
          <ol class="breadcrumb text-center mt-10 white">
            <li><a href="<?= site_url('') ?>">Home</a></li>
            <li><a href="<?= site_url('idol_group') ?>"><?= @$MASTER['DATA']['SUBTITLE'] ?></a></li>
            <li class="active"><?= $detail->nama_idol_group ?></li>
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
                <h5>Idol Group:</h5>
                <p><?= $detail->nama_idol_group ?></p>
              </li>
              <li>
                <h5>Berdiri:</h5>
                <p><?= $detail->tahun_idol_group ?></p>
              </li>
              <li>
                <h5>Lokasi:</h5>
                <p><?= $detail->lokasi_idol_group ?></p>
              </li>
              <li>
                <h5>Jumlah Idol:</h5>
                <p><?= $Jumlah->num_rows() ?></p>
              </li>
              <li>
                <h5>Website:</h5>
                <a href="<?= $detail->link_idol_group ?>"><?= $detail->link_idol_group ?></a>
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
            <img src="<?= base_url() ?>assets/uploads/<?= $detail->banner_idol_group ?>" alt="logo idol group" class="img-fullwidth">
          </div>
        </div>
        <!-- ISI DESKRIPSI -->
        <div class="row mt-60">
          <div class="col-md-6">
            <h4 class="mt-0">Deskripsi Idol Group</h4>
            <p><?= $detail->ket_idol_group ?></p>
          </div>
          <div class="col-md-6">
            <blockquote>
              <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
              <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer> -->
              <center><img src="<?= base_url() ?>assets/uploads/<?= $detail->logo_idol_group ?>" alt="logo idol group"></center>
            </blockquote>
          </div>
        </div>
        <!-- DAFTAR IDOL -->
        <div class="row mt-60">
          <div class="col-md-12">
            <h4 class="mb-20">Idol</h4>
          </div>
          <?php
            if (empty($Jumlah->result())) {
              echo '<h1>Tidak Ada Idol</h1>';
            } else {
            $base = base_url();
            foreach ($Jumlah->result() as $row) {
              echo "
                <div class='col-xs-6 col-sm-4 col-md-2 mb-sm-30 card_idol'>
                  <div class='attorney text-center'>
                    <div class='thumb'><img src='{$base}assets/uploads/$row->foto_idol' alt='' height='120'></div>
                    <div class='content text-center'>
                      <h5 class='author mb-0'><a class='text-theme-colored' href='".site_url('idol_group/idol/')."$row->id_idol'>$row->nama_idol</a></h5>
                      <h6 class='title text-gray font-12 mt-0 mb-0'>$row->panggilan_idol</h6>
                    </div>
                  </div>
                </div>
              ";
            }
          }
           ?>
        </div>
      </div>
      <!-- KANAN -->
      <div class="col-sm-12 col-md-4">
        <div class="sidebar sidebar-right mt-sm-30">
          <div class="widget">
            <div class="wow fadeInRight animation-delay3">
                <h4 class="text-uppercase line-bottom mt-0">Events</h4>
                <div class="bxslider bx-nav-top">
                    <?php
                        $base = base_url();
                        foreach ($ListEvent as $row) {
                            echo "
                                <div class='event media sm-maxwidth400 p-15 mt-0 mb-15'>
                                    <div class='row'>
                                        <div class='col-xs-3 p-0'>
                                            <div class='thumb pl-15'>
                                                <img alt='gambar' src='{$base}assets/uploads/$row->poster_event' class='media-object'>
                                            </div>
                                        </div>
                                        <div class='col-xs-6 p-0 pl-15'>
                                            <div class='event-content'>
                                                <h5 class='media-heading text-uppercase'><a href='".site_url('event_gathering/lihat/')."$row->id_event' class='tulis-hover'>$row->judul_event</a></h5>
                                                <ul>
                                                    <li><i class='fa fa-clock-o'></i> &nbsp; pukul $row->waktu_event</li>
                                                    <li><i class='fa fa-map-marker'></i> &nbsp; di $row->lokasi_event.</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class='col-xs-3 pr-0'>
                                            <div class='event-date text-center'>
                                                <ul>
                                                    <li class='font-36 text-theme-colored font-weight-700'>".substr(tgl_indo($row->tgl_event), 0, 2)."</li>
                                                    <li class='font-20 text-center text-uppercase'>".substr(tgl_indo($row->tgl_event), 3, 3)."</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    ?>
                </div>
            </div>
          </div>
          <div class="widget">
            <div class="wow fadeInRight animation-delay4">
                <h4 class="text-uppercase line-bottom mt-0">Gathering</h4>
                <div class="bxslider bx-nav-top">
                    <?php
                        $base = base_url();
                        foreach ($ListGath as $row) {
                            echo "
                                <div class='event media sm-maxwidth400 p-15 mt-0 mb-15'>
                                    <div class='row'>
                                        <div class='col-xs-3 p-0'>
                                            <div class='thumb pl-15'>
                                                <img alt='gambar' src='{$base}assets/uploads/$row->poster_event' class='media-object'>
                                            </div>
                                        </div>
                                        <div class='col-xs-6 p-0 pl-15'>
                                            <div class='event-content'>
                                                <h5 class='media-heading text-uppercase'><a href='".site_url('event_gathering/lihat/')."$row->id_event' class='tulis-hover'>$row->judul_event</a></h5>
                                                <ul>
                                                    <li><i class='fa fa-clock-o'></i> &nbsp; pukul $row->waktu_event</li>
                                                    <li><i class='fa fa-map-marker'></i> &nbsp; di $row->lokasi_event.</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class='col-xs-3 pr-0'>
                                            <div class='event-date text-center'>
                                                <ul>
                                                    <li class='font-36 text-theme-colored font-weight-700'>".substr(tgl_indo($row->tgl_event), 0, 2)."</li>
                                                    <li class='font-20 text-center text-uppercase'>".substr(tgl_indo($row->tgl_event), 3, 3)."</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    ?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>