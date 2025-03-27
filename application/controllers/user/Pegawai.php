<?php defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Pegawai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        cekLogin();
    }

    public function index() {
        $this->db->select( '*' );
        $this->db->from( 'pegawai a' );
        $this->db->join( 'tb_users b','a.email = b.username');

        $datas = $this->db->get()->result();

        foreach ( $datas as $key =>$value ) {
            $tb[] =  $value;
        }
        $data = array(
            'page' => 'user/pegawai_v',
            'menu' => 'User',
            'datas' => (isset($tb) ? $tb:"")
        );
        $this->load->view( 'index', $data );
    }

    public function update() {
        $data  = array(
            "nama" =>$this->input->post("nama") , 
            "no_hp" =>$this->input->post("no_hp"), 
            "email" =>$this->input->post("email") 
        );
        $this->db->where("id_pegawai",$this->input->post('id_pegawai'));
        $this->db->update("pegawai",$data);

        $users["level"] = $this->input->post("level");
        $users["status"] = $this->input->post("status");
        if(!empty($this->input->post("password"))){
            $users["level"] = $this->input->post("password");
        }

        $this->db->where("username",$this->input->post('email'));
        $this->db->update("tb_users",$users);

		$this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Update data berhasil',icon:'success'});");
        redirect("user/pegawai/");
    }   

    public function simpan() {
        $cek = $this->db->get_where("tb_users",array("username"=>$this->input->post("email")))->row();
        if(!empty($cek)){
            $this->session->set_flashdata("message", "swal.fire({title: 'Error',text: 'Email User sudah digunakan, Silahkan diganti.',icon:'error'});");
            redirect('user/pegawai');
        }
        $data  = array(
            "nama" =>$this->input->post("nama") , 
            "no_hp" =>$this->input->post("no_hp") , 
            "email" =>$this->input->post("email") 
        );
        $ins = $this->db->insert( 'pegawai', $data );
        $users = array(
            "level" =>$this->input->post("level") , 
            "password" =>$this->input->post("password"), 
            "username" =>$this->input->post("email"), 
            "status" => $this->input->post("status"), 
        );
        $this->db->insert("tb_users",$users);
        $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Tambah data berhasil',icon:'success'});");
        redirect("user/pegawai/");
    }

    public function delete() {
        $data = json_decode( $this->input->post( 'row' ) );

        $this->db->where("username",$data[3]);
        $deltuser = $this->db->delete("tb_users");

        $this->db->where("id_pegawai",$data[0]);
        $delt = $this->db->delete("pegawai");
        echo ( $delt > 0 ) ? '1' : '0';

    }
}
