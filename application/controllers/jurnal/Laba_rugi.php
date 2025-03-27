<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laba_rugi extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['title'] = 'Laporan Laba Rugi';
    
        // Hitung total pendapatan (ID akun pendapatan sesuaikan)
        $this->db->select_sum('debit', 'total_pendapatan');
        $this->db->where('id_akun', 5); // Ganti dengan ID akun pendapatan
        $total_pendapatan = $this->db->get('tbl_jurnal_detail')->row()->total_pendapatan;
    
        // Hitung total beban (ID akun beban sesuaikan)
        $this->db->select_sum('debit', 'total_beban');
        $this->db->where('id_akun', 6); // Ganti dengan ID akun beban
        $total_beban = $this->db->get('tbl_jurnal_detail')->row()->total_beban;
    
        // Hitung laba/rugi
        $data['total_pendapatan'] = $total_pendapatan;
        $data['total_beban'] = $total_beban;
        $data['laba_rugi'] = $total_pendapatan - $total_beban;

        $this->db->select('tbl_jurnal_detail.*, tbl_jurnal.*, tbl_akun.*');
        $this->db->from('tbl_jurnal_detail');
        $this->db->join('tbl_jurnal', 'tbl_jurnal.id_jurnal = tbl_jurnal_detail.id_jurnal');
        $this->db->join('tbl_akun', 'tbl_akun.id_akun = tbl_jurnal_detail.id_akun');
        $this->db->where_in('tbl_akun.nama_akun', ['Beban Operasional', 'Pendapatan']); // Perbaikan
        $data['jurnal'] = $this->db->get()->result();
        
    
        $this->load->view('Css');
        $this->load->view('Navtop', $data);
        $this->load->view('LeftMenu');
        $this->load->view('jurnal/laba_rugi/index', $data);
        $this->load->view('js');
    }
}