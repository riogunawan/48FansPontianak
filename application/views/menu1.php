<!-- NAVIGASI PALING ATAS -->
<div class="header-top bg-theme-colored sm-text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="widget no-border m-0">
                    <ul class="list-inline sm-text-center mt-5">
                        <li>
                            <a href="<?= site_url('') ?>" class="text-white">48FansPontianak Website</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget no-border m-0">
                    <ul class="styled-icons icon-dark icon-circled icon-theme-colored icon-sm pull-right sm-pull-none sm-text-center mt-sm-15">
                        <li><a href="<?= @$MASTER['DATA']['MenuAbout']->link_youtube_about; ?>"><i class="fa fa-youtube-play text-white"></i></a></li>
                        <li><a href="<?= @$MASTER['DATA']['MenuAbout']->link_fb_about; ?>"><i class="fa fa-facebook text-white"></i></a></li>
                        <li><a href="<?= @$MASTER['DATA']['MenuAbout']->link_twitter_about; ?>"><i class="fa fa-twitter text-white"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- NAVIGASI BAWAH -->
<div class="header-nav">
    <div class="header-nav-wrapper navbar-scrolltofixed bg-light">
        <div class="container">
            <nav id="menuzord" class="menuzord red bg-light" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle bg-theme-colored" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar" style="background-color: #fff;"></span>
                        <span class="icon-bar" style="background-color: #fff;"></span>
                        <span class="icon-bar" style="background-color: #fff;"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <ul class="menuzord-menu collapse navbar-collapse navbar-ex1-collapse">
                    <li class="menu-h"><a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/images/logo_48fanspontianak.jpg" alt="logo" width="30">&nbsp; Home</a></li>
                    <li class="dropdown menu-n">
                        <a href="<?= site_url('berita') ?>" class="dropdown-toggle" data-toggle="dropdown">News <b class="fa fa-angle-down"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= site_url('berita') ?>">48FansPontianak News</a></li>
                            <li><a href="<?= site_url('berita/index48') ?>">48Group News</a></li>
                        </ul>
                    </li>
                    <li class="dropdown menu-ig">
                        <a href="<?= site_url('idol_group') ?>" class="dropdown-toggle" data-toggle="dropdown">Idol Group <b class="fa fa-angle-down"></b></a>
                        <ul class="dropdown-menu">
                            <?php
                                foreach (@$MASTER['DATA']['MenuIdolG'] as $row) {
                                    echo "<li><a href='".site_url('idol_group/group/'.$row->id_idol_group)."'>$row->nama_idol_group</a></li>";
                                }
                            ?>
                        </ul>
                    </li>
                    <li class='menu-g'><a href="<?= site_url('event_gathering') ?>">Gathering & Events</a></li>
                    <li class="menu-m"><a href="<?= site_url('anggota48ptk') ?>">Members</a></li>
                    <li class="menu-sejarah"><a href="<?= site_url('sejarah') ?>">Sejarah</a></li>
                    <li class="menu-a"><a href="#footer">About</a></li>
                </ul>

                <!-- PALING KANAN -->
                <ul class="pull-right">
                    <?php
                        if ($this->session->userdata('masuk') == 'Sudah Login') {
                            echo '
                                <li class="dropdown mt-15 dropprofil">
                                    <a href="'.site_url('event_gathering/lihatkeranjang/'.$this->session->userdata('id_akun')).'" class="menu-k"><i class="fa fa-shopping-cart"></i> <span>&nbsp;'.@$MASTER['DATA']['keranjang'].'</span></a>
                                    <a href="'.site_url('adm_home').'" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="'.base_url('assets/uploads/').''.$this->session->userdata('foto_akun').'" class="img-rounded" width="45"> <b>'.$this->session->userdata('nama_akun').' &nbsp;</b><b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="'.site_url('adm_editprofil').'">Edit Profil</a></li>
                                        <li><a href="'.site_url('adm_memesan').'">Konfirmasi Pembayaran</a></li>
                                        <li><a href="'.site_url('login/logout').'">Logout</a></li>
                                    </ul>
                                </li>';
                        } else {
                            echo '
                            <li>
                            <a class="btn btn-colored btn-flat btn-theme-colored mt-15" href="'.site_url('register').'" >REGISTER</a>
                                <a class="btn btn-colored btn-flat mt-15 btn-info" href="'.site_url('login').'" >LOGIN</a>
                            </li>';
                        }
                     ?>
                </ul>
            </nav>
        </div>
    </div>
</div>