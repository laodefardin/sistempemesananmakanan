
        <!-- Main Footer -->
        <footer class="main-footer">
          <div class='container'>
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
              <!-- <a href="login">Login</a> -->
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2021 <a href="">Sistem Pemesanan Makanan</a>.</strong> All rights
            reserved.
          </div>
        </footer>
      </div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


    <!-- AdminLTE -->
    <script src="assets/dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="assets/plugins/chart.js/Chart.min.js"></script>
    <script src="assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="assets/plugins/moment/moment.min.js"></script>
    <script src="assets/dist/js/demo.js"></script>
    <script src="assets/dist/js/pages/dashboard3.js"></script>
    <script src="assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#largeModal').on('show.bs.modal', function (e) {
          var rowid = $(e.relatedTarget).data('id');
          //menggunakan fungsi ajax untuk pengambilan data
          $.ajax({
            type: 'post',
            url: 'buku-detail.php',
            data: 'rowid=' + rowid,
            success: function (data) {
              $('.fetched-data').html(data); //menampilkan data ke dalam modal
            }
          });
        });
      });
    </script>
    <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true,
          "autoWidth": false,
        });
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>
    <script>
      $(document).ready(function () {
        $("#myInput").on("keyup", function () {
          var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
    </script>
</body>

</html>