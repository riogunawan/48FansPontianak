<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_adm_pengurus extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $this->db->order_by('level_akun', 'asc');
        $this->db->order_by('nama_akun', 'asc');
        $this->db->where('del_akun', 0);
        return $this->db->get('tb_akun');
    }

    public function dropdown_idol()
    {
        return $this->db->get('tb_idol');
    }

    public function tambah($data)
    {
        $this->db->insert('tb_akun', $data);
    }

    public function GetEdit($id_akun)
    {
        $this->db->join('tb_idol B', 'B.id_idol = A.id_idol', 'left');
        $this->db->where('del_akun', 0);
        return $this->db->get_where('tb_akun A', array('id_akun' => $id_akun));
    }

    public function Edit($data, $condition)
    {
        $this->db->where($condition);
        $this->db->update('tb_akun', $data);
    }

    public function Hapus($id_akun)
    {
        $this->db->where('id_akun', $id_akun);
        $this->db->delete('tb_akun');
    }
}

/* End of file M_adm_pengurus.php */
/* Location: ./application/modules/adm_pengurus/models/M_adm_pengurus.php */