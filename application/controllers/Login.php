<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Login extends CI_Controller {    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $data = array(
            "page" => "Login_v",
            "menu" => "Login"
        );
        $this->load->view("Login_v", $data);
    }

    public function cek(){
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $cek = $this->db->get_where("tb_users", array("username" => $username, "password" => $password))->row();

        if (!empty($cek)) {
            $ses = array(
                "username" => $cek->username,
                "level" => $cek->level,
                "status" => $cek->status
            );
            $this->session->set_userdata($ses);

            $dash = ['admin','karyawan','produksi'];
            if (in_array($this->session->level, $dash)) {
                $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Login berhasil',icon:'success'});");
                redirect("dashboard");
            } elseif ($this->session->level == "pemilik") {
                $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Login berhasil',icon:'success'});");
                redirect("dashboard");
            } else {
                $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Login berhasil',icon:'success'});");
                redirect("public/home");
            }

            redirect("login");
        } else {
            $this->session->set_flashdata("message", "swal.fire({title: 'Gagal',text: 'Password / Email Salah!!!',icon:'error'});");
            redirect("login");
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect("public/home");
    }
}
