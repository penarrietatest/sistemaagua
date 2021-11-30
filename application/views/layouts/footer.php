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
<!-- Datatables  inicio-->
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



<script type="text/javascript">
        $(".btn-view-factura").on("click", function(){
            var details = $(this).val(); 
            var ipay = details.split("*");
            var consumption = (ipay[5]-ipay[4]);

            
            html =        "<div class='row'>"
            html +=           "<div class='col-12'>"
            html +=             "<h4>"
            html +=               "<i class='fas fa-globe'></i> Recibo de Ingreso"

            html +=             "</h4>"
            html +=           "</div>"
            html +=       "</div>"
            html +=       "<div class='row invoice-info mt-3'>"
            html +=           "<div class='col-sm-6 invoice-col'>"
            html +=             "<address>"
            html +=                 "<strong>CI: " + ipay[9] + "</strong><br>"
            html +=                 "<b>Afiliado:</b> " + ipay[8] + "<br>"
            html +=                 "<b>Direccion:</b> " + ipay[10] + "<br>"
            html +=                 "<b>Lectura anterior:</b> " + ipay[4] + " &nbsp;&nbsp; <b>Fecha: </b> " + ipay[6] + "<br>"
            html +=                 "<b>Lectura actual:</b> " + ipay[5] + " &nbsp;&nbsp; <b>Fecha: </b> " + ipay[7] + ""
            html +=             "</address>"
            html +=           "</div>"
            html +=           "<div class='col-sm-6 invoice-col'>"    
            html +=              "<address>"
            html +=                 "<strong>Nro medidor: " + ipay[11] + "</strong><br>"
            html +=                 "<b>Periodo:</b> " + ipay[1] + "<br>"
            html +=                 "<b>Fecha emision:</b> " + ipay[2] + "<br>"
            html +=                 "<b>Consumo:</b> " + consumption + " M3"
            html +=              "</address>"
            html +=           "</div>"
            html +=         "</div>"

            html +=         "<div class='row'>"
            html +=             "<div class='col-12 table-responsive'>"   
            html +=               "<table class='table table-striped'>"
            html +=                   "<thead>"
            html +=                       "<tr>"
            html +=                          "<th class='text-center'>#</th>"
            html +=                          "<th>Concepto</th>"
            html +=                          "<th class='text-right'>Consumo</th>"
            html +=                          "<th class='text-right'>Total</th>"
            html +=                        "</tr>"
            html +=                    "</thead>"
            html +=                    "<tbody>"
            html +=                         "<tr>"
            html +=                            "<td class='text-center'>1</td>"
            html +=                            "<td>Consumo de agua</td>"
            html +=                            "<td class='text-right'>" + consumption + " m3</td>"
            html +=                            "<td class='text-right'> " + ipay[3] + " Bs</td>"
            html +=                          "</tr>"                                    
            html +=                      "</tbody>"
            html +=                 "</table>"      
            html +=               "</div>"
            html +=           "</div>"
            html +=           "<div class='col-md-12'>"
            html +=               "<div class='text-right'>"
            html +=                   "<hr>"
            html +=                   "<h4><b>Total :</b> " + ipay[3] + " Bs</h4>" 
            html +=               "</div>"
            html +=           "</div>"

            $("#modal-default .modal-body").html(html);
        });
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
