<link rel="icon" type="image/png" sizes="16x16" href="../src/img/tasbiha.png">
<title>Shopfish Aquarium - Dashboard</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<div class="col-xl-12 col-sm-12 col-12" style="margin-top: 10px; display: flex; justify-content: flex-end;">
    <div class="card" style="flex: 1; max-width: 1000px; margin-right: 45px;">
        <div class="card-body">
            <!-- Menampilkan pesan flash message jika ada -->
            <?php if ($this->session->flashdata('message')): ?>
                <script>
                    <?= $this->session->flashdata('message'); ?>
                </script>
                    <?php $this->session->unset_userdata('message'); ?>
            <?php endif; ?>
            
            <center>
                <!-- Menampilkan nama pengguna dan level -->
                <h4>Selamat Datang di Sistem Shopfish Aquarium.</h4>
                <p>Anda dapat melakukan pekerjaan sesuai dengan jabatan <?= $this->session->userdata('level'); ?></p>
                
                <!-- Menampilkan gambar -->
                <img height="400px" src="<?= base_url('src/img/home.jpg'); ?>">
            </center>
        </div>
    </div>
</div>