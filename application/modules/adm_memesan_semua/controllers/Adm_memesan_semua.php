<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_memesan_semua extends Q_Controller {

    private $upload_path = "./assets/uploads";

    public function __construct()
    {
        parent::__construct();
        Modules::run("login/auth");
        $this->load->model('M_adm_memesan_semua');
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
                  <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2.css'>
                ";
        $JS = "<!-- DataTables -->
                <script src='{$base}assets/neon/js/datatables/datatables.js'></script>
                <script src='{$base}assets/neon/js/select2/select2.min.js'></script>
                ";
        $JS .= $this->load->view('adm_memesan_semua/js', '', true);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak | Konfirmasi Pembayaran",
            "SUBTITLE" => "Tabel Data Konfirmasi Pembayaran",
        );
        $VIEW['list'] = $this->M_adm_memesan_semua->getAll();
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("adm_memesan_semua/home", $VIEW)
        ->master("template", $MASTER);
    }

    public function upload_resi($no_memesan)
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') == 3) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $m = $this->M_adm_memesan_semua;
        $base = base_url();
        $CSS = "";
        $JS = $this->load->view('adm_memesan_semua/js', '', true);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak | Konfirmasi Pembayaran",
            "SUBTITLE" => "Upload Resi",
        );
        $VIEW['list'] = $m->getTiket($no_memesan);
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("adm_memesan_semua/upload", $VIEW)
        ->master("template", $MASTER);
    }

    public function konfirmasi($no_memesan)
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') == 3) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $m = $this->M_adm_memesan_semua;
        $get = $m->getdata($no_memesan);
            $i = 0;
        foreach ($get->result() as $row) {
            $id = $row->id_memesan;
            $user = $row->id_akun;
            $event = $row->judul_event;
            $tiket = $row->id_tiket;
            $jumlah_tiket = $row->jumlah_tiket;
                $kode_tiket = 'Tiket48ptk-'.$row->id_event.'-'.$row->id_tiket.'-'.substr($row->tgl_memesan, 8, 2).'-'.$row->no_memesan.'-'.$user.'-'.$row->jumlah_tiket.'-'.$i;
            $i++;
            $data = array(
                        "status_bayar" => 'Sudah',
                        "kode_tiket" => $kode_tiket
                    );

            // PENGURANGAN STOK
            $totaltiket = $m->getstoktiket($tiket);
            $hasiltiket = $totaltiket->row('stok_tiket') - $jumlah_tiket;
            $datahasil = array(
                    "stok_tiket" => $hasiltiket
                );
            //TUTUP PENGURANGAN------------------------------
            $m->konfirmasi($data, $id, $user, $event);
            $m->stok($datahasil, $tiket);
        }
        $id_user = $get->row('id_akun');
        $m->kirim_email($id_user, $no_memesan);
        $this->session->set_flashdata('info', 'Konfirmasi Berhasil');
        redirect('adm_memesan_semua/tiket/'.$no_memesan.'');
    }

    public function hapus($no_memesan)
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') == 3) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $m = $this->M_adm_memesan_semua;
            $data = array(
                        "del_memesan" => 1
                    );
        $m->hapus($data, $no_memesan);
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('info', 'Pemesanan Berhasil dihapus');
            redirect('adm_memesan_semua');
        } else {
            $this->session->set_flashdata('info', 'Pemesanan Gagal dihapus');
            redirect('adm_memesan_semua');
        }
    }

    public function tiket($no_memesan)
    {
        $m = $this->M_adm_memesan_semua;
        $base = base_url();
        $CSS = "";
        $JS = $this->load->view('adm_memesan_semua/js', '', true);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak | Kode Tiket",
            "SUBTITLE" => "Kode Tiket",
        );
        $VIEW['list'] = $m->getdata1($no_memesan);
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("adm_memesan_semua/tiket", $VIEW)
        ->master("template", $MASTER);
    }

}

/* End of file Adm_memesan_semua.php */
/* Location: ./application/modules/adm_memesan_semua/controllers/Adm_memesan_semua.php */