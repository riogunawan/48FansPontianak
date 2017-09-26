<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function cek_user($data)
    {
        $this->db->where('del_akun', 0);
        $query = $this->db->get_where('tb_akun', $data);
        return $query;
    }

    public function email_exists($email_akun)
    {
        $sql = "SELECT nama_akun, email_akun FROM tb_akun WHERE email_akun = '{$email_akun}' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();

        return ($result->num_rows() === 1 && $row->email_akun) ? $row->nama_akun : false;
    }

    public function verify_reset_password_code($email_akun, $code)
    {
        $sql = "SELECT nama_akun, email_akun FROM tb_akun WHERE email_akun = '{$email_akun}' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();

        if ($result->num_rows() === 1) {
            return ($code == md5($this->config->item('salt') . $row->nama_akun)) ? true : false;
        } else {
            return false;
        }
    }

    public function update_password()
    {
        $email_akun = $this->input->post('email_akun');
        $pw_akun = md5($this->input->post('pw_akun'));

        $sql = "UPDATE tb_akun SET pw_akun = '{$pw_akun}' WHERE email_akun = '{$email_akun}' LIMIT 1";
        $this->db->query($sql);

        if ($this->db->affected_rows() === 1) {
            return true;
        } else {
            return false;
        }

    }

}

/* End of file M_login.php */
/* Location: ./application/modules/login/models/M_login.php */