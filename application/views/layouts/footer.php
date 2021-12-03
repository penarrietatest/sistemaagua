<!-- ======================================================================================================= -->

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 0.0.1 (Beta)
    </div>
    <strong>Copyright &copy; 2021 </strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url();?>vendors/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>vendors/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>vendors/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>vendors/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>vendors/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>vendors/datatables/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>vendors/datatables/js/responsive.bootstrap4.min.js"></script>

<!-- page script -->
<!-- Datatables  init-->
<script type="text/javascript">
        $(document).ready(function() {
            $('table.display').DataTable({
                "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "No existen datos",
                "sInfo":           "Mostrando _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
            });
        } );
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('table.display').DataTable();
      } );
    </script>

<!-- bs-custom-file-input -->
<script src="<?php echo base_url();?>vendors/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>

</body>
</html>

<!-- ======================================================================================================= -->
