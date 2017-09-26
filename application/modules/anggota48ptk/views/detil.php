<!-- Section: inner-header -->
<section class="inner-header divider layer-overlay overlay-dark" data-bg-img="<?php echo base_url() ?>assets/images/1500x500.jpg" style="background-image: url(<?= base_url() ?>assets/images/1500x500.jpg);">
  <div class="container pt-30 pb-30">
    <!-- Section Content -->
    <div class="section-content text-center">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
          <h2 class="text-theme-colored font-36"><?= $detail->nama_akun ?></h2>
          <ol class="breadcrumb text-center mt-10 white">
            <li><a href="<?= site_url('') ?>">Home</a></li>
            <li><a href="<?= site_url('anggota48ptk') ?>"><?= @$MASTER['DATA']['SUBTITLE'] ?></a></li>
            <li class="active"><?= $detail->nama_akun ?></li>
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
        <!-- ISI NYE -->
        <center><h1><?= $detail->nama_akun ?></h1></center>
        <div class="col-sm-12 col-md-12 col-lg-12">
          <div class="section-content">
            <div class="row multi-row-clearfix">
              <div class="col-sm-0 col-md-2">
                <!-- HANYA SPASI UNTUK SUPAYA JADI TENGAH -->
              </div>
              <div class="col-sm-12 col-md-4 mb-sm-60 text-left sm-text-center">
                <img alt="" src="<?= base_url() ?>assets/uploads/<?= $detail->foto_akun ?>" class="img-circle" height="200px" width="200px">
              </div>
              <div class="col-sm-12 col-md-4 mb-sm-60 text-left sm-text-center">
                <div class="volunteer border bg-white-fa mb-30 p-30 text-center">
                  <div class="thumb"><img alt="Tidak Ada Foto Idol" src="<?= base_url() ?>assets/uploads/<?= $detail->foto_idol ?>" class="" height="150px"></div>
                  <div class="info">
                    <h4 class="name"><a href="<?= site_url('idol_group/idol/') ?><?= $detail->id_idol ?>"><?= $detail->nama_idol ?></a></h4>
                    <h6 class="occupation"><?= $detail->nama_idol_group ?></h6>
                  </div>
                </div>
              </div>
              <div class="col-sm-0 col-md-2">
                <!-- HANYA SPASI UNTUK SUPAYA JADI TENGAH -->
              </div>
              <!-- ISI DESKRIPSI -->
              <div class="row mt-60 mb-20">
                <div class="col-md-12">
                  <center>
                    <table class="idol_deskripsi">
                      <tr>
                        <td width="200px"><h5>Nama Panggilan </h5></td>
                        <td>: <?= $detail->panggilan_akun ?></td>
                      </tr>
                      <tr>
                        <td><h5>Tanggal Lahir </h5></td>
                        <td>: <?= nama_hari($detail->ttl_akun) ?>, <?= tgl_indo($detail->ttl_akun) ?></td>
                      </tr>
                      <tr>
                        <td><h5>Golongan Darah </h5></td>
                        <td>: <?= $detail->goldar_akun ?></td>
                      </tr>
                      <tr>
                        <td><h5>Tinggi Badan </h5></td>
                        <td>: <?= $detail->tinggi_akun ?></td>
                      </tr>
                      <tr>
                        <td><h5>Biografi Singkat </h5></td>
                        <td>: <?= $detail->deskripsi_akun ?></td>
                      </tr>
                      <tr>
                        <td colspan="2"><ul class='styled-icons icon-sm icon-dark icon-theme-colored mt-10 mb-0'>
                            <li><a href='<?= $detail->link_fb_akun ?>' target='blank'><i class='fa fa-facebook'></i></a></li>
                            <li><a href='https://www.twitter.com/<?= $detail->link_twitter_akun ?>' target='blank'><i class='fa fa-twitter'></i></a></li>
                            <li><a href='<?= $detail->link_gplus_akun ?>' target='blank'><i class='fa fa-google-plus'></i></a></li>
                          </ul></td>
                      </tr>
                    </table>
                  </center>
                </div>
              </div>
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