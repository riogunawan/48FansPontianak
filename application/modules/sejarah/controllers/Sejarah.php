<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sejarah extends Q_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_sejarah');
        $this->load->helper('h_fungsidate');
    }

    public function index()
    {
        $m = $this->M_sejarah;
        $idakun = $this->session->userdata('id_akun');
        $base = base_url();
        $CSS = "<link href='{$base}assets/charityfund/css/colors/theme-skin-gray.css' rel='stylesheet' type='text/css'>";
        $JS = $this->load->view('sejarah/js', '', TRUE);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak - Fanbase 48 Group Regional Pontianak",
            "SUBTITLE" => "Sejarah 48 Fans Pontianak",
            //-----GET MENU---------
            "MenuAbout" => $m->MenuGetAbout(),
            "MenuIdolG" => $m->MenuGetIdolG(),
            'detail' => 'Sejarah 48 Fans Pontianak',
            "keranjang" => $m->jumlahkeranjang($idakun)->num_rows()
            //-----TUTUP GET MENU-----
        );
        $VIEW = array(
                'detail' => $m->GetSejarah()->row(),
                'ListEvent' => $m->GetEvent(),
                'ListGath' => $m->GetGath()
            );
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("sejarah/home", $VIEW)
        ->master("depan_template1", $MASTER);
    }

}

/* End of file Sejarah.php */
/* Location: ./application/modules/sejarah/controllers/Sejarah.php */