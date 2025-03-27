<div class="col-xl-12 col-sm-12 col-12" style="margin-top: 10px; display: flex; justify-content: flex-end;">
    <div class="card" style="flex: 1; max-width: 1000px; margin-right: 25px;">
        <div class="card-body">
            <div class="container mt-4">
                <h3 class="text-center">Tambah Akun</h3>

                <form action="<?= base_url('jurnal/akun/simpan'); ?>" method="post">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kode_akun">Kode Akun</label>
                                <input type="text" class="form-control" name="kode_akun" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_akun">Nama Akun</label>
                                <input type="text" class="form-control" name="nama_akun" required>
                            </div>

                            <div class="text-center">
                                <a href="<?= base_url('jurnal/akun'); ?>" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
