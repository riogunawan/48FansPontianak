<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_home extends Q_Controller {

    public function __construct()
    {
        parent::__construct();
        Modules::run("login/auth");
        $this->load->model('M_adm_home');
        $this->load->helper('h_fungsidate');
    }

    public function index()
    {
        $m = $this->M_adm_home;
        $CSS = "";
        $JS = "";
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak | Dashboard",
            "SUBTITLE" => "Dashboard",
        );
        $VIEW = array(
            "jlhberita" => $m->jlhberita()->num_rows(),
            "jlhidolgroup" => $m->jlhidolgroup()->num_rows(),
            "jlhanggota" => $m->jlhanggota()->num_rows(),
            "jlhidol" => $m->jlhidol()->num_rows(),
            "jlhevent" => $m->jlhevent()->num_rows(),
            "jlhgathering" => $m->jlhgathering()->num_rows(),
            "list" => $m->anggota()
            );
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("adm_home/home", $VIEW)
        ->master("template", $MASTER);
    }

}

/* End of file Adm_home.php */
/* Location: ./application/modules/adm_home/controllers/Adm_home.php */