<?php defined("BASEPATH") OR exit("No direct script access allowed");
class Produk extends CI_Controller {	
    public function __construct(){
        parent::__construct();
        cekLogin();
    }
    public function index(){
    $this->db->select( "*" );
    $this->db->from( "produk" );
    $this->db->order_by("id_produk", "DESC");
    $datas = $this->db->get()->result();

        $data = array(
        "page" => "produk/produk_v",
        "menu" => "Produk",
        'datas' => (!empty($datas) ? $datas : "")
    );
        $this->load->view("index",$data);
    }
    public function update() {
        $rand = time();
        $ekstensi =  array('png','jpg','jpeg','gif');
        $data  = array(
            "nama_produk" =>$this->input->post("nama_produk"),
            "jenis_pro" =>$this->input->post("jenis_pro"),
            "diskripsi" =>$this->input->post("diskripsi"),
            "harga_belipro" =>$this->input->post("harga_belipro"),
            "berat" =>$this->input->post("berat"),
            "harga_jualpro" =>$this->input->post("harga_jualpro"),
            "jml_stok" => $this->input->post("jml_stok")	
        );
        $this->db->where("id_produk",$this->input->post("id_produk"));
        if(!empty($_FILES['images']['name'])){
            $filename = $_FILES['images']['name'];
            $ukuran = $_FILES['images']['size'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $data["images"] = $rand.'_'.$filename; 
    
            if(!in_array($ext,$ekstensi) ) {
                $this->session->set_flashdata("message", "swal.fire({title: 'Gagal',text: 'Gagal upload',icon:'error'});");
            }else{
                if($ukuran < 1044070){		
                    move_uploaded_file($_FILES['images']['tmp_name'], 'images/'.$rand.'_'.$filename);
                    $this->db->update("produk",$data);
                    $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Update data berhasil',icon:'success'});");
                }else{
                    $this->session->set_flashdata("message", "swal.fire({title: 'Gagal',text: 'Gagal update',icon:'error'});");
                }
            }
    
        }else{
            $this->db->update("produk",$data);
            $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Update data berhasil',icon:'success'});");
        }
        // "id_produk" =>$this->input->post("id_produk"),
        
    
        redirect("produk/produk/");
    }   

    public function simpan() {
        $rand = rand();
        $ekstensi = array('png', 'PNG', 'jpg', 'JPG', 'JPEG', 'jpeg', 'gif');
        $filename = isset($_FILES['images']['name']) ? $_FILES['images']['name'] : null;
        $ukuran = isset($_FILES['images']['size']) ? $_FILES['images']['size'] : 0;
        $ext = $filename ? pathinfo($filename, PATHINFO_EXTENSION) : null;
    
        // Data dasar tanpa gambar
        $data = array(
            "nama_produk" => $this->input->post("nama_produk"),
            "jenis_pro" => $this->input->post("jenis_pro"),
            "diskripsi" => $this->input->post("diskripsi"),
            "harga_belipro" => $this->input->post("harga_belipro"),
            "harga_jualpro" => $this->input->post("harga_jualpro"),
            "berat" => $this->input->post("berat"),
            "jml_stok" => $this->input->post("jml_stok")
        );
    
        if ($filename) { // Jika ada file yang diunggah
            if (in_array($ext, $ekstensi)) {
                if ($ukuran < 1044070) { // Cek ukuran file
                    $new_filename = $rand . '_' . $filename;
                    move_uploaded_file($_FILES['images']['tmp_name'], 'images/' . $new_filename);
                    $data["images"] = $new_filename; // Tambahkan gambar ke dalam data
                } else {
                    $this->session->set_flashdata("message", "swal.fire({title: 'Gagal',text: 'Ukuran file terlalu besar',icon:'error'});");
                    redirect("produk/produk/");
                    return;
                }
            } else {
                $this->session->set_flashdata("message", "swal.fire({title: 'Gagal',text: 'Format file tidak didukung',icon:'error'});");
                redirect("produk/produk/");
                return;
            }
        }
    
        // Simpan data ke database
        $this->db->insert("produk", $data);
        $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Tambah data berhasil',icon:'success'});");
        redirect("produk/produk/");
    }    

    public function delete() {
        $data = json_decode( $this->input->post( "row" ) );
        $this->db->where("id_produk",$data[0]);
        $delt = $this->db->delete("produk");
        echo ( $delt > 0 ) ? "1" : "0";
    }
    public function pesan_custom() {
        $cek = explode('_',$this->input->post('ketebalan_kaca'));
        
        if($this->session->level == "pelanggan"){
            $simp = array (
            "panjang" =>$this->input->post("panjang"), 
            "lebar" =>$this->input->post("lebar"), 
            "tinggi" =>$this->input->post("tinggi"), 
            "ketebalan_kaca" =>$cek[0], 
            "harga_satuan" =>$this->input->post("harga"), 
            "keterangan" =>$this->input->post("keterangan")
            );
            $add = $this->db->insert("produk_custom",$simp);

            $this->db->select("id_custom");
            $this->db->from("produk_custom");
            $cek = $this->db->get()->last_row();
            // p($cek);die();
             $order = array(
                "id_pelanggan"=>$this->session->username,
                "id_custom"=>$cek->id_custom,
                "jumlah"=>$this->input->post('jumlah'),
                "tanggal"=>date("Y-m-d")
             );

            $this->db->insert("detail_beli_produk",$order);
            $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Pesanan Behasil disimpan, silahkan lakukan pembayaran',icon:'success'});");
            redirect("public/home/");
        }
        $this->session->set_flashdata("message", "swal.fire({title: 'Gagal',text: 'Gagal Order, Silahkan Login dulu sebagai pembeli',icon:'error'});");
        redirect("public/home/detail/".$this->input->post("id_detail"));
    }
}
