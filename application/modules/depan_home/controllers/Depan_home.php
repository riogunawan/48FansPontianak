<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Q_CONTROLLER ADALAH GAYA QAPUAS TEMPLATING DARI INDOBIT

class Depan_home extends Q_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_depan_home');
        $this->load->helper('h_fungsidate');
    }

    public function index() {
        $m = $this->M_depan_home;
        $idakun = $this->session->userdata('id_akun');
        // UNTUK MEMANGGIL CSS DAN JS YANG SPESIAL UNTUK MODULES INI
        $CSS = '<!-- Revolution Slider 5.x CSS settings -->
        <link  href="assets/charityfund/js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
        <link  href="assets/charityfund/js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
        <link  href="assets/charityfund/js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>';
        $JS = '<!-- Revolution Slider 5.x SCRIPTS -->
            <script src="assets/charityfund/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
            <script src="assets/charityfund/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
            <!-- SLIDER REVOLUTION 5.0 EXTENSIONS
            (Load Extensions only on Local File Systems !
            The following part can be removed on Server for On Demand Loading) -->
            <script type="text/javascript" src="assets/charityfund/js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
            <script type="text/javascript" src="assets/charityfund/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
            <script type="text/javascript" src="assets/charityfund/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
            <script type="text/javascript" src="assets/charityfund/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
            <script type="text/javascript" src="assets/charityfund/js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
            <script type="text/javascript" src="assets/charityfund/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
            <script type="text/javascript" src="assets/charityfund/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
            <script type="text/javascript" src="assets/charityfund/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
            ';
        $JS .= $this->load->view('depan_home/js', '', TRUE);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak - Fanbase 48 Group Regional Pontianak",
            "SUBTITLE" => "HOME",
            //-----GET MENU---------
            "MenuAbout" => $m->MenuGetAbout(),
            "MenuIdolG" => $m->MenuGetIdolG(),
            "keranjang" => $m->jumlahkeranjang($idakun)->num_rows()
            //-----TUTUP GET MENU-----
        );
        $VIEW = array(
            'ListBerita' => $m->GetBerita(),
            'ListEvent' => $m->GetEvent(),
            'ListGath' => $m->GetGath(),
            'ListIdolG' => $m->GetIdolG(),
            'ListPengurus' => $m->GetPengurus(),
            'ListKetua' => $m->GetKetua(),
            'ListFounder' => $m->GetFounder()
            );
        $this->template
        ->css($CSS)
        ->js($JS)
        //cth ====> "namaModules/namaFileDiViews"
        ->view("depan_home/home", $VIEW)
        //cth ====> file yang ada di VIEWS
        ->master("depan_template", $MASTER);
    }

}

/* End of file Depan_home.php */
/* Location: ./application/modules/depan_home/controllers/Depan_home.php */