<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sejarah extends CI_Model {

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

    public function GetSejarah()
    {
        $this->db->where('id_about', 2);
        return $this->db->get('tb_about');
    }

    public function GetEvent()
    {
        $this->db->order_by('tgl_event', 'desc');
        $this->db->where('jenis_event', 'event');
        $this->db->where('del_event', 0);
        $this->db->limit(3);
        return $this->db->get('tb_event')->result();
    }

    public function GetGath()
    {
        $this->db->order_by('tgl_event', 'desc');
        $this->db->where('jenis_event', 'gathering');
        $this->db->where('del_event', 0);
        $this->db->limit(3);
        return $this->db->get('tb_event')->result();
    }

}

/* End of file M_sejarah.php */
/* Location: ./application/modules/sejarah/models/M_sejarah.php */