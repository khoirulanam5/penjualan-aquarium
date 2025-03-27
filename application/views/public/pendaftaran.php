<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<form action="<?= base_url('users/add') ?>" method="post" style="margin: 20px;">
    
    <div class="row col-md-12  input-group mb-3">
        <div class="col-md-6">
            <span class="input-group-text btn-sm" id="basic-addon1">Nama</span>
            <input type="text" class="form-control  btn-sm" name="nama_pelanggan" placeholder="Nama "
                aria-label="nama_pelangan" aria-describedby="basic-addon1">
        </div>
        <div class="col-md-6">
            <span class="input-group-text btn-sm" id="basic-addon1">Username</span>
            <input type="text" class="form-control  btn-sm" name="username" placeholder="Username" aria-label="Username"
                aria-describedby="basic-addon1">
        </div>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text btn-sm" id="basic-addon1">Password</span>
        <input type="password" class="form-control  btn-sm" name="password" placeholder="Password" aria-label="password"
            aria-describedby="basic-addon1">
    </div>
    <p for="" class="btn-xs">*Daftar kota tujuan pengiriman.</p>
    <div class="input-group mb-3">
        <span class="input-group-text btn-sm" id="basic-addon1">Kabupaten</span>
        <select name="kabupaten" id="kabupaten" class="form-control  btn-sm" onchange="kecamatan_select(this.value)" >
            <option value="">--Pilih Kabupaten--</option>
            <?php
            $kota = $this->db->select("lokasi_tujuan")->from("ongkos_kirim")->get()->result();
            $kecamatan = array();
            foreach ($kota as $k => $val) {
                if ($val->lokasi_tujuan != '-') {
                    $kec = file_get_contents(FCPATH.'/sources/'.$val->lokasi_tujuan.'.json');
                    $kecamatan[$val->lokasi_tujuan] = json_decode($kec)->value;
                    echo '<option value="' . $val->lokasi_tujuan . '">' . $val->lokasi_tujuan . '</option>';
                }
            }
            ?>
        </select>
    </div>
   
    <div class="input-group mb-3">
        <span class="input-group-text btn-sm" id="basic-addon1">Kecamatan</span>
        <select name="kecamatan" id="kecamatan" class="form-control  btn-sm" >
            <option value="">--Pilih Kecamatan--</option>
        </select>

        <script>
            var datas = JSON.parse('<?=json_encode($kecamatan)?>');
            function kecamatan_select(kec) {
                $.each(datas,function(a,b){
                    if(a == kec){
                        $(".pil").remove();
                        b.map((data)=>{
                            $("#kecamatan").prepend('<option class="pil" value="'+data.name+'">'+data.name+'</option>');
                        })
                        
                    }
                })
            }
            
        </script>
    </div>
    <div class="row col-md-12 input-group mb-3">
        <div class="col-md-6">
            <span class="input-group-text btn-sm" id="basic-addon1">Desa</span>
            <input type="text" class="form-control  btn-sm" name="desa" placeholder="Desa" aria-label="desa"
                aria-describedby="basic-addon1">
        </div>
        <div class="col-md-6">
            <span class="input-group-text btn-sm" id="basic-addon1">Kode Pos</span>
            <input type="text" class="form-control  btn-sm" name="kodepos" placeholder="Kode Pos" aria-label="kodepos"
                aria-describedby="basic-addon1">
        </div>
    </div>
    <div class="row col-md-12 input-group mb-3">
        <div class=" col-md-6">
            <span class="input-group-text btn-sm" id="basic-addon1">Rw</span>
            <input type="text" class="form-control  btn-sm" name="rw" placeholder="Rw" aria-label="rw"
                style="flex:none !important">
        </div>
        <div class="col-md-6">
            <span class="input-group-text btn-sm" id="basic-addon1">Rt</span>
            <input type="text" class="form-control  btn-sm" name="rt" placeholder="Rt" aria-label="Rt"
                style="flex:none !important">
        </div>
    </div>
    <div class="row col-md-12  input-group mb-3">
        <div class="col-md-6">
            <span class="input-group-text btn-sm" id="basic-addon1">No Hp</span>
            <input type="number" class="form-control  btn-sm" name="no_hp" placeholder="No Hp" aria-label="no_hp"
                aria-describedby="basic-addon1">
        </div>
        <div class="col-md-6">
            <span class="input-group-text btn-sm" id="basic-addon1">Email</span>
            <input type="email" class="form-control  btn-sm" name="email" placeholder="Email" aria-label="email"
                aria-describedby="basic-addon1">
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="submit" class="form-control  btn-sm btn-warning" name="daftar" value="Daftar">
    </div>
</form>