<?php
include('head.php');
include('loader.php');
?>


<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="dist/css/style.min.css">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
  <?php
  include('sidebar.php');
  include('header.php');
  include('modal/addtask_master.php')
  ?>


</div>



<?php
include('footer.php');
?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.js"></script>
<script>
  $(document).ready(function() {
    new DataTable('#myTable', {
      "info": false // hide the "Showing 1 to 3 of 3entries" text
    });
    $('#creative_type').select2({
      placeholder: 'Select a Creative type',
      width: '100%'
    });
  });
</script>