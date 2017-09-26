<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_adm_memesan extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll($id)
    {
        return $this->db->query("SELECT *,SUM(total_harga) as total_harga , SUM(jumlah_tiket) as jumlah_tiket FROM tb_memesan WHERE id_akun = '$id' AND del_memesan = 0 GROUP BY no_memesan");
    }

    public function getTiket($id,$no_memesan)
    {
        $this->db->join('tb_tiket B', 'B.id_tiket = A.id_tiket');
        $this->db->join('tb_event C', 'C.id_event = B.id_tiket');
        $this->db->where('A.id_akun', $id);
        $this->db->where('no_memesan', $no_memesan);
        $this->db->where('del_memesan', 0);
        // $this->db->select('*, sum(total_harga) as total');
        return $this->db->get('tb_memesan A');
    }

    public function edit($data, $condition)
    {
        $this->db->where($condition);
        $this->db->update('tb_memesan', $data);
    }

    public function getdata1($no_memesan, $idakun)
    {
        $this->db->select('id_memesan, B.id_event, no_memesan, A.id_akun, A.id_tiket, tgl_memesan, A.jumlah_tiket, del_memesan, C.judul_event, kode_tiket, D.nama_akun, B.jenis_tiket');
        $this->db->join('tb_tiket B', 'B.id_tiket = A.id_tiket');
        $this->db->join('tb_event C', 'B.id_event = C.id_event');
        $this->db->join('tb_akun D', 'D.id_akun = A.id_akun');
        $this->db->where('no_memesan', $no_memesan);
        $this->db->where('A.id_akun', $idakun);
        $this->db->where('del_memesan', 0);
        return $this->db->get('tb_memesan A');
    }

}

/* End of file M_adm_memesan.php */
/* Location: ./application/modules/adm_memesan/models/M_adm_memesan.php */