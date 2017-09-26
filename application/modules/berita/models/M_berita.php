<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------HARUS DIPAKAI DI SEMUA MODEL UNTUK HALAMAN DEPAN
    public function MenuGetAbout()
    {
        $this->db->where('id_about', 1);
        return $this->db->get('tb_about')->row();
    }

    public function MenuGetIdolG()
    {
        $this->db->where('del_idol_group', 0);
        return $this->db->get('tb_idol_group')->result();
    }

    public function jumlahkeranjang($idakun)
    {
        $this->db->where('id_akun', $idakun);
        return $this->db->get('tb_metamemesan');
    }
    // ---------------------------CLose HARUS--------------

    public function Get_allberita($batas=null, $offset=null, $key=null)
    {
        $this->db->from('tb_berita A');
        $this->db->join('tb_jns_berita B', 'B.id_jns_berita = A.id_jns_berita');
        $this->db->join('tb_akun C', 'C.id_akun = A.id_akun');
        $this->db->order_by('tgl_berita', 'desc');
        $this->db->where('del_berita', 0);
        $this->db->where('A.id_jns_berita', 2);
        if($batas != null){
           $this->db->limit($batas,$offset);
        }
        if ($key != null) {
           $this->db->or_like($key);
        }
        $query = $this->db->get();

        //cek apakah ada barang
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function count_berita()
    {
        $this->db->where('del_berita', 0);
        $this->db->where('id_jns_berita', 2);
        $query = $this->db->get('tb_berita')->num_rows();
        return $query;
    }

    //---------------------- 48GROUP -----------
    public function Get_allberita48($batas=null, $offset=null, $key=null)
    {
        $this->db->from('tb_berita A');
        $this->db->join('tb_jns_berita B', 'B.id_jns_berita = A.id_jns_berita');
        $this->db->join('tb_akun C', 'C.id_akun = A.id_akun');
        $this->db->order_by('tgl_berita', 'desc');
        $this->db->where('del_berita', 0);
        $this->db->where('A.id_jns_berita', 1);
        if($batas != null){
           $this->db->limit($batas,$offset);
        }
        if ($key != null) {
           $this->db->or_like($key);
        }
        $query = $this->db->get();

        //cek apakah ada barang
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function count_berita48()
    {
        $this->db->where('del_berita', 0);
        $this->db->where('id_jns_berita', 1);
        $query = $this->db->get('tb_berita')->num_rows();
        return $query;
    }
    // ---------------CLOSE 48GROUP -------------

    public function Getberita($id_berita)
    {
        $this->db->join('tb_jns_berita B', 'B.id_jns_berita = A.id_jns_berita');
        $this->db->join('tb_akun C', 'C.id_akun = A.id_akun');
        $this->db->where('del_berita', 0);
        return $this->db->get_where('tb_berita A', array('id_berita' => $id_berita));
    }

    public function GetEvent()
    {
        $this->db->order_by('tgl_event', 'desc');
        $this->db->where('jenis_event', 'event');
        $this->db->where('del_event', 0);
        $this->db->limit(6);
        return $this->db->get('tb_event')->result();
    }

    public function GetGath()
    {
        $this->db->order_by('tgl_event', 'desc');
        $this->db->where('jenis_event', 'gathering');
        $this->db->where('del_event', 0);
        $this->db->limit(6);
        return $this->db->get('tb_event')->result();
    }
}

/* End of file M_berita.php */
/* Location: ./application/modules/berita/models/M_berita.php */