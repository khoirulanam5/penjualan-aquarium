<?php defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Pesanan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        cekLogin();
        $this->load->model("M_join","joins");
    }

    public function index() {
        $this->joins->detailjual_pengiriman_pelanggan();
        $this->db->order_by('detail_jual.no_transaksi','desc');
        $tb = $this->db->get()->result();
        $data = array(
            'page' => 'laporan/pesanan_v',
            'menu' => 'Laporan Pesanan',
            'datas' => (isset($tb) ? $tb:"")
        );
        $this->load->view( 'index', $data );
    }
    public function pesanan_custom($no)
    {
        $this->joins->detailjualpenjualan();
        $this->db->where("status_bayar >",'0');
        $this->db->where("b.no_transaksi",$no);
        $tb = $this->db->get()->row();
        // $tb = $this->db->get_where('no_transaksi',array())->row();
        $data = array(
            'page' => 'laporan/pesanan_custom',
            'menu' => 'Laporan Pesanan Custom',
            'datas' => (isset($tb) ? $tb:"")
        );
        // $this->load->view('laporan/pesanan_custom', $data );
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Pesanan Custom.pdf";
        $this->pdf->previewpdf("laporan/pesanan_custom",$data);
    }
}
