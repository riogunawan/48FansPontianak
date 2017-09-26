<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_register extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function add($data)
    {
        $this->db->insert('tb_akun', $data);
    }

    public function drop_idol()
    {
        $this->db->where('del_idol', 0);
        return $this->db->get('tb_idol');
    }

}

/* End of file M_register.php */
/* Location: ./application/modules/register/models/M_register.php */