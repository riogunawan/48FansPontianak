<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_adm_tiket extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll($id)
    {
        $this->db->join('tb_event B', 'B.id_event = A.id_event');
        $this->db->join('tb_akun C', 'C.id_akun  = A.id_akun');
        $this->db->order_by('tgl_event', 'desc');
        $this->db->where('A.id_akun', $id);
        $this->db->where('del_tiket', 0);
        return $this->db->get('tb_tiket A');
    }

    public function drop_event($id)
    {
        $this->db->join('tb_akun B', 'B.id_akun = A.id_akun');
        $this->db->where('A.id_akun', $id);
        $this->db->where('del_event', 0);
        return $this->db->get('tb_event A');
    }

    public function metatiket($id)
    {
        $this->db->join('tb_event B', 'B.id_event = A.id_event', 'left');
        $this->db->where('A.id_akun', $id);
        return $this->db->get('tb_tiketmeta A');
    }

    public function tambahmeta($data)
    {
        $this->db->insert('tb_tiketmeta', $data);
    }

    public function hapusmeta($id_metatiket)
    {
        $this->db->where('id_metatiket', $id_metatiket);
        $this->db->delete('tb_tiketmeta');
    }

    public function simpan($id)
    {
        $this->db->query("INSERT INTO tb_tiket (harga_tiket, jenis_tiket, diskon_tiket, id_event, id_akun, stok_tiket) SELECT harga_tiket, jenis_tiket, diskon_tiket, id_event, id_akun, stok_tiket FROM tb_tiketmeta");
        // $this->db->query("TRUNCATE metabarang");
        $this->db->query("DELETE FROM tb_tiketmeta WHERE id_akun = $id");
    }

    public function getedit($id, $id_tiket)
    {
        $this->db->join('tb_event B', 'B.id_event = A.id_event', 'left');
        $this->db->where('id_tiket', $id_tiket);
        $this->db->where('del_tiket', 0);
        $this->db->where('A.id_akun', $id);
        return $this->db->get('tb_tiket A');
    }

    public function edit($data, $condition)
    {
        $this->db->where('id_tiket', $condition);
        $this->db->update('tb_tiket', $data);
    }

    public function Hapus($data, $id_tiket)
    {
        $this->db->where('id_tiket', $id_tiket);
        $this->db->update('tb_tiket', $data);
    }

}

/* End of file M_adm_tiket.php */
/* Location: ./application/modules/adm_tiket/models/M_adm_tiket.php */