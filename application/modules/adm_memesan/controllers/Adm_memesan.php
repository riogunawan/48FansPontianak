<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_memesan extends Q_Controller {

    private $upload_path = "./assets/uploads";

    public function __construct()
    {
        parent::__construct();
        Modules::run("login/auth");
        $this->load->model('M_adm_memesan');
    }

    public function index()
    {
        $id = $this->session->userdata('id_akun');
        $base = base_url();
        $CSS = "";
        $JS = $this->load->view('adm_memesan/js', '', true);
        $JS .= "";
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak | Konfirmasi Pembayaran",
            "SUBTITLE" => "Tabel Data Konfirmasi Pembayaran",
        );
        $VIEW['list'] = $this->M_adm_memesan->getAll($id);
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("adm_memesan/home", $VIEW)
        ->master("template", $MASTER);
    }

    public function upload_resi($no_memesan)
    {
        $id = $this->session->userdata('id_akun');
        $m = $this->M_adm_memesan;
        if ($this->input->post('submit')) {
            $namafile = "resi48ptk".date('Y_m_d_H_i_s');
            $config['upload_path'] = $this->upload_path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['file_name'] = $namafile;
            $this->load->library('upload', $config);
            if ($_FILES['foto']['name']) {
                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    $data = array(
                        'foto_resi' => $gbr['file_name']
                    );
                    $condition["no_memesan"] = $this->input->post("no_memesan");
                    $m->edit($data, $condition);
                    $this->session->set_flashdata('info', 'Harap menunggu konfirmasi e-mail dari admin untuk mendapatkan Kode Tiket');
                    redirect("adm_memesan");
                } else if (! $this->upload->do_upload()) {
                    $this->session->set_flashdata('info', 'Gagal upload');
                    redirect("adm_memesan");
                }
            } else {
                $this->session->set_flashdata('info', 'Gagal upload');
                    redirect("adm_memesan");
            }
        } else {
            $base = base_url();
            $CSS = "";
            $JS = $this->load->view('adm_memesan/js', '', true);
            $JS .= "";
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Konfirmasi Pembayaran",
                "SUBTITLE" => "Upload Resi",
            );
            $VIEW['list'] = $m->getTiket($id,$no_memesan);
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_memesan/upload", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function cetak($no_memesan)
    {
        $m = $this->M_adm_memesan;
        $idakun = $this->session->userdata('id_akun');
        $base = base_url();
        $CSS = "";
        $JS = $this->load->view('adm_memesan/js', '', true);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak | Kode Tiket",
            "SUBTITLE" => "Kode Tiket",
        );
        $VIEW['list'] = $m->getdata1($no_memesan, $idakun);
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("adm_memesan/tiket", $VIEW)
        ->master("template", $MASTER);
    }

}

/* End of file Adm_memesan.php */
/* Location: ./application/modules/adm_memesan/controllers/Adm_memesan.php */