<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota48ptk extends Q_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_anggota48ptk');
        $this->load->helper('h_fungsidate');
        $this->load->library('pagination');
    }

    private $batas = 9; //jlh data yang ditampilkan per halaman

    public function halaman($config)
    {
        $config['full_tag_open'] = '<ul class="pagination theme-colored">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '<i class="fa fa-angle-double-left"></i>&nbsp; Awal';
        $config['first_tag_open'] = '<li class="disabled">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Akhir &nbsp;<i class="fa fa-angle-double-right"></i>';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'Selanjutnya &nbsp;<i class="fa fa-arrow-circle-right"></i>';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '<i class="fa fa-arrow-circle-left"></i>&nbsp; Sebelumnya';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
    }

    public function index()
    {
        $m = $this->M_anggota48ptk;
        $page=$this->input->get('per_page');
        if(!$page):     //jika page bernilai kosong maka batas akhirna akan di set 0
           $offset = 0;
        else:
           $offset = $page; // jika tidak kosong maka nilai batas akhir nya akan diset nilai page terakhir
        endif;

        $batas = $this->batas;

        $config['page_query_string'] = TRUE; //mengaktifkan pengambilan method get pada url default
        $config['base_url'] = base_url().'anggota48ptk/index';   //url yang muncul ketika tombol pada paging diklik
        $config['total_rows'] = $m->count_anggota(); // jlh total berita
        $config['per_page'] = $batas; //batas sesuai dengan variabel batas

        $config['uri_segment'] = $page; //merupakan posisi pagination dalam url pada kesempatan ini saya menggunakan method get untuk menentukan posisi pada url yaitu per_page

        $this->halaman($config);

        $idakun = $this->session->userdata('id_akun');
        $base = base_url();
        $CSS = "<link href='{$base}assets/charityfund/css/colors/theme-skin-orange.css' rel='stylesheet' type='text/css'>
                <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2-bootstrap.css'>
                  <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2.css'>";
        $JS = "<script src='{$base}assets/neon/js/select2/select2.min.js'></script>";
        $JS .= $this->load->view('anggota48ptk/js', '', TRUE);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak - Fanbase 48 Group Regional Pontianak",
            "SUBTITLE" => "48FansPontianak Members",
            //-----GET MENU---------
            "MenuAbout" => $m->MenuGetAbout(),
            "MenuIdolG" => $m->MenuGetIdolG(),
            "keranjang" => $m->jumlahkeranjang($idakun)->num_rows()
            //-----TUTUP GET MENU-----
        );
        $VIEW = array(
            'ListEvent' => $m->GetEvent(),
            'ListGath' => $m->GetGath(),
            // 'list' => $m->GetAnggota(),
            'urutkan' => $m->GetIdol(),
            'paging' => $this->pagination->create_links(),
            'jlhpage' => $page,
            'list' => $m->Get_allanggota($batas,$offset) //query model semua barang
            );
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("anggota48ptk/home", $VIEW)
        ->master("depan_template", $MASTER);
    }

    public function urut()
    {
        $id = $this->input->post('id_idol');
        $idakun = $this->session->userdata('id_akun');
        $m = $this->M_anggota48ptk;
        $base = base_url();
        $CSS = "<link href='{$base}assets/charityfund/css/colors/theme-skin-orange.css' rel='stylesheet' type='text/css'>
                <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2-bootstrap.css'>
                  <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2.css'>";
        $JS = "<script src='{$base}assets/neon/js/select2/select2.min.js'></script>";
        $JS .= $this->load->view('anggota48ptk/js', '', TRUE);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak - Fanbase 48 Group Regional Pontianak",
            "SUBTITLE" => "48FansPontianak Members",
            //-----GET MENU---------
            "MenuAbout" => $m->MenuGetAbout(),
            "MenuIdolG" => $m->MenuGetIdolG(),
            "keranjang" => $m->jumlahkeranjang($idakun)->num_rows()
            //-----TUTUP GET MENU-----
        );
        $VIEW = array(
            'ListEvent' => $m->GetEvent(),
            'ListGath' => $m->GetGath(),
            'list' => $m->GetAnggotaUrut($id),
            'pilih' => $m->GetIdolUrut($id),
            'urutkan' => $m->GetIdol()
            );
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("anggota48ptk/home1", $VIEW)
        ->master("depan_template", $MASTER);
    }

    public function lihat($id_akun)
    {
        $m = $this->M_anggota48ptk;
        $idakun = $this->session->userdata('id_akun');
        $base = base_url();
        $CSS = "<link href='{$base}assets/charityfund/css/colors/theme-skin-orange.css' rel='stylesheet' type='text/css'>";
        $JS = $this->load->view('anggota48ptk/js', '', TRUE);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak - Fanbase 48 Group Regional Pontianak",
            "SUBTITLE" => "48FansPontianak Members",
            //-----GET MENU---------
            "MenuAbout" => $m->MenuGetAbout(),
            "MenuIdolG" => $m->MenuGetIdolG(),
            'detail' => $m->GetAnggotaDetil($id_akun)->row('nama_akun'),
            "keranjang" => $m->jumlahkeranjang($idakun)->num_rows()
            //-----TUTUP GET MENU-----
        );
        $VIEW = array(
            'detail' => $m->GetAnggotaDetil($id_akun)->row(),
            );
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("anggota48ptk/detil", $VIEW)
        ->master("depan_template1", $MASTER);
    }

}

/* End of file Anggota48ptk.php */
/* Location: ./application/modules/anggota48ptk/controllers/Anggota48ptk.php */