<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_adm_idol extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $this->db->join('tb_idol_group B', 'B.id_idol_group = A.id_idol_group', 'left');
        $this->db->order_by('nama_idol_group', 'asc');
        $this->db->order_by('nama_idol', 'asc');
        $this->db->where('del_idol', 0);
        return $this->db->get('tb_idol A');
    }

    public function dropdown_idol_group()
    {
        $this->db->where('del_idol_group', 0);
        return $this->db->get('tb_idol_group');
    }

    public function tambah($data)
    {
        $this->db->insert('tb_idol', $data);
    }

    public function GetEdit($id_idol)
    {
        $this->db->join('tb_idol_group B', 'B.id_idol_group = A.id_idol_group', 'left');
        return $this->db->get_where('tb_idol A', array('id_idol' => $id_idol));
    }

    public function Edit($data, $condition)
    {
        $this->db->where($condition);
        $this->db->update('tb_idol', $data);
    }

    public function Hapus($data, $id_idol)
    {
        $this->db->where('id_idol', $id_idol);
        $this->db->update('tb_idol', $data);
    }

}

/* End of file M_adm_idol.php */
/* Location: ./application/modules/adm_idol/models/M_adm_idol.php */