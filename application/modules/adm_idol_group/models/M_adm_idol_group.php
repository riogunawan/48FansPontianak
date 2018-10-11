<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_adm_idol_group extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $this->db->order_by('nama_idol_group', 'asc');
        $this->db->where('del_idol_group', 0);
        return $this->db->get('tb_idol_group');
    }

    public function tambah($data)
    {
        $this->db->insert('tb_idol_group', $data);
    }

    public function GetEdit($id_idol_group)
    {
        $this->db->where('del_idol_group', 0);
        return $this->db->get_where('tb_idol_group', array('id_idol_group' => $id_idol_group));
    }

    public function Edit($data, $condition)
    {
        $this->db->where($condition);
        $this->db->update('tb_idol_group', $data);
    }

    public function Hapus($data, $id_idol_group)
    {
        $this->db->where('id_idol_group', $id_idol_group);
        $this->db->update('tb_idol_group', $data);
    }

}

/* End of file m_adm_idol_group.php */
/* Location: ./application/modules/adm_idol_group/models/m_adm_idol_group.php */