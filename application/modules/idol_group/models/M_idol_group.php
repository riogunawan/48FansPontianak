<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_idol_group extends CI_Model {

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

    public function GetIdolGroup()
    {
        $this->db->where('del_idol_group', 0);
        return $this->db->get('tb_idol_group')->result();
    }


    public function GetIdolG($id_idol_group)
    {
        $this->db->where('del_idol_group', 0);
        $this->db->where('id_idol_group', $id_idol_group);
        return $this->db->get('tb_idol_group')->row();
    }

    public function JumlahIdol($id_idol_group)
    {
        $this->db->where('del_idol', 0);
        $this->db->where('id_idol_group', $id_idol_group);
        return $this->db->get('tb_idol');
    }

    public function GetIdol($id_idol)
    {
        $this->db->join('tb_idol_group B', 'B.id_idol_group = A.id_idol_group', 'left');
        $this->db->where('id_idol', $id_idol);
        $this->db->where('del_idol', 0);
        return $this->db->get('tb_idol A')->row();
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

/* End of file M_idol_group.php */
/* Location: ./application/modules/idol_group/models/M_idol_group.php */