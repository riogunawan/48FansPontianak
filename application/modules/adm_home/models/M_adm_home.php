<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_adm_home extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function jlhberita()
    {
        $this->db->where('del_berita', 0);
        return $this->db->get('tb_berita');
    }

    public function jlhidolgroup()
    {
        $this->db->where('del_idol_group', 0);
        return $this->db->get('tb_idol_group');
    }

    public function jlhanggota()
    {
        $this->db->where('del_akun', 0);
        return $this->db->get('tb_akun');
    }

    public function jlhidol()
    {
        $this->db->where('del_idol', 0);
        return $this->db->get('tb_idol');
    }

    public function jlhevent()
    {
        $this->db->where('del_event', 0);
        $this->db->where('jenis_event', 'event');
        return $this->db->get('tb_event');
    }

    public function jlhgathering()
    {
        $this->db->where('del_event', 0);
        $this->db->where('jenis_event', 'gathering');
        return $this->db->get('tb_event');
    }

    public function anggota()
    {
        $this->db->where('del_akun', 0);
        $this->db->where('level_akun', 3);
        $this->db->order_by('created_akun', 'desc');
        $this->db->limit(5);
        return $this->db->get('tb_akun');
    }

}

/* End of file M_adm_home.php */
/* Location: ./application/modules/adm_home/models/M_adm_home.php */