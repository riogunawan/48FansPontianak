<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Q_Controller {

    private $upload_path = "./assets/uploads";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_register');
    }

    public function index()
    {
        $m = $this->M_register;
        $CSS = "";
        $JS = "";
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak | Register",
            "SUBTITLE" => "Register",
            "drop_idol" => $m->drop_idol()
        );
        $VIEW = "";
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("register/home", $VIEW)
        ->master("home", $MASTER);
    }

    public function Add()
    {
        if ($this->input->post('submit')) {
            // 'nama_field', 'nama jika Errornya', 'aturan2nya'
            $this->form_validation->set_rules('username_akun', 'Username', 'required|max_length[20]');
            $this->form_validation->set_rules('pw_akun', 'Password', 'required|min_length[8]');
            $this->form_validation->set_rules('nama_akun', 'Nama Lengkap', 'required|max_length[50]');
            $this->form_validation->set_rules('email_akun', 'E-Mail', 'required');

            if ($this->form_validation->run() == FALSE) {
                $MASTER = array(
                    "TITLE" => "48 Fans Pontianak | Register",
                    "SUBTITLE" => "Register",
                );
                $this->template
                ->view("Register")
                ->master("home", $MASTER);
            } else {
                // $base = base_url();
                $data = array(
                    "username_akun" => $this->input->post("username_akun"),
                    "pw_akun" => md5($this->input->post("pw_akun")),
                    "nama_akun" => $this->input->post("nama_akun"),
                    "id_idol" => $this->input->post("id_idol"),
                    "level_akun" => 3,
                    "email_akun" => $this->input->post("email_akun"),
                    'foto_akun' => $this->input->post("foto_akun"),
                );

                $this->M_register->add($data); //akses model untuk menyimpan ke database
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata('info', 'Selamat Anda Berhasil Mendaftar');
                redirect('Login'); //jika berhasil maka akan ditampilkan view upload
            }
        } else {
            echo "<script type='text/javascript'>alert('Masukkan data yang benar!!!!')</script>";
            redirect('Register');
        }
    }

    public function Upload()
    {
        if (!empty($_FILES)) {
            $config['upload_path'] = $this->upload_path; //Folder untuk menyimpan hasil upload
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '3072'; //maksimum besar file 3M
            $config['max_width']  = '5000'; //lebar maksimum 5000 px
            $config['max_height']  = '5000'; //tinggi maksimu 5000 px
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

/* End of file Register.php */
/* Location: ./application/modules/register/controllers/Register.php */