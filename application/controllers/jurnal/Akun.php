<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['title'] = 'Daftar Akun Akuntansi';

        $data['akun'] = $this->db->get('tbl_akun')->result();

        $this->load->view('Css');
		$this->load->view('Navtop', $data);
		$this->load->view('LeftMenu');
        $this->load->view('jurnal/akun/index', $data);
		$this->load->view('js');
    }

    public function tambah() {
        $data['title'] = 'Tambah Akun Akuntansi';

        $data['akun'] = $this->db->get('tbl_akun')->result();

        $this->load->view('Css');
		$this->load->view('Navtop', $data);
		$this->load->view('LeftMenu');
        $this->load->view('jurnal/akun/tambah', $data);
		$this->load->view('js');
    }

    public function simpan() {
        $data = [
            'kode_akun' => $this->input->post('kode_akun'),
            'nama_akun' => $this->input->post('nama_akun')
        ];
        $this->db->insert('tbl_akun', $data);

        $this->session->set_flashdata("message","<script> Swal.fire({title:'Berhasil', text:'Tambah data berhasil', icon:'success'})</script>");
        redirect('jurnal/akun');
    }

    public function hapus($id_akun) {
        $this->db->delete('tbl_akun', array('id_akun' => $id_akun));

        $this->session->set_flashdata("message","<script> Swal.fire({title:'Berhasil', text:'Hapus data berhasil', icon:'success'})</script>");
        redirect('jurnal/akun');
    }
}