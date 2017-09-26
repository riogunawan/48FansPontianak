<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_berita extends Q_Controller {

    private $upload_path = "./assets/uploads";

    public function __construct()
    {
        parent::__construct();
        Modules::run("login/auth");
        $this->load->model('M_adm_berita');
    }

    public function index()
    {
        $idakun = $this->session->userdata('id_akun');
        $base = base_url();
        $CSS = "<!-- DataTables -->
                  <link rel='stylesheet' href='{$base}assets/neon/js/datatables/datatables.css'>
                  <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2-bootstrap.css'>
                  <link rel='stylesheet' href='{$base}assets/neon/js/select2/select2.css'>
                ";
        $JS = "<!-- DataTables -->
                <script src='{$base}assets/neon/js/datatables/datatables.js'></script>
                <script src='{$base}assets/neon/js/select2/select2.min.js'></script>
                ";
        // UNTUK MENAMBAH BANYAK2 DIKASIK TITIK
        $JS .= $this->load->view('adm_berita/scripttambahan', '', true);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak | Berita",
            "SUBTITLE" => "Tabel Berita",
        );
        // berisi dari return value pada function getAll() di file models/M_adm_berita.php
        if ($this->session->userdata('level_akun') == 3) {
            $VIEW['listBerita'] = $this->M_adm_berita->getAllid($idakun);
        } else {
            $VIEW['listBerita'] = $this->M_adm_berita->getAll();
        }
        $this->template
        ->css($CSS)
        ->js($JS)
        //menampilkan view 'home' dan juga parsing data dengan nama $view(Bentuknya array) yang berisi 'listBerita'
        ->view("adm_berita/home", $VIEW)
        ->master("template", $MASTER);
    }

    public function Tambah()
    {
        $m = $this->M_adm_berita;
        $base = base_url();
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required|max_length[200]');
            $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required');
            if ($this->form_validation->run() == FALSE) {
                $CSS = '<link rel="stylesheet" href="'.$base.'assets/css/dropzone-min.css">
                        <link rel="stylesheet" href="'.$base.'assets/neon/js/wysihtml5/bootstrap-wysihtml5.css">
                        <link rel="stylesheet" href="'.$base.'assets/neon/js/codemirror/lib/codemirror.css">
                        <link rel="stylesheet" href="'.$base.'assets/neon/js/uikit/css/uikit.min.css">
                        <link rel="stylesheet" href="'.$base.'assets/neon/js/uikit/addons/css/markdownarea.css">';
                $JS = '<script src="'.$base.'assets/js/dropzone-min.js"></script>
                        <script src="'.$base.'assets/neon/js/wysihtml5/wysihtml5-0.4.0pre.min.js"></script>
                        <script src="'.$base.'assets/neon/js/wysihtml5/bootstrap-wysihtml5.js"></script>
                        <script src="'.$base.'assets/neon/js/ckeditor/ckeditor.js"></script>
                        <script src="'.$base.'assets/neon/js/ckeditor/adapters/jquery.js"></script>
                        <script src="'.$base.'assets/neon/js/uikit/js/uikit.min.js"></script>
                        <script src="'.$base.'assets/neon/js/codemirror/lib/codemirror.js"></script>
                        <script src="'.$base.'assets/neon/js/marked.js"></script>
                        <script src="'.$base.'assets/neon/js/uikit/addons/js/markdownarea.min.js"></script>
                        <script src="'.$base.'assets/neon/js/codemirror/mode/markdown/markdown.js"></script>
                        <script src="'.$base.'assets/neon/js/codemirror/addon/mode/overlay.js"></script>
                        <script src="'.$base.'assets/neon/js/codemirror/mode/xml/xml.js"></script>
                        <script src="'.$base.'assets/neon/js/codemirror/mode/gfm/gfm.js"></script>
                        <script src="'.$base.'assets/neon/js/icheck/icheck.min.js"></script>
                        <script src="'.$base.'assets/neon/js/neon-chat.js"></script>';
                $JS .= $this->load->view('adm_berita/scripttambahan1', '', TRUE);

                $MASTER = array(
                    "TITLE" => "48 Fans Pontianak | Berita",
                    "SUBTITLE" => "Tambah Berita",
                );
                $VIEW['drop_jns_berita'] = $m->dropdown_jenis();
                $this->template
                ->css($CSS)
                ->js($JS)
                ->view("adm_berita/form", $VIEW)
                ->master("template", $MASTER);
            } else {
                //rename adalah untuk mengubah nama poster yg diupload
                $rename = $this->input->post("foto_berita");
                $rename1 = str_replace('-', '_', $rename);
                $rename2 = str_replace(' ', '_', $rename1);
                //jika kondisi TRUE maka menjalankan proses tambah berita
                $data = array(
                        "judul_berita" => $this->input->post("judul_berita"),
                        "isi_berita" => $this->input->post("isi_berita"),
                        "tgl_berita" => date('y-m-d'),
                        "id_jns_berita" => $this->input->post("id_jns_berita"),
                        "foto_berita" => $rename2,
                        "foto_ket_berita" => $this->input->post("foto_ket_berita"),
                        "id_akun" => $this->session->userdata('id_akun')
                    );
                //passing variable $data ke products_model
                $m->tambah($data);
                $this->session->set_flashdata('info', 'Berita berhasil ditambah');
                redirect('adm_berita');
            }
        } else {
            $CSS = '<link rel="stylesheet" href="'.$base.'assets/css/dropzone-min.css">
                    <link rel="stylesheet" href="'.$base.'assets/neon/js/wysihtml5/bootstrap-wysihtml5.css">
                    <link rel="stylesheet" href="'.$base.'assets/neon/js/codemirror/lib/codemirror.css">
                    <link rel="stylesheet" href="'.$base.'assets/neon/js/uikit/css/uikit.min.css">
                    <link rel="stylesheet" href="'.$base.'assets/neon/js/uikit/addons/css/markdownarea.css">';
            $JS = '<script src="'.$base.'assets/js/dropzone-min.js"></script>
                    <script src="'.$base.'assets/neon/js/wysihtml5/wysihtml5-0.4.0pre.min.js"></script>
                    <script src="'.$base.'assets/neon/js/wysihtml5/bootstrap-wysihtml5.js"></script>
                    <script src="'.$base.'assets/neon/js/ckeditor/ckeditor.js"></script>
                    <script src="'.$base.'assets/neon/js/ckeditor/adapters/jquery.js"></script>
                    <script src="'.$base.'assets/neon/js/uikit/js/uikit.min.js"></script>
                    <script src="'.$base.'assets/neon/js/codemirror/lib/codemirror.js"></script>
                    <script src="'.$base.'assets/neon/js/marked.js"></script>
                    <script src="'.$base.'assets/neon/js/uikit/addons/js/markdownarea.min.js"></script>
                    <script src="'.$base.'assets/neon/js/codemirror/mode/markdown/markdown.js"></script>
                    <script src="'.$base.'assets/neon/js/codemirror/addon/mode/overlay.js"></script>
                    <script src="'.$base.'assets/neon/js/codemirror/mode/xml/xml.js"></script>
                    <script src="'.$base.'assets/neon/js/codemirror/mode/gfm/gfm.js"></script>
                    <script src="'.$base.'assets/neon/js/icheck/icheck.min.js"></script>
                    <script src="'.$base.'assets/neon/js/neon-chat.js"></script>';
            $JS .= $this->load->view('adm_berita/scripttambahan1', '', TRUE);
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Berita",
                "SUBTITLE" => "Tambah Berita",
            );
            $VIEW['drop_jns_berita'] = $m->dropdown_jenis();
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_berita/form", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function Edit($id_berita)
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') == 3) {
            $this->session->set_flashdata('info', 'Gax Boleh');
            redirect('adm_home');
        }
        $m = $this->M_adm_berita;
        $base = base_url();
        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required|max_length[200]');
            $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required');
            if ($this->form_validation->run() == FALSE) {
                $CSS = '<link rel="stylesheet" href="'.$base.'assets/neon/js/wysihtml5/bootstrap-wysihtml5.css">
                        <link rel="stylesheet" href="'.$base.'assets/neon/js/codemirror/lib/codemirror.css">
                        <link rel="stylesheet" href="'.$base.'assets/neon/js/uikit/css/uikit.min.css">
                        <link rel="stylesheet" href="'.$base.'assets/neon/js/uikit/addons/css/markdownarea.css">';
                $JS = '<script src="'.$base.'assets/neon/js/wysihtml5/wysihtml5-0.4.0pre.min.js"></script>
                        <script src="'.$base.'assets/neon/js/wysihtml5/bootstrap-wysihtml5.js"></script>
                        <script src="'.$base.'assets/neon/js/ckeditor/ckeditor.js"></script>
                        <script src="'.$base.'assets/neon/js/ckeditor/adapters/jquery.js"></script>
                        <script src="'.$base.'assets/neon/js/uikit/js/uikit.min.js"></script>
                        <script src="'.$base.'assets/neon/js/codemirror/lib/codemirror.js"></script>
                        <script src="'.$base.'assets/neon/js/marked.js"></script>
                        <script src="'.$base.'assets/neon/js/uikit/addons/js/markdownarea.min.js"></script>
                        <script src="'.$base.'assets/neon/js/codemirror/mode/markdown/markdown.js"></script>
                        <script src="'.$base.'assets/neon/js/codemirror/addon/mode/overlay.js"></script>
                        <script src="'.$base.'assets/neon/js/codemirror/mode/xml/xml.js"></script>
                        <script src="'.$base.'assets/neon/js/codemirror/mode/gfm/gfm.js"></script>
                        <script src="'.$base.'assets/neon/js/icheck/icheck.min.js"></script>
                        <script src="'.$base.'assets/neon/js/neon-chat.js"></script>';
                $JS .= $this->load->view('adm_berita/scripttambahan2', '', TRUE);
                $MASTER = array(
                    "TITLE" => "48 Fans Pontianak | Berita",
                    "SUBTITLE" => "Edit Berita",
                );
                $VIEW = array(
                    "detail" => $m->Getedit($id_berita)->row(),
                    "drop_jns_berita" => $m->dropdown_jenis()
                    );
                $this->template
                ->css($CSS)
                ->js($JS)
                ->view("adm_berita/edit", $VIEW)
                ->master("template", $MASTER);
            } else {
                $data = array(
                        "judul_berita" => $this->input->post("judul_berita"),
                        "isi_berita" => $this->input->post("isi_berita"),
                        "id_jns_berita" => $this->input->post("id_jns_berita"),
                        "foto_ket_berita" => $this->input->post("foto_ket_berita")
                    );
                $condition["id_berita"] = $this->input->post("id_berita");
                $m->Editberita($data, $condition);
                $this->session->set_flashdata('info', 'Berita berhasil diubah');
                redirect('adm_berita');
            }
        } else {
            $CSS = '<link rel="stylesheet" href="'.$base.'assets/neon/js/wysihtml5/bootstrap-wysihtml5.css">
                    <link rel="stylesheet" href="'.$base.'assets/neon/js/codemirror/lib/codemirror.css">
                    <link rel="stylesheet" href="'.$base.'assets/neon/js/uikit/css/uikit.min.css">
                    <link rel="stylesheet" href="'.$base.'assets/neon/js/uikit/addons/css/markdownarea.css">';
            $JS = '<script src="'.$base.'assets/neon/js/wysihtml5/wysihtml5-0.4.0pre.min.js"></script>
                    <script src="'.$base.'assets/neon/js/wysihtml5/bootstrap-wysihtml5.js"></script>
                    <script src="'.$base.'assets/neon/js/ckeditor/ckeditor.js"></script>
                    <script src="'.$base.'assets/neon/js/ckeditor/adapters/jquery.js"></script>
                    <script src="'.$base.'assets/neon/js/uikit/js/uikit.min.js"></script>
                    <script src="'.$base.'assets/neon/js/codemirror/lib/codemirror.js"></script>
                    <script src="'.$base.'assets/neon/js/marked.js"></script>
                    <script src="'.$base.'assets/neon/js/uikit/addons/js/markdownarea.min.js"></script>
                    <script src="'.$base.'assets/neon/js/codemirror/mode/markdown/markdown.js"></script>
                    <script src="'.$base.'assets/neon/js/codemirror/addon/mode/overlay.js"></script>
                    <script src="'.$base.'assets/neon/js/codemirror/mode/xml/xml.js"></script>
                    <script src="'.$base.'assets/neon/js/codemirror/mode/gfm/gfm.js"></script>
                    <script src="'.$base.'assets/neon/js/icheck/icheck.min.js"></script>
                    <script src="'.$base.'assets/neon/js/neon-chat.js"></script>';
            $JS .= $this->load->view('adm_berita/scripttambahan2', '', TRUE);
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Berita",
                "SUBTITLE" => "Edit Berita",
            );
            // CARA PERTAMA tidak tau cara join
            // $VIEW['detail'] = $this->db->get_where('tb_berita', array('id_berita' => $id_berita))->row();

            // CARA KEDUA cara join biasa+ci
            // $sql = "SELECT * FROM tb_berita A
            //     LEFT JOIN tb_jns_berita B ON B.id_jns_berita = A.id_jns_berita WHERE id_berita = '$id_berita'";
            // $VIEW['detail'] = $this->db->query($sql)->row();

            // CARA KETIGA FULL CI
            $VIEW = array(
                    "detail" => $m->Getedit($id_berita)->row(),
                    "drop_jns_berita" => $m->dropdown_jenis()
                );
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_berita/edit", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function editfoto($id_berita)
    {
        if ($this->session->userdata('level_akun') == 3) {
            $this->session->set_flashdata('info', 'Gax Boleh');
            redirect('adm_home');
        }
        $m = $this->M_adm_berita;
        if ($this->input->post('edit')) {
            $namafile = "48ptk".date('Y_m_d_H_i_s');
            // $namafile = "48ptk".time();
            $config['upload_path'] = $this->upload_path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['file_name'] = $namafile;
            $this->load->library('upload', $config);
            if ($_FILES['foto']['name']) {
                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    $query = array(
                        'foto_berita' => $gbr['file_name']
                    );
                    $condition["id_berita"] = $this->input->post("id_berita");
                    $m->editfoto($query, $condition);
                    $this->session->set_flashdata('info', 'Foto Berhasil Di Edit');
                    redirect("adm_berita/edit/{$id_berita}");
                } else if (! $this->upload->do_upload()) {
                    echo "gagal";
                }
            }
        } else {
            $CSS = "";
            $JS = $this->load->view('adm_berita/scripttambahan2', '', TRUE);
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Berita",
                "SUBTITLE" => "Edit Foto",
            );
            $VIEW = array("detail" => $m->Getedit($id_berita)->row());
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_berita/editfoto", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function Hapus($id_berita)
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') == 3) {
            $this->session->set_flashdata('info', 'Gax Boleh');
            redirect('adm_home');
        }
        $m = $this->M_adm_berita;
        $data = array(
                        "del_berita" => 1,
                    );
        //Function yang dipanggil ketika ingin melakukan delete berita dari database
        $m->hapus($data, $id_berita); //Memanggil fungsi hapus yang ada pada model M_adm_berita dan mengirimkan parameter yaitu id_berita yang akan di delete
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('info', 'Data berhasil dihapus');
            redirect('adm_berita');
        } else {
            $this->session->set_flashdata('info', 'Data Gagal Dihapus');
            redirect('adm_berita');
        }
    }

    // FOTO FILE
    public function Upload()
    {
        if (!empty($_FILES)) {
            $config['upload_path'] = $this->upload_path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['max_size'] = '3072';
            $config['max_width']  = '5000';
            $config['max_height']  = '5000';
            $this->load->library('upload', $config);
            if (! $this->upload->do_upload("file")) {
                echo "GAGAL UPLOAD ";
            }
        }
    }

    public function Remove()
    {
        $file = $this->input->post("file");
        if ($file && file_exists($this->upload_path. "/" .$file)) {
            unlink($this->upload_path. "/" .$file);
        }
    }

}

/* End of file Adm_berita.php */
/* Location: ./application/modules/adm_berita/controllers/Adm_berita.php */