<?php defined("BASEPATH") OR exit("No direct script access allowed");
	class Pembelian extends CI_Controller {	
		public function __construct(){
			parent::__construct();
            cekLogin();
		}
		public function index(){
        $this->db->select( "*" );
        $this->db->from( "pembelian_produk" );
        $datas = $this->db->get()->result();

			$data = array(
			"page" => "pembelian_produk/pembelian_produk_v",
             "menu" => "pembelian_produk",
			"datas" => $datas
		);
			$this->load->view("index",$data);
		}
    public function update() {
        $this->db->where("no_nota_pembelian",$this->input->post("no_nota_pembelian"));
        $data  = array(
            "tanggal_beli"=>$this->input->post("tanggal_beli"),
            "id_pegawai"=>$this->input->post("id_pegawai"),
            "subtotal"=>$this->input->post("subtotal")	
        );
        $this->db->update("pembelian_produk",$data);
        $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Update data berhasil',icon:'success'});");
        redirect("transaksi/pembelian/");
    }   

    public function simpan() {
        $data  = array(
            "tanggal_beli"=>$this->input->post("tanggal_beli"),
            "id_pegawai"=>$this->input->post("id_pegawai"),
            "subtotal"=>$this->input->post("subtotal")	
        );
        $ins = $this->db->insert( "pembelian_produk", $data );
        $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Tambah data berhasil',icon:'success'});");
        redirect("transaksi/pembelian/");
    }

    public function delete() {
        $data = json_decode( $this->input->post( "row" ) );
        $this->db->where("no_nota_pembelian",$data[0]);
        $delt = $this->db->delete("pembelian_produk");
        echo ( $delt > 0 ) ? "1" : "0";
    }
}
