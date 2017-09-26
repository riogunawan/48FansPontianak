<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_pengurus extends Q_Controller {

    private $upload_path = "./assets/uploads";

    public function __construct()
    {
        parent::__construct();
        Modules::run("login/auth");
        $this->load->model('M_adm_pengurus');
    }

    public function index()
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') != 1) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $base = base_url();
        $CSS = "<!-- DataTables -->
                  <link rel='stylesheet' href='{$base}assets/neon/js/datatables/datatables.css'>
                  <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2-bootstrap.css'>
                  <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2.css'>
                ";
        $JS = "<!-- DataTables -->
                <script src='{$base}assets/neon/js/datatables/datatables.js'></script>
                <script src='{$base}assets/neon/js/select2/select2.min.js'></script>
                ";
        $JS .= $this->load->view('adm_pengurus/js', '', true);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak | Keanggotaan 48FansPontianak",
            "SUBTITLE" => "Tabel Data Keanggotaan 48FansPontianak",
        );
        $VIEW['list'] = $this->M_adm_pengurus->getAll();
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("adm_pengurus/home", $VIEW)
        ->master("template", $MASTER);
    }

    public function tambah()
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') != 1) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $m = $this->M_adm_pengurus;
        $base = base_url();
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('username_akun', 'Username', 'required|min_length[3]|max_length[20]');
            $this->form_validation->set_rules('pw_akun', 'Password', 'required|min_length[3]');
            $this->form_validation->set_rules('nama_akun', 'Nama Lengkap', 'required|min_length[3]|max_length[50]');
            $this->form_validation->set_rules('panggilan_akun', 'Nama Panggilan', 'max_length[20]');
            $this->form_validation->set_rules('email_akun', 'E-mail', 'required');
            if ($this->form_validation->run() == FALSE) {
                $CSS = "<link rel='stylesheet' href='{$base}assets/css/dropzone-min.css'>
                    <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2-bootstrap.css'>
                    <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2.css'>";
                $JS = "<script src='{$base}assets/js/dropzone-min.js'></script>
                        <script src='{$base}assets/neon/js/select2/select2.min.js'></script>
                        <script src='{$base}assets/neon/js/bootstrap-datepicker.js'></script>";
                $JS .= $this->load->view('adm_pengurus/js1', '', TRUE);
                $MASTER = array(
                    "TITLE" => "48 Fans Pontianak | Keanggotaan 48FansPontianak",
                    "SUBTITLE" => "Tambah Keanggotaan 48FansPontianak",
                );
                $VIEW['drop_idol'] = $m->dropdown_idol();
                $this->template
                ->css($CSS)
                ->js($JS)
                ->view("adm_pengurus/form", $VIEW)
                ->master("template", $MASTER);
            } else {
                //rename adalah untuk mengubah nama poster yg diupload
                $rename1 = $this->input->post("foto_akun");
                $rename2 = str_replace(' ', '_', $rename1);
                if ($this->input->post("keanggotaan") == 'Anggota') {
                    $level = 3;
                } elseif ($this->input->post("keanggotaan") == 'Ketua Komunitas' || $this->input->post("keanggotaan") == 'Wakil Ketua') {
                    $level = 1;
                } elseif ($this->input->post("keanggotaan") == 'Founder') {
                    $level = 4;
                } else {
                    $level = 2;
                }
                $data = array(
                    "nama_akun" => $this->input->post("nama_akun"),
                    "level_akun" => $level,
                    "keanggotaan" => $this->input->post("keanggotaan"),
                    "foto_akun" => $rename2,
                    "username_akun" => $this->input->post("username_akun"),
                    "pw_akun" => md5($this->input->post("pw_akun")),
                    "panggilan_akun" => $this->input->post("panggilan_akun"),
                    "kelamin_akun" => $this->input->post("kelamin_akun"),
                    "goldar_akun" => $this->input->post("goldar_akun"),
                    "ttl_akun" => $this->input->post("ttl_akun"),
                    "tinggi_akun" => $this->input->post("tinggi_akun"),
                    "email_akun" => $this->input->post("email_akun"),
                    "link_fb_akun" => $this->input->post("link_fb_akun"),
                    "link_twitter_akun" => $this->input->post("link_twitter_akun"),
                    "link_gplus_akun" => $this->input->post("link_gplus_akun"),
                    "deskripsi_akun" => $this->input->post("deskripsi_akun"),
                    'created_akun' => date('Y\-m\-d\ H:i:s A'),
                    "id_idol" => $this->input->post("id_idol")
                );
                $m->tambah($data);
                $this->session->set_flashdata('info', 'Pengurus berhasil ditambah');
                redirect('adm_pengurus');
            }
        } else {
            $CSS = "<link rel='stylesheet' href='{$base}assets/css/dropzone-min.css'>
                    <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2-bootstrap.css'>
                    <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2.css'>";
            $JS = "<script src='{$base}assets/js/dropzone-min.js'></script>
                    <script src='{$base}assets/neon/js/select2/select2.min.js'></script>
                    <script src='{$base}assets/neon/js/bootstrap-datepicker.js'></script>";
            $JS .= $this->load->view('adm_pengurus/js1', '', TRUE);
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Keanggotaan 48FansPontianak",
                "SUBTITLE" => "Tambah Keanggotaan 48FansPontianak",
            );
            $VIEW['drop_idol'] = $m->dropdown_idol();
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_pengurus/form", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function Edit($id_akun)
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') != 1) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $m = $this->M_adm_pengurus;
        $base = base_url();
        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('username_akun', 'Username', 'required|min_length[3]|max_length[20]');
            // $this->form_validation->set_rules('pw_akun', 'Password', 'required|min_length[3]');
            $this->form_validation->set_rules('nama_akun', 'Nama Lengkap', 'required|min_length[3]|max_length[50]');
            $this->form_validation->set_rules('panggilan_akun', 'Nama Panggilan', 'max_length[20]');
            $this->form_validation->set_rules('email_akun', 'E-mail', 'required');
            if ($this->form_validation->run() == FALSE) {
                $CSS = "<link rel='stylesheet' href='{$base}assets/neon/js/select2/select2-bootstrap.css'>
                    <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2.css'>";
                $JS = "<script src='{$base}assets/neon/js/select2/select2.min.js'></script>
                        <script src='{$base}assets/neon/js/bootstrap-datepicker.js'></script>";
                $JS .= $this->load->view('adm_pengurus/js', '', TRUE);
                $MASTER = array(
                    "TITLE" => "48 Fans Pontianak | Keanggotaan 48FansPontianak",
                    "SUBTITLE" => "Edit Keanggotaan 48FansPontianak",
                );
                $VIEW = array(
                        "detail" => $m->GetEdit($id_akun)->row(),
                        "drop_idol" => $m->dropdown_idol()
                        );
                $this->template
                ->css($CSS)
                ->js($JS)
                ->view("adm_pengurus/edit", $VIEW)
                ->master("template", $MASTER);
            } else {
                if ($this->input->post("keanggotaan") == 'Anggota') {
                    $level = 3;
                } elseif ($this->input->post("keanggotaan") == 'Ketua Komunitas' || $this->input->post("keanggotaan") == 'Wakil Ketua') {
                    $level = 1;
                } elseif ($this->input->post("keanggotaan") == 'Founder') {
                    $level = 4;
                } else {
                    $level = 2;
                }
                if (!$this->input->post("pw_akun")) {
                    $data = array(
                        "nama_akun" => $this->input->post("nama_akun"),
                        "level_akun" => $level,
                        "keanggotaan" => $this->input->post("keanggotaan"),
                        "username_akun" => $this->input->post("username_akun"),
                        "panggilan_akun" => $this->input->post("panggilan_akun"),
                        "kelamin_akun" => $this->input->post("kelamin_akun"),
                        "goldar_akun" => $this->input->post("goldar_akun"),
                        "ttl_akun" => $this->input->post("ttl_akun"),
                        "tinggi_akun" => $this->input->post("tinggi_akun"),
                        "email_akun" => $this->input->post("email_akun"),
                        "link_fb_akun" => $this->input->post("link_fb_akun"),
                        "link_twitter_akun" => $this->input->post("link_twitter_akun"),
                        "link_gplus_akun" => $this->input->post("link_gplus_akun"),
                        "deskripsi_akun" => $this->input->post("deskripsi_akun"),
                        "id_idol" => $this->input->post("id_idol")
                    );
                } else {
                    $data = array(
                        "nama_akun" => $this->input->post("nama_akun"),
                        "level_akun" => $level,
                        "keanggotaan" => $this->input->post("keanggotaan"),
                        "username_akun" => $this->input->post("username_akun"),
                        "pw_akun" => md5($this->input->post("pw_akun")),
                        "panggilan_akun" => $this->input->post("panggilan_akun"),
                        "kelamin_akun" => $this->input->post("kelamin_akun"),
                        "goldar_akun" => $this->input->post("goldar_akun"),
                        "ttl_akun" => $this->input->post("ttl_akun"),
                        "tinggi_akun" => $this->input->post("tinggi_akun"),
                        "email_akun" => $this->input->post("email_akun"),
                        "link_fb_akun" => $this->input->post("link_fb_akun"),
                        "link_twitter_akun" => $this->input->post("link_twitter_akun"),
                        "link_gplus_akun" => $this->input->post("link_gplus_akun"),
                        "deskripsi_akun" => $this->input->post("deskripsi_akun"),
                        "id_idol" => $this->input->post("id_idol")
                    );
                }

                $condition["id_akun"] = $this->input->post("id_akun");
                $m->Edit($data, $condition);
                $this->session->set_flashdata('info', 'Pengurus berhasil diubah');
                redirect('adm_pengurus');
            }
        } else {
            $CSS = "<link rel='stylesheet' href='{$base}assets/neon/js/select2/select2-bootstrap.css'>
                    <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2.css'>";
            $JS = "<script src='{$base}assets/neon/js/select2/select2.min.js'></script>
                    <script src='{$base}assets/neon/js/bootstrap-datepicker.js'></script>";
            $JS .= $this->load->view('adm_pengurus/js', '', TRUE);
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Keanggotaan 48FansPontianak",
                "SUBTITLE" => "Edit Keanggotaan 48FansPontianak",
            );
            $VIEW = array(
                    "detail" => $m->GetEdit($id_akun)->row(),
                    "drop_idol" => $m->dropdown_idol()
                    );
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_pengurus/edit", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function editfoto($id_akun)
    {
        if ($this->session->userdata('level_akun') != 1) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $m = $this->M_adm_pengurus;
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
                        'foto_akun' => $gbr['file_name']
                    );
                    $condition["id_akun"] = $this->input->post("id_akun");
                    $m->edit($data, $condition);
                    $this->session->set_flashdata('info', 'Foto Berhasil Di Ubah');
                    redirect("adm_pengurus/edit/{$id_akun}");
                } else if (! $this->upload->do_upload()) {
                    echo "gagal";
                }
            }
        } else {
            $CSS = "";
            $JS = $this->load->view('adm_pengurus/js', '', TRUE);
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Keanggotaan 48FansPontianak",
                "SUBTITLE" => "Edit Foto",
            );
            $VIEW = array("detail" => $m->GetEdit($id_akun)->row());
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_pengurus/editfoto", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function Hapus($id_akun)
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') != 1) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $m = $this->M_adm_pengurus;
        $m->Hapus($id_akun);
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('info', 'Keanggotaan berhasil dihapus');
            redirect('adm_pengurus');
        } else {
            $this->session->set_flashdata('info', 'Keanggotaan Gagal Dihapus');
            redirect('adm_pengurus');
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

/* End of file Adm_pengurus.php */
/* Location: ./application/modules/adm_pengurus/controllers/Adm_pengurus.php */