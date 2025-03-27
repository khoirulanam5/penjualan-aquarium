<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$menu?></h1>
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
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Sales
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card-body">
               <button class="btn btn-xs btn-primary"  onclick="action_add()"><i class="fa fa-plus"></i> Tambah</button>
               <?php  
                  if($this->input->get("act")=="view"){
                      $view = $this->db->get_where("Detail_beli_produk",array("id_Detail_beli_produk"=>$this->input->get("id_Detail_beli_produk")))->result();
                      $act = "Update";
                  }elseif($this->input->get("act")=="add"){
                      $view = [
                          0 => (object)array(
                              "id_Detail_beli_produk"=>"",
                              "nama"=>"",
                              "no_hp"=>"",
                              "email"=>"",
                              "jabatan"=>""
                           )
                          ];
                          $act = "Simpan";
                  }
                  if(!empty($view)){
                    ?>
                     <form action="<?=base_url()?>detail_beli_produk/detail_beli_produk/<?=$act?>" method="post">
                      <div class="modal-body">
                          <div class="table_isi">
                              <div class="form-group"><label for="inputEstimatedBudget">Nama</label>
                                  <input name="id_Detail_beli_produk" type="hidden"  value="<?=$view[0]->id_Detail_beli_produk?>" >
                                  <input name="nama" type="text" id="0" value="<?=$view[0]->nama?>"
                                      class="form-control">
                              </div>
                              <div class="form-group">
                                  <label for="inputEstimatedBudget">No Hp</label>
                                  <input name="no_hp" type="text" id="1" value="<?=$view[0]->no_hp?>"
                                      class="form-control">
                              </div>
                              <div class="form-group">
                                  <label for="inputEstimatedBudget">Email</label>
                                  <input name="email" type="text" id="2" value="<?=$view[0]->email?>"
                                      class="form-control">
                              </div>
                              <div class="form-group">
                                  <label for="inputEstimatedBudget">Jabatan</label>
                                  <input name="jabatan" type="text" id="3" value="<?=$view[0]->jabatan?>"
                                      class="form-control">
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <input type="submit" class="btn btn-default" id="update" value="<?=$act?>" style="display: block;">
                          <button class="btn btn-default" onclick="batal()" style="display: block;" > Batal</button>
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
                                          <th style="">ID </th>
                                          <th style="">Nama</th>
                                          <th style="">No Hhp</th>
                                          <th style="">Email</th>
                                          <th style="">Jabatan</th>
                                          <th class="text-center">Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                          $no = 1;
                                          if (!empty($datas)) {
                                              
                                              foreach ($datas as $key => $value) {
                                              ?>
                                              <tr id="<?= $value->id_Detail_beli_produk ?>">
                                                  <?php
                                                      echo "<th>" . strtoupper($value->id_Detail_beli_produk) . "</th>";
                                                      echo "<th>" . strtoupper($value->nama) . "</th>";
                                                      echo "<th>" . strtoupper($value->no_hp) . "</th>";
                                                      echo "<th>" . strtoupper($value->email) . "</th>";
                                                      echo "<th>" . strtoupper($value->jabatan) . "</th>";
                                                  ?>
                                                  <td>
                                                      <button class="btn btn-xs btn-primary" href="" id="<?= $value->id_Detail_beli_produk ?>" onclick="action_view("<?= $value->id_Detail_beli_produk ?>")"><i class="fa fa-eye"></i></button>
                                                      <button class="btn btn-xs btn-primary" onclick="action_delete("<?= $value->id_Detail_beli_produk ?>")"><i class="fa fa-trash-alt"></i></button>
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
    location.href = "?act=view&id_Detail_beli_produk=" + data[0];
}


const action_delete = (id) => {
    var row = JSON.stringify(table.row("#" + id).data());
    $.ajax({
        url: "<?=base_url()?>detail_beli_produk/detail_beli_produk/delete",
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
	
