<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends Q_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_berita');
        $this->load->helper('h_fungsidate');
        $this->load->library('pagination');
    }

    private $batas = 5; //jlh data yang ditampilkan per halaman

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
        $m = $this->M_berita;

        $page=$this->input->get('per_page');
        if(!$page):     //jika page bernilai kosong maka batas akhirna akan di set 0
           $offset = 0;
        else:
           $offset = $page; // jika tidak kosong maka nilai batas akhir nya akan diset nilai page terakhir
        endif;

        $batas = $this->batas;

        $config['page_query_string'] = TRUE; //mengaktifkan pengambilan method get pada url default
        $config['base_url'] = base_url().'berita/index';   //url yang muncul ketika tombol pada paging diklik
        $config['total_rows'] = $m->count_berita(); // jlh total berita
        $config['per_page'] = $batas; //batas sesuai dengan variabel batas

        $config['uri_segment'] = $page; //merupakan posisi pagination dalam url pada kesempatan ini saya menggunakan method get untuk menentukan posisi pada url yaitu per_page

        $this->halaman($config);
        $idakun = $this->session->userdata('id_akun');
        $base = base_url();
        $CSS = "<link href='{$base}assets/charityfund/css/colors/theme-skin-blue-gary.css' rel='stylesheet' type='text/css'>";
        $JS = $this->load->view('berita/js', '', TRUE);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak - Fanbase 48 Group Regional Pontianak",
            "SUBTITLE" => "48FansPontianak News",
            //-----GET MENU---------
            "MenuAbout" => $m->MenuGetAbout(),
            "MenuIdolG" => $m->MenuGetIdolG(),
            "keranjang" => $m->jumlahkeranjang($idakun)->num_rows()
            //-----TUTUP GET MENU-----
        );
        $VIEW = array(
            // 'ListBerita' => $m->GetBerita(),
            'ListEvent' => $m->GetEvent(),
            'ListGath' => $m->GetGath(),
            'paging' => $this->pagination->create_links(),
            'jlhpage' => $page,
            'qberita' => $m->Get_allberita($batas,$offset) //query model semua barang
            );
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("berita/home", $VIEW)
        ->master("depan_template", $MASTER);
    }

    public function index48()
    {
        $m = $this->M_berita;
        $page=$this->input->get('per_page');
        if(!$page):
           $offset = 0;
        else:
           $offset = $page;
        endif;
        $batas = $this->batas;
        $config['page_query_string'] = TRUE;
        $config['base_url'] = base_url().'berita/index48';
        $config['total_rows'] = $m->count_berita48();
        $config['per_page'] = $batas;
        $config['uri_segment'] = $page;

        $this->halaman($config);
        $idakun = $this->session->userdata('id_akun');
        $base = base_url();
        $CSS = "<link href='{$base}assets/charityfund/css/colors/theme-skin-blue-gary.css' rel='stylesheet' type='text/css'>";
        $JS = $this->load->view('berita/js', '', TRUE);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak - Fanbase 48 Group Regional Pontianak",
            "SUBTITLE" => "48Group News",
            //-----GET MENU---------
            "MenuAbout" => $m->MenuGetAbout(),
            "MenuIdolG" => $m->MenuGetIdolG(),
            "keranjang" => $m->jumlahkeranjang($idakun)->num_rows()
            //-----TUTUP GET MENU-----
        );
        $VIEW = array(
            'ListEvent' => $m->GetEvent(),
            'ListGath' => $m->GetGath(),
            'paging' => $this->pagination->create_links(),
            'jlhpage' => $page,
            'qberita' => $m->Get_allberita48($batas,$offset)
            );
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("berita/home", $VIEW)
        ->master("depan_template", $MASTER);
    }

    public function lihat($id_berita)
    {
        $m = $this->M_berita;
        $idakun = $this->session->userdata('id_akun');
        $base = base_url();
        $CSS = '<link rel="stylesheet" href="'.$base.'assets/neon/css/font-icons/font-awesome/css/font-awesome.min.css">';
        $CSS.= "<link href='{$base}assets/charityfund/css/colors/theme-skin-blue-gary.css' rel='stylesheet' type='text/css'>
            <link href='{$base}assets/neon/css/wysihtml5-color.css' rel='stylesheet' type='text/css'>";
        $JS = '';
        $JS .= $this->load->view('berita/js', '', TRUE);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak - Fanbase 48 Group Regional Pontianak",
            "SUBTITLE" => "News",
            //-----GET MENU---------
            "MenuAbout" => $m->MenuGetAbout(),
            "MenuIdolG" => $m->MenuGetIdolG(),
            "detail" => $m->Getberita($id_berita)->row('judul_berita'),
            "keranjang" => $m->jumlahkeranjang($idakun)->num_rows()
            //-----TUTUP GET MENU-----
        );
        $VIEW = array(
                "detail" => $m->Getberita($id_berita)->row(),
            );
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("berita/detil", $VIEW)
        ->master("depan_template1", $MASTER);
    }

}

/* End of file Berita.php */
/* Location: ./application/modules/berita/controllers/Berita.php */