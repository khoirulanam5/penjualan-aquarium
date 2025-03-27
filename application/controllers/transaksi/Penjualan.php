<?php defined("BASEPATH") OR exit("No direct script access allowed");
class Penjualan extends CI_Controller {	
    public function __construct(){
        parent::__construct();
        cekLogin();
        $this->load->model("M_join","joins");
    }
    public function index(){
        $this->joins->detailjualpenjualan();
        $this->db->where("status_bayar >",'0');
        $this->db->order_by('b.no_transaksi','desc');
        $datas = $this->db->get()->result();
       
        $this->joins->detailjual_pengiriman_pelanggan();
        $this->db->order_by('detail_jual.no_transaksi','desc');
        $datas_detail = $this->db->get()->result();


        $total['selesai'] = 0;
        $total['proses'] = 0;
        $total['belum_verifikasi'] = 0;
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
        $total['penjualan'] = $total['selesai']+$total['proses']+$total['belum_verifikasi'];
        $data = array(
        "page" => "penjualan/penjualan_v",
        "menu" => "penjualan",
        "total" => $total,
        "datas" => $datas
         );
        $this->load->view("index",$data);
    }
    public function cek_penjualan($resi)
    {
        $this->db->select("*");
        $this->db->from("penjualan p");
        $this->db->join("pelanggan n","p.id_pelanggan = n.id_pelanggan","left");
        $this->db->where("p.no_transaksi", $resi);
        $penjualan = $this->db->get()->row();
        echo json_encode($penjualan);
    }
    public function diterima_pembeli() {
        $data  = array(
            // id_penjualan	
            "tgl_jual" =>$this->input->post("tgl_jual"),
        );
        $this->db->where("id_penjualan",$this->input->post("id_penjualan"));
        $this->db->update("penjualan",$data);
        $datas  = array(
            // id_penjualan	
            "status_kirim" =>$this->input->post("status_kirim"),
            "nama_penerima" =>$this->input->post("nama_penerima"),
        );
        $this->db->where("no_transaksi",$this->input->post("no_transaksi"));
        $this->db->update("pengiriman",$datas);
        echo true;
    }   
    public function update() {
        $data  = array(
            // id_penjualan	
            "tgl_jual" =>$this->input->post("tgl_jual"),
        );
        $this->db->where("id_penjualan",$this->input->post("id_penjualan"));
        $this->db->update("penjualan",$data);
        $datas  = array(
            // id_penjualan	
            "status_kirim" =>$this->input->post("status_kirim"),
            "nama_penerima" =>$this->input->post("nama_penerima"),
        );
        $this->db->where("no_transaksi",$this->input->post("no_transaksi"));
        $this->db->update("pengiriman",$datas);
        $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Update data Berhasil',icon:'success'});");
        redirect("transaksi/penjualan/");
    }   
    
    public function detail_penjualan_Update() {

        if($this->session->username == 'admin' ){
            $this->session->set_flashdata("message", "swal.fire({title: 'Failed',text: 'Anda Harus Login Sebagai Karyawan!!',icon:'error'});");
            redirect("transaksi/penjualan/detail_pejualan");
        }
        $dts = json_decode($this->input->post('data_produk'));
        $data  = array(
            "status_bayar" =>$this->input->post("status_bayar")	
        );
        $this->db->where("no_transaksi",$this->input->post("no_transaksi"));
        $this->db->update("detail_jual",$data);
        $kirim = (($this->input->post("status_bayar") == 1) ? 1:0);
        $datas = array(
            "status_kirim" =>$kirim,
            // "nama_penerima" =>$this->input->post("nama_penerima")
        );
        $this->db->where("no_transaksi",$this->input->post("no_transaksi"));
        $this->db->update("pengiriman",$datas);
        $id_pegawai =$this->db->get_where('pegawai',array("email"=>$this->session->username))->row();
     
        $jual = array(
         "id_pelanggan" =>$this->input->post("id_pelanggan"),
         "no_transaksi" =>$this->input->post("no_transaksi"),
         "id_pegawai" =>$id_pegawai->id_pegawai,
         "tgl_jual" =>$this->input->post("tgl_jual"),
        //  "total_bayar" =>$dts->total_bayar,
        //  "bayar" =>$this->input->post("bayar"),
        //  "kembali" =>$this->input->post("kembali"),	
        );
        $this->db->where("no_transaksi",$this->input->post("no_transaksi"));
        $this->db->insert('penjualan',$jual);

        $this->sendNotifPelanggan($this->input->post('no_transaksi'));
        
        $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Update data berhasil',icon:'success'});");
        redirect("transaksi/penjualan/detail_pejualan");
    }   
    public function simpan() {
        $data  = array(
            "tgl_jual" =>$this->input->post("tgl_jual"),
            "id_pegawai" =>$this->input->post("id_pegawai"),
            "id_pelanggan" =>$this->input->post("id_pelanggan"),
            "total_bayar" =>$this->input->post("total_bayar"),
            "bayar" =>$this->input->post("bayar"),
            "kembali" =>$this->input->post("kembali")
        );
        $ins = $this->db->insert( "penjualan", $data );
        $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Tambah data berhasil',icon:'success'});");
        redirect("transaksi/penjualan/");
    }

    public function delete() {
        $data = json_decode($this->input->post("row"));
        $datas = array(
            "table1"=>"penjualan",
            "table2"=>"detail_jual",
            "table3"=>'pengiriman',
            "field"=>"no_transaksi"
        );
        echo delete_trunc2($datas,$data[0]);
        
    }
    public function detail_pejualan() {
        $this->joins->detailjual_pengiriman_pelanggan();
        $this->db->order_by('detail_jual.no_transaksi','desc');
        $datas = $this->db->get()->result();
        
        $data = array(
        "page" => "penjualan/detail_penjualan_v",
        "menu" => "Detail Penjualan",
        "datas" => $datas
         );
        $this->load->view("index",$data);

    }
    public function cek_harga()
    {
        $data['origin']      = $this->input->post('origin');
        $data['destination'] = $this->input->post('destination');
        $data['weight']      = $this->input->post('berat');
        $data['courier']     = $this->input->post('kurir');
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.rajaongkir.com/starter/cost',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => $data,
          CURLOPT_HTTPHEADER => array(
            'key: 00b8f2653dec48a32b872c686fff55ca'
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;
    }

    public function sendNotifPelanggan($no_transaksi) {
        $data = $this->db->query("SELECT * FROM pelanggan
        INNER JOIN detail_jual ON pelanggan.id_pelanggan = detail_jual.id_pelanggan
        WHERE detail_jual.no_transaksi = '".$no_transaksi."'")->result_array();
  
        $no_hp = $data[0]['no_hp'];
        $nama = $data[0]['nama_pelanggan'];
  
        $this->db->query("
        UPDATE detail_jual SET notif='2' WHERE no_transaksi = '".$no_transaksi."'");
  
        $userkey = "8jhyem";
        $passkey = "n65hmpn9lo";
        $url = "https://console.zenziva.net/wareguler/api/sendWA/";
  
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => $no_hp,
            'message' => "Halo ".$nama.". pesanan dengan nomor transaksi ".$no_transaksi." telah kami kirim, tolong bisa konfirmasi kalo barang sudah diterima."
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);
    }
}
