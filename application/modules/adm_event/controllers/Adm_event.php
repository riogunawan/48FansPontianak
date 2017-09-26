<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_event extends Q_Controller {

    private $upload_path = "./assets/uploads";

    public function __construct()
    {
        parent::__construct();
        Modules::run("login/auth");
        $this->load->model('M_adm_event');
    }

    //EVENT
    public function index()
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') == 3) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
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
        $JS .= $this->load->view('adm_event/jse', '', true);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak | Events",
            "SUBTITLE" => "Tabel Data Events",
        );
        $VIEW['listBerita'] = $this->M_adm_event->getAll();
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("adm_event/home", $VIEW)
        ->master("template", $MASTER);
    }

    public function gathering()
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') == 3) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
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
        $JS .= $this->load->view('adm_event/js', '', true);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak | Gathering",
            "SUBTITLE" => "Tabel Daftar Gathering",
        );
        $VIEW['listBerita'] = $this->M_adm_event->getAllGath();
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("adm_event/home", $VIEW)
        ->master("template", $MASTER);
    }

    public function tambah()
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') == 3) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $m = $this->M_adm_event;
        $base = base_url();
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('judul_event', 'Judul Event/Gathering', 'required|max_length[200]');
            $this->form_validation->set_rules('isi_event', 'Isi', 'required');
            $this->form_validation->set_rules('waktu_event', 'Waktu diselenggarakan', 'required|max_length[50]');
            $this->form_validation->set_rules('latitude', 'Latitude', 'required');
            $this->form_validation->set_rules('longitude', 'Longitude', 'required');
            if ($this->form_validation->run() == FALSE) {
                $CSS = '<link rel="stylesheet" href="'.$base.'assets/css/dropzone-min.css">
                        <link rel="stylesheet" href="'.$base.'assets/neon/js/select2/select2-bootstrap.css">
                      <link rel="stylesheet" href="'.$base.'assets/neon/js/select2/select2.css">
                      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkkPvqDOaSXSmG8KEzy1u22ErzLrOM8uY&sensor=false" type="text/javascript"></script>
                      <link rel="stylesheet" href="'.$base.'assets/neon/js/wysihtml5/bootstrap-wysihtml5.css">
                    <link rel="stylesheet" href="'.$base.'assets/neon/js/codemirror/lib/codemirror.css">
                    <link rel="stylesheet" href="'.$base.'assets/neon/js/uikit/css/uikit.min.css">
                    <link rel="stylesheet" href="'.$base.'assets/neon/js/uikit/addons/css/markdownarea.css">';
                $JS = '<script src="'.$base.'assets/js/dropzone-min.js"></script>
                    <script src="'.$base.'assets/neon/js/select2/select2.min.js"></script>
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
                    <script src="'.$base.'assets/neon/js/codemirror/mode/gfm/gfm.js"></script>';
                $JS .= $this->load->view('adm_event/js1', '', TRUE);
                $MASTER = array(
                    "TITLE" => "48 Fans Pontianak | Event dan Gathering",
                    "SUBTITLE" => "Tambah Event/Gathering",
                );
                $VIEW = '';
                $this->template
                ->css($CSS)
                ->js($JS)
                ->view("adm_event/form", $VIEW)
                ->master("template", $MASTER);
            } else {
                //rename adalah untuk mengubah nama poster yg diupload
                $rename1 = $this->input->post("poster_event");
                $rename2 = str_replace(' ', '_', $rename1);
                $data = array(
                        "judul_event" => $this->input->post("judul_event"),
                        "poster_event" => $rename2,
                        "isi_event" => $this->input->post("isi_event"),
                        "tgl_posting_event" => date('y-m-d'),
                        "tgl_event" => $this->input->post("tgl_event"),
                        "waktu_event" => $this->input->post("waktu_event"),
                        "lokasi_event" => $this->input->post("lokasi_event"),
                        "latitude" => $this->input->post("latitude"),
                        "longitude" => $this->input->post("longitude"),
                        "jenis_event" => $this->input->post("jenis_event"),
                        "tiket_online" => $this->input->post("tiket_online"),
                        "id_akun" => $this->session->userdata('id_akun')
                    );
                $m->tambah($data);
                $this->session->set_flashdata('info', 'Event/Gathering berhasil ditambah');
                redirect('adm_event/gathering');
            }
        } else {
            $CSS = '<link rel="stylesheet" href="'.$base.'assets/css/dropzone-min.css">
                    <link rel="stylesheet" href="'.$base.'assets/neon/js/select2/select2-bootstrap.css">
                  <link rel="stylesheet" href="'.$base.'assets/neon/js/select2/select2.css">
                  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkkPvqDOaSXSmG8KEzy1u22ErzLrOM8uY&sensor=false" type="text/javascript"></script>
                  <link rel="stylesheet" href="'.$base.'assets/neon/js/wysihtml5/bootstrap-wysihtml5.css">
                <link rel="stylesheet" href="'.$base.'assets/neon/js/codemirror/lib/codemirror.css">
                <link rel="stylesheet" href="'.$base.'assets/neon/js/uikit/css/uikit.min.css">
                <link rel="stylesheet" href="'.$base.'assets/neon/js/uikit/addons/css/markdownarea.css">';
            $JS = '<script src="'.$base.'assets/js/dropzone-min.js"></script>
                <script src="'.$base.'assets/neon/js/select2/select2.min.js"></script>
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
                <script src="'.$base.'assets/neon/js/codemirror/mode/gfm/gfm.js"></script>';
            $JS .= $this->load->view('adm_event/js1', '', TRUE);
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Event dan Gathering",
                "SUBTITLE" => "Tambah Event/Gathering",
            );
            $VIEW = '';
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_event/form", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function Edit($id_event)
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') == 3) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $m = $this->M_adm_event;
        $base = base_url();
        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('judul_event', 'Judul Event/Gathering', 'required|max_length[200]');
            $this->form_validation->set_rules('isi_event', 'Isinya', 'required');
            $this->form_validation->set_rules('waktu_event', 'Waktu diselenggarakan', 'required|max_length[50]');
            $this->form_validation->set_rules('latitude', 'Latitude', 'required');
            $this->form_validation->set_rules('longitude', 'Longitude', 'required');
            if ($this->form_validation->run() == FALSE) {
                $CSS = '<link rel="stylesheet" href="'.$base.'assets/neon/js/select2/select2-bootstrap.css">
                      <link rel="stylesheet" href="'.$base.'assets/neon/js/select2/select2.css">
                      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkkPvqDOaSXSmG8KEzy1u22ErzLrOM8uY&sensor=false" type="text/javascript"></script>
                      <link rel="stylesheet" href="'.$base.'assets/neon/js/wysihtml5/bootstrap-wysihtml5.css">
                    <link rel="stylesheet" href="'.$base.'assets/neon/js/codemirror/lib/codemirror.css">
                    <link rel="stylesheet" href="'.$base.'assets/neon/js/uikit/css/uikit.min.css">
                    <link rel="stylesheet" href="'.$base.'assets/neon/js/uikit/addons/css/markdownarea.css">';
                $JS = '<script src="'.$base.'assets/neon/js/select2/select2.min.js"></script>
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
                    <script src="'.$base.'assets/neon/js/codemirror/mode/gfm/gfm.js"></script>';
                $JS .= $this->load->view('adm_event/js2', '', TRUE);
                $MASTER = array(
                    "TITLE" => "48 Fans Pontianak | Event dan Gathering",
                    "SUBTITLE" => "Edit Event/Gathering",
                );
                $VIEW = array(
                        "detail" => $m->GetEdit($id_event)->row()
                        );
                $this->template
                ->css($CSS)
                ->js($JS)
                ->view("adm_event/edit", $VIEW)
                ->master("template", $MASTER);
            } else {
                $data = array(
                        "judul_event" => $this->input->post("judul_event"),
                        "isi_event" => $this->input->post("isi_event"),
                        "tgl_posting_event" => date('y-m-d'),
                        "tgl_event" => $this->input->post("tgl_event"),
                        "waktu_event" => $this->input->post("waktu_event"),
                        "lokasi_event" => $this->input->post("lokasi_event"),
                        "latitude" => $this->input->post("latitude"),
                        "longitude" => $this->input->post("longitude"),
                        "jenis_event" => $this->input->post("jenis_event"),
                        "tiket_online" => $this->input->post("tiket_online")
                    );
                $condition["id_event"] = $this->input->post("id_event");
                $m->EditEvent($data, $condition);
                $this->session->set_flashdata('info', 'Event/Gathering berhasil diubah');
                redirect('adm_event/gathering');
            }
        } else {
            $CSS = '<link rel="stylesheet" href="'.$base.'assets/neon/js/select2/select2-bootstrap.css">
                  <link rel="stylesheet" href="'.$base.'assets/neon/js/select2/select2.css">
                  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkkPvqDOaSXSmG8KEzy1u22ErzLrOM8uY&sensor=false" type="text/javascript"></script>
                  <link rel="stylesheet" href="'.$base.'assets/neon/js/wysihtml5/bootstrap-wysihtml5.css">
                <link rel="stylesheet" href="'.$base.'assets/neon/js/codemirror/lib/codemirror.css">
                <link rel="stylesheet" href="'.$base.'assets/neon/js/uikit/css/uikit.min.css">
                <link rel="stylesheet" href="'.$base.'assets/neon/js/uikit/addons/css/markdownarea.css">';
            $JS = '<script src="'.$base.'assets/neon/js/select2/select2.min.js"></script>
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
                <script src="'.$base.'assets/neon/js/codemirror/mode/gfm/gfm.js"></script>';
            $JS .= $this->load->view('adm_event/js2', '', TRUE);
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Event dan Gathering",
                "SUBTITLE" => "Edit Event/Gathering",
            );
            $VIEW = array(
                    "detail" => $m->GetEdit($id_event)->row(),
                    );
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_event/edit", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function LihatMap()
    {
        $CSS = '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkkPvqDOaSXSmG8KEzy1u22ErzLrOM8uY&sensor=false" type="text/javascript"></script>';
        $JS = $this->load->view('adm_event/js2', '', TRUE);
        $MASTER = array(
            "TITLE" => "48 Fans Pontianak | Map",
            "SUBTITLE" => "Lihat Map",
        );
        $VIEW = '';
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("adm_event/map", $VIEW)
        ->master("template", $MASTER);
    }

    public function editfoto($id_event)
    {
        if ($this->session->userdata('level_akun') == 3) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $m = $this->M_adm_event;
        if ($this->input->post('edit')) {
            $namafile = "48ptk".date('Y_m_d_H_i_s');
            $config['upload_path'] = $this->upload_path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['file_name'] = $namafile;
            $this->load->library('upload', $config);
            if ($_FILES['foto']['name']) {
                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    $query = array(
                        'poster_event' => $gbr['file_name']
                    );
                    $condition["id_event"] = $this->input->post("id_event");
                    $m->editfoto($query, $condition);
                    $this->session->set_flashdata('info', 'Poster Berhasil Di Edit');
                    redirect("adm_event/edit/{$id_event}");
                } else if (! $this->upload->do_upload()) {
                    echo "gagal";
                }
            }
        } else {
            $CSS = "";
            $JS = $this->load->view('adm_event/js2', '', TRUE);
            $MASTER = array(
                "TITLE" => "48 Fans Pontianak | Event",
                "SUBTITLE" => "Edit Poster",
            );
            $VIEW = array("detail" => $m->Getedit($id_event)->row());
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_event/editfoto", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function Hapus($id_event)
    {
        //Cek LEVEL user
        if ($this->session->userdata('level_akun') == 3) {
            $this->session->set_flashdata('info', 'Tidak Ada Hak Akses');
            redirect('adm_home');
        }
        $m = $this->M_adm_event;
        $data = array(
                        "del_event" => 1,
                    );
        $m->hapus($data, $id_event);
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('info', 'Data berhasil dihapus');
            redirect('adm_event/gathering');
        } else {
            $this->session->set_flashdata('info', 'Data Gagal Dihapus');
            redirect('adm_event/gathering');
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

/* End of file Adm_event.php */
/* Location: ./application/modules/adm_event/controllers/Adm_event.php */