<!-- Section: inner-header -->
<section class="inner-header divider layer-overlay overlay-dark" data-bg-img="<?php echo base_url() ?>assets/images/1500x500.jpg">
  <div class="container pt-30 pb-30">
    <!-- Section Content -->
    <div class="section-content text-center">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
          <h2 class="text-theme-colored font-36"><?= @$MASTER['DATA']['SUBTITLE'] ?></h2>
          <ol class="breadcrumb text-center mt-10 white">
            <li><a href="<?= site_url('') ?>">Home</a></li>
            <li class="active"><?= @$MASTER['DATA']['SUBTITLE'] ?></li>
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
        <div class="col-sm-12 col-md-6 wow fadeInRight animation-delay6">
            <h4 class="text-uppercase line-bottom mt-0">Events</h4>
            <div class="">
                <?php
                  $base = base_url();
                  foreach ($detail_event as $row) {
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
                                          <h5 class='media-heading text-uppercase'><a href='".site_url('event_gathering/lihat/'.$row->id_event)."' class='tulis-hover'>$row->judul_event</a></h5>
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
        <div class="col-sm-12 col-md-6 wow fadeInRight animation-delay6">
          <h4 class="text-uppercase line-bottom mt-0">Gathering</h4>
          <div class="">
              <?php
                $base = base_url();
                foreach ($detail_gath as $row) {
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
                                        <h5 class='media-heading text-uppercase'><a href='".site_url('event_gathering/lihat/'.$row->id_event)."' class='tulis-hover'>$row->judul_event</a></h5>
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
</section>