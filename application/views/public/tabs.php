<div class="row page-titles" style="    margin-top: 80px;">
    <div class="col-md-5 col-12 align-self-center">
        <h3 class="text-themecolor mb-0"><?="Selamat Berbelanja"?></h3>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?=base_url('public/home')?>">Home</a></li>
            <li class="breadcrumb-item active"><?=ucwords($tabs)?></li>
            
        </ol>
    </div>
    <div class="col-md-7 col-12 align-self-center d-none d-md-block">
    <?php 
        $segmet = $this->uri->total_segments();
        if($segmet == 2 && $this->uri->segment(2) == "home"){
            echo '<div type="button" class="btn btn-warning btn-rounded" style="float:right" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Order Custom
            </div>';
        }
    ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?=base_url('produk/produk/pesan_custom')?>" method="post">
                <div class="modal-header btn-warning">
                    <h3 class="modal-title text-white" >Pesanan Custom</h3></>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="btn-sm">Panjang ( cm )</label>
                        <input  class="form-control" type="number" name="panjang" id="panjang">
                    </div>
                    <div class="form-group">
                        <label for="" class="btn-sm">Lebar ( cm )</label>
                        <input  class="form-control" type="number" name="lebar" id="lebar">
                    </div>
                    <div class="form-group">
                        <label for="" class="btn-sm">Tinggi ( cm )</label>
                        <input  class="form-control" type="number" name="tinggi" id="tinggi">
                    </div>
                    <div class="form-group">
                        <label for="" class="btn-sm">Ketebalan Kaca ( mm )</label>
                        <select name="ketebalan_kaca" id="ketebalan_kaca" class="form-control" onchange="let hg = this.value.split('_');$('#harga').val(hg[1])">
                            <option value="">--Pilih--</option>
                            <?php
                            $this->db->from('tb_kategori');
                            $this->db->where('ketebalan_kaca >','0');
                            $kat = $this->db->get()->result();
                            foreach ($kat as $key => $value) {
                                echo '<option value="'.$value->ketebalan_kaca.'_'.$value->harga.'">'.$value->jenis_aquarium.' - Ketebalan '.$value->ketebalan_kaca.' mm</option>';
                            }
                            ?>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="btn-sm">Jumlah Pesanan</label>
                        <input  class="form-control" type="number" name="jumlah" onblur="$('#tharga').val($(this).val()*$('#harga').val()*$('#panjang').val()*$('#lebar').val()*$('#tinggi').val())" id="jumlah">
                    </div>
                    <div class="form-group">
                        <label for="" class="btn-sm">Harga cm<sup>3</sup></label>
                        <input  class="form-control" type="number" name="harga" id="harga" value="" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="" class="btn-sm">Total Harga</label>
                        <input  class="form-control" type="number" name="tharga" id="tharga" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="" class="btn-sm">Keterangan</label>
                        <textarea rowspan="4"  class="form-control" type="text" name="keterangan" id="keterangan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <input  type="hidden" value="<?=$this->uri->segment(4)?>" name="id_detail">
                        <input  class="form-control btn-warning" type="submit"  id="kirim" value="Masukan Keranjang">
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
</div>