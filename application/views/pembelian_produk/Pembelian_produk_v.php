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
              <div class="card-body">
               <button class="btn btn-xs btn-primary"  onclick="action_add()"><i class="fa fa-plus"></i> Tambah</button>
               <?php  
                  if($this->input->get("act")=="view"){
                      $view = $this->db->get_where("Pembelian_produk",array("no_nota_pembelian"=>$this->input->get("no_nota_pembelian")))->result();
                      $act = "Update";
                  }elseif($this->input->get("act")=="add"){
                      $view = [
                          0 => (object)array(
                              "no_nota_pembelian"=>"",
                              "tanggal_beli"=>"",
                              "id_pegawai"=>"",
                              "subtotal"=>""
                           )
                          ];
                          $act = "Simpan";
                  }
                  if(!empty($view)){
                    ?>
                     <form action="<?=base_url()?>transaksi/pembelian/<?=$act?>" method="post">
                      <div class="modal-body">
                          <div class="table_isi">
                              <div class="form-group"><label for="inputEstimatedBudget">No Nota Pembelian</label>
                                  <input name="no_nota_pembelian" type="text"  value="<?=$view[0]->no_nota_pembelian?>"
                                      class="form-control">
                              </div>
                              <div class="form-group">
                                  <label for="inputEstimatedBudget">Tanggal Beli</label>
                                  <input name="tanggal_beli" type="date" id="1" value="<?=$view[0]->tanggal_beli?>"
                                      class="form-control">
                              </div>
                              <div class="form-group">
                                  <label for="inputEstimatedBudget">Id Pegawai</label>
                                  <input name="id_pegawai" type="text" id="2" value="<?=$view[0]->id_pegawai?>"
                                      class="form-control">
                              </div>
                              <div class="form-group">
                                  <label for="inputEstimatedBudget">Sub Total</label>
                                  <input name="subtotal" type="number" id="3" value="<?=$view[0]->subtotal?>"
                                      class="form-control">
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <input type="submit" class="btn btn-success" id="update" value="<?=$act?>" style="display: block;">
                          <button class="btn btn-success" onclick="batal()" style="display: block;" > Batal</button>
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
                              <table class="table table-bordered table-striped" id="tables">
                                  <thead>
                                      <tr>
                                          <th style="">No Nota Pembelian </th>
                                          <th style="">Tangga Beli</th>
                                          <th style="">Id Pegawai</th>
                                          <th style="">Sub Total</th>
                                          <th class="text-center">Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                          $no = 1;
                                          if (!empty($datas)) {
                                              
                                              foreach ($datas as $key => $value) {
                                              ?>
                                              <tr id="<?= $value->no_nota_pembelian ?>">
                                                  <?php
                                                      echo "<th>" . strtoupper($value->no_nota_pembelian) . "</th>";
                                                      echo "<th>" . strtoupper($value->tanggal_beli) . "</th>";
                                                      echo "<th>" . strtoupper($value->id_pegawai) . "</th>";
                                                      echo "<th>" . strtoupper($value->subtotal) . "</th>";
                                                  ?>
                                                  <td>
                                                      <button class="btn btn-xs btn-primary" href="" id="<?= $value->no_nota_pembelian ?>" onclick="action_view('<?= $value->no_nota_pembelian ?>')"><i class="fa fa-eye"></i></button>
                                                      <button class="btn btn-xs btn-primary" onclick="action_delete('<?= $value->no_nota_pembelian ?>')"><i class="fa fa-trash-alt"></i></button>
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
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
var table = $("#tables").DataTable();

function action_add(id) {
    location.href = "?act=add";
}

function batal(){
  location.href = "";
}
const action_view = (id) => {
    var data = table.row("#" + id).data();
    console.log(data);
    location.href = "?act=view&no_nota_pembelian=" + data[0];
}


const action_delete = (id) => {
    var row = JSON.stringify(table.row("#" + id).data());
    $.ajax({
        url: "<?=base_url()?>transaksi/pembelian/delete",
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
	
