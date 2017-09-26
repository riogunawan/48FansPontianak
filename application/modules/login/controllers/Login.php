<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Q_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }

    public function index()
    {
        // UNTUK MENGECEK APAKAH SUDAH LOGIN
        if ($this->session->userdata('masuk') == 'Sudah Login') {
            echo "<script type='text/javascript'>alert('Anda sudah Login')</script>";
            redirect('adm_home','refresh'); //adm_home = controller admin panel
        }
        if (!empty($this->session->flashdata('belum-login'))) {
            echo "<script type='text/javascript'>alert('belum Login')</script>";
        }

        $MASTER = array(
            "TITLE" => "48 Fans Pontianak | Admin Panel",
            "SUBTITLE" => "Halaman Log-In Admin Panel 48 Fans Pontianak",
        );
        $this->template
        ->view("login/home")
        ->master("template_login", $MASTER);
    }

    public function masuk()
    {
        // UTK MEMBACA USERNAME DAN PASSWORD YG ADA DIDATABASE MELALUI MODEL
        $data = array('username_akun' => $this->input->post('username_akun', TRUE),
                        'pw_akun' => md5($this->input->post('pw_akun', TRUE))
                    );
        $hasil = $this->M_login->cek_user($data);

        if ($hasil->num_rows() == 1) {
            foreach ($hasil->result() as $sess) {
                $sess_data['masuk'] = 'Sudah Login';
                $sess_data['id_akun'] = $sess->id_akun;
                $sess_data['username_akun']  = $sess->username_akun;
                $sess_data['level_akun'] = $sess->level_akun;
                $sess_data['nama_akun'] = $sess->nama_akun;
                $sess_data['foto_akun'] = $sess->foto_akun;
                $sess_data['keanggotaan'] = $sess->keanggotaan;
                $this->session->set_userdata($sess_data);
            }
            if ($this->session->userdata('level_akun') == 1) {
                redirect('adm_home');
            }
            elseif ($this->session->userdata('level_akun') == 2) {
                redirect('adm_home');
            }
            elseif ($this->session->userdata('level_akun') == 3) {
                redirect('depan_home');
            }
            elseif ($this->session->userdata('level_akun') == 4) {
                redirect('adm_home');
            }
            else {
                redirect('login/auth');
            }
        }
        else {
            echo "<script type='text/javascript'>alert('Gagal Login: Cek Username dan Password!!!')</script>";
            redirect('login','refresh');
        }
    }

    public function auth()
    {
        if ($this->session->userdata('masuk') != 'Sudah Login') {
            $this->session->set_flashdata('belum-login', 'false');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login','refresh');
    }

    public function reset_password()
    {
        if (isset($_POST['email_akun']) && !empty($_POST['email_akun'])) {
            //CEK EMAIL VALID ATAU TIDAK
            $this->form_validation->set_rules('email_akun', 'E-mail', 'trim|required|min_length[5]|valid_email');

            if ($this->form_validation->run() == FALSE) {
                // E-MAIL TIDAK VALID
                $CSS = "";
                $JS = "";
                $MASTER = array(
                    "TITLE" => "48 Fans Pontianak | Lupa Password",
                    "SUBTITLE" => "Lupa Password",
                    "error" => 'Masukkan e-mail yang valid'
                );
                $VIEW = '';
                $this->template
                ->css($CSS)
                ->js($JS)
                ->view("login/lupa", $VIEW)
                ->master("template_login", $MASTER);
            } else {
                $email_akun = trim($this->input->post('email_akun'));
                $result = $this->M_login->email_exists($email_akun);

                if ($result) {
                    //JIKA EMAIL DITEMUKAN, $RESULT MENJADI NAMA LENGKAP
                    $this->send_reset_password_email($email_akun, $result);

                    $this->session->set_flashdata('info', 'Silakan cek E-mail');
                    redirect('login');
                } else {
                    $CSS = "";
                    $JS = "";
                    $MASTER = array(
                        "TITLE" => "48 Fans Pontianak | Lupa Password",
                        "SUBTITLE" => "Lupa Password",
                        "email_akun" => $email_akun,
                        "error" => 'E-mail tidak terdaftar di 48 Fans Pontianak'
                    );
                    $VIEW = '';
                    $this->template
                    ->css($CSS)
                    ->js($JS)
                    ->view("login/lupa_send", $VIEW)
                    ->master("lupa_send", $MASTER);
                }
            }
        } else {
            $CSS = "";
            $JS = "";
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Lupa Password",
                "SUBTITLE" => "Lupa Password"
            );
            $VIEW = '';
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("login/lupa", $VIEW)
            ->master("template_login", $MASTER);
        }
    }

    public function send_reset_password_email($email_akun, $nama_akun)
    {
        // KIRIM EMAIL
        $email_code = md5($this->config->item('salt') . $nama_akun);

        //MENGIRIM EMAIL
        $hello = '<h1 style="color:#333;font-family:Helvetica,Arial,sans-serif;font-weight:300;padding:0;margin:10px 0 25px;text-align:center;line-height:1;word-break:normal;font-size:38px;letter-spacing:-1px">Hello, &#9786;</h1>';
        $thanks = "<br><br><i>This is autogenerated email please do not reply.</i><br/><br/>Thanks,<br/>Admin<br/><br/>";
        $sendTo = $email_akun;
        $message = "Berikut data akun anda:<br><br>Email: $sendTo <br><br><p>Kami ingin membantu mereset password Anda,<br><br> dengan mengklik <strong><a href='".base_url()."login/reset_password_form/$email_akun/$email_code'>link ini</a></strong> Untuk mereset password</p>";
        $subject = "Reset password Anda di Website 48 Fans Pontianak";

        require APPPATH.'libraries/PHPMailer/PHPMailerAutoload.php';

        $mail = new PHPMailer;
        $mail->isSMTP(true); // telling the class to use SMTP
        $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ));
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = '48fansptk@gmail.com';                 // SMTP username
        $mail->Password = 'pontianak484848';                           // SMTP password

        $mail->setFrom('48fansptk@gmail.com', '48FansPontianak');
        $mail->addAddress($sendTo);     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->WordWrap = 0;
        $mail->Subject = "DO NOT REPLY - ".$subject;
        $body = $hello.$message.$thanks;
        $mail->Body = $body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }

    public function reset_password_form($email_akun, $email_code)
    {
        if (isset($email_akun, $email_code)) {
            $email_akun = trim($email_akun);
            $email_hash = sha1($email_akun . $email_code);
            $verified = $this->M_login->verify_reset_password_code($email_akun, $email_code);

            if ($verified) {
                $CSS = "";
                $JS = "";
                $MASTER = array(
                    "TITLE" => "48 Fans Pontianak | Lupa Password",
                    "SUBTITLE" => "Lupa Password",
                    "email_hash" => $email_hash,
                    "email_code" => $email_code,
                    "email_akun" => $email_akun
                );
                $VIEW = '';
                $this->template
                ->css($CSS)
                ->js($JS)
                ->view("login/lupa_update", $VIEW)
                ->master("template_login", $MASTER);
            } else {
                $this->session->set_flashdata('info', 'Kesalahan link, klik link nya lagi atau reset password lagi');
                redirect('login');
            }
        }
    }

    public function update_password()
    {
        if (!isset($_POST['email_akun'], $_POST['email_hash']) || $_POST['email_hash'] !== sha1($_POST['email_akun'] . $_POST['email_code'])) {
            //JIKA HACKER mengubah email in email field,just die
            die('Error Update Password');
        }

        $this->form_validation->set_rules('email_hash', 'Email Hash', 'trim|required');
        $this->form_validation->set_rules('email_akun', 'Email akun', 'trim|required|valid_email');
        $this->form_validation->set_rules('pw_akun', 'Password Baru', 'trim|required|min_length[8]|max_length[50]|matches[pw_akun_conf]');
        $this->form_validation->set_rules('pw_akun_conf', 'Re-type Password', 'trim|required|min_length[8]|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            //user salah validasi
            $CSS = "";
            $JS = "";
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Lupa Password",
                "SUBTITLE" => "Lupa Password",
                "email_hash" => $email_hash,
                "email_code" => $email_code,
                "email_akun" => $email_akun
            );
            $VIEW = '';
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("login/lupa_update", $VIEW)
            ->master("template_login", $MASTER);
        } else {
            // UPDATE SUCCESS
            $result = $this->M_login->update_password();

            if ($result) {
                $this->session->set_flashdata('info', 'Password berhasil diubah');
                redirect('login');
            } else {
                //TIdak MNGKIN TERJADI
                $this->session->set_flashdata('info', 'Terjadi Kesalahan silakan hubungi admin 48fansptk@gmail.com');
                redirect('login');
            }
        }
    }

}

/* End of file Login.php */
/* Location: ./application/modules/login/controllers/Login.php */