<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_sejarah extends Q_Controller {

    public function __construct()
    {
        parent::__construct();
        Modules::run("login/auth");
        $this->load->model('M_adm_sejarah');
    }

    public function index()
    {
        $id = 2;
        $m = $this->M_adm_sejarah;
        $base = base_url();
        if ($this->input->post('simpan')) {
            $this->form_validation->set_rules('isi_about', 'Isi Sejarah', 'required');
            if ($this->form_validation->run() == FALSE) {
                $CSS = '';
                $JS = $this->load->view('adm_sejarah/js', '', TRUE);
                $MASTER = array(
                        "TITLE" => "48 Fans Pontianak | Sejarah 48FansPontianak",
                        "SUBTITLE" => "Edit Sejarah 48FansPontianak",
                );
                $VIEW = array(
                        "detail" => $m->Getedit($id)->row()
                    );
                $this->template
                ->css($CSS)
                ->js($JS)
                ->view("adm_sejarah/home", $VIEW)
                ->master("template", $MASTER);
            } else {
                $data = array(
                        "isi_about" => $this->input->post("isi_about")
                    );
                $condition["id_about"] = $id;
                $m->Edit($data, $condition);
                $this->session->set_flashdata('info', 'Sejarah berhasil diubah');
                redirect('adm_sejarah');
            }
        } else {
            $CSS = '';
            $JS = $this->load->view('adm_sejarah/js', '', TRUE);
            $MASTER = array(
                    "TITLE" => "48 Fans Pontianak | Sejarah 48FansPontianak",
                    "SUBTITLE" => "Edit Sejarah 48FansPontianak",
            );
            $VIEW = array(
                    "detail" => $m->Getedit($id)->row()
                );
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_sejarah/home", $VIEW)
            ->master("template", $MASTER);
        }
    }

}

/* End of file Adm_sejarah.php */
/* Location: ./application/modules/adm_sejarah/controllers/Adm_sejarah.php */