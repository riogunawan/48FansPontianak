<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_adm_memesan_semua extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $this->db->join('tb_akun B', 'B.id_akun = A.id_akun');
        $this->db->select('*, SUM(total_harga) as total_harga, SUM(jumlah_tiket) as jumlah_tiket');
        $this->db->where('del_memesan', 0);
        $this->db->group_by('no_memesan');
        $this->db->order_by('status_bayar', 'asc');
        return $this->db->get('tb_memesan A');
    }

    public function getTiket($no_memesan)
    {
        $this->db->join('tb_tiket B', 'B.id_tiket = A.id_tiket');
        $this->db->join('tb_event C', 'C.id_event = B.id_tiket');
        $this->db->where('no_memesan', $no_memesan);
        $this->db->where('del_memesan', 0);
        return $this->db->get('tb_memesan A');
    }

    public function getdata($no_memesan)
    {
        $this->db->select('id_memesan, B.id_event, no_memesan, A.id_akun, A.id_tiket, tgl_memesan, A.jumlah_tiket, del_memesan, C.judul_event');
        $this->db->join('tb_tiket B', 'B.id_tiket = A.id_tiket');
        $this->db->join('tb_event C', 'B.id_event = C.id_event');
        $this->db->where('no_memesan', $no_memesan);
        $this->db->where('del_memesan', 0);
        return $this->db->get('tb_memesan A');
    }

    public function getdata1($no_memesan)
    {
        $this->db->select('id_memesan, B.id_event, no_memesan, A.id_akun, A.id_tiket, tgl_memesan, A.jumlah_tiket, del_memesan, C.judul_event, kode_tiket, D.nama_akun, B.jenis_tiket');
        $this->db->join('tb_tiket B', 'B.id_tiket = A.id_tiket');
        $this->db->join('tb_event C', 'B.id_event = C.id_event');
        $this->db->join('tb_akun D', 'D.id_akun = A.id_akun');
        $this->db->where('no_memesan', $no_memesan);
        $this->db->where('del_memesan', 0);
        return $this->db->get('tb_memesan A');
    }

    public function getstoktiket($tiket)
    {
        $this->db->where('id_tiket', $tiket);
        return $this->db->get('tb_tiket');
    }

    public function konfirmasi($data, $id, $user, $event)
    {
        $this->db->where('id_memesan', $id);
        $this->db->update('tb_memesan', $data);
    }

    public function stok($datahasil, $tiket)
    {
        $this->db->where('id_tiket', $tiket);
        $this->db->update('tb_tiket', $datahasil);
    }

    public function kirim_email($id_user, $no_memesan)
    {
        //KIRIM KODE KE EMAIL
        $email = $this->db->query("SELECT email_akun FROM `tb_akun` WHERE id_akun = '$id_user'");
        require APPPATH.'libraries/PHPMailer/PHPMailerAutoload.php';

        $sendTo = $email->row('email_akun');
        $message = "<h1>Konfirmasi Pembelian Tiket</b></h1>
            <legend></legend><br>
            <h2>No. Pembelian = ".$no_memesan."</h2><br>
            <p>Kode Tiket dapat diambil di menu Konfirmasi Pembayaran, lalu tekan tombol 'Minta Kode Tiket'</p>
            <p>Untuk mendapatkan Tiket,</p>
            <p>Terima Kasih :)</p>
            <p>Atau Klik link berikut ".base_url()."adm_memesan/cetak/".$no_memesan."</p>";
        $subject = "Kode Tiket 48FansPontianak";
        $this->SendEmail($data, $sendTo, $message, $subject);
    }

    function SendEmail($data, $sendTo, $message, $subject)
    {
        $hello = '<h1 style="color:#333;font-family:Helvetica,Arial,sans-serif;font-weight:300;padding:0;margin:10px 0 25px;text-align:center;line-height:1;word-break:normal;font-size:38px;letter-spacing:-1px">Notifikasi Kode Tiket dari 48FansPontianak</h1>';
        $thanks = "<br><br><i>This is autogenerated email please do not reply.</i><br/><br/>Thanks,<br/>Admin<br/><br/>";

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
        $mail->Subject = $subject;
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

    public function hapus($data, $no_memesan)
    {
        $this->db->where('no_memesan', $no_memesan);
        $this->db->update('tb_memesan', $data);
    }

}

/* End of file M_adm_memesan_semua.php */
/* Location: ./application/modules/adm_memesan_semua/models/M_adm_memesan_semua.php */