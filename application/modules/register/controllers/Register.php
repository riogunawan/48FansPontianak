<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Q_Controller {

    private $upload_path = "./assets/uploads";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_register');
        $this->load->helper(array('captcha','url','form'));
    }

    public function index()
    {
        $m = $this->M_register;
        // PANGGIL FUNCTION CAPCAH
        $config_captcha = array(
            'img_path'  => './captcha/',
            'img_url'  => base_url().'captcha/',
            'img_width'  => '200',
            'img_height' => 50,
            'border' => 0,
            'expiration' => 3600,
            # atur warna captcha-nya di sini ya.. gunakan kode RGB
            'colors' => array(
                    'background' => array(242, 242, 242),
                    'border' => array(255, 255, 255),
                    'text' => array(0, 0, 0),
                    'grid' => array(255, 40, 40)
                )
           );
        // membuat captcha image
        $cap = create_captcha($config_captcha);
        // store the captcha word in a session
        $this->session->set_userdata('mycaptcha', $cap['word']);
        $CSS = "";
        $JS = "";
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak | Register",
            "SUBTITLE" => "Register",
            "drop_idol" => $m->drop_idol(),
            // store image html code in a variable
            'img' => $cap['image']
        );
        $VIEW = '';
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("register/home", $VIEW)
        ->master("home", $MASTER);
    }

    public function Add()
    {
        $m = $this->M_register;
        $secutity_code = $this->input->post('secutity_code');
        $mycaptcha = $this->session->userdata('mycaptcha');
        if ($this->input->post('submit') && (strtoupper($secutity_code) == strtoupper($mycaptcha))) {
            // 'field_name', 'Field Label', 'rule1|rule2|rule3',array('rule2' => 'Error Message on rule2 for this field_name'));
            $required = '%s Belum Di isi.';
            $unik = '%s sudah digunakan, gunakan yang lain.';
            $this->form_validation->set_rules('username_akun', 'Username', 'required|max_length[20]|is_unique[tb_akun.username_akun]', array(
                    'required'      => $required,
                    'is_unique'     => $unik
                ));
            $this->form_validation->set_rules('pw_akun', 'Password', 'required|min_length[8]', array(
                    'min_length'    => '{field} kurang dari {param} karakter.'
                ));
            $this->form_validation->set_rules('pw_confirm_akun', 'Re-type Password', 'required|min_length[8]|matches[pw_akun]', array(
                    'min_length'    => '{field} kurang dari {param} karakter.',
                    'matches'    => '{field} tidak sama dengan Password.'
                ));
            $this->form_validation->set_rules('nama_akun', 'Nama Lengkap', 'required|max_length[50]', array(
                    'max_length'    => '{field} lebih dari {param} karakter.'
                ));
            $this->form_validation->set_rules('email_akun', 'E-Mail', 'required|is_unique[tb_akun.email_akun]',array(
                    'required'      => $required,
                    'is_unique'     => $unik
                )
            );
            if ($this->form_validation->run() == FALSE) {
                // PANGGIL FUNCTION CAPCAH
                $config_captcha = array(
                    'img_path'  => './captcha/',
                    'img_url'  => base_url().'captcha/',
                    'img_width'  => '170',
                    'img_height' => 50,
                    'border' => 0,
                    'expiration' => 3600,
                    # atur warna captcha-nya di sini ya.. gunakan kode RGB
                    'colors' => array(
                            'background' => array(242, 242, 242),
                            'border' => array(255, 255, 255),
                            'text' => array(0, 0, 0),
                            'grid' => array(255, 40, 40)
                        )
                   );
                // membuat captcha image
                $cap = create_captcha($config_captcha);
                // store the captcha word in a session
                $this->session->set_userdata('mycaptcha', $cap['word']);
                $CSS = "";
                $JS = "";
                $MASTER = array(
                    "TITLE" => "48 Fans Pontianak | Register",
                    "SUBTITLE" => "Register",
                    "drop_idol" => $m->drop_idol(),
                    // store image html code in a variable
                    'img' => $cap['image']
                );
                $VIEW = '';
                $this->template
                ->css($CSS)
                ->js($JS)
                ->view("register/home", $VIEW)
                ->master("home", $MASTER);
            } else {
                $data = array(
                    "username_akun" => $this->input->post("username_akun"),
                    "pw_akun" => md5($this->input->post("pw_akun")),
                    "nama_akun" => $this->input->post("nama_akun"),
                    "id_idol" => $this->input->post("id_idol"),
                    "level_akun" => 3,
                    "keanggotaan" => 'Anggota',
                    "email_akun" => $this->input->post("email_akun"),
                    'foto_akun' => $this->input->post("foto_akun"),
                    'created_akun' => date('Y\-m\-d\ H:i:s A'),
                    'del_akun' => 1
                );

                // KIRIM EMAIL
                //MENGIRIM EMAIL
                $hello = '<h1 style="color:#333;font-family:Helvetica,Arial,sans-serif;font-weight:300;padding:0;margin:10px 0 25px;text-align:center;line-height:1;word-break:normal;font-size:38px;letter-spacing:-1px">Hello, &#9786;</h1>';
                $thanks = "<br><br><i>This is autogenerated email please do not reply.</i><br/><br/>Thanks,<br/>Admin<br/><br/>";
                $sendTo = $data['email_akun'];
                $username = $data['username_akun'];
                $message = "Berikut data akun anda:<br><br>Username: $username <br>Email: $sendTo <br><br>Aktifkan akun Anda,<br><br> dengan mengklik link ini ".base_url()."register/konfirmasi/$username";
                $subject = "Konfirmasi E-mail Aktif";

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
                $m->add($data); //akses model untuk menyimpan ke database

                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata('info', 'Registrasi berhasil, Cek E-mail untuk mengaktifkan Akun Anda');
                redirect('login'); //jika berhasil maka akan ditampilkan view upload
                }
            }
        } else {
            // pesan akan muncul jika captcha salah
            // echo "<script type='text/javascript'>alert('Masukkan data yang benar!!!!')</script>";
            $this->session->set_flashdata('notif','<p style="color: #fff;"><b>Captcha salah :( </b></p>');
            redirect('register');
        }
    }

    public function konfirmasi($username_akun)
    {
        //Cek LEVEL user
        $m = $this->M_register;
        $cek = $m->get_user($username_akun);
        if ($cek->row('del_akun') == 0) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('register');
        }
        $data = array(
                        "del_akun" => 0,
                    );
        $m->konfirmasi($data, $username_akun);
        $this->session->set_flashdata('info', 'Selamat, akun '.$cek->row('nama_akun').' berhasil diaktifkan');
        redirect('login');
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