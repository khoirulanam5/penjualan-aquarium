# Sistem Penjualan Aquarium

Sistem penjualan aquarium lengkap dengan fitur notifikasi WhatsApp, integrasi payment gateway, dan laporan akuntansi. Sistem dilengkapi dengan beberapa role pengguna untuk mempermudah pengelolaan operasional bisnis.

Dibangun menggunakan **CodeIgniter 3**, **MySQL**, serta frontend berbasis **HTML**, **CSS**, **JavaScript**, dan **Bootstrap**.

---

## 🚀 Fitur Utama

### 💰 Penjualan & Transaksi

* Manajemen produk aquarium
* Keranjang belanja
* Checkout dengan **payment gateway** (otomatisasi pembayaran)
* Notifikasi status pemesanan via **WhatsApp API**

### 👥 Role Pengguna

* **Admin** – Manajemen penuh sistem, kontrol semua modul
* **Karyawan** – Mengelola penjualan dan pemrosesan pesanan
* **Produksi** – Mengelola proses pembuatan aquarium sesuai permintaan
* **Pemilik** – Melihat laporan bisnis dan performa keseluruhan
* **Pelanggan** – Melakukan pembelian, melihat status pesanan

### 📊 Laporan Akuntansi

* Laporan pemasukan & pengeluaran
* Laba rugi
* Rekap transaksi
* Laporan stok & produksi

### 📫 Notifikasi Otomatis

* Notifikasi pesanan baru
* Notifikasi perubahan status pesanan
* Notifikasi pembayaran berhasil

---

## 🛠️ Teknologi yang Digunakan

* **Backend:** CodeIgniter 3
* **Database:** MySQL
* **Frontend:** HTML5, CSS3, JavaScript, Bootstrap
* **Payment Gateway:** (Silakan isi: Midtrans / Xendit / Tripay / lainnya)
* **WhatsApp Notification:** API (Gateway / WhatsApp Cloud API)

---

## 📂 Struktur Folder (Contoh)

```
application/
│── controllers/
│── models/
│── views/
│── libraries/
public/
│── assets/
│   ├── css/
│   ├── js/
│   ├── img/
database/
│── schema.sql
README.md
```

---

## 🔧 Cara Instalasi

1. Clone repository:

   ```bash
   git clone <repo-url>
   ```

2. Pindah ke folder project:

   ```bash
   cd penjualan-aquarium
   ```

3. Import database:

   * Buka phpMyAdmin
   * Buat database baru
   * Import file `schema.sql`

4. Konfigurasi CodeIgniter:

   * Buka `application/config/config.php` → sesuaikan **base_url**
   * Buka `application/config/database.php` → sesuaikan konfigurasi **MySQL**

5. Atur API:

   * Payment Gateway key
   * WhatsApp API key

6. Jalankan pada browser:

   ```
   http://localhost/penjualan-aquarium
   ```

---

## 📸 Screenshot (Opsional)

Tambahkan screenshot di folder `assets/img/` kemudian tulis di sini:

```
![Dashboard](assets/img/dashboard.png)
![Produk](assets/img/product.png)
![Laporan](assets/img/report.png)
```

---

## 📞 Contact

Jika ada pertanyaan, hubungi pengembang melalui kontak yang tersedia dalam aplikasi.

---

## 📄 License

Sesuaikan lisensi yang ingin digunakan atau tulis "Private Project" bila tidak ingin dibuka ke publik.

---

Terima kasih! README ini dapat disesuaikan sesuai fitur lengkap dari sistem Anda.
