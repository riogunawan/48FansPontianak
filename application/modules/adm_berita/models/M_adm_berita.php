<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_adm_berita extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        //select semua data yang ada pada table berita $this->db->select("*");
        $this->db->join('tb_jns_berita B', 'B.id_jns_berita = A.id_jns_berita', 'left');
        $this->db->order_by('tgl_berita', 'desc');
        $this->db->where('del_berita', 0);
        return $this->db->get('tb_berita A');
    }

    public function getAllid($idakun)
    {
        //select semua data yang ada pada table berita $this->db->select("*");
        $this->db->join('tb_jns_berita B', 'B.id_jns_berita = A.id_jns_berita', 'left');
        $this->db->order_by('tgl_berita', 'desc');
        $this->db->where('del_berita', 0);
        $this->db->where('id_akun', $idakun);
        return $this->db->get('tb_berita A');
    }

    public function dropdown_jenis()
    {
        return $this->db->get('tb_jns_berita');
    }

    public function Tambah($data)
    {
        $this->db->insert('tb_berita', $data);
    }

    public function Getedit($id_berita)
    {
        $this->db->join('tb_jns_berita B', 'B.id_jns_berita = A.id_jns_berita', 'left');
        return $this->db->get_where('tb_berita A', array('id_berita' => $id_berita));
    }

    public function Editberita($data, $condition)
    {
        //update berita berdasarkan id_berita yg benar
        $this->db->where($condition); //Hanya akan melakukan update sesuai dengan condition yang sudah ditentukan
        $this->db->update('tb_berita', $data); //Melakukan update terhadap table tb_berita sesuai dengan data yang telah diterima dari controller
    }

    public function editfoto($query, $condition)
    {
        $this->db->where($condition);
        $this->db->update('tb_berita', $query);
    }

    public function Hapus($data, $id_berita)
    {
        $this->db->where('id_berita', $id_berita);
        //KENAPA MENGGUNAKAN UPDATE BUKAN DELETE, KARENA AGAR DATA NYA TIDAK HILANG, NAMUN DISEMBUNYIKAN MENGGUNAKAN TRUE OR FALSE, JADI JIKA DATANYA DIPERLUKAN MAKA BISA DIKEMBALIKAN LAGI
        $this->db->update('tb_berita', $data);
    }

}

/* End of file M_adm_berita.php */
/* Location: ./application/modules/adm_berita/models/M_adm_berita.php */