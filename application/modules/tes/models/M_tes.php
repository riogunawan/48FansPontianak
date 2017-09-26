<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tes extends CI_Model {

    public function get($id_berita)
    {
        return $this->db->get_where('tb_berita', array('id_berita' => $id_berita));
    }

    public function edit($query, $condition)
    {
        $this->db->where($condition);
        $this->db->update('tb_berita', $query);
    }

}

/* End of file M_tes.php */
/* Location: ./application/modules/tes/models/M_tes.php */
