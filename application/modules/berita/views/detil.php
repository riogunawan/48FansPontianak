<!-- Section: inner-header -->
<section class="inner-header divider layer-overlay overlay-dark" data-bg-img="<?php echo base_url() ?>assets/images/1500x500.jpg" style="background-image: url(<?= base_url() ?>assets/images/1500x500.jpg);">
  <div class="container pt-30 pb-30">
    <!-- Section Content -->
    <div class="section-content text-center">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
          <h2 class="text-theme-colored font-36"><?= $detail->judul_berita ?></h2>
          <ol class="breadcrumb text-center mt-10 white">
            <li><a href="<?= site_url('') ?>">Home</a></li>
            <li><a href="<?= site_url('berita') ?>"><?= @$MASTER['DATA']['SUBTITLE'] ?></a></li>
            <li class="active"><?= $detail->judul_berita ?></li>
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
        <div class="post blog-posts single-post">
          <article class="clearfix mb-0">
            <div class="entry-header">
              <div class="post-thumb thumb"> <img src="<?= base_url() ?>assets/uploads/<?= $detail->foto_berita ?>" alt="Tidak Ada foto berita" class="img-responsive img-fullwidth"> </div>
              <div class="entry-meta meta-absolute text-center pl-15 pr-15">
                <div class="display-table">
                  <div class="display-table-cell">
                    <ul>
                      <li class="mt-20"><a class="text-white" href="#"><i class="text-white fa fa-tags"></i><?= $detail->jns_berita ?></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="entry-meta">
              <ul class="list-inline">
                <li>Sumber gambar: <span class="text-theme-colored"><?= $detail->foto_ket_berita ?></span></li>
              </ul>
            </div>
            <div class="entry-title pt-0">
              <h3><a href="#"><?php $detail->judul_berita ?></a></h3>
            </div>
            <div class="entry-meta">
              <b><ul class="list-inline">
                <li><span class="fa fa-calendar"></span> <span class="text-theme-colored">&nbsp;<?= tgl_indo($detail->tgl_berita) ?></span></li>
                <li><span class="fa fa-user"></span><span class="text-theme-colored">&nbsp;<?= $detail->nama_akun ?></span></li>
              </ul></b>
            </div>
            <br>
            <legend></legend>
            <div class="entry-content mt-10">
              <p class="mb-15"><?= $detail->isi_berita ?></p>
              <div class="mt-30 mb-0">
                <h5 class="pull-left mt-10 mr-20 text-theme-colored">Bagikan:</h5>
                <ul class="styled-icons icon-circled m-0">
                  <li><a href="#" data-bg-color="#3A5795" style="background: rgb(58, 87, 149) !important;"><i class="fa fa-facebook text-white"></i></a></li>
                  <li><a href="#" data-bg-color="#55ACEE" style="background: rgb(85, 172, 238) !important;"><i class="fa fa-twitter text-white"></i></a></li>
                  <li><a href="#" data-bg-color="#A11312" style="background: rgb(161, 19, 18) !important;"><i class="fa fa-google-plus text-white"></i></a></li>
                </ul>
              </div>
            </div>
          </article>
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