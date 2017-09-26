<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_adm_editprofil extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function Getedit($id)
    {
        $this->db->join('tb_idol B', 'B.id_idol = A.id_idol', 'left');
        return $this->db->get_where('tb_akun A', array('id_akun'=>$id));
    }

    public function dropdown_idol()
    {
        return $this->db->get('tb_idol');
    }

    public function Edit($data, $condition)
    {
        $this->db->where($condition);
        $this->db->update('tb_akun', $data);
    }

    public function editfoto($query, $condition)
    {
        $this->db->where($condition);
        $this->db->update('tb_akun', $query);
    }

    public function ubahpw($data, $condition, $pw_akun)
    {
        $this->db->where('pw_akun', $pw_akun);
        $this->db->where($condition);
        $this->db->update('tb_akun', $data);
    }

}

/* End of file M_adm_editprofil.php */
/* Location: ./application/modules/adm_editprofil/models/M_adm_editprofil.php */