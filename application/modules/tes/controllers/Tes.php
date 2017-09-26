<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tes extends Q_Controller {

    private $upload_path = "./assets/uploads/";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tes');
    }

    public function index()
    {

    }

    public function add($id_berita)
    {
        if ($this->input->post('edit')) {
            $namafile = "48ptk".date(Y_m_d_H_i_s);
            // $namafile = "48ptk".time();
            $config['upload_path'] = $this->upload_path; //Folder untuk menyimpan hasil upload
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['file_name'] = $namafile;
            $this->load->library('upload', $config);
            if ($_FILES['foto']['name']) {
                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    $query = array(
                        'foto_berita' => $gbr['file_name']
                    );
                    $condition["id_berita"] = $this->input->post("id_berita");
                    $this->M_tes->edit($query, $condition); //akses model untuk menyimpan ke database
                    //pesan yang muncul jika berhasil diupload pada session flashdata
                    $this->session->set_flashdata('info', 'Foto Berhasil Di Edit');
                    redirect("Adm_berita/Edit/{$id_berita}"); //jika berhasil maka akan ditampilkan view upload
                } else if (! $this->upload->do_upload()) {
                    echo "gagal";
                }
            }
        } else {
            // echo "<script type='text/javascript'>alert('Masukkan data yang benar!!!!')</script>";
            $CSS = "";
            $JS = "";
            $MASTER = array(
                "TITLE" => "Tambah",
                "SUBTITLE" => "Pengguna",
            );
            $VIEW = array("detail" => $this->M_tes->get($id_berita)->row());
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("tes/home", $VIEW)
            ->master("template", $MASTER);
        }
    }

}

/* End of file Tes.php */
/* Location: ./application/modules/tes/controllers/Tes.php */