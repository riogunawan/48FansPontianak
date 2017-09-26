<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_tiket extends Q_Controller {

    public function __construct()
    {
        parent::__construct();
        Modules::run("login/auth");
        $this->load->model('M_adm_tiket');
    }

    public function index()
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') == 3) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $id = $this->session->userdata('id_akun');
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
        $JS .= $this->load->view('adm_tiket/js', '', true);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak | Tiket Online",
            "SUBTITLE" => "Tabel Data Tiket Online",
        );
        $VIEW['list'] = $this->M_adm_tiket->getAll($id);
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("adm_tiket/home", $VIEW)
        ->master("template", $MASTER);
    }

    public function tambah()
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') == 3) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $id = $this->session->userdata('id_akun');
        $base = base_url();
        $m = $this->M_adm_tiket;
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('id_event', 'Tiket Event', 'required');
            $this->form_validation->set_rules('jenis_tiket', 'Jenis Tiket', 'required');
            $this->form_validation->set_rules('harga_tiket', 'Harga Tiket', 'required');
            if ($this->form_validation->run() == FALSE) {
                $CSS = "<!-- DataTables -->
                  <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2-bootstrap.css'>
                    <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2.css'>
                    ";
                $JS = "<!-- DataTables -->
                        <script src='{$base}assets/neon/js/select2/select2.min.js'></script>
                        ";
                $JS .= $this->load->view('adm_tiket/js1', '', true);
                $MASTER = array(
                    "TITLE" => "48 Fans Pontianak | Tiket Online",
                    "SUBTITLE" => "Tambah Tiket Online",
                );
                $VIEW = array(
                        'drop_event' => $m->drop_event($id),
                        'list' => $m->metatiket($id)
                        );
                $this->template
                ->css($CSS)
                ->js($JS)
                ->view("adm_tiket/form", $VIEW)
                ->master("template", $MASTER);
            } else {
                $data = array(
                    "id_event" => $this->input->post("id_event"),
                    "jenis_tiket" => $this->input->post("jenis_tiket"),
                    "harga_tiket" => $this->input->post("harga_tiket"),
                    "stok_tiket" => $this->input->post("stok_tiket"),
                    "diskon_tiket" => $this->input->post("diskon_tiket"),
                    "id_akun" => $id
                );
                $m->tambahmeta($data);
                redirect('adm_tiket/tambah');
            }
        } elseif ($this->input->post('simpan')) {
            $m->simpan($id);
            $this->session->set_flashdata('info', 'Tiket berhasil ditambah');
            redirect('adm_tiket/tambah');
        } else {
            $CSS = "<!-- DataTables -->
                  <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2-bootstrap.css'>
                    <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2.css'>
                    ";
            $JS = "<!-- DataTables -->
                    <script src='{$base}assets/neon/js/select2/select2.min.js'></script>
                    ";
            $JS .= $this->load->view('adm_tiket/js1', '', true);
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Tiket Online",
                "SUBTITLE" => "Tambah Tiket Online",
            );
            $VIEW = array(
                    'drop_event' => $m->drop_event($id),
                    'list' => $m->metatiket($id)
                    );
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_tiket/form", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function Hapusmeta($id_metatiket)
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') == 3) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $this->M_adm_tiket->hapusmeta($id_metatiket);
        if ($this->db->affected_rows()) {
            // $this->session->set_flashdata('info', 'Idol berhasil dihapus');
            redirect('adm_tiket/tambah');
        } else {
            // $this->session->set_flashdata('info', 'Idol Gagal Dihapus');
            redirect('adm_tiket/tambah');
        }
    }

    public function edit($id_tiket)
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') == 3) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $id = $this->session->userdata('id_akun');
        $base = base_url();
        $m = $this->M_adm_tiket;
        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('id_event', 'Tiket Event', 'required');
            $this->form_validation->set_rules('jenis_tiket', 'Jenis Tiket', 'required');
            $this->form_validation->set_rules('harga_tiket', 'Harga Tiket', 'required');
            if ($this->form_validation->run() == FALSE) {
                $CSS = "<!-- DataTables -->
                      <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2-bootstrap.css'>
                        <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2.css'>
                        ";
                $JS = "<!-- DataTables -->
                        <script src='{$base}assets/neon/js/select2/select2.min.js'></script>
                        ";
                $JS .= $this->load->view('adm_tiket/js', '', true);
                $MASTER = array(
                    "TITLE" => "48 Fans Pontianak | Tiket Online",
                    "SUBTITLE" => "Edit Tiket Online",
                );
                $VIEW = array(
                        'drop_event' => $m->drop_event($id),
                        'detail' => $m->getedit($id,$id_tiket)->row()
                        );
                $this->template
                ->css($CSS)
                ->js($JS)
                ->view("adm_tiket/edit", $VIEW)
                ->master("template", $MASTER);
            } else {
                $data = array(
                    "id_event" => $this->input->post("id_event"),
                    "jenis_tiket" => $this->input->post("jenis_tiket"),
                    "harga_tiket" => $this->input->post("harga_tiket"),
                    "stok_tiket" => $this->input->post("stok_tiket"),
                    "diskon_tiket" => $this->input->post("diskon_tiket")
                );
                $condition = $this->input->post("id_tiket");
                $m->edit($data, $condition);
                $this->session->set_flashdata('info', 'Tiket berhasil diubah');
                redirect('adm_tiket');
            }
        } else {
            $CSS = "<!-- DataTables -->
                  <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2-bootstrap.css'>
                    <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2.css'>
                    ";
            $JS = "<!-- DataTables -->
                    <script src='{$base}assets/neon/js/select2/select2.min.js'></script>
                    ";
            $JS .= $this->load->view('adm_tiket/js', '', true);
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Tiket Online",
                "SUBTITLE" => "Edit Tiket Online",
            );
            $VIEW = array(
                    'drop_event' => $m->drop_event($id),
                    'detail' => $m->getedit($id,$id_tiket)->row()
                    );
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_tiket/edit", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function Hapus($id_tiket)
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') != 1) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $m = $this->M_adm_tiket;
        $data = array(
                        "del_tiket" => 1,
                    );
        $m->Hapus($data, $id_tiket);
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('info', 'Tiket berhasil dihapus');
            redirect('adm_tiket');
        } else {
            $this->session->set_flashdata('info', 'Tiket Gagal Dihapus');
            redirect('adm_tiket');
        }
    }

}

/* End of file Adm_tiket.php */
/* Location: ./application/modules/adm_tiket/controllers/Adm_tiket.php */