<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_adm_sejarah extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function Getedit($id)
    {
        return $this->db->get_where('tb_about', array('id_about'=>$id));
    }

    public function Edit($data, $condition)
    {
        $this->db->where($condition);
        $this->db->update('tb_about', $data);
    }

}

/* End of file M_adm_sejarah.php */
/* Location: ./application/modules/adm_sejarah/models/M_adm_sejarah.php */