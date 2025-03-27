<div class="col-xl-12 col-sm-12 col-12" style="margin-top: 10px; display: flex; justify-content: flex-end;">
    <div class="card" style="flex: 1; max-width: 1000px; margin-right: 25px;">
        <div class="card-body">
            <!-- Menampilkan pesan flash message jika ada -->
            <?php if ($this->session->flashdata('message')): ?>
                <div class="">
                    <?= $this->session->flashdata('message'); ?>
                </div>
                <?php $this->session->unset_userdata('message'); ?> <!-- Hapus Flashdata -->
            <?php endif; ?>

            <div class="text-center">
                <h4>Halaman Jurnal Akuntansi</h4>
                <p>Kelola data jurnal transaksi sesuai dengan kebutuhan.</p>
            </div>

            <!-- Tombol Tambah Jurnal -->
            <div class="d-flex justify-content-end mb-3">
                <a href="<?= base_url('jurnal/jurnal/tambah'); ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Jurnal
                </a>
            </div>
            <!-- Tabel Data Jurnal -->
            <div class="table-responsive">
            <table class="table table-bordered" id="jurnalTable">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Akun</th>
                        <th>Deskripsi</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($jurnal as $row): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= do_formal_date($row->tanggal); ?></td>
                        <td><?= $row->nama_akun; ?></td>
                        <td><?= $row->deskripsi; ?></td>
                        <td>
                            Rp <?= number_format(($row->id_akun == 1) ? $keuntungan : $row->debit, 0, ',', '.'); ?>
                        </td>
                        <td>
                            Rp <?= number_format(($row->id_akun == 1) ? 0 : $row->kredit, 0, ',', '.'); ?>
                        </td>
                        <td>
                            <a href="<?= base_url('jurnal/jurnal/hapus/'.$row->id_jurnal); ?>" class="btn btn-danger btn-sm hapus">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

<script>
   document.querySelectorAll('.hapus').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah link agar tidak langsung dijalankan
            var url = this.getAttribute('href'); // Ambil URL dari atribut href
            Swal.fire({
                title: "Hapus Data?",
                text: "Data yang sudah dihapus tidak dapat dipulihkan kembali!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika konfirmasi, redirect ke URL penghapusan
                    window.location.href = url;
                }
            });
        });
    });
</script>
