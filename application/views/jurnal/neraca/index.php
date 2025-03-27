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
                <h4>Halaman Laporan Neraca</h4>
                <p>Kelola laporan Neraca sesuai dengan kebutuhan.</p>
            </div>
            <!-- Tabel Data Jurnal -->
            <div class="table-responsive">
                <table class="table table-bordered" id="jurnalTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>Keterangan</th>
                            <th>Jumlah (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Total Aset</td>
                            <td><?= number_format($total_aset, 2, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td>Total Kewajiban</td>
                            <td><?= number_format($total_kewajiban, 2, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td>Total Ekuitas</td>
                            <td><?= number_format($total_ekuitas, 2, ',', '.') ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
