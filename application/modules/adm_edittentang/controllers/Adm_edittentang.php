<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_edittentang extends Q_Controller {

    private $upload_path = "./assets/uploads";

    public function __construct()
    {
        parent::__construct();
        Modules::run("login/auth");
        $this->load->model('M_adm_edittentang');
    }

    public function index()
    {
        $id = 1;
        $m = $this->M_adm_edittentang;
        $base = base_url();
        if ($this->input->post('simpan')) {
            $this->form_validation->set_rules('isi_about', 'Deskripsi Komunitas', 'required');
            $this->form_validation->set_rules('email_about', 'E-mail', 'required|max_length[30]');
            $this->form_validation->set_rules('nohp_about', 'Nomor HP', 'required');
            if ($this->form_validation->run() == FALSE) {
                $CSS = '<link rel="stylesheet" href="'.$base.'assets/neon/js/select2/select2-bootstrap.css">
                        <link rel="stylesheet" href="'.$base.'assets/neon/js/select2/select2.css">';
                $JS = $this->load->view('adm_edittentang/js', '', TRUE);
                $JS .= '<script src="'.$base.'assets/neon/js/select2/select2.min.js"></script>
                        <script src="'.$base.'assets/neon/js/bootstrap-datepicker.js"></script>';
                $MASTER = array(
                        "TITLE" => "48 Fans Pontianak | Tentang 48FansPontianak",
                        "SUBTITLE" => "Edit Tentang 48FansPontianak",
                );
                $VIEW = array(
                        "detail" => $m->Getedit($id)->row()
                    );
                $this->template
                ->css($CSS)
                ->js($JS)
                ->view("adm_edittentang/home", $VIEW)
                ->master("template", $MASTER);
            } else {
                $data = array(
                        "isi_about" => $this->input->post("isi_about"),
                        "email_about" => $this->input->post("email_about"),
                        "nohp_about" => $this->input->post("nohp_about"),
                        "link_fb_about" => $this->input->post("link_fb_about"),
                        "link_twitter_about" => $this->input->post("link_twitter_about"),
                        "link_youtube_about" => $this->input->post("link_youtube_about")
                    );
                $condition["id_about"] = $id;
                $m->Edit($data, $condition);
                $this->session->set_flashdata('info', 'Tentang berhasil diubah');
                redirect('adm_edittentang');
            }
        } else {
            $CSS = '<link rel="stylesheet" href="'.$base.'assets/neon/js/select2/select2-bootstrap.css">
                    <link rel="stylesheet" href="'.$base.'assets/neon/js/select2/select2.css">';
            $JS = $this->load->view('adm_edittentang/js', '', TRUE);
            $JS .= '<script src="'.$base.'assets/neon/js/select2/select2.min.js"></script>
                    <script src="'.$base.'assets/neon/js/bootstrap-datepicker.js"></script>';
            $MASTER = array(
                    "TITLE" => "48 Fans Pontianak | Tentang 48FansPontianak",
                    "SUBTITLE" => "Edit Tentang 48FansPontianak",
            );
            $VIEW = array(
                    "detail" => $m->Getedit($id)->row()
                );
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_edittentang/home", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function editfoto()
    {
        $id = 1;
        $m = $this->M_adm_edittentang;
        if ($this->input->post('edit')) {
            $namafile = "48ptk".date('Y_m_d_H_i_s');
            $config['upload_path'] = $this->upload_path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['file_name'] = $namafile;
            $this->load->library('upload', $config);
            if ($_FILES['foto']['name']) {
                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    $data = array(
                        'foto_about' => $gbr['file_name']
                    );
                    $condition["id_about"] = $id;
                    $m->Edit($data, $condition);
                    $this->session->set_flashdata('info', 'Logo Berhasil Di Edit');
                    redirect("adm_edittentang");
                } else if (! $this->upload->do_upload()) {
                    $this->session->set_flashdata('info', 'Logo Gagal Di Edit');
                    redirect("adm_edittentang");
                }
            } else {
                $this->session->set_flashdata('info', 'Logo Gagal Di Edit');
                redirect("adm_edittentang");
            }
        } else {
            $CSS = "";
            $JS = $this->load->view('adm_edittentang/js', '', TRUE);
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Tentang 48FansPontianak",
                "SUBTITLE" => "Edit Logo",
            );
            $VIEW = "";
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_edittentang/editfoto", $VIEW)
            ->master("template", $MASTER);
        }
    }
}

/* End of file Adm_edittentang.php */
/* Location: ./application/modules/adm_edittentang/controllers/Adm_edittentang.php */