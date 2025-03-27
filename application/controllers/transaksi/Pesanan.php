<?php defined("BASEPATH") OR exit("No direct script access allowed");
	class Pesanan extends CI_Controller {	
		public function __construct(){
			parent::__construct();
            cekLogin();
            $this->load->model("M_join","joins");
		}

		public function index(){
            $this->joins->detailjualpenjualan();
            $this->db->order_by('b.no_transaksi', 'desc');
            $datas = $this->db->get()->result();

            $this->joins->detailjual_pengiriman_pelanggan();
            $this->db->order_by('detail_jual.no_transaksi', 'desc');
            $datas_detail = $this->db->get()->result();

            $total = [
                'selesai' => 0,
                'proses' => 0,
                'belum_verifikasi' => 0,
            ];
            foreach ($datas as $key => $value) {
                if (!empty($value->tgl_jual)) {
                    $total['selesai']++;
                }
                if ($value->status_kirim == 1) {
                    $total['proses']++;
                }
            }
            foreach ($datas_detail as $key => $value) {
                if ($value->status_kirim == 0) {
                    $total['belum_verifikasi']++;
                }
            }

            $total['penjualan'] = $total['selesai'] + $total['proses'] + $total['belum_verifikasi'];
            $data = [
                'page' => 'penjualan/pesanan_v',
                'menu' => 'pesanan',
                'total' => $total,
                'datas' => $datas,
            ];
            $this->load->view('index', $data);
        }

    public function konfirmasi($no_transaksi) {
        $this->db->set('status_pesanan', 'Pesanan Selesai');
        $this->db->where('no_transaksi', $no_transaksi);
        $this->db->update('detail_jual');
        $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Konfirmasi pesanan berhasil',icon:'success'});");
        redirect("transaksi/pesanan/");
    }

    public function update() {
        $this->db->where("no_nota_pembelian",$this->input->post("no_nota_pembelian"));
        $data  = array(
            "tanggal_beli"=>$this->input->post("tanggal_beli"),
            "id_pegawai"=>$this->input->post("id_pegawai"),
            "subtotal"=>$this->input->post("subtotal")	
        );
        $this->db->update("pembelian_produk",$data);
        $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Update data Berhasil',icon:'success'});");
        redirect("transaksi/pembelian/");
    }   

    public function simpan() {
        $data  = array(
            "tanggal_beli"=>$this->input->post("tanggal_beli"),
            "id_pegawai"=>$this->input->post("id_pegawai"),
            "subtotal"=>$this->input->post("subtotal")	
        );
        $ins = $this->db->insert( "pembelian_produk", $data );
        $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Tambah data Berhasil',icon:'success'});");
        redirect("transaksi/pembelian/");
    }

    public function delete() {
        $data = json_decode( $this->input->post( "row" ) );
        $this->db->where("no_nota_pembelian",$data[0]);
        $delt = $this->db->delete("pembelian_produk");
        echo ( $delt > 0 ) ? "1" : "0";

    }
}
