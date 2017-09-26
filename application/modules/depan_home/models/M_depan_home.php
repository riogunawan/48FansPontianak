<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_depan_home extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------HARUS DIPAKAI DI SEMUA MODEL UNTUK HALAMAN DEPAN
    public function MenuGetAbout()
    {
        $this->db->where('id_about', 1);
        return $this->db->get('tb_about')->row();
    }

    public function MenuGetIdolG()
    {
        $this->db->where('del_idol_group', 0);
        return $this->db->get('tb_idol_group')->result();
    }

    public function jumlahkeranjang($idakun)
    {
        $this->db->where('id_akun', $idakun);
        return $this->db->get('tb_metamemesan');
    }
    // ---------------------------CLose HARUS--------------

    public function GetBerita()
    {
        $this->db->from('tb_berita A');
        $this->db->join('tb_jns_berita B', 'B.id_jns_berita = A.id_jns_berita');
        $this->db->join('tb_akun C', 'C.id_akun = A.id_akun');
        $this->db->order_by('tgl_berita', 'desc');
        $this->db->where('del_berita', 0);
        $this->db->limit(6);
        return $this->db->get()->result();
    }

    public function GetEvent()
    {
        $this->db->order_by('tgl_event', 'desc');
        $this->db->where('jenis_event', 'event');
        $this->db->where('del_event', 0);
        $this->db->limit(6);
        return $this->db->get('tb_event')->result();
    }

    public function GetGath()
    {
        $this->db->order_by('tgl_event', 'desc');
        $this->db->where('jenis_event', 'gathering');
        $this->db->where('del_event', 0);
        $this->db->limit(6);
        return $this->db->get('tb_event')->result();
    }

    public function GetIdolG()
    {
        $this->db->order_by('nama_idol_group', 'asc');
        $this->db->where('del_idol_group', 0);
        return $this->db->get('tb_idol_group')->result();
    }

    public function GetPengurus()
    {
        $this->db->where('level_akun', 2);
        $this->db->where('del_akun', 0);
        return $this->db->get('tb_akun')->result();
    }

    public function GetKetua()
    {
        $this->db->where('level_akun', 1);
        $this->db->where('del_akun', 0);
        return $this->db->get('tb_akun')->result();
    }

    public function GetFounder()
    {
        $this->db->where('level_akun', 4);
        $this->db->where('del_akun', 0);
        return $this->db->get('tb_akun')->result();
    }

}

/* End of file M_depan_home.php */
/* Location: ./application/modules/depan_home/models/M_depan_home.php */