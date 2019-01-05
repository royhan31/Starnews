<!-- General JS Scripts -->
<script src="../assets/admin/modules/jquery.min.js"></script>
<script src="../assets/admin/modules/popper.js"></script>
<script src="../assets/admin/modules/tooltip.js"></script>
<script src="../assets/admin/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/admin/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="../assets/admin/modules/moment.min.js"></script>
<script src="../assets/admin/js/stisla.js"></script>
<script src="../assets/admin/modules/datatables/datatables.min.js"></script>
<script src="../assets/admin/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/admin/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="../assets/admin/modules/jquery-ui/jquery-ui.min.js"></script>
<script src="../assets/admin/modules/summernote/summernote-bs4.js"></script>
 <script src="../assets/admin/modules/codemirror/lib/codemirror.js"></script>
 <script src="../assets/admin/modules/codemirror/mode/javascript/javascript.js"></script>
 <script src="../assets/admin/modules/jquery-selectric/jquery.selectric.min.js"></script>


  <!-- Page Specific JS File -->
<!-- <script src="../assets/admin/js/page/modules-datatables.js"></script> -->
<script>
$("#post_table").dataTable({
  "columnDefs": [
    { "sortable": false, "targets": [3] }
  ]
});

$("#category_table").dataTable({
  "columnDefs": [
    { "sortable": false, "targets": [2] }
  ]
});

$("#comment_table").dataTable({
  "columnDefs": [
    { "sortable": false, "targets": [3,4] }
  ]
});
</script>


<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="../assets/admin/js/scripts.js"></script>
<script src="../assets/admin/js/custom.js"></script>
