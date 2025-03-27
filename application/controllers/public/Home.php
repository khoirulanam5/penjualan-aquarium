<?php defined("BASEPATH") or exit("No direct script access allowed");
class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("M_join", "joins");
    $this->load->helper(array('form', 'url'));
    $this->load->config('payment_gateway');
    $this->load->library('midtrans');
  }

  public function index()
  {
    $this->db->select("*");
    $this->db->from("produk");
    $datas = $this->db->get()->result();

    $this->joins->pdetail();
    $this->db->where("a.id_pelanggan", $this->session->username);
    $this->db->where("a.id_produk >", '0');
    $this->db->group_by("b.id_produk");
    $keranjang = $this->db->get()->result();
    $total_p = 0;

    foreach ($keranjang as $key => $val) {
      $total_p += ($val->jumlah * $val->harga_jualpro);
    }

    $this->joins->customdetail();
    $this->db->where("a.id_pelanggan", $this->session->username);
    $this->db->where("a.id_custom >", '0');
    $custom = $this->db->get()->result();
    $total_c = 0;
    foreach ($custom as $key => $val) {
      $total_c += ($val->jumlah * ($val->harga_satuan * $val->panjang * $val->lebar * $val->tinggi));
    }

    $data = array(
      "page" => "public/pages",
      "tabs" => "Aquarium",
      "keranjang" => $keranjang,
      "custom" => $custom,
      "notif" => 1,
      'datas' => (!empty($datas) ? $datas : "")
    );
    $this->load->view("public/index", $data);
  }
  public function detail($id)
  {
    $item = $this->db->get_where("produk", array("id_produk" => $id))->result();
    $data = array(
      "page" => "public/products_detail",
      "tabs" => "Aquarium",
      "datas" => $item[0]
    );
    $this->load->view("public/index", $data);
  }
  public function cart()
  {
    $this->joins->pdetail();
    $this->db->where("a.id_pelanggan", $this->session->username);
    $this->db->where("a.id_produk >", '0');
    $this->db->group_by("b.id_produk");
    $keranjang = $this->db->get()->result();
    $total_p = 0;

    foreach ($keranjang as $key => $val) {
      $total_p += ($val->jumlah * $val->harga_jualpro);
    }

    $this->joins->customdetail();
    $this->db->where("a.id_pelanggan", $this->session->username);
    $this->db->where("a.id_custom >", '0');
    $custom = $this->db->get()->result();
    // p($custom);
    $total_c = 0;
    foreach ($custom as $key => $val) {
      $total_c += ($val->jumlah * ($val->harga_satuan * $val->panjang * $val->lebar * $val->tinggi));
    }
    $total_bayar = $total_p + $total_c;
    $data = array(
      "page" => "public/products_cart",
      "tabs" => "Keranjang",
      "keranjang" => $keranjang,
      "custom" => $custom,
      "total_bayar" => $total_bayar,
    );
    $this->load->view("public/index", $data);
  }
  public function checkout()
  {
    if ($this->session->level != "pelanggan") {
      $this->session->set_flashdata("message", "swal.fire({title: 'Error',text: 'Silahkan Login Sebagai Pelanggan',icon:'error'});");
      redirect("login");
    }
    $this->joins->pdetail();
    $this->db->where("a.id_pelanggan", $this->session->username);
    $this->db->where("a.id_produk >", '0');
    $this->db->group_by("b.id_produk");
    $keranjang = $this->db->get()->result();
    $total_p = 0;
    $total_beratp = 0;
    foreach ($keranjang as $key => $val) {
      $total_p += ($val->jumlah * $val->harga_jualpro);
      $total_beratp += ($val->jumlah * $val->berat);
    }

    $this->joins->customdetail();
    $this->db->where("a.id_pelanggan", $this->session->username);
    $this->db->where("a.id_custom >", '0');
    $custom = $this->db->get()->result();
    $total_c = 0;
    $total_beratc = 0;

    foreach ($custom as $key => $val) {
      $total_c += ($val->jumlah * ($val->harga_satuan * $val->panjang * $val->lebar * $val->tinggi));
      $total_beratc += ($val->jumlah * (($val->panjang * $val->lebar * $val->tinggi) / 4000) * 1000);
    }
    $total_bayar = $total_p + $total_c;
    $total_berat = $total_beratp + $total_beratc;
    $almt = $this->db->get_where("pelanggan", array("id_pelanggan" => $this->session->username))->row();
    $default_ongkir = $this->db->get_where("ongkos_kirim like", array("lokasi_tujuan" => $almt->kabupaten))->row();

    $data = array(
      "almt" => $almt,
      "ongkir" => $default_ongkir,
      "keranjang" => $keranjang,
      "custom" => $custom,
      "berat" => $total_berat,
      "total_bayar" => ($total_bayar + $default_ongkir->biaya),
    );
    $data["detail_jual"] = json_encode($data);
    $data["page"] = "public/products_checkout";
    $data["tabs"] = "Pembayaran";

    $this->load->view("public/index", $data);
  }
  public function keranjang()
  {
    if ($this->session->level != "pelanggan") {
      $this->session->set_flashdata("message", "swal.fire({title: 'Error',text: 'Silahkan Login Sebagai Pelanggan',icon:'error'});");
      redirect("login");
    }
    $id = $this->input->post('id_produk');
    if (!empty($this->input->post("id_pel"))) {
      if ($this->input->post("jumlah_order") > 0) {
        $data = array(
          "id_produk" => $id,
          "id_pelanggan" => $this->input->post("id_pel"),
          "jumlah" => $this->input->post("jumlah_order"),
          "tanggal" => date("Y-m-d")
        );
        $this->db->insert("detail_beli_produk", $data);
        $produk = $this->db->get_where("produk", array('id_produk' => $this->input->post('id_produk')))->row();
        $sisa = $produk->jml_stok - $this->input->post("jumlah_order");
        $this->db->where('id_produk', $this->input->post('id_produk'));
        $this->db->update("produk", array("jml_stok" => $sisa));

        $this->session->set_flashdata("message", 'swal.fire({
                title: "Berhasil",
                text: "Tambah item kekeranjang",
                icon: "success"
              });');
      } else {
        $this->session->set_flashdata("message", 'swal.fire({
              title: "Gagal!",
              text: "Jumlah Pesanan Tidak Boleh kurang dari 1",
              icon: "error"
            });');
      }
    } else {
      $this->session->set_flashdata("message", 'swal.fire({
          title: "Gagal!",
          text: "Silahkan Login",
          icon: "error"
          });');
    }
    redirect("public/home/detail/$id");
  }
  public function keranjang_del($id)
  {
    if (!empty($this->input->get("ses"))) {
      $cek = $this->db->get_where("detail_beli_produk", array("id_detail_produk" => $id))->row();
      if (!empty($cek)) {
        if ($cek->id_produk > 0) {
          $this->db->select("sum(jumlah) as jumlah");
          $this->db->from("detail_beli_produk");
          $this->db->where("id_produk", $cek->id_produk);
          $this->db->group_by('id_produk');
          $produk = $this->db->get()->row();
          $stok = $this->db->get_where("produk", array("id_produk" => $cek->id_produk))->row();
          $jml = $stok->jml_stok + $produk->jumlah;
          $this->db->where("id_produk", $cek->id_produk);
          $this->db->update("produk", array("jml_stok" => $jml));

          $this->db->where("id_produk", $cek->id_produk);
          $this->db->delete("detail_beli_produk");
        } else if ($cek->id_custom > 0) {
          $custom = $this->db->get_where("produk_custom", array("id_custom" => $cek->id_custom))->row();
          $this->db->where("id_custom", $cek->id_custom);
          $this->db->delete("detail_beli_produk");

          $this->db->where("id_custom", $cek->id_custom);
          $this->db->delete("produk_custom");
        }
        $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Hapus data berhasil',icon:'success'});");
      }
    }
    redirect("public/home/cart");

  }
  public function ongkir($id)
  {
    $ongkos = $this->db->get_where("ongkos_kirim", array("id_ongkos" => $id))->result();
    echo json_encode($ongkos);
  }

  public function pengiriman()
  {

    $id = $this->input->post("datas");
    if (!empty($this->input->post('courier'))) {
      $jasalain = array(
        'courier' => $this->input->post('courier'),
        'ongkir' => $this->input->post('ongkir')
      );
      $keterangan = json_encode($jasalain);
    } else {
      $keterangan = '';
    }
    $dt = json_decode(base64_decode($this->input->post('datas')));
    if (!empty($this->input->post('courier'))) {
      $dt->total_bayar = ($dt->total_bayar - $dt->ongkir->biaya) + $this->input->post('ongkir');
      $dt->ongkir->biaya = $this->input->post('ongkir');
      $dt->ongkir->jenis = $this->input->post('courier');
      $dt->ongkir->id_ongkos = 6;
    }
    
    $isi = base64_decode($id);
    $data = array(
      "no_transaksi" => "AQ" . time(),
      "id_pelanggan" => $this->session->username,
      "data_produk" => json_encode($dt),
      "tanggal_order" => date('Y-m-d'),
      "bukti_tf" => 'Midtrans',
    );
    $this->db->insert("detail_jual", $data);
    $this->db->select("no_transaksi");
    $this->db->from("detail_jual");
    $this->db->order_by("no_transaksi desc");
    $resi = $this->db->get()->row();
    $data_isi = json_decode($isi);

    $pengiriman = array(
      "no_transaksi" => $data['no_transaksi'],
      "id_ongkos" => $data_isi->ongkir->id_ongkos,
      "keterangan" => $keterangan,
    );
    $this->db->insert("pengiriman", $pengiriman);
    $this->db->where("id_pelanggan", $this->session->username);
    $this->db->delete("detail_beli_produk");

    // Setelah proses pengiriman, panggil fungsi untuk mengirim notifikasi
    $this->sendNotifPesanan($data['no_transaksi']);

    $this->session->set_flashdata("message", "swal.fire({title: 'Berhasil',text: 'Pesanan akan diproses Setelah pembayaran berhasil diverifikasi penjual',icon:'success'});");
    redirect("public/home/product_order");
  }
  public function product_order()
  {

    $this->joins->pdetailjual();
    $this->db->where("id_pelanggan", $this->session->username);
    $this->db->order_by("b.no_transaksi", "desc");
    $list = $this->db->get()->result();
    $data = array(
      "page" => "public/products_order",
      "tabs" => "Semua Pesanan",
      "list" => $list
    );
    $this->load->view("public/index", $data);
  }
  public function tes()
  {
    $this->load->library('pdf');
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "iniFile.pdf";
    $this->pdf->previewpdf("public/pages");
  }

  public function editprofil()
  {
    $this->db->select("*");
    $this->db->from("tb_users");
    $this->db->join("pelanggan",'id_pelanggan=username','left');
    $this->db->where('id_pelanggan',$this->session->userdata('username'));
    $user = $this->db->get()->row();
    
    $data = array(
      "page" => "public/edit_profil",
      "tabs" => "Edit Profil",

    );
    $data['detail'] = $user;
    $this->load->view("public/index", $data);
  }

  public function nota($no_transaksi) {
    // Join tabel yang dibutuhkan untuk mendapatkan detail transaksi
    $this->joins->pnota();
    $this->db->where("a.id_pelanggan", $this->session->username); // Tambahkan alias 'a'
    $this->db->where("a.no_transaksi", $no_transaksi); // Tambahkan alias 'a'
    $list = $this->db->get()->result();

    // Jika data tidak ditemukan, kembalikan ke halaman pesanan
    if (empty($list)) {
        $this->session->set_flashdata('message', "<script>Swal.fire('Error', 'Data transaksi tidak ditemukan!', 'error');</script>");
        redirect('public/home/product_order');
    }

    // Decode JSON untuk mendapatkan rincian produk
    $isi = json_decode($list[0]->data_produk);

    $data = array(
        "list" => $list,
        "produk" => $isi->keranjang ?? [], // Produk reguler
        "custom" => $isi->custom ?? [],   // Pesanan custom
        "total_bayar" => $isi->total_bayar,
        "no_transaksi" => $no_transaksi,
        "tanggal" => $list[0]->tanggal_order,
        "status_bayar" => $list[0]->status_bayar
    );

    $this->load->view("public/cetak_nota", $data);
}

  public function token() {
    $rawData = $this->input->post('datas');
    log_message('debug', 'Raw data received: ' . $rawData);

    $data_produk = json_decode(base64_decode($rawData), true);

    if (!$data_produk) {
        log_message('error', 'Data produk tidak valid.');
        echo json_encode(['error' => 'Data produk tidak valid.']);
        return; // Pastikan eksekusi berhenti di sini
    }

     

    // Siapkan data transaksi untuk Midtrans
    $transaction_details = [
        'order_id' => uniqid(),
        'gross_amount' => $data_produk['total_bayar']
    ];

    $item_details = [];
    foreach ($data_produk['keranjang'] as $item) {
  
      $item_details[] = [
          'id' => $item['id_produk'],
          'price' => $item['harga_jualpro'],
          'quantity' => $item['jumlah'],
          'name' => $item['nama_produk']
      ];
  }

    $item_details[] = [
        'id' => 'ongkir',
        'price' => 50000,
        'quantity' => 1,
        'name' => 'Ongkos Kirim'
    ];

    $customer_details = [
        'first_name' => $data_produk['almt']['nama_pelanggan'],
        'email' => $data_produk['almt']['email'],
        'phone' => $data_produk['almt']['no_hp']
    ];

    $transaction_data = [
        'transaction_details' => $transaction_details,
        'item_details' => $item_details,
        'customer_details' => $customer_details
    ];

    try {
        $snapToken = \Midtrans\Snap::getSnapToken($transaction_data);
        log_message('debug', 'Snap token generated: ' . $snapToken);
        echo json_encode(['snap_token' => $snapToken]);
    } catch (Exception $e) {
        log_message('error', 'Midtrans error: ' . $e->getMessage());
        echo json_encode(['error' => $e->getMessage()]);
    }
}

public function finish() {
  // ini data dari ajax finis tadi
    $result = json_decode($this->input->post('result_data'));

    if (!$result) {
        echo json_encode(['status' => 'error', 'message' => 'Data transaksi tidak valid.']);
        return;
    }

    $data = array(
        'id_pembayaran' => uniqid('PAY-'),
        'order_id' => $result->order_id,
        'transaction_id' => $result->transaction_id,
        'payment_type' => $result->payment_type,
        'gross_amount' => $result->gross_amount,
        'transaction_time' => $result->transaction_time,
        'transaction_status' => $result->transaction_status,
        'bank' => $result->va_numbers[0]->bank ?? null, // Jika pembayaran menggunakan bank transfer
        'va_number' => $result->va_numbers[0]->va_number ?? null // Virtual Account Number
    );

    $insert = $this->db->insert('tb_pembayaran', $data);


    if ($insert) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan pembayaran ke database.']);
    }
}
}