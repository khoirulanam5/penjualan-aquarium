<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if ($this->session->flashdata('message')): ?>
    <script>
        <?= $this->session->flashdata('message'); ?>
    </script>
        <?php $this->session->unset_userdata('message'); ?>
<?php endif; ?>
<div class="row">
    <!-- Column -->
    <div class="col-md-9 col-lg-9">
        <div class="card">
            <div class="card-header bg-info">
                <h5 class="mb-0 text-white">
                <!-- Your Cart (4 items) -->
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table product-overview">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Detail</th>
                                <th>Harga Satuan</th>
                                <th>Jumlah </th>
                                <th style="text-align:center">Harga</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $profil = $this->db->get_where("pelanggan", array("id_pelanggan" => $this->session->username))->row();
                            if(!empty($custom[0]->id_custom)){
                                
                                foreach($custom as $key => $val){
                                $img = file_exists(FCPATH.'images/'.$profil->images) ? 'noimages.jpg' : 'noimages.jpg';
                                $hargasatuan = $val->harga_satuan*$val->panjang*$val->lebar*$val->tinggi;
                                ?>
                                <tr>
                                    <td width="150"><img src="<?=base_url('images/').$img?>" alt="iMac" width="80"></td>
                                    <td width="450">
                                        <h5 class="font-500"><?="Pesanan Custom"?></h5>
                                        <p><?=$val->keterangan?></p>
                                    </td>
                                    <td width="150"><?=rp($hargasatuan)?></td>
                                    <td width="80">
                                        <input type="text" class="form-control" placeholder="1" value="<?=$val->jumlah?>" readonly>
                                    </td>
                                    <td width="150" align="center" class="font-500"><?=rp($val->jumlah*$hargasatuan)?></td>
                                    <td align="center">
                                        <a href="<?=base_url('public/home/keranjang_del/').$val->id_detail_produk?>?ses=<?=$this->session->username?>" class="text-inverse" title="" data-bs-toggle="tooltip" data-original-title="Delete"><i data-feather="trash-2" class="fill-white feather-sm text-dark"></i></a>
                                    </td>
                                </tr>
                                <?php
                                }
                            }
                            if(!empty($keranjang[0]->id_produk)){                
                                foreach($keranjang as $key => $val){
                                    $img = file_exists(FCPATH.'images/'.$val->images) ? $val->images : 'noimages.jpg';
                                    ?>
                                    <tr>
                                        <td width="150"><img src="<?=base_url('images/').$img?>" alt="iMac" width="80"></td>
                                        <td width="450">
                                            <h5 class="font-500"><?=$val->nama_produk?></h5>
                                            <p><?=$val->diskripsi?></p>
                                        </td>
                                        <td width="150"><?=rp($val->harga_jualpro)?></td>
                                        <td width="80">
                                            <input type="text" class="form-control" placeholder="1" value="<?=$val->jumlah?>" readonly>
                                        </td>
                                        <td width="150" align="center" class="font-500"><?=rp($val->jumlah*$val->harga_jualpro)?></td>
                                        <td align="center">
                                            <a href="<?=base_url('public/home/keranjang_del/').$val->id_detail_produk?>?ses=<?=$this->session->username?>" class="text-inverse" title="" data-bs-toggle="tooltip" data-original-title="Delete"><i data-feather="trash-2" class="fill-white feather-sm text-dark"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                    </table>
                    <hr>
                    <div class="d-flex no-block align-items-center">
                        <a href="<?=base_url()?>public/home" class="btn btn-dark btn-outline"><i data-feather="arrow-left" class="fill-white feather-sm"></i> Lanjut Belanja</a>
                        <div class="ms-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-3 col-lg-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Belanja</h5>
                <hr>
                <small>Total Harga</small>
                <h2><?=rp($total_bayar)?></h2>
                <hr>
                <a href="<?=base_url()?>public/home/checkout" class="btn btn-success">Checkout</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Hubungi Kami</h5>
                <hr>
                <center>
                    <h4><i class="ti-mobile"></i> 9998979695 </h4> <small>Silahkan kirimkan pesan kepada kami jika ada pertanyaan.</small>
                </center>
            </div>
        </div>
    </div>
</div>