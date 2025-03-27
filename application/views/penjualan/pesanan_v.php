<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
  .ttl_jual{
    margin:25px;
  }
</style>
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
              <div class="card-header">
              </div>
              <div class="card-body">
               <?php
               $view = array();
                  if($this->input->get("act")=="view"){
                    
                    foreach ($datas as $key => $value) {
                  
                      if($value->no_transaksi == $this->input->get('no_transaksi')){
                        $view = $value;
                      }
                    }
                    $act = "Update";
                  }elseif($this->input->get("act")=="add"){
                      $view = [
                          0 => (object)array(
                              "id_penjualan"=>"",
                              "tgl_jual"=>"",
                              "id_pegawai"=>"",
                              "id_pelanggan"=>"",
                              "total_bayar"=>"",
                              "bayar"=>"",
                              "kembali"=>""
                           )
                          ];
                          $act = "Simpan";
                  }
             
                  if(!empty($view)){
                    $total = json_decode($view->data_produk);
                    ?>
                     <form action="<?=base_url().'/transaksi/penjualan/'.$act?>" method="post">
                      <div class="modal-body">
                          <div class="table_isi">
                              <div class="form-group">
                              </div>
                              <div class="form-group">
                                  <label for="inputEstimatedBudget">Id Pelanggan</label>
                                  <input name="id_pelanggan" type="text" id="2" value="<?=$view->id_pelanggan?>" readonly="readonly"
                                      class="form-control">
                              </div>
                              <div class="form-group">
                                  <label for="inputEstimatedBudget">Total Bayar</label>
                                  <input name="total_bayar" type="number" id="3" value="<?=$total->total_bayar?>" readonly="readonly" class="form-control">
                              </div>
                              <div class="form-group"><label for="inputEstimatedBudget">Tanggal Jual</label>
                                  <input name="id_penjualan" type="hidden"  value="<?=$view->id_penjualan?>" >
                                  <input name="no_transaksi" type="hidden"  value="<?=$view->no_transaksi?>" >
                                  <input name="id_pegawai" type="hidden" id="1" value="<?=$this->session->username?>"> 
                                  <input name="tgl_jual" type="date" id="0" value="<?=$view->tgl_jual?>" class="form-control" readonly>
                              </div>
                              <div class="form-group">
                                  <label for="inputEstimatedBudget">Status Pengiriman</label>
                                  <?php
                                      if($view->status_kirim  == 1 ){
                                        echo '<div class="1">Pengiriman Kelokasi</div>';
                                      }elseif ($view->status_kirim  == 2) {
                                        echo '<div class="2">Paket Sudah Diterima</div>';
                                      } else {
                                        echo '<div class="0">Pembayaran Belum diverifikasi</div>';
                                      }
                                    ?>
                              </div>
                              <div class="form-group">
                                  <label for="inputEstimatedBudget">Nama Penerima</label>
                                  <input name="nama_penerima" type="text" id="nama_penerima" value="<?=$view->nama_penerima?>"
                                      class="form-control" readonly>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button class="btn btn-success" onclick="batal()" style="display: block;" > Close</button>
                      </div>
                  </form>
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
                            <?php
                            if (!empty($this->input->get('ops'))) {
                              $this->load->view('getdatatable');
                            }else{
                            ?>
                              <table class="table table-bordered table-striped" id="tables">
                                  <thead>
                                      <tr>
                                          <th>No Resi</th>
                                          <th>Tanggal</th>
                                          <th>Jumlah</th>
                                          <th>Panjang (cm)</th>
                                          <th>Lebar (cm)</th>
                                          <th>Tinggi (cm)</th>
                                          <th>Ketebalan Kaca (mm)</th>
                                          <th>Keterangan</th>
                                          <!-- <th>Status Pesanan</th> -->
                                          <th class="text-center">Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                      $no = 1;
                                      if (!empty($datas)) {
                                          foreach ($datas as $key => $value1) {
                                              $total = json_decode($value1->data_produk);

                                              // Status pengiriman
                                              if ($value1->status_kirim == 1) {
                                                  $pengiriman = "Proses dikirim";
                                              } elseif ($value1->status_kirim == 2) {
                                                  $pengiriman = "Paket sudah diterima";
                                              } else {
                                                  $pengiriman = "Pembayaran belum diverifikasi";
                                              }

                                              // Data produk custom
                                              if (!empty($total->custom)) {
                                                  foreach ($total->custom as $key => $value) {
                                      ?>
                                                      <tr id="<?= htmlspecialchars($value1->no_transaksi) ?>">
                                                          <td><?= strtoupper($value1->no_transaksi) ?></td>
                                                          <td><?= strtoupper($value->tanggal) ?></td>
                                                          <td><?= $value->jumlah ?></td>
                                                          <td><?= $value->panjang ?></td>
                                                          <td><?= $value->lebar ?></td>
                                                          <td><?= $value->tinggi ?></td>
                                                          <td><?= $value->ketebalan_kaca ?></td>
                                                          <td><?= $value->keterangan ?></td>
                                                          <!-- <td><?= htmlspecialchars($value1->status_pesanan) ?></td> -->
                                                          <td>
                                                              <?php if (isset($value1->status_bayar) && $value1->status_bayar == '1') : ?>
                                                                <a class="btn btn-sm btn-primary" href="<?= base_url() . 'laporan/pesanan/pesanan_custom/' . htmlspecialchars($value1->no_transaksi) ?>" target="_blank">
                                                                  <i class="fa fa-print"></i>
                                                                </a>
                                                              <?php endif; ?>
                                                                
                                                              <!-- <?php if ($value1->status_pesanan != NULL): ?>
                                                                <a class="btn btn-sm btn-success konfirmasi" href="<?= base_url() . 'transaksi/pesanan/konfirmasi/' . htmlspecialchars($value1->no_transaksi) ?>">
                                                                  <i class="fa fa-check"></i>
                                                                </a>
                                                              <?php endif; ?> -->
                                                          </td>
                                                      </tr>
                                      <?php
                                                      $no++;
                                                  }
                                              }
                                          }
                                      }
                                      ?>
                                  </tbody>
                              </table>
                            <?php
                            }
                            ?>
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
<script src="<?= base_url()?>src/dataTables/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>src/dataTables/dataTables.buttons.min.js"></script>
<script src="<?= base_url()?>src/dataTables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>src/dataTables/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>src/dataTables/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url()?>src/dataTables/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url()?>src/dataTables/jszip.min.js"></script>
<script src="<?= base_url()?>src/dataTables/pdfmake.min.js"></script>
<script src="<?= base_url()?>src/dataTables/vfs_fonts.js"></script>
<script src="<?= base_url()?>src/dataTables/buttons.html5.min.js"></script>
<script src="<?= base_url()?>src/dataTables/buttons.print.min.js"></script>
<script src="<?= base_url()?>src/dataTables/buttons.colVis.min.js"></script>
<script type="text/javascript">
var table = $("#tables").DataTable({
    order:[[0,'desc']],
    dom: 'Bfrtip',
    buttons: [
        'excelHtml5',
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
}
const action_view = (id) => {
  console.log(id);
    var data = table.row("#" + id).data();
    console.log(data);
    location.href = "?act=view&no_transaksi=" + data[0];
}


const action_delete = (id) => {
  console.log(id);
    var row = JSON.stringify(table.row("#" + id).data());
    $.ajax({
        url: "<?=base_url()?>transaksi/penjualan/delete",
        type: "POST",
        data: {
            row
        },
        success: function(e) {
          console.log(e);
            if(e == "1"){
                swal.fire({
                title: "Good",
                text: "Hapus data berhasil",
                icon: "success"
                }).then(function() {
                    window.location.reload();
                });
            }
           
        }
    })
}
$('input[name="ops_penjualan"]').on('click',function(){
  var ops = $('input[name="ops_penjualan"]:checked').val();
  location.href = '?ops='+ops;
  console.log(ops);
})

</script>
<script>
        document.querySelectorAll('.konfirmasi').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah link agar tidak langsung dijalankan
            var url = this.getAttribute('href'); // Ambil URL dari atribut href

            Swal.fire({
                title: "Konfirmasi Pesanan?",
                text: "Jika pesanan sudah jadi, silahkan klik konfirmasi!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Konfirmasi"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika konfirmasi, redirect ke URL penghapusan
                    window.location.href = url;
                }
            });
        });
    });
    </script>
