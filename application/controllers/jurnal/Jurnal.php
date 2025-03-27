<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['title'] = 'Jurnal Umum';

        $this->db->select('tbl_jurnal_detail.*, tbl_jurnal.*, tbl_akun.*');
        $this->db->from('tbl_jurnal_detail');
        $this->db->join('tbl_jurnal', 'tbl_jurnal.id_jurnal = tbl_jurnal_detail.id_jurnal');
        $this->db->join('tbl_akun', 'tbl_akun.id_akun = tbl_jurnal_detail.id_akun');
        $data['jurnal'] = $this->db->get()->result();

        $total = $this->db->get_where('detail_jual',array('status_bayar'=>1))->result();
        $tt = 0;
        $selisih = 0;
        foreach ($total as $key => $value) {
         $transaksi = json_decode($value->data_produk);
         $tt +=  $transaksi->total_bayar;
         foreach ($transaksi->keranjang as $key => $value2) {
             $selisih += ($value2->jumlah * ($value2->harga_jualpro - $value2->harga_belipro));
             $barang[$value2->id_detail_produk] =$value2 ;
         }
        }
        $data['barang'] = $barang;
        $data['keuntungan'] = $selisih;
        $data['total_penjualan'] = $tt;

        $this->load->view('Css');
		$this->load->view('Navtop', $data);
		$this->load->view('LeftMenu');
        $this->load->view('jurnal/jurnal/index', $data);
		$this->load->view('js');
    }

    public function tambah() {
        $data['title'] = 'Tambah Jurnal Umum';
        $this->db->where('id_akun !=', 1); // Kecuali id_akun = 1
        $data['akun'] = $this->db->get('tbl_akun')->result();
        $this->load->view('Css');
		$this->load->view('Navtop', $data);
		$this->load->view('LeftMenu');
        $this->load->view('jurnal/jurnal/tambah', $data);
		$this->load->view('js');
    }

    public function simpan() {
        $tanggal = $this->input->post('tanggal');
        $deskripsi = $this->input->post('deskripsi');

        // Simpan ke jurnal (header)
        $data_jurnal = array(
            'tanggal' => $tanggal,
            'deskripsi' => $deskripsi,
            'total_debit' => 0, // Nanti dihitung dari detail
            'total_kredit' => 0
        );
        $this->db->insert('tbl_jurnal', $data_jurnal);
        $id_jurnal = $this->db->insert_id(); // Ambil ID yang baru dibuat

        // Simpan ke jurnal_detail
        $id_akun = $this->input->post('id_akun');
        $debit = $this->input->post('debit');
        $kredit = $this->input->post('kredit');
        
        $total_debit = 0;
        $total_kredit = 0;

        for ($i = 0; $i < count($id_akun); $i++) {
            $data_detail = array(
                'id_jurnal' => $id_jurnal,
                'id_akun' => $id_akun[$i],
                'debit' => $debit[$i],
                'kredit' => $kredit[$i],
            );
            $this->db->insert('tbl_jurnal_detail', $data_detail);
            
            $total_debit += $debit[$i];
            $total_kredit += $kredit[$i];
        }

        // Update total debit dan kredit di jurnal
        $this->db->where('id_jurnal', $id_jurnal);
        $this->db->update('tbl_jurnal', array(
            'total_debit' => $total_debit,
            'total_kredit' => $total_kredit
        ));

        $this->session->set_flashdata("message","<script> Swal.fire({title:'Berhasil', text:'Tambah data berhasil', icon:'success'})</script>");
        redirect('jurnal/jurnal');
    }

    public function hapus($id_jurnal) {
        $this->db->delete('tbl_jurnal_detail', array('id_jurnal' => $id_jurnal));
        $this->db->delete('tbl_jurnal', array('id_jurnal' => $id_jurnal));

        $this->session->set_flashdata("message","<script> Swal.fire({title:'Berhasil', text:'Hapus data berhasil', icon:'success'})</script>");
        redirect('jurnal/jurnal');
    }
}
