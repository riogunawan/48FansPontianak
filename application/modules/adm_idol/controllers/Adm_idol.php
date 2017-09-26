<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_idol extends Q_Controller {

    private $upload_path = "./assets/uploads";

    public function __construct()
    {
        parent::__construct();
        Modules::run("login/auth");
        $this->load->model('M_adm_idol');
    }

    public function index()
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') == 3) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $base = base_url();
        $CSS = "<!-- DataTables -->
                  <link rel='stylesheet' href='{$base}assets/neon/js/datatables/datatables.css'>
                  <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2-bootstrap.css'>
                  <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2.css'>";
        $JS = "<!-- DataTables -->
                <script src='{$base}assets/neon/js/datatables/datatables.js'></script>
                <script src='{$base}assets/neon/js/select2/select2.min.js'></script>";
        $JS .= $this->load->view('adm_idol/js', '', true);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak | Idol",
            "SUBTITLE" => "Tabel Data Idol",
        );
        $VIEW['list'] = $this->M_adm_idol->getAll();
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("adm_idol/home", $VIEW)
        ->master("template", $MASTER);
    }

    public function tambah()
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') == 3) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $m = $this->M_adm_idol;
        $base = base_url();
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('nama_idol', 'Nama Idol', 'required|max_length[50]');
            if ($this->form_validation->run() == FALSE) {
                $CSS = "<link rel='stylesheet' href='{$base}assets/css/dropzone-min.css'>";
                $JS = "<script src='{$base}assets/js/dropzone-min.js'></script>
                        <script src='{$base}assets/neon/js/bootstrap-datepicker.js'></script>";
                $JS .= $this->load->view('adm_idol/js1', '', TRUE);
                $MASTER = array(
                    "TITLE" => "48 Fans Pontianak | Idol",
                    "SUBTITLE" => "Tambah Idol",
                );
                $VIEW['drop_idol_group'] = $m->dropdown_idol_group();
                $this->template
                ->css($CSS)
                ->js($JS)
                ->view("adm_idol/form", $VIEW)
                ->master("template", $MASTER);
            } else {
                //rename adalah untuk mengubah nama poster yg diupload
                $rename1 = $this->input->post("foto_idol");
                $rename2 = str_replace(' ', '_', $rename1);
                $data = array(
                    "nama_idol" => $this->input->post("nama_idol"),
                    "panggilan_idol" => $this->input->post("panggilan_idol"),
                    "tlahir_idol" => $this->input->post("tlahir_idol"),
                    "goldar_idol" => $this->input->post("goldar_idol"),
                    "tinggi_idol" => $this->input->post("tinggi_idol"),
                    "foto_idol" => $rename2,
                    "id_idol_group" => $this->input->post("id_idol_group")
                );
                $m->tambah($data);
                $this->session->set_flashdata('info', 'Idol berhasil ditambah');
                redirect('adm_idol');
            }
        } else {
            $CSS = "<link rel='stylesheet' href='{$base}assets/css/dropzone-min.css'>";
            $JS = "<script src='{$base}assets/js/dropzone-min.js'></script>
                    <script src='{$base}assets/neon/js/bootstrap-datepicker.js'></script>";
            $JS .= $this->load->view('adm_idol/js1', '', TRUE);
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Idol",
                "SUBTITLE" => "Tambah Idol",
            );
            $VIEW['drop_idol_group'] = $m->dropdown_idol_group();
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_idol/form", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function edit($id_idol)
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') == 3) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $m = $this->M_adm_idol;
        $base = base_url();
        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('nama_idol', 'Nama Idol', 'required|max_length[50]');
            if ($this->form_validation->run() == FALSE) {
                $CSS = "";
                $JS = "<script src='{$base}assets/neon/js/bootstrap-datepicker.js'></script>";
                $JS .= $this->load->view('adm_idol/js', '', TRUE);
                $MASTER = array(
                    "TITLE" => "48 Fans Pontianak | Idol",
                    "SUBTITLE" => "Edit Idol",
                );
                $VIEW = array(
                    'drop_idol_group' => $m->dropdown_idol_group(),
                    'detail' => $m->GetEdit($id_idol)->row()
                    );
                $this->template
                ->css($CSS)
                ->js($JS)
                ->view("adm_idol/edit", $VIEW)
                ->master("template", $MASTER);
            } else {
                $data = array(
                    "nama_idol" => $this->input->post("nama_idol"),
                    "panggilan_idol" => $this->input->post("panggilan_idol"),
                    "tlahir_idol" => $this->input->post("tlahir_idol"),
                    "goldar_idol" => $this->input->post("goldar_idol"),
                    "tinggi_idol" => $this->input->post("tinggi_idol"),
                    "id_idol_group" => $this->input->post("id_idol_group")
                );
                $condition["id_idol"] = $this->input->post("id_idol");
                $m->edit($data, $condition);
                $this->session->set_flashdata('info', 'Idol berhasil diubah');
                redirect('adm_idol');
            }
        } else {
            $CSS = "";
            $JS = "<script src='{$base}assets/neon/js/bootstrap-datepicker.js'></script>";
            $JS .= $this->load->view('adm_idol/js', '', TRUE);
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Idol",
                "SUBTITLE" => "Edit Idol",
            );
            $VIEW = array(
                'drop_idol_group' => $m->dropdown_idol_group(),
                'detail' => $m->GetEdit($id_idol)->row()
                );
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_idol/edit", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function editfoto($id_idol)
    {
        if ($this->session->userdata('level_akun') == 3) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $m = $this->M_adm_idol;
        if ($this->input->post('edit')) {
            $namafile = "48ptk".date("Y_m_d_H_i_s");
            $config['upload_path'] = $this->upload_path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['file_name'] = $namafile;
            $this->load->library('upload', $config);
            if ($_FILES['foto']['name']) {
                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    $data = array(
                        'foto_idol' => $gbr['file_name']
                    );
                    $condition["id_idol"] = $this->input->post("id_idol");
                    $m->edit($data, $condition);
                    $this->session->set_flashdata('info', 'Foto Berhasil Di Ubah');
                    redirect("adm_idol/edit/{$id_idol}");
                } else if (! $this->upload->do_upload()) {
                    $this->session->set_flashdata('info', 'Foto Gagal Di Ubah, rename foto atau pilih foto lain');
                    redirect("adm_idol/edit/{$id_idol}");
                }
            } else {
                redirect("adm_idol/edit/{$id_idol}");
            }
        } else {
            $CSS = "";
            $JS = $this->load->view('adm_idol/js', '', TRUE);
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Idol",
                "SUBTITLE" => "Edit Foto",
            );
            $VIEW = array("detail" => $m->GetEdit($id_idol)->row());
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_idol/editfoto", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function Hapus($id_idol)
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') == 3) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $m = $this->M_adm_idol;
        $data = array(
                        "del_idol" => 1,
                    );
        $m->Hapus($data, $id_idol);
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('info', 'Idol berhasil dihapus');
            redirect('adm_idol');
        } else {
            $this->session->set_flashdata('info', 'Idol Gagal Dihapus');
            redirect('adm_idol');
        }
    }

    // FOTO FILE
    public function Upload()
    {
        if (!empty($_FILES)) {
            $config['upload_path'] = $this->upload_path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['max_size'] = '3072';
            $config['max_width']  = '5000';
            $config['max_height']  = '5000';
            $this->load->library('upload', $config);
            if (! $this->upload->do_upload("file")) {
                echo "GAGAL UPLOAD ";
            }
        }
    }

    public function Remove()
    {
        $file = $this->input->post("file");
        if ($file && file_exists($this->upload_path. "/" .$file)) {
            unlink($this->upload_path. "/" .$file);
        }
    }

}

/* End of file Adm_idol.php */
/* Location: ./application/modules/adm_idol/controllers/Adm_idol.php */