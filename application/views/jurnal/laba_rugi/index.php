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
                <h4>Halaman Laporan Laba Rugi</h4>
                <p>Kelola laporan laba rugi sesuai dengan kebutuhan.</p>
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
                    <td>Total Pendapatan</td>
                    <td><?= number_format($total_pendapatan, 2, ',', '.') ?></td>
                </tr>
                <tr>
                    <td>Total Beban</td>
                    <td><?= number_format($total_beban, 2, ',', '.') ?></td>
                </tr>
                <tr>
                    <td><strong>Laba/Rugi</strong></td>
                    <td><strong><?= number_format($laba_rugi, 2, ',', '.') ?></strong></td>
                </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-center">
                <h4>Pendapatan dan Beban</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="jurnalTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Akun</th>
                            <th>Debit</th>
                            <th>Kredit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($jurnal as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= do_formal_date($row->tanggal); ?></td>
                            <td><?= $row->nama_akun; ?></td>
                            <td>Rp <?= number_format($row->debit, 0, ',', '.'); ?></td>
                            <td>Rp <?= number_format($row->kredit, 0, ',', '.'); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
