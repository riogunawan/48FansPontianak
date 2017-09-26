<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Idol_group extends Q_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_idol_group');
        $this->load->helper('h_fungsidate');
    }

    public function index()
    {
        $m = $this->M_idol_group;
        $idakun = $this->session->userdata('id_akun');
        $base = base_url();
        $CSS = "<link href='{$base}assets/charityfund/css/colors/theme-skin-rose.css' rel='stylesheet' type='text/css'>";
        $JS = $this->load->view('idol_group/js', '', TRUE);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak - Fanbase 48 Group Regional Pontianak",
            "SUBTITLE" => "Idol Group",
            //-----GET MENU---------
            "MenuAbout" => $m->MenuGetAbout(),
            "MenuIdolG" => $m->MenuGetIdolG(),
            "keranjang" => $m->jumlahkeranjang($idakun)->num_rows()
            //-----TUTUP GET MENU-----
        );
        $VIEW = array(
                'detail' => $m->GetIdolGroup(),
                'ListEvent' => $m->GetEvent(),
                'ListGath' => $m->GetGath()
            );
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("idol_group/home1", $VIEW)
        ->master("depan_template", $MASTER);
    }

    public function group($id_idol_group)
    {
        $m = $this->M_idol_group;
        $idakun = $this->session->userdata('id_akun');
        $base = base_url();
        $CSS = "<link href='{$base}assets/charityfund/css/colors/theme-skin-rose.css' rel='stylesheet' type='text/css'>";
        $JS = $this->load->view('idol_group/js', '', TRUE);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak - Fanbase 48 Group Regional Pontianak",
            "SUBTITLE" => "Idol Group",
            //-----GET MENU---------
            "MenuAbout" => $m->MenuGetAbout(),
            "MenuIdolG" => $m->MenuGetIdolG(),
            "keranjang" => $m->jumlahkeranjang($idakun)->num_rows(),
            "detail" => $m->GetIdolG($id_idol_group)->nama_idol_group
            //-----TUTUP GET MENU-----
        );
        $VIEW = array(
                "detail" => $m->GetIdolG($id_idol_group),
                'ListEvent' => $m->GetEvent(),
                'ListGath' => $m->GetGath(),
                'Jumlah' => $m->JumlahIdol($id_idol_group),
            );
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("idol_group/home", $VIEW)
        ->master("depan_template1", $MASTER);
    }

    public function idol($id_idol)
    {
        $m = $this->M_idol_group;
        $idakun = $this->session->userdata('id_akun');
        $base = base_url();
        $CSS = "<link href='{$base}assets/charityfund/css/colors/theme-skin-rose.css' rel='stylesheet' type='text/css'>";
        $JS = $this->load->view('idol_group/js', '', TRUE);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak - Fanbase 48 Group Regional Pontianak",
            "SUBTITLE" => "Idol Group",
            //-----GET MENU---------
            "MenuAbout" => $m->MenuGetAbout(),
            "MenuIdolG" => $m->MenuGetIdolG(),
            'detail' => $m->GetIdol($id_idol)->nama_idol,
            "keranjang" => $m->jumlahkeranjang($idakun)->num_rows()
            //-----TUTUP GET MENU-----
        );
        $VIEW = array(
                'detail' => $m->GetIdol($id_idol),
                'ListEvent' => $m->GetEvent(),
                'ListGath' => $m->GetGath(),
            );
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("idol_group/detil", $VIEW)
        ->master("depan_template1", $MASTER);
    }

}

/* End of file Idol_group.php */
/* Location: ./application/modules/idol_group/controllers/Idol_group.php */