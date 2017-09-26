<footer id="footer" class="footer pb-0" data-bg-img="<?= base_url() ?>assets/charityfund/images/pattern/p14.png" data-bg-color="#25272e" style="background:url(<?= base_url() ?>assets/charityfund/images/pattern/p14.png);">
    <div class="container pb-20">
        <div class="row multi-row-clearfix">
            <div class="col-sm-6 col-md-2">
                <div class="widget dark">
                    <img alt="" src="<?= base_url() ?>assets/uploads/<?= @$MASTER['DATA']['MenuAbout']->foto_about; ?>" style="width: 200px;">
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <p class="font-14 mt-20 mb-10"><?= @$MASTER['DATA']['MenuAbout']->isi_about; ?></p>
                <a class="text-gray font-12" href="#"><i class="fa fa-angle-double-right text-theme-colored"></i> Selengkapnya</a>
                <ul class="styled-icons icon-dark mt-20">
                    <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".1s" data-wow-offset="10"><a href="<?= @$MASTER['DATA']['MenuAbout']->link_fb_about; ?>" data-bg-color="#3B5998"><i class="fa fa-facebook"></i></a></li>
                    <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".4s" data-wow-offset="10"><a href="<?= @$MASTER['DATA']['MenuAbout']->link_twitter_about; ?>" data-bg-color="#02B0E8"><i class="fa fa-twitter"></i></a></li>
                    <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".7s" data-wow-offset="10"><a href="<?= @$MASTER['DATA']['MenuAbout']->link_youtube_about; ?>" data-bg-color="#C22E2A"><i class="fa fa-youtube-play"></i></a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">Quick Contact</h5>
                    <ul class="list-border">
                        <li><a href="#"><i class="fa fa-phone text-theme-colored"></i>&nbsp; <?= @$MASTER['DATA']['MenuAbout']->nohp_about; ?></a></li>
                        <li><a href="#"><i class="fa fa-envelope-o text-theme-colored"></i>&nbsp; <?= @$MASTER['DATA']['MenuAbout']->email_about; ?></a></li>
                        <li><a href="#" class="lineheight-20"><i class="fa fa-clock-o text-theme-colored"></i>&nbsp; Senin-Minggu 12:00 WIB - 22:00 WIB</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-theme-colored p-20">
        <div class="row text-center">
            <div class="col-md-12">
                <p class="text-white font-11 m-0">Copyright &copy;2015 ThemeMascot. Powered by Rio Gunawan.</p>
            </div>
        </div>
    </div>
</footer>