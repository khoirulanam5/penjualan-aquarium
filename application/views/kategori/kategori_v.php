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
              <div class="card-body">
               <!-- <button class="btn btn-xs btn-primary"  onclick="action_add()"><i class="fa fa-plus"></i> Tambah</button> -->
               <?php  
                  if($this->input->get("act")=="view"){
                      $view = $this->db->get_where("tb_kategori",array("id_kategori"=>$this->input->get("id_kategori")))->result();
                      $act = "Update";
                  }elseif($this->input->get("act")=="add"){
                      $view = [
                          0 => (object)array(
                              "id_kategori"=>"",
                              "jenis_aquarium"=>"",
                              "ketebalan_kaca"=>"",
                              "harga"=>"",
                           )
                          ];
                          $act = "Simpan";
                  }
                  if(!empty($view)){
                    ?>
                     <form action="<?=base_url()?>kategori/aquarium/<?=$act?>" method="post">
                      <div class="modal-body">
                          <div class="table_isi">
                              <div class="form-group"><label for="inputEstimatedBudget">Jenis Aquarium</label>
                                  <input name="id_kategori" type="hidden"  value="<?=$view[0]->id_kategori?>" >
                                  <input name="jenis_aquarium" type="text" id="1" value="<?=$view[0]->jenis_aquarium?>"
                                      class="form-control">
                              </div>
                              <div class="form-group">
                                  <label for="inputEstimatedBudget">Ketebalan Kaca (mm)</label>
                                  <input name="ketebalan_kaca" type="text" id="0" value="<?=$view[0]->ketebalan_kaca?>"
                                      class="form-control">
                              </div>
                              <div class="form-group">
                                  <label for="inputEstimatedBudget">Harga</label>
                                  <input name="harga" type="text" id="2" value="<?=$view[0]->harga?>"
                                      class="form-control">
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <input type="submit" class="btn btn-success" value="<?=$act?>" style="display: block;">
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
                                          <th style="">ID </th>
                                          <th style="">Jenis Aquarium</th>
                                          <th style="">Ketebalan Kaca</th>
                                          <th style="">Harga</th>
                                          <th class="text-center">Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                          $no = 1;
                                          if (!empty($datas)) {
                                              
                                              foreach ($datas as $key => $value) {
                                              ?>
                                              <tr id="<?= $value->id_kategori ?>">
                                                  <?php
                                                      echo "<th>" . strtoupper($value->id_kategori) . "</th>";
                                                      echo "<th>" . strtoupper($value->jenis_aquarium) . "</th>";
                                                      echo "<th>" . strtoupper($value->ketebalan_kaca) . "</th>";
                                                      echo "<th>" . strtoupper($value->harga) . "</th>";
                                                  ?>
                                                  <td>
                                                      <button class="btn btn-xs btn-primary" href="" id="<?= $value->id_kategori ?>" onclick="action_view('<?= $value->id_kategori ?>')"><i class="fa fa-eye"></i></button>
                                                      <button class="btn btn-xs btn-primary" onclick="action_delete('<?= $value->id_kategori ?>')"><i class="fa fa-trash-alt"></i></button>
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
  $("form").remove();
}
const action_view = (id) => {
    var data = table.row("#" + id).data();
    console.log(data);
    location.href = "?act=view&id_kategori=" + data[0];
}


const action_delete = (id) => {
    var row = JSON.stringify(table.row("#" + id).data());
    $.ajax({
        url: "<?=base_url()?>kategori/kategori/delete",
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
	
