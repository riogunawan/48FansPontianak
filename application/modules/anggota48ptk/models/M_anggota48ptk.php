<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_anggota48ptk extends CI_Model {

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

    // public function MenuGetFBerita() //F = Berita Utama
    // {
    //     $this->db->from('tb_berita');
    //     $this->db->order_by('tgl_berita', 'desc');
    //     $this->db->where('del_berita', 0);
    //     $this->db->limit(1);
    //     return $this->db->get()->result();
    // }

    // public function MenuGetBerita()
    // {
    //     $this->db->from('tb_berita A');
    //     $this->db->join('tb_jns_berita B', 'B.id_jns_berita = A.id_jns_berita', 'left');
    //     $this->db->order_by('tgl_berita', 'desc');
    //     $this->db->where('del_berita', 0);
    //     $this->db->limit(4);
    //     return $this->db->get()->result();
    // }

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

    public function Get_allanggota($batas=null, $offset=null, $key=null)
    {
        $this->db->order_by('level_akun', 'asc');
        $this->db->order_by('nama_akun', 'asc');
        $this->db->where('del_akun', 0);
        if($batas != null){
           $this->db->limit($batas,$offset);
        }
        if ($key != null) {
           $this->db->or_like($key);
        }
        $query = $this->db->get('tb_akun');

        //cek apakah ada barang
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function count_anggota()
    {
        $this->db->where('del_akun', 0);
        $query = $this->db->get('tb_akun')->num_rows();
        return $query;
    }

    public function GetIdol()
    {
        $this->db->where('del_idol', 0);
        return $this->db->get('tb_idol')->result();
    }

    public function GetAnggotaUrut($id)
    {
        $this->db->order_by('level_akun', 'asc');
        $this->db->order_by('nama_akun', 'asc');
        $this->db->where('del_akun', 0);
        $this->db->where('id_idol', $id);
        return $this->db->get('tb_akun')->result();
    }

    public function GetIdolUrut($id)
    {
        $this->db->where('del_idol', 0);
        $this->db->where('id_idol', $id);
        return $this->db->get('tb_idol')->row();
    }

    public function GetAnggotaDetil($id_akun)
    {
        $this->db->join('tb_idol B', 'B.id_idol = A.id_idol');
        $this->db->join('tb_idol_group C', 'C.id_idol_group = B.id_idol_group');
        $this->db->where('del_akun', 0);
        $this->db->where('id_akun', $id_akun);
        return $this->db->get('tb_akun A');
    }

}

/* End of file M_anggota48ptk.php */
/* Location: ./application/modules/anggota48ptk/models/M_anggota48ptk.php */