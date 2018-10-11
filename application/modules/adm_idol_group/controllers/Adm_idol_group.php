<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_idol_group extends Q_Controller {

    private $upload_path = "./assets/uploads";

    public function __construct()
    {
        parent::__construct();
        Modules::run("login/auth");
        $this->load->model('M_adm_idol_group');
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
                  <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2.css'>";
        $JS = "<!-- DataTables -->
                <script src='{$base}assets/neon/js/datatables/datatables.js'></script>
                <script src='{$base}assets/neon/js/select2/select2.min.js'></script>";
        $JS .= $this->load->view('adm_idol_group/js', '', true);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak | Idol Group",
            "SUBTITLE" => "Tabel Data Idol Group",
        );
        $VIEW['listBerita'] = $this->M_adm_idol_group->getAll();
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("adm_idol_group/home", $VIEW)
        ->master("template", $MASTER);
    }

    public function tambah()
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') != 1) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $m = $this->M_adm_idol_group;
        $base = base_url();
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('nama_idol_group', 'Nama Idol Group', 'required|max_length[10]');
            if ($this->form_validation->run() == FALSE) {
                $CSS = "<link rel='stylesheet' href='{$base}assets/css/dropzone-min.css'>";
                $JS = "<script src='{$base}assets/js/dropzone-min.js'></script>";
                $JS .= $this->load->view('adm_idol_group/js1', '', TRUE);
                $MASTER = array(
                    "TITLE" => "48 Fans Pontianak | Idol Group",
                    "SUBTITLE" => "Tambah Idol Group",
                );
                $VIEW = '';
                $this->template
                ->css($CSS)
                ->js($JS)
                ->view("adm_idol_group/form", $VIEW)
                ->master("template", $MASTER);
            } else {
                //rename adalah untuk mengubah nama poster yg diupload
                $rename1 = $this->input->post("logo_idol_group");
                $rename2 = str_replace(' ', '_', $rename1);
                $namafile = "48ptk".date('Y_m_d_H_i_s');
                $config['upload_path'] = $this->upload_path;
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
                $config['file_name'] = $namafile;
                $this->load->library('upload', $config);
                if ($_FILES['banner']['name']) {
                    if ($this->upload->do_upload('banner')) {
                        $gbr = $this->upload->data();
                        $data = array(
                            "nama_idol_group" => $this->input->post("nama_idol_group"),
                            "logo_idol_group" => $rename2,
                            "banner_idol_group" => $gbr['file_name'],
                            "ket_idol_group" => $this->input->post("ket_idol_group"),
                            "tahun_idol_group" => $this->input->post("tahun_idol_group"),
                            "lokasi_idol_group" => $this->input->post("lokasi_idol_group"),
                            "link_idol_group" => $this->input->post("link_idol_group")
                        );
                        $m->tambah($data);
                        $this->session->set_flashdata('info', 'Idol Group berhasil ditambah');
                        redirect('adm_idol_group');
                    } else if (! $this->upload->do_upload()) {
                        echo "gagal";
                    }
                }
            }
        } else {
            $CSS = "<link rel='stylesheet' href='{$base}assets/css/dropzone-min.css'>";
            $JS = "<script src='{$base}assets/js/dropzone-min.js'></script>";
            $JS .= $this->load->view('adm_idol_group/js1', '', TRUE);
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Idol Group",
                "SUBTITLE" => "Tambah Idol Group",
            );
            $VIEW = '';
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_idol_group/form", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function edit($id_idol_group)
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') != 1) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $m = $this->M_adm_idol_group;
        $base = base_url();
        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('nama_idol_group', 'Nama Idol Group', 'required|max_length[10]');
            if ($this->form_validation->run() == FALSE) {
                $CSS = "";
                $JS = $this->load->view('adm_idol_group/js', '', TRUE);
                $MASTER = array(
                    "TITLE" => "48 Fans Pontianak | Idol Group",
                    "SUBTITLE" => "Edit Idol Group",
                );
                $VIEW = array(
                        "detail" => $m->GetEdit($id_idol_group)->row()
                        );
                $this->template
                ->css($CSS)
                ->js($JS)
                ->view("adm_idol_group/edit", $VIEW)
                ->master("template", $MASTER);
            } else {
                $data = array(
                    "nama_idol_group" => $this->input->post("nama_idol_group"),
                    "ket_idol_group" => $this->input->post("ket_idol_group"),
                    "tahun_idol_group" => $this->input->post("tahun_idol_group"),
                    "lokasi_idol_group" => $this->input->post("lokasi_idol_group"),
                    "link_idol_group" => $this->input->post("link_idol_group")
                );
                $condition["id_idol_group"] = $this->input->post("id_idol_group");
                $m->edit($data, $condition);
                $this->session->set_flashdata('info', 'Idol Group berhasil diubah');
                redirect('adm_idol_group');
            }
        } else {
            $CSS = "";
            $JS = $this->load->view('adm_idol_group/js', '', TRUE);
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Idol Group",
                "SUBTITLE" => "Edit Idol Group",
            );
            $VIEW = array(
                        "detail" => $m->GetEdit($id_idol_group)->row()
                        );
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_idol_group/edit", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function editlogo($id_idol_group)
    {
        if ($this->session->userdata('level_akun') != 1) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $m = $this->M_adm_idol_group;
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
                        'logo_idol_group' => $gbr['file_name']
                    );
                    $condition["id_idol_group"] = $this->input->post("id_idol_group");
                    $m->edit($data, $condition);
                    $this->session->set_flashdata('info', 'Logo Berhasil Di Edit');
                    redirect("adm_idol_group/edit/{$id_idol_group}");
                } else if (! $this->upload->do_upload()) {
                    echo "gagal";
                }
            }
        } else {
            $CSS = "";
            $JS = $this->load->view('adm_idol_group/js', '', TRUE);
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Idol Group",
                "SUBTITLE" => "Edit Logo",
            );
            $VIEW = array("detail" => $m->GetEdit($id_idol_group)->row());
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_idol_group/editfoto", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function editbanner($id_idol_group)
    {
        if ($this->session->userdata('level_akun') != 1) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $m = $this->M_adm_idol_group;
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
                        'banner_idol_group' => $gbr['file_name']
                    );
                    $condition["id_idol_group"] = $this->input->post("id_idol_group");
                    $m->edit($data, $condition);
                    $this->session->set_flashdata('info', 'Banner Berhasil Di Edit');
                    redirect("adm_idol_group/edit/{$id_idol_group}");
                } else if (! $this->upload->do_upload()) {
                    echo "gagal";
                }
            }
        } else {
            $CSS = "";
            $JS = $this->load->view('adm_idol_group/js', '', TRUE);
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Idol Group",
                "SUBTITLE" => "Edit Banner",
            );
            $VIEW = array("detail" => $m->GetEdit($id_idol_group)->row());
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_idol_group/editfoto", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function Hapus($id_idol_group)
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') != 1) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $m = $this->M_adm_idol_group;
        $data = array(
                        "del_idol_group" => 1,
                    );
        $m->Hapus($data, $id_idol_group);
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('info', 'Idol Group berhasil dihapus');
            redirect('adm_idol_group');
        } else {
            $this->session->set_flashdata('info', 'Idol Group Gagal Dihapus');
            redirect('adm_idol_group');
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

/* End of file Adm_idol_group.php */
/* Location: ./application/modules/adm_idol_group/controllers/Adm_idol_group.php */