<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Neraca extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['title'] = 'Laporan Neraca';
    
        // Hitung total aset (ID akun aset sesuaikan)
        $this->db->select_sum('debit', 'total_aset');
        $this->db->where('id_akun', 1); // Ganti dengan ID akun aset
        $total_aset = $this->db->get('tbl_jurnal_detail')->row()->total_aset;
    
        // Hitung total kewajiban (ID akun kewajiban sesuaikan)
        $this->db->select_sum('kredit', 'total_kewajiban');
        $this->db->where('id_akun', 2); // Ganti dengan ID akun kewajiban
        $total_kewajiban = $this->db->get('tbl_jurnal_detail')->row()->total_kewajiban;
    
        // Hitung total ekuitas (ID akun ekuitas sesuaikan)
        $this->db->select_sum('kredit', 'total_ekuitas');
        $this->db->where('id_akun', 3); // Ganti dengan ID akun ekuitas
        $total_ekuitas = $this->db->get('tbl_jurnal_detail')->row()->total_ekuitas;
    
        $data['total_aset'] = $total_aset;
        $data['total_kewajiban'] = $total_kewajiban;
        $data['total_ekuitas'] = $total_ekuitas;
    
        $this->load->view('Css');
        $this->load->view('Navtop', $data);
        $this->load->view('LeftMenu');
        $this->load->view('jurnal/neraca/index', $data);
        $this->load->view('js');
    }
}