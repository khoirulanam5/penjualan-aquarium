<script src="<?=base_url()?>src/js/jquery.min.js"></script>
<script src="<?=base_url()?>src/js/jquery-ui.min.js"></script>
<script>
  $.widget.bridge("uibutton", $.ui.button)
</script>
<script src="<?=base_url()?>src/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url()?>src/js/Chart.min.js"></script>
<script src="<?=base_url()?>src/js/sparkline.js"></script>
<script src="<?=base_url()?>src/js/jquery.vmap.min.js"></script>
<script src="<?=base_url()?>src/js/jquery.vmap.usa.js"></script>
<script src="<?=base_url()?>src/js/jquery.knob.min.js"></script>
<script src="<?=base_url()?>src/js/moment.min.js"></script>
<script src="<?=base_url()?>src/js/daterangepicker.js"></script>
<script src="<?=base_url()?>src/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="<?=base_url()?>src/js/summernote-bs4.min.js"></script>
<script src="<?=base_url()?>src/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?=base_url()?>src/js/adminlte.js"></script>
<script src="<?=base_url()?>src/js/dashboard.js"></script>
<script>
   $("form").attr('autocomplete','off');
</script>


<!-- Tambahkan JS DataTables dan Export Buttons -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script>
$(document).ready(function() {
    $('#jurnalTable').DataTable({
        dom: 'Bfrtip',
        pageLength: 5,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            paginate: {
                first: "Awal",
                last: "Akhir",
                next: "→",
                previous: "←"
            }
        }
    });
});
</script>
