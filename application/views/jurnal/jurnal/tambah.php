<div class="col-xl-12 col-sm-12 col-12" style="margin-top: 10px; display: flex; justify-content: flex-end;">
    <div class="card" style="flex: 1; max-width: 1000px; margin-right: 25px;">
        <div class="card-body">

                <div class="container mt-4">
                    <h3 class="text-center">Tambah Jurnal Umum</h3>

                    <form action="<?= base_url('jurnal/jurnal/simpan'); ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsi" placeholder="Keterangan" required>
                                </div>

                                <hr>
                                <h5>Detail Jurnal</h5>

                                <table class="table table-bordered" id="tabel-jurnal">
                                    <thead>
                                        <tr>
                                            <th>Akun</th>
                                            <th>Debit</th>
                                            <th>Kredit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select name="id_akun[]" class="form-control" required>
                                                    <option value="">Pilih Akun</option>
                                                    <?php foreach ($akun as $a) : ?>
                                                        <option value="<?= $a->id_akun; ?>"><?= $a->nama_akun; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="debit[]" class="form-control" min="0">
                                            </td>
                                            <td>
                                                <input type="number" name="kredit[]" class="form-control" min="0">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm btn-hapus">Hapus</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <button type="button" class="btn btn-success btn-sm" id="tambah-baris">+ Tambah Baris</button>

                                <hr>

                                <div class="text-center">
                                    <a href="<?= base_url('jurnal/jurnal'); ?>" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("tambah-baris").addEventListener("click", function () {
        let tabel = document.getElementById("tabel-jurnal").getElementsByTagName('tbody')[0];
        let row = tabel.insertRow();
        row.innerHTML = `
            <td>
                <select name="id_akun[]" class="form-control" required>
                    <option value="">Pilih Akun</option>
                    <?php foreach ($akun as $a) : ?>
                        <option value="<?= $a->id_akun; ?>"><?= $a->nama_akun; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td><input type="number" name="debit[]" class="form-control" min="0"></td>
            <td><input type="number" name="kredit[]" class="form-control" min="0"></td>
            <td><button type="button" class="btn btn-danger btn-sm btn-hapus">Hapus</button></td>
        `;
    });

    document.getElementById("tabel-jurnal").addEventListener("click", function (event) {
        if (event.target.classList.contains("btn-hapus")) {
            let row = event.target.closest("tr");
            if (document.querySelectorAll("#tabel-jurnal tbody tr").length > 1) {
                row.remove();
            }
        }
    });
});
</script>
