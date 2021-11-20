<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
  <strong>Copyright &copy; 2021 <a href="">SISPEMMAKAN - Sistem Pemesanan Makanan</a>.</strong> All rights
  reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b></b>
  </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/js/sweetalert/sweetalert2.all.min.js"></script>
<script src="../assets/js/myscript.js"></script>
<!-- Select2 -->
<script src="../assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<!-- <script src="../assets/plugins/bs-stepper/js/bs-stepper.min.js"></script> -->
<!-- dropzonejs -->
<!-- OPTIONAL SCRIPTS -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<script src="../assets/plugins/select2/js/select2.full.min.js"></script>
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/dist/js/demo.js"></script>
<script src="../assets/dist/js/pages/dashboard3.js"></script>
<script src="../assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- <script src="../assets/plugins/dropzone/min/dropzone.min.js"></script> -->
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>

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
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    }) 
  })
</script>
<script>
  $(function () {


    //Date range picker
    $('#reservationdate').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    // //Date range picker
    // $('#reservation').daterangepicker()
    //Date range picker with time picker
    // $('#reservationtime').daterangepicker({
    //   timePicker: true,
    //   timePickerIncrement: 30,
    //   locale: {
    //     format: 'DD/MM/YYYY hh:mm A'
    //   }
    // })

  })
</script>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>
<script>
  window.setTimeout(function () {
    $(".hilang").fadeTo(500, 0).slideUp(500, function () {
      $(this).remove();
    });
  }, 5000);
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#largeModal').on('show.bs.modal', function (e) {
      var rowid = $(e.relatedTarget).data('id');
      //menggunakan fungsi ajax untuk pengambilan data
      $.ajax({
        type: 'post',
        url: 'gambar-detail.php',
        data: 'rowid=' + rowid,
        success: function (data) {
          $('.fetched-data').html(data); //menampilkan data ke dalam modal
        }
      });
    });
  });
</script>
<script>
  $(function() {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>


</body>

</html>