<?php defined("BASEPATH") or exit("No direct script access allowed");
class Non_aquarium extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        cekLogin();
    }
    
    public function index()
    {
        $datas = $this->db->get_where('tb_kategori',array('nama_kategori'=>'non aquarium'))->result();
        $generateid = $this->generateId();
        $data = array(
            "page" => "kategori/non_aquarium_v",
            "menu" => "Kategori Produk",
            "datas" => $datas,
            "generate_id" => $generateid
        );
        $this->load->view("index", $data);
    }
    public function generateId() {
        $unik = "KTG".date('Ym'); // Membuat prefix dengan format SBYYYYMM
        $result = $this->db->query("SELECT MAX(id_kategori) AS LAST_NO FROM tb_kategori WHERE id_kategori LIKE '".$unik."%'")->row();
    
        // Mengambil nomor urut terakhir dari hasil query, jika ada
        if ($result && $result->LAST_NO) {
            $kode = $result->LAST_NO;
            // Mengambil angka urut terakhir dari hasil query
            $urutan = (int) substr($kode, 9, 3); // 8 adalah posisi mulai substring dari urutan
            $urutan++;
        } else {
            // Jika tidak ada hasil dari query, mulai dengan urutan 1
            $urutan = 1;
        }
    
        // Membentuk kode baru dengan format SBYYYYMMXXXXX
        $kode = $unik . sprintf("%03s", $urutan);
        return $kode;
    }

    public function simpan() {
        $data = $this->input->post();
        $jenis_aquarium = $data['jenis_aquarium']; // Ambil nilai jenis_aquarium

        // Cek apakah jenis_aquarium sudah ada di database
        $cek = $this->db->get_where("tb_kategori", ["jenis_aquarium" => $jenis_aquarium])->row();

        if ($cek) {
            // Jika sudah ada, tampilkan pesan error
            $this->session->set_flashdata("message", "swal.fire({title: 'Gagal',text: 'Jenis Aquarium sudah ada',icon:'error'});");
        } else {
            // Jika belum ada, generate ID dan lakukan insert data
            $data['id_kategori'] = $this->generateId(); 
            $this->db->insert("tb_kategori", $data);
            $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Tambah data berhasil',icon:'success'});");
        }

        redirect("kategori/non_aquarium");
    }

    public function update() {
        $id_kategori = $this->input->post("id_kategori"); // Ambil ID dari input
        $data = $this->input->post();
        unset($data['id_kategori']); // Jangan update ID

        // Lakukan update data berdasarkan id_kategori
        $this->db->where("id_kategori", $id_kategori);
        $this->db->update("tb_kategori", $data);

        // Set pesan sukses
        $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Update data berhasil',icon:'success'});");

        redirect("kategori/non_aquarium");
    }

    public function delete() {
        $data = $this->input->post("id");
        $this->db->where("id_kategori", $data);
        $delt = $this->db->delete("tb_kategori");
        echo ($delt > 0) ? "1" : "0";

    }
}