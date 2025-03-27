<?php 
defined("BASEPATH") OR exit("No direct script access allowed");

	class Akun extends CI_Controller {

		public function __construct(){
			parent::__construct();
            cekLogin();
		}

        public function index() {
            $this->db->select( '*' );
            $this->db->from( 'pegawai a' );
            $this->db->join( 'tb_users b','a.email = b.username');
            $this->db->where('b.username', $this->session->userdata('username'));
            $data['user'] = $this->db->get()->row();
    
            $data['title'] = '';
            $this->load->view('Css');
            $this->load->view('Navtop', $data);
            $this->load->view('LeftMenu');
            $this->load->view('user/akun_v', $data);
            $this->load->view('footer');
            $this->load->view('js');
        }

        public function update() {
            $pegawai  = array(
                "nama" =>$this->input->post("nama") , 
                "no_hp" =>$this->input->post("no_hp"), 
                "email" =>$this->input->post("email") 
            );
            $this->db->where("id_pegawai",$this->input->post('id_pegawai'));
            $this->db->update("pegawai",$pegawai);
    
            $akun = [
                "password" => $this->input->post("password"),
                "level" => $this->input->post("level"),
                "status" => 1
            ];
    
            $this->db->where("username",$this->input->post('email'));
            $this->db->update("tb_users",$akun);
    
            $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Update data berhasil',icon:'success'});");
            redirect("dashboard");
        }
    }