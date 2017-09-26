<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_editprofil extends Q_Controller {

    private $upload_path = "./assets/uploads";

    public function __construct()
    {
        parent::__construct();
        Modules::run("login/auth");
        $this->load->model('M_adm_editprofil');
    }

    public function index()
    {
        $id = $this->session->userdata('id_akun');
        $m = $this->M_adm_editprofil;
        $base = base_url();
        if ($this->input->post('simpan')) {
            $this->form_validation->set_rules('nama_akun', 'Nama Lengkap', 'required|min_length[3]|max_length[50]');
            $this->form_validation->set_rules('panggilan_akun', 'Nama Panggilan', 'max_length[20]');
            $this->form_validation->set_rules('email_akun', 'E-mail', 'required');
            if ($this->form_validation->run() == FALSE) {
                $CSS = '<link rel="stylesheet" href="'.$base.'assets/neon/js/select2/select2-bootstrap.css">
                    <link rel="stylesheet" href="'.$base.'assets/neon/js/select2/select2.css">';
                $JS = $this->load->view('adm_editprofil/js', '', TRUE);
                $JS .= '<script src="'.$base.'assets/neon/js/select2/select2.min.js"></script>
                        <script src="'.$base.'assets/neon/js/bootstrap-datepicker.js"></script>';
                $MASTER = array(
                    "TITLE" => "48 Fans Pontianak | Profil",
                    "SUBTITLE" => "Edit Profil",
                );
                $VIEW = array(
                            "detail" => $m->GetEdit($id)->row(),
                            "drop_idol" => $m->dropdown_idol()
                            );
                $this->template
                ->css($CSS)
                ->js($JS)
                ->view("adm_editprofil/home", $VIEW)
                ->master("template", $MASTER);
            } else {
                $data = array(
                        "nama_akun" => $this->input->post("nama_akun"),
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
                $condition["id_akun"] = $id;
                $m->Edit($data, $condition);
                $this->session->set_flashdata('info', 'Profil berhasil diubah');
                redirect('adm_editprofil');
            }
        } else {
            $CSS = '<link rel="stylesheet" href="'.$base.'assets/neon/js/select2/select2-bootstrap.css">
                    <link rel="stylesheet" href="'.$base.'assets/neon/js/select2/select2.css">';
            $JS = $this->load->view('adm_editprofil/js', '', TRUE);
            $JS .= '<script src="'.$base.'assets/neon/js/select2/select2.min.js"></script>
                    <script src="'.$base.'assets/neon/js/bootstrap-datepicker.js"></script>';
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Profil",
                "SUBTITLE" => "Edit Profil",
            );
            $VIEW = array(
                        "detail" => $m->GetEdit($id)->row(),
                        "drop_idol" => $m->dropdown_idol()
                        );
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_editprofil/home", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function editfoto()
    {
        $id = $this->session->userdata('id_akun');
        $m = $this->M_adm_editprofil;
        if ($this->input->post('edit')) {
            $namafile = "48ptk".date('Y_m_d_H_i_s');
            // $namafile = "48ptk".time();
            $config['upload_path'] = $this->upload_path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['file_name'] = $namafile;
            $this->load->library('upload', $config);
            if ($_FILES['foto']['name']) {
                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    $query = array(
                        'foto_akun' => $gbr['file_name']
                    );
                    $condition["id_akun"] = $id;
                    $m->editfoto($query, $condition);
                    $this->session->set_flashdata('info', 'Foto Berhasil Di Edit');
                    redirect("adm_editprofil");
                } else if (! $this->upload->do_upload()) {
                    $this->session->set_flashdata('info', 'Foto Gagal Di Edit');
                    redirect("adm_editprofil");
                }
            } else {
                redirect("adm_editprofil");
            }
        } else {
            $CSS = "";
            $JS = $this->load->view('adm_editprofil/js', '', TRUE);
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Profil",
                "SUBTITLE" => "Edit Foto",
            );
            $VIEW = array("detail" => $m->Getedit($id)->row());
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_editprofil/editfoto", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function ubahpw()
    {
        $id = $this->session->userdata('id_akun');
        $base = base_url();
        $m = $this->M_adm_editprofil;
        $this->form_validation->set_rules('pw_akun', 'Password Lama', 'required|min_length[5]');
        $this->form_validation->set_rules('pw_akun_confirm', 'Password Lama', 'required|min_length[5]|matches[pw_akun]', array(
                    'min_length'    => '{field} kurang dari {param} karakter.',
                    'matches'    => '{field} tidak sama dengan Password Baru.'
                ));
        if ($this->form_validation->run() == FALSE) {
            $CSS = '<link rel="stylesheet" href="'.$base.'assets/neon/js/select2/select2-bootstrap.css">
                <link rel="stylesheet" href="'.$base.'assets/neon/js/select2/select2.css">';
            $JS = $this->load->view('adm_editprofil/js', '', TRUE);
            $JS .= '<script src="'.$base.'assets/neon/js/select2/select2.min.js"></script>
                    <script src="'.$base.'assets/neon/js/bootstrap-datepicker.js"></script>';
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Profil",
                "SUBTITLE" => "Edit Profil",
            );
            $VIEW = array(
                        "detail" => $m->GetEdit($id)->row(),
                        "drop_idol" => $m->dropdown_idol()
                        );
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_editprofil/home", $VIEW)
            ->master("template", $MASTER);
        } else {
            $pw_akun = md5($this->input->post("pw_akun_old"));
            $data = array(
                        "pw_akun" => md5($this->input->post("pw_akun"))
                    );
            $condition["id_akun"] = $id;
            $m->ubahpw($data, $condition, $pw_akun);
            $this->session->set_flashdata('info', 'Password berhasil diubah');
            redirect('adm_editprofil');
        }
    }

}

/* End of file Adm_editprofil.php */
/* Location: ./application/modules/adm_editprofil/controllers/Adm_editprofil.php */