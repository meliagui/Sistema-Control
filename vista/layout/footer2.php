                </div>
            </div>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2022 <a href="#">MELISSA</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../public/dist/js/jquery.min.js"></script>
    <!-- <script src="{{ asset('dist/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('plugins/notification/snackbar/snackbar.min.js')}}"></script>
    <script src="{{ asset('dist/js/toastr.min.js') }}"></script> -->
    <!-- @stack('scripts') -->
    <!-- Bootstrap 4 -->
    <script src="../public/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE App -->
    <script src="../public/dist/js/adminlte.min.js"></script>
    <script src="../public/app/publico/js/lib/bootstrap/bootstrap-select.min.js"></script>
    <!-- Select Min -->

    <!-- Del anterior layout -->
    <script src="../public/app/publico/js/lib/tether/tether.min.js"></script>
    <!-- <script src="../public/app/publico/js/lib/datatables-net/datatables.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> -->
    <script src="../public/dist/js/jquery.dataTables.min.js"></script>

    <!-- sweet alert -->
    <script src="../public/sweet/js/sweetalert2.js"></script>
    <script src="../public/sweet/js/sweet.js"></script>


    <script>
        $(function() {
            $('#example').DataTable({
                select: {
                    //style: 'multi'
                },
                responsive: true,
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla =(",
                    "sInfo": "Registros del _START_ al _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Registros del 0 al 0 de 0 registros",
                    "sInfoFiltered": "-",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    buttons: [{
                        "copy": "Copiar",
                        "colvis": "Visibilidad",
                        "className": 'btn btn-default btn-sm-menu',
                        // "formButtons": [
                        //     { text: 'Save', className: 'btn btn-default btn-primary btn-sm-menu', action: function() { this.submit(); } },
                        //     { text: 'Cancel', className: 'btn btn-default btn-danger btn-sm-menu', action: function() { this.close(); } }
                        // ]
                    }]
                }
            });
        });
    </script>
    <script type="text/javascript" src="../public/app/publico/js/lib/jqueryui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../public/app/publico/js/lib/lobipanel/lobipanel.min.js"></script>
    <script type="text/javascript" src="../public/app/publico/js/lib/match-height/jquery.matchHeight.min.js"></script>
    <script type="text/javascript" src="../public/loader/loader.js"></script>
</body>
</html>