<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_gathering extends Q_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_event_gathering');
        $this->load->helper('h_fungsidate');
    }

    public function index()
    {
        $m = $this->M_event_gathering;
        $idakun = $this->session->userdata('id_akun');
        $base = base_url();
        $CSS = "<link href='{$base}assets/charityfund/css/colors/theme-skin-sky-blue.css' rel='stylesheet' type='text/css'>";
        $JS = $this->load->view('event_gathering/js', '', TRUE);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak - Fanbase 48 Group Regional Pontianak",
            "SUBTITLE" => "Event & Gathering 48FansPontianak",
            //-----GET MENU---------
            "MenuAbout" => $m->MenuGetAbout(),
            "MenuIdolG" => $m->MenuGetIdolG(),
            "keranjang" => $m->jumlahkeranjang($idakun)->num_rows()
            //-----TUTUP GET MENU-----
        );
        $VIEW = array(
            'detail_event' => $m->GetE(),
            'detail_gath' => $m->GetG()
            );
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("event_gathering/home", $VIEW)
        ->master("depan_template", $MASTER);
    }

    public function lihat($id_event)
    {
        $idakun = @$this->session->userdata('id_akun');
        $m = $this->M_event_gathering;
        $base = base_url();
        $CSS = "<link href='{$base}assets/charityfund/css/colors/theme-skin-sky-blue.css' rel='stylesheet' type='text/css'>";
        $JS = $this->load->view('event_gathering/js', '', TRUE);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak - Fanbase 48 Group Regional Pontianak",
            "SUBTITLE" => "Event & Gathering 48FansPontianak",
            //-----GET MENU---------
            "MenuAbout" => $m->MenuGetAbout(),
            "MenuIdolG" => $m->MenuGetIdolG(),
            'detail' => $m->GetEvent($id_event)->judul_event,
            "keranjang" => $m->jumlahkeranjang($idakun)->num_rows()
            //-----TUTUP GET MENU-----
        );
        $VIEW = array(
            'detail' => $m->GetEvent($id_event),
            'listtiket' => $m->GetTiket($id_event)
            );
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("event_gathering/detil", $VIEW)
        ->master("depan_template1", $MASTER);
    }

    public function keranjang($id_tiket)
    {
        if ($this->session->userdata('masuk') != 'Sudah Login') {
            $this->session->set_flashdata('info', 'Login dulu');
            redirect('login');
        }
        $m = $this->M_event_gathering;
        $idakun = $this->session->userdata('id_akun');
        $tiket = $m->GetTiket1($id_tiket);
        $harga = $tiket->row('harga_tiket');
        $event = $tiket->row('id_event');
        $banyak = $this->input->post('jumlah_tiket');
        $diskon = $tiket->row('diskon_tiket') / 100;
        $hargadiskon = $harga * $diskon;
        $hargaasli = $harga - $hargadiskon;
        $total = $hargaasli * $banyak;
        date_default_timezone_set('Asia/Pontianak');
        $data = array(
            'id_tiket' => $id_tiket,
            'total_harga' => $total,
            'jumlah_tiket' => $banyak,
            'id_akun' => $idakun,
            'status_bayar' => 'belum',
            'tgl_memesan' => date('y-m-d')
             );
        $m->tambahmeta($data);
        redirect("event_gathering/lihat/{$event}");
    }

    public function lihatkeranjang($id_akun)
    {
        if ($this->session->userdata('masuk') != 'Sudah Login') {
            $this->session->set_flashdata('info', 'Login dulu');
            redirect('login');
        }
        $idakun = $this->session->userdata('id_akun');
        $m = $this->M_event_gathering;
        $base = base_url();
        if ($this->input->post('pesan')) {
            $id = $this->session->userdata('id_akun');
            $no_memesan = 'M'.date('d').date('H').$id;
            $m->pesan($id, $no_memesan);
            $this->session->set_flashdata('info', 'Tiket Berhasil di Pesan, silakan cek E-mail untuk melihat nomor rekening');
            redirect('event_gathering/lihatkeranjang/'.$id.'');
        } else {
            $CSS = "<link href='{$base}assets/charityfund/css/colors/theme-skin-sky-blue.css' rel='stylesheet' type='text/css'>";
            $JS = $this->load->view('event_gathering/js', '', TRUE);
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak - Fanbase 48 Group Regional Pontianak",
                "SUBTITLE" => "Event & Gathering 48FansPontianak",
                //-----GET MENU---------
                "MenuAbout" => $m->MenuGetAbout(),
                "MenuIdolG" => $m->MenuGetIdolG(),
                "keranjang" => $m->jumlahkeranjang($idakun)->num_rows()
                //-----TUTUP GET MENU-----
            );
            $VIEW = array(
                'listtiket' => $m->getkeranjang($id_akun)
                );
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("event_gathering/keranjang", $VIEW)
            ->master("depan_template1", $MASTER);
        }
    }

    public function hapusmeta($id_metamemesan)
    {
        if ($this->session->userdata('masuk') != 'Sudah Login') {
            $this->session->set_flashdata('info', 'Login dulu');
            redirect('login');
        }
        $id = $this->session->userdata('id_akun');
        $m = $this->M_event_gathering;
        $m->hapusmeta($id_metamemesan, $id);
        if ($this->db->affected_rows()) {
            // $this->session->set_flashdata('info', 'Idol berhasil dihapus');
            redirect('event_gathering/lihatkeranjang/'.$id.'');
        } else {
            $this->session->set_flashdata('info', 'Tiket Gagal Dihapus');
            redirect('event_gathering/lihatkeranjang/'.$id.'');
        }
    }

}

/* End of file Event_gathering.php */
/* Location: ./application/modules/event_gathering/controllers/Event_gathering.php */