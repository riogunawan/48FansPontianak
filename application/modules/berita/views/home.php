<!-- Section: inner-header -->
<section class="inner-header divider layer-overlay overlay-dark" data-bg-img="<?= base_url() ?>assets/images/1500x500.jpg">
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

<!-- Section: Blog -->
<section>
  <div class="container mt-30 mb-30 pt-30 pb-30">
    <div class="row">
        <!-- <div class="col-md-5 pull-right">
            <form action="<?= base_url() ?>berita/cari" method="get">
                <div class="input-group">
                    <input type="text" name="key" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">cari</button>
                    </span>
                </div>
            </form>
         </div> -->
      <div class="col-sm-12 col-md-8">
      <?php
        if(empty($qberita)) {
         echo '<section class="bg-white-f7">
                  <div class="container pb-0">
                    <div class="section-title">
                      <div class="row">
                        <div class="col-md-6">
                          <h5 class="sub-title left-side-line">Maaf</h5>
                          <h2 class="title">Tidak Ada Berita</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>';
        } else {

        $base = base_url();
        foreach ($qberita as $rowberita) {
            // $no++;
            echo "
                <div class='upcoming-events box-hover-effect effect1 bg-light mb-20'>
                  <div class='row equal-height'>
                    <div class='col-sm-4 pr-0 pr-sm-15'>
                      <div class='thumb p-15'>
                        <img class='img-fullwidth' src='{$base}assets/uploads/$rowberita->foto_berita' alt='TIdak ada foto berita' height='150px'>
                      </div>
                    </div>
                    <div class='col-sm-8 border-right pl-0 pl-sm-15 mobile-card'>
                      <div class='event-details p-15 mt-20'>
                        <h4 class='media-heading text-uppercase font-weight-500'>$rowberita->judul_berita</h4>
                        <p>".$cetak = substr(htmlspecialchars($rowberita->isi_berita), 0, 140)."...</p>
                        <a href='".site_url('berita/lihat/'.$rowberita->id_berita)."' class='btn btn-theme-colored btn-sm'>More <i class='fa fa-angle-double-right'></i></a>
                        <ul class='list-inline entry-date pull-right font-12 mt-5'>
                            <li><a class='text-theme-colored' href='".site_url('anggota48ptk/lihat'.$rowberita->id_akun)."'>$rowberita->nama_akun |</a></li>
                            <li><span class='text-theme-colored'>".tgl_indo($rowberita->tgl_berita)." </span></li>
                            <li><span class='btn btn-flat btn-dark btn-xs'>$rowberita->jns_berita</span></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
            ";
        }}
      ?>
        <center>
            <nav>
                <?= $paging; ?>
            </nav>
        </center>
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
                                                <img alt='tidak ada poster' src='{$base}assets/uploads/$row->poster_event' class='media-object'>
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
                                                <img alt='tidak ada poster' src='{$base}assets/uploads/$row->poster_event' class='media-object'>
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
      </div>
    </div>
  </div>
</section>