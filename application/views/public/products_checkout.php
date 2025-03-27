<style>
    .form-check-input {
        background-color: #bbbec7 !important;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="">
</script>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="nav-item">
                        <a href="#iprofile" class="nav-link active" aria-controls="home" role="tab" data-bs-toggle="tab"
                            aria-expanded="true">
                            <span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Pembayaran</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="iprofile">
                    <?php if ($this->session->flashdata('message')): ?>
                            <script>
                                <?= $this->session->flashdata('message'); ?>
                            </script>
                            <?php $this->session->unset_userdata('message'); ?>
                        <?php endif; ?>
                        <div class="row">
                            <!-- <div class="col-md-3">
                                <div style="width:300px;height:300px;background:#ddd;text-align:center">
                                    <small>scan Qr code untuk melakukan pembayaran</small>
                                    <img src="<?= base_url('images/') ?>qr_dana.jpg" class="mx-auto" width="100%"
                                        alt="">
                                </div>
                            </div> -->
                            <div class="col-md-4 ms-auto">
                                <h4 class="card-title mt-4 text-center">Info Pengiriman</h4>
                                <div class="input-group mb-3">
                                </div>
                                <div id="select_op"></div>
                                <div id="alamat">
                                    <table width="100%" style="margin-left:20px;margin-top:20px">
                                        <tr>
                                            <td width="130px">Foto Profil</td>
                                            <td>:</td>
                                            <td>
                                                <image width="70px" src="<?php
                                                $img = (!empty($almt->images) ? $almt->images : "portrait-solid.svg");
                                                echo base_url('images/') . $img;
                                                ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pemesan</td>
                                            <td>:</td>
                                            <td>
                                                <?= $almt->nama_pelanggan ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td>
                                                <?= $almt->desa . " RT-" . $almt->rt . "/RW-" . $almt->rw . ' Kec.' . $almt->kecamatan ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Hp</td>
                                            <td>:</td>
                                            <td>
                                                <?= $almt->no_hp ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td>
                                                <?= $almt->email ?>
                                            </td>
                                        </tr>
                                    </table>
                                    <table class="text-center">
                                        <tr>
                                            <td height="15px"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="row mx-auto col-md-12">
                                                    <div class="col-md-2">
                                                        <i class="fas fa-people-carry text-warning"
                                                            style="font-size:xxx-large"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="col-md-12 ">
                                                    <span class='mx-auto'> Kota Tujuan :
                                                        <?= $ongkir->lokasi_tujuan ?>
                                                    </span><br>
                                                    <input type="hidden" name="id_city" id="id_city"
                                                        value="<?= $ongkir->id_ongkos ?>">
                                                    <input type="hidden" name="berat" id="berat" value="<?= $berat ?>">
                                                    <!-- <input type="hidden" name="onkir_toko" id="onkir_toko" value="<?= $ongkir->biaya ?>">   -->
                                                    <span class="row mx-auto">Ongkos Kirim :
                                                        <h5 style="width: 150px;" class="onkir_toko">
                                                            <?= rp($ongkir->biaya) ?>
                                                        </h5>
                                                        <h5 style="width: 150px;" class="onkir_lain"></h5>
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" width="100%">
                                                <div class="row col-md-12 ">
                                                    <!-- <span class="col-md-10 mx-auto text-center">
                                                        Total Bayar <div class="onkir_toko" >
                                                            <?= rp($total_bayar) ?>
                                                        </div>
                                                        <div class="total_bayar_lain"></div>
                                                    </span> -->
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-5 mx-auto" style="margin-top:20px">
                                <!-- tab  -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab"
                                            onclick="kurirtoko()">
                                            <span>Jasa Kirim Toko</span>
                                        </a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#jasalain" role="tab"
                                            onclick="kurirlain()">
                                            <span>Jasa Kirim Lain</span>
                                        </a>
                                    </li> -->
                                </ul>
                                <!-- Tab panes -->

                                <div class="tab-content">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        <div class="p-3">
                                        <form id="pembayaran" action="<?= base_url('public/home/pengiriman') ?>" method="post">
                                            <div class="input-group mb-3" style="width:300px">
                                                <input type="hidden" id="datas" value="<?= base64_encode($detail_jual) ?>" name="datas">
                                                <button type="button" class="btn btn-primary" onclick="payment()">Bayar</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane  p-3" id="jasalain" role="tabpanel">
                                        <?php echo form_open_multipart('public/home/pengriman'); ?>
                                        <!-- <form action="<?= base_url('public/home/pengriman/') ?>" method="post" enctype="multipart/form-data"> -->
                                        <div class="input-group mb-3 " style="width:350px">
                                            <!-- <span class="input-group-text btn-sm btn-info" id="basic-addon1">Gunakan Jasa Kirim Lain ?</span> -->
                                            <select class="form-select" id="courier" name="courier" required
                                                onchange="cek_ongkir(this)">
                                                <option value="">Pilih Kurir...</option>
                                                <option value="tiki">TIKI</option>
                                                <option value="pos">POS Indonesia</option>
                                                <option value="jne">JNE</option>
                                            </select>
                                        </div>
                                        <table id="cekharga" class="tablesaw table-bordered table-hover table no-wrap"
                                            style="width:380px">
                                            <tr>
                                                <td>Pengiriman</td>
                                                <td>Ongkir</td>
                                                <td>Hari</td>
                                            </tr>
                                        </table>
                                        <div class="input-group mb-3 " id="cekharga"></div>
                                        <div class="input-group mb-3 float-start" style="width:300px">
                                            <span class="input-group-text btn-sm btn-info" id="basic-addon1">Bukti
                                                bayar</span>
                                            <input type="hidden" value="<?= base64_encode($detail_jual) ?>"
                                                name="datas">
                                            <input type="file" class="form-control  btn-sm" required="required"
                                                name="userfile" accept=".jpg">
                                        </div>
                                        <div class=""> <input class="btn btn-default btn-sm" type="submit"
                                                value="Simpan"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <hr>
                <h5 class="card-title">Rincian Pesanan</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Images</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Harga /pcs</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if ($this->session->flashdata('message')): ?>
                                        <script>
                                            <?= $this->session->flashdata('message'); ?>
                                        </script>
                                        <?php $this->session->unset_userdata('message'); ?>
                                    <?php endif; ?>
                            <?php
                            if (empty($keranjang) && empty($custom)) {
                                redirect("public/home");
                            }

                            if (!empty($custom[0]->id_custom)) {
                                foreach ($custom as $key => $val) {
                                    $harga_satuan = ($val->harga_satuan * $val->panjang * $val->lebar * $val->tinggi);
                                    $img = 'noimages.jpg';
                                    echo '<tr>
                                    <td><img src="' . base_url("images/") . $img . '" alt="iMac" width="80"></td>
                                    <td>Produk Custom</td>
                                    <td>' . $val->jumlah . '</td>
                                    <td>' . rp($harga_satuan) . '</td>
                                    <td class="font-500">' . rp($val->jumlah * $harga_satuan) . '</td>
                                </tr>';
                                }
                            }

                            if (!empty($keranjang[0]->id_produk)) {
                                foreach ($keranjang as $key => $val) {
                                     $imgcek = file_exists(FCPATH.'images/'.$val->images) ? $val->images : 'noimages.jpg';
                                    echo '<tr>
                                        <td><img src="' . base_url("images/") . $imgcek . '" alt="iMac" width="80"></td>
                                        <td>' . $val->nama_produk . '</td>
                                        <td>' . $val->jumlah . '</td>
                                        <td>' . rp($val->harga_jualpro) . '</td>
                                        <td class="font-500">' . rp($val->jumlah * $val->harga_jualpro) . '</td>
                                    </tr>
                                    ';
                                }
                            }
                            ?>
                            <tr class="">
                                <td colspan="4" class="font-500" align="right">
                                    <div class="btn-sm">(* Total Harga + Ongkir)</div> Total Pembayaran
                                </td>
                                <td class="font-500">
                                    <span class="">
                                        <div class="onkir_toko">
                                            <?= rp($total_bayar) ?>
                                        </div>
                                        <div class="total_bayar_lain"></div>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function kota(id) {
        $.ajax({
            url: "<?= base_url('public/home/ongkir/')?>"+id,
            type: "GET",
            data: { data: id },
            success: function (a) {
                var isi = JSON.parse(a);
                console.log(isi);
                $("#select_op").html("<div><center><h3>Ongkir ke " + isi[0].lokasi_tujuan + " : " + formatRupiah(isi[0].biaya) + "</h3></center></div>");
            }
        });

    }
    function formatRupiah(angka, prefix) {
        var number_string = angka.toString().replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    function kurirlain() {
        $('.onkir_toko').hide();
    }
    function kurirtoko() {
        $('.onkir_toko').show();
        $(".onkir_lain").html('');
        $(".total_bayar_lain").html('');

    }
    function cek_ongkir(id) {
        $(".apiraja").remove();
        let kode = id.value;
        let tujuan = $("#id_city").val().toString();
        let berat = $("#berat").val();

        $.ajax({
            url: "<?= base_url() ?>transaksi/penjualan/cek_harga",
            type: 'post',
            data: { origin: '209', destination: tujuan, berat: berat, kurir: kode },
            success: function (a) {
                var data = JSON.parse(a),
                    result = data.rajaongkir.results;
                $.each(result, function (c, d) {
                    console.log(d);
                    d.costs.map((data) => {
                        $("#cekharga").append("<tr class='apiraja'><td><input class='form-check-input' type='radio' name='ongkir' onclick='onkirlain(" + data.cost[0].value + ")' value='" + data.cost[0].value + "'>&nbsp;<label class='form-check-label' for='exampleRadios1'>" + d.code.toUpperCase() + "-" + data.service + "</label></td><td>" + formatRupiah(data.cost[0].value, 'Rp. ') + " </td><td>" + data.cost[0].etd + "</td></tr>");
                    });
                });
            }

        });
    }
    function onkirlain(ongkir) {
        var bayar = "<?= $total_bayar ?>",
            ongkir_toko = "<?= $ongkir->biaya ?>";
        $(".onkir_lain").html(formatRupiah(ongkir, 'Rp. '));
        $(".total_bayar_lain").html(formatRupiah(parseInt(bayar) - parseInt(ongkir_toko) + ongkir, 'Rp. '));
    }



    function payment() {
    const dataProduk = $("[name='datas']").val();
    console.log("Memulai proses pembayaran...");
    console.log("Data produk yang dikirim:", dataProduk);

    $.ajax({
        url: "<?= site_url('public/home/token') ?>", // URL untuk mendapatkan token
        type: 'POST',
        data: {
            datas: dataProduk // Kirim data produk
        },
        success: function(data) {
            console.log("Response dari server untuk token:", data);

            try {
                const response = JSON.parse(data);
                console.log("Response berhasil diparse:", response);

                if (response.snap_token) {
                    console.log("Token didapatkan, memulai modal Midtrans...");
                    
                    // Buka modal Midtrans Snap dengan token
                    window.snap.pay(response.snap_token, {
                        onSuccess: function(result) {
                            console.log("Pembayaran berhasil:", result);

                            // Proses hasil pembayaran
                            endPayment(result).then((res) => {
                                console.log("Hasil proses endPayment:", res);

                                if (res.status === 'success') {
                                    Swal.fire({
                                        title: 'Pembayaran Berhasil',
                                        text: 'Pesanan Anda sedang diproses.',
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then(() => {
                                        console.log("Mengirim form pembayaran...");
                                        $("#pembayaran").off('submit').submit(); // Kirim form setelah SweetAlert ditutup
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Pembayaran Gagal',
                                        text: res.message || 'Terjadi kesalahan.',
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    });
                                }
                            }).catch((err) => {
                                console.error("Error saat menjalankan endPayment:", err);
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Terjadi kesalahan saat memproses pembayaran.',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            });
                        },
                        onPending: function(result) {
                            console.log("Pembayaran pending:", result);
                            Swal.fire({
                                title: 'Pembayaran Pending',
                                text: 'Mohon selesaikan pembayaran Anda.',
                                icon: 'info',
                                confirmButtonText: 'OK'
                            });
                        },
                        onError: function(result) {
                            console.error("Pembayaran gagal:", result);
                            Swal.fire({
                                title: 'Pembayaran Gagal',
                                text: 'Silakan coba lagi.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        },
                        onClose: function() {
                            console.log("Modal Midtrans ditutup sebelum selesai.");
                            Swal.fire({
                                title: 'Transaksi Dibatalkan',
                                text: 'Anda menutup pembayaran sebelum selesai.',
                                icon: 'warning',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                } else if (response.error) {
                    console.error("Error dari server:", response.error);
                    Swal.fire({
                        title: 'Error',
                        text: response.error,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            } catch (e) {
                console.error("Error parsing server response:", e.message);
                Swal.fire({
                    title: 'Error',
                    text: 'Terjadi kesalahan saat memproses pembayaran.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX error saat mendapatkan token:", xhr.responseText);
            Swal.fire({
                title: 'Error',
                text: 'Gagal mendapatkan Snap token! Pastikan koneksi internet Anda stabil.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
}

function endPayment(result) {
    console.log("Memulai proses endPayment dengan data:", result);

    return new Promise((resolve, reject) => {
        $.ajax({
            url: "<?= site_url('public/home/finish') ?>", // URL untuk memproses pembayaran
            type: 'POST',
            data: {
                result_data: JSON.stringify(result) // Kirim data hasil pembayaran
            },
            success: function(response) {
                console.log("Response dari server untuk endPayment:", response);

                try {
                    const res = JSON.parse(response);
                    console.log("Response endPayment berhasil diparse:", res);
                    resolve(res); // Resolusi jika sukses
                } catch (e) {
                    console.error("Error parsing response endPayment:", e.message);
                    reject(e);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX error saat memproses pembayaran:", xhr.responseText);
                reject(error); // Resolusi jika gagal
            }
        });
    });
}

// Tambahkan event listener untuk form pembayaran
$(document).ready(function() {
    $("#pembayaran").on('submit', function(e) {
        e.preventDefault(); // Mencegah form melakukan submit secara default
        payment(); // Panggil fungsi pembayaran
    });
});
</script>