<?php defined("BASEPATH") OR exit("No direct script access allowed");
	class Aquarium extends CI_Controller {	
		public function __construct(){
			parent::__construct();
            cekLogin();
		}
		public function index(){
        $datas = $this->db->get_where('tb_kategori',array('nama_kategori'=>'aquarium'))->result();

			$data = array(
			"page" => "kategori/kategori_v",
            "menu" => "Kategori Aquarium Pemesanan",
			"datas" => $datas
		);
			$this->load->view("index",$data);
		}
    public function update() {
        $this->db->where("id_kategori",$this->input->post("id_kategori"));
       
        $data = $this->input->post();
        array_shift($data);

        $this->db->update("tb_kategori",$data);
        $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Update data berhasil',icon:'success'});");
        redirect("kategori/aquarium");
    }   

    public function simpan() {
        
        $data = $this->input->post();
        array_shift($data);
        $ins = $this->db->insert( "tb_kategori", $data );
        $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Tambah data berhasil',icon:'success'});");
        redirect("kategori/aquarium");
    }

    public function delete() {
        $data = json_decode( $this->input->post( "row" ) );
        $this->db->where("id_kategori",$data[0]);
        $delt = $this->db->delete("tb_kategori");
        echo ( $delt > 0 ) ? "1" : "0";
    }
}
