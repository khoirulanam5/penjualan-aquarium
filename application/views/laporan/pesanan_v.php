<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=ucwords(str_replace("_"," ",$menu))?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <div class="card">
              <div class="card-body" style="background:#f0ece7">
               <?php  
                  if($this->input->get("act")=="view"){
                      foreach ($datas as $key => $value) {
                        if($this->input->get('no_transaksi') == $value->no_transaksi){
                          $view = $value;
                        }
                      }
                      
                      $act = "Update";
                  }elseif($this->input->get("act")=="add"){
                      $view = [
                          0 => (object)array(
                              "no_transaksi"=>"",
                              "nama_pelanggan"=>"",
                              "status_bayar"=>"",
                              "status_kirim"=>"",
                              "kabupaten"=>"",
                              "nama_penerima"=>""
                           )
                          ];
                          $act = "Simpan";
                  }
                  if(!empty($view)){
                    
                    $ttl_bayar = json_decode($view->data_produk);
                    $img  = (!empty($view->bukti_tf) ? $view->bukti_tf:"clipboard-regular.svg");
                    ?>
                      <div class="modal-body col-md-12 mx-auto nota" >
                        <div class="row">
                            <div class="col-md-12">
                                <center><h4>Nota Pembelian</h4></center>
                                <div style="border-style: inset;border:solid 1px;margin-bottom: 12px;" class="col-md-12"></div>
                            </div>
                           
                            <div class="col-md-12">
                                <div class="table_isi">
                                    <div class="form-group">
                                        <label for="inputEstimatedBudget">Nama Pelanggan</label>
                                        <div><?=$view->nama_pelanggan?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEstimatedBudget">Status Bayar</label>
                                        <?php
                                            if($view->status_bayar == 1){
                                            echo '<option value="1">Lunas | Siap Dikirim</option>';
                                            }else{
                                            echo '<option value="0">Belum bayar</option>';
                                            }
                                            ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEstimatedBudget">Total Bayar</label>
                                        <div><?=rp($ttl_bayar->total_bayar)?></div>
                                    </div>
                                </div>
                                </div>
                                <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">Bukti Bayar / Transfer</label>
                                    <image src="<?=base_url("uploads/").$img?>" width="100%" height="230px"/>
                                </div>
                            </div> -->
                        </div>
                      </div>
                    <?php
                  }
                  ?>
                <div class="tab-content p-0">
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative;">
                    <div>
                    <?php if ($this->session->flashdata('message')): ?>
                                        <script>
                                            <?= $this->session->flashdata('message'); ?>
                                        </script>
                                        <?php $this->session->unset_userdata('message'); ?>
                                    <?php endif; ?>
                          <div class="row">
                          </div>
                          <div class="card-body">
                              <table class="table table-bordered table-striped" id="tables" style="font-size: small;">
                                  <thead>
                                      <tr>
                                          <th style="">No Transaksi </th>
                                          <th style="">Nama Pelanggan</th>
                                          <th style="">Status Pengiriman</th>
                                          <th style="">kabupaten Tujuan</th>
                                          <th class="text-center">Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                          $no = 1;
                                          if (!empty($datas)) {
                                              
                                              foreach ($datas as $key => $value) {
                                                if($value->status_kirim  == 1 ){
                                                  $pengiriman = "<span class='btn btn-primary btn-xs'>Proses Dikirim</span>";
                                                }elseif ($value->status_kirim  == 2) {
                                                  $pengiriman = "<span class='btn btn-success btn-xs'>Selesai Dikirim</span>";
                                                } else {
                                                  $pengiriman = "<span class='btn btn-warning btn-xs'>Pembayaran Belum diverifikasi</span>";
                                                }
                                                
                                              ?>
                                              <tr id="<?= $value->no_transaksi ?>">
                                                  <?php
                                                      echo "<th>" . strtoupper($value->no_transaksi) . "</th>";
                                                      echo "<th>" . strtoupper($value->nama_pelanggan) . "</th>";
                                                      echo "<th>" .$pengiriman. "</th>";
                                                      echo "<th>" . strtoupper($value->kabupaten) . "</th>";
                                                  ?>
                                                  <td style="">
                                                        <button class="btn btn-xs btn-info"  id="<?= $value->no_transaksi ?>" onclick="action_view('<?= $value->no_transaksi ?>')"> Nota</button>
                                                  </td>
                                              </tr>
                                              <?php $no++;
                                                  }
                                              } 
                                         ?>
                                  </tbody>
                              </table>
                          </div>
                        
                      </div>      
                  </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <div>Donut</div>
                </div>
                </div>
              </div>
            </div>
          </section>
        </div>
    </section>
  </div>
<script src="<?=base_url()?>src/js/jquery.min.js"></script>
<script src="<?=base_url()?>src/dataTables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>src/dataTables/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>src/dataTables/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>src/dataTables/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>src/dataTables/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url()?>src/dataTables/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url()?>src/dataTables/jszip.min.js"></script>
<script src="<?=base_url()?>src/dataTables/pdfmake.min.js"></script>
<script src="<?=base_url()?>src/dataTables/vfs_fonts.js"></script>
<script src="<?=base_url()?>src/dataTables/buttons.html5.min.js"></script>
<script src="<?=base_url()?>src/dataTables/buttons.print.min.js"></script>
<script src="<?=base_url()?>src/dataTables/buttons.colVis.min.js"></script>
<script type="text/javascript">
var table = $("#tables").DataTable({
    order:[[0,'desc']],
    dom: 'Bfrtip',
    buttons: [
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5',
        {
            extend: 'print',
            exportOptions: {
                columns: ':visible'
            }
        }
    ],
    responsive: true
});

function action_add(id) {
    location.href = "?act=add";
}
function batal(){
  $("form").remove();
  window.location='?';

}
const action_view = (id) => {
    var data = table.row("#" + id).data();
    console.log(data);
    location.href = "?act=view&no_transaksi=" + data[0];
}


const action_delete = (id) => {
    var row = JSON.stringify(table.row("#" + id).data());
    $.ajax({
        url: "<?=base_url()?>transaksi/penjualan/delete",
        type: "POST",
        data: {
            row
        },
        success: function(e) {
            if(e == "1"){
                swal.fire({
                title: "Good",
                text: "Hapus data berhasil",
                icon: "success"
            }).then(function() {
                window.location.reload();
            })
            }
           
        }
    })
}
</script>
	
<style>
    .nota{
        background:#fff;
    }
</style>